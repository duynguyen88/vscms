<?php /* Smarty version Smarty-3.0.7, created on 2013-11-03 19:06:43
         compiled from "templates/default/_controller/admin/codegenerator/generate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200560663152763c53e737d6-25156813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88e5f825d746fc139578d8aeadbba4c692527b77' => 
    array (
      0 => 'templates/default/_controller/admin/codegenerator/generate.tpl',
      1 => 1382802278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200560663152763c53e737d6-25156813',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
">Dashboard</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
<?php echo $_smarty_tpl->getVariable('controller')->value;?>
">Code Generator</a> <span class="divider">/</span></li>
	<li class="active">Generating for table <em><?php echo $_smarty_tpl->getVariable('table')->value;?>
</em></li>
</ul>

<div class="page-header" rel="menu_codegenerator" id="utility-section"><h1><?php echo $_smarty_tpl->getVariable('table')->value;?>
</h1></div>


<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="<?php echo $_SESSION['generatingToken'];?>
" />


	<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value);$_template->assign('notifyWarning',$_smarty_tpl->getVariable('warning')->value);$_template->assign('notifyInformation',$_smarty_tpl->getVariable('information')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
	
	
	
	<fieldset>
	    <legend>MODEL settings</legend>
	
		
		
		
		<div class="control-group">
			<label class="control-label" for="fmodule">Class Name <span class="star_require">*</span></label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">Core_</span><input type="text" name="fmodule" id="fmodule" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fmodule']);?>
" class="">
				</div>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="ftablealias">Table Alias</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><?php echo $_smarty_tpl->getVariable('table')->value;?>
 </span><span class="add-on">  </span><input type="text" class="input-mini" name="ftablealias" id="ftablealias" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['ftablealias']);?>
" class="">
				</div>
			</div>
		</div>
			
		<div class="control-group">
			<label class="control-label" for="fclassextend">Mapping <span class="star_require">*</span></label>
			<div class="controls">
			

				<table class="table table-striped" cellpadding="5" width="100%">
					<?php if (count($_smarty_tpl->getVariable('columnData')->value)>0){?>
						<thead>
							<tr>
								<th width="250">Column Name</th>
								<th>Class Property</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>

						<tbody>
					<?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columnData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value){
?>
						<?php $_smarty_tpl->tpl_vars["colField"] = new Smarty_variable($_smarty_tpl->tpl_vars['col']->value['Field'], null, null);?>
							<tr>
								<td><b><?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
</b> <span class="label"><?php echo $_smarty_tpl->tpl_vars['col']->value['Type'];?>
</span> <?php if ($_smarty_tpl->tpl_vars['col']->value['Key']=='PRI'){?><span class="label label-important">Primary</span><?php }?><?php if ($_smarty_tpl->tpl_vars['col']->value['Key']=='MUL'){?><span class="label label-info">Index</span><?php }?></td>
								<td><input type="hidden" name="ftype[<?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['col']->value['Type'];?>
" /><input type="text" name="fprop[<?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
]" value="<?php echo $_smarty_tpl->getVariable('formData')->value['fprop'][$_smarty_tpl->getVariable('colField')->value];?>
" /></td>
								<td><label class="checkbox"><input type="checkbox" name="ffilterable[<?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
]" value="1" <?php if ($_smarty_tpl->tpl_vars['col']->value['Key']=='PRI'||$_smarty_tpl->tpl_vars['col']->value['Key']=='MUL'){?>checked="checked"<?php }?> <?php if ($_smarty_tpl->tpl_vars['col']->value['Key']=='PRI'){?>disabled="disabled"<?php }?> <?php if (isset($_smarty_tpl->getVariable('formData',null,true,false)->value['ffilterable'][$_smarty_tpl->getVariable('colField',null,true,false)->value])){?>checked="checked"<?php }?> /> Filterable</label></td>
								<td><label class="checkbox"><input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['col']->value['Key']!='PRI'){?> name="fsortable[<?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
]"<?php }?> value="1" <?php if ($_smarty_tpl->tpl_vars['col']->value['Key']=='PRI'){?>checked="checked" disabled="disabled"<?php }?> <?php if (isset($_smarty_tpl->getVariable('formData',null,true,false)->value['fsortable'][$_smarty_tpl->getVariable('colField',null,true,false)->value])){?>checked="checked"<?php }?> /> Sortable</label></td>
								<td><?php if (in_array($_smarty_tpl->tpl_vars['col']->value['Field'],$_smarty_tpl->getVariable('formData')->value['textfield'])){?><label class="checkbox"> <input type="checkbox" name="fsearchabletext[<?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
]" <?php if (isset($_smarty_tpl->getVariable('formData',null,true,false)->value['fsearchabletext'][$_smarty_tpl->getVariable('colField',null,true,false)->value])){?>checked="checked"<?php }?> value="1" /> Searchable Text</label><?php }?></td>
							</tr>

					<?php }} ?>
						</tbody>
					<?php }?>


				</table>

			</div>
		</div>
	</fieldset>
	
	<div>
			<label class="checkbox"><input type="checkbox" <?php if ($_smarty_tpl->getVariable('formData')->value['fadmincontrollertoggler']==1){?>checked="checked"<?php }?> name="fadmincontrollertoggler" id="fadmincontrollertoggler" value="1" onchange="javascript:admincontrollertoggle()" /><span class="label label-warning">Enable generate manage CONTROLLER (Admin)</span></label>
	</div>
	
	<fieldset id="admincontrollergenerator" class="<?php if ($_smarty_tpl->getVariable('formData')->value['fadmincontrollertoggler']!=1){?>hide<?php }?>">
	    <legend>CONTROLLER settings</legend>
	
		<div class="control-group">
			<label class="control-label" for="fcontrollergroup">CONTROLLER GROUP <span class="star_require">*</span></label>
			<div class="controls">
					<select name="fcontrollergroup" id="fcontrollergroup" class="input-small">
						<option value="Admin" <?php if ($_smarty_tpl->getVariable('formData')->value['fcontrollergroup']=='Admin'){?>selected="selected"<?php }?>>Admin</option>
					</select>
			</div>
		</div>
		
		
		<div class="control-group">
			<label class="control-label" for="fadmincontroller">Class Name <span class="star_require">*</span></label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">Controller_{{CONTROLLER_GROUP}}_</span><input type="text" name="fadmincontroller" id="fadmincontroller" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fadmincontroller']);?>
" class="">
				</div>
			</div>
		</div>
			
		<div class="control-group">
			<label class="control-label" for="fclassextend">Mapping <span class="star_require">*</span></label>
			<div class="controls">
			

				<table class="table table-striped" cellpadding="5" width="100%">
					<?php if (count($_smarty_tpl->getVariable('columnData')->value)>0){?>
						<thead>
							<tr>
								<th width="250">Column Name</th>
								<th>Label</th>
								<th>Exclude from Add/Edit</th>
								<th>Validating in Add/Edit</th>
							</tr>
						</thead>

						<tbody>
					<?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('columnData')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value){
?>
						<?php $_smarty_tpl->tpl_vars["colField"] = new Smarty_variable($_smarty_tpl->tpl_vars['col']->value['Field'], null, null);?>
							<tr>
								<td><b><?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
</b> <span class="label"><?php echo $_smarty_tpl->tpl_vars['col']->value['Type'];?>
</span> <?php if ($_smarty_tpl->tpl_vars['col']->value['Key']=='PRI'){?><span class="label label-important">Primary</span><?php }?><?php if ($_smarty_tpl->tpl_vars['col']->value['Key']=='MUL'){?><span class="label label-info">Index</span><?php }?></td>
								<td><input type="text" class="input-small" name="flabel[<?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
]" value="<?php echo $_smarty_tpl->getVariable('formData')->value['flabel'][$_smarty_tpl->getVariable('colField')->value];?>
" /></td>
								<td align="center"><input type="checkbox"<?php if ($_smarty_tpl->tpl_vars['col']->value['Key']=='PRI'){?>disabled="disabled" checked="checked"<?php }?> name="fexclude[<?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
]" <?php if (isset($_smarty_tpl->getVariable('formData',null,true,false)->value['fexclude'][$_smarty_tpl->getVariable('colField',null,true,false)->value])){?>checked="checked"<?php }?> value="1" /></td>
								<td align="center"><?php if ($_smarty_tpl->tpl_vars['col']->value['Key']!='PRI'){?>
									<select name="fvalidating[<?php echo $_smarty_tpl->tpl_vars['col']->value['Field'];?>
]" class="">
										<option value="notneed" <?php if ($_smarty_tpl->getVariable('formData')->value['fvalidating'][$_smarty_tpl->getVariable('colField')->value]=='notneed'){?>selected="selected"<?php }?>>Not Need</option>
										<option value="notempty" <?php if ($_smarty_tpl->getVariable('formData')->value['fvalidating'][$_smarty_tpl->getVariable('colField')->value]=='notempty'){?>selected="selected"<?php }?>>Not Empty String</option>
										<option value="greaterthanzero" <?php if ($_smarty_tpl->getVariable('formData')->value['fvalidating'][$_smarty_tpl->getVariable('colField')->value]=='greaterthanzero'){?>selected="selected"<?php }?>>Number greater than zero (0)</option>
										<option value="email" <?php if ($_smarty_tpl->getVariable('formData')->value['fvalidating'][$_smarty_tpl->getVariable('colField')->value]=='email'){?>selected="selected"<?php }?>>Email Address</option>
									</select>
									<?php }?></td>
							</tr>

					<?php }} ?>
						</tbody>
					<?php }?>


				</table>

			</div>
		</div>
	</fieldset>
	
	
	
	<div class="form-actions">
		<label class="checkbox"><input type="checkbox" name="foverwrite" <?php if ($_smarty_tpl->getVariable('formData')->value['foverwrite']==1){?>checked="checked"<?php }?> value="1" /><span class="label label-important">Overwrite Existed files</span></label>
		<br />
		<input type="submit" name="fsubmit" value="GENERATE NOW" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formRequiredLabel'];?>
</span>
	</div>
			
	<ul class="">
		<li><span class="help-block">Generated Model will be saved in directory <code><?php echo $_smarty_tpl->getVariable('formpData')->value['directories']['model'];?>
class.<?php echo $_smarty_tpl->getVariable('formData')->value['MODULE_LOWER'];?>
.php</code></span></li>
		<li><span class="help-block">Generated Controller will be saved in <code><?php echo $_smarty_tpl->getVariable('formData')->value['directories']['controlleradmin'];?>
class.<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['fadmincontroller'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('formData')->value['fadmincontroller'],SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('formData')->value['fadmincontroller']));?>
.php</code></span></li>
		<li><span class="help-block">Generated Controller Language will be saved in <code><?php echo $_smarty_tpl->getVariable('formData')->value['directories']['languageadmin'];?>
<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['fadmincontroller'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('formData')->value['fadmincontroller'],SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('formData')->value['fadmincontroller']));?>
.xml</code></span></li>
		<li><span class="help-block">Generated Controller Template will be saved in <code><?php echo $_smarty_tpl->getVariable('formData')->value['directories']['templateadmin'];?>
<?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['fadmincontroller'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->getVariable('formData')->value['fadmincontroller'],SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->getVariable('formData')->value['fadmincontroller']));?>
/*.tpl</code></span></li>
	</ul>
</form>	


<script type="text/javascript">
	function admincontrollertoggle()
	{
		if ($('#fadmincontrollertoggler').is(':checked'))
		{
			$('#admincontrollergenerator').show();
		}
		else
		{
			$('#admincontrollergenerator').hide();
		}
	}
	
	
</script>





