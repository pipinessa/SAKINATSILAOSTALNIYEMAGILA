<?php
// 1. 
$timestamp = mktime(10, 25, 0, 3, 15, 2025);
echo "Timestamp: " . $timestamp . "<br>";

// 2. 
$dateOld = mktime(8, 5, 59, 10, 2, 1990);
$now = time();
$diffSeconds = $now - $dateOld;
echo "Разница в секундах: " . $diffSeconds . "<br>";

// 3. 
echo date("Y.m.d H:i:s") . "<br>";

// 4.
$septFirst = mktime(0, 0, 0, 9, 1, date("Y"));
echo date("Y.m.d", $septFirst) . "<br>";

// 5. 
echo date("l", mktime(0, 0, 0, 2, 2, 2000)) . "<br>";

// 6. 
$week = [
    1 => "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"
];
$currentDayNum = date("N"); 
echo "Сегодня: " . $week[$currentDayNum] . "<br>";

// 7. 
$birthday = "12.06.2016";
$dateParts = explode(".", $birthday);
$timestampBD = mktime(0, 0, 0, $dateParts[1], $dateParts[0], $dateParts[2]);
echo "День рождения 12.06.2016 был: " . date("l", $timestampBD) . "<br>";

// 8. 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];
    $timestamp1 = strtotime($date1);
    $timestamp2 = strtotime($date2);
    if ($timestamp1 > $timestamp2) {
        echo "Большая дата: $date1";
    } elseif ($timestamp2 > $timestamp1) {
        echo "Большая дата: $date2";
    } else {
        echo "Даты равны" . "<br>";
    }
}
?>
<form method="post">
    <input type="date" name="date1" required>
    <input type="date" name="date2" required>
    <button type="submit">Сравнить</button>
</form>

<?php
// 9. 
$dateHyphen = "2025-12-31";
$timestampHyphen = strtotime($dateHyphen);
echo date("d-m-Y", $timestampHyphen) . "<br>";

// 10. 
$date = "2000.02.03";
$ts = strtotime($date);
$ts = strtotime("+2 days", $ts);
$ts = strtotime("+1 month", $ts);
$ts = strtotime("+3 days", $ts);
$ts = strtotime("+1 year", $ts);
$ts = strtotime("-3 days", $ts);
echo "Результат: " . date("Y.m.d", $ts) . "<br>";

// 11. 
$now = time();
$newYear = mktime(0, 0, 0, 1, 1, date("Y") + 1);
$daysLeft = ceil(($newYear - $now) / 86400);
echo "До Нового года осталось $daysLeft дней.<br>";
?>
