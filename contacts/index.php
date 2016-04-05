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

<div class="contenttext-item" style="min-height: 930px;"> 
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
   
   
    <!--div class="logo" style="margin-top: -5px; margin-left: 20px;"> <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.71088999999376;s:10:\"yandex_lon\";d:37.77103199999998;s:12:\"yandex_scale\";i:10;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.77081742327879;s:3:\"LAT\";d:55.710835484950955;s:4:\"TEXT\";s:48:\"Филиал ПК \"НОСТ\" в г. Москва\";}}}",
		"MAP_WIDTH" => "360",
		"MAP_HEIGHT" => "270",
		"CONTROLS" => array("ZOOM"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM", "ENABLE_DRAGGING"),
		"MAP_ID" => "nost-moscow"
	)
);?> 
 </div-->
  <div class="rightblock" style="width: 520px; margin-left: 400px;"> 		 
    <p class="itemstext">
     <b>Адрес производственной компании &quot;НОСТ&quot;(головная организация):</b> 			 
      <br />
     427007, Россия, Удмуртская республика, г. Ижевск, с. Первомайский, ул. Сабурова, 4 
      <br />
      <br />

	<b>Телефон:</b> 			 
      <br />
     			<span class="red">8-800-700-66-78</span> - звонок по России бесплатный. 
      <br />
     			8(3412)55-89-63 - приемная в г. Ижевск. 
      <br />
     			8(499)705-67-04 - офис в г. Москва. 
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
		     			<b>Skype:</b> 			 
				</td>
				<td width="33%">
		     			<b>ICQ:</b> 			 
				</td>
			</tr>
			<tr>
				<td width="33%">
		     			<span class="red">558963@nost.ru</span>
				</td>
				<td width="33%">
		     			nost.ru 
				</td>
				<td width="33%">
		     			695943790 
				</td>
			</tr>
	</table>
  </div>
   
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
   
    <div class="logo" style="margin-top: -5px; margin-left: 20px;"> <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.827297391703276;s:10:\"yandex_lon\";d:37.49709633789012;s:12:\"yandex_scale\";i:10;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.418996542328;s:3:\"LAT\";d:55.887216029734;s:4:\"TEXT\";s:65:\"Продукция ПК \"НОСТ\" в розницу от 1 шт.\";}}}",
		"MAP_WIDTH" => "360",
		"MAP_HEIGHT" => "270",
		"CONTROLS" => array("ZOOM"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DRAGGING"),
		"MAP_ID" => "nost-himki"
	)
);?> </div>
  <div class="rightblock" style="width: 520px; margin-left: 400px;"> 		 
<p class="itemstext">     
     
      <!--br />
     <b>Филиал производственной компании &quot;НОСТ&quot; в г. Москва:</b> 			 
      <br />
     	109457, Россия, Москва, Зеленодольская улица, 30к2, оф. 204 
      <br />
	<b>Телефон:</b>
      <br />
     			<span class="red">8(499)705-67-04</span> - офис в г. Москва. 
      <br />
     
      <br />
     
      <br />
      <br />
     
      <br />
     
      <br />
      <br />
     
      <br />
     
      <br />
      <br />
     
      <br />
     
      <br />
      <br />
           -->
     
     
     <b>Наши изделия в розницу в г. Москва Вы можете приобрести по адресу:</b> 			 
      <br />
     	141407, Московская обл., Химки г., просп. Юбилейный, 40.  Магазин "Автозапчасти"
      <br />
      <br />
	<b>Телефон:</b>
      <br />
        <span class="red">8 926 235 39 39</span> - по вопросам приобретения в розницу
      <br />
     		 </p>

   </div>
  <div class="rightblock" style="width: 100%; text-align:center;"> 
	<p class="itemstext">     
		<br/><br/>
		<b>Вся наша продукция имеет соответствующие сертификаты:</b>
	</p>
	<a href="/contacts/pic/certificate0.pdf" target="_blank">
		<img src="/contacts/pic/certificate0.jpg">
	</a>
	<a href="/contacts/pic/certificate1.pdf" target="_blank">
		<img src="/contacts/pic/certificate1.jpg">
	</a>
  </div>
 
   </div>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>