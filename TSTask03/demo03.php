<html>
  <head>
    <title>Demo</title>
    <meta charset="utf-8" />
    
  </head>
  <body>
    <h1>Первый взгляд на PHP</h1>
    <?php
      
      $x = 2;
      $y = 3;
      $z = $x + $y;
      //echo("Result: $z");
      
      date_default_timezone_set("Europe/Moscow");
      //date_default_timezone_set("America/Los_Angeles");
      //date_default_timezone_set("Asia/Hong_Kong");
      
      $now = date("H:i:s");
      //echo("<h2>Время открытия страницы: $now</h2>");
      
      // Дефолтное значение "на всякий случай"
      $picture = "base_image.jpg";
      
      $hour = date("H");
      if ($hour < 5) {
        $greeting = "Доброй ночи!";
        $picture = "дн.jpg";
      }
        
      
      if ($hour >= 5 and $hour < 12) {
        $greeting = "Доброе утро!";
        $picture = "ду.jpg";
      }
        
      
      if ($hour >= 12 and $hour < 18) {
        $greeting = "Добрый день!";
        $picture = "дд.jpg";
      }

        
      if ($hour >= 18) {
        $greeting = "Добрый вечер!";
        $picture = "дв.jpg";
      }
      
      // Отображение картинки c базовыми параметрами ширины и высоты
      $playfile = "/upload/".$picture;
      echo('<img src="<?php echo $playfile; ?>"  alt="day image" width="800" height="600">');
                    
    ?>
    <h2>Время открытия страницы: <?=$now?>!</h2>
    <h1><?=$greeting?></h1>
  </body>
</html>