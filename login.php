<!DOCTYPE html>

<html lang="sr">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-8N2WRBFNYH"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-8N2WRBFNYH');
  </script>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <!-- css -->
  <link rel="stylesheet" href="css/style.css" />
<style>
    @font-face {
    font-family: 'Oswald';
    src: url('css/fonts/Oswald-SemiBold.woff2') format('woff2'),
        url('css/fonts/Oswald-SemiBold.woff') format('woff');
    font-weight: 600;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Oswald';
    src: url('css/fonts/Oswald-Bold.woff2') format('woff2'),
        url('css/fonts/Oswald-Bold.woff') format('woff');
    font-weight: bold;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Poppins';
    src: url('css/fonts/Poppins-Black.woff2') format('woff2'),
        url('css/fonts/Poppins-Black.woff') format('woff');
    font-weight: 900;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Poppins';
    src: url('css/fonts/Poppins-Regular.woff2') format('woff2'),
        url('css/fonts/Poppins-Regular.woff') format('woff');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
@font-face {
    font-family: 'Poppins';
    src: url('css/fonts/Poppins-SemiBold.woff2') format('woff2'),
        url('css/fonts/Poppins-SemiBold.woff') format('woff');
    font-weight: 600;
    font-style: normal;
    font-display: swap;
}
  </style>

  <!-- CLEAN URL AFTER REFRESHING  -->

  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
  </script>
  <title>Nutri.Logika</title>

</head>

<body>


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
        <div id="log_greska" class="error-message-visible">
          <?php
          $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          if (strpos($fullUrl, "login=successfully") == true) {
            $errors = "Uspešna Registracija";
            echo ('<p>' . $errors . '</p>');
          } elseif (strpos($fullUrl, "login=error1") == true) {

            $errors = "Unesite ispravni Email";
            echo ('<p>' . $errors . '</p>');
          } elseif (strpos($fullUrl, "login=error2") == true) {

            $errors = "Lozinka je obavezna";
            echo ('<p>' . $errors . '</p>');
          } elseif (strpos($fullUrl, "login=error3") == true) {

            $errors = "Email je neispravan";
            echo ('<p>' . $errors . '</p>');
          } elseif (strpos($fullUrl, "login=error4") == true) {

            $errors = "Netacna lozinka, pokusajte ponovo";
            echo ('<p>' . $errors . '</p>');
          } elseif (strpos($fullUrl, "login=error5") == true) {

            $errors = "Sesija je istekla, ulogujte se ponovo!";
            echo ('<p>' . $errors . '</p>');
          } elseif (strpos($fullUrl, "login=error6") == true) {

            $errors = "Niste ulogovani, pokusajte ponovo!";
            echo ('<p>' . $errors . '</p>');
          }
          ?>
        </div>



        <!-- 
        <div class="error-message-visible">
          <p><?php// echo ($errors) ?></p>
        </div>-->
      </form>
    </div>
  </section>
</body>

</html>