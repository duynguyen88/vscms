<?php /* Smarty version Smarty-3.0.7, created on 2013-11-05 21:16:17
         compiled from "templates/default/_controller/admin/role/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16633996685278fdb130ee94-37275223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '954133d9921678d3dfbd1d38bab2bc31e72ac1be' => 
    array (
      0 => 'templates/default/_controller/admin/role/index.tpl',
      1 => 1383660970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16633996685278fdb130ee94-37275223',
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
	<li class="active"> Danh sách </li>
</ul>

<div class="page-header" rel="menu_role_list" id="user-section"><h1> Quản lý phân quyền </h1></div>


<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	
<div class="span12" id="container-in">

		<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('groupPermission')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['group']->key;
?>
			<?php  $_smarty_tpl->tpl_vars['gid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('groupid')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['gid']->key => $_smarty_tpl->tpl_vars['gid']->value){
?>
				<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->getVariable('gid')->value->value){?>
					<table class="table table-striped">
						<tbody>
							<tr class="success"><td><strong><?php echo $_smarty_tpl->getVariable('gid')->value->name;?>
</strong></td></tr>
							<tr>
								<?php  $_smarty_tpl->tpl_vars['controllerGroup'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['cgkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['controllerGroup']->key => $_smarty_tpl->tpl_vars['controllerGroup']->value){
 $_smarty_tpl->tpl_vars['cgkey']->value = $_smarty_tpl->tpl_vars['controllerGroup']->key;
?>
									<td class="span5">
									<blockquote>
										<p><strong><?php echo $_smarty_tpl->tpl_vars['cgkey']->value;?>
</strong></p>
										<small> Nhóm chức năng </small>
									</blockquote>
									
									<a class="btn btn-medium btn-success" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
role/add/fcgkey/<?php echo $_smarty_tpl->tpl_vars['cgkey']->value;?>
/fgroupid/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"/>  Add / Remove </a>
									<?php if (count($_smarty_tpl->tpl_vars['controllerGroup']->value)>0){?>
									<a class="btn btn-medium" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
role/edit/fcgkey/<?php echo $_smarty_tpl->tpl_vars['cgkey']->value;?>
/fgroupid/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
"/> <i class="icon-edit"> Tuỳ chỉnh</i> </a><br/></br>
									<div class="pull-left" id="controller-info-<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['cgkey']->value;?>
"><span class="ajax-loader"></span></div>
									<?php }?>
									</td>
									<td class="span5">
										<table class="table table-condensed">
											<thead>
												<tr>
													<th>Thành phần chức năng </th>
													<th> Quyền </th>
												</tr>
											</thead>
											<tbody>
											<?php if (count($_smarty_tpl->tpl_vars['controllerGroup']->value)>0){?>
											<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['controllerGroup']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value){
?>
												<?php $_smarty_tpl->tpl_vars["actionname"] = new Smarty_variable(explode("_",$_smarty_tpl->tpl_vars['action']->value), null, null);?> 
													<tr>
														<td><a href="javascript:void(0)" class="show-controller-info" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['cgkey']->value;?>
:<?php echo $_smarty_tpl->getVariable('actionname')->value[0];?>
"><span class="badge badge-info"><?php echo $_smarty_tpl->getVariable('actionname')->value[0];?>
</span></a>
														<span class="pull-right"><span class="show-controller-info" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
:<?php echo $_smarty_tpl->tpl_vars['cgkey']->value;?>
:<?php echo $_smarty_tpl->getVariable('actionname')->value[0];?>
"><abbr title="Thông tin chức năng"><i class="icon-info-sign"></i></abbr></span></span>
														</td>
														<td>
															<?php if ($_smarty_tpl->getVariable('actionname')->value[1]=='*'){?>
																<small>All</small>
															<?php }else{ ?>
																<small><?php echo $_smarty_tpl->getVariable('actionname')->value[1];?>
</small>
															<?php }?>
														</td>
													</tr>
											<?php }} ?>
											<?php }else{ ?>
												<div class="alert">
												  	<button type="button" class="close" data-dismiss="alert">&times;</button>
												  	<p>Nhóm chức năng này chưa được phân quyền.</p>
												</div>	
											<?php }?>
											</tbody>
										</table>
									</td>
								<?php }} ?>
							</tr>
						</tbody>
					</table>
					</br>
					
				<?php }?>
			<?php }} ?>
		<?php }} ?>
</div>
