<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
$curPage = $APPLICATION->GetCurPage(true);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noyaca"/>
	<link href="<?=SITE_TEMPLATE_PATH?>/css/style.css" rel="stylesheet" type="text/css" />
	<?if ( stristr($_SERVER['HTTP_USER_AGENT'], 'IE') ) {?> 
		<link href="<?=SITE_TEMPLATE_PATH?>/css/ie.css" rel="stylesheet" type="text/css" />
	<? };?>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.js"></script>
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> 
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scripts.js"></script>

    <!-- Bootstrap -->
    <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="<?=SITE_TEMPLATE_PATH?>/css/theme.min.css" rel="stylesheet"/>
	<link href="<?=SITE_TEMPLATE_PATH?>/css/no-responsive.css" rel="stylesheet"/>
	<link href="<?=SITE_TEMPLATE_PATH?>/css/fancybox/jquery.fancybox.css" rel="stylesheet"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<link href="<?=SITE_TEMPLATE_PATH?>/css/style_add.css" rel="stylesheet"/>
	
	<!--link rel="shortcut icon" type="image/vnd.microsoft.icon" href="favicon.ico" /-->

<!-- Скрипт оптимизации карточки товара -->
	<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH?>/js/hide_bots.js"></script> 
<!-- Скрипт оптимизации карточки товара -->

    
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>


</head>
<body>
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<!-- header -->
    <div id="header">
    <div class="bgtop"></div>
    <!-- hederTOP -->
    <div id="header">
		<div id="topline"></div>
		<div class="container logoblock">
			<header>
				<div class="row">
					<a href="/"><div style="float: left; margin-left: 20px;"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo1.png" style="margin: 10px 0px; max-height: 100px;"></div><div class="col-xs-11" id="logo" style="background-position: 39px 15px;width: 27.667%;">«Первый производитель объемных кроваток-машинок в России!»</div></a>
					<div class="col-xs-1" id="telephone">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/telephone.png" alt="Телефон"/>
					</div>
					<div class="col-xs-10" id="cart">
						<address>
						<span id="tel">8 (800) <span style="color:rgb(227,42,42);">200-32-21</span></span><br/>
						<span style="display: block; margin-top: -10px; margin-bottom: -25px;">Звонок по России бесплатный</span>
						</address>
					</div>
					<div class="col-xs-7 text-left" style="width: 23.33333333%;">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "sect",
								"AREA_FILE_SUFFIX" => "contacts_top",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_TEMPLATE" => ""
								)
						);?>			
					</div>
				</div>
			</header>
		</div>
    </div>
    <!-- hederTOP -->
        
        
        <!-- hederMENU -->
	<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu_romack", array(
	"ROOT_MENU_TYPE" => "top",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "2",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?> 
        <!-- hederMENU -->
    </div>
<!-- header -->


<!-- CONTENT-->


	<div id="content">


<?if ($curPage == '/index.php'):?>
		<div class="container slyder">
<!-- SLIDER -->
			<div class="row">
				<div class="jumbwrap">
					<div class="jumbotron shadow">
<?$APPLICATION->IncludeComponent("beono:banner_rotation", "romack_temple", array(
	"SOURCE" => "medialib",
	"LIMIT" => "6",
	"BANNER_IMAGE_1" => "/upload/banner-main/romack/banner-01.png",
	"BANNER_NAME_1" => "",
	"BANNER_HREF_1" => "",
	"BANNER_IMAGE_2" => "/upload/banner-main/romack/banner-02.png",
	"BANNER_NAME_2" => "",
	"BANNER_HREF_2" => "",
	"BANNER_IMAGE_3" => "/upload/banner-main/romack/banner-03.png",
	"BANNER_NAME_3" => "",
	"BANNER_HREF_3" => "",
	"BANNER_IMAGE_4" => "/upload/banner-main/romack/banner-04.png",
	"BANNER_NAME_4" => "",
	"BANNER_HREF_4" => "",
	"BANNER_IMAGE_5" => "/upload/banner-main/romack/banner-05.png",
	"BANNER_NAME_5" => "",
	"BANNER_HREF_5" => "/contacts/",
	"BANNER_IMAGE_6" => "/upload/banner-main/romack/banner-06.png",
	"BANNER_NAME_6" => "",
	"BANNER_HREF_6" => "",
	"JQUERY" => "Y",
	"PAGER_STYLE" => "digits",
	"PAGER_ORIENT" => "horizontal",
	"PAGER_POSITION" => "bottom_left",
	"WIDTH" => "1014px",
	"HEIGHT" => "370px",
	"EFFECT" => "slide_h",
	"TRANSITION_SPEED" => "300",
	"TRANSITION_INTERVAL" => "5000",
	"STOP_ON_FOCUS" => "N"
	),
	false
);?>
					</div>	
				</div>
			</div>
<!-- SLIDER -->
<?endif?>

