$(document).ready(function() {
})
                        
// adl 08.07.13 ����� ��������
function changePict(imageNum, divName, format) {

	var div = document.getElementById('items-miniimg')
	var elems = div.getElementsByTagName('div')

	for(var i=0; i<elems.length; i++) 
		elems[i].className = "";

	divName.className = "activ";

	for (var i=0; i<10; i++) {
		// adl ������ ���������� ��� ��������
		try {
			document.getElementById('image'+i).style.display = "none";
		}
		catch(e) {
			break;
		}
	}
	
	if (format == "swf") { // adl 05.09.13 ���� 3� ��������
		if (document.getElementById('flash') != null) document.getElementById('flash').style.display = "block";
		document.getElementById('mainSwf').src = pictName;		
	}
	else {	// adl 05.09.13 ���� ������� ��������
		if (document.getElementById('flash') != null) document.getElementById('flash').style.display = "none";
		document.getElementById('image'+imageNum).style.display = "block";
		document.getElementById('mainPict'+imageNum).src = pictName;
	}

};
