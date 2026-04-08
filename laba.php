<?php


$arr1 = ['a', 'b', 'c', 'd', 'e'];
$result1 = array_map('strtoupper', $arr1);
print_r($result1); 
echo "" . "<br>";

$arr2 = [10, 20, 30, 40, 50];
$lastIndex = count($arr2) - 1;
echo "Последний элемент: " . $arr2[$lastIndex] . "". "<br>";

$arr3 = [1, 5, 8, 3, 9];
if (in_array(3, $arr3)) {
    echo "Элемент со значением 3 найден". "<br>";
} else {
    echo "Элемент со значением 3 не найден". "<br>";
}


$arr4a = [1, 2, 3];
$arr4b = ['a', 'b', 'c'];
$result4 = array_merge($arr4a, $arr4b);
print_r($result4); 

$arr5 = [1, 2, 3, 4, 5];
$result5 = array_slice($arr5, 1, 3);
print_r($result5); 
echo "". "<br>";

$arr6 = ['a' => 1, 'b' => 2, 'c' => 3];
$keys = array_keys($arr6);
$values = array_values($arr6);
print_r($keys);   
echo "". "<br>";
print_r($values); 
echo "". "<br>";

$arr7a = ['a', 'b', 'c'];
$arr7b = [1, 2, 3];
$result7 = array_combine($arr7a, $arr7b);
print_r($result7); 
echo "". "<br>";
$arr8 = ['a', '-', 'b', '-', 'c', '-', 'd'];
$position = array_search('-', $arr8);
echo "Позиция первого элемента '-': " . $position . "". "<br>";

$arr9 = [3 => 'a', 1 => 'c', 2 => 'e', 4 => 'b'];
echo "Исходный массив: ";
print_r($arr9);
echo "". "<br>";
$sorted1 = $arr9;
sort($sorted1);
echo "sort(): ";
print_r($sorted1);
echo "". "<br>";

$sorted2 = $arr9;
asort($sorted2);
echo "asort(): ";
print_r($sorted2);
echo "". "<br>";

$sorted3 = $arr9;
ksort($sorted3);
echo "ksort(): ";
print_r($sorted3);
echo "". "<br>";

$sorted4 = $arr9;
rsort($sorted4);
echo "rsort(): ";
print_r($sorted4);
echo "". "<br>";

$sorted5 = $arr9;
arsort($sorted5);
echo "arsort(): ". "<br>";
print_r($sorted5);
echo "". "<br>";

$sorted6 = $arr9;
krsort($sorted6);
echo "krsort(): ";
print_r($sorted6);
echo "". "<br>";

$str10 = '1234567890';
$arr10 = str_split($str10);
$sum10 = array_sum($arr10);
echo "Сумма цифр строки '1234567890': " . $sum10 . "". "<br>";


$arr11 = array_fill(0, 10, 'x');
print_r($arr11); 
echo "". "<br>";


$arr12a = [1, 2, 3, 4, 5];
$arr12b = [3, 4, 5, 6, 7];
$result12 = array_intersect($arr12a, $arr12b);
print_r($result12); 
echo "". "<br>";

$arr12a2 = [1, 2, 3, 4, 5];
$arr12b2 = [3, 4, 5, 6, 7];
$merged = array_merge($arr12a2, $arr12b2);
$countGreaterThan3 = 0;
foreach ($merged as $value) {
    if ($value > 3) {
        $countGreaterThan3++;
    }
}
echo "Количество элементов, которые больше 3 в объединенном массиве: " . $countGreaterThan3 . "". "<br>";
?>





