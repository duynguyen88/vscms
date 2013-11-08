<?php /* Smarty version Smarty-3.0.7, created on 2013-10-30 22:45:34
         compiled from "templates/default/_controller/site/notpermission/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7772958585271299e1d83e4-60421413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c82ed76ba4e52a9fda789862b15391cf3995487' => 
    array (
      0 => 'templates/default/_controller/site/notpermission/index.tpl',
      1 => 1348281334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7772958585271299e1d83e4-60421413',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

	<div id="homepage">
	<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyWarning',$_smarty_tpl->getVariable('lang')->value['global']['notpermissiontitle']); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
	
	<div style="padding:20px; line-height:2;">
	<h2><em><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['headline'];?>
</em></h2>
	<p><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['text1'];?>
</p>
	<p><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['text2'];?>
</p>
	<p><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['text3'];?>
</p>
	</div>
