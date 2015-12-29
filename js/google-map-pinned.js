// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];
var rendererOptions = {
  draggable: true
};
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

// Postion value
var EndLatitude;
var EndLongitude;
var AdminMode;
var map_zoom = 14;

$(document).ready(function(){
  EndLatitude = $('#PlaceLatitude').val();
  EndLongitude = $('#PlaceLongitude').val();

  if(EndLatitude == '' || EndLongitude == ''){
    EndLatitude = $('#LocationLatitude').val();
    EndLongitude = $('#LocationLongitude').val();
  }

  AdminMode = $('#adminmode').val();

  myPosition(EndLatitude,EndLongitude,map_zoom,AdminMode);
});

// Set Position on Map for Edit place
function myPosition(latitude,longitude,zoom,adminmode){
  directionsDisplay = new google.maps.DirectionsRenderer();

  var location = new google.maps.LatLng(latitude,longitude);
  var mapOptions = {
    zoom: zoom,
    center: location
  };

  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  directionsDisplay.setMap(map);

  google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
    computeTotalDistance(directionsDisplay.getDirections());
  });

  addMarker(location);
  console.log('Google Map => '+latitude+':'+longitude);

  if(adminmode == 'online'){
    google.maps.event.addListener(map,'click', function(event) {
      addMarker(event.latLng);
      $('#PlaceLatitude').val(event.latLng.lat());
      $('#PlaceLongitude').val(event.latLng.lng());
      $('#map-note').hide(300);
    });
  }
}

function currentPosition(){
  // Try HTML5 geolocation
  console.log('Get current Position');
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(position){
      var pos = new google.maps.LatLng(
        position.coords.latitude,
        position.coords.longitude
      );

      $('#mylatitude').val(position.coords.latitude);
      $('#mylongitude').val(position.coords.longitude);

      calcRoute(position.coords.latitude,position.coords.longitude,this.EndLatitude,this.EndLongitude);

      $('#OpenGoogleMap').fadeIn();

    });
  }
  else{
    $('#option-message').html('<i class="fa fa-exclamation-circle"></i>ไม่สามารถค้นหาตำแหน่งปัจจุบันของคุณได้ กรุณาเปิด GPS และทดลองใหม่อีกครั้ง');
    $('#option-message').fadeIn();
  }
}

function calcRoute(slat,slog,elat,elog) {
  deleteMarkers();
  console.log('calcRoute:'+slat+','+slog+','+elat+','+elog);
  var request = {
      origin:new google.maps.LatLng(slat,slog),
      destination:new google.maps.LatLng(elat,elog),
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

function computeTotalDistance(result) {
  var total = 0;
  var myroute = result.routes[0];
  for (var i = 0; i < myroute.legs.length; i++) {
    total += myroute.legs[i].distance.value;
  }
  total = total / 1000.0;
  // document.getElementById('total').innerHTML = total + ' km';
  console.log('ระยะทาง: '+total+'km');
  if(total != 0){
    $('#Directions').html(total.toPrecision(4)+' km');
    $('#OpenGoogleMap').fadeIn(300);
  }
}

// Add a marker to the map and push to the array.
function addMarker(location) {
  deleteMarkers();
  var marker = new google.maps.Marker({
    position: location,
    // animation: google.maps.Animation.DROP,
    map: map
  });
  markers.push(marker);

  // markers.setAnimation(null);
  // markers.setAnimation(google.maps.Animation.BOUNCE);
}

// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
}

// Shows any markers currently in the array.
function showMarkers() {
  setAllMap(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

// Open Google Map App on Android
function OpenGoogleMap(slat,slog,elat,elog){
  if(slat == '' || slog == '' || elat == '' || elog == ''){
    alert('ไม่สามารถขอเส้นทางได้ในขณะนี้');
  }
  else{
    window.open('https://www.google.co.th/maps/dir/'+slat+','+slog+'/'+elat+','+elog+'/@'+elat+','+elog+',13z');
  }
}