<!DOCTYPE html>
<html lang="sr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- css -->
  <link rel="stylesheet" href="css/style.css" />

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap"
    rel="stylesheet" />

  <!-- inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap"
    rel="stylesheet" />

  <!-- selectric  -->
  <link rel="stylesheet" href="js/selectric/selectric.css" />

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
    integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
  <!-- FAVICON  -->
  <link rel="shortcut icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />

  <title>nutri.logika</title>
</head>

<body>
  <?php session_start(); ?>
  <!-- =====================================
           Stop direct request for dashboard
    ========================================= -->
  <?php if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:index.html?dashboard=false');
  exit;

} ?>
<!-- =====================================
          Stop if SESSION [id] is not set
    ========================================= -->
      <?php 
        if(!isset($_SESSION['start'])){
          header("Location:login.php?login=error6");
          exit;
        }
      ?>
<!-- =====================================
          DESTROY SESSION AFTER 120 min
    ========================================= -->
    <?php 
      if(isset($_SESSION["start"])){
      if(time()-$_SESSION["start"] >7200)   
      { 
    session_unset(); 
    session_destroy(); 
    header("Location:login.php?login=error5"); 
      }  
    };
  ?>
  <!-- =====================
            HEADER
    ======================= -->
  <header class="dashboard-header">
    <div class="navbar__wrapper">
      <a href="index.html" class="navbar__logo"><img src="css/img/nutri.logika.png" alt=""
          class="navbar__logo__img" /></a>
      <nav class="navbar">
        <ul class="navbar__list">
          <li class="navbar__item">
            <a href="index.html#naslovna" class="navbar__link"><i class="fas fa-home"></i>&nbsp; Home</a>
          </li>
          <li class="navbar__item">
            <a href="index.html#ponuda" class="navbar__link"><i class="fas fa-dumbbell"></i>&nbsp; Ponuda</a>
          </li>
          <li class="navbar__item">
            <a href="index.html#testimonials" class="navbar__link"><i class="far fa-grin"></i>&nbsp; Rezultati</a>
          </li>
          <li class="navbar__item">
            <a href="index.html#" class="navbar__link"><i class="far fa-thumbs-up"></i>&nbsp; O meni</a>
          </li>
        </ul>
      </nav>
      <button class="menu-toggle">
        <span class="hamburger"></span>
      </button>
    </div>
  </header>
  <main>
     <!-- =====================
    PHP konekcija i SELECT ALL
    ======================= -->
  <?php
    require_once ('php/connection.php');
    $sql="SELECT * FROM plans";
    $query=$conn->prepare($sql);
    $query->execute();
    $allPlans=$query->get_result()->fetch_all(MYSQLI_ASSOC);
?>

    <h1>Dobrodošli gospodaru!</h1>
    <div class="table-wrapper">
      <ul class="entry-list">

        <!-- PHP foreach petlja-->

      <?php foreach ($allPlans as $key => $plan): ?>
        <li class="person">
          <div class="person__info">
            <ul class="person__name">
              <li class="info-item"><span><?php echo ($key + 1);?></span></li>
              <li class="info-item"><span>Ime:</span> <?php echo ($plan['name']);?></li>
              <li class="info-item"><span>Prezime:</span> <?php echo ($plan['last_name']);?></li>
              <div class="open-close-button__wrapper" name="<?php echo ('btn-'.($key + 1));?>">
                <div class="open-close-button" ></div>
              </div>
            </ul>
            <ul class="ostalo-info" id="<?php echo ('btn-'.($key + 1));?>">
              <li class="info-item"><span>E-mail:</span> <?php echo ($plan['email']);?></li>
              <li class="info-item"><span>Godine:</span> <?php echo ($plan['age']);?></li>
              <li class="info-item"><span>Telefon:</span> <?php echo ($plan['phone']);?></li>
              <li class="info-item"><span>Pol:</span> <?php echo ($plan['sex']);?></li>
              <li class="info-item">
                <span>Cilj:</span> <?php echo ($plan['goal']);?>
              </li>
              <li class="info-item">
                <span>Odabir plana:</span> <?php echo ($plan['plan']);?>
              </li>
            </ul>
          </div>
        </li>
        <?php endforeach; ?> 
      </ul>
    </div>
  </main>
  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

  <!-- =====================
              FOOTER
    ======================= -->
  <footer>
    <section id="footer">
      <div class="footer-wrapper">
        <a href="#naslovna" class="navbar__logo"><img src="css/img/nutri.logika.png" alt=""
            class="navbar__logo__img" /></a>
        <div class="kontakt-container">
          <p><span>E-mail:</span> nutri.logika@gmail.com</p>
          <p><span>Telefon:</span> 061/61-45-617</p>
        </div>

        <div class="footer-links__container">
          <ul class="footer-links--list">
            <li class="footer__item">
              <a href="#naslovna" class="footer__link"><i class="fas fa-home"></i>&nbsp; Home</a>
            </li>
            <li class="footer__item">
              <a href="#ponuda" class="footer__link"><i class="fas fa-dumbbell"></i>&nbsp; Ponuda</a>
            </li>
            <li class="footer__item">
              <a href="#testimonials" class="footer__link"><i class="far fa-grin"></i>&nbsp; Rezultati</a>
            </li>
            <li class="footer__item">
              <a href="" class="footer__link"><i class="far fa-thumbs-up"></i>&nbsp; O meni</a>
            </li>
          </ul>
        </div>
        <div class="social">
          <ul class="social-icons">
            <li class="social-icon">
              <i class="fab fa-instagram fa-2x"></i>
            </li>
            <li class="social-icon">
              <i class="fab fa-facebook-f fa-2x"></i>
            </li>
            <li class="social-icon"><i class="fab fa-twitter fa-2x"></i></li>
            <li class="social-icon"><i class="fab fa-tiktok fa-2x"></i></li>
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

  <!-- ==========================
                  SELECTRIC
      =========================== -->
  <script src="js/selectric/jquery.selectric.min.js"></script>

  <!-- ==========================
              PARALLAX.JS 
      =========================== -->
  <script src="js/parallax.min.js"></script>
  <script src="js/dashboard.js"></script>
  
</body>

</html>