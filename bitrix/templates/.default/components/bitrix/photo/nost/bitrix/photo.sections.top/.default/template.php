<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="catalog-title">
	<div class="title">
		<h1>Фото шашек для такси: наше производство</h1>
	</div>
	<div class="catalog-description">
 
 
<p class="MsoNormal" style="margin-bottom: 6pt;"><span style="font-size: 10pt; line-height: 115%; font-family: &quot;Verdana&quot;,&quot;sans-serif&quot;;">Мы производим шашки для такси(<a href="/">ассортимент шашек для такси</a>). И в этом разделе вы можете познакомиться с образцами нашей продукции.</span></p>
 
<p class="MsoNormal" style="margin-bottom: 6pt;"><span style="font-size: 10pt; line-height: 115%; font-family: &quot;Verdana&quot;,&quot;sans-serif&quot;;">Все фото оригинальны и сделаны в нашей мастерской. Это значит, что вы можете заказать каждый из представленных образцов и мы изготовим его для вас в течение 2-14 дней.</span></p>
 
<p class="MsoNormal" style="margin: 0cm 0cm 6pt 1cm;"><i><span style="font-size: 10pt; line-height: 115%; font-family: &quot;Verdana&quot;,&quot;sans-serif&quot;;">Обращаем ваше внимание: фото <a href="/" title="шашечки такси">шашечек для такси</a> может незначительно отличаться по цвету от готовой продукции! Также при заказе стоит учитывать, что некоторые модели шашек и коробов могут быть исполнены только в указанном размере.</span></i></p>
 
<p class="MsoNormal" style="margin-bottom: 6pt;"><span style="font-size: 10pt; line-height: 115%; font-family: &quot;Verdana&quot;,&quot;sans-serif&quot;;">На шашки можно нанести любую информацию: номер телефона, логотип, другие графические элементы, благодаря которым ваши автомобили будут более заметными в потоке других машин.</span></p>
 
<p class="MsoNormal" style="margin-bottom: 6pt;"><span style="font-size: 10pt; line-height: 115%; font-family: &quot;Verdana&quot;,&quot;sans-serif&quot;;">Если вы не смогли подобрать шашки в нашей галерее либо хотите сделать нечто уникальное и неповторимое &ndash; свяжитесь с нашими менеджерами любым удобным для вас способом, и мы поможем вам сделать правильный выбор.</span></p>
 
<p class="MsoNormal" style="margin-bottom: 6pt;"><span style="font-size: 10pt; line-height: 115%; font-family: &quot;Verdana&quot;,&quot;sans-serif&quot;;">Шашки изготавливаются из полистирола или поликарбоната. На этапе производства различий между ними нет. Однако поликарбонат является более современным, долговечным и надежным материалом. Все образцы шашечек, представленные на фото в нашей галерее, могут быть изготовлены как из одного, так и из другого материала.</span></p>
  
	</div>
<?foreach($arResult["SECTIONS"] as $arSection):?>
	<? if (count($arSection["ROWS"])>0):?>
	<?
	$this->AddEditAction('section_'.$arSection['ID'], $arSection['ADD_ELEMENT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "ELEMENT_ADD"), array('ICON' => 'bx-context-toolbar-create-icon'));
	$this->AddEditAction('section_'.$arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction('section_'.$arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BPS_SECTION_DELETE_CONFIRM')));
	?>
	<div class="title">
		<a href="<?=$arSection["SECTION_PAGE_URL"]?>"><p><?=$arSection["NAME"]?></p></a>
	</div>
	<ul class="block">
		<?foreach($arSection["ROWS"] as $arItems):?>
			<?foreach($arItems as $arItem):?>

				<?if(is_array($arItem)):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BPS_ELEMENT_DELETE_CONFIRM')));
					?>

				<li class="block_li">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						<div class="otheritems" onmouseover="this.style.borderColor='#ED4444';" onmouseout="this.style.borderColor='#ccc';">
                		    			<div class="otherimg">
								<img border="0" src="<?=$arItem["PICTURE"]["SRC"]?>" width="<?=$arItem["PICTURE"]["WIDTH"]?>" height="<?=$arItem["PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
							</div>
							<p><b><?=$arItem["NAME"]?></b></p>
						</div>
					</a>
				</li>

				<?endif;?>
			<?endforeach?>
		<?endforeach?>
	</ul>
	<?endif?>
<?endforeach;?>
</div>
