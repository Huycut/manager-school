<?php
namespace App\Controllers;

use App\Services\TeacherService;
use App\Common\Result;

class GiaovienController extends BaseController
{
    public $teacher;

    public function __construct()
    {
        $this->teacher = new TeacherService();

    }

    public function index(): string
    {
        $data = [];
        if($this->request->getVar('query')){
            $dataCategory["teachers"] = $this->teacher->getSearchTeacher($this->request->getVar('query'));
        }
        else{
            $dataCategory["teachers"] = $this->teacher->getAllTeachers();
        }
        $data = $this->loadLayout($data, 'Trang chủ', 'Home/pages/list-giaovien', $dataCategory, [], []);
        return view('Home/index', $data);
    }

}

?>