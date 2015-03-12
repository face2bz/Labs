<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>E-Bisoutfle</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/css/jeranders.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="../../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link id="style_color" href="../../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/select2/select2.css"/>
	<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
	<link href="../../assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
	<link rel="stylesheet" type="text/css" href="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-quick-sidebar-over-content">
	<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="index.html">
					<img src="../../assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
				</a>
				<div class="menu-toggler sidebar-toggler hide">
				</div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
			</a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
							<span class="badge badge-default">
								1 </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3><span class="bold">1 pending</span> notifications</h3>
									<a href="extra_profile.html">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
												<span class="time">just now</span>
												<span class="details">
													<span class="label label-sm label-icon label-success">
														<i class="fa fa-plus"></i>
													</span>
													New user registered. </span>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- END NOTIFICATION DROPDOWN -->
							<!-- BEGIN INBOX DROPDOWN -->
							<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<i class="icon-envelope-open"></i>
									<span class="badge badge-default">
										1 </span>
									</a>
									<ul class="dropdown-menu">
										<li class="external">
											<h3>You have <span class="bold">1 New</span> Messages</h3>
											<a href="page_inbox.html">view all</a>
										</li>
										<li>
											<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
												<li>
													<a href="inbox.html?a=view">
														<span class="photo">
															<img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt="">
														</span>
														<span class="subject">
															<span class="from">
																Lisa Wong </span>
																<span class="time">Just Now </span>
															</span>
															<span class="message">
																Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
															</a>
														</li>								
													</ul>
												</li>
											</ul>
										</li>
										<!-- END INBOX DROPDOWN -->
										<!-- BEGIN TODO DROPDOWN -->
										<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
												<i class="icon-calendar"></i>
												<span class="badge badge-default">
													1 </span>
												</a>
												<ul class="dropdown-menu extended tasks">
													<li class="external">
														<h3>You have <span class="bold">1 pending</span> tasks</h3>
														<a href="page_todo.html">view all</a>
													</li>
													<li>
														<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
															<li>
																<a href="javascript:;">
																	<span class="task">
																		<span class="desc">New release v1.2 </span>
																		<span class="percent">30%</span>
																	</span>
																	<span class="progress">
																		<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
																	</span>
																</a>
															</li>
														</ul>
													</li>
												</ul>
											</li>
											<!-- END TODO DROPDOWN -->
											<!-- BEGIN USER LOGIN DROPDOWN -->
											<li class="dropdown dropdown-user">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
													<img alt="" class="img-circle" src="../../assets/admin/layout/img/avatar3_small.jpg"/>
													<span class="username username-hide-on-mobile">
														<?php echo info('m_nom_utilisateur'); ?> </span>
														<i class="fa fa-angle-down"></i>
													</a>
													<ul class="dropdown-menu dropdown-menu-default">
														<li>
															<a href="extra_profile.html">
																<i class="icon-user"></i> My Profile </a>
															</li>
															<li>
																<a href="page_calendar.html">
																	<i class="icon-calendar"></i> My Calendar </a>
																</li>
																<li>
																	<a href="inbox.html">
																		<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
																		3 </span>
																	</a>
																</li>
																<li>
																	<a href="page_todo.html">
																		<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
																		7 </span>
																	</a>
																</li>
																<li class="divider">
																</li>
																<li>
																	<a href="extra_lock.html">
																		<i class="icon-lock"></i> Lock Screen </a>
																	</li>
																	<li>
																		<a href="logout.php">
																			<i class="icon-key"></i> Déconnexion </a>
																		</li>
																	</ul>
																</li>
																<!-- END USER LOGIN DROPDOWN -->
															</ul>
														</div>
														<!-- END TOP NAVIGATION MENU -->
													</div>
													<!-- END HEADER INNER -->
												</div>
												<!-- END HEADER -->
												<div class="clearfix">
												</div>
												<!-- BEGIN CONTAINER -->
												<div class="page-container">
													<!-- BEGIN SIDEBAR -->
													<div class="page-sidebar-wrapper">
														<div class="page-sidebar navbar-collapse collapse">
															<!-- BEGIN SIDEBAR MENU -->
															<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
																<li class="sidebar-toggler-wrapper">
																	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
																	<div class="sidebar-toggler">
																	</div>
																	<!-- END SIDEBAR TOGGLER BUTTON -->
																</li>
																<li class="sidebar-search-wrapper">
																	<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
																	<form class="sidebar-search " action="extra_search.html" method="POST">
																		<a href="javascript:;" class="remove">
																			<i class="icon-close"></i>
																		</a>
																		<div class="input-group">
																			<input type="text" class="form-control" placeholder="Search...">
																			<span class="input-group-btn">
																				<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
																			</span>
																		</div>
																	</form>
																	<!-- END RESPONSIVE QUICK SEARCH FORM -->
																</li>
																<li class="tooltips" data-container="body" data-placement="right" data-html="true" data-original-title="AngularJS version demo">
																	<a href="index.php">
																		<i class="icon-paper-plane"></i>
																		<span class="title">
																			Panneaux de contrôle </span>
																		</a>
																	</li>
																	<li class="start ">
																		<a href="javascript:;">
																			<i class="icon-home"></i>
																			<span class="title">Produits</span>
																			<span class="arrow "></span>
																		</a>
																		<ul class="sub-menu">
																			<li>
																				<a href="index.html">
																					<i class="icon-bar-chart"></i>
																					Voir les produits</a>
																				</li>
																				<li>
																					<a href="index_2.html">
																						<i class="icon-bulb"></i>
																						Ajout de produits</a>
																					</li>
																					<li>
																						<a href="#">
																							<i class="icon-graph"></i>
																							Voir type de produit</a>
																						</li>
																						<li>
																						<a href="ajout_type_produit.php">
																							<i class="icon-graph"></i>
																							Ajouter un type de produit</a>
																						</li>
																					</ul>
																				</li>


																				<li class="start ">
																					<a href="javascript:;">
																						<i class="icon-home"></i>
																						<span class="title">Fournisseurs</span>
																						<span class="arrow "></span>
																					</a>
																					<ul class="sub-menu">
																						<li>
																							<a href="liste_fournisseurs.php">
																								<i class="icon-bar-chart"></i>
																								Voir les fournisseurs</a>
																							</li>
																							<li>
																								<a href="ajout_fournisseur.php">
																									<i class="icon-bulb"></i>
																									Ajout de fournisseur</a>
																								</li>
																								<li>
																									<a href="index_3.html">
																										<i class="icon-graph"></i>
																										New Dashboard #2</a>
																									</li>
																								</ul>
																							</li>


																						</ul>
																						<!-- END SIDEBAR MENU -->
																					</div>
																				</div>
																				<!-- END SIDEBAR -->
																				<!-- BEGIN CONTENT -->
																				<div class="page-content-wrapper">