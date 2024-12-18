document.addEventListener('DOMContentLoaded', function() {
    const address = "<?php echo $urlData['project']->getProjectAddress() ?>";

    geocodeAddress(address)
        .then(function(coords) {
            if (coords) {
                var map = L.map('map').setView([coords.lat, coords.lon], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                L.marker([coords.lat, coords.lon]).addTo(map)
                    .bindPopup('Project: <?php echo htmlspecialchars($urlData['project']->getProjectName()); ?>')
                    .openPopup();
            }
        });

    function geocodeAddress(address) {
        return fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address))
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    return {
                        lat: parseFloat(data[0].lat),
                        lon: parseFloat(data[0].lon)
                    };
                } else {
                    return null;
                }
            })
            .catch(error => {
                console.error('Error bij geocoderen:', error);
            });
    }
});