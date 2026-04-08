<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .calculator {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
        }
        .user-info {
            background: #e8f5e9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            color: #2e7d32;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .buttons {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        button {
            flex: 1;
            padding: 12px;
            font-size: 20px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        button[name="operation"][value="add"] {
            background-color: #4CAF50;
            color: white;
        }
        button[name="operation"][value="subtract"] {
            background-color: #2196F3;
            color: white;
        }
        button[name="operation"][value="multiply"] {
            background-color: #FF9800;
            color: white;
        }
        button[name="operation"][value="divide"] {
            background-color: #f44336;
            color: white;
        }
        button:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f5e9;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .error {
            background-color: #ffebee;
            color: #c62828;
        }
        .logout {
            text-align: right;
            margin-bottom: 10px;
        }
        .logout a {
            color: #f44336;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <div class="logout">
            <a href="logout.php">Выйти</a>
        </div>
        <div class="user-info">
            Добро пожаловать, <?php echo htmlspecialchars($user['name']); ?>! (<?php echo htmlspecialchars($user['email']); ?>)
        </div>
        
        <h2>Калькулятор</h2>
        
        <form method="POST" action="">
            <div class="input-group">
                <label for="num1">Первое число:</label>
                <input type="number" name="num1" id="num1" step="any" required 
                       value="<?php echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; ?>">
            </div>
            
            <div class="input-group">
                <label for="num2">Второе число:</label>
                <input type="number" name="num2" id="num2" step="any" required
                       val


ue="<?php echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; ?>">
            </div>
            
            <div class="buttons">
                <button type="submit" name="operation" value="add">+</button>
                <button type="submit" name="operation" value="subtract">-</button>
                <button type="submit" name="operation" value="multiply">*</button>
                <button type="submit" name="operation" value="divide">/</button>
            </div>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operation'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = null;
            $error = null;
            
            // Проверка на пустые значения
            if ($num1 === '' || $num2 === '') {
                $error = 'Пожалуйста, заполните оба поля!';
            } else {
                // Преобразуем в числа
                $num1 = (float)$num1;
                $num2 = (float)$num2;
                
                // Выполняем операцию
                switch ($operation) {
                    case 'add':
                        $result = $num1 + $num2;
                        $operator = '+';
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        $operator = '-';
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        $operator = '*';
                        break;
                    case 'divide':
                        if ($num2 == 0) {
                            $error = 'Ошибка: деление на ноль невозможно!';
                        } else {
                            $result = $num1 / $num2;
                            $operator = '/';
                        }
                        break;
                    default:
                        $error = 'Неизвестная операция';
                }
            }
            
            // Выводим результат или ошибку
            if ($error) {
                echo '<div class="result error">' . htmlspecialchars($error) . '</div>';
            } elseif ($result !== null) {
                echo '<div class="result">';
                echo htmlspecialchars($num1) . ' ' . $operator . ' ' . htmlspecialchars($num2) . ' = ' . htmlspecialchars($result);
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>



