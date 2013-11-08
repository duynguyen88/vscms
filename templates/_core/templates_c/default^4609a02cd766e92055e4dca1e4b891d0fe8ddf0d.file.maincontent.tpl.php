<?php /* Smarty version Smarty-3.0.7, created on 2013-10-29 22:39:08
         compiled from "templates/default/_controller/site/maincontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275534866526fd69cb1e081-05378701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4609a02cd766e92055e4dca1e4b891d0fe8ddf0d' => 
    array (
      0 => 'templates/default/_controller/site/maincontent.tpl',
      1 => 1348281334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275534866526fd69cb1e081-05378701',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_sslashes')) include '/vscms/web/trunk/libs/smarty/plugins/modifier.sslashes.php';
?><?php echo (($tmp = @smarty_modifier_sslashes($_smarty_tpl->getVariable('contents')->value))===null||$tmp==='' ? "No contents" : $tmp);?>
