<?php

namespace api\modules\v1\controllers;

use api\controllers\ApiBaseController;


/**
 * Default controller for the `v1` module
 */
class BaremetalController extends ApiBaseController
{
    public $modelClass = 'common\models\Baremetal';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

    }
}
