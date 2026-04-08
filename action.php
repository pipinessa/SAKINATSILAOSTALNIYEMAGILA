<?php
session_start();

// Проверяем, была ли отправлена форма методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Получаем данные из формы
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $country = isset($_POST['country']) ? trim($_POST['country']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    
    $errors = [];
    
    // Валидация имени
    if (empty($name)) {
        $errors[] = "Имя обязательно для заполнения";
    } elseif (strlen($name) < 2) {
        $errors[] = "Имя должно содержать минимум 2 символа";
    }
    
    // Валидация email
    if (empty($email)) {
        $errors[] = "Email обязателен для заполнения";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введите корректный email адрес";
    }
    
    // Валидация страны
    if (empty($country)) {
        $errors[] = "Выберите страну";
    }
    
    // Валидация пароля
    if (empty($password)) {
        $errors[] = "Пароль обязателен для заполнения";
    } elseif (strlen($password) < 6) {
        $errors[] = "Пароль должен содержать минимум 6 символов";
    }
    
    // Проверка совпадения паролей
    if ($password !== $confirm_password) {
        $errors[] = "Пароли не совпадают";
    }
    
    // Если есть ошибки, сохраняем в сессию и возвращаем на форму
    if (!empty($errors)) {
        $_SESSION['error'] = implode("
", $errors);
        header("Location: index.php");
        exit();
    }
    
    // Если валидация прошла успешно, сохраняем данные пользователя в сессию
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email,
        'country' => $country
    ];
    
    // Перенаправляем на калькулятор
    header("Location: calculator.php");
    exit();
    
} else {
    // Если не POST запрос, перенаправляем на форму регистрации
    header("Location: index.php");
    exit();
}
?>





