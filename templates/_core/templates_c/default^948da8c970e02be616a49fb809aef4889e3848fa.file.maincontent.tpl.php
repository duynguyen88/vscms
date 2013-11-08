<?php /* Smarty version Smarty-3.0.7, created on 2013-10-29 22:39:08
         compiled from "templates/default/_controller/admin/maincontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1576376243526fd69c5e80d9-20587314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '948da8c970e02be616a49fb809aef4889e3848fa' => 
    array (
      0 => 'templates/default/_controller/admin/maincontent.tpl',
      1 => 1348281334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1576376243526fd69c5e80d9-20587314',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_sslashes')) include '/vscms/web/trunk/libs/smarty/plugins/modifier.sslashes.php';
?>
<?php echo (($tmp = @smarty_modifier_sslashes($_smarty_tpl->getVariable('contents')->value))===null||$tmp==='' ? "No contents" : $tmp);?>

