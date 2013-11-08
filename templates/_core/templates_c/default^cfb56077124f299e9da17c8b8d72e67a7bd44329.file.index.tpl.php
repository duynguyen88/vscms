<?php /* Smarty version Smarty-3.0.7, created on 2013-10-29 22:40:18
         compiled from "templates/default/_controller/admin/news/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1713751616526fd6e27a27d1-54551469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfb56077124f299e9da17c8b8d72e67a7bd44329' => 
    array (
      0 => 'templates/default/_controller/admin/news/index.tpl',
      1 => 1382810372,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1713751616526fd6e27a27d1-54551469',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_paginate')) include '/vscms/web/trunk/libs/smarty/plugins/function.paginate.php';
if (!is_callable('smarty_modifier_date_format')) include '/vscms/web/trunk/libs/smarty/plugins/modifier.date_format.php';
?><ul class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_cms'];?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['menudashboard'];?>
</a> <span class="divider">/</span></li>
	<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
<?php echo $_smarty_tpl->getVariable('controllerGroup')->value;?>
/<?php echo $_smarty_tpl->getVariable('controller')->value;?>
">News</a> <span class="divider">/</span></li>
	<li class="active">Listing</li>
</ul>



<div class="page-header" rel="menu_news_list" id="news-section"><h1><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_list'];?>
</h1></div>


<div class="tabbable">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_list'];?>
 <?php if ($_smarty_tpl->getVariable('formData')->value['search']!=''){?>| <?php echo $_smarty_tpl->getVariable('lang')->value['controller']['title_listSearch'];?>
 <?php }?>(<?php echo $_smarty_tpl->getVariable('total')->value;?>
)</a></li>
		<li><a href="#tab2" data-toggle="tab"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['filterLabel'];?>
</a></li>
		<?php if ($_smarty_tpl->getVariable('formData')->value['search']!=''){?>
			<li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
<?php echo $_smarty_tpl->getVariable('controllerGroup')->value;?>
/<?php echo $_smarty_tpl->getVariable('controller')->value;?>
"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['formViewAll'];?>
</a></li>
		<?php }?>
		<a class="pull-right btn btn-success" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
<?php echo $_smarty_tpl->getVariable('controllerGroup')->value;?>
/<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/add"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['head_add'];?>
</a>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">

			<?php $_template = new Smarty_Internal_Template("notify.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('notifyError',$_smarty_tpl->getVariable('error')->value);$_template->assign('notifySuccess',$_smarty_tpl->getVariable('success')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

			<form action="" method="post" name="manage" class="form-inline" onsubmit="return confirm('Are You Sure ?');">
				<input type="hidden" name="ftoken" value="<?php echo $_SESSION['newsBulkToken'];?>
" />
				<table class="table table-striped">
		
				<?php if (count($_smarty_tpl->getVariable('newss')->value)>0){?>
					<thead>
						<tr>
						   <th width="40"><input class="check-all" type="checkbox" /></th>
							<th width="30"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelId'];?>
</th>
							
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelUid'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelNcid'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelImage'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelTitle'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSlug'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelContent'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSource'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSeotitle'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSeokeyword'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSeodescription'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelMetarobot'];?>
</th>
							<th><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/countview/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='countview'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelCountview'];?>
</a></th>
							<th><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/countreview/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='countreview'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelCountreview'];?>
</a></th>
							<th><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/displayorder/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='displayorder'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelDisplayorder'];?>
</a></th>
							<th><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/status/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='status'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelStatus'];?>
</a></th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelIpaddress'];?>
</th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelResourceserver'];?>
</th>
							<th><a href="<?php echo $_smarty_tpl->getVariable('filterUrl')->value;?>
sortby/datecreated/sorttype/<?php if ($_smarty_tpl->getVariable('formData')->value['sortby']=='datecreated'){?><?php if (((mb_detect_encoding($_smarty_tpl->getVariable('formData')->value['sorttype'], 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype'],SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('formData')->value['sorttype']))!='DESC'){?>DESC<?php }else{ ?>ASC<?php }?><?php }?>"><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelDatecreated'];?>
</a></th>
							<th><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelDatemodified'];?>
</th>
							<th width="140"></th>
						</tr>
					</thead>
		
					<tfoot>
						<tr>
							<td colspan="8">
								<div class="pagination">
								   <?php $_smarty_tpl->tpl_vars["pageurl"] = new Smarty_variable("page/::PAGE::", null, null);?>
									<?php echo smarty_function_paginate(array('count'=>$_smarty_tpl->getVariable('totalPage')->value,'curr'=>$_smarty_tpl->getVariable('curPage')->value,'lang'=>$_smarty_tpl->getVariable('paginateLang')->value,'max'=>10,'url'=>($_smarty_tpl->getVariable('paginateurl')->value).($_smarty_tpl->getVariable('pageurl')->value)),$_smarty_tpl);?>

								</div> <!-- End .pagination -->
					
					
								<div class="bulk-actions align-left">
									<select name="fbulkaction">
										<option value=""><?php echo $_smarty_tpl->getVariable('lang')->value['default']['bulkActionSelectLabel'];?>
</option>
										<option value="delete"><?php echo $_smarty_tpl->getVariable('lang')->value['default']['bulkActionDeletetLabel'];?>
</option>
									</select>
									<input type="submit" name="fsubmitbulk" class="btn" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['bulkActionSubmit'];?>
" />
								</div>
					
								<div class="clear"></div>
							</td>
						</tr>
					</tfoot>
					<tbody>
					<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('newss')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
?>
		
						<tr>
							<td><input type="checkbox" name="fbulkid[]" value="<?php echo $_smarty_tpl->getVariable('news')->value->id;?>
" <?php if (in_array($_smarty_tpl->getVariable('news')->value->id,$_smarty_tpl->getVariable('formData')->value['fbulkid'])){?>checked="checked"<?php }?>/></td>
							<td style="font-weight:bold;"><?php echo $_smarty_tpl->getVariable('news')->value->id;?>
</td>
							
							<td><?php echo $_smarty_tpl->getVariable('news')->value->uid;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->ncid;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->image;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->title;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->slug;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->content;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->source;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->seotitle;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->seokeyword;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->seodescription;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->metarobot;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->countview;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->countreview;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->displayorder;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->status;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->ipaddress;?>
</td>
							<td><?php echo $_smarty_tpl->getVariable('news')->value->resourceserver;?>
</td>
							<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('news')->value->datecreated,$_smarty_tpl->getVariable('lang')->value['default']['dateFormatTimeSmarty']);?>
</td>
							<td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('news')->value->datemodified,$_smarty_tpl->getVariable('lang')->value['default']['dateFormatTimeSmarty']);?>
</td>
							
							<td><a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionEditTooltip'];?>
" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
<?php echo $_smarty_tpl->getVariable('controllerGroup')->value;?>
/<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/edit/id/<?php echo $_smarty_tpl->getVariable('news')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
" class="btn btn-mini"><i class="icon-pencil"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formEditLabel'];?>
</a> &nbsp;
								<a title="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['formActionDeleteTooltip'];?>
" href="javascript:delm('<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
<?php echo $_smarty_tpl->getVariable('controllerGroup')->value;?>
/<?php echo $_smarty_tpl->getVariable('controller')->value;?>
/delete/id/<?php echo $_smarty_tpl->getVariable('news')->value->id;?>
/redirect/<?php echo $_smarty_tpl->getVariable('redirectUrl')->value;?>
?token=<?php echo $_SESSION['securityToken'];?>
');" class="btn btn-mini btn-danger"><i class="icon-remove icon-white"></i> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['formDeleteLabel'];?>
</a>
							</td>
						</tr>
			

					<?php }} ?>
					</tbody>
		
	  
				<?php }else{ ?>
					<tr>
						<td colspan="10"> <?php echo $_smarty_tpl->getVariable('lang')->value['default']['notfound'];?>
</td>
					</tr>
				<?php }?>
	
				</table>
			</form>

		</div><!-- end #tab 1 -->
		<div class="tab-pane" id="tab2">
			<form class="form-inline" action="" method="post" style="padding:0px;margin:0px;" onsubmit="return false;">
				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelUid'];?>
: <input type="text" name="fuid" id="fuid" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fuid']);?>
" class="input-mini" /> - 

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelNcid'];?>
: <input type="text" name="fncid" id="fncid" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fncid']);?>
" class="input-mini" /> - 

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelCountview'];?>
: <input type="text" name="fcountview" id="fcountview" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fcountview']);?>
" class="input-mini" /> - 

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelCountreview'];?>
: <input type="text" name="fcountreview" id="fcountreview" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fcountreview']);?>
" class="input-mini" /> - 

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelDisplayorder'];?>
: <input type="text" name="fdisplayorder" id="fdisplayorder" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fdisplayorder']);?>
" class="input-mini" /> - 

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelStatus'];?>
: <input type="text" name="fstatus" id="fstatus" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fstatus']);?>
" class="input-mini" /> - 

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelIpaddress'];?>
: <input type="text" name="fipaddress" id="fipaddress" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fipaddress']);?>
" class="input-mini" /> - 

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelDatecreated'];?>
: <input type="text" name="fdatecreated" id="fdatecreated" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fdatecreated']);?>
" class="input-mini" /> - 

				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelId'];?>
: <input type="text" name="fid" id="fid" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fid']);?>
" class="input-mini" /> - 

				
				<?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formKeywordLabel'];?>
:
				<input type="text" name="fkeyword" id="fkeyword" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('formData')->value['fkeyword']);?>
" class="" />
				<select name="fsearchin" id="fsearchin">
					<option value=""><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['formKeywordInLabel'];?>
</option>
					<option value="title" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=="title"){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelTitle'];?>
</option>
					<option value="content" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=="content"){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelContent'];?>
</option>
					<option value="source" <?php if ($_smarty_tpl->getVariable('formData')->value['fsearchin']=="source"){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('lang')->value['controller']['labelSource'];?>
</option></select>
				
				<input type="button" value="<?php echo $_smarty_tpl->getVariable('lang')->value['default']['filterSubmit'];?>
" class="btn btn-primary" onclick="gosearch();"  />
		
			</form>
		</div><!-- end #tab2 -->
	</div>
</div>
			
			


<script type="text/javascript">
	function gosearch()
	{
		var path = rooturl + controllerGroup + "/news/index";
		

		var uid = $('#fuid').val();
		if(uid.length > 0)
		{
			path += '/uid/' + uid;
		}

		var ncid = $('#fncid').val();
		if(ncid.length > 0)
		{
			path += '/ncid/' + ncid;
		}

		var countview = $('#fcountview').val();
		if(countview.length > 0)
		{
			path += '/countview/' + countview;
		}

		var countreview = $('#fcountreview').val();
		if(countreview.length > 0)
		{
			path += '/countreview/' + countreview;
		}

		var displayorder = $('#fdisplayorder').val();
		if(displayorder.length > 0)
		{
			path += '/displayorder/' + displayorder;
		}

		var status = $('#fstatus').val();
		if(status.length > 0)
		{
			path += '/status/' + status;
		}

		var ipaddress = $('#fipaddress').val();
		if(ipaddress.length > 0)
		{
			path += '/ipaddress/' + ipaddress;
		}

		var datecreated = $('#fdatecreated').val();
		if(datecreated.length > 0)
		{
			path += '/datecreated/' + datecreated;
		}

		var id = $('#fid').val();
		if(id.length > 0)
		{
			path += '/id/' + id;
		}
		
		var keyword = $("#fkeyword").val();
		if(keyword.length > 0)
		{
			path += "/keyword/" + keyword;
		}

		var keywordin = $("#fsearchin").val();
		if(keywordin.length > 0)
		{
			path += "/searchin/" + keywordin;
		}
		
		document.location.href= path;
	}
</script>

			
			


