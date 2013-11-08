<?php

Class Controller_Admin_Newscategory Extends Controller_Admin_Base 
{
	private $recordPerPage = 20;
	
	function indexAction() 
	{
		$error 			= array();
		$success 		= array();
		$warning 		= array();
		$formData 		= array('fbulkid' => array());
		$_SESSION['securityToken']=Helper::getSecurityToken();//Token
		$page 			= (int)($this->registry->router->getArg('page'))>0?(int)($this->registry->router->getArg('page')):1;
		
		
		$parentidFilter = (int)($this->registry->router->getArg('parentid'));
		$displayorderFilter = (int)($this->registry->router->getArg('displayorder'));
		$statusFilter = (int)($this->registry->router->getArg('status'));
		$datecreatedFilter = (int)($this->registry->router->getArg('datecreated'));
		$idFilter = (int)($this->registry->router->getArg('id'));
		
		$keywordFilter = (string)$this->registry->router->getArg('keyword');
		$searchKeywordIn= (string)$this->registry->router->getArg('searchin');
		
		//check sort column condition
		$sortby 	= $this->registry->router->getArg('sortby');
		if($sortby == '') $sortby = 'id';
		$formData['sortby'] = $sortby;
		$sorttype 	= $this->registry->router->getArg('sorttype');
		if(strtoupper($sorttype) != 'ASC') $sorttype = 'DESC';
		$formData['sorttype'] = $sorttype;	
		
		
		if(!empty($_POST['fsubmitbulk']))
		{
            if($_SESSION['newscategoryBulkToken']==$_POST['ftoken'])
            {
                 if(!isset($_POST['fbulkid']))
                {
                    $warning[] = $this->registry->lang['default']['bulkItemNoSelected'];
                }
                else
                {
                    $formData['fbulkid'] = $_POST['fbulkid'];
                    
                    //check for delete 
                    if($_POST['fbulkaction'] == 'delete')
                    {
                        $delArr = $_POST['fbulkid'];
                        $deletedItems = array();
                        $cannotDeletedItems = array();
                        foreach($delArr as $id)
                        {
                            //check valid user and not admin user
                            $myNewscategory = new Core_Newscategory($id);
                            
                            if($myNewscategory->id > 0)
                            {
                                //tien hanh xoa
                                if($myNewscategory->delete())
                                {
                                    $deletedItems[] = $myNewscategory->id;
                                    $this->registry->me->writelog('newscategory_delete', $myNewscategory->id, array());      
                                }
                                else
                                    $cannotDeletedItems[] = $myNewscategory->id;
                            }
                            else
                                $cannotDeletedItems[] = $myNewscategory->id;
                        }
                        
                        if(count($deletedItems) > 0)
                            $success[] = str_replace('###id###', implode(', ', $deletedItems), $this->registry->lang['controller']['succDelete']);
                        
                        if(count($cannotDeletedItems) > 0)
                            $error[] = str_replace('###id###', implode(', ', $cannotDeletedItems), $this->registry->lang['controller']['errDelete']);
                    }
                    else
                    {
                        //bulk action not select, show error
                        $warning[] = $this->registry->lang['default']['bulkActionInvalidWarn'];
                    }
                }
            }
			
		}
		
		$_SESSION['newscategoryBulkToken']=Helper::getSecurityToken();//Gan token de kiem soat viec nhan nut submit form   		
		
		$paginateUrl = $this->registry->conf['rooturl'].$this->registry->controllerGroup . '/'.$this->registry->controller.'/index/';      
		
		

		if($parentidFilter > 0)
		{
			$paginateUrl .= 'parentid/'.$parentidFilter . '/';
			$formData['fparentid'] = $parentidFilter;
			$formData['search'] = 'parentid';
		}

		if($displayorderFilter > 0)
		{
			$paginateUrl .= 'displayorder/'.$displayorderFilter . '/';
			$formData['fdisplayorder'] = $displayorderFilter;
			$formData['search'] = 'displayorder';
		}

		if($statusFilter > 0)
		{
			$paginateUrl .= 'status/'.$statusFilter . '/';
			$formData['fstatus'] = $statusFilter;
			$formData['search'] = 'status';
		}

		if($datecreatedFilter > 0)
		{
			$paginateUrl .= 'datecreated/'.$datecreatedFilter . '/';
			$formData['fdatecreated'] = $datecreatedFilter;
			$formData['search'] = 'datecreated';
		}

		if($idFilter > 0)
		{
			$paginateUrl .= 'id/'.$idFilter . '/';
			$formData['fid'] = $idFilter;
			$formData['search'] = 'id';
		}
		
		if(strlen($keywordFilter) > 0)
		{
			$paginateUrl .= 'keyword/' . $keywordFilter . '/';

			if($searchKeywordIn == 'name')
			{
				$paginateUrl .= 'searchin/name/';
			}
			elseif($searchKeywordIn == 'summary')
			{
				$paginateUrl .= 'searchin/summary/';
			}
			$formData['fkeyword'] = $formData['fkeywordFilter'] = $keywordFilter;
			$formData['fsearchin'] = $formData['fsearchKeywordIn'] = $searchKeywordIn;
			$formData['search'] = 'keyword';
		}
				
		//tim tong so
		$total = Core_Newscategory::getNewscategorys($formData, $sortby, $sorttype, 0, true);    
		$totalPage = ceil($total/$this->recordPerPage);
		$curPage = $page;
		
			
		//get latest account
		$newscategorys = Core_Newscategory::getNewscategorys($formData, $sortby, $sorttype, (($page - 1)*$this->recordPerPage).','.$this->recordPerPage);
		
		//filter for sortby & sorttype
		$filterUrl = $paginateUrl;
		
		//append sort to paginate url
		$paginateUrl .= 'sortby/' . $sortby . '/sorttype/' . $sorttype . '/';
		
		
		//build redirect string
		$redirectUrl = $paginateUrl;
		if($curPage > 1)
			$redirectUrl .= 'page/' . $curPage;
			
		
		$redirectUrl = base64_encode($redirectUrl);
		
				
		$this->registry->smarty->assign(array(	'newscategorys' 	=> $newscategorys,
												'formData'		=> $formData,
												'success'		=> $success,
												'error'			=> $error,
												'warning'		=> $warning,
												'filterUrl'		=> $filterUrl,
												'paginateurl' 	=> $paginateUrl, 
												'redirectUrl'	=> $redirectUrl,
												'total'			=> $total,
												'totalPage' 	=> $totalPage,
												'curPage'		=> $curPage,
												));
		
		
		$contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'index.tpl');
		
		$this->registry->smarty->assign(array(	'pageTitle'	=> $this->registry->lang['controller']['pageTitle_list'],
												'contents' 	=> $contents));
		$this->registry->smarty->display($this->registry->smartyControllerGroupContainer . 'index.tpl');
		
	} 
	
		
	function addAction()
	{
		$error 	= array();
		$success 	= array();
		$contents 	= '';
		$formData 	= array();
		
		if(!empty($_POST['fsubmit']))
		{
            if($_SESSION['newscategoryAddToken'] == $_POST['ftoken'])
            {
                 $formData = array_merge($formData, $_POST);
                
                                
                if($this->addActionValidator($formData, $error))
                {
                    $myNewscategory = new Core_Newscategory();

					
					$myNewscategory->name = $formData['fname'];
					$myNewscategory->slug = $formData['fslug'];
					$myNewscategory->summary = $formData['fsummary'];
					$myNewscategory->seotitle = $formData['fseotitle'];
					$myNewscategory->seokeyword = $formData['fseokeyword'];
					$myNewscategory->seodescription = $formData['fseodescription'];
					$myNewscategory->metarobot = $formData['fmetarobot'];
					$myNewscategory->parentid = $formData['fparentid'];
					$myNewscategory->status = $formData['fstatus'];
					
                    if($myNewscategory->addData())
                    {
                        $success[] = $this->registry->lang['controller']['succAdd'];
                        $this->registry->me->writelog('newscategory_add', $myNewscategory->id, array());
                        $formData = array();      
                    }
                    else
                    {
                        $error[] = $this->registry->lang['controller']['errAdd'];            
                    }
                }
            }
            
		}
		
		$_SESSION['newscategoryAddToken']=Helper::getSecurityToken();//Tao token moi
		
		$this->registry->smarty->assign(array(	'formData' 		=> $formData,
												'redirectUrl'	=> $this->getRedirectUrl(),
												'error'			=> $error,
												'success'		=> $success,
												
												));
		$contents .= $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'add.tpl');
		$this->registry->smarty->assign(array(
												'pageTitle'	=> $this->registry->lang['controller']['pageTitle_add'],
												'contents' 			=> $contents));
		$this->registry->smarty->display($this->registry->smartyControllerGroupContainer . 'index.tpl');
	}
	
	
	
	function editAction()
	{
		$id = (int)$this->registry->router->getArg('id');
		$myNewscategory = new Core_Newscategory($id);
		
		$redirectUrl = $this->getRedirectUrl();
		if($myNewscategory->id > 0)
		{
			$error 		= array();
			$success 	= array();
			$contents 	= '';
			$formData 	= array();
			
			$formData['fbulkid'] = array();
			
			
			$formData['fid'] = $myNewscategory->id;
			$formData['fimage'] = $myNewscategory->image;
			$formData['fname'] = $myNewscategory->name;
			$formData['fslug'] = $myNewscategory->slug;
			$formData['fsummary'] = $myNewscategory->summary;
			$formData['fseotitle'] = $myNewscategory->seotitle;
			$formData['fseokeyword'] = $myNewscategory->seokeyword;
			$formData['fseodescription'] = $myNewscategory->seodescription;
			$formData['fmetarobot'] = $myNewscategory->metarobot;
			$formData['fparentid'] = $myNewscategory->parentid;
			$formData['fcountitem'] = $myNewscategory->countitem;
			$formData['fdisplayorder'] = $myNewscategory->displayorder;
			$formData['fstatus'] = $myNewscategory->status;
			$formData['fdatecreated'] = $myNewscategory->datecreated;
			$formData['fdatemodified'] = $myNewscategory->datemodified;
			
			if(!empty($_POST['fsubmit']))
			{
                if($_SESSION['newscategoryEditToken'] == $_POST['ftoken'])
                {
                    $formData = array_merge($formData, $_POST);
                    					
                    if($this->editActionValidator($formData, $error))
                    {
						
						$myNewscategory->name = $formData['fname'];
						$myNewscategory->slug = $formData['fslug'];
						$myNewscategory->summary = $formData['fsummary'];
						$myNewscategory->seotitle = $formData['fseotitle'];
						$myNewscategory->seokeyword = $formData['fseokeyword'];
						$myNewscategory->seodescription = $formData['fseodescription'];
						$myNewscategory->metarobot = $formData['fmetarobot'];
						$myNewscategory->parentid = $formData['fparentid'];
						$myNewscategory->status = $formData['fstatus'];
                        
                        if($myNewscategory->updateData())
                        {
                            $success[] = $this->registry->lang['controller']['succUpdate'];
                            $this->registry->me->writelog('newscategory_edit', $myNewscategory->id, array());
                        }
                        else
                        {
                            $error[] = $this->registry->lang['controller']['errUpdate'];            
                        }
                    }
                }
                
				    
			}
			
			
			$_SESSION['newscategoryEditToken'] = Helper::getSecurityToken();//Tao token moi
			
			$this->registry->smarty->assign(array(	'formData' 	=> $formData,
													'redirectUrl'=> $redirectUrl,
													'error'		=> $error,
													'success'	=> $success,
													
													));
			$contents .= $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'edit.tpl');
			$this->registry->smarty->assign(array(
													'pageTitle'	=> $this->registry->lang['controller']['pageTitle_edit'],
													'contents' 			=> $contents));
			$this->registry->smarty->display($this->registry->smartyControllerGroupContainer . 'index.tpl');
		}
		else
		{
			$redirectMsg = $this->registry->lang['controller']['errNotFound'];
			$this->registry->smarty->assign(array('redirect' => $redirectUrl,
													'redirectMsg' => $redirectMsg,
													));
			$this->registry->smarty->display('redirect.tpl');
		}
	}

	function deleteAction()
	{
		$id = (int)$this->registry->router->getArg('id');
		$myNewscategory = new Core_Newscategory($id);
		if($myNewscategory->id > 0)
		{
			//tien hanh xoa
			if($myNewscategory->delete())
			{
				$redirectMsg = str_replace('###id###', $myNewscategory->id, $this->registry->lang['controller']['succDelete']);
				
				$this->registry->me->writelog('newscategory_delete', $myNewscategory->id, array());  	
			}
			else
			{
				$redirectMsg = str_replace('###id###', $myNewscategory->id, $this->registry->lang['controller']['errDelete']);
			}
			
		}
		else
		{
			$redirectMsg = $this->registry->lang['controller']['errNotFound'];
		}
		
		$this->registry->smarty->assign(array('redirect' => $this->getRedirectUrl(),
												'redirectMsg' => $redirectMsg,
												));
		$this->registry->smarty->display('redirect.tpl');
			
	}
	
	####################################################################################################
	####################################################################################################
	####################################################################################################
	
	//Kiem tra du lieu nhap trong form them moi	
	private function addActionValidator($formData, &$error)
	{
		$pass = true;
		
		

		if($formData['fname'] == '')
		{
			$error[] = $this->registry->lang['controller']['errNameRequired'];
			$pass = false;
		}

		if($formData['fslug'] == '')
		{
			$error[] = $this->registry->lang['controller']['errSlugRequired'];
			$pass = false;
		}

		if($formData['fsummary'] == '')
		{
			$error[] = $this->registry->lang['controller']['errSummaryRequired'];
			$pass = false;
		}

		if($formData['fparentid'] <= 0)
		{
			$error[] = $this->registry->lang['controller']['errParentidMustGreaterThanZero'];
			$pass = false;
		}

		if($formData['fstatus'] <= 0)
		{
			$error[] = $this->registry->lang['controller']['errStatusMustGreaterThanZero'];
			$pass = false;
		}
		
		return $pass;
	}
	//Kiem tra du lieu nhap trong form cap nhat
	private function editActionValidator($formData, &$error)
	{
		$pass = true;
		
		

		if($formData['fname'] == '')
		{
			$error[] = $this->registry->lang['controller']['errNameRequired'];
			$pass = false;
		}

		if($formData['fslug'] == '')
		{
			$error[] = $this->registry->lang['controller']['errSlugRequired'];
			$pass = false;
		}

		if($formData['fsummary'] == '')
		{
			$error[] = $this->registry->lang['controller']['errSummaryRequired'];
			$pass = false;
		}

		if($formData['fparentid'] <= 0)
		{
			$error[] = $this->registry->lang['controller']['errParentidMustGreaterThanZero'];
			$pass = false;
		}

		if($formData['fstatus'] <= 0)
		{
			$error[] = $this->registry->lang['controller']['errStatusMustGreaterThanZero'];
			$pass = false;
		}
				
		return $pass;
	}
}

?>