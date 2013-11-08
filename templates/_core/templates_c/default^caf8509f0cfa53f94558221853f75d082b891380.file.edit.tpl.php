<?php /* Smarty version Smarty-3.0.7, created on 2013-11-04 18:38:58
         compiled from "templates/default/_controller/admin/role/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88407987452778752b75c29-23227937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caf8509f0cfa53f94558221853f75d082b891380' => 
    array (
      0 => 'templates/default/_controller/admin/role/edit.tpl',
      1 => 1383565137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88407987452778752b75c29-23227937',
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
"> Quản lý phân quyền </a> <span class="divider">/</span></li>
	<li class="active"> Cập nhật </li>
</ul>

<div class="page-header" rel="menu_role_list" id="user-section"><h1>Cập nhật phân quyền thành phần chức năng</h1></div>


<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>


<div class="span12" id="container-in">
	<form method="POST" action="">
	<table class="table table-hover">
		<thead>
			<tr>
				<td class="span3">
					<blockquote>
					<p><strong><?php echo $_smarty_tpl->getVariable('groupname')->value;?>
</strong></p>
					<small>Nhóm người dùng</small>
					</blockquote>
				</td>
				<td class="span3">
					<blockquote>
					<p><strong><?php echo $_smarty_tpl->getVariable('gpRebuild')->value['GROUP_CONTROLLER'];?>
</strong></p>
					<small>Nhóm chức năng</small>
					</blockquote>
				</td>
				<td class="span3"><p class="text-warning">Thành phần chức năng</p></td>
				<td><p class="text-warning">Quyền</p><small class="pull-right">Chọn tất cả</small></td>
			</tr>
		</thead>
		<tbody>
			<td rowspan="<?php echo count($_smarty_tpl->getVariable('gpRebuild')->value['CONTROLLER'])+1;?>
"></td>
			<td rowspan="<?php echo count($_smarty_tpl->getVariable('gpRebuild')->value['CONTROLLER'])+1;?>
">
				<div id="controller-info-<?php echo $_smarty_tpl->getVariable('gpRebuild')->value['GROUPID'];?>
-<?php echo $_smarty_tpl->getVariable('gpRebuild')->value['GROUP_CONTROLLER'];?>
"></div>
			</td>
			
			<?php  $_smarty_tpl->tpl_vars['gpermisson'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('gpRebuild')->value['CONTROLLER']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gpermisson']->key => $_smarty_tpl->tpl_vars['gpermisson']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['gpermisson']->key;
?>
			<?php if ($_smarty_tpl->getVariable('formData')->value['flag']==1&&!isset($_smarty_tpl->getVariable('formData',null,true,false)->value[$_smarty_tpl->getVariable('key',null,true,false)->value])){?> <?php if (!isset($_smarty_tpl->tpl_vars['gpermisson']) || !is_array($_smarty_tpl->tpl_vars['gpermisson']->value)) $_smarty_tpl->createLocalArrayVariable('gpermisson', null, null);
$_smarty_tpl->tpl_vars['gpermisson']->value['CURRENT'][0] = null;?> <?php }?>
			<tr>
				<td>
					<a href="javascript:void(0)" class="show-controller-info" id="<?php echo $_smarty_tpl->getVariable('gpRebuild')->value['GROUPID'];?>
:<?php echo $_smarty_tpl->getVariable('gpRebuild')->value['GROUP_CONTROLLER'];?>
:<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</span></a>
					<span class="pull-right"><span class="show-controller-info" id="<?php echo $_smarty_tpl->getVariable('gpRebuild')->value['GROUPID'];?>
:<?php echo $_smarty_tpl->getVariable('gpRebuild')->value['GROUP_CONTROLLER'];?>
:<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><abbr title="Thông tin chức năng"><i class="icon-info-sign"></i></abbr></span></span>
				</td>
				<td>
					<?php  $_smarty_tpl->tpl_vars['gplist'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['gpermisson']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gplist']->key => $_smarty_tpl->tpl_vars['gplist']->value){
?>
						<?php if ($_smarty_tpl->tpl_vars['gplist']->key!=='CURRENT'){?>
							<?php if ($_smarty_tpl->tpl_vars['gpermisson']->value['CURRENT'][0]!=='*'){?>
								<label class="checkbox inline" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><input type="checkbox" name="fbulkid[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['gplist']->value;?>
"
								<?php if (in_array($_smarty_tpl->tpl_vars['gplist']->value,$_smarty_tpl->tpl_vars['gpermisson']->value['CURRENT'])){?>checked="checked"<?php }?>/><?php echo $_smarty_tpl->tpl_vars['gplist']->value;?>
</label>
							<?php }else{ ?>
								<label class="checkbox inline" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><input type="checkbox" name="fbulkid[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['gplist']->value;?>
" 

								<?php if (($_smarty_tpl->tpl_vars['gpermisson']->value['CURRENT'][0]=='*'&&!isset($_smarty_tpl->getVariable('formData',null,true,false)->value[$_smarty_tpl->getVariable('key',null,true,false)->value]))||(isset($_smarty_tpl->getVariable('formData',null,true,false)->value[$_smarty_tpl->getVariable('key',null,true,false)->value])&&in_array($_smarty_tpl->tpl_vars['gplist']->value,$_smarty_tpl->getVariable('formData')->value[$_smarty_tpl->getVariable('key')->value]))){?>checked="checked"
								<?php }?>/><?php echo $_smarty_tpl->tpl_vars['gplist']->value;?>
</label>
							<?php }?>
						<?php }?>
					<?php }} ?>	
					<span class="pull-right"><label class="checkbox inline"><input id="all<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="check-all" type="checkbox" <?php if (($_smarty_tpl->tpl_vars['gpermisson']->value['CURRENT'][0]=='*'&&!isset($_smarty_tpl->getVariable('formData',null,true,false)->value[$_smarty_tpl->getVariable('key',null,true,false)->value]))){?>checked="checked"<?php }elseif(isset($_smarty_tpl->getVariable('formData',null,true,false)->value[$_smarty_tpl->getVariable('key',null,true,false)->value])&&count($_smarty_tpl->getVariable('formData')->value[$_smarty_tpl->getVariable('key')->value])==count($_smarty_tpl->tpl_vars['gpermisson']->value)-1){?>checked="checked"<?php }?>/></label></span>
				</td>
			</tr>
			<?php }} ?>
		</tbody>
	</table>
		<div class="form-actions" style="margin: 0; text-align: center;">
			<input type="submit" name="fsubmit" value="Cập nhật" class="btn btn-large btn-primary" />
		</div>
	</form>
</div>