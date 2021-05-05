<!-- SEARCH -->
<?php /// SEARCH

if (isset($_POST['search-term']) && ($_POST['search-term']) !== "") {

  $search = strip_tags($_POST['search-term']);
  $naslov = `Rezultat pretrage <span>"'."$search". '"</span>`;
}
?>



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
  <!-- FAVICON  -->
  <link rel="shortcut icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />

  <title>Nutri.Logika</title>
</head>

<body>
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
            BLOG MAIN
    ======================= -->
  <main>
    <?php
    //// Read ALL post from DB
    require_once('php/connection.php');

    $sql = "SELECT * FROM posts WHERE status = 1 ORDER BY id DESC";
    $query = $conn->prepare($sql);
    $query->execute();
    $posts = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    ?>
    <div class="blog-index__wrapper">
      <div class="blog-index__main-title--wrapper">
        <div class="blog-index__main-title">
          <h1>Najnoviji <span>blog</span> postovi</h1>
        </div>
      </div>

      <?php foreach ($posts as $key => $post) : ?>
        <div class="blog-index__content">
          <ul class="blog-index__info--list">
            <li><span>Author:</span> Jovan Cvetojevic</li>
            <li><span>Date:</span> <?php echo " " .  date('F j, Y', strtotime($post['created_at'])); ?></li>
            <li><span>Category:</span> <?php echo $post['topic']; ?></li>
          </ul>
          <div class="blog-index__img-holder">
            <a href="blog-single-post.php?id=<?php echo $post['id'] ?>"><img src="css/img/blog/<?php echo ($post['image']); ?>" alt="" class="post-image"></a>
          </div>
          <div class="blog-index__content--text">
            <a href="blog-single-post.php?id=<?php echo $post['id']; ?>" class="single-blog__link">
              <div class="blog-index__title">
                <h4><?php echo $post['title']; ?></h4>
              </div>
              <?php echo substr($post['body'], 0, 200) . '...'; ?>
            </a>
          </div>
          <div class="blog-index__underline"></div>
        </div>
      <?php endforeach; ?>
      <!-- SEARCH <div class="blog-list__sidebar"> -->

      <?php
      $postTitle = "Najnoviji postovi";
      if (isset($_POST['search-term']) && ($_POST['search-term']) !== "") {

        $search = strip_tags($_POST['search-term']);
        $postTitle = 'Rezaltat pretrage po pojmu " ' . $search . '"';
        $searchPosts = searchPost($search);
        if ($searchPosts === []) {
          $postTitle = 'Nema Rezaltata pretrage po pojmu " ' . $search . '"';
        }
        $allPosts = $searchPosts;
      } else {
        //// Read all post from DB because there is not search 
        $table = 'posts';
        $allPosts = selectAll($table);
      }
      ///// END SEARCH

      ?>

      <div class="search-bar" id="search">
        <form action="blog.php#search" method="POST">
          <input type="text" name="search-term" placeholder="Pretraži...">
        </form>
        <div class="single-post__sidebar">
          <h2><?php echo $postTitle ?></h2>
          <ul>

            <?php foreach ($allPosts as $key => $post) : ?>
              <li class="sidebar-post">
                <div class="sidebar-post__title"> <a href="blog-single-post.php?id=<?php echo $post['id']; ?>"><?php echo ($post['title']); ?></a></div>
              </li>
            <?php endforeach; ?>
          </ul>

        </div>
      </div>
      <!-- </div> -->

      <!-- <div class="blog-index__button--wrapper">
              <button class="dugme-login-admin">
                <a href="blog.html">Pogledaj ceo blog</a>
              </button>
            </div> -->
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
        <h3>Contact:</h3>
          <p><span>E-mail:</span> nutri.logika@gmail.com</p>
          <p>Telefon: <a href="tel:+381616145617">061/61-45-617</a></p>
        </div>

        <div class="footer-links__container">
        <h3>Quick links:</h3>
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
              <a href="https://www.instagram.com/nutri.logika/"><img class="social-icon-img" src="css/img/flat-icons/instagram.svg" alt="instagram icon"></a>

            </li>
            <li class="social-icon">
              <a href="https://www.facebook.com/pages/category/Health-Beauty/Nutri-Logika-152013968719417/"><img class="social-icon-img" src="css/img/flat-icons/facebook.svg" alt="facebook icon"></a>

            </li>
            <li class="social-icon"><a href="https://twitter.com/JCvetojevic"><img class="social-icon-img" src="css/img/flat-icons/twitter.svg" alt="twiter icon"></a></li>
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


  <script src="js/custome.js"></script>
  <script src="js/form.js"></script>
</body>

</html>