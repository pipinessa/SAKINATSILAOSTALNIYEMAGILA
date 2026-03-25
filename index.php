<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .registration-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        select {
            background-color: white;
        }
        .error {
            color: #f44336;
            font-size: 14px;
            margin-top: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s;
        }
        button:hover {
            transform: scale(1.02);
        }
        .success {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <h2>Регистрация</h2>
        
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo '<div class="error" style="background: #ffebee; padding: 10px; border-radius: 5px; margin-bottom: 20px; text-align: center;">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>
        
        <form method="POST" action="action.php">
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" name="name" id="name" required placeholder="Введите имя">
            </div>
            
            <div class="form-group">
                <label for="email">Почта:</label>
                <input type="email" name="email" id="email" required placeholder="name@example.ru">
            </div>
            
            <div class="form-group">
                <label for="country">Страна:</label>
                <select name="country" id="country" required>
                    <option value="">Выберите страну</option>
                    <option value="Россия">Россия</option>
                    <option value="Украина">Украина</option>
                    <option value="Беларусь">Беларусь</option>
                    <option value="Казахстан">Казахстан</option>
                    <option value="Другое">Другое</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password" required placeholder="Введите пароль">
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Подтвердите пароль:</label>
                <input type="password" name="confirm_password" id="confirm_password" required placeholder="Подтвердите пароль">
            </div>


<button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>





