
var map = L.map('map').setView([19.183597, 73.024063], 15);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 23,
    attribution: '© OpenStreetMap'
}).addTo(map);


var marker = L.marker([19.183597, 73.024063]).addTo(map);

/*var circle = L.circle([19.183597, 73.024063], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 400
}).addTo(map);*/

//map boundry
var polygon = L.polygon([
    [19.193619, 73.023012],
    [19.187002, 73.019943],
    [19.173221, 73.018012],
    [19.1611, 73.020909],
    [19.161769, 73.032732],
    [19.17016, 73.033912],
    [19.176605, 73.029964]

], {
    color: 'brown',
    fillColor: 'transparent'
}).addTo(map);


marker.bindPopup("<b>Welcome<br>to Mumbra.</b>").openPopup();

var popup = L.popup()
    .setLatLng([19.183597, 73.024063])
    .setContent("Mumbra City.")
    .openOn(map);


var popup = L.popup();

function onMapClick(e) {
    popup.setLatLng(e.latlng).setContent(""+e.latlng.toString()).openOn(map);
}

map.on('click', onMapClick);


// marker with icons
var greenIcon = L.icon({
    iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-green.png',
    shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',

    iconSize:     [38, 95], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

L.marker([19.184246, 73.026509], {icon: greenIcon}).addTo(map);
var a=L.marker([19.184246, 73.026509], {icon: greenIcon}).addTo(map);
a.bindPopup("<b>Green Area</b>");

//GeoJSON
var geojsonFeature = {
    "type": "Feature",
    "properties": {
        "name": "Coors Field",
        "amenity": "School",
        "popupContent": "This is a School!"
    },
    "geometry": {
        "type": "Point",
        "color": "red",
        "coordinates": [19.191704, 73.021376]
    }
};
L.geoJSON(geojsonFeature).addTo(map);

//layers
var cities = L.layerGroup();
var littleton = L.marker([19.171599, 73.031659]).bindPopup('This is Littleton, CO.').addTo(cities);
var denver    = L.marker([19.163249, 73.029213]).bindPopup('This is Denver, CO.').addTo(cities);
var aurora    = L.marker([19.185806, 73.022625]).bindPopup('This is Aurora, CO.').addTo(cities);
var golden    = L.marker([19.169836, 73.025544]).bindPopup('This is Golden, CO.').addTo(cities);


var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';

//below need to add mumbra's satellite api reference
var mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';


var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
});

var streets = L.tileLayer(mbUrl, {id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

var map = L.map('map', {
    center: [19.183597, 73.024063],
    zoom: 10,
    layers: [osm, cities]
});

var baseMaps = {
    "OpenStreetMap": osm,
    "Mapbox Streets": streets
};

var overlayMaps = {
    "Cities": cities
};

var baseMaps = {
    "<span style='color: gray'>Grayscale</span>": grayscale,
    "Streets": streets
};

var crownHill = L.marker([19.174639, 73.024364]).bindPopup('This is Crown Hill Park.'),
    rubyHill = L.marker([19.170262, 73.025651]).bindPopup('This is Ruby Hill Park.');
    
var parks = L.layerGroup([crownHill, rubyHill]);
var satellite = L.tileLayer(mbUrl, {id: 'MapID', tileSize: 512, zoomOffset: -1, attribution: mbAttr});

layerControl.addBaseLayer(satellite, "Satellite");
layerControl.addOverlay(parks, "Parks");   