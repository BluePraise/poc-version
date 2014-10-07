
function setCookie(cname,cvalue,exdays) {
		var d = new Date();
		d.setTime(d.getTime()+(exdays*24*60*60*1000));
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
		}

		function getCookie(cname)
		{
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++)
		  {
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		  }
		return "";
		}

		/*if((getCookie('lat')=='') && (getCookie('lon')=='')){

		function setLocation(position){
		lat=position.coords.latitude;
		lon=position.coords.longitude;
		setCookie('lat',lat,30);
		setCookie('lon',lon,30);

		}
		function showError(error)
	  {
	  switch(error.code)
		{
		case error.PERMISSION_DENIED:
		  x.innerHTML="User denied the request for Geolocation."
		  break;
		case error.POSITION_UNAVAILABLE:
		  x.innerHTML="Location information is unavailable."
		  break;
		case error.TIMEOUT:
		  x.innerHTML="The request to get user location timed out."
		  break;
		case error.UNKNOWN_ERROR:
		  x.innerHTML="An unknown error occurred."
		  break;
		}
	  }

		 navigator.geolocation.getCurrentPosition(setLocation,showError);

*/

}




jQuery(document).ready(function($) {


	$(".open_tab1").hide();
	$(".tab_button li:first").addClass("cc_active").show();
	$(".open_tab1:first").show();
		$(".tab_button li").click(function() {
			$(".tab_button li").removeClass("cc_active"); //Remove any "active" class
			$(this).addClass("cc_active"); //Add "active" class to selected tab
			$(".open_tab1").hide(); //Hide all tab content
			var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active content
			return false;
	});

		 /* $(function() {
			$( "#slider-range-min, #slider-range-min2, #slider-range-min3, #slider-range-min4" ).slider({
			range: "min",
			value: 50,
			min: 1,
			max: 100,
			slide: function( event, ui ) {
			$( "#amount" ).val( ui.value );
			}
			});
			$( "#amount" ).val($( "#slider-range-min, #slider-range-min2, #slider-range-min3, #slider-range-min4" ).slider( "value" ) );
    });*/

	        $( "#clickme" ).click(function() {
			$( "#mg_subscribe" ).slideToggle();
			$("html, body").animate({ scrollTop: $(document).height() }, 1000);

			});

			 $( "#btn_nothanks" ).click(function() {
			$( "#mg_subscribe" ).slideToggle();
			$("html, body").animate({ scrollTop: $(document).height() }, 100);
			return false;


			});













	/*user define css*/

			/*if(getCookie('user')=='') {
			settingcss();

			}else{
			$('body').removeClass('day');
			$('body').removeClass('night')
			$('body').addClass(getCookie('user'));
			$('#'+getCookie('user')).addClass('active');

			}*/



			$(".theme_change").on('click',function(){


			  var css =$(this).attr('id');

			  $('body').removeClass('day');
			  $('body').removeClass('night')
			  $('body').addClass(css);
			  $('.theme_change').removeClass('active');
			  $(this).addClass('active');

			   $.ajax({
				  url:'http://www.bitpaycash.com/demo/mystile/savesession.php?css='+css,
				  type:'GET',
				  success:function(html){
				  }
				  })

		  });


	/*user define css*/






	/*changing css according to day night*/
		/*function settingcss()
	  {

	  var dt = new Date();
	  var day =dt.getDate();
	  var month = parseInt(dt.getMonth()) + 1 ;
	  var time = dt.getHours() + ":"  + dt.getMinutes() + ":" + dt.getSeconds();
				  $.ajax({
				  url:'wp-content/themes/Mystile-Child-Theme-master/ajax.php?day='+day+'&month='+month+'&time='+time,
				  type:'GET',
				  success:function(html){

					$('body').removeClass('day');
					$('body').removeClass('night')
					$('body').addClass(html);
					$('#'+html).addClass('active');

				  }
				  })


	  }*/

	/*changing css according to day night*/


	/*tooltip*/
	 $(function() {
			$(".show_tooltip").tooltip({
			position: {
			my: "center bottom-10",
			at: "center top",
			using: function( position, feedback ) {
			$( this ).css( position );
			$( "<div>" )
			.addClass( "arrow" )
			.addClass( feedback.vertical )
			.addClass( feedback.horizontal )
			.appendTo( this );
			}
			}
			});
		});
	/*tooltip*/

	/*on removing items show message*/

	$('a.remove').on('click',function(){

	var result = confirm("Are you sure to delete the item.");
	if(result==true){
	return true;
	}else{
	return false;
	}

	})

	/*fix content when height less*/

	var headerh = parseInt($('#mg_header').outerHeight(true));
	var footerh = parseInt($('#mg_footer_block').outerHeight(true));
	var container = parseInt($('#container_block').outerHeight(true));
	var windowh = window.innerHeight;
	if((headerh+ footerh +container)< windowh){
	var heightn = windowh -(headerh+ footerh+50);
	$('#container_block').css('min-height',heightn+'px');

	}

	/*making quantity button number*/
	$("input[name='quantity']").attr('type','text');

	$(".quantity input.qty").attr('type','text');






});

