<?php
/** 
* Component : Quản lý tin tức
* Written by : vsCMS Dev Group
* Date Created : 02/11/2013
*/

Class Controller_Admin_News Extends Controller_Admin_Base 
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
		
		
		$uidFilter = (int)($this->registry->router->getArg('uid'));
		$ncidFilter = (int)($this->registry->router->getArg('ncid'));
		$countviewFilter = (int)($this->registry->router->getArg('countview'));
		$countreviewFilter = (int)($this->registry->router->getArg('countreview'));
		$displayorderFilter = (int)($this->registry->router->getArg('displayorder'));
		$statusFilter = (int)($this->registry->router->getArg('status'));
		$ipaddressFilter = (int)($this->registry->router->getArg('ipaddress'));
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
            if($_SESSION['newsBulkToken']==$_POST['ftoken'])
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
                            $myNews = new Core_News($id);
                            
                            if($myNews->id > 0)
                            {
                                //tien hanh xoa
                                if($myNews->delete())
                                {
                                    $deletedItems[] = $myNews->id;
                                    $this->registry->me->writelog('news_delete', $myNews->id, array());      
                                }
                                else
                                    $cannotDeletedItems[] = $myNews->id;
                            }
                            else
                                $cannotDeletedItems[] = $myNews->id;
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
		
		$_SESSION['newsBulkToken']=Helper::getSecurityToken();//Gan token de kiem soat viec nhan nut submit form   		
		
		$paginateUrl = $this->registry->conf['rooturl'].$this->registry->controllerGroup . '/'.$this->registry->controller.'/index/';      
		
		

		if($uidFilter > 0)
		{
			$paginateUrl .= 'uid/'.$uidFilter . '/';
			$formData['fuid'] = $uidFilter;
			$formData['search'] = 'uid';
		}

		if($ncidFilter > 0)
		{
			$paginateUrl .= 'ncid/'.$ncidFilter . '/';
			$formData['fncid'] = $ncidFilter;
			$formData['search'] = 'ncid';
		}

		if($countviewFilter > 0)
		{
			$paginateUrl .= 'countview/'.$countviewFilter . '/';
			$formData['fcountview'] = $countviewFilter;
			$formData['search'] = 'countview';
		}

		if($countreviewFilter > 0)
		{
			$paginateUrl .= 'countreview/'.$countreviewFilter . '/';
			$formData['fcountreview'] = $countreviewFilter;
			$formData['search'] = 'countreview';
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

		if($ipaddressFilter > 0)
		{
			$paginateUrl .= 'ipaddress/'.$ipaddressFilter . '/';
			$formData['fipaddress'] = $ipaddressFilter;
			$formData['search'] = 'ipaddress';
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

			if($searchKeywordIn == 'title')
			{
				$paginateUrl .= 'searchin/title/';
			}
			elseif($searchKeywordIn == 'content')
			{
				$paginateUrl .= 'searchin/content/';
			}
			elseif($searchKeywordIn == 'source')
			{
				$paginateUrl .= 'searchin/source/';
			}
			$formData['fkeyword'] = $formData['fkeywordFilter'] = $keywordFilter;
			$formData['fsearchin'] = $formData['fsearchKeywordIn'] = $searchKeywordIn;
			$formData['search'] = 'keyword';
		}
				
		//tim tong so
		$total = Core_News::getNewss($formData, $sortby, $sorttype, 0, true);    
		$totalPage = ceil($total/$this->recordPerPage);
		$curPage = $page;
		
			
		//get latest account
		$newss = Core_News::getNewss($formData, $sortby, $sorttype, (($page - 1)*$this->recordPerPage).','.$this->recordPerPage);
		
		//filter for sortby & sorttype
		$filterUrl = $paginateUrl;
		
		//append sort to paginate url
		$paginateUrl .= 'sortby/' . $sortby . '/sorttype/' . $sorttype . '/';
		
		
		//build redirect string
		$redirectUrl = $paginateUrl;
		if($curPage > 1)
			$redirectUrl .= 'page/' . $curPage;
			
		
		$redirectUrl = base64_encode($redirectUrl);
		
				
		$this->registry->smarty->assign(array(	'newss' 	=> $newss,
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
            if($_SESSION['newsAddToken'] == $_POST['ftoken'])
            {
                 $formData = array_merge($formData, $_POST);
                
                                
                if($this->addActionValidator($formData, $error))
                {
                    $myNews = new Core_News();

					
					$myNews->ncid = $formData['fncid'];
					$myNews->image = $formData['fimage'];
					$myNews->title = $formData['ftitle'];
					$myNews->slug = $formData['fslug'];
					$myNews->content = $formData['fcontent'];
					$myNews->source = $formData['fsource'];
					$myNews->seotitle = $formData['fseotitle'];
					$myNews->seokeyword = $formData['fseokeyword'];
					$myNews->seodescription = $formData['fseodescription'];
					$myNews->metarobot = $formData['fmetarobot'];
					$myNews->status = $formData['fstatus'];
					
                    if($myNews->addData())
                    {
                        $success[] = $this->registry->lang['controller']['succAdd'];
                        $this->registry->me->writelog('news_add', $myNews->id, array());
                        $formData = array();      
                    }
                    else
                    {
                        $error[] = $this->registry->lang['controller']['errAdd'];            
                    }
                }
            }
            
		}
		
		$_SESSION['newsAddToken']=Helper::getSecurityToken();//Tao token moi
		
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
		$myNews = new Core_News($id);
		
		$redirectUrl = $this->getRedirectUrl();
		if($myNews->id > 0)
		{
			$error 		= array();
			$success 	= array();
			$contents 	= '';
			$formData 	= array();
			
			$formData['fbulkid'] = array();
			
			
			$formData['fuid'] = $myNews->uid;
			$formData['fncid'] = $myNews->ncid;
			$formData['fid'] = $myNews->id;
			$formData['fimage'] = $myNews->image;
			$formData['ftitle'] = $myNews->title;
			$formData['fslug'] = $myNews->slug;
			$formData['fcontent'] = $myNews->content;
			$formData['fsource'] = $myNews->source;
			$formData['fseotitle'] = $myNews->seotitle;
			$formData['fseokeyword'] = $myNews->seokeyword;
			$formData['fseodescription'] = $myNews->seodescription;
			$formData['fmetarobot'] = $myNews->metarobot;
			$formData['fcountview'] = $myNews->countview;
			$formData['fcountreview'] = $myNews->countreview;
			$formData['fdisplayorder'] = $myNews->displayorder;
			$formData['fstatus'] = $myNews->status;
			$formData['fipaddress'] = $myNews->ipaddress;
			$formData['fresourceserver'] = $myNews->resourceserver;
			$formData['fdatecreated'] = $myNews->datecreated;
			$formData['fdatemodified'] = $myNews->datemodified;
			
			if(!empty($_POST['fsubmit']))
			{
                if($_SESSION['newsEditToken'] == $_POST['ftoken'])
                {
                    $formData = array_merge($formData, $_POST);
                    					
                    if($this->editActionValidator($formData, $error))
                    {
						
						$myNews->ncid = $formData['fncid'];
						$myNews->image = $formData['fimage'];
						$myNews->title = $formData['ftitle'];
						$myNews->slug = $formData['fslug'];
						$myNews->content = $formData['fcontent'];
						$myNews->source = $formData['fsource'];
						$myNews->seotitle = $formData['fseotitle'];
						$myNews->seokeyword = $formData['fseokeyword'];
						$myNews->seodescription = $formData['fseodescription'];
						$myNews->metarobot = $formData['fmetarobot'];
						$myNews->status = $formData['fstatus'];
                        
                        if($myNews->updateData())
                        {
                            $success[] = $this->registry->lang['controller']['succUpdate'];
                            $this->registry->me->writelog('news_edit', $myNews->id, array());
                        }
                        else
                        {
                            $error[] = $this->registry->lang['controller']['errUpdate'];            
                        }
                    }
                }
                
				    
			}
			
			
			$_SESSION['newsEditToken'] = Helper::getSecurityToken();//Tao token moi
			
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
		$myNews = new Core_News($id);
		if($myNews->id > 0)
		{
			//tien hanh xoa
			if($myNews->delete())
			{
				$redirectMsg = str_replace('###id###', $myNews->id, $this->registry->lang['controller']['succDelete']);
				
				$this->registry->me->writelog('news_delete', $myNews->id, array());  	
			}
			else
			{
				$redirectMsg = str_replace('###id###', $myNews->id, $this->registry->lang['controller']['errDelete']);
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
		
		

		if($formData['fncid'] <= 0)
		{
			$error[] = $this->registry->lang['controller']['errNcidMustGreaterThanZero'];
			$pass = false;
		}

		if($formData['ftitle'] == '')
		{
			$error[] = $this->registry->lang['controller']['errTitleRequired'];
			$pass = false;
		}

		if($formData['fcontent'] == '')
		{
			$error[] = $this->registry->lang['controller']['errContentRequired'];
			$pass = false;
		}
		
		return $pass;
	}
	//Kiem tra du lieu nhap trong form cap nhat
	private function editActionValidator($formData, &$error)
	{
		$pass = true;
		
		

		if($formData['fncid'] <= 0)
		{
			$error[] = $this->registry->lang['controller']['errNcidMustGreaterThanZero'];
			$pass = false;
		}

		if($formData['ftitle'] == '')
		{
			$error[] = $this->registry->lang['controller']['errTitleRequired'];
			$pass = false;
		}

		if($formData['fcontent'] == '')
		{
			$error[] = $this->registry->lang['controller']['errContentRequired'];
			$pass = false;
		}
				
		return $pass;
	}
}

?>