<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
        <div class="headerbot">
            <div class="headerbot-text">
	<ul id="horizontal-multilevel-menu">
<?
$previousLevel = 0;
$index = 0;
foreach($arResult as $arItem):?>

	<?$index++;?>	

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li>
		                <a href="<?=$arItem["LINK"]?>">
        		            <div class="<?if ($arItem["SELECTED"]):?>but activ with-sub<?else:?>but with-sub<?endif?>">
					<?if ($index==1):?>
                        			<img src="<?=SITE_TEMPLATE_PATH?>/img/header/home.png" style="margin-top: -2px;" alt="Главная"/>
					<?endif?>
                		        <?=$arItem["TEXT"]?>
				    </div>
				</a>
			<ul>

		<?else:?>
			<li <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>>
		                <a href="<?=$arItem["LINK"]?>" class="parent">
        		            <div class="but">
					<?if ($index==1):?>
                        			<img src="<?=SITE_TEMPLATE_PATH?>/img/header/home.png" style="margin-top: -2px;" alt="Главная"/>
					<?endif?>
                		        <?=$arItem["TEXT"]?>
				    </div>
				</a>
			<ul>

		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li <?if ($index == count($arResult)):?>style="float:right;"<?endif?>>
		                <a href="<?=$arItem["LINK"]?>">
        		            <div class="<?if ($arItem["SELECTED"]):?>but activ<?else:?>but<?endif?>">
					<?if ($index==1):?>
                        			<img src="<?=SITE_TEMPLATE_PATH?>/img/header/home.png" style="margin-top: -2px;" alt="Главная"/>
					<?endif?>
                		        <?=$arItem["TEXT"]?>
				    </div>
				</a>
			</li>
			<?else:?>
			<li <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>>
		                <a href="<?=$arItem["LINK"]?>">
       		 	            <div class="but">
					<?if ($index==1):?>
                        			<img src="<?=SITE_TEMPLATE_PATH?>/img/header/home.png" style="margin-top: -2px;" alt="Главная"/>
					<?endif?>
       		         	        <?=$arItem["TEXT"]?>
				    </div>
				</a>
			</li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li>
		                <a href="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>">
        		            <div class="<?if ($arItem["SELECTED"]):?>but activ<?else:?>but<?endif?>">
					<?if ($index==1):?>
                        			<img src="<?=SITE_TEMPLATE_PATH?>/img/header/home.png" style="margin-top: -2px;" alt="Главная"/>
					<?endif?>
                		        <?=$arItem["TEXT"]?>
				    </div>
				</a>
			</li>
			<?else:?>
			<li>
		                <a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>">
        		            <div class="but">
					<?if ($index==1):?>
                        			<img src="<?=SITE_TEMPLATE_PATH?>/img/header/home.png" style="margin-top: -2px;" alt="Главная"/>
					<?endif?>
                		        <?=$arItem["TEXT"]?>
				    </div>
				</a>
			</li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
                
            </div>
        </div>
<div class="menu-clear-left"></div>
<?endif?>