<?php
// URLからエラーメッセージを受け取る
// message が指定されていない場合は、初期メッセージを表示する
$error_message = $_GET["message"] ?? "入力内容を確認してください。";

// HTMLに表示しても安全な文字列に変換する
$error_message = htmlspecialchars(
    $error_message,
    ENT_QUOTES,
    "UTF-8"
);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>ERROR | LUMIÈRE</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/error.css">
</head>

<body>

  <!-- 共通ヘッダー -->
  <header class="site-header">
    <a href="index.html" class="site-logo">LUMIÈRE</a>

    <nav class="global-nav" aria-label="メインナビゲーション">
      <ul>
        <li><a href="index.html#home">TOP</a></li>
        <li><a href="index.html#concept">CONCEPT</a></li>
        <li><a href="index.html#menu">MENU</a></li>
        <li><a href="index.html#access">ACCESS</a></li>
      </ul>
    </nav>

    <a href="contact.html" class="header-contact">RESERVATION</a>
  </header>


  <!-- エラー表示エリア -->
  <main class="error-main">
    <div class="error-content">

      <p class="error-subtitle">ERROR</p>

      <h1 class="error-title">入力内容をご確認ください</h1>

      <p class="error-text">
        <?php echo $error_message; ?>
      </p>

      <a href="contact.html" class="error-button">
        BACK TO FORM
      </a>

    </div>
  </main>


  <!-- 共通フッター -->
  <footer class="site-footer">

    <a href="index.html" class="footer-logo">LUMIÈRE</a>

    <nav class="footer-nav" aria-label="フッターナビゲーション">
      <a href="index.html#home">TOP</a>
      <a href="index.html#concept">CONCEPT</a>
      <a href="index.html#menu">MENU</a>
      <a href="index.html#access">ACCESS</a>
    </nav>

    <p class="copyright">
      &copy; LUMIÈRE All Rights Reserved.
    </p>

  </footer>

</body>
</html>