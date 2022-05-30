<?php

  // check if user come from request
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Assign Variabe
    $user      = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email     = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mobile    = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
    $message   = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    // Reating Arrays Of Errors
    $formErrors = array();

    if(strlen($user) <= 6){
      $formErrors [] = 'Username Must Be Larger Than 6 Characters!';
    }

    if(strlen($email) < 5){
      $formErrors [] = 'Please Type A Valid Email!';
    }

    if(strlen($mobile) != 11){
      $formErrors [] = 'Please Type A Valid Phone Number!';
    }

    if(strlen($message) < 20){
      $formErrors [] = 'The Message Must Be More Than 20 Characters!';
    }

    // send email

    $header  = 'From: ' . $email . '\r\n';
    $myEmail = 'mohamedhassan.8096@gmail.com';
    $subject = 'MH Contact Form';
    
    if(empty($formErrors)){
      mail($myEmail, $subject, $message, $header);
      $user    = '';
      $email   = '';
      $mobile  = '';
      $message = '';

      $success = '<div class="alert alert-success">We Have Recieved Your Message</div>';
    }
  }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Updock&display=swap">
  </head>
  <body>
    <div class="container">
      <h2 class="text-center">Contact Me</h2>
      <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          <?php if(!empty($formErrors)){?>
            <div class="alert alert-danger alert-dismissible" role="start">
              <button Type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>  
              </button>
              <?php
              foreach($formErrors as $error){
                echo $error . '</br>';
              }
              ?>
            </div>
            <?php } ?>
            <?php if(isset($success)) {echo $success;} ?>
          <div class="form-group">
            <input class="username form-control" type="text" name="username" value="<?php if (isset($user)) {
              echo $user;
            } ?>" placeholder="Type Your Username">
                <i class="fa fa-user fa-fw"></i>
                <?php if (!empty($userError)) { ?>
                  <div class="alert alert-danger alert-dismissible" role="start">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php

                          echo $userError . '<br/>';
                      
                    ?>
                  </div>
              <?php } ?>
              <span class="asterisx">*</span>
              <div class="alert alert-danger custom-alert">
                   Username Must Be Larger Than 6 Characters!
              </div>
          </div>

          <div class="form-group">
            <input class="email form-control" type="email" name="email" value="<?php if (isset($email)) {
              echo $email;
            } ?>" placeholder="Type a Valid Email">
            <i class="fa-solid fa-envelope fa-fw"></i>
            <?php if (!empty($emailError)) { ?>
              <div class="alert alert-danger alert-dismissible" role="start">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                <?php
                      echo $emailError . '<br/>';
                ?>
            </div>
            <?php } ?>
            <span class="asterisx">*</span>
              <div class="alert alert-danger custom-alert">
                  Please Type A Valid Email!
              </div>
          </div>

          <div class="form-group">
            <input class="mobile form-control" type="number" name="mobile" value="<?php if (isset($mobile)) {
              echo $mobile;
            } ?>" placeholder="Type Your Mobile number">
            <i class="fa-solid fa-phone fa-fw"></i>
            <?php if (!empty($mobileError)) { ?>
            <div class="alert alert-danger alert-dismissible" role="start">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
                <?php
                      echo $mobileError . '<br/>';
                ?>
            </div>
            <?php } ?>
            <span class="asterisx">*</span>
              <div class="alert alert-danger custom-alert">
                Please Type A Valid Phone Number!
              </div>
          </div>
          
          <div class="form-group">
            <textarea class="message form-control" name="message" rows="8" cols="80" placeholder="Your Message!"><?php if (isset($message)) {
              echo $message;
            } ?></textarea>
            <?php if (!empty($messageError)) { ?>
            <div class="alert alert-danger alert-dismissible" role="start">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php
                  echo $messageError . '<br/>';
            ?>
          </div>
          <?php } ?>
          <span class="asterisx">*</span>
            <div class="alert alert-danger custom-alert">
              The Message Must Be More Than 20 Characters!
            </div>
          </div>


            <input class="btn btn-success" type="submit" name="Send" value="Send Message">
            <i class="fa-solid fa-paper-plane submit-icon fa-fw"></i>
      </form>
    </div>
    <script src="jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../JavaScript/contact.js"></script>
  </body>
</html>
