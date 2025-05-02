<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    $to      = "bbatsuuri351@gmail.com"; // 🌟 Таны и-мэйл хаяг
    $subject = "Шинэ зурвас хүлээн авлаа";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Нэр: $name\n";
    $body .= "И-мэйл: $email\n\n";
    $body .= "Зурвас:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
        $success = true;
    } else {
        $error = "Зурвас илгээхэд алдаа гарлаа. Дахин оролдоно уу.";
    }
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Холбоо Барих</title>
  <link rel="stylesheet" href="contact.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <header>
    <h1>Холбоо Барих</h1>
    <nav>
      <a href="index.html">🏠 Нүүр</a>
      <a href="blog.html">📝 Блог</a>
      <a href="cv.html">📄 CV</a>
    </nav>
    <button id="modeToggle">🌙 / ☀️</button>
  </header>

  <main>
    <section class="contact">
      <h2>🧾 Холбоо барих мэдээлэл</h2>
      
      <ul class="contact-info">
        <li><i class="fas fa-phone-alt"></i> <span>+976 89715599</span></li>
        <li><i class="fas fa-envelope"></i> <span>bbatsuuri351@gmail.com</span></li>
      </ul>

      <div class="contact-icons">
        <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank" title="Gmail" class="icon gmail">
          <i class="fas fa-envelope"></i>
        </a>
        <a href="https://www.facebook.com/" target="_blank" title="Facebook" class="icon facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
      </div>

      <h3>📬 Зурвас илгээх</h3>

      <?php if (!empty($success)): ?>
        <p style="color:green;">✅ Таны зурвас амжилттай илгээгдлээ. Баярлалаа!</p>
      <?php elseif (!empty($error)): ?>
        <p style="color:red;">❌ <?= $error ?></p>
      <?php endif; ?>

      <form method="POST" action="">
        <input type="text" name="name" placeholder="Таны нэр" required />
        <input type="email" name="email" placeholder="И-мэйл хаяг" required />
        <textarea name="message" placeholder="Таны зурвас..." required></textarea>
        <button type="submit">Илгээх</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2025</p>
  </footer>

  <script>
    const modeToggle = document.getElementById('modeToggle');
    const body = document.body;
    modeToggle.addEventListener('click', () => {
      body.classList.toggle('dark-mode');
    });
  </script>
</body>
</html>
