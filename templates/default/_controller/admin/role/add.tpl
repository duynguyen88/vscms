<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_cms}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl}{$controllerGroup}/{$controller}">Role</a> <span class="divider">/</span></li>
	<li class="active">Add</li>
</ul>

<div class="page-header" rel="menu_role_list" id="user-section"><h1>Add Controller Permission</h1></div>


{include file="notify.tpl" notifyError=$error notifySuccess=$success}

<div class="span12" id="container-in">

	<form method="POST" action="" class="bs-docs">
		<fieldset>

			<select name="selectfrom" id="select-from" multiple size="10">
		      <option value="1">Item 1</option>
		      <option value="2">Item 2</option>
		      <option value="3">Item 3</option>
		      <option value="4">Item 4</option>
		    </select>

		    <a href="javascript:void(0);" id="btn-add">Add &raquo;</a>
		    <a href="javascript:void(0);" id="btn-remove">&laquo; Remove</a>

		    <select name="selectto" id="select-to" multiple size="10">
		      <option value="5">Item 5</option>
		      <option value="6">Item 6</option>
		      <option value="7">Item 7</option>
		    </select>
		</fieldset>
	</form>
</div>