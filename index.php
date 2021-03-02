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

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
  <!-- selectric  -->
  <link rel="stylesheet" href="js/selectric/selectric.css" />

  <!-- glider  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css" />

  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
  <!-- FAVICON  -->
  <link rel="shortcut icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="css/img/favicon/favicon.ico" type="image/x-icon" />
  <!-- CLEAN URL AFTER REFRESHING  
  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
  </script> -->
  <title>Nutri.Logika</title>
  <meta name="google-site-verification" content="JICoP0ScAb6uhJL70Yx4q_4s9dK1VZ9T-7bgYBPHPqg" />
</head>

<body>
  <!-- =====================
            HEADER
    ======================= -->
  <header class="index-header">
    <div class="navbar__wrapper">
      <a href="#naslovna" class="navbar__logo"><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img" /></a>
      <nav class="navbar">
        <ul class="navbar__list">
          <li class="navbar__item">
            <a href="#naslovna" class="navbar__link"> Home</a>
          </li>
          <li class="navbar__item">
            <a href="#ponuda" class="navbar__link"> Ponuda</a>
          </li>
          <li class="navbar__item">
            <a href="#testimonials" class="navbar__link"> Rezultati</a>
          </li>
          <li class="navbar__item">
            <a href="#omeni" class="navbar__link"> O meni</a>
          </li>
          <li class="navbar__item">
            <a href="#prijava" class="navbar__link"> Prijavi se</a>
          </li>
          <li class="navbar__item">
            <a href="calculator.html" class="navbar__link"> Kalkulator</a>
          </li>
          <li class="navbar__item">
            <a href="blog.php" class="navbar__link"> Blog</a>
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
            NASLOVNA
    ======================= -->
  <section id="naslovna">
    <div class="naslovna__wrapper">
      <div class="hero">
        <div class="hero-desktop-img"></div>
        <div class="hero-title">
          <h4>Naučno zasnovane i u praksi dokazane informacije</h4>
          <h1>
            <span>O ishrani,</span> <span>treningu i</span>
            <span> zdravom </span> <br> <span>životu</span>
          </h1>
        </div>
      </div>
    </div>
  </section>

  <!-- =====================
            MAILING LISTA
    ======================= -->
  <section id="mailing-lista">
    <h2>Naručite pdf vodič kroz nutritivne profile namirnica!</h2>
    <!--ISPISIVANJE GRESKE ZA EMAIL PRIJAVU PRAZNO POLJE ZA PDF-->
    <div id="em_greska" class="error-message-visible">
      <?php
      $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      if (strpos($fullUrl, "em=0") == true) {
        $errors = "Email je neispravan";
        echo ('<p>' . $errors . '</p>');
      } elseif (strpos($fullUrl, "em=2") == true) {
        $errors = "DOSLO JE DO PROBLEMA SA SERVEROM POKUSAJTE PONOVO";
        echo ('<p>' . $errors . '</p>');
      }
      ?>
    </div>
    <!--ISPISIVANJE PORUKE AKO JE USPESNO POSLAT EMAIL ZA PDF -->
    <div id="em_greska" class="succes-message-visible">
      <?php
      $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      if (strpos($fullUrl, "em=1") == true) {
        $errors = "Uspešna prijava, hvala Vam!";
        echo ('<p>' . $errors . '</p>');
      }
      ?>
    </div>
    <form action="php/emailForm.php" id="mail-list-form" method="POST">
      <input type="text" id="mail-list-input" name="mailing-lista" placeholder="Vas e-mail">
      <label for="mail-list-input" class="hidden-label">Vas e-mail</label>
      <button class="dugme-login-admin" id="mail-list-form-btn" type="submit">Posaljite mi pdf!</button>
    </form>
  </section>

  <!-- =====================
                PONUDA
    ======================= -->
  <section id="ponuda">
    <div class="ponuda-wrapper">
      <div class="plan-ishrane">
        <div class="plan-kartica-overflow">
          <img src="css/img/plan-ishrane-tanjir500x333.png" alt="tanjir" />
        </div>
        <div class="plan-kartica-img">
          <img src="css/img/plan-ishrane3500x333.jpg" alt="hrana" />
        </div>
        <div class="plan-ishrane__info">
          <div class="plan-ishrane__title-wrapper">
            <h2>Plan Ishrane</h2>
          </div>
          <div class="plan-ishrane__tekst">
            <p>
              Sastavlja se na osnovu informacija o klijentu, a na osnovu
              naučno dokazanih činjenica i mog iskustva u radu. Funkcioniše
              tako što se svake nedelje vrši ocena prethodne nedelje i po
              potrebi menja nešto u planu, a ja sam uvek dostupan za pitanja i
              pomoć. <a class="procitaj-jos" href="pages/ishrana.html">Pročitaj više <i class="fas fa-angle-double-right"></i></a>
            </p>
          </div>

          <div class="dugme__prijavi-se">
            <a href="#prijava">
              <div class="plan-ishrane__ikonica">
                <img src="css/img/meso320x427.png" alt="nutrition" class="icon" />
              </div>
              Prijavi se
            </a>
          </div>
        </div>
      </div>

      <div class="plan-treninga">
        <div class="plan-kartica-overflow">
          <img src="css/img/teg500x333.png" alt="teg" />
        </div>
        <div class="plan-kartica-img">
          <img src="css/img/tegovi500x333.jpg" alt="trening" />
        </div>
        <div class="plan-treninga__info">
          <div class="plan-treninga__title-wrapper">
            <h2>Plan Treninga</h2>
          </div>
          <div class="plan-treninga__tekst">
            <p>
              Plan treninga predstavlja vaš jedinstven naučno zasnovan plan treniranja, koji se prilagođava spram vas i vašeg cilja, a
              na kraju svake nedelje je redovno kontrolisan i podleže redovnim manjim izmenama (nedeljno, dok su veće izmene na
              mesečnom nivou) kako bi konstatno gurao vaše telo ka boljem izgledu, performansima i osećaju.
              <a class="procitaj-jos" href="pages/trening.html">Pročitaj više <i class="fas fa-angle-double-right"></i></a>
            </p>
          </div>
          <div class="dugme__prijavi-se">
            <a href="#prijava">
              <div class="plan-treninga__ikonica">
                <img src="css/img/bucke320x333.png" alt="dumbbell" class="icon bucka" />
              </div>
              Prijavi se
            </a>
          </div>
        </div>
      </div>

      <div class="dual-plan">
        <div class="plan-kartica-overflow">
          <img src="css/img/puzla500x303.png" alt="puzla" />
        </div>
        <div class="plan-kartica-img">
          <img src="css/img/slagalica500x303.jpg" alt="hrana" />
        </div>
        <div class="dual-plan__info">
          <div class="dual-plan__title-wrapper">
            <h2>Plan Ishrane i Treninga</h2>
          </div>
          <div class="dual-plan__tekst">
            <p>
              Sastavlja se na osnovu informacija o klijentu, a na osnovu
              naučno dokazanih činjenica i mog iskustva u radu. Funkcioniše
              tako što se svake nedelje vrši ocena prethodne nedelje i po
              potrebi menja nešto u planu, a ja sam uvek dostupan za pitanja i
              pomoć. <a class="procitaj-jos" href="pages/trening-ishrana.html">Pročitaj više <i class="fas fa-angle-double-right"></i></a>
            </p>
          </div>
        </div>
        <div class="dugme__prijavi-se">
          <a href="#prijava">
            <div class="dual-plan__ikonica"></div>
            Prijavi se
          </a>
        </div>
      </div>
    </div>
  </section>


  <!-- =====================
            TESTIMONIALS
    ======================= -->

  <section id="testimonials">

    <div class="testimonials__wrapper">
      <h2>Testimonials & Transformations</h2>
      <div class="transformations-wrapper">
        <div class="transformations glider-transformations">
          <div class="slide-item"><img src="css/img/transformacije/1.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/2.jpg" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/4.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/5.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/6.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/7.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/8.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/9.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/10.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/11.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/12.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/13.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/14.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/15.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/16.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/17.png" alt="transformation"></div>
          <div class="slide-item"><img src="css/img/transformacije/18.png" alt="transformation"></div>
        </div>
        <div class="trans-slider-navigation">
          <div class="carousel__navigation-trans"></div>
          <button class="carousel__button-trans carousel__button--left-trans">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="carousel__button-trans carousel__button--right-trans">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>


      <div class="carousel">
        <ul class="carousel__slider glider">
          <li class="carousel__slide slide-item">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere
              error fuga accusamus fugiat eaque dolores.
            </p>
            <h4>Milojko Pantic</h4>
          </li>
          <li class="carousel__slide slide-item">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere
              error fuga accusamus fugiat eaque dolores.
            </p>
            <h4>Dalibor Vukanovic</h4>
          </li>
          <li class="carousel__slide slide-item">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere
              error fuga accusamus fugiat eaque dolores.
            </p>
            <h4>Rasa Pikic</h4>
          </li>
          <li class="carousel__slide slide-item">
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere
              error fuga accusamus fugiat eaque dolores.
            </p>
            <h4>Dragan Dzajic</h4>
          </li>
        </ul>
        <div class="carousel__navigation"></div>
        <button class="carousel__button carousel__button--left">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel__button carousel__button--right">
          <i class="fas fa-chevron-right"></i>
        </button>
      </div>
    </div>
  </section>

  <!-- =====================
              BLOG - INDEX
    ======================= -->
  <?php
  //// Read 3 last post from DB
  require_once('php/connection.php');

  $sql = "SELECT * FROM posts WHERE status = 1 ORDER BY id DESC 
              LIMIT 3"; ///// NUMBER OF NEWEST BLOGS
  $query = $conn->prepare($sql);
  $query->execute();
  $posts = $query->get_result()->fetch_all(MYSQLI_ASSOC);
  ?>
  <section id="blog-index">

    <div class="blog-index__wrapper">
      <div class="blog-index__main-title--wrapper">
        <div class="blog-index__main-title">
          <h2>Najnoviji blog postovi</h2>
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
              <p>
                <?php echo html_entity_decode(substr($post['body'], 0, 170) . '...'); ?>
              </p>
            </a>
          </div>
          <div class="blog-index__underline"></div>
        </div>
      <?php endforeach; ?>

      <div class="blog-index__button--wrapper">
        <button class="dugme-login-admin">
          <a href="blog.php">Pogledaj ceo blog</a>
        </button>
      </div>
    </div>
  </section>

  <!-- =====================
            O MENI
    ======================= -->
  <section id="omeni">
    <div class="omeni-wrapper">
      <div class="omeni-info">
        <div class="omeni-info__title">
          <h2>O Jovanu Cvetojeviću i Nutri Logici</h2>
        </div>
        <div class="grid-container">
          <div class="omeni-img">

            <img class="omeni-jovan" src="css/img/jovan-pola600.png" alt="jovan" class="jovan" />
          </div>
          <div class="omeni-info__content omeni-info-index">
            <p>
              U fitnes prvi put ulazim 2009., sa svojih 15 godina. Tada samo
              pratim savete ljudi iz teretane za ishranu i trening.
              Napredujem, ali bez ideje i znanja o tome šta se i zašto dešava.
              To me navodi da počnem da razmišljam o tome da li postoji nauka
              iza treninga i ishrane, jasne činjenice i principi koji se mogu
              organizovati sa planiranim ishodom, kao što je slučaj u mnogim
              drugim poljima života.
              <br>
              <br>
              2012. godine počinjem da se edukujem, čitam, testiram naspram
              saznanja do kojih dolazim i pravim velike rezultate. 2013.
              odlučujem da odustanem od puta ekonomiste i odlazim sa fakulteta
              u prvom semestru, nakon čega upisujem Višu medicinsku školu za
              nutricionistu. Tamo bivam razočaran obrazovnim sistemom, ali
              dopunjavam sopstvenu edukaciju kroz čitanje knjiga, gledanje
              seminara i podcasta relevantnih svetskih stručnjaka. Tokom
              studija počinjem da radim sa ljudima i pravim planove ishrane i
              treninga, sa dobrim uspesima. Diplomiram tri meseca pre roka, u
              junu 2017., nakon čega dobijam želju da edukujem i pokažem da je
              cela ova priča jednostavna.
              <br><br>
              Septembra iste godine, pravim Nutri Logiku, čiji je centralni
              cilj edukacija zasnovana na naučnim činjenicama i zdravom
              razumu. Preko nje, vremenom, dolazim u kontakt sa ljudima kojima
              je potrebna pomoć oko ishrane i treninga, I tako počinje moj
              online rad sa ljudima. Ova vrsta posla mi je pružila mogućnost
              da dotaknem veliki broj ljudi i direktno utičem na njihovo
              zdravlje, izgled, performanse i zadovoljstvo. Radio sam sa
              klijentima sa 3 kontinenta, svih polova i uzrasta, zdravim i
              onih koji imaju neko medicinsko stanje, profesionalcima i
              rekreativcima, trudnicama i zauzetim direktorima. Rezultat je
              uvek bio isti. Svako je saradnju završio zadovoljan.
            </p>
          </div>
          <div class="dugme-omeni__wrapper">
            <button class="dugme-login-admin dugme-omeni">
              <a href="omeni.html">Pročitaj više</a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =====================
              PRIJAVA
    ======================= -->

  <section id="prijava">
    <div class="prijava-title">
      <h2>Prijavi se</h2>
    </div>
    <div id="php_greska" class="succes-message-visible"></div>
    <div class="prijava__wrapper">
      <form action="php/form.php" class="form">
        <div class="polje">
          <label for="ime">Ime:</label>
          <div id="ime_greska" class="error-message-invisible">
            <p>Ime je obavezno</p>
          </div>
          <input type="text" id="ime" placeholder="Marko.." />
        </div>

        <div class="polje">
          <label for="prezime">Prezime:</label>
          <div id="prezime_greska" class="error-message-invisible">
            <p>Prezime je obavezno</p>
          </div>
          <input type="text" id="prezime" placeholder="Marković.." />
        </div>

        <div class="polje">
          <label for="email">E-mail:</label>
          <div id="email_greska" class="error-message-invisible">
            <p>Email nedostaje ili je neispravan</p>
          </div>
          <input type="email" id="email" placeholder="mare85@gma.." />
        </div>

        <div class="polje">
          <label for="godine">Godine:(od 16 do 70)</label>
          <div id="godine_greska" class="error-message-invisible">
            <p>Unesite svoje godine</p>
          </div>
          <input type="number" id="godine" min="15" max="70" placeholder="34.." />
        </div>

        <div class="polje">
          <label for="telefon">Telefon:</label>
          <div id="telefon_greska" class="error-message-invisible">
            <p>Broj Vaseg telefona je obavezan</p>
          </div>
          <input type="tel" id="telefon" placeholder="+38169111.." />
        </div>

        <div class="polje">
          <label for="pol">Pol:</label>
          <div class="error-message-invisible">
            <p></p>
          </div>
          <select type="text" name="pol" id="pol">
            <option value="muški" class="opcija">Muški</option>
            <option value="ženski" class="opcija">Ženski</option>
          </select>
        </div>

        <div class="polje">
          <label for="cilj">Koji cilj želiš da postigneš:</label>
          <select type="text" name="cilj" id="cilj">
            <option value="skidanje-kilaze" class="opcija">
              Cilj mi je da skinem kilažu
            </option>
            <option value="dobijanje-misicne-mase" class="opcija">
              Cilj mi je da dobijem na mišićnoj masi
            </option>
            <option value="zdrav-život" class="opcija">
              Cilj mi je da živim zdravije i održim svoju trenutnu kilažu
            </option>
          </select>
        </div>

        <div class="polje">
          <label for="plan">Odaberi plan koji želiš:</label>
          <select type="text" name="plan" id="odabir">
            <option value="ishrana" class="opcija">Plan ishrane</option>
            <option value="trening" class="opcija">Plan treninga</option>
            <option value="ishrana-i-trening" class="opcija">
              Plan ishrane i treninga
            </option>
          </select>
        </div>
      </form>
    </div>

    <div class="dugme__prijavi-se prijava">
      <a href="#prijava">
        <div class="dual-plan__ikonica"></div>
        Prijavi se
      </a>
    </div>
  </section>

  <!-- =====================
              FOOTER
    ======================= -->

  <footer>
    <section id="footer">
      <div class="footer-wrapper">
        <a href="#naslovna" class="navbar__logo"><img src="css/img/nutri.logika.png" alt="" class="navbar__logo__img" /></a>
        <div class="kontakt-container">
          <h3>Contact:</h3>
          <p>E-mail: <a href="">nutri.logika@gmail.com</a></p>
          <p>Telefon: <a href="tel:+381616145617">061/61-45-617</a></p>
        </div>

        <div class="footer-links__container">
          <h3>Quick links:</h3>
          <ul class="footer-links--list">
            <li class="footer__item">
              <a href="#naslovna" class="footer__link">Home</a>
            </li>
            <li class="footer__item">
              <a href="#ponuda" class="footer__link">Ponuda</a>
            </li>
            <li class="footer__item">
              <a href="#testimonials" class="footer__link">Rezultati</a>
            </li>
            <li class="footer__item">
              <a href="#omeni" class="footer__link">O meni</a>
            </li>
            <li class="footer__item">
              <a href="#prijava" class="footer__link">Prijavi se</a>
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

  <!-- ==========================
                GLIDER
    =========================== -->
  <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>

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