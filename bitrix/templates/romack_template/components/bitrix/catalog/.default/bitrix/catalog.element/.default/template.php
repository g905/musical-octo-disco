<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <div class="contenttext-item">
    
        <!-- leftblock -->
        <div class="leftblock">
            <div class="items-img">
		<img id="mainPict" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
               	<div class="items-miniimg" id="items-miniimg">
			<? $file = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_EXACT, true); ?>  
                	<div class="activ" onclick="changePict('<?=$arResult["DETAIL_PICTURE"]["SRC"]?>', this);">
				<img src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
			</div>
		<?
		// additional photos  
		$LINE_ELEMENT_COUNT = 5; // number of elements in a row  
		if(count($arResult["MORE_PHOTO"])>0):?>  
    			<? foreach($arResult["MORE_PHOTO"] as $PHOTO):?>  
				<? $file = CFile::ResizeImageGet($PHOTO, array('width'=>'102', 'height'=>'68'), BX_RESIZE_IMAGE_EXACT, true); ?>  
                            	<div onclick="changePict('<?=$PHOTO["SRC"]?>', this);">
                    			<img src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />  
              			</div>
			<? endforeach?>  
		<?endif?>  
               	</div>
            </div>
        </div>
        <!-- leftblock -->
        
        
        <!-- rightblock -->
        <div class="rightblock">
            <p class="zagl2"><?=$arResult["NAME"]?></p>
	<?foreach($arResult["PRICES"] as $code=>$arPrice):?>
		<?if($arPrice["PRINT_VALUE"] > 0):?>
	    		<div class="price">
				<p>
				<span class="newprice"><?=GetMessage('CR_PRICE')?>:<?=$arPrice["PRINT_VALUE"]?></span>
				</p>
	    		</div>            
		<?endif;?>
	<?endforeach;?>
	<?if (is_array($arResult['DISPLAY_PROPERTIES']) && count($arResult['DISPLAY_PROPERTIES']) > 0):
		$cnt = 0;
		foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
		if ($pid != 'PRICE' && $pid != 'PRICECURRENCY'):
			if ($cnt == 0):
				$cnt++;
	?>
			<?endif;?>

		            <div class="params">
                		<p><?=$arProperty["NAME"]?>
					<span class="paramscount">
				<?
			if(is_array($arProperty["DISPLAY_VALUE"])):
				echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
			elseif($pid=="MANUAL"):
?>
					<a href="<?=$arProperty["VALUE"]?>"><?=GetMessage("CATALOG_DOWNLOAD")?></a>
<?
			else:
				echo $arProperty["DISPLAY_VALUE"];
			endif;
				?>
					</span>
				</p>
			    </div>
<?
		endif;
		endforeach;
	
	endif;
?>            
            
            <span class="itemstext"><?=$arResult["DETAIL_TEXT"]?></p>
        
        </div>
        <!-- rightblock -->
    </div>
