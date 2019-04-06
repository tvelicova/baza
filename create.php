<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['ISBN']) && isset($_POST['author']) && isset($_POST['title'])  && isset($_POST['price']) && isset($_POST['quantity'])
	){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $ISBN = htmlentities(mysqli_real_escape_string($link, $_POST['ISBN']));
    $author = htmlentities(mysqli_real_escape_string($link, $_POST['author']));
	$title = htmlentities(mysqli_real_escape_string($link, $_POST['title']));	
	$price = htmlentities(mysqli_real_escape_string($link, $_POST['price']));
	$quantity = htmlentities(mysqli_real_escape_string($link, $_POST['quantity']));

     
    // создание строки запроса
    $query ="INSERT INTO books VALUES('$ISBN', '$author','$title','$price','$quantity')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>
<h2>Добавить новую книгу</h2>
<form method="POST">
<p>Введите ISBN:<br> 
<input type="text" name="ISBN" />
<p>Автор: <br> 
<input type="text" name="author" />
<p>Название книги: <br> 
<input type="text" name="title" /></p>
<p>Цена: <br> 
<input type="text" name="price" /></p>
<p>Количество: <br> 
<input type="text" name="quantity" /></p>
<input type="submit" value="Добавить">
</form>
</body>
</html>