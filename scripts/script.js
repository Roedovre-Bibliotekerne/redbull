$(document).ready(function(){

	/* sets a colour array for main menu items. IE dosen't support nth-child CSS selectors */
	var colours = new Array('e33503', 'f3871b', '73b400', '73a29a', '436a71', '38453f');
	for(i in colours){
		$('.main-menu li:nth-child('+colours.length+'n+'+(parseInt(i)+1)+') a').css('background','#'+colours[i]);
	}
	
	
	Cufon.replace('.main-menu a', { fontFamily: 'Gill Sans' });
	Cufon.replace('.darkblue .search-title', { fontFamily: 'Gill Sans Light' });
	Cufon.replace('.ting-search-carousel .subtitle', { fontFamily: 'Gill Sans Light' });
	
	
	$('#search label, #user-login-form label').inFieldLabels({
		fadeOpacity:"0.2",
		fadeDuration:"100"			
	});	
  
  if(jQuery.trim($('.panel-threecol-33-34-33-stacked .panel-middle').html()) == ''){
  $('.panel-threecol-33-34-33-stacked .panel-left').addClass('wide');

  }
  
   
  var heigest = 0; 
  var rowlen = 3;
   
  $('.ting-recommendation li .inner').each(function(i){
    if(heigest < $(this).height()){
      heigest = $(this).height();
    }
    if(!((i+1)%rowlen)){
      cur = $(this);
      for(j=0;j<rowlen;j++){
        cur.height(heigest);
        cur = $(cur).parent().prev().children('.inner');
      }
      heigest = 0;
    }
  });
});



