<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tictactoe";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Error: ".mysqli_connect_error());
    } else {
        echo "Successfully connected to the database\n";
    }

    $userID = $_POST['userID'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO playerdata(`userid`, `username`, `pass`,`OWins`,`OLosses`, `XWins`, `XLosses`,`draws`,`total`) VALUES ('".$userID."','".$username."','".$password."','0','0','0','0','0','0')";

    if ($conn->query($sql) === TRUE) {
        echo "A record is inserted successfully";
    } else {
        echo "Error while executing query ".$conn->error;
    }

    $conn->close();
    
    header('Location: login.php');
?>