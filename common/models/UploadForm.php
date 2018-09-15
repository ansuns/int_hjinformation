<?php
/**
 * Created by PhpStorm.
 * User: YANGS
 * Date: 2018/9/10
 * Time: 13:34
 */

namespace  common\models;

use Yii;
use yii\base\Model;

class UploadForm extends Model
{
    public $file;

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif', 'maxFiles' => 5],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $save = [];
            foreach ($this->file as $file) {
                $fileName = 'uploads/' . Yii::$app->security->generateRandomString().'.' . $file->extension;
                $res = $file->saveAs($fileName);
                if ($res == false) {
                    break;
                }
                $save[] = [
                    'file' => $fileName,
                    'path' => 'uploads/',
                    'origin' => $file->baseName.'.'.$file->extension,
                    'url' => '',
                    'extension' => $file->extension,
                    'create_time' => date('Y-m-d H:i:s'),
                    'update_time' => date('Y-m-d H:i:s'),
                    'status' => 1,
                ];


            }
            Yii::$app->db->createCommand()->batchInsert('files', ['file','path','origin','url','extension','create_time','update_time','status'], $save)->execute();
            return $save;
        }
        return false;

    }
}