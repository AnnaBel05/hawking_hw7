<?php 

namespace Controllers;

use Services\SortService;
use View;

class Controller
{
    public $view;
    public $sortService;

    function __construct()
    {
        $this->view = new View();
        $this->sortService = new SortService();
    }
    
}

?>