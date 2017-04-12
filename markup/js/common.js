$(function() {
	
    $("#infotabs_1").lightTabs();
    
    $('#slider_mobile').owlCarousel({
			items: 1,
			dots: true,
            loop: false,
            nav: false,
            margin: 15
    });
    
});

$(document).ready(function(){
    $(".loader").delay(200).fadeOut();
});

$(document).ready(function(){
    $("#infotabs_2 ul").jTabs({
        content: ".content_b", 
		animate: true,
        speed: 300
    });           
});

$(document).ready(function(){
    var controller = new slidebars();
    controller.init();

    $( '.nav_mobile svg' ).on( 'click', function ( event ) {
        event.preventDefault();
        event.stopPropagation();

        controller.toggle( 'sb-right' );

        if($('body div[canvas]').css("overflow") == 'auto'){
            $('body div[canvas]').css("overflow","hidden");  
        }else{
            $('body div[canvas]').css("overflow","auto");
        }

        $('body div[canvas]').on( 'click', function ( event ) {
            event.stopPropagation();
            controller.close();
            $('body div[canvas]').css("overflow","auto");
        });
    } );



    $('.sb-right ul li .arr').on( 'click', function () {
        if($(this).parent().children('ul').css("display") == "none"){
            $(this).css("transform",'rotate(0deg)');
            $(this).parent().children('ul').slideDown();
        }else{
            $(this).parent().children('ul').slideToggle();
            $(this).css("transform",'rotate(-90deg)');
        }

    });

    $(".left_bar span.left_plus_butt").on("click", function() {
        $(this).siblings("ul").slideToggle();
    });

});



var map;
function initMap() {
    var marker;
    var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

  var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

  var mapOptions = {
    zoom: 14,
    scrollwheel: false,
    scaleControl: false,
    navigationControl: false,
    draggable: false,
    panControl: false,
    zoomControl: false,
    center: new google.maps.LatLng(55.800791, 37.524500),
    scrollwheel: false,
    mapTypeControl: false,
    mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
    }
  };	


  var map = new google.maps.Map(document.getElementById('map'),
    mapOptions);

  marker = new google.maps.Marker({
    map: map,
    icon:'/img/balun.png',
    draggable: false,
    title: 'Москва, Антикафе & Коворкинг, Ленина 56',
    animation: google.maps.Animation.DROP,
    position: {lat: 55.800791, lng: 37.524500}
  });

    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }


  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');
}

    



