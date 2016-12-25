<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <div class="contenttext-item">
        <div>
            <h1><?=$arResult["NAME"]?></h1>
            <div class="itemstext"><?=$arResult["DETAIL_TEXT"]?></div>
        </div>
    </div>
<?$APPLICATION->IncludeComponent( "coffeediz:schema.org.Article",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW" => "Y",
		"TYPE" => "",
		"LEARNING_RESOURCE_TYPE" => "",
		"NAME" => $arResult["NAME"],
		"ARTICLEBODY" => $arResult["DETAIL_TEXT"],
		"ABOUT" => $arResult["DETAIL_TEXT"],
		"GENRE" => "",
		"ARTICLE_SECTION" => array(""),
		"KEYWORDS" => array(""),
		"IN_LANGUAGE" => "ru",
		"DATA_PUBLISHED" => date("Y-m-d", strtotime($arResult["DATE_CREATE"])),
		"DATA_MODIFIED" => date("Y-m-d", strtotime($arResult["DATE_CREATE"])),
		"AUTHOR_TYPE" => "",
		"PARAM_RATING_SHOW" => "N",
		"IMAGEURL" => "https://www.nost.ru".SITE_TEMPLATE_PATH."/img/logo.png",
		"IMAGE_NAME" => $arResult["NAME"],
		"IMAGE_CAPTION" => $arResult["NAME"],
		"IMAGE_DESCRIPTION" => $arResult["NAME"],
		"IMAGE_HEIGHT" => 62,
		"IMAGE_WIDTH" => 291,
		"IMAGE_TRUMBNAIL_CONTENTURL" => "",
		"MAINENTITYOFPAGE" => "https://www.nost.ru".$APPLICATION->GetCurPage(true),
		"AUTHOR_ORGANIZATION_ADDRESS" => "ул. Сабурова, 4",
		"AUTHOR_ORGANIZATION_COUNTRY" => "Россия",
		"AUTHOR_ORGANIZATION_DESCRIPTION" => "Производство и продажа шашек на такси, шашечек такси, световых рекламных коробов и магнитных виниловых наклеек для такси",
		"AUTHOR_ORGANIZATION_LOCALITY" => "Ижевск, с. Первомайский",
		"AUTHOR_ORGANIZATION_NAME" => "Производственная компания 'НОСТ'",
		"AUTHOR_ORGANIZATION_PHONE" => array("8-800-700-66-78","+7(499) 705 67 04","8(3412)55-89-63",""),
		"AUTHOR_ORGANIZATION_POST_CODE" => "427007",
		"AUTHOR_ORGANIZATION_REGION" => "Удмуртская республика",
		"AUTHOR_ORGANIZATION_SITE" => "www.nost.ru",
		"AUTHOR_ORGANIZATION_TYPE_2" => "LocalBusiness",
		"AUTHOR_ORGANIZATION_TYPE_3" => "AutomotiveBusiness",
		"AUTHOR_ORGANIZATION_TYPE_4" => "",
		"AUTHOR_TYPE" => "Organization",
		"AUTHOR_ORGANIZATION_LOGO" => "https://www.nost.ru".SITE_TEMPLATE_PATH."/img/logo.png",
		"PUBLISHER_ORGANIZATION_ADDRESS" => "ул. Сабурова, 4",
		"PUBLISHER_ORGANIZATION_COUNTRY" => "Россия",
		"PUBLISHER_ORGANIZATION_DESCRIPTION" => "Производство и продажа шашек на такси, шашечек такси, световых рекламных коробов и магнитных виниловых наклеек для такси",
		"PUBLISHER_ORGANIZATION_LOCALITY" => "Ижевск, с. Первомайский",
		"PUBLISHER_ORGANIZATION_NAME" => "Производственная компания 'НОСТ'",
		"PUBLISHER_ORGANIZATION_PHONE" => array("8-800-700-66-78","+7(499) 705 67 04","8(3412)55-89-63",""),
		"PUBLISHER_ORGANIZATION_POST_CODE" => "427007",
		"PUBLISHER_ORGANIZATION_REGION" => "Удмуртская республика",
		"PUBLISHER_ORGANIZATION_SITE" => "www.nost.ru",
		"PUBLISHER_ORGANIZATION_TYPE_2" => "LocalBusiness",
		"PUBLISHER_ORGANIZATION_LOGO" => "https://www.nost.ru".SITE_TEMPLATE_PATH."/img/logo.png"
	),
	false,
	array('HIDE_ICONS' => 'Y')
);?>

