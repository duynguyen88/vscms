<?php /* Smarty version Smarty-3.0.7, created on 2013-11-03 20:42:23
         compiled from "templates/default/_controller/admin/usergroup/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1936655261527652bf2a63f5-58705820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85f389eb80e2c5ebced1e38662704ce5e3306cfc' => 
    array (
      0 => 'templates/default/_controller/admin/usergroup/add.tpl',
      1 => 1383486141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1936655261527652bf2a63f5-58705820',
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
">UserGroup</a> <span class="divider">/</span></li>
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</li>
</ul>

<div class="page-header" rel="menu_usergroup_list" id="user-section"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</h1></div>

<div class="navgoback"><a href="<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formBackLabel'];?>
</a></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['usergroupAddToken'];?>
" />


	<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	

	<div class="control-group">
		<label class="control-label" for="fname"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelName'];?>
 <span class="star_require">*</span></label>
		<div class="controls"><input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fname']);?>
" class="input-xlarge"></div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fvalue"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelValue'];?>
 <span class="star_require">*</span></label>
		<div class="controls"><input type="text" name="fvalue" id="fvalue" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fvalue']);?>
" class="input-mini"></div>
	</div>
	
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formAddSubmit'];?>
" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>	
	
</form>


