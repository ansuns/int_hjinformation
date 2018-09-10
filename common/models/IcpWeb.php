<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "icp_web".
 *
 * @property int $id
 * @property int $userID 代理商ID
 * @property int $clientUserID 终端会员ID
 * @property int $mainID 备案主体ID
 * @property string $userMainID 用户自定义的主体ID
 * @property string $userWebID 用户自定义的网站ID
 * @property string $recordType 备案类型 1新增备案 2新增网站 3网站接入 4接入网站（主体已经在数据库有记录的情况）
 * @property string $icpWebNumb 网站备案号
 * @property string $icpWebPwd 备案密码
 * @property string $webName 网站名称
 * @property string $webIndex 首页网址
 * @property string $webDomain 网站域名
 * @property string $sepcAppr 涉及前置审批或专项审批的内容
 * @property string $serviceContent 网站服务内容
 * @property string $lanuage 语言类别
 * @property string $remark 备注信息（网站负责人对该网站的备注声明）
 * @property string $ispName 网站接入服务提供者（ISP）名称
 * @property string $webIP 网站IP地址
 * @property string $intoType 接入方式
 * @property string $serverAddr 服务器放置地
 * @property int $status 备案状态、备案阶段 0:本地保存;1:提交中;2:待受理(提交成功);3:内审中;4:内审通过;5:提交管局;6:管局审核通过;-1:提交失败(附件传递失败);-2:用户撤回;-3:内审退回;-4:管局退回;-5拉黑
 * @property string $lastEditTime 最后修改时间
 * @property string $rejectReason 拒绝(退回)原因
 * @property int $acceuserID 受理人ID
 * @property string $giveuprmk 放弃备案备注
 * @property string $fileUrl1 域名证书(证件资料ID)
 * @property string $localFileUrl1 本地域名证书(证件资料ID)
 * @property string $fileUrl2 网站真实性核验单(证件资料ID)
 * @property string $localFileUrl2 本地网站真实性核验单(证件资料ID)（没用到）
 * @property string $fileUrl3 前置审批文件(证件资料ID)（没用到）
 * @property string $localFileUrl3 本地前置审批文件(证件资料ID)（没用到）
 * @property string $responsible 网站负责人姓名
 * @property string $respCredType 网站负责人有效证件类型
 * @property string $respCredNumb 网站负责人有效证件号码
 * @property string $officePhone 办公电话座机号
 * @property string $mobile 手机号码
 * @property string $address 详细通信地址
 * @property string $email 邮箱
 * @property string $msn MSN
 * @property string $qq QQ
 * @property string $addDate 添加时间
 * @property string $fileUrl4 对应证件类型为身份证正面,护照等(证件资料ID)
 * @property string $localFileUrl4 本地对应证件类型为身份证正面,护照等(证件资料ID)
 * @property string $fileUrl5 对应证件类型为身份证反面(证件资料ID);如果是身份证，必须fileUrl_4、fileUrl_5同时有，如果是其他证据，fileUrl_5可为null）
 * @property string $localFileUrl5 本地对应证件类型为身份证反面(证件资料ID);如果是身份证，必须fileUrl_4、fileUrl_5同时有，如果是其他证据，fileUrl_5可为null）
 * @property string $fileUrl6 网站负责人真实性核验照片(对个人而言是高清半身照)
 * @property string $localFileUrl6 本地网站负责人真实性核验照片(对个人而言是高清半身照)
 * @property string $batchNumb 同批操作的批号,用于识别同批次提交的主体和网站
 * @property int $taskID 文件传输的任务Id
 * @property string $icpCode 备案券号
 * @property int $guid 客户端和系统对同一条记录的唯一识别码
 * @property int $mainGuid 主体Guid
 * @property string $postCompany 快递公司（暂时没用上）
 * @property string $postNumb 快递单号（暂时没用上）
 * @property int $cancelStatus 0:正常使用;1:申请注销;2:注销受理（内审中）;3:内审通过;4:提交管局;5管局通过;6:内审强制注销;7:管局强制注销;-1用户终止注销;-2:内审退回;-3:管局退回
 * @property string $cancelReason 注销原因：主动申请、违规、管局禁止等
 * @property string $cancelRemark 注销备注
 * @property string $cancelTime 注销状态变更时间
 * @property string $cancelCheck 注销审核意见
 * @property int $cancelAccepter 注销审核受理人
 * @property int $isdelete 删除字段 0正常 1删除
 * @property string $notifyUrl 通知接口
 * @property string $dataType 通知回调数据类型
 * @property int $apiTaskID
 * @property int $cancelType 1:主体注销，2：网站注销
 * @property int $isShareHost 是否是共享虚拟主机，0为不是，1是 
 * @property string $hostName 服务器名称
 * @property string $otherWebFile 通用网站附件
 */
class IcpWeb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'icp_web';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userID'], 'required'],
            [['userID', 'clientUserID', 'mainID', 'status', 'acceuserID', 'taskID', 'guid', 'mainGuid', 'cancelStatus', 'cancelAccepter', 'isdelete', 'apiTaskID', 'cancelType', 'isShareHost'], 'integer'],
            [['lastEditTime', 'addDate', 'cancelTime'], 'safe'],
            [['fileUrl1', 'dataType', 'otherWebFile'], 'string'],
            [['userMainID', 'userWebID', 'responsible', 'postCompany', 'hostName'], 'string', 'max' => 30],
            [['recordType', 'respCredType'], 'string', 'max' => 10],
            [['icpWebNumb', 'icpWebPwd', 'webName', 'lanuage', 'ispName', 'webIP', 'email'], 'string', 'max' => 50],
            [['webIndex', 'sepcAppr', 'rejectReason', 'giveuprmk', 'fileUrl2', 'localFileUrl2', 'fileUrl3', 'localFileUrl3', 'address', 'fileUrl4', 'localFileUrl4', 'fileUrl5', 'localFileUrl5', 'fileUrl6', 'localFileUrl6', 'cancelCheck', 'notifyUrl'], 'string', 'max' => 250],
            [['webDomain', 'remark', 'localFileUrl1'], 'string', 'max' => 500],
            [['serviceContent'], 'string', 'max' => 300],
            [['intoType'], 'string', 'max' => 25],
            [['serverAddr'], 'string', 'max' => 150],
            [['respCredNumb'], 'string', 'max' => 35],
            [['officePhone', 'mobile'], 'string', 'max' => 15],
            [['msn', 'qq', 'batchNumb', 'icpCode', 'postNumb', 'cancelReason'], 'string', 'max' => 20],
            [['cancelRemark'], 'string', 'max' => 200],
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
            'mainID' => 'Main ID',
            'userMainID' => 'User Main ID',
            'userWebID' => 'User Web ID',
            'recordType' => 'Record Type',
            'icpWebNumb' => 'Icp Web Numb',
            'icpWebPwd' => 'Icp Web Pwd',
            'webName' => 'Web Name',
            'webIndex' => 'Web Index',
            'webDomain' => 'Web Domain',
            'sepcAppr' => 'Sepc Appr',
            'serviceContent' => 'Service Content',
            'lanuage' => 'Lanuage',
            'remark' => 'Remark',
            'ispName' => 'Isp Name',
            'webIP' => 'Web Ip',
            'intoType' => 'Into Type',
            'serverAddr' => 'Server Addr',
            'status' => 'Status',
            'lastEditTime' => 'Last Edit Time',
            'rejectReason' => 'Reject Reason',
            'acceuserID' => 'Acceuser ID',
            'giveuprmk' => 'Giveuprmk',
            'fileUrl1' => 'File Url1',
            'localFileUrl1' => 'Local File Url1',
            'fileUrl2' => 'File Url2',
            'localFileUrl2' => 'Local File Url2',
            'fileUrl3' => 'File Url3',
            'localFileUrl3' => 'Local File Url3',
            'responsible' => 'Responsible',
            'respCredType' => 'Resp Cred Type',
            'respCredNumb' => 'Resp Cred Numb',
            'officePhone' => 'Office Phone',
            'mobile' => 'Mobile',
            'address' => 'Address',
            'email' => 'Email',
            'msn' => 'Msn',
            'qq' => 'Qq',
            'addDate' => 'Add Date',
            'fileUrl4' => 'File Url4',
            'localFileUrl4' => 'Local File Url4',
            'fileUrl5' => 'File Url5',
            'localFileUrl5' => 'Local File Url5',
            'fileUrl6' => 'File Url6',
            'localFileUrl6' => 'Local File Url6',
            'batchNumb' => 'Batch Numb',
            'taskID' => 'Task ID',
            'icpCode' => 'Icp Code',
            'guid' => 'Guid',
            'mainGuid' => 'Main Guid',
            'postCompany' => 'Post Company',
            'postNumb' => 'Post Numb',
            'cancelStatus' => 'Cancel Status',
            'cancelReason' => 'Cancel Reason',
            'cancelRemark' => 'Cancel Remark',
            'cancelTime' => 'Cancel Time',
            'cancelCheck' => 'Cancel Check',
            'cancelAccepter' => 'Cancel Accepter',
            'isdelete' => 'Isdelete',
            'notifyUrl' => 'Notify Url',
            'dataType' => 'Data Type',
            'apiTaskID' => 'Api Task ID',
            'cancelType' => 'Cancel Type',
            'isShareHost' => 'Is Share Host',
            'hostName' => 'Host Name',
            'otherWebFile' => 'Other Web File',
        ];
    }
}
