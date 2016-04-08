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
			$file2_big = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'1000', 'height'=>'1000'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
			$file2 = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'577', 'height'=>'432'), BX_RESIZE_IMAGE_EXACT, true); 
			$arResult["DETAIL_PICTURE"]["SRC"] = $file2["src"];
			$arResult["DETAIL_PICTURE"]["WIDTH"] = $file2["width"];
			$arResult["DETAIL_PICTURE"]["HEIGHT"] = $file2["height"];
			$arResult["DETAIL_PICTURE"]["FILE_SIZE"] = $file2["size"];
			$file = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_EXACT, true);


			// adl 21.12.2014 Создаем массив всех без исключения картинок и флешек (путь до супер-большой картинки, титл для <a>, путь до средней картинки, ширина средней картинки, 
			// высота средней картинки, alt и title для <img>, видимость средней картинки, путь до маленькой картинки, ширина маленькой картинки, высота маленькой картинки, 
			// alt и title маленькой картинки, формат - изображение или флеш)
			$allMedia[0] = Array(	"BIG_PATH" => $file2_big["src"],
						"BIG_WIDTH" => str_replace("px", "", $file2_big["width"]),
						"BIG_HEIGHT" => str_replace("px", "", $file2_big["height"]),
						"A_TITLE" => $seo_title,
						"NORMAL_PATH" => $arResult["DETAIL_PICTURE"]["SRC"],
						"NORMAL_WIDTH" => $arResult["DETAIL_PICTURE"]["WIDTH"],
						"NORMAL_HEIGHT" => $arResult["DETAIL_PICTURE"]["HEIGHT"],
						"NORMAL_TITLE" => $seo_title,
						"NORMAL_VISIBLE" => "block",
						"SMALL_PATH" => $file["src"],
						"SMALL_WIDTH" => $file["width"],
						"SMALL_HEIGHT" => $file["height"],
						"SMALL_TITLE" => $arResult["NAME"],
						"FORMAT" => "img"
					    );

?>


		<?
		$i = 1;
		// Заносим в массив $allMedia[$i] дополнительные фотографии и флешки
		if(count($arResult["MORE_PHOTO"])>0):
			foreach($arResult["MORE_PHOTO"] as $PHOTO):
				if ($PHOTO["CONTENT_TYPE"] == "application/x-shockwave-flash") {
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
				} else {
					$format = "img";
					$file = CFile::ResizeImageGet($PHOTO, array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_EXACT, true); 
					
					// adl 03.06.14 Изменяем размер картинок на странице товара, чтобы сэкономить трафик
					// если честно - мне так не очень нравится(особенно $PHOTO["SUBDIR"], но может будет работать.
					$file1_big = CFile::ResizeImageGet($PHOTO, array('width'=>'1000', 'height'=>'1000'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
					$file1 = CFile::ResizeImageGet($PHOTO, array('width'=>'577', 'height'=>'432'), BX_RESIZE_IMAGE_EXACT, true); 
					$PHOTO["SRC"] = $file1["src"];
					$PHOTO["WIDTH"] = $file1["width"];
					$PHOTO["HEIGHT"] = $file1["height"];
					$PHOTO["FILE_SIZE"] = $file1["size"];

				}
				
				$allMedia[$i] = Array(	
						"BIG_PATH" => $file1_big["src"],
						"BIG_WIDTH" => str_replace("px", "", $file1_big["width"]),
						"BIG_HEIGHT" => str_replace("px", "", $file1_big["height"]),
						"A_TITLE" => $arResult["NAME"],
						"NORMAL_PATH" => $PHOTO["SRC"],
						"NORMAL_WIDTH" => $PHOTO["WIDTH"],
						"NORMAL_HEIGHT" => $PHOTO["HEIGHT"],
						"NORMAL_TITLE" => $arResult["NAME"],
						"NORMAL_VISIBLE" => "none",
						"SMALL_PATH" => $file["src"],
						"SMALL_WIDTH" => $file["width"],
						"SMALL_HEIGHT" => $file["height"],
						"SMALL_TITLE" => $arResult["NAME"],
						"FORMAT" => $format
						    );

				$i++;
			endforeach;
		endif;?>  

			<? for ($i=0; $i < count($allMedia); $i++):?>
				<? if($allMedia[$i]['FORMAT'] == 'img'):?>

<?$APPLICATION->IncludeComponent(
	"coffeediz:schema.org.ImageObject",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW" => "Y",
		"CONTENTURL" => $allMedia[$i]['BIG_PATH'],
		"NAME" => $allMedia[$i]['NORMAL_TITLE'],
		"CAPTION" => $allMedia[$i]['NORMAL_TITLE'],
		"DESCRIPTION" => $arResult['DETAIL_TEXT'],
		"HEIGHT" => $allMedia[$i]['BIG_HEIGHT'],
		"WIDTH" => $allMedia[$i]['BIG_WIDTH'],
		"TRUMBNAIL_CONTENTURL" => "",
		"ITEMPROP" => "",
		"REPRESENTATIVEOFPAGE" => "True",
		"PARAM_RATING_SHOW" => "N"
	)
);?>

            				<div id="image<?=$i?>" style="display: <?=$allMedia[$i]['NORMAL_VISIBLE'];?>; height:<?=$allMedia[$i]['NORMAL_HEIGHT']?>px; width:<?=$allMedia[$i]['NORMAL_WIDTH'];?>px;">
						<a href="<?=$allMedia[$i]['BIG_PATH']?>" class="fancybox" rel="images" title="<?=$allMedia[$i]['A_TITLE']?>">
							<img id="mainPict<?=$i?>" class="mainPict" src="<?=$allMedia[$i]['NORMAL_PATH']?>" width="<?=$allMedia[$i]['NORMAL_WIDTH']?>" height="<?=$allMedia[$i]['NORMAL_HEIGHT']?>" alt="<?=$allMedia[$i]['NORMAL_TITLE']?>" title="<?=$allMedia[$i]['NORMAL_TITLE']?>" />
						</a>
					</div>
				<?endif?>
			<? endfor;?>
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

			<? for ($i=0; $i < count($allMedia); $i++):?>
                		<div <?if($i==0):?>class="activ"<?endif?> onclick="changePict('<?=$i?>', this, '<?=$allMedia[$i]['FORMAT']?>');">
					<img src="<?=$allMedia[$i]['SMALL_PATH']?>" width="<?=$allMedia[$i]['SMALL_WIDTH']?>" height="<?=$allMedia[$i]['SMALL_HEIGHT']?>" alt="<?=$allMedia[$i]['SMALL_TITLE']?>" title="<?=$allMedia[$i]['SMALL_TITLE']?>" />
				</div>
			<? endfor;?>

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
	<!-- Блок со скидочными ценами -->
<?	if (trim($arResult["PROPERTIES"]["DISCOUNT_TABLE"]["VALUE"]) <> '') { 
		$arDiscount = preg_split("/[:;]/" , $arResult["PROPERTIES"]["DISCOUNT_TABLE"]["VALUE"]);

		if (count($arDiscount) >= 2) {

		// adl 05.04.15 В поле скидки может быть два значения, разбираем это
		$arDisc1 = explode("," , $arDiscount[1]);
		$arDisc2 = explode("," , $arDiscount[3]);
		$arDisc3 = explode("," , $arDiscount[5]);

		// Вычисляем реальную скидку на продукцию
		foreach ($arDisc1 as &$disc)
			if (strpos($disc, "%") !== false) $disc = $arResult["PROPERTIES"]["PRICE"]["VALUE"] - $arResult["PROPERTIES"]["PRICE"]["VALUE"]*$disc/100;
		foreach ($arDisc2 as &$disc)
			if (strpos($disc, "%") !== false) $disc = $arResult["PROPERTIES"]["PRICE"]["VALUE"] - $arResult["PROPERTIES"]["PRICE"]["VALUE"]*$disc/100;
		foreach ($arDisc3 as &$disc)
			if (strpos($disc, "%") !== false) $disc = $arResult["PROPERTIES"]["PRICE"]["VALUE"] - $arResult["PROPERTIES"]["PRICE"]["VALUE"]*$disc/100;

		unset($disc);

		// В зависимости от того, есть или нет вторая скидка - формируем все три строчки
		if ($arDisc1[1] != "")
			$string1 = "<del>" . $arDisc1[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc1[1] . "</font><span style='font-family: Tahoma;font-size: 14px; color:#FF2B23'> руб.</span>";
		else
			$string1 = $arDisc1[0]."<span style='font-family: Tahoma;font-size: 14px;'> руб.</span>";
		if ($arDisc2[1] != "")
			$string2 = "<del>" . $arDisc2[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc2[1] . "</font><span style='font-family: Tahoma;font-size: 14px; color:#FF2B23'> руб.</span>";
		else
			$string2 = $arDisc2[0]."<span style='font-family: Tahoma;font-size: 14px;'> руб.</span>";
		if ($arDisc3[1] != "")
			$string3 = "<del>" . $arDisc3[0] . "</del>&nbsp;<font color='#FF2B23'>" . $arDisc3[1] . "</font><span style='font-family: Tahoma;font-size: 14px; color:#FF2B23'> руб.</span>";
		else
			$string3 = $arDisc3[0]."<span style='font-family: Tahoma;font-size: 14px;'> руб.</span>";

		// adl 20.03.2016 уменьшаем отступ справа, если цифры очень большие
		$pad_right = '';
		if ( (($arDisc1[0]>999)&&($arDisc1[1]>999)) || (($arDisc2[0]>999)&&($arDisc2[1]>999)) || (($arDisc3[0]>999)&&($arDisc3[1]>999)) ) $pad_right = 'style="padding-right:5px;"';

		$whole_string = $string1 . "<br/>" . $string2 . "<br/>" . $string3; // Собираем все три строчки в одну

	?>
<?

// готовим цены для микроразметки
$allprices = $allcurr = array();
$min_price = $max_price = $arResult["PROPERTIES"]["PRICE"]["VALUE"];
$allprices[] = $arResult["PROPERTIES"]["PRICE"]["VALUE"];
$allcurr[] = "RUB";
if ($arDisc1[1] != "") { $allprices[] = $arDisc1[1]; $allcurr[] = "RUB"; if ($min_price > $arDisc1[1]) $min_price = $arDisc1[1]; if ($max_price < $arDisc1[1]) $max_price = $arDisc1[1]; }
		  else { $allprices[] = $arDisc1[0]; $allcurr[] = "RUB"; if ($min_price > $arDisc1[0]) $min_price = $arDisc1[0]; if ($max_price < $arDisc1[0]) $max_price = $arDisc1[0]; }

if ($arDisc2[1] != "") { $allprices[] = $arDisc2[1]; $allcurr[] = "RUB"; if ($min_price > $arDisc2[1]) $min_price = $arDisc2[1]; if ($max_price < $arDisc2[1]) $max_price = $arDisc2[1]; }
		  else { $allprices[] = $arDisc2[0]; $allcurr[] = "RUB"; if ($min_price > $arDisc2[0]) $min_price = $arDisc2[0]; if ($max_price < $arDisc2[0]) $max_price = $arDisc2[0]; }

if ($arDisc3[1] != "") { $allprices[] = $arDisc3[1]; $allcurr[] = "RUB"; if ($min_price > $arDisc3[1]) $min_price = $arDisc3[1]; if ($max_price < $arDisc3[1]) $max_price = $arDisc3[1]; }
		  else { $allprices[] = $arDisc3[0]; $allcurr[] = "RUB"; if ($min_price > $arDisc3[0]) $min_price = $arDisc3[0]; if ($max_price < $arDisc3[0]) $max_price = $arDisc3[0]; }

	
// микроразметка adl 08.04.16
$APPLICATION->IncludeComponent(
	"coffeediz:schema.org.Product",
	"",
	Array(
		"AGGREGATEOFFER" => "Y",
		"AGGREGATEOFFER_PRICE" => $allprices,
		"AGGREGATEOFFER_PRICECURRENCY" => $allcurr,
		"BESTRATING" => "5",
		"COMPONENT_TEMPLATE" => ".default",
		"DESCRIPTION" => $arResult['DETAIL_TEXT'],
		"HIGHPRICE" => $max_price,
		"ITEMAVAILABILITY" => "InStock",
		"ITEMCONDITION" => "NewCondition",
		"LOWPRICE" => $min_price,
		"NAME" => $arResult['NAME'],
		"OFFERCOUNT" => count($allprices),
		"PARAM_RATING_SHOW" => "N",
		"PAYMENTMETHOD" => array("VISA","MasterCard","ByBankTransferInAdvance","ByInvoice","Cash","CheckInAdvance"),
		"PRICE" => $arResult["PROPERTIES"]["PRICE"]["VALUE"],
		"PRICECURRENCY" => "RUB",
		"RAITINGCOUNT" => "",
		"RATINGVALUE" => "",
		"RATING_SHOW" => "Y",
		"REVIEWCOUNT" => "",
		"SHOW" => "Y",
		"WORSTRATING" => "1"
	)
);?>
<div class="r-catalog">
	<div class="col-xs-10" style="background: #ffffff;width: 100%;" >
		<div class="item">
			<div class="item-inner">
				<div class="all-prices">
					<p class="prices" <?=$pad_right;?>>
						<?=$whole_string;?>
					</p>
					<p class="count">От <?=$arDiscount[0];?> шт.<br>От <?=$arDiscount[2];?> шт.<br>От <?=$arDiscount[4];?> шт.</p>
				</div>
				<p class="item-note">* От <?=$arDiscount[6];?> шт. <?=strtolower($arDiscount[7]);?>.</p>
			</div>
		</div>
	</div>
</div>
		<? } ?>
<? } ?>

<?
// если микроразметки ещё не было
if ($max_price == 0) {
// микроразметка adl 08.04.16
$APPLICATION->IncludeComponent(
	"coffeediz:schema.org.Product",
	"",
	Array(
		"NAME" => $arResult['NAME'],
		"SHOW" => "Y",
		"DESCRIPTION" => $arResult['DETAIL_TEXT'],
		"PRICE" => $arResult["PROPERTIES"]["PRICE"]["VALUE"],
		"PRICECURRENCY" => "RUB",
		"ITEMAVAILABILITY" => "InStock",
		"ITEMCONDITION" => "NewCondition",
		"PAYMENTMETHOD" => array("VISA","MasterCard","ByBankTransferInAdvance","ByInvoice","Cash","CheckInAdvance"),
		"PARAM_RATING_SHOW" => "N",
	)
);
}
?>


	<!-- /Блок со скидочными ценами -->

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

													        // adl 05.04.15 Может быть несколько скидок - разбиваем строку по разделителю ,
														$elem1 = explode("," ,	$elem);
												?>
													<td><span id="reddy"><?echo $elem1[0];?></span></td>
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
