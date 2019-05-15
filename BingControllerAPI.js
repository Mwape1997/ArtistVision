/*
Authors: Mwape
*/

console.log('Maps loading');

var map = null;

function GetMap()
{
    map = new Microsoft.Maps.Map(document.getElementById('myMap'), {credentials: 'AidBKmBOVSnyRgytKK4OQ2mGI5T8eAw_LdAM4sf6ZF4DtIF_68uwg1dHnl27Qkjz'});

    //Create some shapes to convert into GeoJSON.
    var polygon = new Microsoft.Maps.Polygon([
        [new Microsoft.Maps.Location(41, -104.05),
            new Microsoft.Maps.Location(45, -104.05),
            new Microsoft.Maps.Location(45, -111.05),
            new Microsoft.Maps.Location(41, -111.05),
            new Microsoft.Maps.Location(41, -104.05)]]);

    var pin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(43, -107.55));

    //Create an array of shapes.
    var shapes = [polygon, pin];

    //Add the shapes to the map so we can see them (optional).
    map.entities.push(shapes);

    Microsoft.Maps.loadModule('Microsoft.Maps.GeoJson', function () {
        //Convert the array of shapes into a GeoJSON object.
        var geoJson = Microsoft.Maps.GeoJson.write(shapes);

        //Display the GeoJson in a new Window.
        var myWindow = window.open('', '_blank', 'scrollbars=yes, resizable=yes, width=400, height=100');
        myWindow.document.write(JSON.stringify(geoJson));
        console.document.write(JSON.stringify(geoJson))
    });
}
