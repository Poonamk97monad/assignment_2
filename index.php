<?php
 //Login & New form should not shown after login
  include('Connection.php');
  session_start();

    if($_SESSION['userid']) {
     header("location:home.php");
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>assignment</title>
    <script type="text/javascript">
    //loginfrom validation
     function validLoginForm() {

       var objUserId   = document.forms["loginform"]["userid"];
       var objPassword = document.forms["loginform"]["password"];
       if ("" == objUserId.value){
            window.alert("Please enter userid ");
            objUserId.focus();
            return false;
        }
        if ("" == objPassword.value){
            window.alert("Please enter password");
            objPassword.focus();
            return false;
        }
    }

    </script>
  <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <body>

    <div class="header">
    </div>
    <div class="topnav">
    </div>
    <div class="row">
      <div class="leftcolumn" >
        <div class="card card1">
          <h2>WelCome</h2>
            <div class="fakeimg fakeimg2">
              <center>
                <img src="monad.png" arl="monad_infotech" width="80%" height="100%" ">
              </center>
            </div>
        </div>
      </div>
      <div class="rightcolumn">
       <!--Login form-->
        <div class="card">
         <span class = "error">
          </span>
          <h2>Log In</h2>
            <div class="fakeimg fakeimg1">
              <form action="check.php" method="post" onsubmit="return validLoginForm()" name="loginform" autocomplete="off">
                <div class="input-group">
                  <label>Email_id:</label>
                  <input type="text" name="userid" value="" placeholder="abc@mail.com" autofocus >
                </div>
                <div class="input-group">
                  <label>Password:</label>
                  <input type="password" name="password"  placeholder="*********" autocomplete="off">
                </div>
                  <div class="input-group">
                  <input type="submit" name="login" value="login" class="loginbut">
                  <span></span>
                </div>
              </form>
            </div>
        </div>
        <div class="card">
           <h2> New Account</h2>
            <div class="fakeimg fakeimg3">
           <!--  Regetation form -->
              <p><span class="error">* required field</span></p>
              <form method="post" action="check.php" onsubmit="return validRegisterForm()" name="registerform" id="registerform">
                <input type="text" value="<?php echo  $intId?>" class="uphidden" name="id">
                <div class="input-group">
                  <label>First name:</label>
                  <input type="text" name="fname" value="<?php echo $fname;?>" placeholder="your 1st name" id="fname" >
                  <span class = "error">*<?php echo $strFirstNameErr;?></span>
                </div>
                <div class="input-group">
                  <label>Last name :</label>
                  <input type="text" name="lname" value="<?php echo $lname; ?>"  placeholder="your last name" id="lname">
                  <span class = "error">*<?php echo $strLastNameErr;?></span>
                </div>
                <div class="input-group">
                  <label>Email_id:</label>
                  <input type="text" name="email" value="<?php echo $email; ?>"  placeholder="someone@gmail.com" id="email">
                  <span class = "error">*<?php echo $strEmailErr;?></span>
                </div>
                <div class="input-group">
                  <label>Moblie_no.:</label>
                  <input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="99999888888" id="phone">
                  <span class = "error">*<?php echo $strPhoneErr;?></span>
                </div>
                <div class="input-group">
                  <label>About:</label>
                  <textarea name="about" rows="3" cols="57" value="" id="about" placeholder="write something about you">
                  </textarea>
                   <span class = "error"><?php echo $strAboutErr;?></span>
                </div>
                <div class="input-group">
                  <label>Password:</label>
                  <input type="password" name="password" value="<?php echo $password; ?>" placeholder="min lenght 8 " id="password">
                  <span class = "error">*<?php echo $strPasswordErr;?></span>
                </div>
                <div class="input-group">
                  <label>Confirm Password:</label>
                  <input type="password" name="repassword" value="<?php echo $repassword; ?>" placeholder="re-enter password" id="repassword">
                  <span class = "error">*<?php echo $strPasswordErr;?></span>
                </div>
                <div class="input-group">
                  <?php

                    if(isset($_GET['id'])){
                      echo '<input class="btn" type="submit" value="UPDATE" name="update"/>';
                    }
                    else{
                      echo'<input class="btn"  type="submit" value="SAVE" id="regi"  name="save"/>';
                    }
                  ?>
                  </div>
              </form>
          </div>
        </div>
       <div class="card">
        <h3>Follow</h3>
       </div>
      </div>
    </div>
    <div class="footer">
      <h5>&copy; 2010-<?php echo date("Y");?></h5>
    </div>
  </body>
</html>
