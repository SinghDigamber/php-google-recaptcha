<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>PHP Contact Form with Captcha</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <div class="container mt-5">
    
    <h2>Implement Google reCAPTCHA in PHP Contact Form</h2>

    <?php include('scripts/form.php'); ?>

    <!-- Error messages -->
    <?php if(!empty($response)) {?>
    <div class="form-group col-12 text-center">
      <div class="alert text-center <?php echo $response['status']; ?>">
        <?php echo $response['message']; ?>
      </div>
    </div>
    <?php }?>

    <!-- Contact form -->
    <form action="" name="contactForm" id="contactForm" method="post" enctype="multipart/form-data" novalidate>
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>

      <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control" name="subject" id="subject">
      </div>

      <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" rows="4" name="message" id="message"></textarea>
      </div>

      <div class="form-group">
        <!-- Google reCAPTCHA block -->
        <div class="g-recaptcha" data-sitekey="Your_Secret_Key"></div>
      </div>

      <div class="form-group">
        <input type="submit" name="send" value="Send" class="btn btn-dark btn-block">        
      </div>
    </form>
  </div>

  <!-- Google reCaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>