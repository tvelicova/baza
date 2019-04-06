<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
// если запрос POST 
if(isset($_POST['author']) && isset($_POST['title']) && isset($_POST['ISBN'])){
 
    $ISBN = htmlentities(mysqli_real_escape_string($link, $_POST['ISBN']));
    $author = htmlentities(mysqli_real_escape_string($link, $_POST['author']));
    $title = htmlentities(mysqli_real_escape_string($link, $_POST['title']));
     
    $query ="UPDATE books SET author='$author', title='$title' WHERE ISBN='$ISBN'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
        echo "<span style='color:blue;'>Данные обновлены</span>";
}
 
// если запрос GET
if(isset($_GET['ISBN']))
{   
    $ISBN = htmlentities(mysqli_real_escape_string($link, $_GET['ISBN']));
     
    // создание строки запроса
    $query ="SELECT * FROM books WHERE ISBN = '$ISBN'";
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    //если в запросе более нуля строк
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $author = $row[1];
        $title = $row[2];
         
        echo "<h2>Изменить модель</h2>
            <form method='POST'>
            <input type='hIdden' name='ISBN' value='$ISBN' />
            <p>Введите модель:<br> 
            <input type='text' name='author' value='$author' /></p>
            <p>Производитель: <br> 
            <input type='text' name='title' value='$title' /></p>
            <input type='submit' value='Сохранить'>
            </form>";
         
        mysqli_free_result($result);
    }
}
// закрываем подключение
mysqli_close($link);
?>
</body>
</html>