<!DOCTYPE html>
<html lang=»ru»>
<head>
    <meta charset=»UTF-8»>
    <meta name=»viewport» content=»width=device-width, initial-scale=1.0»>
    <title>Регистрация</title>
    <link rel=»stylesheet» href=»style.css»>
</head>
<body>
    <div class=»container»>
        <h1>Регистрация</h1>
        
        <form action=»action.php» method=»POST»>
            <div class=»form-group»>
                <label for=»name»><strong>Имя:</strong></label>
                <input type=»text» id=»name» name=»name» placeholder=»Введите имя» required>
            </div>
            
            <div class=»form-group»>
                <label for=»email»><strong>Почта:</strong></label>
                <input type=»email» id=»email» name=»email» placeholder=»name@example.ru» required>
            </div>
            
            <div class=»form-group»>
                <label for=»password»><strong>Пароль:</strong></label>
                <input type=»password» id=»password» name=»password» placeholder=»Введите пароль» required>
            </div>
            
            <div class=»form-group»>
                <label for=»confirm_password»><strong>Подтвердите пароль:</strong></label>
                <input type=»password» id=»confirm_password» name=»confirm_password» placeholder=»Повторите пароль» required>
            </div>
            
            <div class=»form-group»>
                <label for=»gender»><strong>Пол:</strong></label>
                <select id=»gender» name=»gender» required>
                    <option value=»» disabled selected>Выберите пол</option>
                    <option value=»male»>Мужской</option>
                    <option value=»female»>Женский</option>
                </select>
            </div>
            
            <!—Чекбокс с ссылками 
            <div class=»checkbox-group»>
                <input type=»checkbox» id=»terms» name=»terms» required>
                <label for=»terms» class=»checkbox-label»>
                    Создавая учетную запись вы соглашаетесь с нашими 
                    <a href=»/terms» class=»terms-link» target=»_blank»>Условиями</a> 
                    И 
                    <a href=»/privacy» class=»terms-link» target=»_blank»>конфиденциальностью</a>
                </label>
            </div>
            
            <button type=»submit» class=»btn»>Зарегистрироваться</button>
        </form>
        
        <p class=»note»>Создайте учетную запись, на которую ссылаетесь с вашим GitHub и используйте для регистрации.</p>
    </div>
</body>
</html>

