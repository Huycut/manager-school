<?php

namespace App\Controllers;
use App\Services\scheduleService;
class Home extends BaseController
{   
    public $schedule;
    public function __construct()
    {
         $this->schedule = new scheduleService();

    }
    public function index(): string
    {
        
        $data = [];
        $dataSchedule["schedule"] = $this->schedule->getSchedule();
        $data = $this->loadLayout($data, 'Trang chủ', 'Home/pages/home', $dataSchedule, [], []);
        return view('Home/index', $data);
    }
}