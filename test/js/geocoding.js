// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// - Copyright (c) 2012 Brad Harris.  All Rights Reserved. -
// = This is confidential, proprietary code, and cannot    =
// - be legally copied, modified, or used for any purpose  -
// = other than that for which it was originally licensed. =
// - For details on the use and licensing restrictions     -
// = please contact Brad Harris at                         =
// -   * brad@southcountysound.com                         -
// =   * (573) 444-1727                                    =
// - THE ABOVE NOTICE MUST REMAIN INTACT.                  -
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

var gMap;
var infoWindow;
var kmlLayer;
var eventListenter;

//  ***********************************
//  Initialize the Google Map
function initialize_gMap(itemUrl, name, mapInfo, lat, lng, kmlPath) {

  var mapCanvas = document.getElementById("map_canvas");

  if ((kmlPath != '') || (lat != 0) || (lng != 0)) {

    var latlng = new google.maps.LatLng(lat, lng);
    var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    gMap = new google.maps.Map(mapCanvas, myOptions);

    if (infoWindow) infoWindow.close();

    infoWindow = new google.maps.InfoWindow({
      maxWidth: 300,
      position: latlng
    });

    if (kmlPath != '') {
      addKML(itemUrl, name, mapInfo, kmlPath);
    } else {

      if ((lat != 0) || (lng != 0)) {

        var marker = new google.maps.Marker({
          map: gMap,
          position: latlng,
          title: name
        });

        var node = document.createElement("div");
        node.innerHTML = mapInfo;

        var infowindow = new google.maps.InfoWindow({
          content: buildInfoWindowContainerNode(name, itemUrl, mapInfo),
          maxWidth: 300
        });

        infowindow.open(gMap, marker);

      }
    }
  } else {
    mapCanvas.innerHTML = 'No map available';
    mapCanvas.hidden = true;
  }
}

//  ***********************************
//  Add a KML to the Google Map
function addKML(itemUrl, name, mapInfo, kmlPath) {
  if (kmlPath && (kmlPath != '')) {

    if (infoWindow) infoWindow.close();
    if (kmlLayer) kmlLayer.setMap(null);

    kmlLayer = new google.maps.KmlLayer(
      kmlPath,
      {
        clickable: true,
        map: gMap,
        suppressInfoWindows: true
      });

      google.maps.event.addListener(kmlLayer, 'click', function (kmlEvent) {
        kmlEvent.itemUrl  = itemUrl;
        kmlEvent.itemName = name;
        kmlEvent.mapInfo  = mapInfo;
        showInInfoWindow(kmlEvent);
      });

  }
}

//  ***********************************
//  Populate and Show the InfoWindow
function showInInfoWindow(kmlEvent) {
  showInInfoWindow(kmlEvent.latLng, kmlEvent.itemName, kmlEvent.itemUrl, kmlEvent.mapInfo);
}


//  ***********************************
//  Populate and Show the InfoWindow
function showInInfoWindow(lanLng, itemName, itemUrl, mapInfo) {

  if (infoWindow && (infoWindow.getPosition() != latLng)) {
    infoWindow.close();
  }

  infoWindow.setPosition(latLng);

  var headNode = document.createElement("h3");
  headNode.appendChild(document.createTextNode(itemName));

  var urlLink = document.createElement("a");
  urlLink.appendChild(document.createTextNode('More Info'));
  urlLink.setAttribute('href', itemUrl);

  var urlNode = document.createElement("div");
  urlNode.appendChild(urlLink);

  var infoNode = document.createElement("div");
  infoNode.innerHTML = mapInfo;
  //infoNode.appendChild(document.createTextNode(mapInfo));

  var containerNode = document.createElement("div");
  containerNode.className = "JourneysInfoWindow";
  containerNode.appendChild(headNode);
  containerNode.appendChild(infoNode);
  containerNode.appendChild(urlNode);

  infoWindow.setContent(containerNode.innerHTML)

  infoWindow.open(gMap);

}


//  ***********************************
//  Build InfoWindow Container Node
function buildInfoWindowContainerNode(itemName, itemUrl, mapInfo) {

  var headNode = document.createElement("h3");
  headNode.appendChild(document.createTextNode(itemName));

  var urlLink = document.createElement("a");
  urlLink.appendChild(document.createTextNode('More Info'));
  urlLink.setAttribute('href', itemUrl);

  var urlNode = document.createElement("div");
  urlNode.appendChild(urlLink);

  var infoNode = document.createElement("div");
  infoNode.innerHTML = mapInfo;
  //infoNode.appendChild(document.createTextNode(mapInfo));

  var containerNode = document.createElement("div");
  containerNode.className = "JourneysInfoWindow";
  containerNode.appendChild(headNode);
  containerNode.appendChild(infoNode);
  containerNode.appendChild(urlNode);

  return containerNode;

}


//  ***********************************
//  Populate and Show the InfoWindow
function showInInfoWindow_old(kmlEvent) {

  if (infoWindow.getPosition() != kmlEvent.latLng) {

    var headNode = document.createElement("h1");
    headNode.innerHTML = 'Projects';

    infoWindow.setContent(headNode);
    infoWindow.close();
    infoWindow.setPosition(kmlEvent.latLng);

  }

  var textNode = document.createElement("div");
  textNode.innerHTML = kmlEvent.featureData.description.replace("_blank", "_top");

  var containerNode = document.createElement("div");
  containerNode.appendChild(infoWindow.getContent());
  containerNode.appendChild(textNode);

  infoWindow.setContent(containerNode.innerHTML)

  infoWindow.open(gMap);

}
