


<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!--Yandex maps API-->
        <script src="https://api-maps.yandex.ru/2.1/?apikey=<?=$apiMapKey;?>&lang=ru_RU" type="text/javascript"></script>
        <script type="text/javascript">
            ymaps.ready(init);
            function init(){
                var myMap = new ymaps.Map("map", {
                    center: [<?= $latitude ?>, <?= $longitude ?>],
                    zoom: 12
                });
                var placemark = new ymaps.Placemark([<?= $latitude ?>, <?= $longitude ?>],{
                    balloonContent: "This place...",
                    hintContent: "Ip is here..."
                })
                myMap.geoObjects.add(placemark);
                placemark.balloon.open();
            }
        </script>
        <title>Document</title>
    </head>
    <body style="background: beige">
        <div style="text-align: center">
            <h1> Results: </h1>
            <p>Country: <?= $country; ?></p>
            <p>Region: <?= $region; ?></p>
            <p>City: <?= $city; ?></p>
        </div>



        <div id="map" style="width: 600px; height: 400px; margin: 0 auto;">

        </div>

        <form method="post" action="index.php" style="margin: 30px; text-align: center">
            <input type="text" name="ip">
            <button type="submit"> Send </button>
        </form>
    </body>
</html>

