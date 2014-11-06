<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка и оплата");
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
		<a name="cont"></a> 
		<div class="container subtext">
			<div class="row center-row">
				<div class="col-xs-push-1 col-xs-5 center">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/moto.png">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Условия доставки</h2>
					<p>
						Мы отправляем нашу продукцию по всей России и в страны СНГ транспортными компаниями <br><img src="<?=SITE_TEMPLATE_PATH?>/images/companies11.png"><img src="<?=SITE_TEMPLATE_PATH?>/images/companies12.png"><img src="<?=SITE_TEMPLATE_PATH?>/images/companies13.png"><br>
						При этом мы экономим Ваше время и деньги и передаем груз в транспортную компанию сами. При отправке, шашки и  световые короба вкладываются друг в друга по 10-30 штук. Чем больше изделий в упаковке, тем дешевле выходит стоимость доставки одного короба, т.к. объём пачки (а значит и цена) из 10 шт. и 30 шт. примерно одинаков. Обычно цена доставки на порядок ниже стоимости самой партии и не является определяющим фактором. К примеру, доставка партии из 20 изделий от нас до Краснодара (2300 км) составляет 450 рублей. Выбрать удобную для Вас транспортную компанию и согласовать все условия 
					</p>
				</div>
			</div>
			<div class="row center-row">
				<div class="col-xs-5 col-xs-push-1 center">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/purse.png">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Условия оплаты</h2>
					<p>
						После оформления заказа менеджеры нашей компании пришлют Вам счет на оплату. Оплата производиться путем безналичного перечисления денежных средств через банк. Так же мы принимаем оплату от физических лиц через различные платежные системы<img src="<?=SITE_TEMPLATE_PATH?>/images/companies21.png"><img src="<?=SITE_TEMPLATE_PATH?>/images/companies22.png"><br>
						Уточните удобный для Вас способ оплаты у менеджеров отдела продаж по телефону 8-800-700-66-78 (Звонок бесплатный) 
					</p>
				</div>
			</div>
			<div class="row center-row">
				<div class="col-xs-5 col-xs-push-1 center">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/warranty.png">
				</div>
				<div class="col-xs-24 col-xs-push-1 center">
					<h2 class="h2">Гарантия</h2>
					<p>
						В соответствии с законодательством Российской Федерации срок предъявления претензий по качеству продукции - 14 календарных дней. 
					</p>
				</div>
			</div>
		</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>