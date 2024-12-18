<head>
    <title>Hylke - Project</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<header class="d-flex justify-content-center py-3 navigation">
    <?php if(isset($_SESSION['user'])) {
            echo '
        <li class="nav-item dropdown nav-profile">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
            </a>
            <ul class="dropdown-menu">
                <li class="nav-item dropdown-link"><a class="nav-link" href="/profiel">Mijn profiel</a></li>
                <li class="nav-item dropdown-link"><a class="nav-link" href="/admin">Admin paneel</a></li>
                <li class="nav-item  dropdown-link"><a class="nav-link" href="/logout">Uitloggen</a></li>
            </ul>
          </li>
          '; } else {
            echo "<li class='nav-item'><a class='nav-link' href='/login'>Inloggen</a></li>";
          } ?>
    <ul class="nav nav-pills navigation">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Functies
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item dropdown-link"><a class="nav-link" href="/livegang">Loonstroken</a></li>
            <li class="nav-item dropdown-link"><a class="nav-link" href="/nieuws">Nieuws</a></li>
            <li class="nav-item dropdown-link"><a class="nav-link" href="/projects">Projecten</a></li>
            <li class="nav-item dropdown-link"><a class="nav-link" href="/werknemers">Werknemers</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="/">Nieuws</a></li>
    </ul>
</header>