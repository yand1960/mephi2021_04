<html>
  <head>
    <title>Demo</title>
    <meta charset="utf-8" />
    
  </head>
  <body>
    <h1>Первый взгляд на PHP</h1>
    
    <form>
      <select name="zone">
        <option value="Europe/Moscow">Moscow</option>
        <option value="America/New_York">New York</option>
        <option value="Asia/Tokyo">Tokyo</option>
      </select>  
      <button>Go!</button>
    </form>
    
    <?php
      
      $x = 2;
      $y = 3;
      $z = $x + $y;
      //echo("Result: $z");
      $selectOption = $_GET['zone'];
      date_default_timezone_set($selectOption);
      //date_default_timezone_set("America/Los_Angeles");
      //date_default_timezone_set("Asia/Hong_Kong");
      
      $now = date("H:i:s");
      //echo("<h2>Время открытия страницы: $now</h2>");
      $hour = date("H");
      if ($hour < 5)
        $greeting = "Доброй ночи!";
      
      if ($hour >= 5 and $hour < 12)
        $greeting = "Доброе утро!";
      
      if ($hour >= 12 and $hour < 18)
        $greeting = "Добрый день!";
        
      if ($hour >= 18)
        $greeting = "Добрый вечер!";
            
    ?>
    <h2>Время открытия страницы: <?=$now?>!</h2>
    <h1><?=$greeting?></h1>
  </body>
</html>