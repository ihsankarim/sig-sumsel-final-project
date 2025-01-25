<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data GDP yang Terdapat</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #004d40;
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: bold;
            margin: 0 1rem;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        /* Title Styling */
        .title {
            margin-top: 80px; /* Ensure title is visible below the navbar */
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
            color: #004d40;
            padding: 20px 0;
        }

        /* Map container styling */
        #map {
            padding: 2rem;
            margin-right: 5rem;
            margin-left: 5rem;
            margin-bottom: 2rem;
            height: calc(100vh - 70px); /* Full viewport height minus the navbar height */
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
</head>
<body>

    <!-- Navbar Section -->
    <div class="navbar">
        <a href="/" style="font-size: 1.5rem; font-weight: bold; color: white;">Sumatera Selatan</a>
        <div>
            <a href="{{ route('populasi') }}">Populasi</a>
            <a href="{{ route('ekonomi') }}">Ekonomi</a>
            <a href="{{ route('jumlah_restoran') }}">Jumlah Restoran</a>
            <a href="{{ route('jumlah_kejahatan') }}">Jumlah Kejahatan</a>
            <a href="{{ route('beragama_islam') }}">Jumlah Orang Beragama Islam</a>
        </div>
    </div>

    <!-- Title Section -->
    <div class="title">
        <h1>Sumatera Selatan Berdasarkan Kejahatan</h1>
    </div>    <div id="map"></div>

     <!-- Make sure you put this AFTER Leaflet's CSS -->
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

     <script>
    var map = L.map('map').setView([-3.3194, 103.9144], 7);

    var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const sumsels = @json($sumsels);

    const sumselData = sumsels.map(sumsel => ({
        type: 'Feature',
        properties: {
            name: sumsel.name,
            id: sumsel.id,
            jumlah_kejahatan: Number(sumsel.jumlah_kejahatan),
        },
        geometry: {
            type: sumsel.type_polygon,
            coordinates: JSON.parse(sumsel.polygon)
        }
    }));

    const geojson = {
        type: 'FeatureCollection',
        features: sumselData
    };

    function getColor(d) {
        return d > 1000 ? '#3D1F00' : // Cokelat gelap
            d > 900 ? '#633200' : // Cokelat tua
            d > 800 ? '#804000' : // Cokelat medium
            d > 665 ? '#A65400' : // Cokelat lebih terang
            d > 350 ? '#CC6B00' : // Cokelat cerah
            d > 200  ? '#E6801A' : // Cokelat sangat cerah
            d > 100  ? '#FFB073' : // Cokelat muda
                        '#FFE6CC';  // Cokelat sangat terang
    }

    function style(feature) {
        return {
            fillColor: getColor(feature.properties.jumlah_kejahatan),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        };
    }

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.7
        });

        layer.bringToFront();
        info.update(layer.feature.properties);
    }

    function resetHighlight(e) {
        geojsonLayer.resetStyle(e.target);
        info.update();
    }

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

    const geojsonLayer = L.geoJson(geojson, { style: style, onEachFeature: onEachFeature }).addTo(map);

    var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };

    info.update = function (props) {
        this._div.innerHTML = '<h4>number of crimes on South Sumatra Province</h4>' + 
            (props ? 
                '<b>' + props.name + '</b><br />' + 
                (props.jumlah_kejahatan ? props.jumlah_kejahatan.toLocaleString('id-ID') : 'Data tidak tersedia') + ' orang' : 
                'Hover over a sumsel');
    };

    info.addTo(map);

    var legend = L.control({ position: 'bottomright' });

    legend.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 100, 200, 350, 665, 800, 900, 1000],
            labels = [];

        for (var i = 0; i < grades.length; i++) {
            div.innerHTML +=
                '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
        }

        return div;
    };

    legend.addTo(map);
</script>

</body>
</html>