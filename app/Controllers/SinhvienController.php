<?php
namespace App\Controllers;

use App\Services\StudentService;
use App\Common\Result;

class SinhvienController extends BaseController
{
    public $student;

    public function __construct()
    {
        $this->student = new StudentService();

    }

    public function index(): string
    {   
        $data = [];
        if($this->request->getVar('query')){
            $dataCategory["students"] = $this->student->getSearchStudent($this->request->getVar('query'));
        }
        else{
            $dataCategory["students"] = $this->student->getAllStudent();
        }
        $data = $this->loadLayout($data, 'Trang chủ', 'Home/pages/list-sinhvien', $dataCategory, [], []);
        return view('Home/index', $data);
    }

}

?>