
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