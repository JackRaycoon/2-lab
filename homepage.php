<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BIG Preview</title>
  <link rel="icon" href="images/icon32.png" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <header class="container-fluid text-white py-2"style="background-color: #601b31;">
    <div class="container">
      <div class="d-flex align-items-center">
        <a href="homepage.php" style="text-decoration: none; color: inherit;" class="d-inline-flex align-items-center">
          <img src="images/icon.png" alt="Логотип" width="60" height="60" class="mr-2">
          <h1>BIG Preview</h1>
        </a>
      </div>
    </div>
  </header>

  <nav class="container-fluid py-2" style="margin-top:5px; background-color: #3e3e3e;">
    <div class="container">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active" style="background-color: #601b31;"  href="homepage.php">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Актёры</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Аниме</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Анонсы</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Мультфильмы</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Премьеры</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Рецензии</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Сериалы</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Трейлеры</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Фильмы</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-3">
    <div class="row">

      <div class="col-md-8">
        <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli("localhost", "root", "", "news");

        $DB = $mysqli->query("SELECT DATABASE()");
        $ROW = $DB->fetch_row();

        $sel = "SELECT * FROM new ORDER BY DATE DESC";
        if($res = $mysqli->query($sel))
        {
          $index = 1;
          foreach($res as $ROW)
          {
            $id = $ROW["ID"];
            if($index % 5 == 1 || $index % 5 == 3)
            {
            $title = $ROW["Title"];
            $desc = $ROW["Description"];
            $date = $ROW["Date"];
            $tags = $ROW["Tags"];

            $months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
            $timestamp = strtotime($date);
            $formatted_date = sprintf("%d %s %d", date('j', $timestamp), $months[date('n', $timestamp) - 1], date('Y', $timestamp));
            echo
            "<div class='card mb-4'>
            <a href='page.php?id=$id'>
              <img src='image.php?id=$id' class='card-img-top' alt='...'>
            </a>
            <div class='card-body'>
              <h5 class='card-title'>$title</h5>
              <p class='card-text'>$desc</p>
              <div class='d-inline-flex align-items-center justify-content-between' style='width: 100%;'>
                <a href='page.php?id=$id' class='btn btn-primary' style='background-color: #601b31; border-color: #601b31;'>Подробнее</a>
                <p style='font-size: 14px; margin: 10px 0px 0px 0px;'>
                $formatted_date года&nbsp;&nbsp;&nbsp;$tags
                </p>
              </div>
            </div>
          </div>";
          }
          $index++;
        }
        }
        ?>
      </div>

      <div class="col-md-4">
      <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = new mysqli("localhost", "root", "", "news");

        $DB = $mysqli->query("SELECT DATABASE()");
        $ROW = $DB->fetch_row();

        $sel = "SELECT * FROM new ORDER BY DATE DESC";
        if($res = $mysqli->query($sel))
        {
          $index = 1;
          foreach($res as $ROW)
          {
            $id = $ROW["ID"];
            if($index % 5 == 0 || $index % 5 == 2 || $index % 5 == 4)
            {
            $title = $ROW["Title"];
            $desc = $ROW["SmallDescription"];
            $date = $ROW["Date"];
            $tags = $ROW["Tags"];

            $months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
            $timestamp = strtotime($date);
            $formatted_date = sprintf("%d %s %d", date('j', $timestamp), $months[date('n', $timestamp) - 1], date('Y', $timestamp));
            echo
            "<div class='card mb-4'>
          <a href='page.php?id=$id'>
            <img src='image.php?id=$id' class='card-img-top' alt='...'>
          </a>
          <div class='card-body'>
            <h5 class='card-title'>$title</h5>
            <p class='card-text'>$desc</p>
            <div class='d-inline-flex align-items-center justify-content-between' style='width: 100%;'>
              <a href='page.php?id=$id' class='btn btn-primary' style='background-color: #601b31; border-color: #601b31; '>Подробнее</a>
              <p style='font-size: 12px; margin: 0px;'>
              $formatted_date </br> $tags
              </p>
            </div>
          </div>
        </div>";
          }
          $index++;
        }
        }
        ?>
      </div>
    </div>
  </div>

  <footer class="container-fluid text-white py-1" style="margin-top:5px; background-color: #3e3e3e;">
    <div class="container d-flex align-items-center">
      <a class="mb-0 nav-link text-light" style="margin: 0px;" href="https://www.nstu.ru/">&copy;НГТУ</a>
      <a class="mb-0 nav-link text-light" style="margin: 0px;" href="contacts.html">Контакты</a>
    </div>
  </footer>
  

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
