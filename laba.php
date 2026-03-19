<?php
echo "<br>Задача 1:<br>";
function mul($a, $b) {
    return $a * $b;
}

function m1($a, $b) {
    return mul($a, $b);
}

function m2($a, $b) {
    $result = function() use ($a, $b) {
        return mul($a, $b);
    };
    return $result();
}

echo "mul(5, 3) = " . mul(5, 3) . "<br>";
echo "m1(5, 3) = " . m1(5, 3) . "<br>";
echo "m2(5, 3) = " . m2(5, 3) . "<br>";

echo "<br> Задача 2: <br>";
function operation($m, $n, $o) {
    if (is_callable($o)) {
        return $o($m, $n);
    }
    return "Ошибка: третий аргумент должен быть функцией";
}

$sum = fn($a, $b) => $a + $b;
$product = fn($a, $b) => $a * $b;

echo "Сумма: " . operation(10, 5, $sum) . "<br>";
echo "Произведение: " . operation(10, 5, $product) . "<br>";

echo "<br> Задача 3: <br>";
function array_map_custom($fn, $array) {
    $result = [];
    foreach ($array as $item) {
        $result[] = $fn($item);
    }
    return $result;
}

$numbers = [1, 2, 3, 4, 5];
$square = fn($x) => $x * $x;
print_r(array_map_custom($square, $numbers));

echo "<br> Задача 4:<br>";
$password = "mySecret123";
echo "Пароль '" . $password . "': ";
if (strlen($password) > 5 && strlen($password) < 10) {
    echo "Пароль подходит <br>";
} else {
    echo "Нужно придумать другой пароль <br>";
}

echo "<br> Задача 5: <br>";
$url = "https://example.com";
echo "URL '" . $url . "': ";
echo (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) ? 'да' : 'нет';
echo "<br>";

echo "<br> Задача 6: Проверка .png или .jpg <br>";
$file = "image.jpg";
echo "Файл '" . $file . "': ";
echo (substr($file, -4) === '.png' || substr($file, -4) === '.jpg') ? 'да' : 'нет';
echo "<br>";

echo "<br> Задача 7: Замена точек на дефисы <br>";
$date = '16.04.2021';
echo "Было: $date, стало: " . str_replace('.', '-', $date) . "<br>";

echo "<br> Задача 8: explode()<br>";
$str = 'html css php';
print_r(explode(' ', $str));

echo "<br> Задача 9: implode() <br>";
$array = ['html', 'css', 'php'];
echo implode(',', $array) . "<br>";
?>
