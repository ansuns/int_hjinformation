<?php

namespace api\modules\v1\controllers;

use yii\filters\auth\HttpHeaderAuth;
use yii\rest\ActiveController;


class ApiBaseController extends ActiveController
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpHeaderAuth::className(),
        ];
        return $behaviors;
    }
}
