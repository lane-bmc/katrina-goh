<?php
if(isset($_POST['email'])) {
 
    $email_to = "lane.bmc@gmail.com";
    $email_subject = "Make It Lane Contact Form";
 
    function died($error) {
        // your error code can go here
        echo "Sorry, but there seems to be a problem with the form you submitted. ";
        echo $error."<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Sorry, but there seems to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The email address you entered does not seem to be valid.';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  } 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | Katrina Goh - Soprano + Educator</title>

    <link href="css/main.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"> <!-- Favicon -->
  </head>





  <body>


      <!-- Header -->

      <!-- Main Navigation -->
      <header>
        <div class="wrapper">  
          <nav>
            <a href="index.html"><img src="img/logo-nav.png" alt="Katrina Goh's logo."></a>

            <a href="#menu" id="toggle"><span></span></a>
            <div id="menu">
              <ul>
                <li><a href="index.html">About</a></li>
                <li><a href="press.html">Press</a></li>
                <li><a href="schedule.html">Schedule</a></li>
                <li><a href="media.html">Media</a></li>
                <li><a href="repertoire.html">Repertoire</a></li>
                <li><a href="teaching.html">Teaching</a></li>
                <li><a href="contact.html" class="nav-link-current">Contact</a></li>
              </ul>
            </div>
          </nav>
        </div>
        <img class="banner-image" id="banner-small" src="img/placeholder-banner.jpg">
        <img class="banner-image" id="banner-medium" src="img/placeholder-banner-1280.jpg">
        <img class="banner-image" id="banner-large" src="img/placeholder-banner-1920.jpg">
      </header>


      <!-- Main layout -->
      <div class="wrapper">  
        <section id="contact" class="container">
          <div class="col-2of3 col-1of2-sm">
            <h1>Thanks for your email!</h1>
            <p>I'll get back to you as soon as I can!</p>
            <form id="contact-form" name="contact-form" method="post" action="php/contact.php">
            <div>
              <label for="name">
                <span>Name</span><br/>
                <input name="name" placeholder="Your name" type="text" tabindex="1" required>
              </label>
            </div>
            <div>
              <label for="email">
                <span>Email</span><br/>
                <input name="email" placeholder="Your email address" type="email" tabindex="2" required>
              </label>
            </div>
            <div>
              <label for="message">
                <span>Message</span><br/>
                <textarea name="message" placeholder="Your email message" tabindex="3" required></textarea>
              </label>
            </div>
            <div>
              <button name="submit" type="submit" id="contact-submit">Send Email</button>
            </div>
          </form>
          </div>
          <div class="col-1of3 col-1of2-sm">
          </div>
        </section>
      </div>


    <!-- Footer -->
    <div class="wrapper">
      <footer>
        <p>©2017 Katrina Goh. Designed and maintained by <a href="http://www.brendan-lane.com" target="_blank">Brendan Lane</a>.</p>
      </footer>
    </div>    

  </body>

  <script type="text/javascript" src="js/toggle.js"></script>
</html>
 
<?php
 
}
?>