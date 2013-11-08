
<ul class="breadcrumb">
	<li><a href="{$conf.rooturl_cms}">{$lang.default.menudashboard}</a> <span class="divider">/</span></li>
	<li><a href="{$conf.rooturl}{$controllerGroup}/{$controller}"> Quản lý phân quyền </a> <span class="divider">/</span></li>
	<li class="active"> Danh sách </li>
</ul>

<div class="page-header" rel="menu_role_list" id="user-section"><h1> Quản lý phân quyền </h1></div>


{include file="notify.tpl" notifyError=$error notifySuccess=$success}
	
<div class="span12" id="container-in">

		{foreach item=group from=$groupPermission key=key}
			{foreach item=gid from=$groupid}
				{if $key == $gid->value}
					<table class="table table-striped">
						<tbody>
							<tr class="success"><td><strong>{$gid->name}</strong></td></tr>
							<tr>
								{foreach item=controllerGroup from=$group key=cgkey}
									<td class="span5">
									<blockquote>
										<p><strong>{$cgkey}</strong></p>
										<small> Nhóm chức năng </small>
									</blockquote>
									
									<a class="btn btn-medium btn-success" href="{$conf.rooturl_admin}role/add/fcgkey/{$cgkey}/fgroupid/{$key}/redirect/{$redirectUrl}"/>  Add / Remove </a>
									{if $controllerGroup|@count > 0}
									<a class="btn btn-medium" href="{$conf.rooturl_admin}role/edit/fcgkey/{$cgkey}/fgroupid/{$key}/redirect/{$redirectUrl}"/> <i class="icon-edit"> Tuỳ chỉnh</i> </a><br/></br>
									<div class="pull-left" id="controller-info-{$key}-{$cgkey}"><span class="ajax-loader"></span></div>
									{/if}
									</td>
									<td class="span5">
										<table class="table table-condensed">
											<thead>
												<tr>
													<th>Thành phần chức năng </th>
													<th> Quyền </th>
												</tr>
											</thead>
											<tbody>
											{if $controllerGroup|@count > 0}
											{foreach item=action from=$controllerGroup}
												{assign var="actionname" value="_"|explode:$action} 
													<tr>
														<td><a href="javascript:void(0)" class="show-controller-info" id="{$key}:{$cgkey}:{$actionname[0]}"><span class="badge badge-info">{$actionname[0]}</span></a>
														<span class="pull-right"><span class="show-controller-info" id="{$key}:{$cgkey}:{$actionname[0]}"><abbr title="Thông tin chức năng"><i class="icon-info-sign"></i></abbr></span></span>
														</td>
														<td>
															{if $actionname[1] == '*'}
																<small>All</small>
															{else}
																<small>{$actionname[1]}</small>
															{/if}
														</td>
													</tr>
											{/foreach}
											{else}
												<div class="alert">
												  	<button type="button" class="close" data-dismiss="alert">&times;</button>
												  	<p>Nhóm chức năng này chưa được phân quyền.</p>
												</div>	
											{/if}
											</tbody>
										</table>
									</td>
								{/foreach}
							</tr>
						</tbody>
					</table>
					</br>
					
				{/if}
			{/foreach}
		{/foreach}
</div>
