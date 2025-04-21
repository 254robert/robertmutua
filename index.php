<?php
// Receive information from the contact form and email
$successMessage = $errorMessage = ""; // Initialize variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email configuration
    $to = "robertmutua95@gmail.com";
    $subject = "New Contact Form Submission from $name";
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        $successMessage = "Your message has been sent successfully!";
    } else {
        $errorMessage = "There was an error sending your message. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Portfolio</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .message-container {
      position: relative;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .message-container.success {
      background-color: #d4edda;
      color: #155724;
    }
    .message-container.error {
      background-color: #f8d7da;
      color: #721c24;
    }
    .close-btn {
      position: absolute;
      top: 5px;
      right: 10px;
      background: none;
      border: none;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- Contact Section -->
  <section id="contact">
    <h2>Contact Me</h2>
    <?php if (!empty($successMessage)) : ?>
        <div class="message-container success">
            <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
            <?php echo $successMessage; ?>
        </div>
    <?php elseif (!empty($errorMessage)) : ?>
        <div class="message-container error">
            <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <form id="contact-form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" id="name" name="name" placeholder="Your Name" required>
        <input type="email" id="email" name="email" placeholder="Your Email" required>
        <textarea id="message" name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
    </form>
  </section>

  <script src="script.js"></script>
</body>
</html>
