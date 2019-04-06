    <?php
    $servername = "localhost";
    $database = "zip";
    $username = "velicova1";
    $password = "mili";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
     
    echo "Connected successfully <br>" ;
     
    $sql = "INSERT INTO books (ISBN, author, title) VALUES ('23456-6911156','Ben', 'Sciastie')";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>