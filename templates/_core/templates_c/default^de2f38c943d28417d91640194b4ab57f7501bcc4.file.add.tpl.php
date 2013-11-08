<?php /* Smarty version Smarty-3.0.7, created on 2013-11-03 18:59:14
         compiled from "templates/default/_controller/admin/photo/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179163626452763a929d24c0-33383760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de2f38c943d28417d91640194b4ab57f7501bcc4' => 
    array (
      0 => 'templates/default/_controller/admin/photo/add.tpl',
      1 => 1382801825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179163626452763a929d24c0-33383760',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menudashboard'];?>
</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
">Photo</a> <span class="divider">/</span></li>
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</li>
</ul>



<div class="page-header" rel="menu_photo_add" id="photo-section"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</h1></div>

<form action="" method="post" name="myform" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['photoAddToken'];?>
" />


	<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('smartyControllerGroupContainer')->value)."notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	<div class="control-group">
		<label class="control-label" for="fcategory">Category</label>
		<div class="controls">
			<select id="fcategory" name="fcategory">
				<option value="">- - - -</option>
				<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categoryList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
?>
						<option value="<?php echo $_smarty_tpl->getVariable('category')->value->id;?>
" <?php if ($_smarty_tpl->getVariable('formData')->value['fcategory']==$_smarty_tpl->getVariable('category')->value->id){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('category')->value->title;?>
</option>
				<?php }} ?>
			</select>
		</div>
	</div>	
	
	<div class="control-group">
		<label class="control-label" for="fimage">Upload Photo <span class="star_require">*</span></label>
		<div class="controls">
			<input type="file" name="fimage" id="fimage" />
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="ftitle">Title <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="ftitle" id="ftitle" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['ftitle']);?>
" class=""/>
		</div>
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="fdescription">Description</label>
		<div class="controls">
			<textarea class="input-xxlarge" rows="5" name="fdescription" id="fdescription"><?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fdescription']);?>
</textarea>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fenable">Enable</label>
		<div class="controls">
			<select class="input-small" name="fenable" id="fenable">
				<option value="1"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formYesLabel'];?>
</option>
				<option value="0" <?php if ($_smarty_tpl->getVariable('formData')->value['fenable']=='0'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formNoLabel'];?>
</option>
			</select>
		</div>
	</div>
	
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formAddSubmit'];?>
" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>
			
	
</form>








