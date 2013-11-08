<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_admin}">Dashboard</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl_admin}{$controller}">Code Generator</a> <span class="divider">/</span></li>
	<li class="active">Generating for table <em>{$table}</em></li>
</ul>

<div class="page-header" rel="menu_codegenerator" id="utility-section"><h1>{$table}</h1></div>


<form action="" method="post" name="myform" class="form-horizontal">
<input type="hidden" name="ftoken" value="{$smarty.session.generatingToken}" />


	{include file="notify.tpl" notifyError=$error notifySuccess=$success notifyWarning=$warning notifyInformation=$information}
	
	
	
	
	<fieldset>
	    <legend>MODEL settings</legend>
	
		
		
		
		<div class="control-group">
			<label class="control-label" for="fmodule">Class Name <span class="star_require">*</span></label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">Core_</span><input type="text" name="fmodule" id="fmodule" value="{$formData.fmodule|@htmlspecialchars}" class="">
				</div>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="ftablealias">Table Alias</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">{$table} </span><span class="add-on">  </span><input type="text" class="input-mini" name="ftablealias" id="ftablealias" value="{$formData.ftablealias|@htmlspecialchars}" class="">
				</div>
			</div>
		</div>
			
		<div class="control-group">
			<label class="control-label" for="fclassextend">Mapping <span class="star_require">*</span></label>
			<div class="controls">
			

				<table class="table table-striped" cellpadding="5" width="100%">
					{if $columnData|@count > 0}
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
					{foreach item=col from=$columnData}
						{assign var="colField" value=$col.Field}
							<tr>
								<td><b>{$col.Field}</b> <span class="label">{$col.Type}</span> {if $col.Key == 'PRI'}<span class="label label-important">Primary</span>{/if}{if $col.Key == 'MUL'}<span class="label label-info">Index</span>{/if}</td>
								<td><input type="hidden" name="ftype[{$col.Field}]" value="{$col.Type}" /><input type="text" name="fprop[{$col.Field}]" value="{$formData.fprop.$colField}" /></td>
								<td><label class="checkbox"><input type="checkbox" name="ffilterable[{$col.Field}]" value="1" {if $col.Key == 'PRI' || $col.Key == 'MUL'}checked="checked"{/if} {if $col.Key == 'PRI'}disabled="disabled"{/if} {if isset($formData.ffilterable.$colField)}checked="checked"{/if} /> Filterable</label></td>
								<td><label class="checkbox"><input type="checkbox" {if $col.Key != 'PRI'} name="fsortable[{$col.Field}]"{/if} value="1" {if $col.Key == 'PRI'}checked="checked" disabled="disabled"{/if} {if isset($formData.fsortable.$colField)}checked="checked"{/if} /> Sortable</label></td>
								<td>{if in_array($col.Field, $formData.textfield)}<label class="checkbox"> <input type="checkbox" name="fsearchabletext[{$col.Field}]" {if isset($formData.fsearchabletext.$colField)}checked="checked"{/if} value="1" /> Searchable Text</label>{/if}</td>
							</tr>

					{/foreach}
						</tbody>
					{/if}


				</table>

			</div>
		</div>
	</fieldset>
	
	<div>
			<label class="checkbox"><input type="checkbox" {if $formData.fadmincontrollertoggler == 1}checked="checked"{/if} name="fadmincontrollertoggler" id="fadmincontrollertoggler" value="1" onchange="javascript:admincontrollertoggle()" /><span class="label label-warning">Enable generate manage CONTROLLER (Admin)</span></label>
	</div>
	
	<fieldset id="admincontrollergenerator" class="{if $formData.fadmincontrollertoggler != 1}hide{/if}">
	    <legend>CONTROLLER settings</legend>
	
		<div class="control-group">
			<label class="control-label" for="fcontrollergroup">CONTROLLER GROUP <span class="star_require">*</span></label>
			<div class="controls">
					<select name="fcontrollergroup" id="fcontrollergroup" class="input-small">
						<option value="Admin" {if $formData.fcontrollergroup == 'Admin'}selected="selected"{/if}>Admin</option>
					</select>
			</div>
		</div>
		
		
		<div class="control-group">
			<label class="control-label" for="fadmincontroller">Class Name <span class="star_require">*</span></label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">Controller_{literal}{{CONTROLLER_GROUP}}{/literal}_</span><input type="text" name="fadmincontroller" id="fadmincontroller" value="{$formData.fadmincontroller|@htmlspecialchars}" class="">
				</div>
			</div>
		</div>
			
		<div class="control-group">
			<label class="control-label" for="fclassextend">Mapping <span class="star_require">*</span></label>
			<div class="controls">
			

				<table class="table table-striped" cellpadding="5" width="100%">
					{if $columnData|@count > 0}
						<thead>
							<tr>
								<th width="250">Column Name</th>
								<th>Label</th>
								<th>Exclude from Add/Edit</th>
								<th>Validating in Add/Edit</th>
							</tr>
						</thead>

						<tbody>
					{foreach item=col from=$columnData}
						{assign var="colField" value=$col.Field}
							<tr>
								<td><b>{$col.Field}</b> <span class="label">{$col.Type}</span> {if $col.Key == 'PRI'}<span class="label label-important">Primary</span>{/if}{if $col.Key == 'MUL'}<span class="label label-info">Index</span>{/if}</td>
								<td><input type="text" class="input-small" name="flabel[{$col.Field}]" value="{$formData.flabel.$colField}" /></td>
								<td align="center"><input type="checkbox"{if $col.Key == 'PRI'}disabled="disabled" checked="checked"{/if} name="fexclude[{$col.Field}]" {if isset($formData.fexclude.$colField)}checked="checked"{/if} value="1" /></td>
								<td align="center">{if $col.Key != 'PRI'}
									<select name="fvalidating[{$col.Field}]" class="">
										<option value="notneed" {if $formData.fvalidating.$colField == 'notneed'}selected="selected"{/if}>Not Need</option>
										<option value="notempty" {if $formData.fvalidating.$colField == 'notempty'}selected="selected"{/if}>Not Empty String</option>
										<option value="greaterthanzero" {if $formData.fvalidating.$colField == 'greaterthanzero'}selected="selected"{/if}>Number greater than zero (0)</option>
										<option value="email" {if $formData.fvalidating.$colField == 'email'}selected="selected"{/if}>Email Address</option>
									</select>
									{/if}</td>
							</tr>

					{/foreach}
						</tbody>
					{/if}


				</table>

			</div>
		</div>
	</fieldset>
	
	
	
	<div class="form-actions">
		<label class="checkbox"><input type="checkbox" name="foverwrite" {if $formData.foverwrite == 1}checked="checked"{/if} value="1" /><span class="label label-important">Overwrite Existed files</span></label>
		<br />
		<input type="submit" name="fsubmit" value="GENERATE NOW" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : {$lang.default.formRequiredLabel}</span>
	</div>
			
	<ul class="">
		<li><span class="help-block">Generated Model will be saved in directory <code>{$formpData.directories.model}class.{$formData.MODULE_LOWER}.php</code></span></li>
		<li><span class="help-block">Generated Controller will be saved in <code>{$formData.directories.controlleradmin}class.{$formData.fadmincontroller|lower}.php</code></span></li>
		<li><span class="help-block">Generated Controller Language will be saved in <code>{$formData.directories.languageadmin}{$formData.fadmincontroller|lower}.xml</code></span></li>
		<li><span class="help-block">Generated Controller Template will be saved in <code>{$formData.directories.templateadmin}{$formData.fadmincontroller|lower}/*.tpl</code></span></li>
	</ul>
</form>	

{literal}
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
{/literal}




