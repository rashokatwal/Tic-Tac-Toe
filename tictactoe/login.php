<html>
    <head>
        <title>login</title>
        <style>
            body {
                background-color:#2c2c2c;
            }
            #loginSection {
                height:520px;
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
            #loginForm{
                text-align: center;
                font-family: 'arial';
            }
            #loginClick {
                width:30%;
                font-size: 110%;
                padding: 1%;
                border-radius: 20px;
                border:solid 1px;
                color: #15f4ee;
                cursor: pointer;
                background:transparent;
            }
            #loginClick:hover {
                background-color:#15f4ee;
                color:#2c2c2c;
            }
            input {
                width:245px;
                font-size: 100%;
                padding: 1%;
                border-radius: 5px;
                border: solid 2px #15f4ee;
                color: #15f4ee;
                background:transparent;
            }
            .checkbox {
                padding: 0%;
                width: 3%;
                position: relative;
                left: 0%;
            }
            #registerNow {
                text-align: center;
                font-family: 'arial';
            }
            #signUp {
                cursor: pointer;
                font-family: 'arial';
                font-weight: bold;
                border: solid 1px #15f4ee;
                width:29%;
                position: absolute;
                left:35.3%;
                text-align: center;
                padding:1%;
                border-radius:20px;
                font-size: 105%;
                color: #15f4ee;
                background:transparent;
            }
            #signUp:hover {
                color:#2c2c2c;
                background-color: #15f4ee;
            }
        </style>
    </head>
    <body>
        <div id="loginSection">
            <p id="login">Log in to play</p>
            <form id="loginForm" method="post" action="loginaction.php">
                <input type="text" placeholder="Username" name="username" id="username" required><br><br>
                <input type="password" placeholder="Password" id="password" name="password" required><br><br>
                <input type="checkbox" class="checkbox" onclick="togglePassword()">Show Password<br><br>
                <button id="loginClick">Log In</button>
            </form><br><br>
            <p id="registerNow">Register Now</p><br>
            <a href="signup.php"><button id="signUp">Sign Up</button></a>
        </div>
    </body>
    <script>

        document.getElementById("username").value = "";
        document.getElementById("password").value = "";

        function togglePassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

    </script>
</html>