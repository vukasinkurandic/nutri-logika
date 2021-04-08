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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- css -->
  <link rel="stylesheet" href="css/style.css" />

  <!-- fonts -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" /> -->
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
  <!-- selectric  -->
  <link rel="stylesheet" href="js/selectric/selectric.css" />

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
  <!-- FAVICON  -->
  <link rel="shortcut icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />

  <title>Nutri.Logika</title>
</head>

<body>
  <!--Select one post -->
  <?php require_once("php/connection.php"); ?>
  <?php
  if (!isset($_GET['id'])) {
    header("Location:index.php");
  } else {
    $post_id = $_GET['id'];

    $sql = "SELECT * FROM posts  WHERE id= $post_id AND status = 1";
    $query = $conn->prepare($sql);
    $query->execute();
    $selectOne = $query->get_result()->fetch_assoc();
  }
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
            <a href="index.php#ponuda" class="navbar__link">Ponuda</a>
          </li>
          <li class="navbar__item">
            <a href="index.php#testimonials" class="navbar__link">Rezultati</a>
          </li>
          <li class="navbar__item">
            <a href="index.php#omeni" class="navbar__link">O meni</a>
          </li>
          <li class="navbar__item">
            <a href="index.php#prijava" class="navbar__link">Prijavi se</a>
          </li>
          <li class="navbar__item">
            <a href="calculator.html" class="navbar__link">Kalkulator</a>
          </li>
          <li class="navbar__item">
            <a href="blog.php" class="navbar__link">Blog</a>
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
        <img src="css/img/blog/<?php echo $selectOne['image'] ?>" alt="" class="single-post__img" />
        <div class="single-post__title">
          <h1><?php echo $selectOne['title'] ?>.</h1>
          <ul class="single-post__title--info">
            <li>• Author: Jovan Cvetojevic</li>
            <li>• Date: <?php echo " " .  date('F j, Y', strtotime($selectOne['created_at'])); ?></li>
            <li>• Category: <?php echo $selectOne['topic'] ?></li>
          </ul>
        </div>
      </div>
      <div class="single-post__underline"></div>
      <div class="single-post__content-wrapper">
        <div class="single-post__content">
          <p>
            <?php echo htmlspecialchars_decode($selectOne['body']) ?>
          </p>
        </div>

        <div class="single-post__sidebar">
          <h2>Najnoviji postovi</h2>
          <ul>
            <?php
            //// Read all post from DB
            $table = 'posts';
            $allPosts = selectAll($table)
            ?>
            <?php foreach ($allPosts as $key => $post) : ?>
              <li class="sidebar-post">
                <div class="sidebar-post__title"> <a href="blog-single-post.php?id=<?php echo $post['id']; ?>"><?php echo ($post['title']); ?></a></div>
              </li>
            <?php endforeach; ?>
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
        <a href="index.php#naslovna" class="navbar__logo"><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img" /></a>
        <div class="kontakt-container">
          <p><span>E-mail:</span> nutri.logika@gmail.com</p>
          <p>Telefon: <a href="tel:+381616145617">061/61-45-617</a></p>
        </div>

        <div class="footer-links__container">
          <ul class="footer-links--list">
            <li class="footer__item">
              <a href="index.php#naslovna" class="footer__link"> Home</a>
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
              <a href="blog.php" class="footer__link"> Blog</a>
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
    $(function() {
      $("select").selectric();
    });
  </script>
  <script src="js/custome.js"></script>
  <script src="js/form.js"></script>
</body>

</html>