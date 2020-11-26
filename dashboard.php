<!DOCTYPE html>
<html lang="sr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- css -->
  <link rel="stylesheet" href="css/style.css" />

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />

  <!-- inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet" />

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
  <!-- FAVICON  -->
  <link rel="shortcut icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />
  <!-- CLEAN URL AFTER REFRESHING  -->
  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
  </script>
  <title>Nutri.Logika</title>
</head>

<body>
  <?php session_start(); ?>
  <!-- =====================================
           Stop direct request for dashboard
    ========================================= -->
  <?php if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location:index.php?dashboard=false');
    exit;
  } ?>
  <!-- =====================================
          Stop if SESSION [id] is not set
    ========================================= -->
  <?php
  if (!isset($_SESSION['start'])) {
    header("Location:login.php?login=error6");
    exit;
  }
  ?>
  <!-- =====================================
          DESTROY SESSION AFTER 120 min
    ========================================= -->
  <?php
  if (isset($_SESSION["start"])) {
    if (time() - $_SESSION["start"] > 7200) {
      session_unset();
      session_destroy();
      header("Location:login.php?login=error5");
    }
  };
  ?>
  <!-- =====================
            HEADER
    ======================= -->
  <header class="index-header relative-navbar">
    <div class="navbar__wrapper">
      <a href="index.php#naslovna" class="navbar__logo"><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img" /></a>
      <nav class="navbar">
        <ul class="navbar__list">
          <li class="navbar__item">
            <a href="index.php#naslovna" class="navbar__link">Home</a>
          </li>
          <li class="navbar__item">
            <a href="blog-admin.php" class="navbar__link">Blog</a>
          </li>
          <li class="navbar__item">
            <a href="dashboard.php" class="navbar__link">Prijave</a>
          </li>
          <li class="navbar__item">
            <a href="emailList.php" class="navbar__link">Email</a>
          </li>
        </ul>
      </nav>
      <button class="menu-toggle">
        <span class="hamburger"></span>
      </button>
    </div>
    <!-- <div class="switchers-wrapper">
        <button class="language-switcher-sr">
          SR <img src="css/img/flat-icons/serbia.png" alt="ser" />
        </button>
        <button class="language-switcher-en">
          <img src="css/img/flat-icons/united-kingdom.png" alt="eng" />EN
        </button>
      </div> -->
  </header>
  <div id="php_greska" class="succes-message-visible">

    <?php
    ////ISPISIVANJE DELETE SUCCES
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullUrl, "delete=true") == true) {
      $errors = "Uspesno izbrisan plan";
      echo ('<p>' . $errors . '</p>');
    }
    ?>
  </div>
  <main class="dashboard-content">
    <!-- =====================
    PHP konekcija i DELETE
    ======================= -->

    <?php require_once('php/connection.php') ?>

    <!-- UPDATE POST-->

    <?php if (isset($_GET['del_id'])) {

      $id = $_GET['del_id'];
      $sql = "UPDATE plans SET status = 0 WHERE id = '$id'";
      $query = $conn->prepare($sql);
      $query->execute();
      header("Location:dashboard.php?delete=true");
    } ?>
    <!-- =====================
     SELECT ALL
    ======================= -->
    <?php
    $sql = "SELECT * FROM plans WHERE status = 1";
    $query = $conn->prepare($sql);
    $query->execute();
    $allPlans = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    ?>
    <div class="dashboard-title__wrapper">
      <h1>Spisak prijavljenih za plan treninga i ishrane</h1>
    </div>

    <div class="table-wrapper">
      <ul class="entry-list">

        <!-- PHP foreach petlja-->

        <?php foreach ($allPlans as $key => $plan) : ?>
          <li class="person">
            <div class="person__info">
              <ul class="person__name">
                <li class="info-item"><span><?php echo ($key + 1); ?>.</span></li>
                <li class="info-item"><span>Ime:</span> <?php echo ($plan['name']); ?></li>
                <li class="info-item"><span>Prezime:</span> <?php echo ($plan['last_name']); ?></li>
                <div class="open-close-button__wrapper" name="<?php echo ('btn-' . ($key + 1)); ?>">
                  <div class="open-close-button"></div>
                </div>
              </ul>
              <ul class="ostalo-info" id="<?php echo ('btn-' . ($key + 1)); ?>">
                <li class="info-item"><span>E-mail:</span> <?php echo ($plan['email']); ?></li>
                <li class="info-item"><span>Godine:</span> <?php echo ($plan['age']); ?></li>
                <li class="info-item"><span>Telefon:</span> <?php echo ($plan['phone']); ?></li>
                <li class="info-item"><span>Pol:</span> <?php echo ($plan['sex']); ?></li>
                <li class="info-item">
                  <span>Cilj:</span> <?php echo ($plan['goal']); ?>
                </li>
                <li class="info-item">
                  <span>Odabir plana:</span> <?php echo ($plan['plan']); ?>
                </li>
                <li><button class="delete-button"><a href="dashboard.php?del_id=<?php echo $plan['id']; ?>">Obrisi prijavu - <i class="fas fa-trash"></i></a></button></li>
              </ul>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </main>

  <!-- =====================
              FOOTER
    ======================= -->

  <footer>
    <section id="footer">
      <div class="footer-wrapper">
        <a href="index.php#naslovna" class="navbar__logo"><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img" /></a>
        <div class="kontakt-container">
          <p><span>E-mail:</span> nutri.logika@gmail.com</p>
          <p><span>Telefon:</span> 061/61-45-617</p>
        </div>

        <div class="footer-links__container">
          <ul class="footer-links--list">
            <li class="footer__item">
              <a href="index.php#naslovna" class="footer__link">Home</a>
            </li>
            <li class="footer__item">
              <a href="index.php#ponuda" class="footer__link">Ponuda</a>
            </li>
            <li class="footer__item">
              <a href="index.php#testimonials" class="footer__link">Rezultati</a>
            </li>
            <li class="footer__item">
              <a href="index.php#omeni" class="footer__link">O meni</a>
            </li>
            <li class="footer__item">
              <a href="index.php#prijava" class="footer__link">Prijavi se</a>
            </li>
            <li class="footer__item">
              <a href="calculator.html" class="footer__link">Kalkulator</a>
            </li>
            <li class="footer__item">
              <a href="blog.php" class="footer__link">Blog</a>
            </li>
          </ul>
        </div>
        <div class="social">
          <ul class="social-icons">
            <li class="social-icon">
              <a href="https://www.instagram.com/nutri.logika/"><i class="fab fa-instagram fa-2x"></i></a>

            </li>
            <li class="social-icon">
              <a href="https://www.facebook.com/pages/category/Health-Beauty/Nutri-Logika-152013968719417/"><i class="fab fa-facebook-f fa-2x"></i></a>

            </li>
            <li class="social-icon"><a href="https://twitter.com/JCvetojevic"><i class="fab fa-twitter fa-2x"></i></a></li>
          </ul>
        </div>
      </div>
    </section>
    <!-- zastava -->
    <div class="copyrights">
      <p class="copyright__text">Copyright &copy; VuleDule 2020 Serbia</p>
      <div class="mentions">
        <p>
          Icons made by
          <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a>
          &
          <a href="https://www.flaticon.com/authors/roundicons" title="Roundicons">Roundicons</a>
          from
          <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- ==========================
                  JQUERY
      =========================== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/dashboard.js"></script>


</body>

</html>