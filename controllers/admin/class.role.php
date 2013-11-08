<?php
class Controller_Admin_Role extends Controller_Admin_Base
{
	public function indexAction()
	{
		// redirectUrl is page referer
		$redirectUrl = $this->getRedirectUrl();

		$group = Core_Usergroup::getUsergroups($formData = array(), 'id', 'ASC');

		$groupPermission = $GLOBALS['groupPermisson'];

		// $rc = new ReflectionClass('Controller_Admin_News');
		// var_dump($rc->getDocComment());

		$redirectUrl = base64_encode($redirectUrl);

		$this->registry->smarty->assign(array( 'groupPermission' => $groupPermission,
				'groupid' => $group,
				'redirectUrl' => $redirectUrl));

		$contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'index.tpl');
		$this->registry->smarty->assign(array( 'pageTitle' => $this->registry->language['admin']['pageTitle_list'],
				'contents' => $contents));
		$this->registry->smarty->display($this->registry->smartyControllerGroupContainer.'index.tpl');
	}

	public function addAction()
	{
		$groupid = $this->registry->router->getArg('fgroupid');
		$groupcontroller = $this->registry->router->getArg('fcgkey');



		$contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'add.tpl');
		$this->registry->smarty->assign(array( 'pageTitle' => $this->registry->language['admin']['pageTitle_list'],
				'contents' => $contents));
		$this->registry->smarty->display($this->registry->smartyControllerGroupContainer.'index.tpl');
	}

	public function editAction()
	{
		$redirectUrl = $this->getRedirectUrl();

		$error = $warning = $success = array();
		$formData = array();
		$groupPermisson = $GLOBALS['groupPermisson'];
		$cgkey = $this->registry->router->getArg('fcgkey');
		$groupid = $this->registry->router->getArg('fgroupid');
		$gpRebuild = array();

		$group = array();
		$groupdb = Core_Usergroup::getUsergroups($formData = array(), 'id', 'ASC');

		foreach($groupdb as $gdb)
		{
			$group[] = $gdb->value;
		}

		$myGroup = Core_Usergroup::getUsergroups(array('fvalue' => $groupid), '', '');
		$groupname = $myGroup[0]->name;

		if(!empty($_POST['fsubmit']))
		{
			$formData['flag'] = 1;

			array_splice($groupPermisson[$groupid][$cgkey], 0);

			if(isset($_POST['fbulkid']))
			{
				$formData = array_merge($_POST['fbulkid'], $formData);

				foreach ($formData as $controllerkey => $controllervalue)
				{
					$value = '';

					if($controllerkey != 'flag')
					{
						$totalUpdateAction = count($controllervalue);
						if($totalUpdateAction == $_SESSION['roleManage'][$controllerkey]['totalAction'])
						{
							$value .= $controllerkey . '_*';

							if($controllerkey != 'flag')
								array_push($groupPermisson[$groupid][$cgkey], $value);
						}
						else
						{
							foreach ($controllervalue as $action)
							{
								$value .= $controllerkey . '_' . $action;

								if($controllerkey != 'flag')
									array_push($groupPermisson[$groupid][$cgkey], $value);

								unset($value);
							}
						}
					}

				}

				$file = './includes/permission.php';
				$current = file_get_contents($file);
				file_put_contents($file, "");
				file_put_contents($file, "<?php \n");
				$groupUpdate = '';

				foreach ($group as $gkey => $gv)
				{
					$update = '';

					$update .= "\t" . '$groupPermisson[' .$gv. '] = array(' . "\n";

					foreach ($groupPermisson[$gv] as $cgkeys => $cgvalue)
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
				//echodebug($current);
			}
		}

		//$_SESSION['roleEditToken']=Helper::getSecurityToken();//Tao token moi

		$gpRebuild['GROUPID'] = $groupid;
		$gpRebuild['GROUP_CONTROLLER'] = $cgkey;
		$gpRebuild['CONTROLLER'] = array();

		foreach ($groupPermisson[$groupid][$cgkey] as $controller)
		{
			$controllerArray = explode('_', $controller);
			$gpRebuild['CONTROLLER'][$controllerArray[0]] = array();
			$gpRebuild['CONTROLLER'][$controllerArray[0]]['CURRENT'] = array();
		}

		foreach ($groupPermisson[$groupid][$cgkey] as $gpk => $gpv)
		{
			$actionname = explode('_', $gpv);
			$classname = 'Controller_' . ucwords($cgkey) . '_' . ucwords($actionname['0']);
			$class_methods = get_class_methods($classname);
			$gpRebuild['CONTROLLER'][$actionname[0]]['CURRENT'][] = $actionname[1];

			foreach ($class_methods as $method)
			{
				preg_match('/(.*)Action/', $method, $matches);
				$keywords = preg_split('/Action/', $matches[1], -1, PREG_SPLIT_NO_EMPTY);


				if(array_key_exists(0, $keywords))
					$gpRebuild['CONTROLLER'][$actionname[0]][] = $keywords[0];

			}

		}

		foreach ($groupPermisson[$groupid][$cgkey] as $gpkey => $gpvalue)
		{
			$ctlArray = explode('_', $gpvalue);

			$redup = array_unique($gpRebuild['CONTROLLER'][$ctlArray[0]]);

			$gpRebuild['CONTROLLER'][$ctlArray[0]] = $redup;

			$_SESSION['roleManage'][$ctlArray[0]]['totalAction'] = count($gpRebuild['CONTROLLER'][$ctlArray[0]]) - 1;
			//echodebug($_SESSION['roleManage'][$ctlArray[0]]['totalAction']);
		}


		//echodebug($gpRebuild);
		//echodebug($groupPermisson[$groupid][$cgkey]);

		$this->registry->smarty->assign(array( 'error' => $error,
				'warning' => $warning,
				'success' => $success,
				'formData' => $formData,
				'gpRebuild' => $gpRebuild,
				'groupdb' => $groupdb,
				'groupname' => $groupname,
				'redirectUrl'=> $redirectUrl));

		$contents = $this->registry->smarty->fetch($this->registry->smartyControllerContainer.'edit.tpl');
		$this->registry->smarty->assign(array( 'pageTitle' => $this->registry->language['admin']['pageTitle_list'],
				'contents' => $contents));
		$this->registry->smarty->display($this->registry->smartyControllerGroupContainer.'index.tpl');

	}

	function ajaxinfoAction()
	{
		if(isset($_POST['finfo']))
		{
			$output = array();

			$infoArray = explode(':', $_POST['finfo']);
			$classname = new ReflectionClass('Controller_' . ucwords($infoArray[1]) . '_' . ucwords($infoArray[2]));
			$information = explode('*', $classname->getDocComment());

			if($information[3] != '')
			{
				$output = array('component' => $information[3],
					'written' => $information[4],
					'date' => $information[5],
					'groupid' => $infoArray[0],
					'cgroup' => $infoArray[1]);
			}
			else
			{
				$output = array('component' => 'Component : System',
					'written' => 'Written : vsCMS Dev Group',
					'date' => 'Date Created : 02/11/2013',
					'groupid' => $infoArray[0],
					'cgroup' => $infoArray[1]);
			}

			echo json_encode($output);
		}
	}



}