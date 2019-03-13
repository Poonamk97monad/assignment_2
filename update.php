<?php

include('Connection.php');
session_start();
  if(!isset($_SESSION['userid'])) {
      # redirect to the login page
      header('Location: index.php?msg=' . urlencode('Login first.'));
      exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  /*function validRegisterForm() {
    var strFirstName  = document.forms["registerform"]["fname"];
    var strLastName   = document.forms["registerform"]["lname"];
    var strEmail      = document.forms["registerform"]["email"];
    var intPhone      = document.forms["registerform"]["phone"];
    var strAbout      = document.forms["registerform"]["about"];
    if ("" == strFirstName.value) {
        window.alert("Please enter your First name.");
        strFirstName.focus();
        return false;
    }
    if ("" == strLastName.value) {
        window.alert("Please enter your last name.");
        strLastName.focus();
        return false;
    }
    //validate email
    if ("" == strEmail.value) {
        window.alert("Please enter a valid e-mail address.");
        strEmail.focus();
        return false;
    }
    if (strEmail.value.indexOf("@", 0) < 0) {
        window.alert("Please enter a valid e-mail address.");
        strEmail.focus();
        return false;
    }
    if (strEmail.value.indexOf(".", 0) < 0) {
        window.alert("Please enter a valid e-mail address.");
        strEmail.focus();
        return false;
    }
    if ("" == intPhone.value) {
        window.alert("Please enter your telephone number.");
        intPhone.focus();
        return false;
    }
    if ("" == strAbout.value) {
        window.alert("Please enter something about you ");
        strAbout.focus();
        return false;
    }
  }*/
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
          <h3> Update Data</h3>
          <div class="fakeimg fakeimg3">
          <!--  Regetation form -->
           <p><span class="error">* required field</span></p>

             <form method="post" action="check.php" onsubmit="return validRegisterForm()" name="registerform" id="registerform">
                <input type="text" value="<?php echo $intId?>" class="uphidden" name="id">
                <div class="input-group">
                  <label>First name:</label>
                  <input type="text" name="fname" value="<?php echo $_GET['fname'];?>" placeholder="your 1st name" id="fname" >
                  <span class = "error">*<?php echo $strFirstNameErr;?></span>
                </div>
                <div class="input-group">
                  <label>Last name :</label>
                  <input type="text" name="lname" value="<?php echo $_GET['lname']; ?>"  placeholder="your last name" id="lname">
                  <span class = "error">*<?php echo $strLastNameErr;?></span>
                </div>
                <div class="input-group">
                  <label>Email_id:</label>
                  <input type="email" name="email" value="<?php echo $_GET['email']; ?>"  placeholder="someone@gmail.com" id="email">
                  <span class = "error">*<?php echo $strEmailErr;?></span>
                </div>
                <div class="input-group">
                  <label>Moblie_no.:</label>
                  <input type="text" name="phone" value="<?php echo $_GET['phone']; ?>" placeholder="99999888888" id="phone">
                  <span class = "error">*<?php echo $strPhoneErr;?></span>
                </div>
                <div class="input-group">
                  <label>About:</label>
                  <textarea name="about" rows="3" cols="57" id="about" placeholder="write something about you"><?php echo $_GET['about']; ?></textarea>
                </div>
                <div class="input-group uphidden">
                  <label>Password:</label>
                  <input type="password" name="password" value="<?php echo $password; ?>" placeholder="min lenght 8 "  id="password">
                </div>
                <div class="input-group uphidden">
                  <label>Confirm Password:</label>
                  <input type="password" name="repassword" value="<?php echo $repassword; ?>" placeholder="re-enter password"  id="repassword">
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
      <h2>Footer</h2>
    </div>
  </body>
</html>
