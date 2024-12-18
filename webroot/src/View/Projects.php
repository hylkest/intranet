<div class="container">
    <h2>Projecten Overzicht</h2>

    <div class="mb-3">
        <a href="/create-project" class="btn btn-primary">Nieuw Project Aanmaken</a>
    </div>

    <div class="row">
        <?php foreach ($projects as $project): ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($project['project_name']); ?></h5>
                    <p class="card-text">Adres: <?php echo htmlspecialchars($project['project_address']); ?></p>
                    <p class="card-text">Max Uren: <?php echo htmlspecialchars($project['max_hours']); ?></p>
                    <p class="card-text">Status: <?php echo htmlspecialchars($project['status']); ?></p>
                    <a href="/project/<?php echo $project['id']; ?>" class="btn btn-info">Details</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
