<?php

namespace App\Services;

use App\Common\Result;
use Exception;
use App\Models\CreateTeacherModel;

class TeacherService extends BaseService
{

    private $teachers;
    //Construct
    function __construct()
    {
        parent::__construct(); // dùng construct của thằng cha
        $this->teachers = new CreateTeacherModel();
        $this->teachers->protect(false); // không phải đinh nghĩa trong model UerModel
    }

    public function getAllTeachers()
    {
        return $this->teachers->findAll();
    }
    public function getSearchTeacher($search){
        return $this->teachers->select('*')->like('name',$search,'both')->get()->getResultArray();
    }
    public function updateTeacher($id, $field, $value)
    {
        // Sử dụng biến trung gian để tạo mảng kết hợp
        $data = [
            $field => $value
        ];

        // Cập nhật mảng kết hợp
        return $this->teachers->update($id, $data);
    }

}