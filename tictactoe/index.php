<?php
session_start();
if (!isset($_SESSION['uname'])) {
     header('Location: login.php');
}
$username = $_SESSION['uname'];
$userid = $_SESSION['uid'];
$createdDate = $_SESSION['createddate'];
$OWins = $_SESSION['owins'] ;
$OLosses = $_SESSION['olosses'];
$XWins = $_SESSION['xwins'];
$XLosses = $_SESSION['xlosses'] ;
$draws = $_SESSION['draws'];
$total = $_SESSION['total']; 

?>
<html>
    <head>
        <title>index</title>
        <style>
            body {
                background-color: #2c2c2c;
            }
            #header {
                display: flex;
                height:50px;
                width: 100%;
                justify-content: left;
                align-items: center;
            }
            #bars {
                height:60%;
                width:2%;
                cursor: pointer;
                margin: 1%;
            }
            #leftArrow {
                margin: 1%;
                height: 60%;
                cursor: pointer;
                display: none;
            }
            #dashBoard {
                height:700px;
                width:650px;
                position: absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                display: none;
            }
            #profile {
                border:solid;
                width:100px;
                height:100px;
                border-radius: 50%;
                margin:auto;
                color:#15f4ee;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            #username {
                text-align: center;
                font-size: 150%;
                font-family: 'arial';
                color:#15f4ee;
            }
            #userId {
                text-align: center;
                font-size: 80%;
                font-family: 'arial';
                color:#15f4ee;
            }
            .dashButtons {
                border:solid;
                width: 35%;
                border-radius: 20px;
                padding: 1.5%;
                position: relative;
                left:32%;
                bottom: -10%;
                margin-top: 5%;
                font-size: 100%;
                color:#15f4ee;
                cursor: pointer;
                display: block;
            }
            .dashButtons:hover{
                background-color: #15f4ee;
                color: #2c2c2c;
            }
            #scoreBoard {
                border:solid;
                display: none;
                flex-direction: column;
                font-family: 'arial';
                color:#15f4ee;
                padding: 5%;
                border-radius: 50px;
            }
            #table {
                display: flex;
                flex-direction: row;
            }
            #row1 {
                border-right:solid 0.5px;
                width: 100%;
                text-align: center;
                padding: 2%;
            }
            #row2 {
                border-left:solid 0.5px;
                width: 100%;
                text-align: center;
                padding: 2%;
            }
            .object {
                padding: 2%;
            }
            .head {
                font-weight: bold;
            }
            #draws,#total {
                text-align: center;
            }
            #playbox{
                height:430px;
                width:430px;
                position: absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                display: block;
            }
            #verticalLine1 {
                height:100%;
                width:2%;
                position:absolute;
                background:#15f4ee;
                border-radius:0.3vw;
                left:32%;
            }
            #verticalLine2 {
                height:100%;
                width:2%;
                position:absolute;
                background:#15f4ee;
                border-radius:0.3vw;
                right:32%;
            }
            #horizontalLine1 {
                width:100%;
                height:2%;
                position:absolute;
                background:#15f4ee;
                border-radius:0.3vw;
                bottom:32%;
            }
            #horizontalLine2 {
                width:100%;
                height:2%;
                position:absolute;
                background:#15f4ee;
                border-radius:0.3vw;
                top:32%;
            }   
            #box2 {
                left:34%;
            }
            #box3 {
                right:0%;
            }
            #box4 {
                top:34%;
            }
            #box5 {
                left:34%;
                top:34%;
            }
            #box6 {
                top:34%;
                right:0%;
            }
            #box7 {
                position: absolute;
                bottom:0%;
            }
            #box8 {
                bottom:0%;
                left:34%;
            }
            #box9 {
                bottom:0%;
                right:0%;
            }
            .boxes {
                height:34%;
                width: 34%;
                position: absolute;
            }
            .boxes:hover{
                cursor: pointer;
                opacity: 0.9;
            }
            .circles {
                border:solid 7px white;
                width:45%;
                height:45%;
                position: absolute;
                top:20%;
                left:20%;
                border-radius: 50%;
            }
            .crosses{
                width:60%;
                height:60%;
                position: absolute;
                top:18%;
                left:18%;
                text-align: center;
            }
            .crosses::before{
                content:'';
                border:solid white;
                height: 100%;
                width: 3%;
                position: absolute;
                transform: rotate(45deg);
                left:43%;
                border-radius: 1vw;
                background-color: white;
            }
            .crosses::after{
                content:'';
                border:solid white;
                height: 100%;
                width: 3%;
                position: absolute;
                transform: rotate(-45deg);
                left:43%;
                border-radius: 1vw;
                background-color: white;
            }
            button{
                border:none;
                background: transparent;
            }
            .lines {
                position:absolute;
                background-color: white;
                border-radius: 0.3vw;
                display: none;
            }
            #line1 {
                width:80%;
                height:1%;
                top: 15%;
                left:10%;
            }
            #line2 {
                width:80%;
                height:1%;
                top: 49%;
                left:10%;
            }
            #line3 {
                width:80%;
                height:1%;
                bottom: 15%;
                left:10%;
            }
            #line4 {
                width:1%;
                height:80%;
                left:15%;
                top:10%;
            }
            #line5 {
                width:1%;
                height:80%;
                left:49%;
                top:10%;
            }
            #line6 {
                width:1%;
                height:80%;
                right:17%;
                top:10%;
            }
            #line7 {
                width:100%;
                height:1%;
                top: 49%;
                left:0%;
                transform: rotate(45deg);
            }
            #line8 {
                width:100%;
                height:1%;
                top: 49%;
                left:0%;
                transform: rotate(-45deg);
            }
            #playAgain {
                border:solid;width:40%;color: #15f4ee;padding:2%;position:absolute;bottom:-25%;left:30%;font-size:110%;border-radius:20px;cursor:pointer;display:none;
            }
            #playAgain:hover {
                background-color: #15f4ee;
                color:#2c2c2c;
            }
            #credits {
                display:none;
                justify-content:center;
                align-items:center;
                text-align:center;
                font-size:110%;
                color:#15f4ee;
                font-family:'arial';
                border:solid;
                padding:5%;
                border-radius:50px;
            }
        </style>
    </head>
    <body>
        <!--This is the header-->
        <div id="header"> 
            <img src="menu.png" id="bars" onclick="dashBoard()">
            <img src="left-arrow.png" id="leftArrow" onclick="back()">
        </div>
        <!--The Dashboard-->
        <div id="dashBoard">
            <br><br><br><br><br>
            <div id="profile"><img src="user.png"></div><br>
            <div id="username"></div>
            <div id="userId"></div><br>
            <button id="scoreBoardClick" class="dashButtons" onclick="scoreBoardClick()">Score Board</button>
            <button id="creditsClick" class="dashButtons" onclick="creditsClick()">Credits</button>
            <button id="logoutClick" class="dashButtons" onclick="logoutClick()">Log Out</button>
            <div id="scoreBoard">
                <div id="table">
                    <div id="row1">
                        <p class="head">Player(O)</p>
                        <p id="OWins" class="object">Wins:</p>
                    </div>
                    <div id="row2">
                        <p class="head">Player(X)</p>
                        <p id="XWins" class="object">Wins:</p>
                    </div>
                </div><br>
                <p id="draws">Draws:</p>
                <p id="total">Total Matches Played:</p>
            </div><br><br><br>
            <div id="credits">
                <p>CREDITS:<br><br><br>Project Manager&nbsp;&nbsp;&nbsp;&nbsp;Kailash Shiwakoti<br><br>Designer&nbsp;&nbsp;&nbsp;&nbsp;Pravin Mahato<br><br>Programmer&nbsp;&nbsp;&nbsp;&nbsp;Rashok Katwal<br><br>Tester&nbsp;&nbsp;&nbsp;&nbsp;Sumit Yadav</p>
            </div>
            <br><br><br>
        </div>
        <!--This is the playarea-->
        <div id="playbox">
            <!--The boxes-->
            <button id="box1" onClick="main(this.id)" class="boxes">
                <div id="area1" class></div>
            </button>
            <button id="box2" onClick="main(this.id)" class="boxes">
                <div id="area2" class></div>
            </button>
            <button id="box3" onClick="main(this.id)" class="boxes">
                <div id="area3" class></div>
            </button>
            <button id="box4" onClick="main(this.id)" class="boxes">
                <div id="area4" class></div>
            </button>
            <button id="box5" onClick="main(this.id)" class="boxes">
                <div id="area5" class></div>
            </button>
            <button id="box6" onClick="main(this.id)" class="boxes">
                <div id="area6" class></div>
            </button>
            <button id="box7" onClick="main(this.id)" class="boxes">
                <div id="area7" class></div>
            </button>
            <button id="box8" onClick="main(this.id)" class="boxes">
                <div id="area8" class></div>
            </button>
            <button id="box9" onClick="main(this.id)" class="boxes">
                <div id="area9" class></div>
            </button>
            <!--The lines-->
            <div id="verticalLine1"></div>
            <div id="verticalLine2"></div>
            <div id="horizontalLine1"></div>
            <div id="horizontalLine2"></div>
            <!--The win lines-->
            <div id="line1" class="lines"></div>
            <div id="line2" class="lines"></div>
            <div id="line3" class="lines"></div>
            <div id="line4" class="lines"></div>
            <div id="line5" class="lines"></div>
            <div id="line6" class="lines"></div>
            <div id="line7" class="lines"></div>
            <div id="line8" class="lines"></div><br>
            <button id="playAgain" onclick="playAgain()">Play Again</button>
        </div>
    </body>
    <script>
        var OWins = <?php echo $OWins?>;
        var OLosses = <?php echo $OLosses?>;
        var XWins = <?php echo $XWins?>;
        var XLosses = <?php echo $XLosses?>;
        var draws = <?php echo $draws?>;
        var total = <?php echo $total?>;
        var i = 1;
        var fillArea1 = document.getElementById("area1");
        var fillArea2 = document.getElementById("area2");
        var fillArea3 = document.getElementById("area3");
        var fillArea4 = document.getElementById("area4");
        var fillArea5 = document.getElementById("area5");
        var fillArea6 = document.getElementById("area6");
        var fillArea7 = document.getElementById("area7");
        var fillArea8 = document.getElementById("area8");
        var fillArea9 = document.getElementById("area9");
        document.getElementById("username").innerHTML = '<?php echo $username?>';
        document.getElementById("userId").innerHTML = '<?php echo $userid?>';
        document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
        document.getElementById("OLosses").innerHTML = 'Losses: ' + OLosses;
        document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;  
        document.getElementById("XLosses").innerHTML = 'Losses: ' + XLosses;
        document.getElementById("draws").innerHTML = 'Draws: ' + draws;
        document.getElementById("total").innerHTML = 'Total: ' + total;   
        function main(clicked_id) {
            console.log(i);
            fillId = document.getElementById(clicked_id).children[0].id;
            fillValue = document.getElementById(fillId);
            while (fillValue.className == ""){
                if (i%2 != 0) {
                    fillValue.className = "circles";
                    i++;
                }
                else {
                    fillValue.className = "crosses";
                    i++;
                }
            }
            if (
                (fillArea1.className == "circles" && fillArea2.className == "circles" && fillArea3.className == "circles") ||
                (fillArea1.className == "crosses" && fillArea2.className == "crosses" && fillArea3.className == "crosses")
            ) {
                if (i%2 != 0){
                    console.log("crosses won");
                    document.getElementById("line1").style.display = "block";
                    XWins++;
                    total++;
                    document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                else {
                    console.log("circles won");
                    document.getElementById("line1").style.display = "block";
                    OWins++;
                    total++;
                    document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                document.getElementById("playAgain").style.display = "block";
            }
            else if (
                (fillArea4.className == "circles" && fillArea5.className == "circles" && fillArea6.className == "circles") ||
                (fillArea4.className == "crosses" && fillArea5.className == "crosses" && fillArea6.className == "crosses")
            ) {
                if (i%2 != 0){
                    console.log("crosses won");
                    document.getElementById("line2").style.display = "block";
                    XWins++;
                    total++;
                    document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                else {
                    console.log("circles won");
                    document.getElementById("line2").style.display = "block";
                    OWins++;
                    total++;
                    document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                document.getElementById("playAgain").style.display = "block";
            }
            else if (
                (fillArea7.className == "circles" && fillArea8.className == "circles" && fillArea9.className == "circles") ||
                (fillArea7.className == "crosses" && fillArea8.className == "crosses" && fillArea9.className == "crosses") 
            ) {
                if (i%2 != 0){
                    console.log("crosses won");
                    document.getElementById("line3").style.display = "block";
                    XWins++;
                    total++; 
                    document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                else {
                    console.log("circles won");
                    document.getElementById("line3").style.display = "block";
                    OWins++;
                    total++;
                    document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                document.getElementById("playAgain").style.display = "block";
            }
            else if (
                (fillArea1.className == "circles" && fillArea4.className == "circles" && fillArea7.className == "circles") ||
                (fillArea1.className == "crosses" && fillArea4.className == "crosses" && fillArea7.className == "crosses") 
            ) {
                if (i%2 != 0){
                    console.log("crosses won");
                    document.getElementById("line4").style.display = "block";
                    XWins++;
                    total++;
                    document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                else {
                    console.log("circles won");
                    document.getElementById("line4").style.display = "block";
                    OWins++;
                    total++;
                    document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                document.getElementById("playAgain").style.display = "block";
            }
            else if (
                (fillArea2.className == "circles" && fillArea5.className == "circles" && fillArea8.className == "circles") ||
                (fillArea2.className == "crosses" && fillArea5.className == "crosses" && fillArea8.className == "crosses") 
            ) {
                if (i%2 != 0){
                    console.log("crosses won");
                    document.getElementById("line5").style.display = "block";
                    XWins++;
                    total++;
                    document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                else {
                    console.log("circles won");
                    document.getElementById("line5").style.display = "block";
                    OWins++;
                    total++;
                    document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                document.getElementById("playAgain").style.display = "block";
            }
            else if (
                (fillArea3.className == "circles" && fillArea6.className == "circles" && fillArea9.className == "circles") ||
                (fillArea3.className == "crosses" && fillArea6.className == "crosses" && fillArea9.className == "crosses") 
            ) {
                if (i%2 != 0){
                    console.log("crosses won");
                    document.getElementById("line6").style.display = "block";
                    XWins++;
                    total++;
                    document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                else {
                    console.log("circles won");
                    document.getElementById("line6").style.display = "block";
                    OWins++;
                    total++;
                    document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                document.getElementById("playAgain").style.display = "block";
            }
            else if (
                (fillArea1.className == "circles" && fillArea5.className == "circles" && fillArea9.className == "circles") ||
                (fillArea1.className == "crosses" && fillArea5.className == "crosses" && fillArea9.className == "crosses") 
            ) {
                if (i%2 != 0){
                    console.log("crosses won");
                    document.getElementById("line7").style.display = "block";
                    XWins++;
                    total++;
                    document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                else {
                    console.log("circles won");
                    document.getElementById("line7").style.display = "block";
                    OWins++;
                    total++;
                    document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                document.getElementById("playAgain").style.display = "block";
            }
            else if (
                (fillArea3.className == "circles" && fillArea5.className == "circles" && fillArea7.className == "circles") ||
                (fillArea3.className == "crosses" && fillArea5.className == "crosses" && fillArea7.className == "crosses")
            ) {
                if (i%2 != 0){
                    console.log("crosses won");
                    document.getElementById("line8").style.display = "block";
                    XWins++;
                    total++;
                    document.getElementById("XWins").innerHTML = 'Wins: ' + XWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                else {
                    console.log("circles won");
                    document.getElementById("line8").style.display = "block";
                    OWins++;
                    total++;
                    document.getElementById("OWins").innerHTML = 'Wins: ' + OWins;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                }
                document.getElementById("playAgain").style.display = "block";
            }
            else if (
                fillArea1.className != "" && 
                fillArea2.className != "" && 
                fillArea3.className != "" && 
                fillArea4.className != "" && 
                fillArea5.className != "" && 
                fillArea6.className != "" && 
                fillArea7.className != "" && 
                fillArea8.className != "" && 
                fillArea9.className != "") {
                    console.log("Its a draw");
                    draws++;
                    total++;
                    document.getElementById("draws").innerHTML = 'Draws: ' + draws;
                    document.getElementById("total").innerHTML = 'Total: ' + total;
                    document.getElementById("playAgain").style.display = "block";
                }
            if (
                document.getElementById("line1").style.display == "block" ||
                document.getElementById("line2").style.display == "block" ||
                document.getElementById("line3").style.display == "block" ||
                document.getElementById("line4").style.display == "block" ||
                document.getElementById("line5").style.display == "block" ||
                document.getElementById("line6").style.display == "block" ||
                document.getElementById("line7").style.display == "block" ||
                document.getElementById("line8").style.display == "block"
            ) {
                document.getElementById("box1").disabled = true;
                document.getElementById("box2").disabled = true;
                document.getElementById("box3").disabled = true;
                document.getElementById("box4").disabled = true;
                document.getElementById("box5").disabled = true;
                document.getElementById("box6").disabled = true;
                document.getElementById("box7").disabled = true;
                document.getElementById("box8").disabled = true;
                document.getElementById("box9").disabled = true;
            }
        }
        function dashBoard() {
            location.hash = "profile";
            document.getElementById("dashBoard").style.display = "block";
            document.getElementById("leftArrow").style.display = "block";
            document.getElementById("bars").style.display = "none";
            document.getElementById("playbox").style.display = "none";
        }
        function scoreBoardClick() {
            location.hash = "scoreboard";
            document.getElementById("scoreBoard").style.display = "flex";
            document.getElementById("scoreBoardClick").style.display = "none";
            document.getElementById("logoutClick").style.display = "none";
            document.getElementById("creditsClick").style.display = "none";
        }
        function logoutClick() {
            <?php session_destroy();echo 'location.href = "login.php"'?>
        }
        function creditsClick() {
            location.hash = "credits";
            document.getElementById("credits").style.display = "flex";
            document.getElementById("scoreBoardClick").style.display = "none";
            document.getElementById("logoutClick").style.display = "none";
            document.getElementById("creditsClick").style.display = "none";
            document.getElementById("username").style.display = "none";
            document.getElementById("profile").style.display = "none";
            document.getElementById("userId").style.display = "none";
        }
        function back() {
            if (location.hash == "#profile") {
                document.getElementById("dashBoard").style.display = "none";
                document.getElementById("bars").style.display = "block";
                document.getElementById("leftArrow").style.display = "none";
                document.getElementById("playbox").style.display = "block";
                document.getElementById("playbox").style.zIndex = "9999";
                location.hash = "playarea";
            }
            else if (location.hash == "#scoreboard") {
                document.getElementById("scoreBoard").style.display = "none";
                document.getElementById("scoreBoardClick").style.display = "block";
                document.getElementById("logoutClick").style.display = "block";
                document.getElementById("creditsClick").style.display = "block";
                location.hash = "profile";
            }
            else if (location.hash == "#credits") {
                location.hash = "profile";
                document.getElementById("creditsClick").style.display = "none";
                document.getElementById("username").style.display = "block";
                document.getElementById("profile").style.display = "flex";
                document.getElementById("userId").style.display = "block";
                document.getElementById("credits").style.display = "none";
                document.getElementById("scoreBoardClick").style.display = "block";
                document.getElementById("logoutClick").style.display = "block";
                document.getElementById("creditsClick").style.display = "block";
            }
        }
        function playAgain() {
            fillArea1.className = "";
            fillArea2.className = ""; 
            fillArea3.className = ""; 
            fillArea4.className = ""; 
            fillArea5.className = ""; 
            fillArea6.className = "";
            fillArea7.className = "";
            fillArea8.className = ""; 
            fillArea9.className = "";
            document.getElementById("line1").style.display = "none";
            document.getElementById("line2").style.display = "none";
            document.getElementById("line3").style.display = "none";
            document.getElementById("line4").style.display = "none";
            document.getElementById("line5").style.display = "none";
            document.getElementById("line6").style.display = "none";
            document.getElementById("line7").style.display = "none";
            document.getElementById("line8").style.display = "none";
            document.getElementById("playAgain").style.display = "none";
            i = 1;
            document.getElementById("box1").disabled = false;
            document.getElementById("box2").disabled = false;
            document.getElementById("box3").disabled = false;
            document.getElementById("box4").disabled = false;
            document.getElementById("box5").disabled = false;
            document.getElementById("box6").disabled = false;
            document.getElementById("box7").disabled = false;
            document.getElementById("box8").disabled = false;
            document.getElementById("box9").disabled = false;
        }
        if (location.hash == "#playarea") {
            document.getElementById("playbox").style.display = "block";
        }
    </script>
</html>