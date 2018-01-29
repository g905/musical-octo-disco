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
<div class="dealers__top clearfix">
	<h2 class="dealers__title">Дилеры</h2>
	<div class="dealers__select">г. Ижевск (2)</div>
	<ul class="dealers__list">
		<li id="all" class="dealers__item">Все дилеры(14)</li>
		<li id="izhevsk" class="dealers__item active">Ижевск(2)</li>
		<li id="moscow" class="dealers__item">Москва(5)</li>
		<li id="petersburg" class="dealers__item">Санкт-Петербург(1)</li>
		<li id="ekaterinburg" class="dealers__item">Екатеринбург(2)</li>
		<li id="ufa" class="dealers__item">Уфа(1)</li>
		<li id="permian" class="dealers__item">Пермь(1)</li>
		<li id="novgorod" class="dealers__item">Нижний Новгород(1)</li>
		<li id="chelyabinsk" class="dealers__item">Челябинск(1)</li>
	</ul>
	</div>
	<div class="dealers__map-wrap">
		<div id="map" class="dealers__map"></div>
		<div class="dealers__map-over">
			<div class="dealers__map-show">
				<a href="javascript:" class="dealers__map-toggle">Показать карту</a>
				<i class="chevron"></i>
			</div>
		</div>
	</div>
	<div class="dealers__block izhevsk active">
		<h2 class="dealers__title dealers__title--table">г. Ижевск</h2>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>Бэби Бай</strong>
			</div>
			<div class="col-lg-4">ТРЦ "Радуга", ул.Ленина, 140</div>
			<div class="col-lg-4">Тел.: 8(3412)908-079</div>
			<div class="col-lg-2">
				<a href="http://xn--80abaa8ai9k.xn--p1ai/" class="dealers__link" target="_blank">бэбибай.рф</a>
			</div>
		</div>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>МЦ "Мебельград"</strong>
			</div>
			<div class="col-lg-4">ул.Удмуртская, д.302, отдел "Статус-М"</div>
			<div class="col-lg-4">Тел.: 8(3412) 32-01-02</div>
			<div class="col-lg-2">
				<a href="http://mebelgrad18.ru/" class="dealers__link" target="_blank">mebelgrad18.ru</a>
			</div>
		</div>
	</div>
	<div class="dealers__block moscow">
		<h2 class="dealers__title dealers__title--table">г. Москва</h2>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>ТЦ "Скарабей"</strong>
			</div>
			<div class="col-lg-4">3 этаж,  м.Выхино 8-й км Мкад</div>
			<div class="col-lg-4">Тел.:+7(916)732-2777, +7(925)615-5778</div>
			<div class="col-lg-2">
				<a href="http://www.skarabey-tc.ru/" class="dealers__link" target="_blank">www.skarabey-tc.ru</a>
			</div>
		</div>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>ЦД "Ленинградский"</strong>
			</div>
			<div class="col-lg-4">м. Войковская, Ленинградское ш. 25,<br>3 этаж, левое крыло, пав.3к 03</div>
			<div class="col-lg-4">Тел.:+7(495) 502-5321, +7(919) 100-6695,<br>+7(925) 631-6758</div>
			<div class="col-lg-2">
				<a href="https://mebel-leningradka.ru/" class="dealers__link" target="_blank">mebel-leningradka.ru</a>
			</div>
		</div>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>ТЦ " Мебель России"</strong>
			</div>
			<div class="col-lg-4">м. ВДНХ, Ярославское ш., д.19,<br>4 этаж, правое крыло</div>
			<div class="col-lg-4">Тел.: +7(495)778-13-27, ,+7(919)100-86-69,<br>+7(926) 972-5392</div>
			<div class="col-lg-2">
				<a href="http://mebelrossii.ru/" class="dealers__link" target="_blank">mebelrossii.ru</a>
			</div>
		</div>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>ТЦ "Три Кита"</strong>
			</div>
			<div class="col-lg-4">Можайское шоссе, 2 км от МКАД,<br>4 этаж, секция детской мебели VOX</div>
			<div class="col-lg-4">Тел.: +7(499) 340-21-82, +7(916) 063-44-97,<br>+7(925) 348-73-02</div>
			<div class="col-lg-2">
				<a href="http://www.3kita.ru/" class="dealers__link" target="_blank">www.3kita.ru</a>
			</div>
		</div>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>ТД "Компик"</strong>
			</div>
			<div class="col-lg-4">МО, г.Климовск, ул.Заречная, стр.2</div>
			<div class="col-lg-4">Тел.: 8-499-389-44-90</div>
			<div class="col-lg-2">
				<a href="http://www.tdcompic.ru/" class="dealers__link" target="_blank">www.tdcompic.ru</a>
			</div>
		</div>
	</div>
	<div class="dealers__block petersburg">
		<h2 class="dealers__title dealers__title--table">г. Санкт-Петербург</h2>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>ТД "Компик"</strong>
			</div>
			<div class="col-lg-4 dealers__address">ул.Промышленная, д.13</div>
			<div class="col-lg-4 dealers__tel">Тел.: 8-812-456-70-82</div>
			<div class="col-lg-2 dealers__site">
				<a href="http://www.tdcompic.ru/" class="dealers__link" target="_blank">www.tdcompic.ru</a>
			</div>
		</div>
	</div>
	<div class="dealers__block ekaterinburg">
		<h2 class="dealers__title dealers__title--table">г. Екатеринбург</h2>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>"Мебель для дома" </strong>
			</div>
			<div class="col-lg-4">ул. Татищева, 53,  офис 105</div>
			<div class="col-lg-4">Тел.: 8-800-500-27-20, (343) 202-52-72, 2000-696,<br>время работы с 10:00 до 18:00</div>
			<div class="col-lg-2">
				<a href="http://mebel-ekat.ru" class="dealers__link" target="_blank">mebel-ekat.ru</a>
			</div>
		</div>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>"Первый мебельный" </strong>
			</div>
			<div class="col-lg-4">ул. Токарей, 40, офис 6б,</div>
			<div class="col-lg-4">Тел.: (343) 202-28-33,<br>время работы с 10:00 до 18:00</div>
			<div class="col-lg-2">
				<a href="http://meb-ural.ru/" class="dealers__link" target="_blank">www.meb-ural.ru </a>
			</div>
		</div>
	</div>
	<div class="dealers__block ufa">
		<h2 class="dealers__title dealers__title--table">г. Уфа</h2>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>"МамаГуру"</strong>
			</div>
			<div class="col-lg-4">ул.Чапаева, 38/2</div>
			<div class="col-lg-4">8-927-236-62-91,  8-347-26-66-29</div>
			<div class="col-lg-2">
				<a href="http://xn--80aaj7ab0aub.xn--p1ai/" class="dealers__link" target="_blank">мамагуру.рф</a>
			</div>
		</div>
	</div>
	<div class="dealers__block permian">
		<h2 class="dealers__title dealers__title--table">г. Пермь</h2>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>"Мебель для дома"</strong>
			</div>
			<div class="col-lg-4">ул. Куйбышева 2, офис 16,</div>
			<div class="col-lg-4">8-800-500-27-20, (342) 287-13-28,<br>время работы с 10:00 до 18:00</div>
			<div class="col-lg-2">
				<a href="http://www.meb59.com" class="dealers__link" target="_blank">www.meb59.com</a>
			</div>
		</div>
	</div>
	<div class="dealers__block novgorod">
		<h2 class="dealers__title dealers__title--table">г. Нижний Новгород</h2>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>"ТД Компик"</strong>
			</div>
			<div class="col-lg-4"> ул.Федосеенко, д.6,</div>
			<div class="col-lg-4">8-831-420-60-94</div>
			<div class="col-lg-2">
				<a href="http://tdcompic.ru/" class="dealers__link" target="_blank">tdcompic.ru</a>
			</div>
		</div>
	</div>
	<div class="dealers__block chelyabinsk">
		<h2 class="dealers__title dealers__title--table">г. Челябинск</h2>
		<div class="dealers__row clearfix">
			<div class="col-lg-2 dealers__name">
				<strong>"Мебель для дома"</strong>
			</div>
			<div class="col-lg-4">ул. Комсомольский Проспект, 10, офис 1,</div>
			<div class="col-lg-4">8-800-500-27-20, (351) 750-67-11<br>время работы с 10:00 до 18:00</div>
			<div class="col-lg-2">
				<a href="http://www.meb74.com/" class="dealers__link" target="_blank">www.meb74.com</a>
			</div>
		</div>
	</div>
</div>
 <br>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>