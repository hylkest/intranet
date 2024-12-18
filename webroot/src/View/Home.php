<body>
    <div class="container">

        <?php if (isset($_SESSION['username'])) { echo "<h1>Hey, " . $_SESSION['username'] . "</h1>";} ?>
        <div class="block-center mt-5">
            <div class="container text-center">
                <div class="activity-block">
                    <div class="row align-items-center">
                        <div class="col col-big">
                            <div class="card-big" style="display: flex; justify-content:space-between;">
                                <canvas id="statusChart"></canvas>

                                <canvas id="newchart"></canvas>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-big">
                                <div class="activity-title">
                                    <h4>Bijzonderheden</h4>
                                </div>
                                <div class="activity-content"> 
                                    <p><b>Vrije dag</b> - Hylke Storteboom</p>
                                    <p><b>Verjaardag</b> - Jeroen Koopmans</p>
                                    <p><b>Ziek</b> - Daniël Test</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="block-center">
            <div class="cards-overview">
                <div class="card-big">
                    <h1>€100,-</h1>
                    <p>Omzet deze maand</p>
                    <span class="badge text-bg-success">+15% t.o.v. vorige maand</span>
                </div>
                <div class="card-big">
                    <h1>24</h1>
                    <p>Werknemers totaal</p>
                    <span class="badge text-bg-secondary">0% t.o.v. vorige maand</span>
                </div>
                <div class="card-big">
                    <h1>15</h1>
                    <p>Offerte's verstuurd deze maand</p>
                    <span class="badge text-bg-danger">-4% t.o.v. vorige maand</span>
                </div>
                <div class="card-big">
                    <h1>35</h1>
                    <p>Offerte's verstuurd deze maand</p>
                    <span class="badge text-bg-success">+2% t.o.v. vorige maand</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Project naam</th>
                <th scope="col">Status</th>
                <th scope="col">Start datum</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>AI Content generator VVV Ameland</td>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#66ff66" class="bi bi-dot" viewBox="0 0 16 16">
  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
</svg>Done</td>
                    <td>10-10-2024</td>
                </tr>
                <tr>
                    <td>Nieuwe website bouwhekkennederland.nl</td>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#ff8000" class="bi bi-dot" viewBox="0 0 16 16">
  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
</svg>In uitvoering</td>
                    <td>10-10-2024</td>
                </tr>
                <tr>
                    <td colspan="1">Productfilter Motip.com</td>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#ff0000" class="bi bi-dot" viewBox="0 0 16 16">
  <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
</svg>On hold</td>
                    <td>10-10-2024</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="block-center">
        </div>
        <div class="cards-overview">
            <div class="card">
                <h2>
                    <a href="/nieuws">Nieuws</a>
                </h2>
            </div>
            <div class="card">
                <h2>
                    <a href="/livegang">Livegang</a>
                </h2>
            </div>
            <div class="card">
                <h2>
                    <a href="/transip">TransIP</a>
                </h2>
            </div>
            <div class="card">
                <h2>
                    <a href="/lighthouse">Pagespeed</a>
                </h2>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statusChart').getContext('2d');
    const ctx1 = document.getElementById('newchart').getContext('2d');

    const statusChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['In uitvoering', 'On hold'],
            datasets: [{
                label: 'Project Status',
                data: [
                    <?php echo json_encode($urlData['statusCounts']['In uitvoering']); ?>,
                    <?php echo json_encode($urlData['statusCounts']['On hold']); ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)' 
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        }
    });



    const newchart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Facturen verstuurd', 'Offerte\'s verstuurd'],
            datasets: [{
                label: 'Aantal',
                data: [
                    5,
                    16,
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)' 
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        }
    });
</script>