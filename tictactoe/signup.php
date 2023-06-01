<html>
    <head>
        <title>signup</title>
        <style>
            body {
                background-color: #2c2c2c;
            }
            #loginSection {
                height:500px;
                width:850px;
                position: absolute;
                top:50%;
                left:50%;
                transform: translate(-50%, -50%);
                padding: 1%;
                color: #15f4ee;
                border:solid #15f4ee;
            }
            #login {
                 text-align: center;
                 padding: 1%;
                 font-size: 200%;
                 color:#15f4ee;
                 font-weight:bold;
                 font-family: 'arial';
            }
            #signUpForm{
                text-align: center;
                display: block;
                font-family: 'arial';
            }
            #signUpClick {
                width:30%;
                font-size: 110%;
                padding: 1%;
                border-radius: 20px;
                border:solid 1px #15f4ee;
                color:#15f4ee;
                cursor: pointer;
                background:transparent;
            }
            #signUpClick:hover {
                background-color: #15f4ee;
                color:#2c2c2c;
            }
            input {
                width:220px;
                font-size: 100%;
                padding: 1%;
                border-radius: 5px;
                border: solid 2px #15f4ee;
                color: #15f4ee;
                background:transparent;
            }
            input:active {
                background:transparent;
            }
            .checkbox {
                padding: 0%;
                width: 3%;
                position: relative;
                left: 0%;
            }
        </style>
    </head>
    <body>
        <div id="loginSection">
            <p id="login">Sign Up</p>
            <form id="signUpForm" method="post">
                <input type="text" required name="userID" style="display:none" id="userID">
                <input type="text" placeholder="Username" required name="username"><br><br><br>
                <input type="password" placeholder="Password" id="password" required name="password"><br><br><br>
                <input type="password" placeholder="Confirm Password" id="confirmPassword" required name="confirmPassword"><br><br><br>
                <span id="displayMessage" style='padding:1%;color:black;background-color:white;opacity:0;font-size:70%;position:absolute;left:42%;top:65%;transition:1s;'>Password doesn't match</span><br><br>
                <input type="checkbox" class="checkbox" onclick="togglePassword()">Show Password<br><br>
                <button id="signUpClick" onclick="validation()">Sign Up</button>
            </form><br>
        </div>
    </body>
    <script>
        console.log(new Date().getFullYear() + '-' + new Date().getMonth() + '-' + new Date().getDate());
        function togglePassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("confirmPassword")
            if (x.type === "password") {
                x.type = "text";
                y.type = "text;"
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
        
        function validation(e) {
            var password = document.getElementById("password");
            var confirmPassword = document.getElementById("confirmPassword");
            var form = document.getElementById("signUpForm");
            var displayMessage = document.getElementById("displayMessage");
            var userID = document.getElementById("userID");
            if (confirmPassword.value != password.value) {
                event.preventDefault();
                displayMessage.style.opacity = "0.5";
            }
            else {
                userID.value = "#" + Math.floor((Math.random() * 10000) + 1000);
                form.action = "signupaction.php";
            }
        }
    </script>
</html>