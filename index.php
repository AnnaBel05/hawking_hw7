<h1> Сортировки </h1>

<?php

// к сожалению, у меня возникли проблемы с реализацией через контроллер и обращение к функциям.
// пришлось так :(

$arr = array();
for ($i = 0; $i < 100; $i++)
{
    $arr[$i] = rand();
}

echo "<b>Оригинальный массив</b> ";
var_dump($arr); 
echo "<br> <br>";

echo "<b> Пузырьковая сортировка </b> ";
try
{
    $start = microtime(true);

        $count = count($arr);
        if ($count <= 1) {
            $finish = round(microtime(true) - $start, 4);
            $result = "<br> <b> Time: </b> " . $finish . "<br>" . var_dump($arr);
     
            echo $result;
        }
     
        for ($i = 0; $i < $count; $i++) {
            for ($j = $count - 1; $j > $i; $j--) {
                if ($arr[$j] < $arr[$j - 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j - 1];
                    $arr[$j - 1] = $tmp;
                }
            }
        }

        $finish = round(microtime(true) - $start, 4);

        $result = "<br> <b> Time: </b> " . $finish . "<br>" . var_dump($arr);

        echo $result;
}
catch (Exception $ex)
{
    echo $ex->getMessage;
}

echo "<br> <br>";
echo "<b> Сортировка вставками </b> ";

try
{
    $start = microtime(true);

        $count = count($arr);
        if ($count <= 1) {
            $finish = round(microtime(true) - $start, 4);
            $result = "<br> <b> Time: </b>" . $finish . "<br>" . var_dump($arr);
        
            echo $result;
        }
     
        for ($i = 1; $i < $count; $i++) {
            $cur_val = $arr[$i];
            $j = $i - 1;
     
            while (isset($arr[$j]) && $arr[$j] > $cur_val) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $cur_val;
                $j--;
            }
        }

        $finish = round(microtime(true) - $start, 4);
        $result = "<br> <b> Time: </b> " . $finish . "<br>" . var_dump($arr);
     
        echo $result;
}
catch (Exception $ex)
{
    echo $ex->getMessage;
}

echo "<br> <br>";
echo "<b> Сортировка слиянием </b> ";

try
{
    function mergeSort(array $arr) 
    {
        $start = microtime(true);

        $count = count($arr);
        if ($count <= 1) {
            $finish = round(microtime(true) - $start, 4);
            $result = "Time: " . $finish . "<br>";
        
            return $result;
        }
     
        $left  = array_slice($arr, 0, (int)($count/2));
        $right = array_slice($arr, (int)($count/2));
     
        mergeSort($left);
        mergeSort($right);

        $finish = round(microtime(true) - $start, 4);
        $result = "Time: " . $finish . "<br>";
     
        // return $result;
     
        return merge($left, $right);
    }
     
    function merge(array $left, array $right):array
    {
        $ret = array();
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] < $right[0]) {
                array_push($ret, array_shift($left));
            } else {
                array_push($ret, array_shift($right));
            }
        }
     
        array_splice($ret, count($ret), 0, $left);
        array_splice($ret, count($ret), 0, $right);
     
        return $ret;
    }

    $start = microtime(true);
    mergeSort($arr);
    $finish = round(microtime(true) - $start, 4);
    echo "<b> Time:</b> " . $finish;
}
catch (Exception $ex)
{
    echo $ex->getMessage;
}

echo "<br> <br>";
echo "<b> Быстрая сортировка </b> ";

try
{
    function quickSort(array $arr) : array
    {
        $start = microtime(true);
        
        $count= count($arr);
        if ($count <= 1) {
            return $arr;
        }
     
        $first_val = $arr[0];
        $left_arr = array();
        $right_arr = array();
     
        for ($i = 1; $i < $count; $i++) {
            if ($arr[$i] <= $first_val) {
                $left_arr[] = $arr[$i];
            } else {
                $right_arr[] = $arr[$i];
            }
        }
     
        quickSort($left_arr);
        quickSort($right_arr);

        $finish = round(microtime(true) - $start, 4);
        $result = "<b>Time: </b>" . $finish . "<br>";
        // var_dump($result);
     
        return array_merge($left_arr, array($first_val), $right_arr);
    }
    $start = microtime(true);
    var_dump(quickSort($arr));
    $finish = round(microtime(true) - $start, 4);
    echo "<b> Time: </b> " . $finish;
}
catch (Exception $ex)
{
    echo $ex->getMessage;
}

echo "<br> <br>";
echo "<b> Сортировка выбором </b> ";

try
{
    $start = microtime(true);

        $count= count($arr);
        if ($count <= 1){
            return $arr;
        }
 
        for ($i = 0; $i < $count; $i++){
            $k = $i;
    
            for($j = $i + 1; $j < $count; $j++){
                if ($arr[$k] > $arr[$j]){
                    $k = $j;
                }
    
                if ($k != $i){
                    $tmp = $arr[$i];
                    $arr[$i] = $arr[$k];
                    $arr[$k] = $tmp;
                }
            }
        }

        $finish = round(microtime(true) - $start, 4);
        $result = "<b> Time: </b> " . $finish . "<br>" . var_dump($arr);
     
        echo $result;
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