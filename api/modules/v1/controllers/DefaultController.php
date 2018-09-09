<?php

namespace api\modules\v1\controllers;

use api\controllers\ApiBaseController;
use api\models\ApiUserLoginForm;
use Yii;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends ApiBaseController
{
    public $modelClass = 'api\models\ApiUser';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionLogin()
    {
        $model = new ApiUserLoginForm();
        $model->username = Yii::$app->request->post('username');
        $model->password = Yii::$app->request->post('password');

        if ($model->login()) {
            return ['access_token' => $model->login()];
        } else {
            $model->validate();
            return $model;
        }

    }
}
