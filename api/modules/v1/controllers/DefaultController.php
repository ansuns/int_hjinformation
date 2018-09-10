<?php

namespace api\modules\v1\controllers;

use api\controllers\ApiBaseController;
use api\models\ApiUserLoginForm;
use common\models\UploadForm;
use Yii;
use yii\web\UploadedFile;

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

        //PC 表单登录
        if (!$model->username && !$model->password) {
            $model->load(Yii::$app->request->post());
        }

        if ($model->login()) {
            return ['access_token' => $model->login()];
        } else {
            $model->validate();
            return $model;
        }

    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost){

            $model->file = UploadedFile::getInstancesByName('file');
            $fileName = $model->upload() ;

            if ( $fileName ) {
                // 文件上传成功
                return $fileName;
            }else{
                return $model->getErrors();
            }
        }else{
            return  false;
        }

    }
}
