<?php
session_start();
 ?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CourseFull</title>
  </head>
  <body>
    <header id = "Head">
      <h1 style = "color: #24333C; text-align: center; ">CourseFull</h1>
    </header>
    <main>
      <div id = "EnterTheWebsite">
        <h2 id = "Title">Take control of your <br> course load, set goals, and collaborate<br> to live your education to the fullest! </h2>
        <div id = "UserRegistrationForm">
          <form method = "POST" action = "#">
            <h3 style = "font-size: 25px; text-align: center; ">More you learn, more you earn. </h3>
            <input name = "RFirstName" type = "text" placeholder = "Enter your First Name"> <input name = "RLastName" type = "text" placeholder = "Enter your Last Name">
            <input name = "REmail" type = "text" placeholder = "Enter your e-mail" class = "RegistrationInput">
            <input name = "RPassword" type = "password" placeholder = "Enter your password" class = "RegistrationInput">
            <button name = "UserSignIn" type = "submit" class = "ProgrammerButton">Sign in</button>
            <?php
              if(isset($_POST['UserSignIn'])){

                $FirsName = $_POST['RFirstName'];
                $LastName = $_POST['RLastName'];
                $Mail = $_POST['REmail'];
                $Password = $_POST['RPassword'];

                include 'connection.php';
                $Query = "INSERT INTO `users` VALUES (NULL, '$FirsName', '$LastName', '$Mail', '$Password', 0)";
                $Result = mysqli_query($Link, $Query) or die(mysqli_error());

                $Number = mysqli_affected_rows($Link);
                if($Number > 0) {
                  echo "Registration went successful, Log in to your new account";
                }
                else {
                  echo "There was an error :(, please try again, later and we are excited that you want to join CourseFull :D . )";
                }

              }
            ?>
        </form>
        </div>
        <div id = "UserLogInForm">
          <form action = "#" method = "POST">
            <h3 style = "font-size: 25px; text-align: center; color: #00FF66; ">Welcome Back</h3>
            <input name = "LIMail" type = "text" placeholder = "Enter your username">
            <input name = "LIPassword" type = "password" placeholder = "Enter your password">
            <button name = "LogIn" type = "submit" class = "LogInButton">Log In</button>
            <?php
            if(isset($_POST["LogIn"])){
              include "connection.php";
              $Mail = $_POST['LIMail'];
              $Password = $_POST['LIPassword'];
              $SqlQuery = "SELECT * FROM users WHERE emailadress  = '$Mail' AND password = '$Password'";
              $Result = mysqli_query($Link, $SqlQuery) or die ("Connection Error :(. Please try again later on or contact me on srdjangrbic@zohomail.eu");
              $RowNumber = $Result ->num_rows;
              if($RowNumber > 0){
                $Row = mysqli_fetch_row($Result);

                $UserId = $Row[0];
                $FirstName = $Row[1];
                $LastName = $Row[2];
                $EMailAdress = $Row[3];
                $Password = $Row[4];
                $Goal = $Row[5];

                $_SESSION['userid'] = $UserId;
                $_SESSION['firstname'] = $FirstName;
                $_SESSION['lastname'] = $LastName;
                $_SESSION['emailadress'] = $EMailAdress;
                $_SESSION['password'] = $Password;
                $_SESSION['goal'] = $Goal;

                header('Location: profile.php');
              }
              else{
                echo "You entered wrong E-mail or Password";
              }
            }
             ?>
          </form>
        </div>
      </div>
    </main>
    <foother id = "Foother">
      <h2 style = "color: #24333C; text-align: center; ">Created by CourseFull, all copyright reserved. </h2>
    </foother>
  </body>
</html>
