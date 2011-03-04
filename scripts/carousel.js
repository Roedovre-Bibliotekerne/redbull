jQuery(function($){
	function changeColors(){
		var colours = new Array('227,53,3', '243,135,27', '115,180,0', '115,162,154', '67,106,113');
		for (i in colours) {
			$('.ting-search-carousel li.jcarousel-item:nth-child(' + colours.length + 'n+' + (parseInt(i) + 1) + ') .info').css('background', 'rgba(' + colours[i] + ',0.7)');
		}
	}
	
	$('.jcarousel-container').ajaxComplete(function(){
		changeColors();
	});
});