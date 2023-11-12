<?php

/*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
ob_start();
$token = "6958576208:AAExdWU3MMoa9qph44qjT2krRQcUZ7qdkcs";
define('API_KEY',$token);//add_token
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

date_default_timezone_set('Asia/Baghdad');
$year = date('Y');
$month = date('n');
$day = date('j');
$date = "$year/$month/$day م";
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;

if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
$name = $message->from->first_name;
$user = $update->callback_query->from->username;
$sales = json_decode(file_get_contents('sales.json'),true);
$buttons = json_decode(file_get_contents('button.json'),true);
}
function save($array){
    file_put_contents('sales.json', json_encode($array));
}
$city=array("afghanistan","albania","algeria","angola","antiguaandbarbuda","argentina","armenia","australia","austria","azerbaijan","bahrain","bangladesh","barbados","belarus","belgium","benin","bhutane","bih","bolivia","botswana","brazil","bulgaria","burkinafaso","burundi","cambodia","cameroon","canada","caymanislands","chad","china","colombia","congo","costarica","croatia","cyprus","czech","djibouti","dominicana","easttimor","ecuador","egypt","england","equatorialguinea","estonia","ethiopia","finland","france","frenchguiana","gabon","gambia","georgia","germany","ghana","guadeloupe","guatemala","guinea","guineabissau","guyana","haiti","honduras","hungary","india","indonesia","iran","iraq","ireland","israel","italy","ivorycoast","jamaica","jordan","kazakhstan","kenya","kuwait","laos","latvia","lesotho","liberia","libya","lithuania","luxembourg","macau","madagascar","malawi","malaysia","maldives","mali","mauritania","mauritius","mexico","moldova","mongolia","montenegro","morocco","mozambique","myanmar","namibia","nepal","netherlands","newzealand","nicaragua","nigeria","norway","oman","pakistan","panama","papuanewguinea","paraguay","peru","philippines","poland","portugal","puertorico","qatar","reunion","romania","russia","rwanda","saintkittsandnevis","saintlucia","saintvincentandgrenadines","salvador","saudiarabia","senegal","serbia","sierraleone","slovakia","slovenia","somalia","southafrica","spain","srilanka","sudan","suriname","swaziland","sweden","switzerland","syria","taiwan","tajikistan","tanzania","thailand","tit","togo","tunisia","turkey","turkmenistan","uae","uganda","ukraine","uruguay","usa","uzbekistan","venezuela","vietnam","yemen","zambia","zimbabwe");
$cities="
{ `yemen`}  =  🇾🇪 اليمن السعيد 🇾🇪  
  { `afghanistan `}  =  🇦🇫| أفغانستان 
  { `albania `}  =  🇦🇱| ألبانيا 
  { `algeria `}  =  🇩🇿| الجزائر   
  { `angola `}  =  🇦🇴| أنغولا   
  { `antiguaandbarbuda `}  =  🇦🇬| انتيغوا وباربودا   
  { `argentina `}  =  🇦🇷| الأرجنتين   
  { `armenia `}  =  🇦🇲| أرمينيا   
  { `australia `}  =  🇦🇺| أستراليا  
  { `austria `}  =  🇦🇹| النمسا 
  { `azerbaijan `}  =  🇦🇿| أذربيجان
  { `bahrain `}  =  🇧🇭| البحرين 
  { `bangladesh `}  =  🇧🇩| بنغلادش 
  { `barbados `}  =  🇧🇧| باربادوس   
  { `belarus `}  =  🇧🇾| بيلاروسيا 
  { `belgium `}  =  🇧🇪| بلجيكا 
  { `benin `}  =  🇧🇯| بنين 
  { `bhutane `}  =  🇧🇹| بوتان 
  { `bih `}  =  🇧🇦| البوسنة والهرسك 
  { `bolivia `}  =  🇧🇴| بوليفيا   
  { `botswana `}  =  🇧🇼| بوتسوانا  
  { `brazil `}  =  🇧🇷| البرازيل   
  { `bulgaria `}  =  🇧🇬| بلغاريا  
  { `burkinafaso `}  =  🇧🇫| بوركينا فاسو   
  { `burundi `}  =  🇧🇮| بوروندي 
  { `cambodia `}  =  🇰🇭| كمبوديا   
  { `cameroon `}  =  🇨🇲| الكاميرون  
  { `canada `}  =  🇨🇦| كندا   
  { `chad `}  =  🇹🇩| تشاد  
  { `china `}  =  🇨🇳| الصين   
  { `colombia `}  =  🇨🇴| كولومبيا  
  { `congo `}  =  🇨🇩| الكونغو  
  { `costarica `}  =  🇨🇷| كوستا ريكا   
  { `croatia `}  =  🇭🇷| كرواتيا 
  { `cyprus `}  =  🇨🇾| قبرص   
  { `czech `}  =  🇨🇿| التشيك   
  { `djibouti `}  =  🇩🇯| جيبوتي   
  { `dominicana `}  =  🇩🇲| دومينيكا  
  { `easttimor `}  =  🇹🇱| تيمور 
  { `ecuador `}  =  🇪🇨| الإكوادور 
  { `egypt `}  =  🇪🇬| مصر 
  { `england `}  =  🇬🇧| انجلترا  
  { `equatorialguinea `}  =  🇬🇶| غينيا الاستوائية  
  { `estonia `}  =  🇪🇪| إستونيا   
  { `ethiopia `}  =  🇪🇹| إثيوبيا  
  { `finland `}  =  🇫🇮| فنلندا  
  { `frenchguiana `}  =  🇬🇫| غويانا الفرنسية   
  { `gabon `}  =  🇬🇦| الغابون 
  { `gambia `}  =  🇬🇲| غامبيا   
  { `georgia `}  =  🇬🇪| جورجيا   
  { `germany `}  =  🇩🇪| ألمانيا  
  { `ghana `}  =  🇬🇭| غانا   
  { `guadeloupe `}  =  🇬🇵| غوادلوب 
  { `guatemala `}  =  🇬🇹| غواتيمالا   
  { `guinea `}  =  🇬🇳| غينيا  
  { `guineabissau `}  =  🇬🇼| غينيا بيساو  
  { `guyana `}  =  🇬🇫| غويانا  
  { `haiti `}  =  🇭🇹| هايتي  
  { `honduras `}  =  🇭🇳| هندوراس 🇭🇳
  { `hungary `}  =  🇭🇺| هنغاريا   
  { `india `}  =  🇮🇳| الهند   
  { `indonesia `}  =  🇮🇩| إندونيسيا   
  { `iraq `}  =  🇮🇶| العراق  
  { `ireland `}  =  🇮🇪| ايرلندا   
  { `italy `}  =  🇮🇹| ايطاليا   
  { `mongolia `}  =  🇲🇳| منغوليا   
  { `montenegro `}  =  🇲🇪| الجبل الأسود   
  { `jordan `}  =  🇯🇴| الأردن   
  { `kazakhstan `}  =  🇰🇿| كازاخستان  
  { `kenya `}  =  🇰🇪| كينيا  
  { `kuwait `}  =  🇰🇼| الكويت 
  { `latvia `}  =  🇱🇻| لاتفيا   
  { `liberia `}  =  🇱🇷| ليبيريا  
  { `libya `}  =  🇱🇾| ليبيا  
  { `luxembourg `}  =  🇱🇺| لوكسمبورغ   
  { `macau `}  =  🇲🇴| ماكاو  
  { `madagascar `}  =  🇲🇬| مدغشقر  
  { `malaysia `}  =  🇲🇾| ماليزيا  
  { `maldives `}  =  🇲🇻| جزر المالديف 
  { `mauritania `}  =  🇲🇷| موريتانيا  
  { `mexico `}  =  🇲🇽| المكسيك 
  { `morocco `}  =  🇲🇦| المغرب   
  { `nepal `}  =  🇳🇵| نيبال   
  { `newzealand `}  =  🇳🇿| نيوزيلاندا   
  { `nigeria `}  =  🇳🇬| نيجيريا   
  { `oman `}  =  🇴🇲| عمان   
  { `pakistan `}  =  🇵🇰| باكستان   
  { `paraguay `}  =  🇵🇾| باراغواي   
  { `poland `}  =  🇵🇱| بولندا  
  { `portugal `}  =  🇵🇹| البرتغال   
  { `qatar `}  =  🇶🇦| قطر  
  { `russia `}  =  🇷🇺| روسيا  
  { `saudiarabia `}  =  🇸🇦| السعودية  
  { `serbia `}  =  🇷🇸| صربيا   
  { `somalia `}  =  🇸🇴|الصومال   
  { `spain `}  =  🇪🇸| اسبانيا   
  { `sudan `}  =  🇸🇩| السودان   
  { `syria `}  =  🇸🇾| سوريا   
  { `tunisia `}  =  |🇹🇳 تونس   
  { `turkey `}  =  |🇹🇷 تركيا  
  { `uae `}  =  🇦🇪| الامارات   
  { `usa `}  =  🇺🇸| الولايات المتحدة 
";
$admin = "5927561859"
$tokensim="59546c5c6baa41e79976928891076b31"
$ch = file_get_contents("channel.txt");
$rssed = filter_var(file_get_contents("http://api1.5sim.biz/stubs/handler_api.php?api_key=$tokensim&action=getBalance"), FILTER_SANITIZE_NUMBER_INT);
$me = bot('getme',['bot'])->result->username;
$sales = json_decode(file_get_contents('sales.json'),1);
if($data == "pointsfile"){
$user = (file_get_contents("sales.json"));
file_put_contents("backup.json",$user);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
▪ تم عمل نسخة احتياطية بنجاح",
]);
bot("sendDocument",[
"chat_id"=>$admin,
"document"=>new CURLFILE("backup.json")
]);
}
/*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@@lliklu
*/
if (!isset($update)) {
  $user = (file_get_contents("sales.json"));
  file_put_contents("backup.json", $user);
  bot("sendDocument", [
    "chat_id" => $admin,
    "document" => new CURLFILE("backup.json"),
    "caption" => $time
  ]);
}
if ($data) {
  $status = bot('getChatMember', ['chat_id' =>"@".$ch, 'user_id' => $chat_id])->result->status;
  if ($status == "left") {
    bot("EditMessageText", [
      "chat_id" => $chat_id,
      "text" => "عليك الاشتراك في قناة البوت
      @$ch
      ",
      "message_id" => $message_id
    ]);
    exit;
  }
}
if($id!=$admin){
  if ($message->chat->type != "private" and $text) {
    bot("sendmessage", [
      "chat_id" => $admin,
      "text" => "قام هذا الشخص بالدخول عن طريق قروب
		$id
		@$user"
    ]);
    bot("leavechat", [
      "chat_id" => $chat_id,
    ]);
    return false;
  } }
  if (preg_match("/(start-100)/", $text) or preg_match("/(start -100)/", $text) or preg_match("/(start@)/", $text) or preg_match("/(start @)/", $text)) {
  bot("sendmessage", [
    "chat_id" => $admin,
    "text" => "قام هذا الشخص بالدخول على رابط بطريقة خاطئة
		$id
		@$user"
  ]);
  return false;
}
if($data == 'c'){
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*✅ - مرحبا بك عزيزي المطور @$user 🙋🏻*

*🔰 - هاذة اللوحة الخاصة بك والتي تستطيع من خلالها التحكم بالبوت 🧿.*

*🔄 - يرجى التحكم بالازرار الموجودة اسفل ⤵️.*",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
        [['text' => '✅ - إضافة دولة . ', 'callback_data' => 'add'], ['text' => '📛 - حذف دولة .', 'callback_data' => 'del']],
        [['text' => '✅ - إضافة قناة . ', 'callback_data' => 'addch'], ['text' => '📛 - حذف قناة .', 'callback_data' => 'delch']],
        [['text' => '💷 - شحن رصيد .', 'callback_data' => 'send'], ['text' => '💸 - خصم رصيد .', 'callback_data' => 'delete']],
        [['text'=>'⚙ - قائمة الدول المضافة .','callback_data'=>'city'],['text' => '🔍 - كشف حساب .', 'callback_data' => 'getKashf']],
        [['text' => '💬 - رسالة لعضو .', 'callback_data' => 'message'], ['text' => '⚠️ - إرسال تحذير .', 'callback_data' => 'tahdeer']],
        [['text' => '👨‍✈️ - اوامر الادمن .', 'callback_data' => 'admin'], ['text' => '🔔 - نسخة إحتياطية .', 'callback_data' => 'pointsfile']],
[['text'=>'📊 - إحصائيات البوت .','callback_data'=>'users']],
[['text'=>'حالة البوت 🔋','callback_data'=>'stats'], ['text'=>'رسالة للكل 📩 ','callback_data'=>'set']],
      ]
    ])
  ]);
$sales['mode'] = null;
  save($sales);
 }
/*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
if($chat_id == $admin){
 if($text == '/start'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"*✅ - مرحبا بك عزيزي المطور @$user 🙋🏻*

*🔰 - هاذة اللوحة الخاصة بك والتي تستطيع من خلالها التحكم بالبوت 🧿.*

*🔄 - يرجى التحكم بالازرار الموجودة اسفل ⤵️.*",
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
    [['text' => '✅ - إضافة دولة . ', 'callback_data' => 'add'], ['text' => '📛 - حذف دولة .', 'callback_data' => 'del']],
        [['text' => '✅ - إضافة قناة . ', 'callback_data' => 'addch'], ['text' => '📛 - حذف قناة .', 'callback_data' => 'delch']],
        [['text' => '💷 - شحن رصيد .', 'callback_data' => 'send'], ['text' => '💸 - خصم رصيد .', 'callback_data' => 'delete']],
        [['text'=>'⚙ - قائمة الدول المضافة .','callback_data'=>'city'],['text' => '🔍 - كشف حساب .', 'callback_data' => 'getKashf']],
        [['text' => '💬 - رسالة لعضو .', 'callback_data' => 'message'], ['text' => '⚠️ - إرسال تحذير .', 'callback_data' => 'tahdeer']],
        [['text' => '👨‍✈️ - اوامر الادمن .', 'callback_data' => 'admin'],['text' => '🔔 - نسخة إحتياطية .', 'callback_data' => 'pointsfile']],
[['text'=>'📊 - إحصائيات البوت .','callback_data'=>'users']],
[['text'=>'حالة البوت 🔋','callback_data'=>'stats'],['text'=>'رسالة للكل 📩 ','callback_data'=>'s']],
      ]
    ])
  ]);
$sales['mode'] = null;
  $sales["baageel"]=null;
  save($sales);
 }

 if ($data == 'getKashf') {
  bot('EditMessageText', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => "
أرسل أيدي الشخص الذي تريد كشف حسابه.
",
]);
$sales['mode'] = 'sendid';
save($sales);
exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'sendid'){
    $coo = $sales[$text]['collect'];
bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=> "✅ - تم الكشف بنجاح رصيدة : $coo روبل 💰",
]);
 $sales['mode'] = null;
save($sales);
exit;
}
  if ($data == 'send') {
    bot('EditMessageText', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "
أرسل أيدي الشخص الذي تريد إرسال الروبل له
",
]);
  $sales['mode'] = 'chat';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد إرسالها",
 ]);
   $sales['mode'] = 'poi';
   $sales['idd'] = $text;
  save($sales);
  exit;
}

if ($data == 'addch') {
  bot('EditMessageText', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => "
أرسل معرف القناة الذي تريد وضعها في اللإشتراك الاجباري.
",
]);
$sales['mode'] = 'sendch';
save($sales);
exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'sendch'){
bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=> "تم بنجاح وضع القناة في الاشتراك الاجباري \n $text",
]);
    file_put_contents("channel.txt", $text);
    $sales['mode'] = null;
    save($sales);
exit;
}

if ($data == 'delch') {
  bot('EditMessageText', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => "
- تم حذف القماة بنجاح.
",
]);
    unlink("channel.txt");
exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'sendch'){
bot('sendMessage',[
 'chat_id'=>$chat_id,
'text'=> "تم بنجاح وضع القناة في الاشتراك الاجباري \n $text",
]);
    file_put_contents("channel.txt", $text);
    $sales['mode'] = null;
    save($sales);
exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"✅ - تم شحن $text روبل بنجاح 💰.".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"✅ - تم شحن حسابك. بنجاح بمبلغ $text روبل 💰.",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] += $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}
  if ($data == 'delete') {
    bot('EditMessageText', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "
أرسل أيدي الشخص الذي تريد خصم الروبل منه
",
]);
  $sales['mode'] = 'chat1';
  save($sales);
  exit;
  }
  /*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
   if($text != '/start' and $text != null and $sales['mode'] == 'chat1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد خصمها",
 ]);
   $sales['mode'] = 'poi1';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم خصم $text روبل من حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت خصم $text روبل من حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] -= $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}

  if ($data == 'message') {
    bot('EditMessageText', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "
أرسل أيدي الشخص الذي تريد إرسال الرسالة له
",
]);
  $sales['mode'] = 'chat3';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat3'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "
أرسل رسالتك",
 ]);
   $sales['mode'] = 'poi3';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi3'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال الرسالة إلى ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"رسالة من الإدارة:

$text",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}
  if ($data == 'tahdeer') {
    bot('EditMessageText', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "
أرسل أيدي الشخص الذي تريد إرسال التحذير له
",
]);
  $sales['mode'] = 'chat4';
  save($sales);
  exit;
  }
  /*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
   if($text != '/start' and $text != null and $sales['mode'] == 'chat4'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "
إضغط /Confirm لتأكيد إرسال التحذير",
 ]);
   $sales['mode'] = 'poi4';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi4'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إرسال التحذير إلى ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تحذير من الإدارة!
إستعمال حسابات وهمية الدخول لرابطك بها يؤدي إلى حظر حسابك 👉
في حال إستعمال الوهمي سينحظر حسابك... إنتبه... شكرا على تفهمك للموضوع",
  ]);
  $sales['mode'] = null;
  $sales['idd'] = null;
  save($sales);
  exit;
}

 if($data == 'add'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل إسم السلعة؟!
مثال:
رقم بلجيكي 🇧🇪',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $sales['mode'] = 'add';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'add'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ إسم السلعة (الرقم)
أرسل الآن سعرها ( كم روبل؟ )
مثال:
25'
  ]);
  $sales['n'] = $text;
  $sales['mode'] = 'addm';
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'addm'){
  $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz12345689807'),1,7);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم حفظ الإسم والسعر...✅
   إسم السلعة: '.$sales['n'].'
السعر: '.$text.'
الكود: '.
"\n`$code`\n"
."ارسل اسم الدولة حسب موقع قائمة الارقام ",
    'parse_mode'=>"MarkDown",
  ]);
  
  $sales['sales'][$code]['name'] = $sales['n'];
  $sales['sales'][$code]['price'] = $text;
  $sales['n'] = null;
  $sales['mode'] = "file";
  $sales["baageel"]=$code;
  save($sales);
  exit;
 }
 if($text != '/start' and $text != null and $sales['mode'] == 'file'){
 	if(in_array($text,$city)){
 $sales["sales"][$sales["baageel"]]["country"]=$text;
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ الدولة
الان قم بارسال اسم التطبيق
واتس
فيس
تلي
ايمو
انستا
'
  ]);
  $sales['mode'] = "apps";
  save($sales);
  exit;
  }else{
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>"
   لم يتم حفظ الدولة 
   لانها ليست في قائمة الدولة 
   الرجاء ارسال اسم الدولة من قائمة الدول
   ",
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'- إلقائمة الرئيسية🔙','callback_data'=>'c']]
      ]
    ])
  ]);
exit;	
  }
 }
 /*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
 if($text != '/start' and $text != null and $sales['mode'] == 'apps'){
 	$yy=array("واتس","تلي","ايمو","فيس","انستا");
 	if(in_array($text,$yy)){
 	$text=str_replace(["واتس","تلي","ايمو","انستا","فيس"],["whatsapp","tg","imo","ig","facebook"],$text);
 $sales["sales"][$sales["baageel"]]["apps"]=strtolower($text);
  bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- تم حفظ بنحاح
',
'reply_markup'=>json_encode([
     'inline_keyboard'=>[
[['text'=>'- إلقائمة الرئيسية🔙','callback_data'=>'c']]
      ]
    ])
  ]);
    $sales["baageel"]=null;
  $sales['mode'] = null;
  save($sales);
  exit;}
  else{
  	bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'- قم بارسال اسم التطبيق
واتس
فيس
تلي
ايمو
انستا
'
  ]);
  }
 }
 if($data == 'del'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'أرسل كود السلعة للتأكيد',
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);
  $sales['mode'] = 'del';
  save($sales);
  exit;
 }
  if($data == 'city'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"قائمة الدول 
اضغط على اسم الدولة وسيتم النسخ

$cities
",
        'parse_mode'=>"MarkDown",
    'reply_markup'=>json_encode([
     'inline_keyboard'=>[
      [['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']]
      ]
    ])
  ]);}
 if($text != '/start' and $text != null and $sales['mode'] == 'del'){
  if($sales['sales'][$text] != null){
   bot('sendMessage',[
   'chat_id'=>$chat_id,
   'text'=>'تم الحذف بنجاح...✅
   إسم السلعة: '.$sales['sales'][$text]['name'].'
السعر: '.$sales['sales'][$text]['price'].'
الكود: '.$text
  ]);
  unset($sales['sales'][$text]);
  $sales['mode'] = null;
  save($sales);
  exit;
  } else {
   bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>'خطأ - الكود غير صحيح'
   ]);
  }
 }
} else {
 if(preg_match('/\/(start)(.*)/', $text)){
  $ex = explode(' ', $text);
  if(isset($ex[1])){
   if(!in_array($chat_id, $sales[$chat_id]['id'])){
    $sales[$chat_id]['baageel']=$ex[1];
    $sales[$chat_id]['id'][] = $chat_id;
    save($sales);
   
   }
  }
  /*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
  $status = bot('getChatMember',['chat_id'=>'@'.$ch,'user_id'=>$chat_id])->result->status;
  if($status == 'left'){
   bot('sendMessage',[
       'chat_id'=>$chat_id,
       'text'=>"*🛍 - عذرا عزيزي... يجب الإشتراك في القناة حتى تتمكن من إستخدام البوت...🙋‍♂*

*🔄 - إشترك هنا @$ch*
*🛎 - ثم إضغط /start 👉*",
'parse_mode'=>'markdown',
       'reply_to_message_id'=>$message->message_id,
   ]);
   exit();
  }
  if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
  if(preg_match("/\/(start)/",$text)){
    $sales[$sales[$chat_id]['baageel']]['collect'] += 1;
    save($sales);
    bot('sendmessage',[
    'chat_id'=>$sales[$chat_id]['baageel'],
    "text"=>"*✅ - قام @$user بالدخول عبر الرابط الخاص بك وحصلت 1Ꝑ 💰.*".$sales[$sales[$chat_id]['baageel']]['collect'], 
    ]);
    $sales[$chat_id]['baageel']=0;
    save($sales);
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
🙋🏻 - أهلا وسهلا بك في افضل بوت ارقام تسليم تلقائي 🌐

✅ - يتوفر لدينا أرقام لمختلف الدول العربية ، والأجنبية🛎
🔄 - لتفعيل جميع مواقع التواصل الاجتماعي ( واتس اب ، فيس بوك ، تيليجرام ، تويتر ، انستجرام 🛍)

~ عدد روبلك الآن: ".$sales[$chat_id]['collect']."
- الايدي : $chat_id
",
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'☎️ - شراء رقم وهمي .','callback_data'=>'numbers']],
     [['text'=>'🛍 - تجميع روبل .','callback_data'=>'col'],['text'=>'📋 - شرح البوت .','callback_data'=>'about']],[['text'=>'💰 - شحن حسابي .','callback_data'=>'buy'],['text'=>'📡 - قناة البوت. ','callback_data'=>'numberfree']],
     [['text'=>'❎ - معلومات وتحذيرات','callback_data'=>'bot'],['text'=>'🔄 - تحويل روبل .','callback_data'=>'transfer']],
[[ text =>"🤖 - بوت جيمبرو العالمي", url =>"http://t.me/GIMPROBOT"]],
] 
   ])
  ]);
 }}
 /*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
if($data == 'back'){
if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
  bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🙋🏻 - أهلا وسهلا بك في افضل بوت ارقام تسليم تلقائي 🌐

✅ - يتوفر لدينا أرقام لمختلف الدول العربية ، والأجنبية🛎
🔄 - لتفعيل جميع مواقع التواصل الاجتماعي ( واتس اب ، فيس بوك ، تيليجرام ، تويتر ، انستجرام 🛍)

~ عدد روبلك الآن: ".$sales[$chat_id]['collect']."
- الايدي : $chat_id
",
   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'☎️ - شراء رقم وهمي .','callback_data'=>'numbers']],
     [['text'=>'🛍 - تجميع روبل .','callback_data'=>'col'],['text'=>'📋 - شرح البوت .','callback_data'=>'about']],[['text'=>'💰 - شحن حسابي .','callback_data'=>'buy'],['text'=>'📡 - قناة البوت. ','callback_data'=>'numberfree']],
     [['text'=>'❎ - معلومات وتحذيرات','callback_data'=>'bot'],['text'=>'🔄 - تحويل روبل .','callback_data'=>'transfer']],
[[ text =>"🤖 - بوت جيمبرو العالمي", url =>"http://t.me/GIMPROBOT"]],
] 
   ])
  ]);
 }
  if($data == 'numbers'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'💯 الان قم باختيار التطبيق التي تريد تشغيل الرقم عليه
👇 من الكيبورد أدناه',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
     [['text'=>'• 🌐 - واتساب ( 𝗪𝗛𝗔𝗧𝗦𝗔𝗣𝗣 ) •','callback_data'=>'sales#whatsapp']],
[['text'=>'• 🧿 - تيلجيرام ( 𝗧𝗘𝗟𝗘𝗚𝗔𝗠 ) •','callback_data'=>'sales#tg']],
[['text'=>'• 🛍 - ايمو ( 𝗜𝗠𝗢 ) •','callback_data'=>'sales#imo']],
[['text'=>'• 🤖 - فيس بوك ( 𝗙𝗔𝗖𝗘𝗕𝗢𝗢𝗞  ) •','callback_data'=>'sales#facebook']],
[['text'=>'• 🛎 - انستجرام ( 𝗜𝗡𝗘𝗧𝗔𝗚𝗥𝗔𝗠  ) •','callback_data'=>'sales#ig']],
[['text'=>'الرجوع الى القائمة الرئيسية🔙','callback_data'=>'back']],
 ] 
   ])
  ]);
 }
 
 if($data == 'transfer'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"
✳️ - يمكنك الآن تحويل رصيد من حسابك الى حساب شخص آخر بشكل مباشر وفي مدة لاتتعدى الـ 5 ثواني ✅

🔄 - عمولة التحويل: %5. ✳️
⚠️ - أقل مبلغ للتحويل: ₽ 20.00 ⚜️

🔰 - ارسل ايدي الشخص الذي تريد التحويل الية الروبل .
",
  ]);
  $sales[$chat_id]['step'] = "sendfrom";
  save($sales);
 }
 $ex = explode('#', $data);
  
  if ($text != '/start' and $text != null and $sales[$chat_id]['step'] == "sendfrom") {
    bot('sendmessage',[
      'chat_id'=>$chat_id,
      'text'=>"
🛎 - ارسل عدد الروبل المراد التحويل الية .
      ",
      'reply_markup'=>json_encode([
        'inline_keyboard'=>[
      [['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
        ] 
       ])]);
       $sales[$chat_id]['step'] = "sendfrom2";
       $sales[$chat_id]['acc'] = $text;
       save($sales);
  }
  if ($text != '/start' and $text != null and $sales[$chat_id]['step'] == "sendfrom2") {
    $acc = $sales[$chat_id]['acc'];
    $coi = $sales[$chat_id]['collect'];
    $fee = $text * 5 / 100;
    $ds = $text + $fee;
    $coo = $coi - $ds;
    if($coi >= $ds){

      bot('sendmessage',[
      'chat_id'=>$chat_id,
      'text'=>"
✅ - هل تريد اتمام علمية التحويل؟ .

💸 - المبلغ : $text روبل
🆔 - ايدي المستلم : $acc
💰 - رصيدك قبل التحويل : $coi روبل
💷 - رصيدك بعد التحويل : $coo روبل

🛍 - هل تريد اتمام عملية التحويل لايمكنك التراجع بعد الموافقة 🙋🏻.
      ",
      'reply_markup'=>json_encode([
        'inline_keyboard'=>[
      [['text'=>"✅ - تاكيد .",'callback_data'=>"yesplease#$acc#$text"]],
      [['text'=>"❎ - إلغاء .",'callback_data'=>"back"]],
        ] 
       ])]);
       $sales[$chat_id]['step'] = null;
       save($sales);
  }else{
    bot('sendmessage',[
      'chat_id'=>$chat_id,
      'text'=>"
🛎 - لايوجد لديك روبلات كافية , تم الغاء عملية التحويل.
      ",
      'reply_markup'=>json_encode([
        'inline_keyboard'=>[
      [['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
        ] 
       ])]);
       $sales[$chat_id]['step'] = null;
       $sales[$chat_id]['acc'] = null;
       save($sales);
  }
  }
if($ex[0] == "yesplease"){
  $randi = rand(10000,99999);
  $acc = $ex[1];
  $ff = $ex[2];
  $coi = $sales[$chat_id]['collect'];
    $fee = $ff * 5 / 100;
    $ds = $ff + $fee;
    $coo = $coi - $ds;
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>"
✅ - تمت عملية التحويل بنجاح .

💸 - المبلغ : $ff روبل
🆔 - ايدي المستلم : $acc
💰 - رصيدك قبل التحويل : $coi روبل
💷 - رصيدك بعد التحويل : $coo روبل

Ⓜ️ - رقم المرجع : $randi
",
'reply_markup'=>json_encode([
  'inline_keyboard'=>[
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
  ] 
 ])]);
 $sales[$acc]['collect'] += $ex[2];
  $sales[$chat_id]['collect'] -= $ds;
  $sales[$chat_id]['acc'] = null;
 save($sales);
 bot('sendmessage',[
  'chat_id'=>$acc,
  'text'=>"
✅ - تم التحويل اليك  $ff Ꝑ 💰 من [$chat_id](tg://openmessage?user_id=$chat_id) 
",
'parse_mode'=>"Markdown",
'disable_web_page_preview' =>true,
'reply_markup'=>json_encode([
  'inline_keyboard'=>[
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
  ] 
 ])]);
} 
if($data == 'buy'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'🗞️ - تستطيع شحن حسابك الان عبر:

💠 #تحويل_كريمي_وايداع
💠 #تحويل_صرافة_يمنية
💠 #بطائق_سوا_stc
💠 #بايير_نقاط_رقمية
💠 #راجحي #stcpay
💠 #اسياسيل #زين_كاش

📬  - للشحن تواصل مع الوكيل الرسمي للبوت ✅
👨‍💻 حمادة : @TTY9T 🌐',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"✅ - تواصل مع حمادة",'url'=>"t.me/TTY9T"]],
[['text'=>"القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }



if($data == "about"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✅ - شرح البوت 🔥

1⃣ - تجميع النقاط من خلال نشر رابطك وكل شخص يقوم بالدخول الئ رابطك تحصل علئ 1💰.

2⃣ - بعد ما تقوم بجمع عدد النقاط التي تريد شراء بها رقم لدولة معينة اذهب الئ زر شراء ارقام ،  اختار التطبيق الذي تشاء ، وقم شراء الرقم ♻️

3⃣ - قم بادخال الرقم في التطبيق المعين والذي قمت بشرائة وطلب الكرد ومن ثم عد الئ البوت وضغط جلب الكود ⚜.

⚠️ - اي استفسار او خدمه تواصل معنا عبر الزر الموجود اسفل ⬇️.
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[[ text =>"✅ - تواصل مع الادارة", url =>"http://t.me/TTY9T"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
 
  $code = explode(":", file_get_contents("http://api1.5sim.biz/stubs/handler_api.php?api_key=$tokensim&action=getStatus&id={$ex[1]}"));
  if ($ex[0] == "innnnn") {
    if($code[1] == null){
      bot('answercallbackquery', [
        'callback_query_id' => $update->callback_query->id,
        'text' => "
⚠️ لم يصل الكود بعد، إضغط تحديث مجدداً بعد 5 ثوانٍ.
",
        'show_alert' => true,
    ]);
  }else{
    bot('editmessagetext', [
      'chat_id' => $chat_id,
      'message_id'=>$message_id,
      'text' => "☑️ - تم وصول الكود بنجاح 😌 • 

☎️ - الرقم : `$ex[2]` • 
✅ - الكود : `$code[1]` • 

🤖 - إضغط على الرقم او الكود للنسخ 🌻 •",
'parse_mode' => "MarkDown",
]);
//$sales[$chat_id]['code'] = $code[1];
//  save($sales);
  bot('sendMessage', [
    'chat_id' => $admin,
    'text' => "
☑️ - تم شراء رقم ناجح ؟! • 

🌍 - الدولة : $name • 
 📞 - الرقم : $ex[2] • 
🔄 - الكود : $code[1] • 
🛎 - الايدي : $chat_id • 
⚙ - المعرف : @$user •
",
'parse_mode' => "MarkDown",
]);
}
  }
  if ($ex[0] == "band") {
  	$code = explode(":", file_get_contents("http://api1.5sim.biz/stubs/handler_api.php?api_key=$tokensim&action=getStatus&id={$ex[1]}"));
  if($code[1] == null){
    file_get_contents("http://api1.5sim.biz/stubs/handler_api.php?api_key=$tokensim&action=setStatus&status=8&id={$ex[1]}");
    bot('editmessagetext', [
      'chat_id' => $chat_id,
      'text' => "
• تم الغاء الرقم بنجاح ، وتم ارجاع رصيدك •
      ",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
  'inline_keyboard'=>[
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
  ] 
 ])]);
 $sales[$chat_id]['collect'] += $ex[3];
  save($sales);
 
      bot('sendmessage', [
      'chat_id' => $admin,
      'text' => "
☑️ - تم حضر رقم بالبوت بنجاح ؟!

 📞 - الرقم : `+$ex[2]` • 
💰 - السعر : ".$ex[3]." • 
🛎 - الايدي : $chat_id • 
⚙ - المعرف : @$user •
      "]);
  }else{
  	bot('editmessagetext', [
      'chat_id' => $chat_id,
      'text' => "
• تم الغاء الرقم بنجاح .•
      ",
"message_id"=>$message_id,
'reply_markup'=>json_encode([
  'inline_keyboard'=>[
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
  ] 
 ])]);
 }
 }
if($data == "k1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
بعد الدخول للبوت إضغط على زر تجميع الروبل وبعدها سيرسل البوت لك رابط خاص بك فقط قم بنشره وأي شخص يدخل على الرابط تحصل على 1 روبل
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"الخطوة الثانية",'callback_data'=>"k2"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
 /*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
if($data == "k2"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
بعد جمع عدد جيد من الروبل إضغط على زر طلب رقم وبعدها اختر الدولة (يجب أن يتوافق سعر الرقم مع روبلك) بعدها تأكد أن لديك إسم مستخدم في إعدادات تيليجرام بعدها إضغط نعم لدي معرف - تأكيد
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"الخطوة الثالثة",'callback_data'=>"k3"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "k3"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
ستستلم الرقم تلقائي عند الشراء 
بعدها ادخل البرنامج المحدد وسجل الرقم وسوي ارسال رساله
بعدها اضغط زر ✅ - طلب الكود . في الرساله
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"لا أستطيع جمع الروبل",'callback_data'=>"k4"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "k4"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
إذا لا تستطيع جمع الروبل يمكنك شراؤها...??
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"شراء روبل 💸",'callback_data'=>"buy"],['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "numberfree"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🔰 - انضم لقناة البوت من خلال الزر بالاسفل 😌✅
",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"إشتراك 📢",'url'=>"http://t.me/$ch"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "bot"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"❌ - معلومات مهمة جدا عليك الاتزام بها لكي لايتم مصادرة حسابك من البوت نهائيآ🙋🏻 .
➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖
1⃣ - نشر رابطك ودخول اعضاء حقيقية وليست وهمية ⚜.

- في حال وجدنا اعضاء وهمية في رابط الدعوة الخاص بك سيتم مصادرة حسابك فورآ بدون اي تحذير او إشعار 🌐

2⃣ - استخدام الارقام التي تقوم بشرائها فيما يرضي الله ورسولة - عدم استخدامها في المحتوى الذي يغضب الله ♻️

3⃣ - اي رقم تقوم بشرائة نخلي كافة المسؤلية منة تدخل تقدم شكوئ ان الرقم انحضر او انسحب او ماتفعل الكود يتم حضرك نهائي ( لسنا مسئولون عن اي رقم يتم شرائة من البوت هاذا Ⓜ️. 

➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖

❌ - Very important information that you must adhere to in order not to have your account permanently confiscated from the bot🙋 .

1⃣ - publish your link and enter real members, not fake ⚜.

- If we find fake members in your invitation link, your account will be confiscated immediately without any warning or notice 🌐

2⃣ - use the numbers you buy to please Allah and his messenger - not to use them in content that angers Allah ♻️

3⃣ - any number you purchase, we disclaim all responsibility for it, you enter a complaint that the number showed up or withdrew, or what you do with the code, you are finally attended ( we are not responsible for any number purchased from the bot, that s m. 

➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖➖",
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[[ text =>"🅿️ - قناة البوت الرسمية .", url =>"https://t.me/$ch"]],
[['text'=>"🧑🏻‍💻 - إدارة البوت. ",'url'=>"https://t.me/TTY9T"]],
[['text'=>" القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }
if($data == "done"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
شكرا لاستخدامك البوت
",
  ]);
 }
/*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
 if($data == 'col'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'🌐 - هذا هو الرابط الخاص بك ⤵️

https://t.me/'.$me.'?start='.$chat_id.'
✅ - قم بنشر هذا الرابط بين الأصدقاء وكل شخص يشترك في البوت من خلال رابطك [ سوف تحصل على 1 روبل ] 🔥🛍.
',
'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>"العودة إلى القائمة الرئيسية 🔙",'callback_data'=>"back"]],
    ] 
   ])
  ]);
 }


 elseif(preg_match("/(sales)/",$data)){
 	$ex=explode("#",$data);
  $reply_markup = [];
  $reply_markup['inline_keyboard'][] = [['text'=>'✅ - الكمية','callback_data'=>'s'],['text'=>'💰 - السعر .','callback_data'=>'s'],['text'=>'☎️ - الدولة','callback_data'=>'s']];
  foreach($sales['sales'] as $code => $sale){
  	if($sales["sales"][$code]["apps"]==$ex[1]){
  	$co=$sales["sales"][$code]["country"];
  $ap=$sales["sales"][$code]["apps"];
  $count=json_decode(file_get_contents("http://api1.5sim.biz/stubs/handler_api.php?api_key=$tokensim&action=getNumbersStatus&country=$co"),1); 
  $a=$count[$ap."_0"];
  if($a==0){
  $a="❎";	
  }else{
  	$a="✅";	
  } 
   $reply_markup['inline_keyboard'][] = [['text'=>"$a",'callback_data'=>$code],['text'=>$sale['price'],'callback_data'=>$code],['text'=>$sale['name'],'callback_data'=>$code]];
  }}
if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
$reply_markup['inline_keyboard'][] = [['text'=>'🔄 - خروج خطوة واحدة','callback_data'=>'numbers']];
  $reply_markup = json_encode($reply_markup);
  bot('editMessageText',[
   'chat_id'=>$chat_id,
   'message_id'=>$message_id,
   'text'=>'🙋🏻 - أهلآ عـزيـزي آلَمستخدم
✅ - إليك قائمة بالأرقام المتوفرة حاليا قم بالضغط على احد الارقام لشرائه😌🛍.

~ عدد روبلك الآن: '.$sales[$chat_id]['collect'],
   'reply_markup'=>($reply_markup)
  ]);
  $sales[$chat_id]['mode'] = null;
   save($sales);
   exit;
 } elseif($data == 'yes'){
  $price = $sales['sales'][$sales[$chat_id]['mode']]['price'];
$name = $sales['sales'][$sales[$chat_id]['mode']]['name'];
$country=$sales['sales'][$sales[$chat_id]['mode']]['country'];
$apps=$sales['sales'][$sales[$chat_id]['mode']]['apps'];
if($name==null){
	exit;
}else{
	$z=$rssed;
	$api = json_encode(file_get_contents("http://api1.5sim.biz/stubs/handler_api.php?api_key=$tokensim&action=getNumber&service=$apps&forward=default&operator=$operator&country=$country"));
        if (preg_match("/(NO_NUMBERS)/", $api)) {
          bot("EditMessageText", [
            "chat_id" => $chat_id,
            "text" => "لم يتم تنفيذ طلبك
نظراً لعدم توفر الارقام حاليا في الموقع
            ",
            "message_id" => $message_id
          ]);
          exit;
        } elseif (preg_match("/(BAD_SERVICE)/", $api)) {
          bot("EditMessageText", [
            "chat_id" => $chat_id,
            "text" => "لم يتم تنفيذ طلبك
نظراً لعدم ادخل المعلومات الصحيحه من قبل الادمن
            ",
            "message_id" => $message_id
          ]);
          exit;
        } elseif (preg_match("/(NO_BALANCE)/", $api)) {
          bot("EditMessageText", [
            "chat_id" => $chat_id,
            "text" => "لم يتم تنفيذ طلبك
نظرا لعدم توفر الرصيد الكافي في البوت
الرجاء الانتظار والمحاولة لاحقا
            ",
            "message_id" => $message_id
          ]);
          exit;
        }
        $num = explode(":", $api);
$numb = str_replace('"',"", $num[2]);
if($numb==null){
bot("EditMessageText", [
            "chat_id" => $chat_id,
            "text" => "لم يتم تنفيذ طلبك
نظراً لمشكلة في الموقع
            ",
            "message_id" => $message_id
          ]);
          exit;
}
        bot("EditMessageText", [
          "chat_id" => $chat_id,
          "text" => "✅ - تم جلب الرقم لك ⬇️.",
          "message_id" => $message_id
        ]);
        
        bot('sendMessage', [
          'chat_id' => $chat_id,
          'text' => "*✅ - تم شراء الرقم من البوت بنجاح 🛍*

*🔄 - الدولة : $name*
*☎️ - الرقم :* `+$numb`
*💰 - السعر : $price*
*⏰ - الوقت : 20$date | $time*

*🔰 - ادخل الرقم في التطبيق الذي اخترته لوصول الكود 😌*
",
'parse_mode' => "MarkDown",
 'reply_markup' => json_encode([
            'inline_keyboard' => [
[["text"=>"↗️ - فحص الرقم في واتساب .","url"=>"http://wa.me/$numb"]],
[['text' => '✅ - طلب الكود .', 'callback_data' => "innnnn#$num[1]#+$numb"]], [['text' => '⚠️ - إلغاء الرقم . ', 'callback_data' => "band#$num[1]#$num[2]#$price"]],[['text' => '🔄 - تم بنجاح .', 'callback_data' => "done"]],
            ]])
        ]);
                $rssed = filter_var(file_get_contents("http://api1.5sim.biz/stubs/handler_api.php?api_key=$tokensim&action=getBalance"), FILTER_SANITIZE_NUMBER_INT);
  bot('sendmessage',[
   'chat_id'=>$admin,
   'text'=>"☑️ - تم شراء رقم بدون الكود  ؟! • 

🌍 - الدولة : $name • 
 📞 - الرقم : +$numb • 
💰 - السعر : $price • 
🛎 - الايدي : $chat_id • 
⚙ - المعرف : @$user •
"
  ]);
  $sales[$chat_id]['mode'] = null;
  $sales[$chat_id]['collect'] -= $price;
  save($sales);
  exit;
 } }else {
   if($data == 's') { exit; }
   $price = $sales['sales'][$data]['price'];
   $name = $sales['sales'][$data]['name'];
   if($price != null){
    if($price <= $sales[$chat_id]['collect']){
     bot('editMessageText',[
      'chat_id'=>$chat_id,
      'message_id'=>$message_id,
      'text'=>"
✅ - هل أنت متأكد وتريد إتمام الطلب.؟

☎️ - طلبك هو:  $name
🛍 - رقم لدولة $name بسعر $price 💰 .",
      'reply_markup'=>json_encode([
       'inline_keyboard'=>[
        [['text'=>'✅ - نعم متاكد .','callback_data'=>'yes']],
[['text'=>'❎ - الغاء الشراء .','callback_data'=>'back']] 
       ] 
      ])
     ]);
     $sales[$chat_id]['mode'] = $data;
     save($sales);
     exit;
    } else {
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
      'text'=>'روبلك غير كافية لشراء هذا الرقم',
      'show_alert'=>true
     ]);
    }
   }
 }
}
/*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
$ary = array($admin);
$id = $message->chat->id;
$admins = in_array($id,$ary);
$data = $update->callback_query->data;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cut = explode("\n",file_get_contents("stats/users.txt"));
$users = count($cut)-1;
$mode = file_get_contents("stats/bc.txt");
#Start code 

if ($update && !in_array($id, $cut)) {
    mkdir('stats');
    file_put_contents("stats/users.txt", $id."\n",FILE_APPEND);
    bot('sendMessage',[
      'chat_id'=>$admin,
       text =>"✅ - تم دخول شخص جديد الئ البوت الخاص
بك .

🛎 - اسم الشخص : $name
🌐 - الايدي : $chat_id
🔄 - المعرف : @$user
🛍 - عدد المشتركين الكلي : $users",
  ]);
  }
/*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
    if(preg_match("/(admin)/",$text) && $admins) {
        bot('sendMessage',[
            'chat_id'=>$chat_id,
          'text'=>"
أهلا مطوري...
شبيك لبيك البوت بين يديك
إضغط على طلبك في القائمة وستتم تلبية الطلب تلقائيا...🌚 
-",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
    [['text'=>'عدد المشتركين 👥 ','callback_data'=>'users'],['text'=>'رسالة للكل 📩 ','callback_data'=>'set']],
    [['text'=>'حالة البوت 🔋 ','callback_data'=>'stats']],
                ]
                ])
            ]);
    }
    if($data == 'admin'){
    bot('editMessageText',[
    'chat_id'=>$chat_id2,
    'message_id'=>$message_id,
    'text'=>"
أهلا مطوري...
شبيك لبيك البوت بين يديك
إضغط على طلبك في القائمة وستتم تلبية الطلب تلقائيا...🌚 
-",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
    [['text'=>'عدد المشتركين 👥 ','callback_data'=>'users'],['text'=>'رسالة للكل 📩 ','callback_data'=>'set']],
    [['text'=>'حالة البوت 🔋 ','callback_data'=>'stats']],
                ]
                ])
    ]);
    file_put_contents('stats/bc.txt', 'no');
    }
    
    if($data == "users"){ 
        bot('answercallbackquery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"
المشتركين $users
-",
            'show_alert'=>true,
    ]);
    }
    
    if($data == "set"){ 
        file_put_contents("stats/bc.txt","yas");
        bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text'=>"
أرسل رسالتك ليتم إرسالها إلى $users مشترك 👥
كتابة فقط...🌚
-
    ",
    'reply_to_message_id'=>$message->message_id,
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>' الغاء 🚫. ','callback_data'=>'homestats']]    
            ]
        ])
        ]);
    }
    if($text and $mode == "yas" && $admins){
        bot('sendMessage',[
              'chat_id'=>$chat_id,
              'text'=>"
تم قبول رسالتك!
ويتم إرسالها إلى $users مشترك 👥
-",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'رجوع ','callback_data'=>'homestats']]    
            ]
        ])
    ]);
    for ($i=0; $i < count($cut); $i++) { 
     bot('sendMessage',[
    'chat_id'=>$cut[$i],
    'text'=>"$text",
    'parse_mode'=>"MarkDown",
    'disable_web_page_preview'=>true,
    ]);
    file_put_contents("stats/bc.txt","no");
    } 
    }
    /*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
    date_default_timezone_set("Asia/Baghdad");
    $getMe = bot('getMe')->result;
    $date = $message->date;
    $gettime = time();
    $sppedtime = $gettime - $date;
    $time = date('h:i');
    $date = date('y/m/d');
    $userbot = "{$getMe->username}";
    $userb = strtoupper($userbot);
    if($data == "stats"){ 
    if ($sppedtime == 3  or $sppedtime < 3) {
    $f = "ممتازة";
    }
    if ($sppedtime == 9 or $sppedtime > 9 ) {
    $f = "لا بأس";
    }
    if ($sppedtime == 10 or $sppedtime > 10) {
    $f = " سيئة جدا";
    }
     bot('EditMessageText',[
        'chat_id'=>$chat_id2,
        'message_id'=>$update->callback_query->message->message_id,
        'text' =>"
معلومات البوت:

معرف البوت @$userb
حالة البوت $f
الوقت الآن: 20$date | $time 
-",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>'- إلغاء الأمر 🚫','callback_data'=>'c']],
            ]
        ])
       ]);
    }
if($message->reply_to_message and $message->from->id==$admin and $text=="رفع"){
$a= $message->reply_to_message->document->file_id;
$get=bot("getfile",[
"file_id"=>$a
])->result->file_path; 
$v="sales.json";
$file=file_put_contents($v, file_get_contents("https://api.telegram.org/file/bot".API_KEY."/".$get));
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"تم الرفع"
]);
}
/*
اصل الملف ملف مسلم للارقام(التسليم يدوي)
تم تطويره وربطه بموقع الارقام بواسطة 𝗦َ𝙥َ𝙚َ𝙚َ𝘿
@lliklu
*/
    ?>

