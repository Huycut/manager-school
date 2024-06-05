<?php

namespace App\Services;

use App\Common\Result;
use Exception;
use App\Models\CreateStudentModel;

class StudentService extends BaseService
{

    private $students;
    //Construct
    function __construct()
    {
        parent::__construct(); // dùng construct của thằng cha
        $this->students = new CreateStudentModel();
        $this->students->protect(false); // không phải đinh nghĩa trong model UerModel
    }

    public function getAllStudent()
    {
        return $this->students->table('student')
        ->select('student.masinhvien, student.name, class.nameClass, student.phone, student.ngaysinh, student.gioitinh, student.dantoc, student.diachi, student.quequan, student.hinhanh')
        ->join('student_class', 'student.id = student_class.student_id')
        ->join('class', 'student_class.class_id = class.id')->get()->getResultArray();
        
    }
    public function getSearchStudent($search){
        return $this->students->table('student')
        ->select('student.masinhvien, student.name, class.nameClass, student.phone, student.ngaysinh, student.gioitinh, student.dantoc, student.diachi, student.quequan, student.hinhanh')
        ->join('student_class', 'student.id = student_class.student_id')
        ->join('class', 'student_class.class_id = class.id')->like('student.name',$search, 'both')->get()->getResultArray();
    }


}