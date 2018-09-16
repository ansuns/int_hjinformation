<?php

namespace console\controllers;

use api\models\ApiUser;
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

    public function actionUser()
    {
        echo "创建会员账户...\n";
        $username = $this->prompt('账户名称...');
        $email = $this->prompt('email...');
        $password = $this->prompt('password...');
        $model = new ApiUser();
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

    /**
     * 创建权限
     * @throws \yii\db\Exception
     */
    public function actionRbac()
    {
        $trans = Yii::$app->db->beginTransaction();
        try {
            //构建控制器目录
            $dir = Yii::getAlias('backend'). '/modules/admin/controllers';
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
            echo $e->getMessage();
            echo "import failed \n";
        }
    }

    /**
     * 创建角色
     * @throws \Exception
     */
    public function actionRole()
    {
        echo "创建角色...\n";
        $auth = Yii::$app->authManager;
        $name = $this->prompt('角色名称...');
        $role = $auth->createRole($name);
        $role->description = '创建了 ' . $name. ' 角色';
        $auth->add($role);
    }


    /*
     * 将权限赋给角色
     */
    public function actionChild()
    {
        $role = $this->prompt('角色名称...');
        $items['role'] = $role;
        $permission = $this->prompt('权限名称...');
        $items['permission'] = $permission;
        $auth = Yii::$app->authManager;
        $parent = $auth->createRole($items['role']);                //创建角色对象
        $child = $auth->createPermission($items['permission']);     //创建权限对象
        $auth->addChild($parent, $child);                           //添加对应关系
    }


    /**
     * 将角色赋给用户
     * @param $items
     * @throws \Exception
     */
    public function actionPower()
    {
        echo "分配角色...\n";
        $items['role'] = $this->prompt('角色名称...');
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($items['role']);                //创建角色对象
        $user_id = 1;                                             //获取用户id，此处假设用户id=1
        $auth->assign($role, $user_id);                           //添加对应关系
    }

}