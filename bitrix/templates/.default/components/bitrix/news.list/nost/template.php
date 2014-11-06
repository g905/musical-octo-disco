<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<div id="news">
		<div class="container posts">
			<div class="row">
				<div style="display:block;">
					<h2 class="h2" style="display:inline-block;">Наш блог</h2>
					<div class="allnews"><a href="/news/">Все посты</a></div>
				</div>
                
<?foreach($arResult["ITEMS"] as $arItem):?>

				<div class="col-xs-10" id="news1">
					<p id="date"><strong><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></strong></p>
					<p class="text-justify">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</p>
					<p class="text-right"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">Подробнее</a></p>
				</div>
<?endforeach;?>
			</div>
		</div>
	</div>
