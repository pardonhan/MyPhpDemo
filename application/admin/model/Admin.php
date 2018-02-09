<?php

use think\Model;

/**
 * Created by PhpStorm.
 * User: HanFL
 * Date: 2018/2/7
 * Time: 14:08
 */
class Admin extends Model
{

    public function login($data)
    {
        $user = db('admin')->where('username', $data['username'])->find();
        if ($user) {
            if ($user['pwd'] == md5($data['password'])) {
                session('username', $user['username']);
                session('admin_id', $user['admin_id']);
                return 1;//正确
            } else {
                return -1;//密码错误
            }
        } else {
            return -1;//用户不存在
        }
    }
}