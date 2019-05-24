<?php
namespace lib;

use lib\PHPMailer;

/**
 * 邮件类
 */
class Email
{
	
	function __construct()
	{
		$config = array(
	        'fromName'  =>   '凉了又温',
	        'userName'  =>   '185330767@qq.com',
	        'userPwd'   =>   'owrvuczyrcwzcbcb', // 授权秘钥
	        'from'      =>   '185330767@qq.com',
	        'subject'   =>   '来自凉了又温的邮箱验证',
	        'content'   =>   $content,
	        'addAttachment' => array() // 附件
	    );
	}

	/**
	* 邮件发送
	* @param $to 接收人
	* @param string $subject 邮件标题
	* @param string $content 邮件内容(html模板渲染后的内容)
	* @throws Exception
	* @throws phpmailerException
	*/
    public static function sendEmail($data = []) 
    {
    	if (empty($data['user_email'])) {
    		return ['code' => -1, 'message' => '收件人邮箱不能为空'];
    	}

    	if (empty($data['content'])) {
    		return ['code' => -1, 'message' => '邮件内容不能为空'];
    	}

        $mail = new PHPMailer(); //实例化 
        $mail->IsSMTP(); // 启用SMTP 
        $mail->Host = 'smtp.qq.com'; //SMTP服务器 以qq邮箱为例子 
        $mail->Port = 465; //邮件发送端口 
        $mail->SMTPAuth = true; //启用SMTP认证 
        $mail->SMTPSecure = "ssl"; // 设置安全验证方式为ssl 
        $mail->CharSet = "UTF-8"; //字符集 
        $mail->Encoding = "base64"; //编码方式 
        $mail->Username = '185330767@qq.com'; //发件人邮箱 
        $mail->Password = 'owrvuczyrcwzcbcb'; //发件人密码 ==>重点：是授权码，不是邮箱密码 
        $mail->Subject = '来自凉了又温的邮箱验证'; //邮件标题 
        $mail->From = '185330767@qq.com'; //发件人邮箱 
        $mail->FromName = '凉了又温'; //发件人姓名

        if($data && is_array($data)){
            $mail->AddAddress($data['user_email']); //添加收件人 
            $mail->IsHTML(true); //支持html格式内容 
            $mail->Body = $data['content']; //邮件主体内容 

            //发送成功就删除 
            if ($mail->Send()) { 
                return ['status' => true, 'message' => 'success']; 
            }else{
            	// 输出错误信息,用以邮件发送不成功问题排查 
                return ['status' => false, 'message' => $mail->ErrorInfo];
            }
        }
    }

    /**
     * @brief：发送email
     * @param $to 收件人
     * @param $config SMTP服务器相关配置信息
     * @param $content 邮件内容
     */
    public function postmail($addAddress, $config){
        require_once("./PHPMailer/class.phpmailer.php");
         
        $mail = new PHPMailer();                        //示例化PHPMailer核心类
         
         
        //SMTP服务器的相关信息设置
        $mail->SMTPDebug = 1;            　　　　　　//是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        $mail->isSMTP();             　 				//使用smtp鉴权方式发送邮件
        $mail->SMTPAuth=true;                   	//smtp需要鉴权 这个必须是true
        $mail->Host = 'smtp.qq.com';            	//链接qq域名邮箱的服务器地址
        $mail->SMTPSecure = 'ssl';              	//设置使用ssl加密方式登录鉴权
        $mail->Port = 465;                  		//设置ssl连接smtp服务器的远程服务器端口号 可选465或587
        $mail->CharSet = 'UTF-8';               	//设置发送的邮件的编码
         
        //发件人信息相关设置
        $mail->FromName = $config['fromName'];      //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->Username = $config['userName'];      //smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Password = $config['userPwd'];       //smtp登录的密码
        $mail->From = $config['from'];              //设置发件人邮箱地址
         
         
        //邮件内容设置
        $mail->isHTML(true);                    	//邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
        //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址
        if(empty($addAddress)){
            return false;
        }else if(is_array($addAddress)){
            foreach($addAddress as $value){
                if(is_array($value)){
                    $mail->addAddress($value['email'], $value['text']);
                }else{
                    $mail->addAddress($value);
                }
            }
        }else{
            $mail->addAddress($value['email']);
        }
         
         
        //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
        if(is_array($config['addAttachment'])){
            foreach($config['addAttachment'] as $value){
                $mail->addAttachment($value);
            }
        }else if(!empty($config['addAttachment'])){
            $mail->addAttachment($config['addAttachment']);
        }
         
        $mail->Subject = $config['subject'];     	//添加该邮件的主题
        $mail->Body = $config['content'];           //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
         
        $status = $mail->send();
  
        //简单的判断与提示信息
        if($status) {
            return ['status' => true, 'message' => '发送邮件成功']; 
        }else{
            return ['status' => false, 'message' => '发送邮件失败，错误信息未：'.$mail->ErrorInfo];
        }
    }
}