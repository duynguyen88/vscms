<?php /* Smarty version Smarty-3.0.7, created on 2013-11-03 19:22:04
         compiled from "templates/default/_controller/admin/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195853476352763fec072721-93209575%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '363865d4f1b3a6db312c9db889d188ddd8cba4e7' => 
    array (
      0 => 'templates/default/_controller/admin/header.tpl',
      1 => 1383481274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195853476352763fec072721-93209575',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title><?php echo $_smarty_tpl->getVariable('lang')->value['default']['adminPanel'];?>
 &raquo; <?php echo (($tmp = @$_smarty_tpl->getVariable('pageTitle')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('lang')->value['default']['menuDashboard'] : $tmp);?>
</title>
		

		<!-- jQuery -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
/js/jquery.js" charset="utf-8"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
/libs/tiny_mce/tiny_mce.js" charset="utf-8"></script>


		<!-- Custom Admin JS -->
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
min/?g=jsadmin&ver=<?php echo $_smarty_tpl->getVariable('setting')->value['admin']['jsversion'];?>
" charset="utf-8"></script>

		

		<!-- Custom Admin CSS -->
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
min/?g=cssadmin&ver=<?php echo $_smarty_tpl->getVariable('setting')->value['admin']['cssversion'];?>
" media="screen" charset="utf-8"/>
		
        <script type="text/javascript">
		var rooturl = "<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
";
		var rooturl_admin = "<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
";
		var controllerGroup = "<?php echo $_smarty_tpl->getVariable('controllerGroup')->value;?>
";
		var currentTemplate = "<?php echo $_smarty_tpl->getVariable('currentTemplate')->value;?>
";
		var delConfirm = "Are You Sure?";
		var delPromptYes = "Type YES to continue";
		</script>
		
	</head>
    
    <body>
	
		<div class="navbar navbar-fixed-top">
		   <div class="navbar-inner">
	        <div class="container-fluid">
	          <a class="brand" href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
" title="Go to Dashboard">no-name</a>
	          <div class="btn-group pull-right">
	            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
	              <i class="icon-user"></i> <?php echo $_smarty_tpl->getVariable('me')->value->fullname;?>

	              <span class="caret"></span>
	            </a>
	            <ul class="dropdown-menu">
	              <li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/edit/id/<?php echo $_smarty_tpl->getVariable('me')->value->id;?>
"><i class="icon-pencil"></i> Edit Profile</a></li>
				  <li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user/changepassword/id/<?php echo $_smarty_tpl->getVariable('me')->value->id;?>
"><i class="icon-lock"></i> Change Password</a></li>
	              <li class="divider"></li>
	              <li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
site/logout"><i class="icon-off"></i> Sign Out</a></li>
	            </ul>
	          </div>
	          <div class="nav-collapse">
			    <ul class="nav">
	              <li><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl'];?>
">Website</a></li>
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
	          			<li id="menu_user_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
user">Danh sách</a></li>
				  		<li id="menu_usergroup_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
usergroup">Nhóm</a></li>
				  		<li id="menu_role_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
role">Phân quyền</a></li>
				  		<li id="menu_setting"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
setting">Settings</a></li>
				  		<li id="menu_filemanager"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
filemanager">File Manager</a></li>
				  		<li id="menu_log"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
log">Moderator Log</a></li>
	          		</ul>
	          	</div>
	          	<!-- End of 1 accrodiron block -->

	          	<div class="accordion" id="product-section"><span></span>
	          		<i class="icon-tasks"></i> Product
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_product_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
product">View all product</a></li>
	          			<li id="menu_order_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
order">View all order</a></li>
				  		<li id="menu_productcategory"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
productcategory">Categories</a></li>
				  		<li id="menu_productcomment"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
productcomment">Comments</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="news-section"><span></span>
	          		<i class="icon-coffee"></i> News
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_news_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
news">View all news</a></li>
				  		<li id="menu_newscategory_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
newscategory">Categories</a></li>
				  		<li id="menu_newscomment"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
newscomment">Comments</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="photo-section"><span></span>
	          		<i class="icon-picture"></i> Photo
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_photo_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photo">View all photos</a></li>
				  		<li id="menu_photo_add"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photo/add">Upload photo</a></li>
				  		<li id="menu_photocategory"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photocategory">Categories</a></li>
				  		<li id="menu_photocomment"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
photocomment">Comments</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="pages-section"><span></span>
	          		<i class="icon-edit"></i> Pages
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_pages_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
pages">View all pages</a></li>
				  		<li id="menu_pagescomment"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
pagescomment">Comments</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="banner-section"><span></span>
	          		<i class="icon-flag"></i> Banner
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_banner_list"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
banner">View all banners</a></li>
				  		<li id="menu_bannerposition"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
bannerposition">Position</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="order-section"><span></span>
	          		<i class="icon-search"></i> Search Engine
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_keyword"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
keyword">View all keyword</a></li>
				  		<li id="menu_servicecontrol"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
servicecontrol">Service Control</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="utility-section"><span></span>
	          		<i class="icon-wrench"></i> Utility
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_codegenerator"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
codegenerator">Code Generator</a></li>
	              		<li id="menu_language"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
language">Language Editor</a></li>
	              		<li id="menu_sessionmanager"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
sessionmanager">Session Manager</a></li>
	          		</ul>
	          	</div>

	          	<div class="accordion" id="template-section"><span></span>
	          		<i class="icon-desktop"></i> Templates
	          	</div>
	          	<div>
	          		<ul class="nav nav-list" id="sidebar">
	          			<li id="menu_templatemanage"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
templatemanage">View all templates</a></li>
	              		<li id="menu_colorchange"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
colorchange">Color Change</a></li>
	              		<li id="menu_newtemplate"><a href="<?php echo $_smarty_tpl->getVariable('conf')->value['rooturl_admin'];?>
newtemplate">Get new templates</a></li>
	          		</ul>
	          	</div>
	            
	          </div><!--/.well -->
	        </div><!--/span-->
	        <div class="span10" id="container">
