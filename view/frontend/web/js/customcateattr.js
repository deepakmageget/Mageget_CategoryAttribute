require(['jquery'], function($) {
	window.onload = (event) => {
	var fullwidth = $('.navigation').width();
	var halfwidthval = $('.navigation').width();
	var halfwidth = halfwidthval/2;
	var halfwidthlast = halfwidthval-300;
	
	$(".deep-new-full-width").css("min-width", fullwidth+'px');
	$(".deep-new-half-width").css("min-width", halfwidth+'px');

	$(".deep-new-full-width:last").css("min-width", halfwidthlast+'px');
	
	
	$(".deep-new-full-width").css('background-color', 'yellow');
	$(".deep-new-half-width").css('background-color', 'orange');

		// alert('okkkkkk');
		// console.log('page is fully loaded');

		// var itemindex = 0;
		// var Jlistobj = null;
		// $('.level-top.parent .submenu li').each(function()
		// {
	 
		//    if (itemindex % 5 == 0)
		//    {
		// 	  Jlistobj = $("<ul></ul>");
		//    }
		//    Jlistobj.append($(this));
		//    $('.outdiv').append(Jlistobj);
		//    itemindex++;
		// });








	  };
});