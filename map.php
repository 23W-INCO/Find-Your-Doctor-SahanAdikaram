<!-- map.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Doctor</title>
    <?php include("C:\\xampp\\htdocs\\dv\\include\\header.php"); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        html, body, #map {
            height: 100%;
            margin: 0;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        var map = L.map('map').setView([48.43251367950892, 12.939814781248442], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Fetch map data from Flask API
        fetch('http://127.0.0.1:5000/map-data')
            .then(response => response.json())
            .then(data => {
                console.log(data);

                // Process the data and add markers to the map
                data.forEach(marker => {
                    var popupContent = `<strong>${marker.popup}</strong><br><a href="${marker.link}" target="_blank">Visit Link</a>`;
                    L.marker([marker.lat, marker.lon]).bindPopup(popupContent).addTo(map);
                });
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>
</html>
