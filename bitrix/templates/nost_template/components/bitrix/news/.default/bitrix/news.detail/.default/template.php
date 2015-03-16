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
		<?if (strpos($arResult["DETAIL_TEXT"], "<!--form-here-->") !== false):?>
			<? $APPLICATION->IncludeComponent(
				"fake:main.feedback",
				"",
				Array(
					"USE_CAPTCHA" => "N",
					"OK_TEXT" => "Спасибо, ваше сообщение принято.",
					"EMAIL_TO" => "3412558963@mail.ru",
					"REQUIRED_FIELDS" => array("NAME","PHONE","MESSAGE"),
					"EVENT_MESSAGE_ID" => array("7")
				)
			);?>
		<?endif?>

 	<?else:?>
		<span class="itemstext"><?echo $arResult["PREVIEW_TEXT"];?></span>
	<?endif?>
	<p>&nbsp;</p>
	</div>
</div>
