<html lang="en">

<script>
    function validateForm() {
      var form = document.forms["regForm"];
      var email = form.elements["email"].value.trim();
      var username = form.elements["username"].value.trim();
      var password = form.elements["password"].value.trim();
  
      if (!validateEmail(email) || username.length == 0 || password.length == 0) {
        return false;
      }
  
    }
    function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }

    function validateField( str , type) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        switch (type) {
          case "email":
          document.getElementById("emailError").innerHTML = this.responseText;
          break;
          case "username":
          document.getElementById("usernameError").innerHTML = this.responseText;
          break;
        }

      }
    };

    xhttp.open("GET", "validimi.php?" + type + "=" + str, true);
    xhttp.send();
  }

</script>
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
        </nav>
    
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
        </div>
    </header>

    <main>
    <img src="8B0000.jpg" alt="" srcset="">

    <form name="regForm" action="miresevini.php" class="login-form"
    method="post" onsubmit="return validateForm()" autocomplete="on">
        <h3>Sign Up</h3>
        <input type="email" placeholder="your email" class="box" name="email" onfocusout="validateField(this.value , this.name)" >
        <span class="error" id="emailError" required></span>
        <input type="text" placeholder="your username" class="box" name="username" onfocusout="validateField(this.value , this.name)">
        <span class="error" id="usernameError" required></span>
        <input type="password" placeholder="your password" class="box" name="password" required>
        <p>
        <input type="checkbox" name="checkbox" required> I agree to the Terms of Service
        </p> 
        <p>already have an account? <a href="login.php">sign in</p></a>   
        <input type="submit" value="Submit" class="btn"><a href="">
        
        </form>
    </main>

    <p id="error"></p>

        <script src="script.js"></script>
</body>
</html>