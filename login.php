<!DOCTYPE html>

<html lang="sr">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <!-- css -->
  <link rel="stylesheet" href="css/style.css" />

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />

  <!-- roboto -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet" />

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />

  <title>Nutri.Logika</title>

</head>

<body>
  <?php
  $errors = "";
  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if (strpos($fullUrl, "login=successfully") == true) {
    $errors = "Uspešna Registracija";
  } elseif (strpos($fullUrl, "login=error1") == true) {

    $errors = "Unesite ispravni Email";
  } elseif (strpos($fullUrl, "login=error2") == true) {

    $errors = "Lozinka je obavezna";
  } elseif (strpos($fullUrl, "login=error3") == true) {

    $errors = "Email je neispravan";
  } elseif (strpos($fullUrl, "login=error4") == true) {

    $errors = "Netacna lozinka, pokusajte ponovo";
  } elseif (strpos($fullUrl, "login=error5") == true) {

    $errors = "Sesija je istekla, ulogujte se ponovo!";
  } elseif (strpos($fullUrl, "login=error6") == true) {

    $errors = "Niste ulogovani, pokusajte ponovo!";
  }


  ?>
  <!-- =====================
            HEADER
    ======================= -->
  <header>
    <div class="navbar__wrapper relative-navbar">
      <a href="index.php" class="navbar__logo"><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img" /></a>
    </div>
  </header>

  <!-- =====================
              PRIJAVA
    ======================= -->

  <section class="admin-prijava">

    <div class="prijava__wrapper admin-prijava__wrapper">

      <form action="php/login-engine.php" class="form form-login" method="post">


        <div class="polje">
          <label for="email">E-mail:</label>
          <?php
          if (isset($_GET['email'])) {
            $email = $_GET['email'];
            echo ' <input type="email" name="email" class="text-input" value="' . $email . '">';
          } else {
            echo '<input type="email" name="email" class="text-input" placeholder="email">';
          };
          ?>
        </div>
        <div class="polje">
          <label for="password">Password:</label>
          <input type="password" name="password" placeholder="password.." />
        </div>

        <button class="dugme-login-admin" name="login-btn">Login</button>
        <div class="error-message-visible">
          <p><?php echo ($errors) ?></p>
      </form>
    </div>
  </section>
</body>

</html>