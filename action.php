<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат регистрации</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Проверяем наличие email и password
            if (isset($_POST['email']) && isset($_POST['password']) && 
                isset($_POST['name']) && isset($_POST['confirm_password'])) {
                
                $email = trim($_POST['email']);
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $name = trim($_POST['name']);
                $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
                
                $errors = [];
                
                // Валидация
                if (empty($email)) {
                    $errors[] = "Email не может быть пустым";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Неверный формат email";
                }
                
                if (empty($password)) {
                    $errors[] = "Пароль не может быть пустым";
                } elseif (strlen($password) < 6) {
                    $errors[] = "Пароль должен содержать минимум 6 символов";
                }
                
                if ($password !== $confirm_password) {
                    $errors[] = "Пароли не совпадают";
                }
                
                if (empty($name)) {
                    $errors[] = "Имя не может быть пустым";
                }
                
                if (empty($gender)) {
                    $errors[] = "Выберите пол";
                }
                
                // Выводим результат
                if (empty($errors)) {
                    echo '<div class="message success">✓ Регистрация успешно завершена!</div>';
                    echo '<div class="data-display">';
                    echo '<h3>Введенные данные:</h3>';
                    echo '<p><strong>Имя:</strong> ' . htmlspecialchars($name) . '</p>';
                    echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
                    echo '<p><strong>Пол:</strong> ' . ($gender == 'male' ? 'Мужской' : 'Женский') . '</p>';
                    echo '<p><em>Пароль успешно установлен</em></p>';
                    echo '</div>';
                } else {
                    echo '<div class="message error">';
                    echo '<strong>Ошибки валидации:</strong>
';
                    foreach ($errors as $error) {
                        echo '• ' . $error . '
';
                    }
                    echo '</div>';
                }
            } else {
                echo '<div class="message error">Ошибка: Не все обязательные поля заполнены!</div>';
            }
        } else {
            echo '<div class="message error">Доступ запрещен!</div>';
        }
        ?>
        <a href="index.php" class="btn back-link">← Вернуться к форме</a>
    </div>
</body>
</html>
