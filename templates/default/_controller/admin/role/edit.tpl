<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_cms}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl}{$controllerGroup}/{$controller}"> Quản lý phân quyền </a> <span class="divider">/</span></li>
	<li class="active"> Cập nhật </li>
</ul>

<div class="page-header" rel="menu_role_list" id="user-section"><h1>Cập nhật phân quyền thành phần chức năng</h1></div>


{include file="notify.tpl" notifyError=$error notifySuccess=$success}


<div class="span12" id="container-in">
	<form method="POST" action="">
	<table class="table table-hover">
		<thead>
			<tr>
				<td class="span3">
					<blockquote>
					<p><strong>{$groupname}</strong></p>
					<small>Nhóm người dùng</small>
					</blockquote>
				</td>
				<td class="span3">
					<blockquote>
					<p><strong>{$gpRebuild.GROUP_CONTROLLER}</strong></p>
					<small>Nhóm chức năng</small>
					</blockquote>
				</td>
				<td class="span3"><p class="text-warning">Thành phần chức năng</p></td>
				<td><p class="text-warning">Quyền</p><small class="pull-right">Chọn tất cả</small></td>
			</tr>
		</thead>
		<tbody>
			<td rowspan="{$gpRebuild.CONTROLLER|@count +1}"></td>
			<td rowspan="{$gpRebuild.CONTROLLER|@count +1}">
				<div id="controller-info-{$gpRebuild.GROUPID}-{$gpRebuild.GROUP_CONTROLLER}"></div>
			</td>
			
			{foreach item=gpermisson from=$gpRebuild.CONTROLLER key=key}
			{if $formData['flag'] == 1 && !isset($formData.$key)} {$gpermisson.CURRENT.0 = null} {/if}
			<tr>
				<td>
					<a href="javascript:void(0)" class="show-controller-info" id="{$gpRebuild.GROUPID}:{$gpRebuild.GROUP_CONTROLLER}:{$key}"><span class="badge badge-info">{$key}</span></a>
					<span class="pull-right"><span class="show-controller-info" id="{$gpRebuild.GROUPID}:{$gpRebuild.GROUP_CONTROLLER}:{$key}"><abbr title="Thông tin chức năng"><i class="icon-info-sign"></i></abbr></span></span>
				</td>
				<td>
					{foreach $gpermisson as $gplist}
						{if $gplist@key !== 'CURRENT'}
							{if $gpermisson.CURRENT.0 !== '*'}
								<label class="checkbox inline" id="{$key}"><input type="checkbox" name="fbulkid[{$key}][]" value="{$gplist@value}"
								{if in_array($gplist@value, $gpermisson.CURRENT)}checked="checked"{/if}/>{$gplist@value}</label>
							{else}
								<label class="checkbox inline" id="{$key}"><input type="checkbox" name="fbulkid[{$key}][]" value="{$gplist@value}" 

								{if ($gpermisson.CURRENT.0 == '*' && !isset($formData.$key)) || (isset($formData.$key) && in_array($gplist@value, $formData.$key))}checked="checked"
								{/if}/>{$gplist@value}</label>
							{/if}
						{/if}
					{/foreach}	
					<span class="pull-right"><label class="checkbox inline"><input id="all{$key}" class="check-all" type="checkbox" {if ($gpermisson.CURRENT.0 == '*' && !isset($formData.$key))}checked="checked"{elseif isset($formData.$key) && $formData.$key|@count == $gpermisson|@count - 1}checked="checked"{/if}/></label></span>
				</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
		<div class="form-actions" style="margin: 0; text-align: center;">
			<input type="submit" name="fsubmit" value="Cập nhật" class="btn btn-large btn-primary" />
		</div>
	</form>
</div>