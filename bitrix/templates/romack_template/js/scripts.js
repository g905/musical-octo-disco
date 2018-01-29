                        
// adl 08.07.13 Ñìåíà êàðòèíêè
function changePict(imageNum, divName, format) {

	var div = document.getElementById('items-miniimg')
	var elems = div.getElementsByTagName('div')
	var itemsMaximg = document.getElementById('items-maximg')
	var item = itemsMaximg.getElementsByTagName('div')

	for(var i=0; i<elems.length; i++) 
		elems[i].className = "";

	divName.className = "activ";

	for (var i=0; i<item.length; i++) {
		// adl Äåëàåì íåâèäèìûìè âñå êàðòèíêè
		try {
			document.getElementById('image'+i).style.display = "none";
		}
		catch(e) {
			break;
		}
	}
	
	if (format == "swf") { // adl 05.09.13 Åñëè 3Ä âðàùåíèå
		if (document.getElementById('flash') != null) document.getElementById('flash').style.display = "block";
		document.getElementById('mainSwf').src = pictName;		
	}
	else {	// adl 05.09.13 Åñëè îáû÷íûå êàðòèíêè
		if (document.getElementById('flash') != null) document.getElementById('flash').style.display = "none";
		document.getElementById('image'+imageNum).style.display = "block";
		document.getElementById('mainPict'+imageNum).src = pictName;
	}

};

$(document).ready(function() {
	//Выбор дилера
	$('.dealers__select').click(function() {
		$('.dealers__list').slideToggle(300);
	});

	$('.dealers__item').click(function() {
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		$('.dealers__list').fadeOut(300);
		$('.dealers__select').text($(this).text());
	});

	//показать карту
	$('.dealers__map-toggle').bind({
		click: function() {
			if( $('.dealers__map-wrap').hasClass('active') ) {
				$('.dealers__map-wrap').removeClass('active');
				$(this).text('Показать карту');
				$('.dealers__map').css('height', '200px');
				myMap.container.fitToViewport();
				$('.dealers__map-over').css({'bottom':'0', 'position':'absolute'});
				$('.chevron').css('transform', 'rotate(0)');
			} else {
				$('.dealers__map-wrap').addClass('active');
				$(this).text('Скрыть карту');
				$('.dealers__map').css('height', '500px');
				myMap.container.fitToViewport();
				$('.dealers__map-over').css('position', 'relative');
				$('.chevron').css('transform', 'rotate(180deg)');
			}
		}
	});

	$("#izhevsk").click(function(){
		myMap.action.execute(myAction1);
		$('.dealers__block').removeClass('active');
		$('.izhevsk').addClass('active');
	});
	$("#moscow").click(function(){
		myMap.action.execute(myAction2);
		$('.dealers__block').removeClass('active');
		$('.moscow').addClass('active');
	});
	$("#petersburg").click(function(){
		myMap.action.execute(myAction3);
		$('.dealers__block').removeClass('active');
		$('.petersburg').addClass('active');
	});
	$("#ekaterinburg").click(function(){
		myMap.action.execute(myAction4);
		$('.dealers__block').removeClass('active');
		$('.ekaterinburg').addClass('active');
	});
	$("#ufa").click(function(){
		myMap.action.execute(myAction5);
		$('.dealers__block').removeClass('active');
		$('.ufa').addClass('active');
	});
	$("#permian").click(function(){
		myMap.action.execute(myAction6);
		$('.dealers__block').removeClass('active');
		$('.permian').addClass('active');
	});
	$("#novgorod").click(function(){
		myMap.action.execute(myAction7);
		$('.dealers__block').removeClass('active');
		$('.novgorod').addClass('active');
	});
	$("#chelyabinsk").click(function(){
		myMap.action.execute(myAction8);
		$('.dealers__block').removeClass('active');
		$('.chelyabinsk').addClass('active');
	});
	$("#all").click(function(){
		myMap.action.execute(myAction9);
		$('.dealers__block').addClass('active');
	});

	// Инициализация и уничтожение карты при нажатии на кнопку.

	ymaps.ready(init);

	//заводим координаты дилеров с описанием в массив
	var placemarks = [
		{
			lat : 56.844970640997865,
			long : 53.291172017196565,
			balloonContent: '<strong>Бэби Бай</strong><br>ТРЦ "Радуга", г. Ижевск, ул.Ленина, 140<br>Тел.: 8(3412)908-079',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 56.87044006782237,
			long : 53.22410249999997,
			balloonContent: '<strong>МЦ "Мебельград"</strong><br>г. Ижевск, ул.Удмуртская, д.302, отдел "Статус-М"<br>Тел.: 8(3412) 32-01-02',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 55.7047193037482,
			long : 37.8345000370673,
			balloonContent: '<strong>ТЦ "Скарабей"</strong>, 3 этаж<br>г .Москва, м.Выхино 8-й км Мкад<br>Тел.: +7(916)732-2777, +7(925)615-5778',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 55.82762130799046,
			long : 37.48930835152052,
			balloonContent: '<strong>ЦД "Ленинградский"</strong>, 3 этаж, левое крыло, пав.3к 03<br>г .Москва, м. Войковская, Ленинградское ш. 25<br>тел.: +7(495) 502-5321, +7(919) 100-6695, +7(925) 631-6758',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 55.85865657568744,
			long : 37.685935728836014,
			balloonContent: '<strong>ТЦ " Мебель России"</strong>, 4 этаж, правое крыло<br>г .Москва, м. ВДНХ, Ярославское ш., д.19<br>Тел.: +7(495)778-13-27, +7(919)100-86-69, +7(926) 972-5392',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 55.702128,
			long : 37.355669,
			balloonContent: '<strong>ТЦ "Три Кита"</strong>, 4 этаж, секция детской мебели VOX<br>г .Москва, Можайское шоссе, 2 км от МКАД<br>Тел.: +7(499) 340-21-82, +7(916) 063-44-97, +7(925) 348-73-02',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 55.344920,
			long : 37.507463,
			balloonContent: '<strong>ТД "Компик"</strong><br>МО, г. Климовск, ул.Заречная, стр.2<br>Тел.: 8-499-389-44-90',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 59.736304,
			long : 30.453221,
			balloonContent: '<strong>ТД "Компик"</strong><br>г. Санкт-Петербург, ул.Промышленная, д.13<br>Тел.: 8-812-456-70-82',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 56.83510656788242,
			long : 60.558442499999984,
			balloonContent: '<strong>"Мебель для дома"</strong><br>г. Екатеринбург, ул. Татищева, 53, офис 105<br>Тел.: 8-800-500-27-20, (343) 202-52-72, 2000-696',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 56.83454006785081,
			long : 60.56082299999997,
			balloonContent: '<strong>"Мебель для дома"</strong><br>г. Екатеринбург, ул. Токарей, 40, офис 6б<br>Тел.: (343) 202-28-33',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 54.726227183079324,
			long : 55.97398175529469,
			balloonContent: '<strong>"МамаГуру"</strong><br>г. Уфа, ул.Чапаева, 38/2<br>Тел.: 8-927-236-62-91, 8-347-26-66-29',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 58.01578083612092,
			long : 56.23103833068848,
			balloonContent: '<strong>"Мебель для дома"</strong><br>г. Пермь, ул. Куйбышева 2, офис 16<br>Тел.: 8-800-500-27-20, (342) 287-13-28',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 56.33854489933034,
			long : 43.81898752083859,
			balloonContent: '<strong>"ТД Компик"</strong><br>г. Нижний Новгород, ул.Федосеенко, д.6<br>Тел.: 8-831-420-60-94',
			preset: 'islands#redDotIcon',
		},
		{
			lat : 55.19263980861086,
			long : 61.379924644180235,
			balloonContent: '<strong>"Мебель для дома"</strong><br>г. Челябинск, ул. Комсомольский Проспект, 10, офис 1<br>Тел.: 8-800-500-27-20, (351) 750-67-11',
			preset: 'islands#redDotIcon',
		},
	]

	var myMap, myAction, geoObjects= [];


	function init () {
		//основная карта
		myMap1 = new ymaps.Map ("map-main", {
	        center: [56.854234, 53.360813],
	        zoom: 12,
	        duration: 50
	    });

	    var myPlacemark = new ymaps.Placemark([56.854234, 53.360813], {
	    		balloonContent: '<strong>"Romack Mebel"</strong><br>Завьяловский район, с. Первомайский, ул. Сабурова, 4<br>8 (800) 200-3221, 8 (3412) 65-07-64',
	    	},
	    	{
	    		preset: 'islands#redDotIcon',
	    	}
	    });

	    //карта с дилерами
		myMap = new ymaps.Map ("map", {
	        center: [56.85247279343317,53.216654071533114],
	        zoom: 12,
	        duration: 50
	    });

    
		for (var i = 0; i < placemarks.length; i++) {
			geoObjects[i] = new ymaps.Placemark([placemarks[i].lat, placemarks[i].long], {
					balloonContent: placemarks[i].balloonContent,
				},
				{
					preset: placemarks[i].preset
				} 
			);
		}

		var clusterer = new ymaps.Clusterer({
			preset: 'islands#redClusterIcons',
		});
		myMap.geoObjects.add(clusterer);
		//myMap.geoObjects.add(myPlacemark);
		clusterer.add(geoObjects);

	    myAction1 = new ymaps.map.action.Single({
	          center: [56.85247279343317,53.216654071533114],
	          zoom: 12,
	          duration: 1000
		});
	    myAction2 = new ymaps.map.action.Single({
	          center: [55.605,37.615],
	          zoom: 9,
	          duration: 1000
		});
		myAction3 = new ymaps.map.action.Single({
			center: [59.736304, 30.453221],
			zoom: 14,
			duration: 1000
		  });
		myAction4 = new ymaps.map.action.Single({
			center: [56.83510656788242, 60.558442499999984],
			zoom: 16,
			duration: 1000
		  });
		myAction5 = new ymaps.map.action.Single({
			center: [54.726227183079324,55.97398175529469],
			zoom: 16,
			duration: 1000
		  });
		myAction6 = new ymaps.map.action.Single({
			center: [58.01578083612092,56.23103833068848],
			zoom: 16,
			duration: 1000
		  });
		myAction7 = new ymaps.map.action.Single({
			center: [56.33854489933034,43.81898752083859],
			zoom: 16,
			duration: 1000
		  });
		myAction8 = new ymaps.map.action.Single({
			center: [55.19263980861086,61.379924644180235],
			zoom: 16,
			duration: 1000
		  });
		myAction9 = new ymaps.map.action.Single({
			center: [54.41333300825061,49.995263523700785],
			zoom: 4,
			duration: 1000
	  	}); 
	}

})

