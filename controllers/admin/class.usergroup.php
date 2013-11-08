<?php
/** 
* Component : Quản lý nhóm người dùng
* Written by : vsCMS Dev Group
* Date Created : 03/11/2013
*/

Class Controller_Admin_UserGroup Extends Controller_Admin_Base 
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
            if($_SESSION['usergroupBulkToken']==$_POST['ftoken'])
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
                            $myUserGroup = new Core_UserGroup($id);
                            
                            if($myUserGroup->id > 0)
                            {
                                //tien hanh xoa
                                if($myUserGroup->delete())
                                {
                                    $deletedItems[] = $myUserGroup->id;
                                    $this->registry->me->writelog('usergroup_delete', $myUserGroup->id, array());      
                                }
                                else
                                    $cannotDeletedItems[] = $myUserGroup->id;
                            }
                            else
                                $cannotDeletedItems[] = $myUserGroup->id;
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
		
		$_SESSION['usergroupBulkToken']=Helper::getSecurityToken();//Gan token de kiem soat viec nhan nut submit form   		
		
		$paginateUrl = $this->registry->conf['rooturl'].$this->registry->controllerGroup . '/'.$this->registry->controller.'/index/';      
		
		

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
			$formData['fkeyword'] = $formData['fkeywordFilter'] = $keywordFilter;
			$formData['fsearchin'] = $formData['fsearchKeywordIn'] = $searchKeywordIn;
			$formData['search'] = 'keyword';
		}
		
		//tim tong so
		$total = Core_UserGroup::getUserGroups($formData, $sortby, $sorttype, 0, true);    
		$totalPage = ceil($total/$this->recordPerPage);
		$curPage = $page;
		
			
		//get latest account
		$usergroups = Core_UserGroup::getUserGroups($formData, $sortby, $sorttype, (($page - 1)*$this->recordPerPage).','.$this->recordPerPage);
		
		//filter for sortby & sorttype
		$filterUrl = $paginateUrl;
		
		//append sort to paginate url
		$paginateUrl .= 'sortby/' . $sortby . '/sorttype/' . $sorttype . '/';
		
		
		//build redirect string
		$redirectUrl = $paginateUrl;
		if($curPage > 1)
			$redirectUrl .= 'page/' . $curPage;
			
		
		$redirectUrl = base64_encode($redirectUrl);
		
				
		$this->registry->smarty->assign(array(	'usergroups' 	=> $usergroups,
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
            if($_SESSION['usergroupAddToken'] == $_POST['ftoken'])
            {
                 $formData = array_merge($formData, $_POST);
                
                                
                if($this->addActionValidator($formData, $error))
                {
                    $myUserGroup = new Core_UserGroup();

					
					$myUserGroup->value = $formData['fvalue'];
					$myUserGroup->name = $formData['fname'];

					// Add block to permission file
					if(!isset($groupPermisson[$formData['key']]))
					{
						$updateContent = '';

						$file = './includes/permission.php';
						$updateContent .= "\t" . '$groupPermisson['.$formData['fvalue'].'] = array(' . "\n";
						$updateContent .= "\t\t" . "'site'\t\t" . '=>' . "\t" . 'array(' . "\n";
						$updateContent .= "\t\t" . '),' . "\n";
						$updateContent .= "\t\t" . "'admin'\t\t" . '=>' . "\t" . 'array(' . "\n";
						$updateContent .= "\t\t" . '),' . "\n";
						$updateContent .= "\t" . ');' . "\n\n";

						file_put_contents($file, $updateContent, FILE_APPEND);
					}
					
					
                    if($myUserGroup->addData())
                    {
                        $success[] = $this->registry->lang['controller']['succAdd'];
                        $this->registry->me->writelog('usergroup_add', $myUserGroup->id, array());
                        $formData = array();      
                    }
                    else
                    {
                        $error[] = $this->registry->lang['controller']['errAdd'];            
                    }
                }
            }
            
		}
		
		$_SESSION['usergroupAddToken']=Helper::getSecurityToken();//Tao token moi
		
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
	
	
	
	/*
function editAction()
	{
		$id = (int)$this->registry->router->getArg('id');
		$myUserGroup = new Core_UserGroup($id);
		
		$redirectUrl = $this->getRedirectUrl();
		if($myUserGroup->id > 0)
		{
			$error 		= array();
			$success 	= array();
			$contents 	= '';
			$formData 	= array();
			
			$formData['fbulkid'] = array();
			
			
			$formData['fid'] = $myUserGroup->id;
			$formData['fvalue'] = $myUserGroup->value;
			$formData['fname'] = $myUserGroup->name;
			$formData['fdatecreated'] = $myUserGroup->datecreated;
			$formData['fdatemodified'] = $myUserGroup->datemodified;
			
			if(!empty($_POST['fsubmit']))
			{
                if($_SESSION['usergroupEditToken'] == $_POST['ftoken'])
                {
                    $formData = array_merge($formData, $_POST);
                    					
                    if($this->editActionValidator($formData, $error))
                    {
						
						$myUserGroup->value = $formData['fvalue'];
						$myUserGroup->name = $formData['fname'];
                        
                        if($myUserGroup->updateData())
                        {
                            $success[] = $this->registry->lang['controller']['succUpdate'];
                            $this->registry->me->writelog('usergroup_edit', $myUserGroup->id, array());
                        }
                        else
                        {
                            $error[] = $this->registry->lang['controller']['errUpdate'];            
                        }
                    }
                }
                
				    
			}
			
			
			$_SESSION['usergroupEditToken'] = Helper::getSecurityToken();//Tao token moi
			
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
*/

	function deleteAction()
	{
		$groupPermisson = $GLOBALS['groupPermisson'];
		$id = (int)$this->registry->router->getArg('id');
		$myUserGroup = new Core_UserGroup($id);
		if($myUserGroup->id > 0)
		{
			//tien hanh xoa
			if($myUserGroup->delete())
			{
				$redirectMsg = str_replace('###id###', $myUserGroup->id, $this->registry->lang['controller']['succDelete']);
				
				$this->registry->me->writelog('usergroup_delete', $myUserGroup->id, array());  
				
				unset($groupPermisson[$myUserGroup->value]);
				
				
				$groupdb = Core_Usergroup::getUsergroups($formData = array(), 'id', 'ASC');
				
				$file = './includes/permission.php';
				$current = file_get_contents($file);
				file_put_contents($file, "");
				file_put_contents($file, "<?php \n");
				$groupUpdate = '';
				
				foreach ($groupdb as $group)
				{
					$update = '';

					$update .= "\t" . '$groupPermisson[' .$group->value. '] = array(' . "\n";
					
					
					foreach ($groupPermisson[$group->value] as $cgkeys => $cgvalue)
					{
						$update .= "\t\t" . "'$cgkeys'" . "\t\t" . '=>' ."\t". 'array(' . "\n";

						foreach ($cgvalue as $action)
						{
							$update .= "\t\t\t" . "'$action',\n";
						}

						$update .= "\t\t" . '),' . "\n"; 
					}

					$update .= "\t" . ');' . "\n\n";
			
					file_put_contents($file, $update, FILE_APPEND);
				}
			}
			else
			{
				$redirectMsg = str_replace('###id###', $myUserGroup->id, $this->registry->lang['controller']['errDelete']);
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
		
		

		

		if($formData['fvalue'] == '')
		{
			$error[] = $this->registry->lang['controller']['errValueRequired'];
			$pass = false;
		}

		if($formData['fname'] == '')
		{
			$error[] = $this->registry->lang['controller']['errNameRequired'];
			$pass = false;
		}
		
		return $pass;
	}
	//Kiem tra du lieu nhap trong form cap nhat
	private function editActionValidator($formData, &$error)
	{
		$pass = true;
		
		


		if($formData['fvalue'] == '')
		{
			$error[] = $this->registry->lang['controller']['errValueRequired'];
			$pass = false;
		}

		if($formData['fname'] == '')
		{
			$error[] = $this->registry->lang['controller']['errNameRequired'];
			$pass = false;
		}
				
		return $pass;
	}
}

?>