
<?
$searchterm=trim ( $_POST['searchterm'] );
if (!$searchterm)
    die ("Не все данные введены.<br>Пожалуйста, вернитесь назад и закончите ввод");
$searchterm = addslashes ($searchterm);
mysql_connect() or  die ("Невозможно подключение к MySQL");
mysql_select_db ( "zip" ) or die ("Невозможно открыть  БД");
$result = mysql_query ( "SELECT * FROM books WHERE ".$_POST['searchtype']." like '%".$searchterm."%'" );
$i=1;
while($row = mysql_fetch_array($result))
{
   echo "<p><b>".($i++) . $row['title']."</b><br>";
   echo "Автор: ".$row['author']."<br>";
   echo "ISBN: ".$row['ISBN']."<br>";
   echo "Цена: ".$row['price']."<br>";
   echo "Количество: ".$row['quantity']."</p>";
}
if ( $i == 1 ) echo "Ничего не можем предложить. Извините";
mysql_close( );
?>
