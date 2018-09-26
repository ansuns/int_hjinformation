<?php
namespace frontend\controllers;

use api\models\ApiUserLoginForm;
use Yii;
use yii\base\InvalidParamException;
use yii\log\FileTarget;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class ErrorController extends Controller
{

    /**
     * Displays homepage.
     *
     * 统一错误处理
     * @return mixed
     */
    public function actionError()
    {
        $error = Yii::$app->errorHandler->exception;
        $err_msg = '';
        if ($error) {
            $file = $error->getFile();
            $line = $error->getLine();
            $message = $error->getMessage();
            $code = $error->getCode();
            $log = new FileTarget();
            $log->logFile = Yii::$app->getRuntimePath() . "/logs/error.log";

            $err_msg = $message . "[file:{$file}][line:{$line}][message:{$message}][code:{$code}][url:{$_SERVER['REQUEST_URI']}][POST_DATA:".http_build_query($_POST)."]";

            $log->messages[] = [
                $err_msg,
                1,
                'application',
                microtime(true)
            ];
            $log->export();

        }
        return "error page:".$err_msg;
    }
}
