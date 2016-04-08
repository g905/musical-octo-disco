<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="contenttext-item" style="min-height:0px">
        <div>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h1 class="h2"><?=$arResult["NAME"]?></h1>
		<p>&nbsp;</p>
	<?endif;?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<p id="date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></p>
	<?endif;?>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" <?if ($arResult["DETAIL_PICTURE"]["WIDTH"]<994):?>width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"<?else:?>width="994"<?endif?> alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<?endif?>
	<p>&nbsp;</p>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<span class="itemstext"><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></span>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
 	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<span class="itemstext"><?echo $arResult["DETAIL_TEXT"];?></span>
 	<?else:?>
		<span class="itemstext"><?echo $arResult["PREVIEW_TEXT"];?></span>
	<?endif?>
	<p>&nbsp;</p>
	</div>
</div>
<?$APPLICATION->IncludeComponent( "coffeediz:schema.org.Article",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW" => "Y",
		"TYPE" => "BlogPosting",
		"LEARNING_RESOURCE_TYPE" => "",
		"NAME" => $arResult["NAME"],
		"ARTICLEBODY" => $arResult["DETAIL_TEXT"],
		"ABOUT" => $arResult["DETAIL_TEXT"],
		"GENRE" => "",
		"ARTICLE_SECTION" => array(""),
		"KEYWORDS" => array(""),
		"IN_LANGUAGE" => "ru",
		"DATA_PUBLISHED" => date("Y-m-d", strtotime($arResult["DISPLAY_ACTIVE_FROM"])),
		"DATA_MODIFIED" => date("Y-m-d", strtotime($arResult["DISPLAY_ACTIVE_FROM"])),
		"AUTHOR_TYPE" => "",
		"IMAGEURL" => "http://www.nost.ru".$arResult["DETAIL_PICTURE"]["SRC"],
		"PARAM_RATING_SHOW" => "N",
		"IMAGE_NAME" => $arResult["DETAIL_PICTURE"]["TITLE"],
		"IMAGE_CAPTION" => $arResult["DETAIL_PICTURE"]["ALT"],
		"IMAGE_DESCRIPTION" => $arResult["DETAIL_PICTURE"]["ALT"],
		"IMAGE_HEIGHT" => $arResult["DETAIL_PICTURE"]["HEIGHT"],
		"IMAGE_WIDTH" => $arResult["DETAIL_PICTURE"]["WIDTH"],
		"IMAGE_TRUMBNAIL_CONTENTURL" => "",
		"MAINENTITYOFPAGE" => "http://www.nost.ru".$APPLICATION->GetCurPage(true),
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
		"AUTHOR_ORGANIZATION_LOGO" => "http://www.nost.ru".SITE_TEMPLATE_PATH."img/logo.png",
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
		"PUBLISHER_ORGANIZATION_LOGO" => "http://www.nost.ru".SITE_TEMPLATE_PATH."img/logo.png"
	),
	false,
	array('HIDE_ICONS' => 'Y')
);
?>
