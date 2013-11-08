<?php /* Smarty version Smarty-3.0.7, created on 2013-11-05 21:43:02
         compiled from "templates/default/_controller/admin/role/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2016006069527903f6a0e396-06714293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc6a198da3a3efa332baf74755dbbc5995b6e8ae' => 
    array (
      0 => 'templates/default/_controller/admin/role/add.tpl',
      1 => 1383662581,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2016006069527903f6a0e396-06714293',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_cms'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menudashboard'];?>
</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
<?php echo $_smarty_tpl->getVariable('controllerGroup')->value;?>
/<?php echo $_smarty_tpl->getVariable('controller')->value;?>
">Role</a> <span class="divider">/</span></li>
	<li class="active">Add</li>
</ul>

<div class="page-header" rel="menu_role_list" id="user-section"><h1>Add Controller Permission</h1></div>


<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="span12" id="container-in">

	<form method="POST" action="" class="bs-docs">
		<fieldset>
			
			<select name="selectfrom" id="select-from" multiple size="10">
		      <option value="1">Item 1</option>
		      <option value="2">Item 2</option>
		      <option value="3">Item 3</option>
		      <option value="4">Item 4</option>
		    </select>
			
		    <a href="javascript:void(0);" id="btn-add">Add &raquo;</a>
		    <a href="javascript:void(0);" id="btn-remove">&laquo; Remove</a>
		 
		    <select name="selectto" id="select-to" multiple size="10">
		      <option value="5">Item 5</option>
		      <option value="6">Item 6</option>
		      <option value="7">Item 7</option>
		    </select>
		</fieldset>
	</form>
</div>