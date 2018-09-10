<?php

namespace api\controllers;

use api\models\ApiUser;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpHeaderAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;


class ApiBaseController extends ActiveController
{
    public function actions()
    {
        $actions = parent::actions(); // TODO: Change the autogenerated stub
        //unset($actions['index'],$actions['update'],$actions['create'],$actions['delete'],$actions['vies']);
        return $actions;
    }

        public function behaviors()
        {
            $behaviors = parent::behaviors();
            $behaviors['authenticator'] = [
                'class' => QueryParamAuth::className(),
                //不需要认证的接口
                'optional' => [
                    'login',
                    'loginout',
                    'upload'
                ]
            ];
            return $behaviors;
        }

/*    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => function($username, $passowrd) {
                $user = ApiUser::find()->where(['username' => $username])->one();
                if ($user->validatePassword) {
                    return $user;
                }
                return null;

            }
        ];
        return $behaviors;
    }*/
}