<link rel="stylesheet" href="../../assets/css/projects-create.css">
<div class="container">
    <h2>Nieuw Project Aanmaken</h2>
    <form action="/create-project" method="POST" enctype="multipart/form-data">
        <div class="row align-items-start">
            <div class="col">
                <div class="mb-3">
                    <label for="project_name" class="form-label">Projectnaam</label>
                    <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Projectnaam" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="client" class="form-label">Klant</label>
                    <input type="text" class="form-control" id="client" name="client" placeholder="Klant" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="max_hours" class="form-label">Maximaal aantal uren</label>
                    <input type="number" class="form-control" id="max_hours" name="max_hours" placeholder="Maximaal aantal uren" required>
                </div>
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col">
                <div class="mb-3">
                    <label for="address_street" class="form-label">Straatnaam</label>
                    <input type="text" class="form-control" id="address_street" name="project_street" placeholder="Straatnaam" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="address_housenumber" class="form-label">Huisnummer</label>
                    <input type="text" class="form-control" id="address_housenumber" name="project_housenumber" placeholder="Huisnummer" required>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="address_city" class="form-label">Stad</label>
                    <input type="text" class="form-control" id="address_city" name="project_city" placeholder="Stad/Dorp" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Beschrijving</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Beschrijving van het project" required></textarea>
        </div>
        <div class="mb-3">
            <label for="project_leader" class="form-label">Projectleider</label>
            <input type="text" class="form-control" id="project_leader" name="project_leader" placeholder="Projectleider" required>
        </div>
        <div class="row align-items-start">
            <div class="col">
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status">
                        <option value="In uitvoering" selected>In uitvoering</option>
                        <option value="Afgerond">Afgerond</option>
                        <option value="On hold">On hold</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="project_fase" class="form-label">Projectfase</label>
                    <select name="Projectfase" id="Projectfase">
                        <option value="concept" selected>Concept</option>
                        <option value="ontwerp">Ontwerp</option>
                        <option value="uitvoering">Uitvoering</option>
                        <option value="afronding">Afrondend</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="project_fase" class="form-label">Prioriteit</label>
                    <select name="priority" id="priority">
                        <option value="Lage prioriteit">Lage prioriteit</option>
                        <option value="Normale prioriteit" selected>Normale prioriteit</option>
                        <option value="Hoge prioriteit">Hoge prioriteit</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
        </div>
        <button type="submit" class="btn btn-primary">Aanmaken</button>
    </form>
</div>
