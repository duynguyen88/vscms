<!DOCTYPE html>
<html lang="en">
  <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>{$lang.default.adminPanel} &raquo; {$pageTitle|default:$lang.default.menuDashboard}</title>
		

		<!-- jQuery -->
		<script type="text/javascript" src="{$currentTemplate}/js/jquery.js" charset="utf-8"></script>
		<script type="text/javascript" src="{$conf.rooturl}/libs/tiny_mce/tiny_mce.js" charset="utf-8"></script>


		<!-- Custom Admin JS -->
		<script type="text/javascript" src="{$currentTemplate}min/?g=jsadmin&ver={$setting.admin.jsversion}" charset="utf-8"></script>

		

		<!-- Custom Admin CSS -->
		<link type="text/css" rel="stylesheet" href="{$currentTemplate}min/?g=cssadmin&ver={$setting.admin.cssversion}" media="screen" charset="utf-8"/>
		
        <script type="text/javascript">
		var rooturl = "{$conf.rooturl}";
		var rooturl_admin = "{$conf.rooturl_admin}";
		var controllerGroup = "{$controllerGroup}";
		var currentTemplate = "{$currentTemplate}";
		var delConfirm = "Are You Sure?";
		var delPromptYes = "Type YES to continue";
		</script>
		
	</head>
    
    <body>
	
		<div class="navbar navbar-fixed-top">
		   <div class="navbar-inner">
	        <div class="container-fluid">
	          <a class="brand" href="{$conf.rooturl_admin}" title="Go to Dashboard">no-name</a>
	          <div class="btn-group pull-right">
	            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
	              <i class="icon-user"></i> {$me->fullname}
	              <span class="caret"></span>
	            </a>
	            <ul class="dropdown-menu">
	              <li><a href="{$conf.rooturl_admin}user/edit/id/{$me->id}"><i class="icon-pencil"></i> Edit Profile</a></li>
				  <li><a href="{$conf.rooturl_admin}user/changepassword/id/{$me->id}"><i class="icon-lock"></i> Change Password</a></li>
	              <li class="divider"></li>
	              <li><a href="{$conf.rooturl}site/logout"><i class="icon-off"></i> Sign Out</a></li>
	            </ul>
	          </div>
	          <div class="nav-collapse">
			    <ul class="nav">
	              <li><a href="{$conf.rooturl}">Website</a></li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
		
		<div class="container-fluid">
		  <div class="row-fluid">
	        <div class="span2">
	          <div class="sidebar-nav">

	          	<!-- Begin of 1 accrodiron block -->
	          	<div class="accordion" id="user-section"><span></span>
	          		<i class="icon-user"></i> Thành viên
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_user_list"><a href="{$conf.rooturl_admin}user">Danh sách</a></li>
				  		<li id="menu_usergroup_list"><a href="{$conf.rooturl_admin}usergroup">Nhóm</a></li>
				  		<li id="menu_role_list"><a href="{$conf.rooturl_admin}role">Phân quyền</a></li>
				  		<li id="menu_setting"><a href="{$conf.rooturl_admin}setting">Settings</a></li>
				  		<li id="menu_filemanager"><a href="{$conf.rooturl_admin}filemanager">File Manager</a></li>
				  		<li id="menu_log"><a href="{$conf.rooturl_admin}log">Moderator Log</a></li>
	          		</ul>
	          	</div>
	          	<!-- End of 1 accrodiron block -->

	          	<div class="accordion" id="product-section"><span></span>
	          		<i class="icon-tasks"></i> Product
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_product_list"><a href="{$conf.rooturl_admin}product">View all product</a></li>
	          			<li id="menu_order_list"><a href="{$conf.rooturl_admin}order">View all order</a></li>
				  		<li id="menu_productcategory"><a href="{$conf.rooturl_admin}productcategory">Categories</a></li>
				  		<li id="menu_productcomment"><a href="{$conf.rooturl_admin}productcomment">Comments</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="news-section"><span></span>
	          		<i class="icon-coffee"></i> News
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_news_list"><a href="{$conf.rooturl_admin}news">View all news</a></li>
				  		<li id="menu_newscategory_list"><a href="{$conf.rooturl_admin}newscategory">Categories</a></li>
				  		<li id="menu_newscomment"><a href="{$conf.rooturl_admin}newscomment">Comments</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="photo-section"><span></span>
	          		<i class="icon-picture"></i> Photo
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_photo_list"><a href="{$conf.rooturl_admin}photo">View all photos</a></li>
				  		<li id="menu_photo_add"><a href="{$conf.rooturl_admin}photo/add">Upload photo</a></li>
				  		<li id="menu_photocategory"><a href="{$conf.rooturl_admin}photocategory">Categories</a></li>
				  		<li id="menu_photocomment"><a href="{$conf.rooturl_admin}photocomment">Comments</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="pages-section"><span></span>
	          		<i class="icon-edit"></i> Pages
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_pages_list"><a href="{$conf.rooturl_admin}pages">View all pages</a></li>
				  		<li id="menu_pagescomment"><a href="{$conf.rooturl_admin}pagescomment">Comments</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="banner-section"><span></span>
	          		<i class="icon-flag"></i> Banner
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_banner_list"><a href="{$conf.rooturl_admin}banner">View all banners</a></li>
				  		<li id="menu_bannerposition"><a href="{$conf.rooturl_admin}bannerposition">Position</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="order-section"><span></span>
	          		<i class="icon-search"></i> Search Engine
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_keyword"><a href="{$conf.rooturl_admin}keyword">View all keyword</a></li>
				  		<li id="menu_servicecontrol"><a href="{$conf.rooturl_admin}servicecontrol">Service Control</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="utility-section"><span></span>
	          		<i class="icon-wrench"></i> Utility
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_codegenerator"><a href="{$conf.rooturl_admin}codegenerator">Code Generator</a></li>
	              		<li id="menu_language"><a href="{$conf.rooturl_admin}language">Language Editor</a></li>
	              		<li id="menu_sessionmanager"><a href="{$conf.rooturl_admin}sessionmanager">Session Manager</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="template-section"><span></span>
	          		<i class="icon-desktop"></i> Templates
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_templatemanage"><a href="{$conf.rooturl_admin}templatemanage">View all templates</a></li>
	              		<li id="menu_colorchange"><a href="{$conf.rooturl_admin}colorchange">Color Change</a></li>
	              		<li id="menu_newtemplate"><a href="{$conf.rooturl_admin}newtemplate">Get new templates</a></li>
	          		</ul>
	          	</div>
	            
	          </div><!--/.well -->
	        </div><!--/span-->
	        <div class="span10" id="container">
