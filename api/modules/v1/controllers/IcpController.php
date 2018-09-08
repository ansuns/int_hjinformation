<?php

namespace api\modules\v1\controllers;

use api\controllers\ApiBaseController;


/**
 * Default controller for the `v1` module
 */
class IcpController extends ApiBaseController
{
    public $modelClass = 'common\models\IcpMain';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

    }
}
