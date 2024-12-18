<link rel="stylesheet" href="../../assets/css/projects-overview.css">
<div class="container">
    <h2>Projecten Overzicht</h2>

    <div class="mb-3">
        <a href="/create-project" class="btn btn-primary">Nieuw Project Aanmaken</a>
    </div>

    <div class="row">
        <?php if (empty($urlData['projects'])): ?>
            <p>Geen projecten gevonden.</p>
        <?php else: ?>
            <?php foreach ($urlData['projects'] as $project): ?>
                <div class="col-md-4">
                    <a href="/project/<?php echo $project->getId(); ?>">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-image">
                                    <img src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png">
                                </div>
                                <h5 class="card-title"><?php echo htmlspecialchars($project->getProjectName()); ?></h5>
                                <div class="project-content">
                                    <div class="project-overview-detail">
                                        <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#005087" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                        </svg><?php echo htmlspecialchars($project->getProjectCity()); ?></p>
                                    </div>
                                    <div class="project-overview-detail">
                                        <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#005087" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
                                        <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
                                        </svg> <?php echo htmlspecialchars($project->getStatus()); ?></p>
                                    </div>
                                    <div class="project-overview-detail">
                                        <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#005087" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                        <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z"/>
                                        </svg><?php echo htmlspecialchars($project->getLeader()); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
