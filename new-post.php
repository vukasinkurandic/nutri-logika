<!DOCTYPE html>
<html lang="sr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:ital,wght@0,400;0,700;1,400&display=swap"
      rel="stylesheet"
    />

    <!-- inter -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap"
      rel="stylesheet"
    />

    <!-- selectric  -->
    <link rel="stylesheet" href="js/selectric/selectric.css" />

    <!-- FONT AWESOME -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
    <!-- FAVICON  -->
    <link
      rel="shortcut icon"
      href="css/img/favicon/favicon.ico"
      type="image/x-icon"
    />
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
    <!-- =====================
            HEADER
    ======================= -->
    <header class="index-header relative-navbar">
      <div class="navbar__wrapper">
        <a href="index.html#naslovna" class="navbar__logo"
          ><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img"
        /></a>
        <nav class="navbar">
          <ul class="navbar__list">
            <li class="navbar__item">
              <a href="index.html#naslovna" class="navbar__link"> Home</a>
            </li>
            <li class="navbar__item">
              <a href="blog-admin.php" class="navbar__link"> Blog</a>
            </li>
            <li class="navbar__item">
              <a href="dashboard.php" class="navbar__link"> Prijave</a>
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
    <!-- =====================
          NEW POST MAIN
    ======================= -->
    <main class="new-post__main">
      <div class="new-post__wrapper">
        <div class="new-post__title">
          <h2>Add New Post</h2>
        </div>
        
        <!--ISPISIVANJE GRESKE PRAZNO POLJE-->
        <div id="php_greska" class="error-message-visible">
          <?php 
          $fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($fullUrl,"create=prazno_polje")==true) {
                $errors="MORATE POPUNITI SVA POLJA";
                echo ('<p>'.$errors.'</p>'); }
                elseif (strpos($fullUrl,"create=image_error")==true){
                  $errors="SLIKA MORA BITI PNG,JPG,JPEG FORMATA I MANJA OD 1MB";
                  echo ('<p>'.$errors.'</p>');
                }
                elseif (strpos($fullUrl,"create=error")==true){
                  $errors="DOSLO JE DO PROBLEMA SA SERVEROM POKUSAJTE PONOVO";
                  echo ('<p>'.$errors.'</p>');
                } 
            ?>
  </div>
        <div class="new-post__form--wrapper">
          <form action="php/new-post-engine.php" class="new-post__form" method="post" enctype="multipart/form-data">
            <div class="polje">
              <label for="new-post__title">Naslov</label>
              
             <!-- <input
                type="text"
                name="new-post__title"
                id="new-post__title"
                placeholder="Naslov novog posta.."
              > -->
              <?php       
                    if (isset($_GET['title'])) {
                    $title=$_GET['title'];
                    echo '<input  name="new-post__title" id="new-post__title" value="'.$title.'">';
                    }else {
                    echo '<input placeholder="Naslov novog posta.." name="new-post__title" id="new-post__title">';
                    };
                ?>
            </div>
            <!-- *********************** -->
            <div class="polje">
              <label for="new-post__tekst">Tekst</label>
             <!-- <textarea
                name="new-post__tekst"
                id="new-post__tekst"
                cols="30"
                rows="10"
                placeholder="Tekst novog posta.."
              ></textarea>-->
              <?php       
                    if (isset($_GET['body'])) {
                    $body=$_GET['body'];
                    echo '<textarea cols="30"rows="10" name="new-post__tekst" id="post__tekst" >'.$body.'</textarea>';
                    }else {
                    echo '<textarea cols="30"rows="10"placeholder="Tekst novog posta.." name="new-post__tekst" id="post__tekst"></textarea>';
                    };
                ?>
            </div>
            <!-- *********************** -->
            <div class="polje">
              <label for="image">Slika</label>
              <input type="file" name="userfile" id="userfile">
            </div>
            <!-- *********************** -->
            <div class="polje">
              <select
                type="text"
                name="new-post__kategorija"
                id="new-post__kategorija"
              >
                <option value="Ishrana" name="Ishrana" class="opcija">Ishrana</option>
                <option value="Trening" name="Trening" class="opcija">Trening</option>
                <option value="Motivacija" name="Motivacija" class="opcija">Motivacija</option>
              </select>
            </div>
            <!-- *********************** -->
            <button type="submit" name="add-post-btn">Add New Post</button>
          </form>
          
        </div>
      </div>
    </main>
    <!-- =====================
              FOOTER
    ======================= -->
    <footer>
      <section id="footer">
        <div class="footer-wrapper">
          <a href="index.html#naslovna" class="navbar__logo"
            ><img
              src="css/img/nutri.logika.png"
              alt=""
              class="navbar__logo__img"
          /></a>
          <div class="kontakt-container">
            <p><span>E-mail:</span> nutri.logika@gmail.com</p>
            <p><span>Telefon:</span> 061/61-45-617</p>
          </div>

          <div class="footer-links__container">
            <ul class="footer-links--list">
              <li class="footer__item">
                <a href="index.html#naslovna" class="footer__link"
                  >Home</a
                >
              </li>
              <li class="footer__item">
                <a href="index.html#ponuda" class="footer__link"
                  >Ponuda</a
                >
              </li>
              <li class="footer__item">
                <a href="index.html#testimonials" class="footer__link"
                  >Rezultati</a
                >
              </li>
              <li class="footer__item">
                <a href="omeni.html" class="footer__link"
                  >O meni</a
                >
              </li>
              <li class="footer__item">
                <a href="index.html#prijava" class="footer__link"
                  >Prijavi se</a
                >
              </li>
              <li class="footer__item">
                <a href="calculator.html" class="footer__link"
                  >Kalkulator</a
                >
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
            <a href="https://www.flaticon.com/authors/freepik" title="Freepik"
              >Freepik</a
            >
            &
            <a
              href="https://www.flaticon.com/authors/roundicons"
              title="Roundicons"
              >Roundicons</a
            >
            from
            <a href="https://www.flaticon.com/" title="Flaticon"
              >www.flaticon.com</a
            >
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
    <script>
      $(function () {
        $("select").selectric();
      });
    </script>
    <!-- <script src="js/dashboard.js"></script> -->
    <script src="js/custome.js"></script>
  </body>
</html>
