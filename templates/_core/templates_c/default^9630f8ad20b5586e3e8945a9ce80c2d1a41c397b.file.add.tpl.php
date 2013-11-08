<?php /* Smarty version Smarty-3.0.7, created on 2013-10-29 22:41:47
         compiled from "templates/default/_controller/admin/news/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:833231504526fd73bba8b88-68289005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9630f8ad20b5586e3e8945a9ce80c2d1a41c397b' => 
    array (
      0 => 'templates/default/_controller/admin/news/add.tpl',
      1 => 1382870755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '833231504526fd73bba8b88-68289005',
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
">News</a> <span class="divider">/</span></li>
	<li class="active"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</li>
</ul>

<div class="page-header" rel="menu_news_list" id="news-section"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</h1></div>

<div class="navgoback"><a href="<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formBackLabel'];?>
</a></div>

<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['newsAddToken'];?>
" />


	<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	

	<div class="control-group">
		<label class="control-label" for="fncid"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelNcid'];?>
 <span class="star_require">*</span></label>
		<div class="controls"><input type="text" name="fncid" id="fncid" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fncid']);?>
" class="input-mini"></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fimage"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelImage'];?>
</label>
		<div class="controls"><input type="text" name="fimage" id="fimage" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fimage']);?>
" class="input-xlarge"></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="ftitle"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelTitle'];?>
 <span class="star_require">*</span></label>
		<div class="controls"><input type="text" name="ftitle" id="ftitle" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['ftitle']);?>
" class="input-xlarge"></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fslug"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSlug'];?>
</label>
		<div class="controls"><input type="text" name="fslug" id="fslug" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fslug']);?>
" class="input-xlarge"></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fcontent"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelContent'];?>
 <span class="star_require">*</span></label>
		<div class="controls"><textarea name="fcontent" id="fcontent" cols="50" rows="4" class="mceEditor"><?php echo $_smarty_tpl->getVariable('formData')->value['fcontent'];?>
</textarea></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fsource"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSource'];?>
</label>
		<div class="controls"><input type="text" name="fsource" id="fsource" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fsource']);?>
" class="input-xlarge"></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fseotitle"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSeotitle'];?>
</label>
		<div class="controls"><input type="text" name="fseotitle" id="fseotitle" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fseotitle']);?>
" class="input-xlarge"></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fseokeyword"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSeokeyword'];?>
</label>
		<div class="controls"><textarea name="fseokeyword" id="fseokeyword" rows="7" class="input-xxlarge"><?php echo $_smarty_tpl->getVariable('formData')->value['fseokeyword'];?>
</textarea></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fseodescription"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSeodescription'];?>
</label>
		<div class="controls"><textarea name="fseodescription" id="fseodescription" rows="7" class="input-xxlarge"><?php echo $_smarty_tpl->getVariable('formData')->value['fseodescription'];?>
</textarea></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fmetarobot"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelMetarobot'];?>
</label>
		<div class="controls"><input type="text" name="fmetarobot" id="fmetarobot" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fmetarobot']);?>
" class="input-xlarge"></div>
	</div>

	<div class="control-group">
		<label class="control-label" for="fstatus"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelStatus'];?>
</label>
		<div class="controls"><input type="text" name="fstatus" id="fstatus" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fstatus']);?>
" class="input-mini"></div>
	</div>
	
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formAddSubmit'];?>
" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>	
	
</form>




