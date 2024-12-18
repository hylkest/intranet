<body>
<div class="container"> 
    <h1>Registreer</h1>
    <form method="post">
        <input type="hidden" name="action" value="update">
    </form>

    <form method="post">
        <input type="hidden" name="action" value="register">
        <input type="text" name="username" placeholder="Gebruikersnaam">
        <input type="password" name="password" placeholder="Wachtwoord">
        <input type="password" name="password-repeat" placeholder="Herhaal wachtwoord">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="role" placeholder="Functie">
        <input type="submit" class="btn btn-primary" value="Registreren">
    </form>
</div>
</body>