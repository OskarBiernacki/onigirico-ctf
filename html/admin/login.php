<?php
$hardcoded_username = "admin";
$hardcoded_password = "adminLoveOnigiri+TryHarder!";


if (!isset($_COOKIE['admin_authenticated'])) {
    setcookie('admin_authenticated', 'false', time() + 3600, '/');
}
if (isset($_COOKIE['admin_authenticated']) && $_COOKIE['admin_authenticated'] === 'true') {
    header('Location: panel.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $hardcoded_username && $password === $hardcoded_password) {
        setcookie('admin_authenticated', 'true', time() + 3600, '/');
        header('Location: panel.php');
        exit;
    } else {
        setcookie('admin_authenticated', 'false', time() + 3600, '/');
        $error_message = "Niepoprawny login lub hasło!";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel logowania</title>
    <link rel="stylesheet" href="styles-login.css">
</head>
<body>
    <div class="login-container">
        <h1>🍙 OniGiriCo</h1>
        <?php if (isset($error_message)): ?>
            <p class="error"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Login:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Zaloguj</button>
        </form>
    </div>
    <!-- Naprawić panel logowania. Zabezpieczenia są fatalne! -->
</body>
</html>
