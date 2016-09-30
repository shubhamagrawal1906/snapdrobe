$(document).ready(function(){	
	var offset = $("nav").offset().top;
	$("nav").wrap('<div class="nav-placeholder"></div>');
	$(".nav-placeholder").height($("nav").outerHeight());
	$(window).scroll(function(){
		var scrollpos = $(window).scrollTop();
		if(scrollpos >= offset){
			$("nav").addClass("fixed");
		}else{
			$("nav").removeClass("fixed");
		}
	});
	
});

function search(){
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById('result').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET','search.php?key='+document.search.key.value,true);
	xmlhttp.send();
}
function following(mode,id,allow){
	var object = 'events.php?mode=following&&'+allow+'='+id+'&&following_mode='+mode;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById('adiv').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET',object,true);
	xmlhttp.send();
}
function load(object,div){
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById(div).innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET',object,true);
	xmlhttp.send();
}
