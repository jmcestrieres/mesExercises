<?php
require_once '/recaptcha/autoload.php';
$recaptcha = new \ReCaptcha\ReCaptcha('6LcWSNYUAAAAAGXHFsRId5619wmFmYmvbHjXn4kU');
$resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')
                  ->verify($gRecaptchaResponse, $remoteIp);
if ($resp->isSuccess()) {
    // Verified!
} else {
    $errors = $resp->getErrorCodes();
}
?>


<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <form method="POST">
      <div class="g-recaptcha" data-sitekey="6LcWSNYUAAAAANk6ZNbXUuK_RQ6zUnCwlKuCZQvV"></div>
      <br/>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>