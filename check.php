<?php

  include('Connection.php');
  include('Auth.php');
  include('User.php');
  include('Validation.php');

  $objAuth       = new Auth();
  $objUser       = new User();
  $objValidation = new Validation();

  session_start();

  if(isset($_POST["save"])) {

      /**
       * @var string  $strFirstName
       * @var string  $strLastName
       * @var string  $strEmailId
       * @var integer $intPhoneNumber
       * @var string  $strAbout
       * @var string  $strPassword
       * @var string  $strRePassword
       * @var string  $strMsg
       * @var string  $check_phone
       * @var string  $check_email
       * @var string  $check_password
       * */
      $strFirstName   = $_POST['fname'];
      $strLastName    = $_POST['lname'];
      $strEmailId     = $_POST['email'];
      $intPhoneNumber = $_POST['phone'];
      $strAbout       = $_POST['about'];
      $strPassword    = $_POST['password'];
      $strRePassword  = $_POST['repassword'];
      $strMsg         = $objValidation->check_empty($_POST, array('fname','lname','email','phone','about','password','repassword'));
      $check_phone    = $objValidation->is_phone_valid($_POST['phone']);
      $check_email    = $objValidation->is_email_valid($_POST['email']);
      $check_password = $objValidation->is_password_correct($_POST['password'],$_POST['repassword']);

        if($strMsg != null) {
            echo $strMsg;
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } elseif (!$check_phone) {
            echo 'Please provide proper phone no..';
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } elseif (!$check_email) {
            echo 'Please provide proper email.';
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        }
        elseif (!$check_password) {
            echo 'Please check your password';
            //link to the previous page
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        }
        else {
            // To insert with mysqli database
            $obj = $objUser->register($strFirstName, $strLastName, $strEmailId, $intPhoneNumber, $strAbout, $strPassword);
        }
  }
  else {
    if(isset($_POST["login"])) {

        /**
         * @var string  $strUserId
         * @var string  $strPassword
         * */
       echo $strUserId   = $_POST['userid'];
       echo $strPassword = $_POST['password'];
        /** @var object $obj */
        $obj = $objAuth->login($strUserId,$strPassword);

    }

  }

?>
<?php

   if(isset($_POST["logout"])) {
       $obj = $objAuth->logout();
   }

?>
<?php

    if(isset($_POST["update"])) {

        /**
         * @var integer $intId
         * @var string  $strFirstName
         * @var string  $strLastName
         * @var string  $strEmailId
         * @var integer $intPhoneNumber
         * @var string  $strAbout
         * @var string  $strMsg
         * @var string  $check_phone
         * @var string  $check_email
         * */
         $intId          = $_POST['id'];
         $strFirstName   = $_POST['fname'];
         $strLastName    = $_POST['lname'];
         $strEmailId     = $_POST['email'];
         $intPhoneNumber = $_POST['phone'];
         $strAbout       = $_POST['about'];
         $strMsg         = $objValidation->check_empty($_POST, array('fname','lname','email','phone','about'));
         $check_phone    = $objValidation->is_phone_valid($_POST['phone']);
         $check_email    = $objValidation->is_email_valid($_POST['email']);

        if($strMsg != null) {
            echo $strMsg;
            //link to the previous page
            echo "<br/><a href = 'javascript:self.history.back();'>Go Back</a>";
        } elseif (!$check_phone) {
            echo 'Please provide proper phone no..';
            //link to the previous page
            echo "<br/><a href = 'javascript:self.history.back();'>Go Back</a>";
        } elseif (!$check_email) {
            echo 'Please provide proper email.';
            //link to the previous page
            echo "<br/><a href = 'javascript:self.history.back();'>Go Back</a>";
        }
        else {
            $obj = $objUser->update($intId, $strFirstName, $strLastName, $strEmailId, $intPhoneNumber, $strAbout);
        }
      }


?>
