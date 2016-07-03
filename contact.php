<?php
  if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        // $human = intval($_POST['human']);
        // $from = $_POST['name'];
        $to = "robinchoii@gmail.com";
        $subject = "Message from" + $name;
        $headers = 'From: robinchoii@gmail.com' . "\r\n" .
                   'Reply-To: $email' . "\r\n" .
                  'X-Mailer: PHP/' . phpversion();

        $body = "From: $name\n <{$email}>\n E-Mail: $email\n Message:\n $message";

        // mail($to, $subject, $body, $headers)

      // <!-- Check if a name has been entered -->
      if (!$_POST['name']) {
        $errName = "Please enter your name";
      }
      // <!-- Check if email has be entered and is valid -->
      if (!$_POST['email'] || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Please enter a valid email address";
      }
      // <!-- Check is message has been entered -->
      if (!$_POST['message']) {
        $errMessage = "Please enter a message";
      }
      // <!-- Check if human is a bot or not -->
      // if ($human !== 5) {
      //   $errHuman = "Human or no?";
      // }
// if there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage) {
  if(mail ($to, $subject, $body, $headers)) {
    $result = "<div class="alert alert-success">Thank you! I will keep in touch</div>";
  } else {
    $result = "<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again.</div>";
  }
}
    }
?>