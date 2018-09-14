<?php
namespace common\helpers;

use Yii;

/**
 * 配置：
 *      'helper' => [
'class'=>'common\helpers\Helper',
'property' => '123',
]

调用：
Yii::$app->helper->dump($order);
 */

/**
 * 公共的助手类
 */
class Helper
{
    /**
     * @author RoLiHop
     * 2017年1月3日 17:42:34
     * 格式化打印
     * @param $data
     * @return string
     */
    public function dump($data)
    {
        echo '<pre>' . print_r( $data, true). '</pre>';
    }

    public function curl($url, array $data)
    {
        $curl = new Curl();
        $response = $curl->setOption(
            CURLOPT_POSTFIELDS,
            http_build_query($data))
            ->post($url);
        return $response;

    }





}