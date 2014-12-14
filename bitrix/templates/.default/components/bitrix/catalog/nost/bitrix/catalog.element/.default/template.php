<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <script>
	var j$ = jQuery.noConflict();
        j$(document).ready(function() {
            j$('.fancybox').fancybox();
        });
    </script>

 		<div class="container subtext">
			<div class="row">
				<div class="col-xs-18">



	<? $seo_title = $arResult["NAME"];
	if (is_array($arResult['DISPLAY_PROPERTIES']) && count($arResult['DISPLAY_PROPERTIES']) > 0):
		foreach($arResult["DISPLAY_PROPERTIES"] as $pid1=>$arProperty):
			if ($pid1 == 'SEO_IMAGE' && $arProperty["DISPLAY_VALUE"] != '')
				$seo_title = $arProperty["DISPLAY_VALUE"];
		endforeach;
	
	endif;
?>
<?
					// adl 10.12.14 Изменяем размер главной картинки на странице товара, чтобы сэкономить трафик
					$file2 = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'577', 'height'=>'432'), BX_RESIZE_IMAGE_EXACT, true); 
					$arResult["DETAIL_PICTURE"]["SRC"] = $file2["src"];
					$arResult["DETAIL_PICTURE"]["WIDTH"] = $file2["width"];
					$arResult["DETAIL_PICTURE"]["HEIGHT"] = $file2["height"];
					$arResult["DETAIL_PICTURE"]["FILE_SIZE"] = $file2["size"];
					$file2_big = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'1000'), BX_RESIZE_IMAGE_EXACT, true); 
?>
            				<div id="image" style="display: block;height:<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>px;width:<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>px;">
						<a href="<?=$file2_big["src"]?>" id="fancyboxPict" class="fancybox" rel="images" title="<?=$seo_title?>">
							<img id="mainPict" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$seo_title?>" title="<?=$seo_title?>" />
						</a>
					</div>
					<div class="clearfix"></div>
  		<? foreach($arResult["MORE_PHOTO"] as $PHOTO):?>  
			<? if ($PHOTO["CONTENT_TYPE"] == "application/x-shockwave-flash"): ?>
				<div id="flash" style="display:none;height:<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>px;width:<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>px;background-color:#000000;">
					<embed id="mainSwf" src="<?=$PHOTO["SRC"]?>" type="application/x-shockwave-flash" bgcolor="#000000" quality="high" width="400" height="300" style="margin-left:<?=($arResult["DETAIL_PICTURE"]["WIDTH"]-400)/2?>px;margin-top:<?=($arResult["DETAIL_PICTURE"]["HEIGHT"]-300)/2?>px;">
				</div>
			<?endif?>
		<? endforeach?>  
		<div style="display: block;height:20px;width:<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>px;text-align:center;font-family:Tahoma;font-size: 12px;"><?=$seo_title?></div>
					<div id="items-miniimg" class="miniatures">
			<? $file = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_EXACT, true); ?>  
                	<div class="activ" onclick="changePict('<?=$arResult["DETAIL_PICTURE"]["SRC"]?>', this, 'img', '<?=$file2_big["src"]?>');">
				<img src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
			</div>
		<?
		// additional photos  
		$LINE_ELEMENT_COUNT = 5; // number of elements in a row  
		if(count($arResult["MORE_PHOTO"])>0):?>  
    			<? foreach($arResult["MORE_PHOTO"] as $PHOTO):?>  
				<? if ($PHOTO["CONTENT_TYPE"] == "application/x-shockwave-flash"): 
					$format = "swf";
					// Получаем изображение "3Д вращения" из медиабиблиотеки
					if (CModule::IncludeModule("fileman")) {
						CMedialib::Init();
						
						//Получения списка всех коллекций
						$all_collections = CMedialibCollection::GetList(array('arFilter' => array('ACTIVE' => 'Y')));
						
						$id_collection = -1;
						foreach($all_collections as $one_collection) {
							if ($one_collection["NAME"] == "3d_rotation")
								$id_collection = $one_collection["ID"];
						}
						// Если нашли коллекцию с нужной нам картинкой
						if ($id_collection >= 0) {
							$items = CMedialibItem::GetList(array('arCollections' => array($id_collection)));	
							// Если есть нужная нам картинка
							if ($items[0]) {
								$SWF = $PHOTO;
								$SWF["HEIGHT"] = $items[0]["HEIGHT"];
								$SWF["WIDTH"] = $items[0]["WIDTH"];
								$SWF["FILE_SIZE"] = $items[0]["FILE_SIZE"];
								$SWF["CONTENT_TYPE"] = $items[0]["CONTENT_TYPE"];
								$SWF["SUBDIR"] = $items[0]["SUBDIR"];
								$SWF["FILE_NAME"] = $items[0]["FILE_NAME"];
								$SWF["SRC"] = $items[0]["PATH"];
								$file = CFile::ResizeImageGet($SWF, array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_EXACT, true); 
							} else {
								$file = CFile::ResizeImageGet($PHOTO, array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_EXACT, true); 
							}
						}
					}
				?>
				<? else:
					$format = "img";
					$file = CFile::ResizeImageGet($PHOTO, array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_EXACT, true); 
					
					// adl 03.06.14 Изменяем размер картинок на странице товара, чтобы сэкономить трафик
					// если честно - мне так не очень нравится(особенно $PHOTO["SUBDIR"], но может будет работать.
					$file1 = CFile::ResizeImageGet($PHOTO, array('width'=>'577', 'height'=>'432'), BX_RESIZE_IMAGE_EXACT, true); 
					$PHOTO["SRC"] = $file1["src"];
					$PHOTO["WIDTH"] = $file1["width"];
					$PHOTO["HEIGHT"] = $file1["height"];
					$PHOTO["FILE_SIZE"] = $file1["size"];
					$file1_big = CFile::ResizeImageGet($PHOTO, array('width'=>'1000'), BX_RESIZE_IMAGE_EXACT, true); 
					$file1_big["src"];
				?>
				<? endif?>
                            	<div onclick="changePict('<?=$PHOTO["SRC"]?>', this, '<?=$format?>', '<?=$file1_big["src"];?>');">
                    			<img src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />  
              			</div>
			<? endforeach?>  
		<?endif?>  
						<span></span>
					</div>
				</div>
        <!-- leftblock -->
        
        
        <!-- rightblock -->
				<div class="col-xs-12 text-right" id="description">
	<? // adl 10.10.13 Для некоторых товаров центруем название
		$ar_center = array("113", "112", "111", "110");
		if (in_array($arResult["ID"], $ar_center)) 
			$st_center = 'style="text-align:center;"';
		else
			$st_center = '';
	?>
					<div style="display:block">
			<?if ($arResult["IBLOCK_ID"] <> 3):?>
						<div class="headings text-left">
			<?else:?>
						<div class="headings text-left" style="width:370px;">
			<?endif?>
							<h1 class="h1">"<?=$arResult["NAME"]?>"</h1>
	<?foreach($arResult["PRICES"] as $code=>$arPrice):?>
		<?if($arPrice["PRINT_VALUE"] > 0):?>
							<h2 class="h2"><?=$arPrice["PRINT_VALUE"];?></h2>
		<?endif;?>
	<?endforeach;?>
						</div>
			<?if ($arResult["IBLOCK_ID"] <> 3):?>
						<form id="buy" action="/buy_now/" method="post">
							<input type="hidden" name="product_id" value="<?=$arResult["ID"]?>"/>
							<span class="round-border"><button type="button" class="btn btn-primary btn-lg" onclick="document.getElementById('buy').submit();">Заказать</button></span>
						</form>
			<?endif?>
					</div>

	<!-- Закладки -->
						<div class="clearfix"></div>
						<div id="tabs">
<?if ($arResult["IBLOCK_ID"] <> 3):?>
							<ul class="nav nav-tabs">
								<li class="active"><a href="#spec" data-toggle="tab">Спецификация</a></li>
<?if (trim($arResult["PROPERTIES"]["DISCOUNT_TABLE"]["VALUE"]) <> ''):?>
								<li><a href="#skidki" data-toggle="tab">Скидки</a></li>
<?endif;?>
								<li><a href="#sroki" data-toggle="tab">Сроки</a></li>
							</ul>
							<div class="tab-content">

									<div class="tab-pane fade in active" id="spec">
										
											<table class="table table-bordered">
	<?if (is_array($arResult['DISPLAY_PROPERTIES']) && count($arResult['DISPLAY_PROPERTIES']) > 0):
		$cnt = 0;

		foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
		if ($pid != 'PRICE' && $pid != 'PRICECURRENCY' && $pid != 'SEO_IMAGE'):
			if ($cnt == 0):
				$cnt++;
	?>
			<?endif;?>


												<tr>
													<td><span id="reddy"><?=str_replace('(Д х Ш х В)', '<br/>(Д х Ш х В)', $arProperty["NAME"]);?></span></td>
													<td>
				<?
			if(is_array($arProperty["DISPLAY_VALUE"])):
				echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
			elseif($pid=="MANUAL"):
?>
					<a href="<?=$arProperty["VALUE"]?>"><?=GetMessage("CATALOG_DOWNLOAD")?></a>
<?			elseif($pid="MATERIAL"):?>
					<? echo str_replace(array("поликарбонат","Поликарбонат") , "<a href='/information/materialy/polikarbonat.html' title='Описание материала поликарбонат'>Поликарбонат</a>", $arProperty["DISPLAY_VALUE"]); ?>
<?
			else:
				echo $arProperty["DISPLAY_VALUE"];
			endif;
				?>
													</td>
												</tr>
<?
		endif;
		endforeach;
	
	endif;
?>            
											</table>
									</div>






	<? /*echo "!!".$arResult["PROPERTIES"]["DISCOUNT_TABLE"]["VALUE"]."$$";
	$ar_discount = array("9", "25", "26", "27", "38", "5"); // список айдишников категорий, в которых должна быть таблица скидок
	if (in_array($arResult["IBLOCK_SECTION_ID"], $ar_discount)) { */
	if (trim($arResult["PROPERTIES"]["DISCOUNT_TABLE"]["VALUE"]) <> '') {
		$arDiscount = preg_split("/[:;]/" , $arResult["PROPERTIES"]["DISCOUNT_TABLE"]["VALUE"]);
	?>
									<div class="tab-pane fade" id="skidki">
											<table class="table table-bordered">
											<? if (count($arDiscount) >= 2):?>
												<tr>
													<td><span id="reddy">Кол-во</span></td>
												<?foreach($arDiscount as $id=>$elem) {
													if (!($id % 2)) {?>
													<td>от <?echo $elem;?> шт.</td>
												<?} }?>
												</tr>
												<tr>
													<td><span id="reddy">Скидка</span></td>
												<?foreach($arDiscount as $id=>$elem) {
													if ($id % 2) {
														// adl 17.04.14 для seo
														if (((($arResult["IBLOCK_SECTION_ID"]=="25")&&($arResult["ID"]=="86"))|| 
													    		(($arResult["IBLOCK_SECTION_ID"]=="9")&&($arResult["ID"]=="43")))&&($elem == 'Цена договорная')) {
													    		$elem = '<a href="/price/" title="шашки такси цена">Цена</a> договорная';
													    	}


												?>
													<td><span id="reddy"><?echo $elem;?></span></td>
												<?} }?>
												</tr>
												<?else:?>
												<tr>
													<td colspan="<?=((int)(count($arDiscount)/2)+1)?>">
														<? echo $arDiscount[0];?>
													</td>
												</tr>
												<?endif?>
												<tr style="text-align:left;"><td colspan="<?=((int)(count($arDiscount)/2)+1)?>"><span id="reddy"><?echo str_replace("поликарбоната", "<b>поликарбоната</b>", str_replace("полистирола", "<b>полистирола</b>", $arResult["PROPERTIES"]["ADDITIONAL_TEXT"]["VALUE"]));?></span></td></tr>
											</table>
									</div>
	<? } ?>
									<div class="tab-pane fade" id="sroki">
									</div>
							</div>
<?endif?>
						</div>
	<!-- Закладки -->
						<p class="text-left">
							<?=$arResult["DETAIL_TEXT"];?>
						</p>
				</div>
        <!-- rightblock -->
			</div>	
		</div>
