$(document).ready(function() {
})

// adl 08.07.13 Смена картинки
function changePict(pictName, divName, format, bigPhoto = '') {

	var div = document.getElementById('items-miniimg')
	var elems = div.getElementsByTagName('div')

	for(var i=0; i<elems.length; i++) 
		elems[i].className = "";

	divName.className = "activ";


	
	if (format == "swf") { // adl 05.09.13 Если 3Д вращение
		document.getElementById('image').style.display = "none";
		if (document.getElementById('flash') != null) document.getElementById('flash').style.display = "block";
		document.getElementById('mainSwf').src = pictName;		
	}
	else {	// adl 05.09.13 Если обычные картинки
		if (document.getElementById('flash') != null) document.getElementById('flash').style.display = "none";
		document.getElementById('image').style.display = "block";
		document.getElementById('mainPict').src = pictName;
		if (bigPhoto != '') document.getElementById('fancyboxPict').href = bigPhoto;
	}

};
