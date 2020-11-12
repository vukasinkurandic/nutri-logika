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
    <!-- <link rel="stylesheet" href="js/selectric/selectric.css" /> -->

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
    <?php require_once ('php/connection.php') ?>
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

   <!-- DELETE POST-->

   <?php if (isset($_GET['del_id'])) {

    $id=$_GET['del_id'];

    $sql="DELETE FROM posts WHERE id = '$id'";

    $query=$conn->prepare($sql);

    $query->execute();

    header("Location:blog-admin.php?delete=true"); } ?>
    <!-- =====================
            HEADER
    ======================= -->
    <header class="index-header relative-navbar">
      <div class="navbar__wrapper">
        <a href="#naslovna" class="navbar__logo"
          ><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img"
        /></a>
        <nav class="navbar">
          <ul class="navbar__list">
            <li class="navbar__item">
              <a href="index.php#naslovna" class="navbar__link"
                ><i class="fas fa-home"></i>&nbsp; Home</a
              >
            </li>
            <li class="navbar__item">
              <a href="#blog" class="navbar__link"
                ><i class="fas fa-book"></i>&nbsp; Blog</a
              >
            </li>
            <li class="navbar__item">
              <a href="dashboard.php" class="navbar__link"
                ><i class="fas fa-home"></i>&nbsp; Prijave</a
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
        MAIN - BLOG__PREGLED
    ======================= -->
    <main id="blog-dash__main">
      <div class="new-post__btn-wrapper">
        <a href="new-post.php" class="new-post__btn"
          >Novi blog post &nbsp;<i class="far fa-file-alt"></i> &nbsp;<i
            class="far fa-hand-point-left"
          ></i
        ></a>
      </div>
      <div class="blog-dash__title--wrapper">
        <div class="blog-dash__title">
          <h2>Blog Posts</h2>
        </div>
      </div>
      <?php ///// Success message add new post
      if (isset($_GET['success'])) { 
          echo ' <div id="php_greska" class="succes-message-visible">USPESNO DODAT POST</div> ';} 
      
          ///// Delete post message
          if (isset($_GET['delete'])) { 
            echo ' <div id="php_greska" class="succes-message-visible">USPESNO OBRISAN POST</div> ';}     
      ?>
      <?php 
      //// Read all post from DB
              $table='posts';
              $allPosts=selectAll($table);
      ?>
      <div class="blog-pregled__wrapper">
        <!--***************************-->
        <?php foreach ($allPosts as $key => $post): ?>
        <div class="blog-info-card">
          <div class="blog-card__title">
            <p class="blog-card__id"><?php echo ("#". ($key + 1)) ?></p>
            <a href="blog-single-post.php?id=<?php echo $post['id']?>">
            <h4><?php echo ($post['title']);?></h4></a
            >
          </div>
          <div class="blog-date">
            <p>Datum:</p>
            <p class="blog-date__p">
              <?php echo " ".  date('F j, Y',strtotime($post['created_at']));?>.
            </p>
          </div>
          <div class="blog-actions">
            
            <button class="blog__action-button delete">
              <a href="blog-admin.php?del_id=<?php echo $post['id'];?>"><i class="fas fa-trash"></i></a>
            </button>
            <button class="blog__button-image">
              <a href="#"><i class="fas fa-image"></i></a>
              <div class="blog-dash__image">
                <img
                  src="css/img/blog/<?php echo ($post['image']);?>"
                  alt="slika-iz-posta"
                />
              </div>
            </button>
          </div>
        </div>
        <?php endforeach; ?>
        
      </div>
    </main>

    <!-- =====================
              FOOTER
    ======================= -->

    <footer>
      <section id="footer">
        <div class="footer-wrapper">
          <a href="#naslovna" class="navbar__logo"
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
                  ><i class="fas fa-home"></i>&nbsp; Home</a
                >
              </li>
              <li class="footer__item">
                <a href="index.html#ponuda" class="footer__link"
                  ><i class="fas fa-dumbbell"></i>&nbsp; Ponuda</a
                >
              </li>
              <li class="footer__item">
                <a href="index.html#testimonials" class="footer__link"
                  ><i class="far fa-grin"></i>&nbsp; Rezultati</a
                >
              </li>
              <li class="footer__item">
                <a href="index.html#omeni" class="footer__link"
                  ><i class="far fa-thumbs-up"></i>&nbsp; O meni</a
                >
              </li>
              <li class="footer__item">
                <a href="index.html#prijava" class="footer__link"
                  ><i class="fas fa-pencil-alt"></i>&nbsp; Prijavi se</a
                >
              </li>
              <li class="footer__item">
                <a href="calculator.html" class="footer__link"
                  ><i class="fas fa-calculator"></i>&nbsp; Kalkulator</a
                >
              </li>
              <li class="footer__item">
                <a href="blog.html" class="footer__link"
                  ><i class="fas fa-book"></i>&nbsp; Blog</a
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

    <script src="js/dashboard.js"></script>

    <script src="js/custome.js"></script>
  </body>
</html>
