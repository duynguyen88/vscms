<?php /* Smarty version Smarty-3.0.7, created on 2013-11-03 20:35:47
         compiled from "templates/default/redirect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115121101252765133c5bf64-63566406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76ccd326fa369c0855cda82078dfe24d6949eb65' => 
    array (
      0 => 'templates/default/redirect.tpl',
      1 => 1348281334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115121101252765133c5bf64-63566406',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="3;url=<?php echo $_smarty_tpl->getVariable('redirect')->value;?>
"/>
<title>Page Redirecting</title>
</head>

<body bgcolor="#57585c" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">
<div style="line-height:2;text-align:center; margin:auto;width: 500px; height:270px; background: #eee;margin-top:150px;">
	<div style="padding:160px 30px 0 30px;">
	<?php echo $_smarty_tpl->getVariable('redirectMsg')->value;?>
<br />
	<a href="<?php echo $_smarty_tpl->getVariable('redirect')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['global']['redirectClickHere'];?>
</a> <?php echo $_smarty_tpl->getVariable('lang')->value['global']['redirectDontWantWait'];?>

	</div>
</div>
</body>
</html>
