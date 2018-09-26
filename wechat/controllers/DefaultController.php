<?php
namespace wechat\controllers;

use api\models\ApiUserLoginForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use wechat\models\PasswordResetRequestForm;
use wechat\models\ResetPasswordForm;
use wechat\models\SignupForm;
use wechat\models\ContactForm;

/**
 * Site controller
 */
class DefaultController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        echo "success";
    }
}
