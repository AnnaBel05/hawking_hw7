<?php 

namespace Controllers;

use Services\SortService;
use View;

class HomeController
{
    // function __construct()
    // {
    //     $this->view = new View();
    //     $this->sortService = new SortService();
    // }
    function actionIndex()
    {
        $arr = array();
        for ($i = 0; $i < 10; $i++)
        {
            $arr[$i] = rand();
        }

        $bubbleArr = $this->sortService->bubbleSort($arr);
        var_dump($bubbleArr);
        $insertArr = $this->sortService->insertSort($arr);
        var_dump($insertArr);
        $mergeArr = $this->sortService->mergeSort($arr);
        var_dump($mergeArr);
        $quickArr = $this->sortService->quickSort($arr);
        var_dump($quickArr);
        $choiceArr = $this->sortService->choiceSort($arr);
        var_dump($choiceArr);

        // echo "<a href='$arr$bubbleArr$insertArr$mergeArr$quickArr$choiceArr'> Click here </a>";

        // $this->view->generate('mainView.php', 'templateView.php', 
        //     $arr, 
        //     $bubbleArr,
        //     $insertArr,
        //     $mergeArr,
        //     $quickArr,
        //     $choiceArr);

        return 'mainView.php';
    }
}

?>