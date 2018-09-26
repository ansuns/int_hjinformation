<?php

namespace backend\modules\admin\controllers;

use backend\controllers\BaseController;
use common\service\WechatService;

/**
 * Default controller for the `admin` module
 */
class WechatController extends BaseController
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionCreateMeun()
    {
        $buttons = [
            [
                "type" => "click",
                "name" => "今日歌曲",
                "key"  => "V1001_TODAY_MUSIC"
            ],
            [
                "name"       => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];
        $app = WechatService::getInstance();
        $res = $app->menu->create($buttons);
        var_dump($res);
    }
}
