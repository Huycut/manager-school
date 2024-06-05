<?php

namespace App\Services;

use App\Common\Result;
use Exception;
use App\Models\CreateUserModel;

class LoginService extends BaseService
{

    private $users;
    //Construct
    function __construct()
    {
        parent::__construct(); // dùng construct của thằng cha
        $this->users = new CreateUserModel();
        $this->users->protect(false); // không phải đinh nghĩa trong model UerModel
    }
    public function hasLoginInfo($requestData)
    {
        $validate = $this->validateLogin($requestData);
        // if ($validate->getErrors()) {
        //     return [
        //         'status' => Result::STATUS_CODE_ERR,
        //         'messageCode' => Result::MESSAGE_CODE_ERR,
        //         'messages' => $validate->getErrors()
        //     ];
        // }
        $param = $requestData->getPost();

        $user = $this->users->where('user_id', $param['user_id'])->first();
        if (!$user) {
            return [
                'status' => Result::STATUS_CODE_ERR,
                'messageCode' => Result::MESSAGE_CODE_ERR,
                'messages' => [
                    'thongbaoemail' => 'Email Khong Tồn tại'
                ]
            ];
        }

        // $c = password_hash($param['password'], PASSWORD_BCRYPT);

        if (!password_verify($param['password'], $user['password'])) {
            // dd($param['password']);
            return [
                'status' => Result::STATUS_CODE_ERR,
                'messageCode' => Result::MESSAGE_CODE_ERR,
                'messages' => [
                    'thongbaomk' => 'Password khong dung'
                ]
            ];
        } else {
            return [
                'status' => Result::STATUS_CODE_OK,
                'messageCode' => Result::MESSAGE_CODE_OK,
                'messages' => null,
                'redirect' => '/'
            ];
        }
        ;


    }
    public function validateLogin($requestData)
    {
        $rule = [
            'email' => 'valid_email',
            'password' => 'max_length[20]|min_length[5]',
        ];
        $messages = [
            'email' => [
                'valid_email' => 'Tài khoản {field} {value} Không đúng',
                'is_unique' => 'Email đã tồn tại'
            ],
            'password' => [
                'max_length' => 'Độ dài tối đa là {param}',
                'min_length' => 'Độ dài tối thiểu là {param}',
            ],
        ];
        $this->validation->setRules($rule, $messages);
        $this->validation->withRequest($requestData)->run();
        return $this->validation;
    }
}