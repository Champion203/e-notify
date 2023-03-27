<?php
define('LINE_API',"https://notify-api.line.me/api/notify");
 
$token = "1GIGarNOiBUItLkw97bpqfjmExzLDO1QWhKuxG98G8N"; //ใส่Token ที่copy เอาไว้
$str = 'แจ้งเตือน ช่องทางร้องเรียนร้องทุกข์' .
"\n". 'ชื่อ-สกุล: ' .$_POST['prefix']. ' ' .$_POST['fname']. ' ' .$_POST['lname']. 
"\n". 'เบอร์โทรศัพท์ติดต่อกลับ: ' .$_POST['tel']. 
"\n". 'เรื่องร้องเรียน ร้องทุกข์: ' .$_POST['detail'].
"\n".  $file_upload1. 
"\n". 'ตรวจสอบรายละเอียดทาง: https://www.e-service.rangsit.org/e-notify/admin/homepage';


//ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
 
$res = notify_message($str,$token);
print_r($res);
function notify_message($message,$token){
 $queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
}
//https://havespirit.blogspot.com/2017/02/line-notify-php.html
//https://medium.com/@nattaponsirikamonnet/%E0%B8%A1%E0%B8%B2%E0%B8%A5%E0%B8%AD%E0%B8%87-line-notify-%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B9%80%E0%B8%96%E0%B8%AD%E0%B8%B0-%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%90%E0%B8%B2%E0%B8%99-65a7fc83d97f
?>