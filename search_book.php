
<?
$searchterm=trim ( $_POST['searchterm'] );
if (!$searchterm)
    die ("�� ��� ������ �������.<br>����������, ��������� ����� � ��������� ����");
$searchterm = addslashes ($searchterm);
mysql_connect() or  die ("���������� ����������� � MySQL");
mysql_select_db ( "zip" ) or die ("���������� �������  ��");
$result = mysql_query ( "SELECT * FROM books WHERE ".$_POST['searchtype']." like '%".$searchterm."%'" );
$i=1;
while($row = mysql_fetch_array($result))
{
   echo "<p><b>".($i++) . $row['title']."</b><br>";
   echo "�����: ".$row['author']."<br>";
   echo "ISBN: ".$row['ISBN']."<br>";
   echo "����: ".$row['price']."<br>";
   echo "����������: ".$row['quantity']."</p>";
}
if ( $i == 1 ) echo "������ �� ����� ����������. ��������";
mysql_close( );
?>
