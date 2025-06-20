<?php
if (!isset($_COOKIE['admin_authenticated']) || $_COOKIE['admin_authenticated'] !== 'true') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍙 OniGiriCo</title>
    <link rel="stylesheet" href="styles-panel.css">
</head>
<body>
    <div class="container">
        <h1>🍙 OniGiriCo ADMIN</h1>
        <div class="content-container">
        <form method="get">    
        <table>
            <thead>
                <tr>
                    <th>Wybierz</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $directory = '../messages412/';
                    if (is_dir($directory)) {
                        $files = array_reverse(scandir($directory));
                        foreach ($files as $file) {
                            if ($file !== '.' && $file !== '..' && is_file($directory . $file)) {
                                $email = 'unknown email';
                                $content=file_get_contents($directory . $file);
                                $lines = explode("\n", $content);
                                if (isset($lines[1])) {
                                    $secondLine = $lines[1];
                                    if (strlen($secondLine) > 7) {
                                        $email=substr($secondLine, 7);
                                    }
                                }
                                echo '<tr>';
                                echo '<td class="radio-button"><input type="radio" name="file" value="' . base64_encode(htmlspecialchars($file)) . '"></td>';
                                echo '<td>' . htmlspecialchars($email) . '</td>';
                                echo '</tr>';
                            }
                        }
                    } else {
                        echo '<li>Folder "messages" nie istnieje.</li>';
                    }
                ?>
            </tbody>
        </table>
        <button type="submit">Przeczytaj wiadomość</button>
        </form>
        <?php
            if (isset($_GET['file'])) {
                $file = base64_decode($_GET['file']);
                $path = "../messages412/" . $file;
                
                if (file_exists($path)) {
                    echo '<div class="file-content">';
                    echo "<strong>Wiadomość:</strong><br>";
                    echo nl2br(htmlspecialchars(file_get_contents($path)));
                    echo '</div>';
                } else {
                    echo '<div class="file-content">';
                    echo "<strong>Błąd:</strong> Plik nie istnieje!";
                    echo '</div>';
                }
            }else{
                echo '<div class="file-content">';
                echo '</div>';
            }
        ?>
        </div>
    </div>
</body>
</html>
