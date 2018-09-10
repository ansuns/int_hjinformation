<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "icp_main".
 *
 * @property int $id
 * @property int $userID 代理商ID
 * @property int $clientUserID 终端会员ID
 * @property string $userMainID 用户自定义的主体ID
 * @property string $mainName 主体名称
 * @property int $mainType 主办单位性质 个人:0 、企业：1、、军队:2、政府机关:3、事业单位:4、社会团体:5
 * @property string $province 主办单位所在省
 * @property string $city 主办单位所在市
 * @property string $area 主办单位所在区/县
 * @property int $mainCredType 主办单位有效证件类型,个人：身份证、护照、军官证、台胞证;企业：工商营业执照、组织机构代码证、统一社会信用代码证;军队：军队代号; 政府机关：组织机构代码证;事业单位：事业单位法人证书;社会团体：社团法人证书
 * @property string $mainCredNumb 主办单位有效证件号码
 * @property string $address 主办单位通信地址
 * @property string $investor 投资者或上级单位主管名称
 * @property string $certAddr 证件地址
 * @property string $remark 备注信息（主体负责人对该主体的备注声明）
 * @property string $icpNumb 备案/许可证号
 * @property string $icpPwd 备案密码
 * @property string $lastEditTime 最后修改时间
 * @property int $status 备案状态、备案阶段 0:本地保存;1:提交中;2:待受理(提交成功);3:内审中;4:内审通过;5:提交管局;6:管局审核通过;-1:提交失败(附件传递失败);-2:用户撤回;-3:内审退回;-4:管局退回
 * @property string $rejectReason 拒绝（退回）原因，实际上就是审核意见
 * @property int $acceuserID 受理人ID
 * @property string $giveuprmk 放弃备案备注
 * @property string $fileUrl1 个人对应证件类型为身份证（正面）、护照等，单位对应证件类型为营业执照等
 * @property string $localFileUrl1 本地个人对应证件类型为身份证（正面）、护照等，单位对应证件类型为营业执照等
 * @property string $fileUrl2 个人对应证件类型为身份证（反面）；对其他证件类型，此可为空
 * @property string $localFileUrl2 本地个人对应证件类型为身份证（反面）；对其他证件类型，此可为空
 * @property int $recordType 备案类型 1新增备案  3代表备案接入（这里的备案接入是指 新增网站跟新增接入）
 * @property string $responsible 负责人姓名
 * @property string $respCredType 负责人证件类型
 * @property string $respCretNumb 负责人证件号码
 * @property string $officPhone 办公室电话
 * @property string $mobile 手机号码
 * @property string $rAddress 详细通信地址
 * @property string $email 邮箱
 * @property string $msn MSN
 * @property string $qq QQ
 * @property string $addDate 添加时间
 * @property string $fileUrl3 对应证件类型为身份证正面,护照等(证件资料ID)
 * @property string $localFileUrl3 本地对应证件类型为身份证正面,护照等(证件资料ID)
 * @property string $fileUrl4 对应证件类型为身份证反面(证件资料ID),其他证件类型不用此字段）
 * @property string $localFileUrl4 本地对应证件类型为身份证反面(证件资料ID),其他证件类型不用此字段）
 * @property string $batchNumb 同批操作的批号,用于识别同批次提交的主体和网站
 * @property int $taskID 文件传输的任务Id
 * @property string $icpCode 备案券号
 * @property int $guid 客户端和系统对同一条记录的唯一识别码
 * @property int $cancelStatus 0:正常使用;1:申请注销;2:注销受理（内审中）;3:内审通过;4:提交管局;5管局通过;6:内审强制注销;7:管局强制注销;-1用户终止注销;-2:内审退回;-3:管局退回
 * @property string $cancelReason 注销原因：主动申请、违规、管局禁止等
 * @property string $cancelRemark 注销备注
 * @property string $cancelTime 注销状态变更时间
 * @property string $postNumb 快递单号（暂时没用上）
 * @property string $postCompany 快递公司（暂时没用上）
 * @property string $cancelCheck 注销审核意见
 * @property int $cancelAccepter 注销审核受理人
 * @property int $isdelete 删除字段 0正常 1删除
 * @property string $notifyUrl 通知接口
 * @property string $dataType 通知回调数据类型
 * @property string $otherMainFile 通用主体附件
 * @property int $apiTaskID
 */
class IcpMain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'icp_main';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID'], 'required'],
            [['userID', 'clientUserID', 'mainType', 'mainCredType', 'status', 'acceuserID', 'recordType', 'taskID', 'guid', 'cancelStatus', 'cancelAccepter', 'isdelete', 'apiTaskID'], 'integer'],
            [['lastEditTime', 'addDate', 'cancelTime'], 'safe'],
            [['dataType', 'otherMainFile'], 'string'],
            [['userMainID', 'province', 'city', 'area', 'responsible', 'postCompany'], 'string', 'max' => 30],
            [['mainName'], 'string', 'max' => 150],
            [['mainCredNumb', 'icpNumb', 'icpPwd', 'email'], 'string', 'max' => 50],
            [['address', 'certAddr', 'cancelRemark'], 'string', 'max' => 200],
            [['investor'], 'string', 'max' => 100],
            [['remark'], 'string', 'max' => 500],
            [['rejectReason', 'giveuprmk', 'fileUrl1', 'localFileUrl1', 'fileUrl2', 'localFileUrl2', 'rAddress', 'fileUrl3', 'localFileUrl3', 'fileUrl4', 'localFileUrl4', 'cancelCheck', 'notifyUrl'], 'string', 'max' => 250],
            [['respCredType'], 'string', 'max' => 10],
            [['respCretNumb'], 'string', 'max' => 35],
            [['officPhone', 'mobile'], 'string', 'max' => 15],
            [['msn', 'qq', 'batchNumb', 'icpCode', 'cancelReason', 'postNumb'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userID' => 'User ID',
            'clientUserID' => 'Client User ID',
            'userMainID' => 'User Main ID',
            'mainName' => 'Main Name',
            'mainType' => 'Main Type',
            'province' => 'Province',
            'city' => 'City',
            'area' => 'Area',
            'mainCredType' => 'Main Cred Type',
            'mainCredNumb' => 'Main Cred Numb',
            'address' => 'Address',
            'investor' => 'Investor',
            'certAddr' => 'Cert Addr',
            'remark' => 'Remark',
            'icpNumb' => 'Icp Numb',
            'icpPwd' => 'Icp Pwd',
            'lastEditTime' => 'Last Edit Time',
            'status' => 'Status',
            'rejectReason' => 'Reject Reason',
            'acceuserID' => 'Acceuser ID',
            'giveuprmk' => 'Giveuprmk',
            'fileUrl1' => 'File Url1',
            'localFileUrl1' => 'Local File Url1',
            'fileUrl2' => 'File Url2',
            'localFileUrl2' => 'Local File Url2',
            'recordType' => 'Record Type',
            'responsible' => 'Responsible',
            'respCredType' => 'Resp Cred Type',
            'respCretNumb' => 'Resp Cret Numb',
            'officPhone' => 'Offic Phone',
            'mobile' => 'Mobile',
            'rAddress' => 'R Address',
            'email' => 'Email',
            'msn' => 'Msn',
            'qq' => 'Qq',
            'addDate' => 'Add Date',
            'fileUrl3' => 'File Url3',
            'localFileUrl3' => 'Local File Url3',
            'fileUrl4' => 'File Url4',
            'localFileUrl4' => 'Local File Url4',
            'batchNumb' => 'Batch Numb',
            'taskID' => 'Task ID',
            'icpCode' => 'Icp Code',
            'guid' => 'Guid',
            'cancelStatus' => 'Cancel Status',
            'cancelReason' => 'Cancel Reason',
            'cancelRemark' => 'Cancel Remark',
            'cancelTime' => 'Cancel Time',
            'postNumb' => 'Post Numb',
            'postCompany' => 'Post Company',
            'cancelCheck' => 'Cancel Check',
            'cancelAccepter' => 'Cancel Accepter',
            'isdelete' => 'Isdelete',
            'notifyUrl' => 'Notify Url',
            'dataType' => 'Data Type',
            'otherMainFile' => 'Other Main File',
            'apiTaskID' => 'Api Task ID',
        ];
    }
}
