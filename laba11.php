<?php
//Задание 1, 2. 
touch("test.txt");
$fd = fopen("test.txt", 'w') or die("не удалось создать файл.<br>");
$str = "Привет мир";
fputs($fd, $str);
fclose($fd);
$fd = fopen("test.txt", 'r') or die("не удалось открыть файл.<br>");
while(!feof($fd))
{
    $str = htmlentities(fgets($fd));
    echo $str. "<br>";
}
//Задание 3. 
fclose($fd);
$old_name = 'test.txt'; 
$new_name = 'mir.txt';
if(rename($old_name, $new_name)) {
    echo "Файл успешно переименован.<br>";
 }else {
    echo "Ошибка при переименовании.<br>";
}
//Задание 4. 
if(!is_dir('folder'))
{
    mkdir('folder');
    echo "Папка 'folder' создана.<br>";
}
rename('mir.txt', 'folder/mir.txt');
echo "Файл mir.txt перемещен в папку folder.<br>";
//Задание 5. 
copy('folder/mir.txt', 'folder/world.txt'); 
echo "Копия: world.txt <br>";
//Задание 6.
$sizeBytes = filesize('folder/world.txt');
$sizeMB = $sizeBytes / 1024 / 1024;
$sizeGB = $sizeBytes / 1024 / 1024 / 1024;
echo "Размер в байтах: " . $sizeBytes . " байт.<br>";
//Задание 7. 
unlink('folder/world.txt');
echo "Файл world.txt удален.<br>";
// Задание 8. 
$worldExists = file_exists('folder/world.txt');
$mirExists = file_exists('folder/mir.txt');
echo "Файл world.txt " . ($worldExists ? "существует" : "не существует.<br>");
echo "Файл mir.txt " . ($mirExists ? "существует" : "не существует.<br>");

// Часть 2. Задание 1. 
if (!is_dir('test')) {
    mkdir('test');
    echo "Папка 'test' создана.<br>";
} else {
    echo "Папка 'test' уже существует.<br>";
}
echo "<br>";

// Задание 2. 
if (is_dir('test')) {
    rename('test', 'www');
    echo "Папка переименована в 'www'.<br>";
} else {
    echo "Папка 'test' не найдена.<br>";
}
echo "\n";

// Задание 3. 
if (is_dir('www')) {
    rmdir('www');
    echo "Папка 'www' удалена.<br>";
} else {
    echo "Папка 'www' не найдена.<br>";
}
echo "<br>";

// Задание 4.
if (!is_dir('test')) {
    mkdir('test');
    echo "Папка 'test' создана.<br>";
}

$folders = ['folder1', 'folder2', 'folder3', 'images', 'docs'];

foreach ($folders as $folderName) {
    $path = 'test/' . $folderName;
    if (!is_dir($path)) {
        mkdir($path);
        echo "Создана папка: $path<br>";
    } else {
        echo "Папка уже существует: $path<br>";
    }
}
echo ".<br>";

// Задание 5. 
$testFiles = ['photo.jpg', 'image.jpg', 'test.png', 'document.pdf'];
foreach ($testFiles as $file) {
    if (!file_exists($file) && str_ends_with($file, '.jpg')) {
        file_put_contents($file, 'Test content');
    }
}
function findJpgFiles($directory = '.') {
    $jpgFiles = [];
    $items = scandir($directory);
    
    foreach ($items as $item) {


if ($item == '.' || $item == '..') {
            continue;
        }
        
        $path = $directory . '/' . $item;
        
        if (is_dir($path)) {
            $jpgFiles = array_merge($jpgFiles, findJpgFiles($path));
        } elseif (is_file($path) && preg_match('/\.jpg$/i', $item)) {
            $jpgFiles[] = $path;
        }
    }
    
    return $jpgFiles;
}

$jpgFiles = findJpgFiles('.');
if (count($jpgFiles) > 0) {
    echo "Найдены .jpg файлы:\n";
    foreach ($jpgFiles as $file) {
        echo "  - " . $file . "\n";
    }
} else {
    echo "Файлы с расширением .jpg не найдены.\n";
}
?>

