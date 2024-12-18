<link rel="stylesheet" href="../../assets/css/login.css">
<body>
    <h1>Login</h1>
    <div class="login-container"> 
        <form method="post">
            <input type="hidden" name="action" value="login">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" class="btn btn-primary" value="Login">
            <p>Or register <a href="/register">here</a></p>
        </form>
    </div>
</body>