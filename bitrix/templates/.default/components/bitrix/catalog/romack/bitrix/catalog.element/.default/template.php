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



<?

			// adl 10.12.14 Изменяем размер главной картинки на странице товара, чтобы сэкономить трафик
			$file2_big = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'1000', 'height'=>'1000'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
			$file2 = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'577', 'height'=>'432'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
			$arResult["DETAIL_PICTURE"]["SRC"] = $file2["src"];
			$arResult["DETAIL_PICTURE"]["WIDTH"] = $file2["width"];
			$arResult["DETAIL_PICTURE"]["HEIGHT"] = $file2["height"];
			$arResult["DETAIL_PICTURE"]["FILE_SIZE"] = $file2["size"];
			$file = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_PROPORTIONAL, true);


			// adl 21.12.2014 Создаем массив всех без исключения картинок и флешек (путь до супер-большой картинки, титл для <a>, путь до средней картинки, ширина средней картинки, 
			// высота средней картинки, alt и title для <img>, видимость средней картинки, путь до маленькой картинки, ширина маленькой картинки, высота маленькой картинки, 
			// alt и title маленькой картинки, формат - изображение или флеш)
			$allMedia[0] = Array(	"BIG_PATH" => $file2_big["src"],
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
								$file = CFile::ResizeImageGet($SWF, array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
							} else {
								$file = CFile::ResizeImageGet($PHOTO, array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
							}
						}
					}
				} else {
					$format = "img";
					$file = CFile::ResizeImageGet($PHOTO, array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
					
					// adl 03.06.14 Изменяем размер картинок на странице товара, чтобы сэкономить трафик
					// если честно - мне так не очень нравится(особенно $PHOTO["SUBDIR"], но может будет работать.
					$file1_big = CFile::ResizeImageGet($PHOTO, array('width'=>'1000', 'height'=>'1000'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
					$file1 = CFile::ResizeImageGet($PHOTO, array('width'=>'577', 'height'=>'432'), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
					$PHOTO["SRC"] = $file1["src"];
					$PHOTO["WIDTH"] = $file1["width"];
					$PHOTO["HEIGHT"] = $file1["height"];
					$PHOTO["FILE_SIZE"] = $file1["size"];

				}
				
				$allMedia[$i] = Array(	
						"BIG_PATH" => $file1_big["src"],
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
				<div id="items-maximg">
			<? for ($i=0; $i < count($allMedia); $i++):?>
				<? if($allMedia[$i]['FORMAT'] == 'img'):?>
            				<div id="image<?=$i?>" style="display: <?=$allMedia[$i]['NORMAL_VISIBLE'];?>; height:<?=$allMedia[$i]['NORMAL_HEIGHT']?>px; width:<?=$allMedia[$i]['NORMAL_WIDTH'];?>px; margin:auto;">
						<a href="<?=$allMedia[$i]['BIG_PATH']?>" class="fancybox" rel="images" title="<?=$allMedia[$i]['A_TITLE']?>">
							<img id="mainPict<?=$i?>" class="mainPict" src="<?=$allMedia[$i]['NORMAL_PATH']?>" width="<?=$allMedia[$i]['NORMAL_WIDTH']?>" height="<?=$allMedia[$i]['NORMAL_HEIGHT']?>" alt="<?=$allMedia[$i]['NORMAL_TITLE']?>" title="<?=$allMedia[$i]['NORMAL_TITLE']?>" />
						</a>
					</div>
				<?endif?>
			<? endfor;?>
				</div>
				<div class="clearfix"></div>
  		<? foreach($arResult["MORE_PHOTO"] as $PHOTO):?>  
			<? if ($PHOTO["CONTENT_TYPE"] == "application/x-shockwave-flash"): ?>
				<div id="flash" style="display:none;height:<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>px;width:<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>px;background-color:#000000;">
					<embed id="mainSwf" src="<?=$PHOTO["SRC"]?>" type="application/x-shockwave-flash" bgcolor="#000000" quality="high" width="400" height="300" style="margin-left:<?=($arResult["DETAIL_PICTURE"]["WIDTH"]-400)/2?>px;margin-top:<?=($arResult["DETAIL_PICTURE"]["HEIGHT"]-300)/2?>px;">
				</div>
			<?endif?>
		<? endforeach?>  

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
					<div style="display:block">
						<div class="headings text-left">
							<h1 class="h1"><?=$arResult["NAME"]?></h1>
						</div>
					</div>

	<!-- Закладки -->
						<div class="clearfix"></div>
						<div id="tabs">
<?if ($arResult["IBLOCK_ID"] <> 3):?>
							<ul class="nav nav-tabs">
								<li class="active"><a href="#spec" data-toggle="tab">Спецификация</a></li>
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






									<div class="tab-pane fade" id="sroki">
									</div>
							</div>
<?endif?>
						</div>
	<!-- Закладки -->
						<p class="text-left">Данное изделие имеет <a href="/sertifikaty/" target="_blank">сертификат качества</a></p>
						<p class="text-left">
							<?=$arResult["DETAIL_TEXT"];?>
						</p>
				</div>
        <!-- rightblock -->
			</div>	
		</div>
