<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php if(isset($title)) { echo $title; } ?></title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- jquery script -->
        <script src="<?=base_url()?>assets/pixi/js/jquery.min.js"></script>

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
        <?php if(isset($htmlHead)) {
            echo $htmlHead;
        } ?>

		<!-- text fonts -->
		<link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/ace.min.css" />
        
        <!-- pixi styles -->
        <link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/pixiApps.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?=base_url()?>assets/pixi/js/html5shiv.js"></script>
		<script src="<?=base_url()?>assets/pixi/js/respond.min.js"></script>
		<![endif]-->
        
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default    navbar-collapse">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="<?=base_url()?>" class="navbar-brand">
						<small class="pixi">
                            <?php if (!empty($app_title)):?>
    						<?=$app_title;?>
    						<?php endif; ?>
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->
                    
                    <!-- #section:basics/navbar.toggle -->
					<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons">
						<span class="sr-only">Benutzermenü</span>
                        <span class="ace-icon btn-app fa fa-wrench icon-only bigger-250 white"></span>
					</button>

					<button class="pull-right navbar-toggle collapsed btn-app" type="button" data-toggle="collapse" data-target=".sidebar">
						<span class="sr-only">Toggle sidebar</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>
					</button>

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">

                        <li class="pixi-orange transparent">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <i class="ace-icon fa fa-user"></i>
								<span><?=\Pixi\AppsFactory\Environment::getUser(); ?></span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-hdd-o"></i>
                                        Datenbank: <?= \Pixi\AppsFactory\Environment::getCustomer(); ?>
									</a>
								</li>

								<?php if (!empty($userDropDown)) { ?>		
								<?php foreach($userDropDown->menuItems as $item) { ?>
								<li>
									<a href="<?=$item->FullURL()?>"> 
									<i class="<?=$item->Icon?>"></i> 
									<?=$item->Text?>
									</a>
								</li>
								<?php } ?>
								<?php } ?>

								<li class="divider"></li>

								<li>
									<a href="/<?php echo session_name(); ?>/?logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                     navbar-collapse collapse">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
                
            	<ul class="nav nav-list">
					<?php if(!empty($menu)) : ?>	
			    	<?php foreach ($menu->menuItems as $menuitem) : ?>
			    	<li <?php if ($menuitem->active()) { ?> class="active" <?php }; ?>>
			    		<?php if (isset($menuitem->subMenu)) :?>
			    			<a href="#" class="dropdown-toggle">
			    		<?php else: ?>
							<a href="<?=$menuitem->FullURL()?>">
						<?php endif; ?>
								
							<?php if ($menuitem->Icon != '') :?>
							<i class="menu-icon fa <?=$menuitem->Icon;?>"></i>
							<?php endif;?>
							
							<span class="menu-text"> <?=$menuitem->Text?> </span>
							<?php if (!empty($menuitem->CountSign)) : ?>
							<span class="badge badge-primary "><?=$menuitem->CountSign?></span>
							<?php endif; ?>
							<?php if (isset($menuitem->subMenu)) : ?>
							<b class="arrow fa fa-angle-down"></b>
							<?php endif;?>
							
						</a>
						<?php if (isset($menuitem->subMenu)) {?>
							<ul class="submenu">
			    			<?php foreach ($menuitem->subMenu->menuItems  as $submenuitem) {?>
								<li <?php if ($submenuitem->active()) { ?> class="active" <?php }; ?>><a href="<?=$submenuitem->FullURL()?>">
								
									<i class="menu-icon fa fa-caret-right"></i>
									<span class="menu-text"><?=$submenuitem->Text;?></span>
									<?php if (!empty($submenuitem->CountSign)) {?>
									<span class="badge badge-primary "><?=$submenuitem->CountSign?></span>
									<?php }; ?>
									
							</a></li>
							<?php };?>
							</ul>
						<?php };?>
						
					
				
					</li>
			      	<?php endforeach; ?>
					<?php endif; ?>
				</ul>
				<!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<!-- #section:basics/content.breadcrumbs -->
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

                    <ul class="breadcrumb">
						<?php if(!empty($menu)) : ?>
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="<?= base_url(); ?>">Home</a>
                        </li>
						<?=$menu->generateBreadCrumb()?>
						<?php endif; ?>
					</ul>
					<!-- .breadcrumb -->

                    <?php if (!empty($searchForm)) : ?>
					<div class="nav-search" id="nav-search">
						<?=$searchForm;?>
					</div>
					<?php endif; ?>
					<!-- #nav-search -->
                    
                    <!-- /section:basics/content.searchbox -->
				</div>

				<!-- /section:basics/content.breadcrumbs -->
				<div class="page-content">

                    <?php if (!empty($title)) : ?>
                    <div class="page-header">
						<h1>
                            
                                <?=$title?>
                                <small> 
                                <i class="ace-icon fa fa-angle-double-right"></i>
                                <?php if (!empty($subtitle)) : ?>
                                    <?=$subtitle;?>
                                <?php endif; ?>
                                </small>
                            
						</h1>
				   </div>
                   <?php endif; ?>
                    <!-- /.page-header -->

					<div class="row">
						<div class="col-xs-12">
                            <?php if (!empty($Messages) && is_array($Messages)) : ?> 
								<?php foreach ($Messages as $Message) : ?>
								<div class="alert alert-block <?=$Message['MessageType']?>">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>
										<?=$Message['Message']?>

								</div>
								<?php endforeach; ?>
							<?php endif; ?>	
                        
							<!-- PAGE CONTENT BEGINS -->
                            <?php if(!empty($body)) : ?>
                                <?=$body;?>
							<?php endif; ?>
							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="pixi-orange bolder">pixi*</span>
							SDK &copy; 2013-2015
                            <small>v1.0.0</small>
						</span>
                        
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?=base_url()?>assets/pixi/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
        <script type="text/javascript">
         window.jQuery || document.write("<script src='<?=base_url()?>assets/pixi/js/jquery1x.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?=base_url()?>assets/pixi/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?=base_url()?>assets/pixi/js/bootstrap.min.js"></script>		

		<!-- ace scripts -->
        <script src="<?=base_url()?>assets/pixi/js/ace.min.js"></script>
		<script src="<?=base_url()?>assets/pixi/js/ace-elements.min.js"></script>
        <script src="<?=base_url()?>assets/pixi/js/ace-extra.min.js"></script>

		<!-- inline scripts related to this page -->
		<link rel="stylesheet" href="<?=base_url()?>assets/pixi/css/ace.onpage-help.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="<?=base_url()?>assets/pixi/js/ace/ace.onpage-help.js"></script>
        <?= Pixi\AppsFactory\GoogleAnalytics::getCode() ?>
        <!-- page specific plugin scripts -->
        <?php if(isset($htmlBottom)) {
            echo $htmlBottom;
        } ?>
	</body>
</html>
