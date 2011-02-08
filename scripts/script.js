$(document).ready(function(){

	/* sets a colour array for main menu items. IE dosen't support nth-child CSS selectors */
	var colours = new Array('e33503','f3871b','73b400','73a29a','436a71'); 
	for(i in colours){
		$('.main-menu li:nth-child('+colours.length+'n+'+(parseInt(i)+1)+') a').css('background','#'+colours[i]);
	}
	
	
	Cufon.replace('.main-menu a', { fontFamily: 'Gill Sans' });
	Cufon.replace('.darkblue .search-title', { fontFamily: 'Gill Sans Light' });
	Cufon.replace('.ting-search-carousel .subtitle', { fontFamily: 'Gill Sans Light' });
	
	
});



