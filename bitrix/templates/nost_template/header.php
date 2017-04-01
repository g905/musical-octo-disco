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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?=SITE_TEMPLATE_PATH?>/css/style.css" rel="stylesheet" type="text/css" />
	<?if ( stristr($_SERVER['HTTP_USER_AGENT'], 'IE') ) {?> 
		<link href="<?=SITE_TEMPLATE_PATH?>/css/ie.css" rel="stylesheet" type="text/css" />
	<? };?>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.js"></script> 
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scripts.js"></script>

    <!-- Bootstrap -->
    <link href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="<?=SITE_TEMPLATE_PATH?>/css/theme.min.css" rel="stylesheet"/>
	<link href="<?=SITE_TEMPLATE_PATH?>/css/no-responsive.css" rel="stylesheet"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<link href="<?=SITE_TEMPLATE_PATH?>/css/style_add.css" rel="stylesheet"/>
	
	<!--link rel="shortcut icon" type="image/vnd.microsoft.icon" href="favicon.ico" /-->

<!-- Скрипт оптимизации карточки товара -->
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/hide_bots.js"></script>
<!-- Скрипт оптимизации карточки товара -->

    
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>


<?if ($curPage == '/buy_now/index.php'):?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="HandheldFriendly" content="true" />
	<link type="text/css" rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/styles/form.css?v3.1.13"/>
<? /* adl 01.04.17 Убираем, не нужно
	<link type="text/css" rel="stylesheet" href="http://cdn.jotfor.ms/css/styles/solid.css?3.1.13" />
	<link type="text/css" media="print" rel="stylesheet" href="http://cdn.jotfor.ms/css/printForm.css?3.1.13" />
*/ ?>
	<style type="text/css">
	    .form-label{
	        width:150px !important;
	    }
	    .form-label-left{
	        width:150px !important;
	    }
	    .form-line{
	        padding-top:12px;
	        padding-bottom:12px;
	    }
	    .form-label-right{
	        width:150px !important;
	    }
	    .form-all{
	        width:900px;
	        //background:url("<?=SITE_TEMPLATE_PATH?>/images/brushed.png") repeat scroll center center rgb(153, 153, 153);
			    border-radius: 10px;
    background: rgba(217, 218, 221, 0.62);
    box-shadow: inset 0px 0px 67px #A9A3A3;
	        color:Black !important;
	        font-family:'Verdana';
	        font-size:12px;
	    }
		input[type=number] {
		    -moz-appearance:textfield;
		}
	</style>
	
	<script src="<?=SITE_TEMPLATE_PATH?>/js/prototype.js?v=3.1.13" type="text/javascript"></script>
	<!--script src="<?=SITE_TEMPLATE_PATH?>/js/json2.js?v=3.1.13" type="text/javascript"></script-->
	<script src="<?=SITE_TEMPLATE_PATH?>/js/protoplus.js?v=3.1.13" type="text/javascript"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/js/protoplus-ui.js?v=3.1.13" type="text/javascript"></script>
<?/*	<script src="<?=SITE_TEMPLATE_PATH?>/js/jotform.js?v=3.1.13" type="text/javascript"></script>
	<script type="text/javascript">
   	   JotForm.setConditions([{"action":[{"field":"9","visibility":"Show"}],"index":"0","link":"Any","priority":"0","terms":[{"field":"8","operator":"equals","value":"С оклейкой"}],"type":"field"},{"type":"field","link":"Any","terms":[{"field":"1","operator":"equals","value":"Винил-магнит 600х100(Магнитные наклейки на такси)"},{"field":"1","operator":"equals","value":"Винил-магнит 500х200(Магнитные наклейки на такси)"},{"field":"1","operator":"equals","value":"Винил-магнит 600х250(Магнитные наклейки на такси)"},{"field":"1","operator":"equals","value":"Винил-магнит 1000х200(Магнитные наклейки на такси)"}],"action":[{"field":"3","visibility":"Hide"},{"field":"4","visibility":"Hide"}],"priority":1,"index":1},{"type":"field","link":"Any","terms":[{"field":"1","operator":"equals","value":"Бобер (80 см)(Световые рекламные короба)"},{"field":"1","operator":"equals","value":"Сити (80 см)(Световые рекламные короба)"},{"field":"1","operator":"equals","value":"Вегас (100 см)(Световые рекламные короба)"},{"field":"1","operator":"equals","value":"Соболь (140 см)(Световые рекламные короба)"}],"action":[{"field":"7","visibility":"Hide"},{"field":"14","visibility":"Show"}],"priority":2,"index":2},{"action":[{"field":"13","visibility":"Show"}],"index":"3","link":"Any","priority":"3","terms":[{"field":"15","operator":"equals","value":"Оплата от организации по счету"}],"type":"field"}]);
	   JotForm.init(function(){
	      JotForm.description('input_1', 'Выберите модель заказываемого изделия');
	      JotForm.description('input_3', 'Выберите цвет изделия');
	      JotForm.description('input_4', 'Выберите материал изготовления изделия. Свойства каждого материала описаны в разделе \"Информация\"');
	      $('input_7').spinner({ imgPath:'http://cdn.jotfor.ms/images/', width: '60', maxValue:'', minValue:'10', allowNegative: false, addAmount: 1, value:'10' });
	      JotForm.description('input_7', 'Количество заказываемых изделий. Минимальный заказ 10 шт.');
      	      $('input_14').spinner({ imgPath:'http://cdn.jotfor.ms/images/', width: '60', maxValue:'', minValue:'1', allowNegative: false, addAmount: 1, value:'1' });
              JotForm.description('input_14', 'Количество заказываемых изделий. Минимальный заказ 1 шт.');
	      JotForm.description('input_8', 'Необходима ли оклейка изделий. Подробнее в разделе \"Доп. услуги\"');
	      $('input_9').hint('Опишите какую оклейку Вы хотите видеть максимально полно(необязательное поле).');
		  JotForm.description('input_9', 'Опишите какую оклейку Вы хотите видеть максимально полно(необязательное поле).');
	      $('input_10').hint('Иванов Иван Иванович');
	      JotForm.description('input_10', 'Как Вас зовут(ФИО)');
	      $('input_11').hint('8(901)123-45-67, Москва');
	      JotForm.description('input_11', 'Телефон для связи, Ваш город');
	      $('input_12').hint('mail@mail.ru');
	      JotForm.description('input_12', 'Ваш e-mail для связи');
	      JotForm.description('input_15', 'Выберите способ оплаты - от частного лица, или от организации');
	      $('input_13').hint('1. Полный почтовый адрес организации ( пример: 125009 Москва ул Петровка 25...) 2. Наименование организации. (пример: ООО "Салют" или ИП Груздев Василий Алибабаевич)');
	      JotForm.description('input_13', 'Укажите Ваши реквизиты для выставления счета и прочие комментарии по заказу(необязательное поле).');
	   });
	</script>
*/?>	
<?endif?>
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
					<a href="/"><div class="col-xs-11" id="logo"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo1.png" alt="НОСТ" style="margin: 10px 0px; max-height: 100px;"></div></a>
					<div class="col-xs-1" id="telephone">
						<img src="<?=SITE_TEMPLATE_PATH?>/images/telephone.png" alt="Телефон"/>
					</div>
					<div class="col-xs-10" id="cart">
						<address>
						<span id="tel">8-800-<span style="color:rgb(227,42,42);">700-66-78</span></span><br/>
						<span style="display: block; margin-top: -10px; margin-bottom: -25px;">Звонок по России бесплатный</span>
						</address>
					</div>
					<div class="col-xs-7 text-left">
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
	<?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu_nost", array(
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
<?$APPLICATION->IncludeComponent("beono:banner_rotation", "nost_temple", array(
	"SOURCE" => "medialib",
	"LIMIT" => "5",
	"BANNER_IMAGE_1" => "/upload/banner-main/banner-01.jpg",
	"BANNER_NAME_1" => "",
	"BANNER_HREF_1" => "/news/",
	"BANNER_IMAGE_2" => "/upload/banner-main/banner-02.jpg",
	"BANNER_NAME_2" => "",
	"BANNER_HREF_2" => "/promo/besplatnyy-obrazets-shashki.html",
	"BANNER_IMAGE_3" => "/upload/banner-main/banner-03.jpg",
	"BANNER_NAME_3" => "",
	"BANNER_HREF_3" => "/price/",
	"BANNER_IMAGE_4" => "/upload/banner-main/banner-04.jpg",
	"BANNER_NAME_4" => "",
	"BANNER_HREF_4" => "/video/",
	"BANNER_IMAGE_5" => "/upload/banner-main/banner-05.jpg",
	"BANNER_NAME_5" => "",
	"BANNER_HREF_5" => "/promo/ostatki-shashek-na-sklade.html",
	"JQUERY" => "Y",
	"PAGER_STYLE" => "digits",
	"PAGER_ORIENT" => "horizontal",
	"PAGER_POSITION" => "top_left",
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

