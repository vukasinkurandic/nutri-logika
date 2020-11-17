<!DOCTYPE html>
<html lang="sr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- selectric  -->
    <link rel="stylesheet" href="js/selectric/selectric.css" />

    <!-- glider  -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css"
    />

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
    <!--Select one post -->
          <?php require_once ("php/connection.php"); ?>
          <?php 
          if(!isset($_GET['id'])){
           header("Location:index.php");
          }else{
              $post_id=$_GET['id'];

                $sql="SELECT * FROM posts  WHERE id=$post_id";
                $query=$conn->prepare($sql);
                $query->execute();           
                $selectOne=$query->get_result()->fetch_assoc();  
    
          } 
          ?>

    <!-- =====================
            HEADER
    ======================= -->
    <header class="index-header relative-navbar">
      <div class="navbar__wrapper">
        <a href="index.php#naslovna" class="navbar__logo"
          ><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img"
        /></a>
        <nav class="navbar">
          <ul class="navbar__list">
            <li class="navbar__item">
              <a href="index.php#naslovna" class="navbar__link"
                >Home</a
              >
            </li>
            <li class="navbar__item">
              <a href="index.php#ponuda" class="navbar__link"
                >Ponuda</a
              >
            </li>
            <li class="navbar__item">
              <a href="index.php#testimonials" class="navbar__link"
                >Rezultati</a
              >
            </li>
            <li class="navbar__item">
              <a href="index.php#omeni" class="navbar__link"
                >O meni</a
              >
            </li>
            <li class="navbar__item">
              <a href="index.php#prijava" class="navbar__link"
                >Prijavi se</a
              >
            </li>
            <li class="navbar__item">
              <a href="calculator.html" class="navbar__link"
                >Kalkulator</a
              >
            </li>
            <li class="navbar__item">
              <a href="blog.php" class="navbar__link"
                >Blog</a
              >
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
            SINGLE POST
    ======================= -->
    <main>
      <div class="single-post__wrapper">
        <div class="single-post__img--wrapper">
          <img
            src="css/img/blog/<?php echo $selectOne['image'] ?>"
            alt=""
            class="single-post__img"
          />
          <div class="single-post__title">
            <h2><?php echo $selectOne['title'] ?>.</h2>
            <ul class="single-post__title--info">
              <li>• Author: Jovan Cvetojevic</li>
              <li>• Date: <?php echo " ".  date('F j, Y',strtotime($selectOne['created_at']));?></li>
              <li>• Category: <?php echo $selectOne['topic'] ?></li>
            </ul>
          </div>
        </div>
        <div class="single-post__underline"></div>
        <div class="single-post__content-wrapper">
          <div class="single-post__content">
            <p>
            <?php echo $selectOne['body'] ?>
            </p>
          </div>
          <div class="single-post__sidebar">
              <input class="search-bar" type="text" placeholder="Search...">
              <h2>Recent posts:</h2>
              <ul>
                <li class="sidebar-post">
                    <div class="sidebar-post__title"> <a href="#">Lorem ipsum dolor sit.</a></div>
                    <!-- <div class="single-post__underline"></div> -->
                </li>
                <li class="sidebar-post">
                    <div class="sidebar-post__title"> <a href="#">Lorem, ipsum dolor.</a></div>
                    <!-- <div class="single-post__underline"></div> -->
                  
                </li>
                <li class="sidebar-post">
                  
                    <div class="sidebar-post__title"> <a href="#">Lorem, ipsum.</a></div>
                    <!-- <div class="single-post__underline"></div> -->
                  
                </li>
              </ul>
          </div>
        </div>
      </div>
    </main>

    <!-- =====================
              FOOTER
    ======================= -->

    <footer>
      <section id="footer">
        <div class="footer-wrapper">
          <a href="index.php#naslovna" class="navbar__logo"
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
                <a href="index.php#naslovna" class="footer__link"
                  > Home</a
                >
              </li>
              <li class="footer__item">
                <a href="index.php#ponuda" class="footer__link"
                  >Ponuda</a
                >
              </li>
              <li class="footer__item">
                <a href="index.php#testimonials" class="footer__link"
                  >Rezultati</a
                >
              </li>
              <li class="footer__item">
                <a href="index.php#omeni" class="footer__link"
                  >O meni</a
                >
              </li>
              <li class="footer__item">
                <a href="index.php#prijava" class="footer__link"
                  >Prijavi se</a
                >
              </li>
              <li class="footer__item">
                <a href="calculator.html" class="footer__link"
                  >Kalkulator</a
                >
              </li>
              <li class="footer__item">
                <a href="blog.php" class="footer__link"
                  > Blog</a
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
                  GLIDER
      =========================== -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>

    <!-- ==========================
                  SELECTRIC
      =========================== -->
    <script src="js/selectric/jquery.selectric.min.js"></script>
    <script>
      $(function () {
        $("select").selectric();
      });
    </script>
    <script src="js/custome.js"></script>
    <script src="js/form.js"></script>
  </body>
</html>
