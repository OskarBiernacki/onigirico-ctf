<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message']) && isset($_POST['email']) && isset($_POST['name'])) {
    $message = "name: " . $_POST['name']."\n";
    $message .= "email: " . $_POST['email']."\n";
    $message .= "messages:\n" . $_POST['message'];

    //Filtry!!!
    $filteredMessage = strip_tags($message);
    $filteredMessage = htmlspecialchars($filteredMessage, ENT_QUOTES | ENT_HTML5);

    $directory = __DIR__ . '/messages412/';
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    $fileIndex = 1;
    while (file_exists($directory . $fileIndex . '.txt')) {
        $fileIndex++;
    }

    $filePath = $directory . $fileIndex . '.txt';
    file_put_contents($filePath, $filteredMessage);
} else {
    echo "It's not here. Try harder";
}

header('Location: index.html?status=success');
exit;
?>