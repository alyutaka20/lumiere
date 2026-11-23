
<?php

// =================================
// LUMIÈRE お問い合わせ処理
// =================================

// POST送信された場合だけ処理する
if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    // 直接アクセスされた場合はフォームへ戻す
    header("Location: contact.html");
    exit;
}

// フォームから送信された情報を受け取る
$name = trim($_POST["your-name"] ?? "");
$email = trim($_POST["your-email"] ?? "");

// =================================
// 入力チェック
// =================================

// エラーメッセージを入れる変数
$error_message = "";

// 名前が空欄の場合
if ($name === "") {
    $error_message = "お名前を入力してください。";
}

// メールアドレスが空欄の場合
elseif ($email === "") {
    $error_message = "メールアドレスを入力してください。";
}

// メールアドレスの形式を確認
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_message = "正しいメールアドレスを入力してください。";
}

// エラーがある場合はエラー画面へ移動
if ($error_message !== "") {
    header("Location: error.php?message=" . urlencode($error_message));
    exit;
}

// 入力に問題がなければ完了画面へ移動
header("Location: thanks.html");
exit;

?>
