<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Галерея");?>
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

		<div class="container subtext">
			<div class="row">
				<div class="col-xs-30">

		<h1 class="h2">Фото шашек для такси нашего производства</h1>
<p>Фото шашек для такси и картинки шашечек на такси нашего производства, разбитые на несколько фотоальбомов. Также в этом разделе Вы можете познакомиться с образцами нашей продукции.</p>
 
<p>Все фото оригинальны и сделаны в нашей мастерской. Это значит, что вы можете заказать каждый из представленных образцов и мы изготовим его для вас в течение 2-14 дней.</p>
 
<p>Обращаем Ваше внимание: фото шашечек для такси может незначительно отличаться по цвету от готовой продукции! Также при заказе стоит учитывать, что некоторые модели шашек и коробов могут быть исполнены только в указанном размере.</p>
 
<p>На шашки можно нанести любую информацию: номер телефона, логотип, другие графические элементы, благодаря которым ваши автомобили будут более заметными в потоке других машин.</p>
 
<p>Если вы не смогли подобрать шашки в нашей галерее либо хотите сделать нечто уникальное и неповторимое &ndash; свяжитесь с нашими менеджерами любым удобным для вас способом, и мы поможем вам сделать правильный выбор.</p>
 
<p>Шашки изготавливаются из полистирола или поликарбоната. На этапе производства различий между ними нет. Однако поликарбонат является более современным, долговечным и надежным материалом. Все образцы шашечек, представленные на фото в нашей галерее, могут быть изготовлены как из одного, так и из другого материала.</p>
  
<?$APPLICATION->IncludeComponent("artdepo:gallery.album.list", "nost", array(
	"SECTION_ID" => "5",
	"LANGUAGE_ID" => "ru",
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "SORT",
	"SORT_ORDER1" => "ASC",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_DATE" => "N",
	"DISPLAY_COUNT" => "Y",
/*	"DETAIL_URL" => "album/?ID=#ID#",*/
	"DETAIL_URL" => "album/#CODE#/",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"NAME_TRUNCATE_LEN" => "",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"DISPLAY_TOP_PAGER" => "Y",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000"
	),
	false
);?>
				</div>
			</div>
		</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
