<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_admin}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl_admin}{$controller}">Photo</a> <span class="divider">/</span></li>
	<li class="active">{$lang.controller.head_add}</li>
</ul>



<div class="page-header" rel="menu_photo_add" id="photo-section"><h1>{$lang.controller.head_add}</h1></div>

<form action="" method="post" name="myform" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="ftoken" value="{$smarty.session.photoAddToken}" />


	{include file="`$smartyControllerGroupContainer`notify.tpl" notifyError=$error notifySuccess=$success notifyWarning=$warning}
	
	<div class="control-group">
		<label class="control-label" for="fcategory">Category</label>
		<div class="controls">
			<select id="fcategory" name="fcategory">
				<option value="">- - - -</option>
				{foreach item=category from=$categoryList}
						<option value="{$category->id}" {if $formData.fcategory == $category->id}selected="selected"{/if}>{$category->title}</option>
				{/foreach}
			</select>
		</div>
	</div>	
	
	<div class="control-group">
		<label class="control-label" for="fimage">Upload Photo <span class="star_require">*</span></label>
		<div class="controls">
			<input type="file" name="fimage" id="fimage" />
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="ftitle">Title <span class="star_require">*</span></label>
		<div class="controls">
			<input type="text" name="ftitle" id="ftitle" value="{$formData.ftitle|@htmlspecialchars}" class=""/>
		</div>
	</div>
	
	
	<div class="control-group">
		<label class="control-label" for="fdescription">Description</label>
		<div class="controls">
			<textarea class="input-xxlarge" rows="5" name="fdescription" id="fdescription">{$formData.fdescription|@htmlspecialchars}</textarea>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="fenable">Enable</label>
		<div class="controls">
			<select class="input-small" name="fenable" id="fenable">
				<option value="1">{$lang.default.formYesLabel}</option>
				<option value="0" {if $formData.fenable == '0'}selected="selected"{/if}>{$lang.default.formNoLabel}</option>
			</select>
		</div>
	</div>
	
	<div class="form-actions">
		<input type="submit" name="fsubmit" value="{$lang.default.formAddSubmit}" class="btn btn-large btn-primary" />
		<span class="help-inline"><span class="star_require">*</span> : {$lang.default.formRequiredLabel}</span>
	</div>
			
	
</form>








