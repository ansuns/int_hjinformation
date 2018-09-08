<?php

namespace console\controllers;

use Yii;
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

    public function actionRbac()
    {
        $trans = Yii::$app->db->beginTransaction();
        try {
            //构建控制器目录
            $dir = Yii::getAlias('backedend'). '/controllers';
            //找到控制器目录下的所有文件
            $controllers = glob($dir. '/*');
            $permissions = [];
            foreach ($controllers as $controller) {
                $content = file_get_contents($controller);
                //找到Controller即可
                preg_match('/class ([a-zA-Z]+)Controller/', $content, $match);
                $cName = $match[1];
                $permissions[] = strtolower($cName. '/*');
                //正则匹配文本中的所以action
                preg_match_all('/public function action([a-zA-Z_]+)/', $content, $matches);
                foreach ($matches[1] as $aName) {
                    $permissions[] = strtolower($cName. '/'. $aName);
                }
            }
            $auth = Yii::$app->authManager;

            //为什么$auth可以操作到该表
            foreach ($permissions as $permission) {
                //是否存在该权限
                if (!$auth->getPermission($permission)) {
                    $obj = $auth->createPermission($permission);
                    $obj->description = $permission;
                    $auth->add($obj);
                }
            }
            $trans->commit();
            echo "import success \n";
        } catch(\Exception $e) {
            $trans->rollback();
            echo "import failed \n";
        }
    }

}