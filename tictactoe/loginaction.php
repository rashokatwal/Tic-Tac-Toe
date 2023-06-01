<?php 

session_start();

$conn = new mysqli("localhost", "root", "", "tictactoe");

$enteredUsername = $_POST['username'];
$enteredPassword = $_POST['password'];

$userid = "";
$username = "";
$password = "";
$createdDate = "";
$OWins = "";
$OLosses = "";
$XWins = "";
$XLosses = "";
$draws = "";
$total = "";
$sessionValue = "";

$sql = "SELECT username FROM playerdata";
$result = $conn->query($sql);
$dbusername = array();
$i = 0;

while ($row=$result->fetch_assoc()){
    $dbusername[$i] = $row["username"];
    $i = $i + 1;
}

for ($a = 0; $a < $i; $a++) {
    if ($enteredUsername == $dbusername[$a]){
        $username = $enteredUsername;
        echo $username;
    }
    else {
        header ('Location: login.php');
    }
}

$sql1 = "SELECT userid,pass,createdDate,OWins,OLosses,XWins,XLosses,draws,total FROM playerdata WHERE username = '$username'";
$result1 = $conn->query($sql1);
while ($row1=$result1->fetch_assoc()){
    $userid = $row1["userid"];
    $password = $row1["pass"];
    $createdDate = $row1["createdDate"];
    $OWins = $row1["OWins"];
    $OLosses = $row1["OLosses"];
    $XWins = $row1["XWins"];
    $XLosses = $row1["XLosses"];
    $draws = $row1["draws"];
    $total = $row1["total"];
}
echo $userid;

if ($enteredPassword == $password) {
    $_SESSION['uname'] = $username;
    $_SESSION['uid'] = $userid;
    $_SESSION['createddate'] = $createdDate;
    $_SESSION['owins'] = $OWins;
    $_SESSION['olosses'] = $OLosses;
    $_SESSION['xwins'] = $XWins;
    $_SESSION['xlosses'] = $XLosses;
    $_SESSION['draws'] = $draws;
    $_SESSION['total'] = $total;
    header ('Location: index.php'); 
}
else {
    header ('Location: login.php');
}


$conn->close();
?> 