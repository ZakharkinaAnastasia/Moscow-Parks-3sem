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
        margin-top: -350px;
        width: 70%;
        height: 80%;
        margin-bottom: 60px;
        display: block;
        margin-left: auto;
        margin-right: 2%;
      }
      #submit_check {
        background: transparent;
        border: none !important;
        font-size:0;
      }
      .row{
        margin-top: 20px;
        margin-left: 1%;
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
                  <li><a href="index.php" class="nav-link">Главная</a></li>
                  <li><a href="statistics.php" class="nav-link">Статистика</a></li>
                  <!-- <li><a href="trips.html" class="nav-link">Парки</a></li> -->
                  <li class="active"><a href="map.php" class="nav-link">Карта</a></li>
                  <li><a href="contact.php" class="nav-link">Обратная связь</a></li>
                  <li><a href="account.php" class="nav-link">Личный кабинет</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        <!-- </div> -->

      </header> 
      <!-- <br><h3>Выберите округ</h3>
                <form method="POST" action="">
                    <--?php include "option.php";
                    ?>
                </form> -->
                <div class="row">
          <div class="col-lg-8 mb-5" >
            <form action="#" method="get" id="checksbox_water">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                <p><input type="checkbox" name="check_water" id="check_water" value="yes" onchange="document.getElementById('checksboxes').submit()">Парки с водоемами</p>
                </div>
              </div>
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" name="submit" id="submit_check" value="Отправить">
            </form>
            <form action="#" method="get" id="checksbox_play">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                <p><input type="checkbox" name="check_play" id="check_play" value="yes" onchange="document.getElementById('checksboxes').submit()">Парки с детскими площадками</p>
                </div>
              </div>
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" name="submit" id="submit_check" value="Отправить">
            </form>
            <form action="#" method="get" id="checksbox_sport">
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                <p><input type="checkbox" name="check_sport" id="check_sport" value="yes" onchange="document.getElementById('checksboxes').submit()">Парки со спортивными площадками</p>
                </div>
              </div>
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" name="submit" id="submit_check" value="Отправить">
            </form>
          </div>
    </div>

    <div id="map"></div>
  <script type="text/javascript">   
  <?php
    include "connection.php";
    // require "choose_form.php";
    //для парков с водоемами
    // if(isset($_POST['check_water'])) {
      $query_water = "SELECT park_name, adm_area, district, park_web_site, coord_width, coord_long FROM parks WHERE has_water='да'";
      // echo "$num_rows Rows\n";
      $park_name_water = [];
      $adm_area_water = [];
      $district_water = [];
      $park_web_site_water = [];
      $coord_width_water = [];
      $coord_long_water = [];
      $sql_water = mysqli_query($link, $query_water);
      while ($res_object = mysqli_fetch_array($sql_water)) {
          $park_name_water[] = (string)$res_object["park_name"];
          $adm_area_water[] = (string)$res_object["adm_area"];
          $district_water[] = (string)$res_object["district"];
          $park_web_site_water[] = (string)$res_object["park_web_site"];
          $coord_width_water[] = (float)$res_object["coord_width"];
          $coord_long_water[] = (float)$res_object["coord_long"];
      }
      // echo "$coord_long_water[3]";
    // }
    // else {
    //   echo "checkbox isn't pushed";
    // }


    //для парков с детскими площадками
    // if(isset($_POST['check_play'])) {
      $query_play = "SELECT park_name, adm_area, district, park_web_site, coord_width, coord_long FROM parks WHERE has_playground='да'";
      $park_name_play = [];
      $adm_area_play = [];
      $district_play = [];
      $park_web_site_play = [];
      $coord_width_play = [];
      $coord_long_play = [];
      $sql_play = mysqli_query($link, $query_play);
      while ($res_object = mysqli_fetch_array($sql_play)) {
          $park_name_play[] = (string)$res_object["park_name"];
          $adm_area_play[] = (string)$res_object["adm_area"];
          $district_play[] = (string)$res_object["district"];
          $park_web_site_play[] = (string)$res_object["park_web_site"];
          $coord_width_play[] = (float)$res_object["coord_width"];
          $coord_long_play[] = (float)$res_object["coord_long"];
      }
      // echo "$park_name_play";
      // echo "$coord_long_play";
    // }


    //для парков со спортивными площадками
    // if(isset($_POST['check_sport'])) {
      $query_sport = "SELECT park_name, adm_area, district, park_web_site, coord_width, coord_long FROM parks WHERE has_sportground='да'";
      $park_name_sport = [];
      $adm_area_sport = [];
      $district_sport = [];
      $park_web_site_sport = [];
      $coord_width_sport = [];
      $coord_long_sport = [];
      $sql_sport = mysqli_query($link, $query_sport);
      while ($res_object = mysqli_fetch_array($sql_sport)) {
          $park_name_sport[] = (string)$res_object["park_name"];
          $adm_area_sport[] = (string)$res_object["adm_area"];
          $district_sport[] = (string)$res_object["district"];
          $park_web_site_sport[] = (string)$res_object["park_web_site"];
          $coord_width_sport[] = (float)$res_object["coord_width"];
          $coord_long_sport[] = (float)$res_object["coord_long"];
      }
      // echo "$coord_long_play";
    // }




    //все парки
    // $query_object = "SELECT park_name, adm_area, district, park_web_site, coord_width, coord_long FROM parks";
    // $park_name = [];
    // $adm_area = [];
    // $district = [];
    // $park_web_site = [];
    // $coord_width = [];
    // $coord_long = [];
    // $sql_object = mysqli_query($link, $query_object);
    // while ($res_object = mysqli_fetch_array($sql_object)) {
    //   $park_name[] = (string)$res_object["park_name"];
    //   $adm_area[] = (string)$res_object["adm_area"];
    //   $district[] = (string)$res_object["district"];
    //   $park_web_site[] = (string)$res_object["park_web_site"];
    //   $coord_width[] = (float)$res_object["coord_width"];
    //   $coord_long[] = (float)$res_object["coord_long"];
    // }
    ?>

    //для парков с водоемами
    var park_name_water = JSON.parse('<?= json_encode($park_name_water) ?>');
    var adm_area_water = JSON.parse('<?= json_encode($adm_area_water) ?>');
    var district_water = JSON.parse('<?= json_encode($district_water) ?>');
    var park_web_site_water = JSON.parse('<?= json_encode($park_web_site_water) ?>');
    var coord_width_water = JSON.parse('<?= json_encode($coord_width_water) ?>');
    var coord_long_water = JSON.parse('<?= json_encode($coord_long_water) ?>');
    // alert("водоемы")
    // alert(park_name_water);
    // alert(park_name_water.length)

    var koordinates_water = [], i, j;
    for (i = 0; i < park_name_water.length; i++) {
        koordinates_water.push(i);
        koordinates_water[i] = [];
        for (j = 0; j < 1; j++) {
            koordinates_water[i].push(coord_width_water[i], coord_long_water[i]);
        }
    }
    

    //для парков с детскими площадками
    var park_name_play = JSON.parse('<?= json_encode($park_name_play) ?>');
    var adm_area_play = JSON.parse('<?= json_encode($adm_area_play) ?>');
    var district_play = JSON.parse('<?= json_encode($district_play) ?>');
    var park_web_site_play = JSON.parse('<?= json_encode($park_web_site_play) ?>');
    var coord_width_play = JSON.parse('<?= json_encode($coord_width_play) ?>');
    var coord_long_play = JSON.parse('<?= json_encode($coord_long_play) ?>');
    // alert("play")
    // alert(park_name_play);
    // alert(park_name_play.length)

    var koordinates_play = [], i, j;
    for (i = 0; i < park_name_play.length; i++) {
        koordinates_play.push(i);
        koordinates_play[i] = [];
        for (j = 0; j < 1; j++) {
            koordinates_play[i].push(coord_width_play[i], coord_long_play[i]);
        }
    }
    

    //для парков со спортивными площадками
    var park_name_sport = JSON.parse('<?= json_encode($park_name_sport) ?>');
    var adm_area_sport = JSON.parse('<?= json_encode($adm_area_sport) ?>');
    var district_sport = JSON.parse('<?= json_encode($district_sport) ?>');
    var park_web_site_sport = JSON.parse('<?= json_encode($park_web_site_sport) ?>');
    var coord_width_sport = JSON.parse('<?= json_encode($coord_width_sport) ?>');
    var coord_long_sport = JSON.parse('<?= json_encode($coord_long_sport) ?>');
    // alert("sport")
    // alert(park_name_sport);
    // alert(park_name_sport.length)

    var koordinates_sport = [], i, j;
    for (i = 0; i < park_name_sport.length; i++) {
        koordinates_sport.push(i);
        koordinates_sport[i] = [];
        for (j = 0; j < 1; j++) {
            koordinates_sport[i].push(coord_width_sport[i], coord_long_sport[i]);
        }
    }
              

    //все парки
    // var park_name = JSON.parse('<--?= json_encode($park_name) ?>');
    // var adm_area = JSON.parse('<--?= json_encode($adm_area) ?>');
    // var district = JSON.parse('<--?= json_encode($district) ?>');
    // var park_web_site = JSON.parse('<--?= json_encode($park_web_site) ?>');
    // var coord_width = JSON.parse('<--?= json_encode($coord_width) ?>');
    // var coord_long = JSON.parse('<--?= json_encode($coord_long) ?>');

    // var koordinates_object = [],
    //   i, j;
    // for (i = 0; i < 158; i++) {
    //   koordinates_object.push(i);
    //   koordinates_object[i] = [];
    //   for (j = 0; j < 1; j++) {
    //     koordinates_object[i].push(coord_width[i], coord_long[i]);
    //   }
    // }


ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
            center: [55.76, 37.64],
            zoom: 10,
            controls: ['zoomControl', 'searchControl', 'typeSelector', 'fullscreenControl']
        }, {
            searchControlProvider: 'yandex#search'
        }),
        objectManager = new ymaps.ObjectManager({
            // Чтобы метки начали кластеризоваться, выставляем опцию.
            clusterize: true,
            // ObjectManager принимает те же опции, что и кластеризатор.
            gridSize: 64,
            // Макет метки кластера pieChart.
            clusterIconLayout: "default#pieChart"
        });
    myMap.geoObjects.add(objectManager);

    

        //все парки
    // var myClusterer_object = new ymaps.Clusterer();
    //   for (var i = 0; i < koordinates_object.length; i++) {
    //     console.log(koordinates_object[i][0]);
    //     var koord_object = koordinates_object[i];
    //     console.log(koord_object);
    //     myPlacemark_object = new ymaps.Placemark([koordinates_object[i][0], koordinates_object[i][1]], {
    //           // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
    //           balloonContentHeader: park_name[i],
    //           balloonContentBody: [adm_area[i], '<br/>', district[i], '<br/>'].join(''),
    //           balloonContentFooter: park_web_site[i],
    //           //clusterCaption: "<strong><s>Еще</s> одна</strong>",
    //           hintContent: park_name[i]
    //         },
    //         // }, {
    //         //   preset: 'islands#redIcon'
    //         // }, 
    //         {
    //           // Опции.
    //           // Необходимо указать данный тип макета.
    //           iconLayout: 'default#image',
    //           // Своё изображение иконки метки.
    //           iconImageHref: 'images/map2.png',
    //           // Размеры метки.
    //           iconImageSize: [30, 30],
    //           // Смещение левого верхнего угла иконки относительно
    //           // её "ножки" (точки привязки).
    //           iconImageOffset: [-5, -38]
    //         }),
    //       console.log(myPlacemark_object);
    //     myMap.geoObjects.add(myPlacemark_object);
    //     myClusterer_object.add(myPlacemark_object);
    //   };
    //   myMap.geoObjects.add(myClusterer_object);
    




const checkbox_water = document.getElementById('check_water');
checkbox_water.addEventListener('change', e => {
  if(e.target.checked === true) {
    console.log("Checkbox is checked - boolean value: ", e.target.checked)
    var myClusterer_water = new ymaps.Clusterer();
      for (var i = 0; i < koordinates_water.length; i++) {
        console.log(koordinates_water[i][0]);
        var koord_water = koordinates_water[i];
        console.log(koord_water);
        myPlacemark_water = new ymaps.Placemark([koordinates_water[i][0], koordinates_water[i][1]], {
              // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
              balloonContentHeader: park_name_water[i],
              balloonContentBody: [adm_area_water[i], '<br/>', district_water[i], '<br/>'].join(''),
              balloonContentFooter: park_web_site_water[i],
              //clusterCaption: "<strong><s>Еще</s> одна</strong>",
              hintContent: park_name_water[i]
            },
            // }, {
            //   preset: 'islands#redIcon'
            // }, 
            {
              // Опции.
              // Необходимо указать данный тип макета.
              iconLayout: 'default#image',
              // Своё изображение иконки метки.
              iconImageHref: 'images/map2.png',
              // Размеры метки.
              iconImageSize: [30, 30],
              // Смещение левого верхнего угла иконки относительно
              // её "ножки" (точки привязки).
              iconImageOffset: [-5, -38]
            }),
          console.log(myPlacemark_water);
        myMap.geoObjects.add(myPlacemark_water);
        myClusterer_water.add(myPlacemark_water);
      };
      myMap.geoObjects.add(myClusterer_water);
    
  // });
}
else if(e.target.checked === false) {
    console.log("Checkbox is not checked - boolean value: ", e.target.checked);
  
  if (!myMap) {
            myMap = new ymaps.Map('map', {
              center: [55.76, 37.64],
              zoom: 10,
              controls: ['zoomControl', 'searchControl', 'typeSelector', 'fullscreenControl']
                
            }, {
                searchControlProvider: 'yandex#search'
            });
            objectManager = new ymaps.ObjectManager({
        // Чтобы метки начали кластеризоваться, выставляем опцию.
        clusterize: true,
        // ObjectManager принимает те же опции, что и кластеризатор.
        gridSize: 64,
        // Макет метки кластера pieChart.
        clusterIconLayout: "default#pieChart"
    });
    myMap.geoObjects.add(objectManager);  

            }
            else {
                myMap.destroy();// Деструктор карты
                myMap = null;
            }
          }
    });


    const checkbox_play = document.getElementById('check_play');
    checkbox_play.addEventListener('change', e => {
  if(e.target.checked === true) {
    console.log("Checkbox is checked - boolean value: ", e.target.checked)
    var myClusterer_play = new ymaps.Clusterer();
      for (var i = 0; i < koordinates_play.length; i++) {
        console.log(koordinates_play[i][0]);
        var koord_play = koordinates_play[i];
        console.log(koord_play);
        myPlacemark_play = new ymaps.Placemark([koordinates_play[i][0], koordinates_play[i][1]], {
              // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
              balloonContentHeader: park_name_play[i],
              balloonContentBody: [adm_area_play[i], '<br/>', district_play[i], '<br/>'].join(''),
              balloonContentFooter: park_web_site_play[i],
              //clusterCaption: "<strong><s>Еще</s> одна</strong>",
              hintContent: park_name_play[i]
            },
            // }, {
            //   preset: 'islands#redIcon'
            // }, 
            {
              // Опции.
              // Необходимо указать данный тип макета.
              iconLayout: 'default#image',
              // Своё изображение иконки метки.
              iconImageHref: 'images/map2.png',
              // Размеры метки.
              iconImageSize: [30, 30],
              // Смещение левого верхнего угла иконки относительно
              // её "ножки" (точки привязки).
              iconImageOffset: [-5, -38]
            }),
          console.log(myPlacemark_play);
        myMap.geoObjects.add(myPlacemark_play);
        myClusterer_play.add(myPlacemark_play);
      };
      myMap.geoObjects.add(myClusterer_play);
    
  // });
}
else if(e.target.checked === false) {
    console.log("Checkbox is not checked - boolean value: ", e.target.checked)
  
  if (!myMap) {
            myMap = new ymaps.Map('map', {
              center: [55.76, 37.64],
              zoom: 10,
              controls: ['zoomControl', 'searchControl', 'typeSelector', 'fullscreenControl']
                
            }, {
                searchControlProvider: 'yandex#search'
            });
            objectManager = new ymaps.ObjectManager({
        // Чтобы метки начали кластеризоваться, выставляем опцию.
        clusterize: true,
        // ObjectManager принимает те же опции, что и кластеризатор.
        gridSize: 64,
        // Макет метки кластера pieChart.
        clusterIconLayout: "default#pieChart"
    });
    myMap.geoObjects.add(objectManager);    
            }
            else {
                myMap.destroy();// Деструктор карты
                myMap = null;
            }
          }
    });



const checkbox_sport = document.getElementById('check_sport');
    checkbox_sport.addEventListener('change', e => {
  if(e.target.checked === true) {
    console.log("Checkbox is checked - boolean value: ", e.target.checked)
    var myClusterer_sport = new ymaps.Clusterer();
      for (var i = 0; i < koordinates_sport.length; i++) {
        console.log(koordinates_sport[i][0]);
        var koord_sport = koordinates_sport[i];
        console.log(koord_sport);
        myPlacemark_sport = new ymaps.Placemark([koordinates_sport[i][0], koordinates_sport[i][1]], {
              // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
              balloonContentHeader: park_name_sport[i],
              balloonContentBody: [adm_area_sport[i], '<br/>', district_sport[i], '<br/>'].join(''),
              balloonContentFooter: park_web_site_sport[i],
              //clusterCaption: "<strong><s>Еще</s> одна</strong>",
              hintContent: park_name_sport[i]
            },
            // }, {
            //   preset: 'islands#redIcon'
            // }, 
            {
              // Опции.
              // Необходимо указать данный тип макета.
              iconLayout: 'default#image',
              // Своё изображение иконки метки.
              iconImageHref: 'images/map2.png',
              // Размеры метки.
              iconImageSize: [30, 30],
              // Смещение левого верхнего угла иконки относительно
              // её "ножки" (точки привязки).
              iconImageOffset: [-5, -38]
            }),
          console.log(myPlacemark_sport);
        myMap.geoObjects.add(myPlacemark_sport);
        myClusterer_sport.add(myPlacemark_sport);
      };
      myMap.geoObjects.add(myClusterer_sport);
    
  // });
}
else if(e.target.checked === false) {
    console.log("Checkbox is not checked - boolean value: ", e.target.checked)
  
  if (!myMap) {
            myMap = new ymaps.Map('map', {
              center: [55.76, 37.64],
              zoom: 10,
              controls: ['zoomControl', 'searchControl', 'typeSelector', 'fullscreenControl']
                
            }, {
                searchControlProvider: 'yandex#search'
            });
            objectManager = new ymaps.ObjectManager({
        // Чтобы метки начали кластеризоваться, выставляем опцию.
        clusterize: true,
        // ObjectManager принимает те же опции, что и кластеризатор.
        gridSize: 64,
        // Макет метки кластера pieChart.
        clusterIconLayout: "default#pieChart"
    });
    myMap.geoObjects.add(objectManager);    
            }
            else {
                myMap.destroy();// Деструктор карты
                myMap = null;
            }
          }
    });



// // Создадим 3 пункта выпадающего списка.
// var listBoxItems = ['С водоемами', 'С детскими площадками', 'Со спортивными площадками']
//             .map(function (title) {
//                 return new ymaps.control.ListBoxItem({
//                     data: {
//                         content: title
//                     },
//                     state: {
//                         selected: true
//                     }
//                 })
//             }),
//         reducer = function (filters, filter) {
//             filters[filter.data.get('content')] = filter.isSelected();
//             return filters;
//         },
//         // Теперь создадим список, содержащий 5 пунктов.
//         listBoxControl = new ymaps.control.ListBox({
//             data: {
//                 content: 'Фильтр',
//                 title: 'Фильтр'
//             },
//             items: listBoxItems,
//             state: {
//                 // Признак, развернут ли список.
//                 expanded: true,
//                 filters: listBoxItems.reduce(reducer, {})
//             }
//         });
//     myMap.controls.add(listBoxControl);

//     // Добавим отслеживание изменения признака, выбран ли пункт списка.
//     listBoxControl.events.add(['select', 'deselect'], function (e) {
//         var listBoxItem = e.get('target');
//         var filters = ymaps.util.extend({}, listBoxControl.state.get('filters'));
//         filters[listBoxItem.data.get('content')] = listBoxItem.isSelected();
//         listBoxControl.state.set('filters', filters);
//     });

//     var filterMonitor = new ymaps.Monitor(listBoxControl.state);
//     filterMonitor.add('filters', function (filters) {
//         // Применим фильтр.
//         objectManager.setFilter(getFilterFunction(filters));
//     });

//     function getFilterFunction(categories) {
//         return function (obj) {
//             var content = obj.properties.balloonContent;
//             return categories[content]
//         }
//     }





    
//         $.ajax({
//             url: "data.json"
//         }).done(function (data) {
//             objectManager.add(data);
//         });










// buttons
    //   var loadControl = new ymaps.control.Button({
    //         data: { content: 'Парки с водоемами' },
    //         options: { maxWidth: 200, float: 'right', selectOnClick: false }
    //     });
    // myMap.controls.add(loadControl);
    
    // loadControl.events.add('click', function () {
    //     if (ymaps.Placemark) {
    //         // Если модуль уже был загружен, то нет необходимости повторно обращаться к модульной системе.
    //         addPlacemark();
    //     } else {
    //         // Загружаем по требованию класс метки и оверлея метки. 
    //         // По умолчанию оверлей автоматически загружается после добавления метки на карту. 
    //         // В данном примере происходит асинхронная загрузка самого модуля метки и нет необходимости в отдельной подгрузке оверлея.
    //         ymaps.modules.require(['Placemark', 'overlay.Placemark'])
    //             .spread(function (Placemark, PlacemarkOverlay) {
    //                 // Добавляем в глобальную область видимости класс вручную, 
    //                 // так как при использовании метода require модульной системы этого не происходит.
    //                 ymaps.Placemark = Placemark;
    //                 addPlacemark();
    //             });
    //     }
    // });
    
    // function addPlacemark() {
    //     // var center = myMap.getCenter();
    //     // // Устанавливаем случайную позицию, близкую к центру карты.
    //     // center[0] += (Math.random() * 2) - 1;
    //     // center[1] += (Math.random() * 2) - 1;
    //     // var placemark = new ymaps.Placemark(center);
    //     // myMap.geoObjects.add(placemark);

    //     alert("button is pushed")
    // }
    }
  </script>
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
  </body>
</html>