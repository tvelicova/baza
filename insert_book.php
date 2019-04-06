<html>
<head>
    <title>Программа добавления новых книг (файл insert_book.php)</title>
</head>
<body>
<?php
 $servername = "localhost";
    $database = "zip";
    $username = "velicova1";
    $password = "mili";
	
if (!isset($_POST['isbn']) || !isset($_POST['author']) ||    !isset($_POST['title']) || !isset($_POST['price']) ||
    !isset($_POST['quantity'])){
        die ("Не все данные введены.<br>
                Пожалуйста, вернитесь назад и закончите ввод");
}
$isbn   = trim ( $_POST['isbn'] );
$author = trim ( $_POST['author'] );
$title  = trim ( $_POST['title'] ) ;
$isbn   = addslashes ( $isbn );
$author = addslashes ( $author );
$title  = addslashes ( $title ) ;

$conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
     
    echo "Connected successfully <br>" ;
     
    $sql = "INSERT INTO books (ISBN, author, title, price, quantity) VALUES ('"
    .$isbn."', '".$author."', '".$title."', '"
    .floatval($_POST['price'])."', '".intval($_POST['quantity'])."')";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

?>
</body>
</html>