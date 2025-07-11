<?php
// Параметры подключения к базе данных
$servername = "localhost"; // Имя сервера базы данных (обычно localhost)
$username = "username"; // Имя пользователя базы данных
$password = "password"; // Пароль базы данных
$dbname = "dbname"; // Имя базы данных

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Запрос для получения новостей
$sql = "SELECT * FROM news ORDER BY Date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Выводим данные каждой новости
  while($row = $result->fetch_assoc()) {
    echo '<div class="card mb-4">';
    echo '<a href="page.php?id=' . $row["ID"] . '">';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row["Image"]) . '" class="card-img-top" alt="...">';
    echo '</a>';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $row["Title"] . '</h5>';
    echo '<p class="card-text">' . $row["SmallDescription"] . '</p>';
    echo '<div class="d-inline-flex align-items-center justify-content-between" style="width: 100%;">';
    echo '<a href="page.php?id=' . $row["ID"] . '" class="btn btn-primary" style="background-color: #601b31; border-color: #601b31;">Подробнее</a>';
    echo '<p style="font-size: 14px; margin: 10px 0px 0px 0px;">' . $row["Date"] . '&nbsp;&nbsp;&nbsp;' . $row["Tags"] . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo "0 results";
}
$conn->close();
?>
