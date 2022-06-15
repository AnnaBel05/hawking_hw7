<h1> Сортировки </h1>

<?php

// require_once('HomeController.php');

use Services\SortService;

$arr = array();
for ($i = 0; $i < 100; $i++)
{
    $arr[$i] = rand();
}

var_dump($arr);

try
{
    SortService::bubbleSort($arr);
}
catch (Exception $ex)
{
    echo $ex->getMessage;
}

// $bubbleArr = $sortService->bubbleSort($arr);
// $insertArr = $sortService->insertSort($arr);
// $mergeArr = $sortService->mergeSort($arr);
// $quickArr = $sortService->quickSort($arr);
// $choiceArr = $sortService->choiceSort($arr);

// echo "Оригинальный массив <br>";
// var_dump($arr);
// echo "<br> Сортировка пузырьком <br>";
// var_dump($bubbleArr);
// echo "<br> Сортировка вставками <br>";
// var_dump($insertArr);
// echo "<br> Сортировка слиянием <br>";
// var_dump($mergeArr);
// echo "<br> Быстрая сортировка <br>";
// var_dump($quickArr);
// echo "<br> Сортировка выбором <br>";
// var_dump($choiceArr);

?>