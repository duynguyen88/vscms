<?php /* Smarty version Smarty-3.0.7, created on 2013-11-03 19:06:32
         compiled from "templates/default/_controller/admin/codegenerator/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195654473352763c483ff7b2-70676910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20cf835a1d4e861bcd65aca436c19e4981e76608' => 
    array (
      0 => 'templates/default/_controller/admin/codegenerator/index.tpl',
      1 => 1383480391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195654473352763c483ff7b2-70676910',
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
	<li class="active">Table Listing</li>
</ul>

<div class="page-header" rel="menu_codegenerator" id="utility-section"><h1>Code Generator</h1></div>



<div class="tabbable">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab">Table Listing (<?php echo count($_smarty_tpl->getVariable('tables')->value);?>
)</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
				<table class="table table-striped" cellpadding="5" width="100%">
					<?php if (count($_smarty_tpl->getVariable('tables')->value)>0){?>
						<thead>
							<tr>
								<th>Table Name</th>
							</tr>
						</thead>

						<tbody>
					<?php  $_smarty_tpl->tpl_vars['table'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tables')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['table']->key => $_smarty_tpl->tpl_vars['table']->value){
?>

							<tr>
								<td align="center"><a title="Code generate for <?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
codegenerator/generate/table/<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
" class="btn btn-inverse"><i class="icon-circle-arrow-right icon-white"></i> <?php echo $_smarty_tpl->tpl_vars['table']->value;?>
</a></td>
							
							</tr>

					<?php }} ?>
						</tbody>
					<?php }?>
					
					
				</table>
			
			
		</div><!-- end #tab 1 -->
	</div>
</div>







