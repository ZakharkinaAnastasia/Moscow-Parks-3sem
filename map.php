<!doctype html>
<html lang="en">

  <head>
    <title>Trips &mdash; Website Template by Colorlib</title>
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


    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=5376f6dd-fbce-4f0d-aac7-7d6e70e348c7" type="text/javascript"></script>
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
    <style>
      body,html {
      padding: 0;
      margin: 0;
      width: 100%;
      height: 100%;
    }
      #map {
      margin-top: 50px;
      width: 70%;
      height: 80%;
      margin-bottom: 60px;
      display: block;
      margin-left: auto;
      margin-right: 2%;
    }
    </style>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body>
        
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
                  <li class="active"><a href="index.html" class="nav-link">Главная</a></li>
                  <li><a href="statistics.php" class="nav-link">Статистика</a></li>
                  <li><a href="trips.html" class="nav-link">Парки</a></li>
                  <li><a href="map.php" class="nav-link">Карта</a></li>
                  <li><a href="contact.php" class="nav-link">Обратная связь</a></li>
                  <li><a href="account.php" class="nav-link">Личный кабинет</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        <!-- </div> -->

      </header> 
      <br><h3>Выберите округ</h3>
                <form method="POST" action="">
                    <?php include "option.php";
                    ?>
                </form>
    <div id="map"></div>
  <script type="text/javascript">   
<?php
    include "connection.php";
    $query_object = "SELECT park_name, adm_area, district, park_web_site, coord_width, coord_long FROM parks";
    $park_name = [];
    $adm_area = [];
    $district = [];
    $park_web_site = [];
    $coord_width = [];
    $coord_long = [];
    $sql_object = mysqli_query($link, $query_object);
    while ($res_object = mysqli_fetch_array($sql_object)) {
      $park_name[] = (string)$res_object["park_name"];
      $adm_area[] = (string)$res_object["adm_area"];
      $district[] = (string)$res_object["district"];
      $park_web_site[] = (string)$res_object["park_web_site"];
      $coord_width[] = (float)$res_object["coord_width"];
      $coord_long[] = (float)$res_object["coord_long"];
    }
    ?>
    var park_name = JSON.parse('<?= json_encode($park_name) ?>');
    var adm_area = JSON.parse('<?= json_encode($adm_area) ?>');
    var district = JSON.parse('<?= json_encode($district) ?>');
    var park_web_site = JSON.parse('<?= json_encode($park_web_site) ?>');
    var coord_width = JSON.parse('<?= json_encode($coord_width) ?>');
    var coord_long = JSON.parse('<?= json_encode($coord_long) ?>');

    // document.querySelector("#show_regions").onclick = function(){
    //alert("Вы нажали на кнопку");
    var koordinates_object = [],
      i, j;
    for (i = 0; i < 158; i++) {
      koordinates_object.push(i);
      koordinates_object[i] = [];
      for (j = 0; j < 1; j++) {
        koordinates_object[i].push(coord_width[i], coord_long[i]);
      }
    }

ymaps.ready(init);
//center: [55.76, 37.64],
function init() {
      // Создание карты.
      var myMap = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 9,
            // controls: ['zoomControl', 'searchControl', 'typeSelector',  'fullscreenControl', 'routeButtonControl']
            controls: ['zoomControl', 'typeSelector', 'fullscreenControl']

          }, //  {
          //     searchControlProvider: 'yandex#search'
          // }
        ),
        clusterer = new ymaps.Clusterer({
          preset: 'islands#invertedVioletClusterIcons',
          clusterHideIconOnBalloonOpen: false,
          geoObjectHideIconOnBalloonOpen: false
        });

        var myClusterer_object = new ymaps.Clusterer();
      for (var i = 0; i < koordinates_object.length; i++) {
        console.log(koordinates_object[i][0]);
        var koord_object = koordinates_object[i];
        console.log(koord_object);
        myPlacemark_object = new ymaps.Placemark([koordinates_object[i][0], koordinates_object[i][1]], {
              // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
              balloonContentHeader: park_name[i],
              balloonContentBody: [adm_area[i], '<br/>', district[i], '<br/>'].join(''),
              balloonContentFooter: park_web_site[i],
              //clusterCaption: "<strong><s>Еще</s> одна</strong>",
              hintContent: park_name[i]
            },
            // }, {
            //   preset: 'islands#redIcon'
            // }, 
            {
              // Опции.
              // Необходимо указать данный тип макета.
              iconLayout: 'default#image',
              // Своё изображение иконки метки.
              iconImageHref: 'images/map.png',
              // Размеры метки.
              iconImageSize: [30, 30],
              // Смещение левого верхнего угла иконки относительно
              // её "ножки" (точки привязки).
              iconImageOffset: [-5, -38]
            }),
          console.log(myPlacemark_object);
        myMap.geoObjects.add(myPlacemark_object);
        myClusterer_object.add(myPlacemark_object);
      };
      myMap.geoObjects.add(myClusterer_object);
    }
  </script>
  </body>