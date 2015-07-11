<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?> 
            <div class="nav">

<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"nost",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "-"
	),
false
);?>    
            
            </div>

<div class="contenttext-item" style="min-height: 400px;"> 
 
  <div class="leftblock" style="float:left;"> 
    <div class="logo" style="margin-top: -5px; margin-left: 20px;"> <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:56.852764936510596;s:10:\"yandex_lon\";d:53.28871619987777;s:12:\"yandex_scale\";i:11;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:53.360834916691005;s:3:\"LAT\";d:56.854091708139634;s:4:\"TEXT\";s:60:\"Производственная компания \"НОСТ\"\";}}}",
		"MAP_WIDTH" => "360",
		"MAP_HEIGHT" => "270",
		"CONTROLS" => array("ZOOM"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DRAGGING"),
		"MAP_ID" => "nost"
	)
);?> </div>
   
   </div>


  <div class="rightblock" style="width: 520px; margin-left: 400px;"> 		 
    <p class="itemstext">
     <b>Адрес производственной компании &quot;Romack Mebel&quot;:</b> 			 
      <br />
     427007, Россия, Удмуртская республика, г. Ижевск, с. Первомайский, ул. Сабурова, 4 
      <br />

	<b>Телефон:</b> 			 
      <br />
     			<span class="red">8 (909) 714-98-40</span>
      <br />
      <br />
   
     <b>Реквизиты организации:</b> 			 
      <br />
     ИП Родионов Михаил Андреевич 
      <br />
     		ИНН 183509913806, ОГРН 304184130900011. 
      <br />
     Отделение 8618 Сбербанка России, к/с 30101810400000000601 
      <br />
     		р/с 40802810568000004195, БИК 049401601 
      <br />
      <br />
</p>
	<table width="100%" style="color: #666;font-family: Tahoma;font-size: 12px;">
			<tr>
				<td width="33%">
		     			<b>E-mail:</b> 			 
				</td>
				<td width="33%">
		     			<b>ICQ:</b> 			 
				</td>
			</tr>
			<tr>
				<td width="33%">
		     			<span class="red">order@romack.ru</span>
				</td>
				<td width="33%">
		     			695943790 
				</td>
			</tr>
	</table>
   </div>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>