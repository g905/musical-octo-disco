<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<?if ($curPage == '/index.php'):?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"romack",
	Array(
		"IBLOCK_TYPE" => "products",
		"IBLOCK_ID" => 8,
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array("NAME", "SORT", "DESCRIPTION", "PICTURE", "DETAIL_PICTURE"),
		"SECTION_USER_FIELDS" => array(),
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"ITEMS_IN_ROW" => 4
	)
);?>

		</div>
	</div>

<?/*$APPLICATION->IncludeComponent("bitrix:news.list", "nost", array(
	"IBLOCK_TYPE" => "news",
	"IBLOCK_ID" => $_REQUEST["ID"],
	"NEWS_COUNT" => "3",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "ID",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "70",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "N",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);*/?>

<!--script type="text/javascript">
	function toggle_text(text_num) {
		for (var i=1; i<=5; i++) {
			if (i == text_num)
				document.getElementById('spoiler_body'+i).style.display='block'
			else
				document.getElementById('spoiler_body'+i).style.display='none';
		}
		return false;
	};
</script>
	<div id="content">
		<div class="container subtext">
			<div class="row icons">
				<h2 class="h2">5 причин купить шашки для такси от компании НОСТ</h2>
				<p>
					Купить шашки для такси, а также шашечки для такси можно на нашем сайте напрямую у производителя.
					Наши заказчики – службы такси, диспетчерские, автошколы и службы доставки, которые хотят выделить свои автомобили из потока и стать заметнее для потенциальных клиентов. И вот те 5 причин, по которым заказчики предпочитают купить шашки для такси именно в компании НОСТ.	
				</p>
				<p>
					
					Мы делаем Вас заметнее. Продукция производственной компании НОСТ – шашки на такси, шашечки для такси и <a href="/products/magnitnye-nakleyki-na-taksi/">магнитные наклейки для авто</a>.
				</p>
				<div class="col-xs-6">
					<a href="" class="thumbnail" onclick="toggle_text(1);return false;">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/purse.png" alt="Низкая стоимость">
							<div class="caption">
								<h3 class="h4 text-center">Низкая стоимость</h3>
							</div>
						</a>
				</div>
				<div class="col-xs-6">
					<a href="" class="thumbnail" onclick="toggle_text(2);return false;">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/watch.png" alt="Сроки изготовления">
							<div class="caption">
								<h3 class="h4 text-center">Сроки изготовления</h3>
							</div>
						</a>
				</div>
				<div class="col-xs-6">
					<a href="" class="thumbnail" onclick="toggle_text(3);return false;">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/thumbup.png" alt="Надежные материалы">
							<div class="caption">
								<h3 class="h4 text-center">Надежные материалы</h3>
							</div>
						</a>
				</div>
				<div class="col-xs-6">
					<a href="" class="thumbnail" onclick="toggle_text(4);return false;">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/moto.png" alt="Доставка по всей России">
							<div class="caption">
								<h3 class="h4 text-center">Доставка по всей России</h3>
							</div>
						</a>
				</div>
				<div class="col-xs-6">
					<a href="" class="thumbnail" onclick="toggle_text(5);return false;">
							<img src="<?=SITE_TEMPLATE_PATH?>/images/clock.png" alt="Оплата любым удобным способом">
							<div class="caption">
								<h3 class="h4 text-center">Оплата любым удобным способом</h3>
							</div>
						</a>
				</div>
				<div id="spoiler_body1" class="spoiler_body"> 
					<p>Стоимость изделий зависит от размера и используемого материала и начинается от 550 рублей за единицу продукции.</p>
                                						
					<p><a href="/price/" title="шашки такси цена">Цена</a> указана за полный комплект оборудования, готовый к немедленному использованию сразу после получения заказчиком (нанесение графики не входит в стоимость изделия).</p>
 
					<p>Вам не нужно доплачивать за провода, осветительные элементы и крепления &ndash; шашки и короба полностью готовы к эксплуатации. Вам нужно только потратить 5-10 минут на то, чтобы установить их на крышу автомобиля.</p>
				</div>
				<div id="spoiler_body2" class="spoiler_body"> 
					<p>Сроки изготовления шашек для такси &ndash; от 2 до 14 дней с момента оформления заказа. </p>

				</div>
				<div id="spoiler_body3" class="spoiler_body"> 
					<p>Наши изделия отличаются высоким качеством материалов, самыми современными и технологичными комплектующими и продуманной конструкцией. Для вас огромный выбор шашечек на такси разнообразных форм. Кроме того мы готовы бесплатно разработать и произвести пресс-форму для шашки такси по вашему индивидуальному проекту.</p>
 
					<p>Шашечки для такси могут быть изготовлены из полистирола или поликарбоната. Поликарбонат более долговечен и дольше сохраняет товарный вид, однако полистирол несколько дешевле.</p>
 
					<p>На сегодняшний день вы можете заказать шашки размером: 30см, 38см, 45см, 52см, 60см, 70см,80см, 100см,120см,140см. </p>

				</div>
				<div id="spoiler_body4" class="spoiler_body"> 
					<p>Доставка осуществляется по всей России ведущими транспортными компаниями. Стоимость доставки, как правило, не превышает 3-5% стоимости товара.</p>
 
					<p>Мы работаем с лучшими грузоперевозчиками, благодаря чему можем гарантировать высокую скорость доставки любых объемов продукции и сохранность груза вне зависимости от расстояния перевозки.</p>

				</div>
				<div id="spoiler_body5" class="spoiler_body"> 
					<p>Оплатить продукцию вы можете как по безналу, так и при помощи различных платежных систем. Для получения более подробной информации по оплате вы можете связаться с нашими менеджерами.</p>
				</div>

				<p>
					Чтобы оформить заказ и купить шашечки такси, свяжитесь с нашими менеджерами по телефону горячей линии 8-800-700-66-78 (звонок по России бесплатный) или заполните форму на сайте. Мы свяжемся с вами в течение рабочего дня для согласования деталей заказа и проведения оплаты.
				</p>
				<h3 class="text-center h2">Рубите конкурентов шашками!</h3>
			</div>
		</div>
	</div-->

<?else:?> <?// adl если не на главной странице - нужно закрыть теги id="content"?>
	</div>
 

<?endif?>
<!-- CONTENT-->



<!-- FOOTER-->
	<div id="footer">
		<div class="container foots">
	<?$APPLICATION->IncludeComponent("bitrix:main.map", "romack", Array(
	"LEVEL" => "3",	// Максимальный уровень вложенности (0 - без вложенности)
	"COL_NUM" => "6",	// Количество колонок
	"SHOW_DESCRIPTION" => "N",	// Показывать описания
	"SET_TITLE" => "N",	// Устанавливать заголовок страницы
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	),
	false
);?> 

			<div class="row text-center">
				<div class="col-xs-30" id="information">
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "sect",
					"AREA_FILE_SUFFIX" => "contacts_bottom",
					"AREA_FILE_RECURSIVE" => "Y",
					"EDIT_TEMPLATE" => ""
					)
			);?>			
				</div>
			</div>

		</div>
	</div>
	<div class="toTop">Наверх</div>
<!-- FOOTER-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/toTop.min.js"></script>
<!-- FOOTER2-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter21789844 = new Ya.Metrika({
                    id:21789844,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    ut:"noindex"
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/21789844?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  </body>
</html>
