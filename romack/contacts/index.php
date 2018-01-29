<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="nav">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"nost",
	array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "-",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	)
);?>
</div>
<div class="contenttext-item" style="min-height: 400px;">
	<div class="leftblock" style="float: left;">
		<div class="logo" style="margin-top: -5px; margin-left: 20px;">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	array(
	"CONTROLS" => "ZOOM",	// Элементы управления
		"INIT_MAP_TYPE" => "MAP",	// Стартовый тип карты
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:56.852764936510596;s:10:\"yandex_lon\";d:53.28871619987777;s:12:\"yandex_scale\";i:11;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:53.360834916691005;s:3:\"LAT\";d:56.854091708139634;s:4:\"TEXT\";s:60:\"Производственная компания \"НОСТ\"\";}}}",	// Данные, выводимые на карте
		"MAP_HEIGHT" => "270",	// Высота карты
		"MAP_ID" => "nost",	// Идентификатор карты
		"MAP_WIDTH" => "360",	// Ширина карты
		"OPTIONS" => "ENABLE_DRAGGING",	// Настройки
	)
);?>
		</div>
	</div>
	<div class="rightblock" style="width: 520px; margin-left: 400px;">
		<p class="itemstext">
			<span class="contact__block contact__block--adress">
				<b>Адрес производственной компании "Romack Mebel":</b>
				<br>
				427007, Россия, Удмуртская республика, Завьяловский район,, с. Первомайский, ул. Сабурова, 4 
			</span>
			<br>
			<br>
			<span class="contact__block contact__block--tel"> 			 
				<b>Телефон:</b> 
				<br>
				<span class="red">8 (800) 200-3221, 8 (3412) 65-07-64</span>
			</span>  
			<br>
			<br>
			<span class="contact__block contact__block--requisites">
				<b>Реквизиты организации:</b> <br>
				ИП Родионова Гузалия Альбертовна <br>
				ИНН 183308611114, ОГРН 316183200064030. <br>
				ПАО АКБ "АВАНГАРД", к/с 30101810000000000201 <br>
				р/с 40802810654100000901, БИК 044525201 <br>
			</span>	
		</p>
 		<br>
		<table style="color: #666666; font-family: Tahoma; font-size: 12px;" width="100%">
		<tbody>
		<tr>
			<td width="33%">
 				<span class="contact__block contact__block--email"><b>E-mail:</b></span>
			</td>
			<td width="33%">
				 <!--b>ICQ:</b-->
			</td>
		</tr>
		<tr>
			<td width="33%">
 				<span class="red contact__block"><a href="mailto:order@romack.ru">orders@romack.ru</a></span>
			</td>
			<td width="33%">
				 <!--675147944-->
			</td>
		</tr>
		</tbody>
		</table>
	</div>
</div>
<div>
</div>
<h2>ДИЛЕРЫ</h2>
<p>
 <br>
 <br>
</p>
<table border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr>
	<td>
		<p>
			 &nbsp; &nbsp; &nbsp; &nbsp;г. Ижевск&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
		</p>
	</td>
	<td>
		<p>
 <b>&nbsp;«Бэби Бай»</b>
		</p>
		<p>
 <span style="color: #111111;">&nbsp;ТРЦ "Радуга",&nbsp;</span>ул.Ленина, 140&nbsp;
		</p>
		<p>
 <span style="color: #111111;">&nbsp;тел.: 8(3412)908-079</span><br>
 <br>
 <br>
 <b>&nbsp;МЦ "Мебельград"</b><br>
			 &nbsp;ул.Удмуртская, д.302, отдел "Статус-М"
		</p>
		<p>
			 &nbsp;тел.: 8(3412) 32-01-02
		</p>
	</td>
</tr>
<tr>
	<td>
		<p>
			 &nbsp; &nbsp; &nbsp; &nbsp;г .Москва&nbsp;
		</p>
	</td>
	<td>
		<p>
 <b>&nbsp;«IQ-deti»</b><br>
			 &nbsp;<a href="http://www.iq-deti.ru/">www.iq-deti.ru</a>&nbsp; тел.: +7(495)9714830<br>
 <br>
		</p>
		<p>
 <b>&nbsp;ТЦ "Скарабей"</b>, 3 этаж, &nbsp;м.Выхино 8-й км Мкад
		</p>
		<p>
			 &nbsp;Тел.:+7(916)732-2777, +7(925)615-5778,
		</p>
		<p>
			 &nbsp;&nbsp;<br>
 <b>&nbsp;ЦД "Ленинградский</b>"<br>
			 &nbsp;м. Войковская, Ленинградское ш. 25, 3 этаж, левое крыло, пав.3к 03
		</p>
		<p>
			 &nbsp;тел.:+7(495) 502-5321, +7(919) 100-6695, +7(925) 631-6758<br>
 <br>
		</p>
		<p>
			 &nbsp;
		</p>
		<p>
 <b>&nbsp;ТЦ " Мебель России"</b>
		</p>
		<p>
			 &nbsp;м.&nbsp;ВДНХ, Ярославское ш., д.19,
		</p>
		<p>
			 &nbsp;4 этаж, правое крыло
		</p>
		<p>
			 &nbsp;Тел.: &nbsp;+7(495)778-13-27, ,+7(919)100-86-69, +7(926) 972-5392<br>
 <br>
		</p>
		<p>
 <b>&nbsp;ТЦ "Три Кита"</b>
		</p>
		<p>
			 &nbsp;Можайское шоссе, 2 км от МКАД,
		</p>
		<p>
			 &nbsp;4 этаж, секция детской мебели VOX
		</p>
		<p>
			 &nbsp; тел.: +7(499) 340-21-82, +7(916) 063-44-97; &nbsp;+7(925) 348-73-02&nbsp;
		</p>
		<p>
 <br>
		</p>
		<p>
 <b>&nbsp;ТД "Компик"&nbsp;</b>
		</p>
		<p>
			 &nbsp;МО, г.Климовск, ул.Заречная, стр.2
		</p>
		<p>
			 &nbsp;тел.: 8-499-389-44-90
		</p>
		<p>
 <br>
 <br>
		</p>
	</td>
</tr>
<tr>
	<td>
		<p>
			 &nbsp; &nbsp; &nbsp;г. Санкт-Петербург&nbsp; &nbsp;
		</p>
	</td>
	<td>
		<p>
 <b>&nbsp;ТД "Компик"</b>
		</p>
		<p>
			 &nbsp;ул.Промышленная, д.13
		</p>
		<p>
			 &nbsp;тел.: 8-812-456-70-82
		</p>
		<p>
			 &nbsp;<a href="http://www.tdcompic.ru/">www.tdcompic.ru</a>&nbsp; &nbsp;<br>
		</p>
	</td>
</tr>
<tr>
	<td>
		<p>
			 &nbsp; &nbsp; &nbsp;г. Екатеринбург&nbsp;
		</p>
	</td>
	<td>
		<p>
 <b>&nbsp;"Мебель для дома"</b>&nbsp;
		</p>
		<p>
			 &nbsp;<a href="http://mebel-ekat.ru/" target="_blank">http://mebel-ekat.ru</a><br>
		</p>
		<p>
			 &nbsp;ул. Татищева, 53,&nbsp; офис 105&nbsp;
		</p>
		<p>
			 &nbsp;тел.: 8-800-500-27-20, (343) 202-52-72, 2000-696, время работы с 10:00 до 18:00<br>
		</p>
		<p>
			 &nbsp;<a href="http://www.meb-ural.ru/" target="_blank">www.meb-ural.ru</a>&nbsp;
		</p>
		<p>
			 &nbsp;ул. Токарей, 40, офис 6б, (343) 202-28-33, время работы с 10:00 до 18:00<br>
		</p>
	</td>
</tr>
<tr>
	<td>
		<p>
			 &nbsp; &nbsp; &nbsp; г. Уфа
		</p>
	</td>
	<td>
		<p>
			 &nbsp;<b>"МамаГуру"</b>
		</p>
		<p>
			 &nbsp;ул.Чапаева, 38/2<br>
		</p>
		<p>
 <span>&nbsp;мамагуру.рф<br>
 </span>
		</p>
		<p>
			 &nbsp;тел.:&nbsp;8-927-236-62-91,&nbsp; 8-347-26-66-29
		</p>
		<p>
 <br>
		</p>
	</td>
</tr>
<tr>
	<td>
		<p>
			 &nbsp; &nbsp; &nbsp; г. Пермь
		</p>
	</td>
	<td>
		<p>
			 &nbsp;<b>"Мебель для дома"&nbsp; &nbsp;</b> &nbsp; &nbsp;
		</p>
		<p>
			 &nbsp;<a href="http://www.meb59.com/" target="_blank">www.meb59.com</a>&nbsp;&nbsp;
		</p>
		<p>
			 &nbsp;ул. Куйбышева 2, офис 16,&nbsp;
		</p>
		<p>
			 &nbsp;тел.: 8-800-500-27-20, (342) 287-13-28, время работы с 10:00 до 18:00
		</p>
	</td>
</tr>
<tr>
	<td>
		<p>
			 &nbsp; &nbsp; &nbsp; г. Нижний Новгород&nbsp;&nbsp;
		</p>
	</td>
	<td>
		<p>
			 &nbsp;<b>"ТД Компик"</b>
		</p>
		<p>
			 &nbsp;ул.Федосеенко, д.6
		</p>
		<p>
			 &nbsp;тел.: 8-831-420-60-94
		</p>
	</td>
</tr>
<tr>
	<td>
		<p>
			 &nbsp; &nbsp; &nbsp; г. Челябинск
		</p>
	</td>
	<td>
		<p>
			 &nbsp;<b>"Мебель для дома"&nbsp;</b>
		</p>
		<p>
 <b>&nbsp;<a href="http://www.meb74.com/" target="_blank">www.meb74.com</a>&nbsp;</b>
		</p>
		<p>
			 &nbsp;ул. Комсомольский Проспект, 10, офис 1
		</p>
		<p>
			 &nbsp;8-800-500-27-20, (351) 750-67-11, время работы с 10:00 до 18:00<b><br>
 </b>
		</p>
	</td>
</tr>
</tbody>
</table>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>