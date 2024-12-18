<?php 
    $status = [
        'Afgerond' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#66ff66" class="bi bi-circle-fill mr-2" viewBox="0 0 16 16">
  <circle cx="8" cy="8" r="8"/>
</svg>',
        'In uitvoering' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff8000" class="bi bi-circle-fill mr-2" viewBox="0 0 16 16">
  <circle cx="8" cy="8" r="8"/>
</svg>',
        'On hold' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff0000" class="bi bi-circle-fill mr-2" viewBox="0 0 16 16">'
    ]
?> 

<link rel="stylesheet" href="../../assets/css/projects-detail.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<div class="container mt-5">
    <h3 class=" font-weight-bold"><?php echo htmlspecialchars($urlData['project']->getProjectName()); ?></h3>
    <div class="card shadow-lg p-4">
        <div class="row">
            <div class="col-lg-6 project-details border-right">
                <div class="mb-3">
                    <h5 class="text-secondary"><strong>Project Details</strong></h5>
                </div>
                <div class="project-address d-flex align-items-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#005087" class="bi bi-geo-alt-fill mr-2" viewBox="0 0 20 20">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                    </svg>
                    <span><?php echo htmlspecialchars($urlData['project']->getProjectAddress()); ?></span>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#005087" class="bi bi-person-fill mr-2" viewBox="0 0 20 20">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <span><?php echo htmlspecialchars($urlData['project']->getLeader()); ?></span>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#005087" class="bi bi-stopwatch-fill mr-2" viewBox="0 0 20 20">
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07A7.001 7.001 0 0 0 8 16a7 7 0 0 0 5.29-11.584l.013-.012.354-.354.353.354a.5.5 0 1 0 .707-.707l-1.414-1.415a.5.5 0 1 0-.707.707l.354.354-.354.354-.012.012A6.97 6.97 0 0 0 9 2.071V1h.5a.5.5 0 0 0 0-1zm2 5.6V9a.5.5 0 0 1-.5.5H4.5a.5.5 0 0 1 0-1h3V5.6a.5.5 0 1 1 1 0"/>
                    </svg>
                    <span><?php echo htmlspecialchars($urlData['project']->getSpentHours()); ?> / <?php echo htmlspecialchars($urlData['project']->getMaxHours()); ?></span>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <?php 
                    if ($urlData['project']->getStatus() == 'Afgerond') {
                        echo $status['Afgerond'];
                    } elseif ($urlData['project']->getStatus() == 'In uitvoering') {
                        echo $status['In uitvoering'];
                    } elseif ($urlData['project']->getStatus() == 'On hold') {
                        echo $status['On hold'];
                    }
                    echo htmlspecialchars($urlData['project']->getStatus());
                    ?>                   
                </div>
                <p><strong>Beschrijving:</strong> </p>
                <p><?php echo htmlspecialchars($urlData['project']->getDescription()); ?></p>
            </div>
            <div class="col-lg-6 project-map">
                <div id="map" style="height: 400px; border-radius: 8px;" class="mt-3 mt-lg-0"></div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <div class="row">
            <div class="col-lg-6 border-right project-documents">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h5 class="text-secondary"><strong>Documenten</strong></h5>
                    <ul class="list-group list-group-flush">
                        <li><a href="/">Document 1</a></li>
                        <li><a href="/">Document 1</a></li>
                        <li><a href="/">Document 1</a></li>
                    </ul>
                </li>
            </div>
            <div class="col-lg-6 project-management">
                <label for="projectName">Projectnaam</label>
                <input type="text" value="<?php echo htmlspecialchars($urlData['project']->getProjectName());?>">
                <label for="projectLeader">Projectleider</label>
                <input type="text" value="<?php echo htmlspecialchars($urlData['project']->getLeader());?>">
                <label for="Spent hours">Spent hours</label>
                <input type="text" value="<?php echo htmlspecialchars($urlData['project']->getSpentHours());?>">
                <label for="Max hours">Max hours</label>
                <input type="text" value="<?php echo htmlspecialchars($urlData['project']->getMaxHours());?>">
                <label for="Status">Status</label>
                <select name="status" id="status">
                        <option value="In uitvoering" selected>In uitvoering</option>
                        <option value="Afgerond">Afgerond</option>
                        <option value="On hold">On hold</option>
                </select>
                <label for="Description">Beschrijving</label>
                <textarea name="project-description"><?php echo htmlspecialchars($urlData['project']->getDescription());?></textarea>
                <input type="submit" class="btn btn-primary" value="Opslaan">
            </div>
        </div>
    </div>
</div>

<?php
$houseNumber = $urlData['project']->getProjectHouseNumber();
$city = $urlData['project']->getProjectCity();
$address = $urlData['project']->getProjectAddress(); 
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const address = "<?php echo $urlData['project']->getProjectAddress(); ?>";

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
                    console.error(error);
                });
        }
    });
</script>
