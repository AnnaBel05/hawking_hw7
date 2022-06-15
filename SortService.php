<?php 

namespace Services;

//Класс, содержащий методы сортировок
class SortService 
{
    //Пузырьковая сортировка
    function bubbleSort(array $arr)
    {
        $start = microtime(true);

        $count = count($arr);
        if ($count <= 1) {
            $finish = round(microtime(true) - $start, 4);
            $result = "Time: " . $finish . "<br>" . var_dump($arr);
     
            return $result;
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

        $result = "Time: " . $finish . "<br>" . var_dump($arr);
     
        return $result;
    }

    //Сортировка вставками
    function insertSort(array $arr)
    {
        $start = microtime(true);

        $count = count($arr);
        if ($count <= 1) {
            $finish = round(microtime(true) - $start, 4);
            $result = "Time: " . $finish . "<br>" . var_dump($arr);
        
            return $result;
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
        $result = "Time: " . $finish . "<br>" . var_dump($arr);
     
        return $result;
    }

    //Сортировка слиянием
    function mergeSort(array $arr) {
        $start = microtime(true);

        $count = count($arr);
        if ($count <= 1) {
            $finish = round(microtime(true) - $start, 4);
            $result = "Time: " . $finish . "<br>" . var_dump($arr);
        
            return $result;
        }
     
        $left  = array_slice($arr, 0, (int)($count/2));
        $right = array_slice($arr, (int)($count/2));
     
        $left = $this->mergeSort($left);
        $right = $this->mergeSort($right);

        $finish = round(microtime(true) - $start, 4);
        $result = "Time: " . $finish . "<br>" . var_dump($this->merge($left,$right));
        var_dump($result);
     
        // return $result;
     
        return $this->merge($left, $right);
    }
     
    function merge(array $left, array $right) {
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


    //Quick Sort     
    function quickSort(array $arr)
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
     
        $left_arr = $this->quickSort($left_arr);
        $right_arr = $this->quickSort($right_arr);

        $finish = round(microtime(true) - $start, 4);
        $result = "Time: " . $finish . "<br>" . var_dump(array_merge($left_arr, array($first_val), $right_arr));
        var_dump($result);
     
        return array_merge($left_arr, array($first_val), $right_arr);
    }

    // Choice Sort
    function choiceSort(array $arr)
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
        $result = "Time: " . $finish . "<br>" . var_dump($arr);
     
        return $result;
    }

}

?>