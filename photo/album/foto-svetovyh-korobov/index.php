<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

// adl 04.11.14 Устанавливаем мета-теги в зависимости от страницы
$page = 1;
if (isset($_REQUEST['PAGEN_1']) && intval($_REQUEST['PAGEN_1'])>0){
	$page = $_REQUEST['PAGEN_1'];
};

$APPLICATION->SetPageProperty("title", "Страница ".$page ." | Фотографии световых коробов на такси - ПК «НОСТ»");
$APPLICATION->SetPageProperty("description", "Страница ".$page ." | Весь ассортимент производимых ПК «НОСТ» световых рекламных коробов на такси, представленный в виде фотографий для того, чтобы Вы могли по достоинству оценить качество нашей продукции");
$APPLICATION->SetPageProperty("keywords", "фотографии световых коробов на такси страница ".$page);


//$APPLICATION->SetTitle("Галерея");
?>
            <div class="nav">

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"nost",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "-"
	),
false
);?>    
            
            </div>

		<h1 class="h2">Фото световых коробов нашего производства</h1>

<?$APPLICATION->IncludeComponent("artdepo:gallery.photo.list", "rectangle", array(
	"POPUP_TEMPLATE" => "photobox",
	"SECTION_ID" => "5",
	"PARENT_ID" => 7,
	"LANGUAGE_ID" => "ru",
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "SORT",
	"SORT_ORDER1" => "ASC",
	"DISPLAY_NAME" => "Y",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"NAME_TRUNCATE_LEN" => "",
	"SKIP_FIRST" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"BACK_URL" => "../../",
	"DISPLAY_TOP_PAGER" => "Y",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
