<html>
<head>
    <title>HTML ����� ������ ����</title>
</head>
<body>
<form action="search_book.php" method="post">
    ���� ��:<br>
    <select name="searchtype" size=3>
        <option value="author" selected>�����
        <option value="title">��������
        <option value="ISBN">ISBN
    </select> <br>
    ��� ����:<br> <input name="searchterm"> <br>
    <input type=submit value="�����">
</form>
</body>
</html>