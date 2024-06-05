<?php

namespace App\Services;

use App\Common\Result;
use Exception;
use App\Models\CreateSchedule;

class scheduleService extends BaseService
{

    

    private $schedule;
    //Construct
    function __construct()
    {
        parent::__construct(); // dùng construct của thằng cha
        $this->schedule = new CreateSchedule();
        $this->schedule->protect(false); // không phải đinh nghĩa trong model UerModel
    }
    public function getSchedule()
    {
        return $this->schedule->table('lichhoc')
        ->select('subject.name as subject_name, teacher.name as teacher_name, class.nameClass,lichhoc.date')
        ->join('subject', 'lichhoc.id_subject = subject.id')
        ->join('teacher', 'lichhoc.id_teacher = teacher.id')
        ->join('class', 'lichhoc.id_class = class.id')
        ->get()
        ->getResultArray();
    }

}