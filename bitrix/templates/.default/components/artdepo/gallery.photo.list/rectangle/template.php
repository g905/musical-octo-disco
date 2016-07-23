<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br /><br /><br />
<?endif;?>

<div class="gall_wr_artdepo popup-gallery" id="popup-gallery">
    <ul class="mult_gallery_tmpl1">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $thumb = CFile::ResizeImageGet(
            $arItem["SOURCE_ID"],
            array("width" => 205, "height" => 155),
            BX_RESIZE_IMAGE_EXACT
        );
        $src = ($thumb["src"]) ? $thumb["src"] : $arItem["THUMB_PATH"];
        ?>
        <li>
<? // микроразметка adl 08.04.16
	$APPLICATION->IncludeComponent(
		"coffeediz:schema.org.ImageObject",
		"",
		Array(
			"COMPONENT_TEMPLATE" => ".default",
			"SHOW" => "Y",
			"CONTENTURL" => $arItem["PATH"],
			"NAME" => $arItem["NAME"],
			"CAPTION" => $arItem["NAME"],
			"DESCRIPTION" => $arItem["NAME"],
			"HEIGHT" => "",
			"WIDTH" => "",
			"TRUMBNAIL_CONTENTURL" => "",
			"ITEMPROP" => "",
			"REPRESENTATIVEOFPAGE" => "True",
			"PARAM_RATING_SHOW" => "N"
		)
	);
?>
            <a href="<?=$arItem["PATH"]?>" class="gall_img_link" data-gallery="" rel="gallery-1"<?if($arParams["DISPLAY_NAME"] == "Y"):?> title="<?=$arItem["NAME"]?>"<?endif;?>>
                <img src="<?=$src?>" <?if($arParams["DISPLAY_NAME"] == "Y"):?> title="<?=$arItem["NAME"]?>" alt="<?=$arItem["NAME"]?>" <?endif;?>/>
                <span class="rolover"></span>
            </a>
        </li>
    <?endforeach;?>
    </ul>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

<?if($arParams["BACK_URL"]):?>
    <br /><a href="<?=$arParams["BACK_URL"]?>"><?=GetMessage("C_BACK_URL_TITLE")?></a>
<?endif;?>
