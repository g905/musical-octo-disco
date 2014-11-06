<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="container subtext">
<p class="zagl">Наш блог</p>
			<div class="row">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<? 
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('NEWS_DELETE_CONFIRM')));
	?>
				<div class="col-xs-30">
					<h1 class="h2">
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" style="font-family: Arial Narrow,ArNarrow; text-decoration:none; ">
							<?=$arItem["NAME"]?>
						</a>
					</h1>
					<p id="date"><strong><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></strong></p>
					<?if ($arItem["PREVIEW_PICTURE"]):?>
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" <?if ($arItem["PREVIEW_PICTURE"]["WIDTH"]>994):?>width="994"<?endif?>>
					<?endif?>
					<br>
					<p>
						<?echo $arItem["PREVIEW_TEXT"];?>
					</p>
				</div>
<?endforeach;?>
			</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>