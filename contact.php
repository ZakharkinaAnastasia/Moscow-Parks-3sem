<!doctype html>
<html lang="en">

  <head>
  <title>MoscowParks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold">
                  <img src="images/logoMoscowParks.png" alt="Image" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="index.php" class="nav-link">Главная</a></li>
                  <li><a href="statistics.php" class="nav-link">Статистика</a></li>
                  <!-- <li><a href="trips.html" class="nav-link">Парки</a></li> -->
                  <li><a href="map.php" class="nav-link">Карта</a></li>
                  <li class="active"><a href="contact.php" class="nav-link">Обратная связь</a></li>
                  <li><a href="account.php" class="nav-link">Личный кабинет</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="site-section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-10">
            <div class="heading-39101 mb-5">
              <span class="backdrop text-center">Feedback</span>
              <!-- <span class="subtitle-39191">Свяжитесь с нами</span> -->
              <h3>Свяжитесь с нами</h3>
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="#" method="post">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <input type="text" name = "name" class="form-control" placeholder="Имя">
                </div>
                <div class="col-md-6">
                  <input type="text" name = "surname" class="form-control" placeholder="Фамилия">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" name = "email" class="form-control" placeholder="Email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <textarea name="message" id="" class="form-control" placeholder="Сообщение" cols="30" rows="10"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mr-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Отправить">
                </div>
              </div>
            </form>
            <?php
            $day_today = date("Y-m-d H:i:s"); //текущее время
            include "connection.php";
            if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['message'])){
                $query = "INSERT INTO feedback (name, surname, email, message, day, time) VALUES ('{$_POST['name']}', '{$_POST['surname']}', '{$_POST['email']}', '{$_POST['message']}', '{$day_today}', '{$day_today}')"; 
                $result = mysqli_query($link, $query);
            }
            ?>
          </div>
          <div class="col-lg-4 ml-auto">
            <div class="bg-white p-3 p-md-5">
              <h3 class="text-black mb-4">Контактная информация</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block mb-3">
                  <span class="d-block text-black">Адрес:</span>
                  <span>г. Москва, ул. Большая Семеновская, 38</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Телефон:</span><span>+7 (916) 077-51-80</span></li>
                <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span>moscowparks@gmail.com</span></li>
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </div> <!-- END .site-section -->

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">MoscowParks</h2>
              <p>Парки Москвы</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="@"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="@"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="@"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="https://t.me/nastzah"><span class="icon-telegram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <a href="#about_course_project"><h2 class="ftco-heading-2">О проекте</h2></a>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Главная</a></li>
                <li><a href="map.php"><span class="icon-long-arrow-right mr-2"></span>Перейти к карте</a></li>
                <li><a href="contact.php"><span class="icon-long-arrow-right mr-2"></span>Обратная связь</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Остались вопросы?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text" id = "MoscowRussia">Москва, Россия</span></li>
                  <!-- <li><span class="icon icon-phone"></span><span class="text"><p id="email_copy">+79160775180</p></span></li> -->
                  <li><span class="icon icon-envelope pr-4"></span><span class="text">nastzah03@inbox.ru</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <hr class="hr-line">
        <div class="row">
          <div class="col-md-12 text-center">
            <a href="https://data.mos.ru/opendata/1465?ysclid=lf4901gjqp118224706"> Источник открытых данных: Парковые территории </a>
            <p>Copyright &copy;Захаркина А.Д., <script>document.write(new Date().getFullYear());</script></p>
            <p><?php require "date.php" ?></p>
          </div>
        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

