<?php
class Worker {
    public $name;
    private $age;      
    public $salary;

    private static $totalSalary = 0;
    private static $totalAge = 0;

    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->setAge($age);
        $this->salary = $salary;
        

        self::$totalSalary += $salary;
        self::$totalAge += $age;
    }
    
 
    public function getName() {
        return $this->name;
    }
    

    public function getAge() {
        return $this->age;
    }

    public function getSalary() {
        return $this->salary;
    }

    public static function getTotalSalary() {
        return self::$totalSalary;
    }
  
    public static function getTotalAge() {
        return self::$totalAge;
    }

    private function checkAge($newAge) {
        return $newAge >= 18;
    }

    public function setAge($newAge) {
        if ($this->checkAge($newAge)) {

            if (isset($this->age)) {
                self::$totalAge = self::$totalAge - $this->age + $newAge;
            }
            $this->age = $newAge;
            echo "Возраст успешно изменен на {$newAge}<br>";
            return true;
        } else {
            echo "Вам работать в нашей компании еще рано<br>";
            return false;
        }
    }
}


$worker1 = new Worker("Иван Петров", 25, 50000);
$worker2 = new Worker("Мария Сидорова", 19, 60000);


echo "Сумма зарплат работников: " . Worker::getTotalSalary() . "<br>";
echo "Сумма возрастов работников: " . Worker::getTotalAge() . "<br><br>";


echo "Работа методов getName, getAge, getSalary<br>";
echo "Работник 1: <br>";
echo "Имя: " . $worker1->getName() . "<br>";
echo "Возраст: " . $worker1->getAge() . "<br>";
echo "Зарплата: " . $worker1->getSalary() . "<br><br>";

echo "Работник 2: <br>";
echo "Имя: " . $worker2->getName() . "<br>";
echo "Возраст: " . $worker2->getAge() . "<br>";
echo "Зарплата: " . $worker2->getSalary() . "<br><br>";


echo "Сумма зарплат через getSalary (статический метод)<br>";
echo "Общая сумма зарплат: " . Worker::getTotalSalary() . "<br><br>";


echo " Тестирование метода setAge<br>";
echo "Попытка установить возраст 17 для работника 1:<br>";
$worker1->setAge(17);  
echo "Текущий возраст работника 1: " . $worker1->getAge() . "<br><br>";

echo "Попытка установить возраст 30 для работника 1:<br>";
$worker1->setAge(30);  
echo "Текущий возраст работника 1: " . $worker1->getAge() . "<br><br>";


echo " Проверка работы метода checkAge (приватный)<br>";
echo "Проверка через setAge для возраста 16:<br>";
$worker2->setAge(16);  
echo "Текущий возраст работника 2: " . $worker2->getAge() . "<br><br>";

echo "Проверка через setAge для возраста 21:<br>";
$worker2->setAge(21); 
echo "Текущий возраст работника 2: " . $worker2->getAge() . "<br>";


echo "<br> Обновленные суммы после изменений<br>";
echo "Новая сумма возрастов: " . Worker::getTotalAge() . "<br>";
echo "Сумма зарплат (не изменилась): " . Worker::getTotalSalary() . "<br>";
?>
