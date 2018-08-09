<?php

namespace console\controllers;

use yii\console\Controller;
use common\models\User;

class InitController extends Controller
{
    public function actionAdmin()
    {
        echo "创建管理员账户...\n";
        $username = $this->prompt('账户名称...');
        $email = $this->prompt('email...');
        $password = $this->prompt('password...');
        $model = new User();
        $model->password = $password;
        $model->email = $email;
        $model->username = $username;
        if (!$model->save()) {
            foreach ($model->getErrors() as $error) {
                foreach ($error as $e) {
                    echo "$e\n";
                }
            }
            
            return 1;
        }
        
        return 0;
    }
}