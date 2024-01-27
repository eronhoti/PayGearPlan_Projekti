<html lang="en">

<script>
    function validateLoginForm() {
        var form = document.forms["loginForm"];
        var username = form.elements["username"].value.trim();
        var password = form.elements["password"].value.trim();

        if (username.length == 0 || password.length == 0) {
            return false;
        }
    }
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="login-style.css">
</head>

<body>
    <header class="header">

        <a href="#" class="logo"> <i class=""></i> PayGearPlan </a>

        <nav class="navbar">
            <a href="index.html">home</a>
            <a href="index.html">features</a>
            <a href="index.html">categories</a>
            <a href="devs.php">devs</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
        </div>
    </header>

    <main>
        <img src="8B0000.jpg" alt="" srcset="">

        <form name="loginForm" action="validimiLogin.php" class="login-form" method="post" onsubmit="return validateLoginForm()"
            autocomplete="on">
            <h3>Login</h3>
            <input type="text" placeholder="your username" class="box" name="username">
            <input type="password" placeholder="your password" class="box" name="password" required>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            <input type="submit" value="Login" class="btn">
        </form>
    </main>

    <p id="error"></p>

    <script src="script.js"></script>
</body>

</html>
