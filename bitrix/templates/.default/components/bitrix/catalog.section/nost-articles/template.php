<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<p class="zagl"><?=$arResult["NAME"]?></p>
       <div class="articlesblock">
                
<?foreach($arResult["ITEMS"] as $arItem):?>

                <div class="articlestext">
			<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                		<p class="articleszagl"><?echo $arItem["NAME"]?></p>
			</a>
               		<p><?echo $arItem["PREVIEW_TEXT"];?></p>
		</div>
<?endforeach;?>
	</div>

