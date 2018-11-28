<?php
$token ="760714073:AAHYoNXVIlHabTqffK4ms7TOCaAFC776uR8";
define("API_KEY", "$token");

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
function sendtext($chat_id,$n,$message_id,$content,$wasf){
	$next = $nsura1;
	file_put_contents("data/$chat_id.txt",$next);
	 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"
	حصن المسلم
	ـــــــــــــــــــــــــــ($n)
	$content
	ــــــــــــــــــــــ
	$wasf
	",
     'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"الصفحه السابقه◀️",'callback_data'=>"back1"],
           ['text'=>"▶️الصفحه التاليه",'callback_data'=>"next1"]],
           [['text'=>"↩️الصفحه الرئيسيه↪️",'callback_data' =>"main"]]
                ]
                ])
]);
 }
function send($chat_id, $sura, $aya, $nsura1,$message_id){
	$next = $nsura1;
	file_put_contents("data/$chat_id.txt",$next);
	 bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
 bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"http://www.islamicbook.ws/2/$nsura1.jpg",
'caption'=>"
- سورة $sura -
- عدد آياتها $aya-
- الصفحه رقم $nsura1 -",
     'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"الصفحه السابقه◀️",'callback_data'=>"back"],
           ['text'=>"▶️الصفحه التاليه",'callback_data'=>"next"]],
           [['text'=>"السورة السابقه◀️",'callback_data'=>"backs"],
           ['text'=>"▶️السورة التاليه",'callback_data'=>"nexts"]],
           [['text'=>"↩️الصفحه الرئيسيه↪️",'callback_data' =>"main"]]
                ]
                ])
]);
 }
 function sendvideo($chat_id, $sura, $number,$message_id){
 bot('sendvideo',[
   'chat_id'=>$chat_id,
   'video'=>"https://t.me/devxi/$number",
    'caption'=>"
- $sura -
	",
	'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main"]]
                ]
                ])
]);
 }
 function sendduc($chat_id, $sura, $number,$message_id){
 bot('sendDocument',[
   'chat_id'=>$chat_id,
   'document'=>"https://t.me/devxi/$number",
    'caption'=>"
- $sura -
	",
	'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main"]]
                ]
                ])
]);
 }
 function sendvoice($chat_id, $sura, $number,$message_id){
 bot('sendvoice',[
   'chat_id'=>$chat_id,
   'voice'=>"https://t.me/devxi/$number",
    'caption'=>"
- $sura -
	",
	'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main"]]
                ]
                ])
]);
 }
 
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$message_id = $message->message_id;
$id = $message->from->id;
$from_id = $message->from->id;
$username = $message->from->username;
$name = $message->from->first_name;

if(isset($update->callback_query)){
$callbackMessage = '';
var_dump(bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>$callbackMessage]));
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$message_id = $up->message->message_id;
$data = $up->data;
}
mkdir("data");
 $next = file_get_contents("data/$chat_id.txt");
 $nsura = file_get_contents("data/n$chat_id.txt");
//------//
// اذاعه + عدد المشتركين
$admin = 188949485; // ايديك
$u = explode("\n", file_get_contents("mem.txt"));
 function re($d,$f,$g){
 return str_replace($d, $f, $g);
}
$from_id1  = $message->from->id;
if ($from_id1==$admin) {
  if($text == "/start" or $text == "رجوع 🔙"){
  	file_put_contents("data/$chat_id.txt","1");
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"مرحبا بك ادمن البوت",
    'resize_keyboard'=>true,
    'reply_markup'=>json_encode([
      'keyboard'=>[
        [['text'=>'ارسال رساله الى الكل 🚀'],['text'=>'الاعضاء 👥']]
      ]
    ])
        ]);
}
if ($text == 'ارسال رساله الى الكل 🚀') {
  file_put_contents('mode.txt', "bc");
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"ارسل اي شي ليتم نشره",
	'resize_keyboard'=>true,
    'reply_markup'=>json_encode([
      'keyboard'=>[
        [['text'=>'رجوع 🔙']]
      ]
    ])
  ]);
}
$mode = file_get_contents('mode.txt');
if($text == "رجوع 🔙"){
	unlink('mode.txt');
}
elseif( $mode=="bc"){
  if ($text != "ارسال رساله الى الكل 🚀" or $text != "رجوع 🔙") {
    # code...
  for ($i=0; $i < count($u); $i++) {
    bot('sendMessage',[
      'chat_id'=>$u[$i],
      'text'=>"# $text",
	  'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
    ]);
  }
unlink('mode.txt');
}
  if ($message->photo) {
    for ($i=0; $i < count($u); $i++) {
    bot('sendPhoto',[
      'chat_id'=>$u[$i],
      'photo'=>$message->photo[0]->file_id,
      'caption'=>$message->caption
    ]);
}
unlink('mode.txt');

  }
  if ($message->voice) {
    for ($i=0; $i < count($u); $i++) {
    bot('sendvoice',[
      'chat_id'=>$u[$i],
      'voice'=>$message->voice->file_id,
      'caption'=>$message->caption
      ]);
}
unlink('mode.txt');

}
}
$c = count($u);
if ($text == 'الاعضاء 👥') {
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"مستخدمين البوت 🤖 الخاص بك :- $c"
  ]);
} 
}
if ($update && !in_array($chat_id, $u)) {
 file_put_contents("mem.txt", $chat_id."\n",FILE_APPEND);
}
# start
if ($text =="/start" or $data == "main"){
file_put_contents("data/$chat_id.txt","1");
file_put_contents("data/n$chat_id.txt","1");
bot(sendMessage,[
         chat_id =>$chat_id,
         text =>"
- مرحبا بك $name في بوت القرآن الكريم -
- 📚المكتبه الاسلاميه🎧📿
- ✅قسم المصحف ملون وفيه تفسير لبعض الكلمات📖 -
- ✅ قسم سور القرآن كامله mp3🎧 -
- ✅ قسم المحاضرات دينيه صوتيه ومقاطع💽 -
- ✅ قسم المقاطع قرآنيه قصيره📱 -
- ✅ قسم تلاوات خاشعه mp3 و mp4🎼 -
ـ ✅ قسم الكتب اسلاميه 📚-
- ✅ اذكار الصباح و المساء📿 -
- ✅حصن المسلم📿 -
- ✅برامج اسلاميه apk-
- ✅ قسم تحميل القرآن كامل مضغوط برابط 
مباشر💾 -
- ✅انشر البوت 🌐 وسيكون لك صدقه جاريه 😊
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المصحف قراءة 📖 ",'callback_data'=>"quran"],['text'=>"القرآن مسموع mp3 🎧",'callback_data'=>"mp3"]],
		   [['text' =>"تحميل القرآن كامل",'callback_data' =>"download"],['text' =>"📍اذكار الصباح و المساء📿",'callback_data' =>"azkar"]],
		   [['text' =>"محاضرات دينيه 💽",'callback_data' =>"lec"],['text' =>"كتب اسلاميه 📚",'callback_data' =>"book"]],
		   [['text' =>" قسم تلاوات خاشعه mp3 و mp4🎼",'callback_data' =>"download"],['text' =>"حصن المسلم",'callback_data' =>"hisn"]],
		   [['text' =>"برامج اسلاميه apk",'callback_data' =>"apk"]],
           [['text' =>"قناة البوت💡",'url' =>"https://t.me/Ari7msm3k"]],
		   [['text' =>"📤اقتراح او الاستفسار💭",'url' =>"https://t.me/iiviiii"]]
                ]
                ])
                ]);
               }
 # main
               if($data =="main1"){
	bot(editMessageText,[
         chat_id =>$chat_id,
         text =>"
- مرحبا بك $name  -
- 📚المكتبه الاسلاميه🎧📿
- ✅قسم المصحف ملون وفيه تفسير لبعض الكلمات📖 -
- ✅ قسم سور القرآن كامله mp3🎧 -
- ✅ قسم المحاضرات دينيه صوتيه ومقاطع💽 -
- ✅ قسم المقاطع قرآنيه قصيره📱 -
- ✅ قسم تلاوات خاشعه mp3 و mp4🎼 -
ـ ✅ قسم الكتب اسلاميه 📚-
- ✅ اذكار الصباح و المساء📿 -
- ✅حصن المسلم📿 -
- ✅برامج اسلاميه apk-
- ✅ قسم تحميل القرآن كامل مضغوط برابط 
مباشر💾 -
- ✅انشر البوت 🌐 وسيكون لك صدقه جاريه 😊
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المصحف قراءة 📖 ",'callback_data'=>"quran"],['text'=>"القرآن مسموع mp3 🎧",'callback_data'=>"mp3"]],
		   [['text' =>"تحميل القرآن كامل",'callback_data' =>"download"],['text' =>"📍اذكار الصباح و المساء📿",'callback_data' =>"azkar"]],
		   [['text' =>"محاضرات دينيه 💽",'callback_data' =>"lec"],['text' =>"كتب اسلاميه 📚",'callback_data' =>"book"]],
		   [['text' =>" قسم تلاوات خاشعه mp3 و mp4🎼",'callback_data' =>"download"],['text' =>"حصن المسلم",'callback_data' =>"hisn"]],
		   [['text' =>"برامج اسلاميه apk",'callback_data' =>"apk"]],
           [['text' =>"قناة البوت💡",'url' =>"https://t.me/Ari7msm3k"]],
		   [['text' =>"📤اقتراح او الاستفسار💭",'url' =>"https://t.me/iiviiii"]]
                ]
                ])
                ]);
	}
	# content
	switch($data){
case 1: send($chat_id, "الفاتحة 🕋", 7, 1, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 2: send($chat_id, "البقــرة 🕌", 286, 2, $message_id);file_put_contents("data/n$chat_id.txt",$data);reak;
case 3: send($chat_id, "آلﻋــمران 🕌",200, 50, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 4: send($chat_id, "النســاء 🕌",176, 77, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 5: send($chat_id, "المــائدة 🕌", 120, 106, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 6: send($chat_id, "الأنعــام 🕋", 165, 128, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 7: send($chat_id, "الأعــراف 🕋", 296, 151, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 8: send($chat_id, "الأنفــال 🕌", 75, 177, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 9: send($chat_id, "التوبــه 🕌", 129, 187, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 10: send($chat_id, "يونـس 🕋", 109, 208, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 11: send($chat_id, "هــود 🕋", 123, 221, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 12: send($chat_id, "يوسـف 🕋", 111, 235, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 13: send($chat_id, "الرعــد 🕌", 43, 249, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 14: send($chat_id, "إبراهيــم 🕋", 52, 255, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 15: send($chat_id, "الحجــر 🕋", 99, 262, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 16: send($chat_id, "النحــل 🕋", 128, 267, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 17: send($chat_id, "الإسـراء 🕋", 111, 282, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 18: send($chat_id, "الكهـف 🕋", 110, 293, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 19: send($chat_id, "مريــم 🕋", 98, 305, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 20: send($chat_id, "طــه 🕋", 135, 312, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 21: send($chat_id, "الأنبيــاء 🕋", 112, 322, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 22: send($chat_id, "الحــج 🕌", 98, 332, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 23: send($chat_id, "المؤمنـون 🕋", 118, 342, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 24: send($chat_id, "النــور 🕌", 64, 350, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 25: send($chat_id, "الفــرقان 🕋", 77, 359, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 26: send($chat_id, "الشعــراء 🕋", 227, 367, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 27: send($chat_id, "النــمل 🕋", 93, 377, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 28: send($chat_id, "القصص 🕋", 88, 385, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 29: send($chat_id, "العـنكبوت 🕋", 69, 396, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 30: send($chat_id, "الــروم 🕋", 60, 404, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 31: send($chat_id, "لقــمان 🕋", 34, 411, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 32: send($chat_id, "السجـدة 🕋", 30, 415, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 33: send($chat_id, "الأحـزاب 🕌", 73, 418, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 34: send($chat_id, "سبـأ 🕋", 54, 428, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 35: send($chat_id, "فـاطـر 🕋", 45, 434, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 36: send($chat_id, "يــس 🕋", 83, 440, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 37: send($chat_id, "الصـافات 🕋", 182, 446, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 38: send($chat_id, "ص 🕋", 88, 453, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 39: send($chat_id, "الزمــر 🕋", 75, 458, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 40: send($chat_id, "غــافر 🕋 ", 85, 467, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 41: send($chat_id, "فصـلت 🕋", 54, 477, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 42: send($chat_id, "الشــورﻯ 🕋", 53, 483, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 43: send($chat_id, "الزخـرف 🕋", 89, 489, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 44: send($chat_id, "الدخان 🕋", 59, 496, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 45: send($chat_id, "الجاثية 🕋", 37, 499, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 46: send($chat_id, "الأحقاف 🕋", 35, 502, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 47: send($chat_id, "محــمد 🕌", 38, 507, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 48: send($chat_id, "الفتــح 🕌", 29, 511, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 49: send($chat_id, "الحجرات 🕌", 18, 515, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 50: send($chat_id, "ق 🕋", 45, 518, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 51: send($chat_id, "الذاريات 🕋", 60, 520, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 52: send($chat_id, "الطـور 🕋", 40, 523, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 53: send($chat_id, "النـجم 🕋", 62, 526, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 54: send($chat_id, "القمـر 🕋", 55, 528, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 55: send($chat_id, "الرحمـن 🕌", 75, 531, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 56: send($chat_id, "الواقعة 🕌", 96, 534, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 57: send($chat_id, "الحــديد 🕌", 29, 537, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 58: send($chat_id, "المجادلة 🕌", 22, 542, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 59: send($chat_id, "الحــشر 🕌", 24, 545, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 60: send($chat_id, "الممتحنــة 🕌", 13, 549, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 61: send($chat_id, "الصــف 🕌", 14, 551, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 62: send($chat_id, "الجمعــة 🕌", 11, 553, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 63: send($chat_id, "المناقــون 🕌", 11, 554, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 64: send($chat_id, "التغـابن 🕌", 18, 556, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 65: send($chat_id, "الطــلاق 🕌", 12, 558, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 66: send($chat_id, "التحــريم 🕌", 12, 560, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 67: send($chat_id, "الملك 🕋", 30, 562, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 68: send($chat_id, "القلم 🕋", 52, 564, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 69: send($chat_id, "الحاقة 🕋", 52, 566, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 70: send($chat_id, "المعارج 🕋", 44, 568, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 71: send($chat_id, "نـوح 🕋", 28, 570, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 72: send($chat_id, "الجـن 🕋", 28, 572, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 73: send($chat_id, "المزمل 🕋", 20, 574, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 74: send($chat_id, "المدثر 🕋", 56, 575, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 75: send($chat_id, "القيامة 🕋", 40, 577, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 76: send($chat_id, "الأنسان 🕌", 31, 578, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 77: send($chat_id, "المرسلات 🕋", 50, 580, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 78: send($chat_id, "النبأ 🕋", 40, 582, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 79: send($chat_id, "النازعات 🕋", 46, 583, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 80: send($chat_id, "عبـس 🕋", 42, 585, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 81: send($chat_id, "التكوير 🕋", 29, 586, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 82: send($chat_id, "الانفطار 🕋", 19, 587, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 83: send($chat_id, "المطففين 🕋", 36, 587, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 84: send($chat_id, "الانشقاق 🕋", 25, 589, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 85: send($chat_id, "البروج 🕋", 22, 590, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 86: send($chat_id, "الطارق 🕋", 17, 591, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 87: send($chat_id, "الأعلى 🕋", 19, 591, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 88: send($chat_id, "الغاشية 🕋", 26, 592, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 89: send($chat_id, "الفجـر 🕋", 30, 593, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 90: send($chat_id, "البلـد 🕋", 20, 594, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 91: send($chat_id, "الشمـس 🕋", 15, 595, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 92: send($chat_id, "الليـل 🕋", 21, 595, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 93: send($chat_id, "الضحـى 🕋", 11, 596, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 94: send($chat_id, "الشـرح 🕋", 8, 596, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 95: send($chat_id, "التيـن 🕋", 8, 597, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 96: send($chat_id, "العلـق 🕋", 19, 597, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 97: send($chat_id, "القـدر 🕋", 5, 598, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 98: send($chat_id, "البينـة 🕌", 8, 598, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 99: send($chat_id, "الزلزلة 🕌", 8, 599, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 100: send($chat_id, "العاديات 🕋", 11, 599, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 101: send($chat_id, "القارعة 🕋", 11, 600, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 102: send($chat_id, "التكاثر 🕋", 8, 600, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 103: send($chat_id, "العصـر 🕋", 3, 601, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 104: send($chat_id, "الهمـزة 🕋", 9, 601, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 105: send($chat_id, "الفيـل 🕋", 5, 601, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 106: send($chat_id, "قريـش 🕋", 4, 602, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 107: send($chat_id, "الماعـون 🕋", 7, 602, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 108: send($chat_id, "الكـوثر 🕋", 3, 602, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 109: send($chat_id, "الكافـرون 🕋", 6, 603, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 110: send($chat_id, "النـصر 🕌", 3, 603, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 111: send($chat_id, "المسـد 🕋", 5, 603, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 112: send($chat_id, "الأخلاص 🕋", 4, 604, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 113: send($chat_id, "الفلـق 🕋", 5, 604, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
case 114: send($chat_id, "النـاس 🕋", 6, 604, $message_id);file_put_contents("data/n$chat_id.txt",$data);break;
# yasir 
case "yasir1": sendvoice($chat_id, "الفاتحة 🕋", "233", $message_id);break;
case "yasir2": sendvoice($chat_id, "البقــرة 🕌", "234", $message_id);break;
case "yasir3": sendvoice($chat_id, "آلﻋــمران 🕌", "235", $message_id);break;
case "yasir4": sendvoice($chat_id, "النســاء 🕌", "236", $message_id);break;
case "yasir5": sendvoice($chat_id, "المــائدة 🕌", "237", $message_id);break;
case "yasir6": sendvoice($chat_id, "الأنعــام 🕋", "238", $message_id);break;
case "yasir7": sendvoice($chat_id, "الأعــراف 🕋", "239", $message_id);break;
case "yasir8": sendvoice($chat_id, "الأنفــال 🕌", "240", $message_id);break;
case "yasir9": sendvoice($chat_id, "التوبــه 🕌", "241", $message_id);break;
case "yasir10": sendvoice($chat_id, "يونـس 🕋", "242", $message_id);break;
case "yasir11": sendvoice($chat_id, "هــود 🕋", "243", $message_id);break;
case "yasir12": sendvoice($chat_id, "يوسـف 🕋", "244", $message_id);break;
case "yasir13": sendvoice($chat_id, "الرعــد 🕌", "245", $message_id);break;
case "yasir14": sendvoice($chat_id, "إبراهيــم 🕋", "246", $message_id);break;
case "yasir15": sendvoice($chat_id, "الحجــر 🕋", "247", $message_id);break;
case "yasir16": sendvoice($chat_id, "النحــل 🕋", "248", $message_id);break;
case "yasir17": sendvoice($chat_id, "الإسـراء 🕋", "249", $message_id);break;
case "yasir18": sendvoice($chat_id, "الكهـف 🕋", "250", $message_id);break;
case "yasir19": sendvoice($chat_id, "مريــم 🕋", "251", $message_id);break;
case "yasir20": sendvoice($chat_id, "طــه 🕋", "252", $message_id);break;
case "yasir21": sendvoice($chat_id, "الأنبيــاء 🕋", "253", $message_id);break;
case "yasir22": sendvoice($chat_id, "الحــج 🕌", "254", $message_id);break;
case "yasir23": sendvoice($chat_id, "المؤمنـون 🕋", "255", $message_id);break;
case "yasir24": sendvoice($chat_id, "النــور 🕌", "256", $message_id);break;
case "yasir25": sendvoice($chat_id, "الفــرقان 🕋", "257", $message_id);break;
case "yasir26": sendvoice($chat_id, "الشعــراء 🕋", "258", $message_id);break;
case "yasir27": sendvoice($chat_id, "النــمل 🕋", "259", $message_id);break;
case "yasir28": sendvoice($chat_id, "القصص 🕋", "260", $message_id);break;
case "yasir29": sendvoice($chat_id, "العـنكبوت 🕋", "261", $message_id);break;
case "yasir30": sendvoice($chat_id, "الــروم 🕋", "262", $message_id);break;
case "yasir31": sendvoice($chat_id, "لقــمان 🕋", "263", $message_id);break;
case "yasir32": sendvoice($chat_id, "السجـدة 🕋", "264", $message_id);break;
case "yasir33": sendvoice($chat_id, "الأحـزاب 🕌", "265", $message_id);break;
case "yasir34": sendvoice($chat_id, "سبـأ 🕋", "266", $message_id);break;
case "yasir35": sendvoice($chat_id, "فـاطـر 🕋", "267", $message_id);break;
case "yasir36": sendvoice($chat_id, "يــس 🕋", "268", $message_id);break;
case "yasir37": sendvoice($chat_id, "الصـافات 🕋", "269", $message_id);break;
case "yasir38": sendvoice($chat_id, "ص 🕋", "270", $message_id);break;
case "yasir39": sendvoice($chat_id, "الزمــر 🕋", "271", $message_id);break;
case "yasir40": sendvoice($chat_id, "غــافر 🕋 ", "272", $message_id);break;
case "yasir41": sendvoice($chat_id, "فصـلت 🕋", "273", $message_id);break;
case "yasir42": sendvoice($chat_id, "الشــورﻯ 🕋", "274", $message_id);break;
case "yasir43": sendvoice($chat_id, "الزخـرف 🕋", "275", $message_id);break;
case "yasir44": sendvoice($chat_id, "الدخان 🕋", "276", $message_id);break;
case "yasir45": sendvoice($chat_id, "الجاثية 🕋", "277", $message_id);break;
case "yasir46": sendvoice($chat_id, "الأحقاف 🕋", "278", $message_id);break;
case "yasir47": sendvoice($chat_id, "محــمد 🕌", "279", $message_id);break;
case "yasir48": sendvoice($chat_id, "الفتــح 🕌", "280", $message_id);break;
case "yasir49": sendvoice($chat_id, "الحجرات 🕌", "281", $message_id);break;
case "yasir50": sendvoice($chat_id, "ق 🕋", "282", $message_id);break;
case "yasir51": sendvoice($chat_id, "الذاريات 🕋", "333", $message_id);break;
case "yasir52": sendvoice($chat_id, "الطـور 🕋", "301", $message_id);break;
case "yasir53": sendvoice($chat_id, "النـجم 🕋", "298", $message_id);break;
case "yasir54": sendvoice($chat_id, "القمـر 🕋", "302", $message_id);break;
case "yasir55": sendvoice($chat_id, "الرحمـن 🕌", "303", $message_id);break;
case "yasir56": sendvoice($chat_id, "الواقعة 🕌", "304", $message_id);break;
case "yasir57": sendvoice($chat_id, "الحــديد 🕌", "305", $message_id);break;
case "yasir58": sendvoice($chat_id, "المجادلة 🕌", "324", $message_id);break;
case "yasir59": sendvoice($chat_id, "الحــشر 🕌", "306", $message_id);break;
case "yasir60": sendvoice($chat_id, "الممتحنــة 🕌", "336", $message_id);break;
case "yasir61": sendvoice($chat_id, "الصــف 🕌", "344", $message_id);break;
case "yasir62": sendvoice($chat_id, "الجمعــة 🕌", "294", $message_id);break;
case "yasir63": sendvoice($chat_id, "المناقــون 🕌", "307", $message_id);break;
case "yasir64": sendvoice($chat_id, "التغـابن 🕌", "308", $message_id);break;
case "yasir65": sendvoice($chat_id, "الطــلاق 🕌", "309", $message_id);break;
case "yasir66": sendvoice($chat_id, "التحــريم 🕌", "310", $message_id);break;
case "yasir67": sendvoice($chat_id, "الملك 🕋", "311", $message_id);break;
case "yasir68": sendvoice($chat_id, "القلم 🕋", "312", $message_id);break;
case "yasir69": sendvoice($chat_id, "الحاقة 🕋", "313", $message_id);break;
case "yasir70": sendvoice($chat_id, "المعارج 🕋", "314", $message_id);break;
case "yasir71": sendvoice($chat_id, "نـوح 🕋", "315", $message_id);break;
case "yasir72": sendvoice($chat_id, "الجـن 🕋", "316", $message_id);break;
case "yasir73": sendvoice($chat_id, "المزمل 🕋", "317", $message_id);break;
case "yasir74": sendvoice($chat_id, "المدثر 🕋", "318", $message_id);break;
case "yasir75": sendvoice($chat_id, "القيامة 🕋", "319", $message_id);break;
case "yasir76": sendvoice($chat_id, "الأنسان 🕌", "320", $message_id);break;
case "yasir77": sendvoice($chat_id, "المرسلات 🕋", "321", $message_id);break;
case "yasir78": sendvoice($chat_id, "النبأ 🕋", "322", $message_id);break;
case "yasir79": sendvoice($chat_id, "النازعات 🕋", "323", $message_id);break;
case "yasir80": sendvoice($chat_id, "عبـس 🕋", "324", $message_id);break;
case "yasir81": sendvoice($chat_id, "التكوير 🕋", "325", $message_id);break;
case "yasir82": sendvoice($chat_id, "الانفطار 🕋", "326", $message_id);break;
case "yasir83": sendvoice($chat_id, "المطففين 🕋", "300", $message_id);break;
case "yasir84": sendvoice($chat_id, "الانشقاق 🕋", "327", $message_id);break;
case "yasir85": sendvoice($chat_id, "البروج 🕋", "328", $message_id);break;
case "yasir86": sendvoice($chat_id, "الطارق 🕋", "329", $message_id);break;
case "yasir87": sendvoice($chat_id, "الأعلى 🕋", "330", $message_id);break;
case "yasir88": sendvoice($chat_id, "الغاشية 🕋", "331", $message_id);break;
case "yasir89": sendvoice($chat_id, "الفجـر 🕋", "332", $message_id);break;
case "yasir90": sendvoice($chat_id, "البلـد 🕋", "334", $message_id);break;
case "yasir91": sendvoice($chat_id, "الشمـس 🕋", "335", $message_id);break;
case "yasir92": sendvoice($chat_id, "الليـل 🕋", "337", $message_id);break;
case "yasir93": sendvoice($chat_id, "الضحـى 🕋", "338", $message_id);break;
case "yasir94": sendvoice($chat_id, "الشـرح 🕋", "339", $message_id);break;
case "yasir95": sendvoice($chat_id, "التيـن 🕋", "340", $message_id);break;
case "yasir96": sendvoice($chat_id, "العلـق 🕋", "341", $message_id);break;
case "yasir97": sendvoice($chat_id, "القـدر 🕋", "342", $message_id);break;
case "yasir98": sendvoice($chat_id, "البينـة 🕌", "343", $message_id);break;
case "yasir99": sendvoice($chat_id, "الزلزلة 🕌", "345", $message_id);break;
case "yasir100": sendvoice($chat_id, "العاديات 🕋", "346", $message_id);break;
case "yasir101": sendvoice($chat_id, "القارعة 🕋", "283", $message_id);break;
case "yasir102": sendvoice($chat_id, "التكاثر 🕋", "694", $message_id);break;
case "yasir103": sendvoice($chat_id, "العصـر 🕋", "284", $message_id);break;
case "yasir104": sendvoice($chat_id, "الهمـزة 🕋", "285", $message_id);break;
case "yasir105": sendvoice($chat_id, "الفيـل 🕋", "286", $message_id);break;
case "yasir106": sendvoice($chat_id, "قريـش 🕋", "287", $message_id);break;
case "yasir107": sendvoice($chat_id, "الماعـون 🕋", "288", $message_id);break;
case "yasir108": sendvoice($chat_id, "الكـوثر 🕋", "289", $message_id);break;
case "yasir109": sendvoice($chat_id, "الكافـرون 🕋", "290", $message_id);break;
case "yasir110": sendvoice($chat_id, "النـصر 🕌", "291", $message_id);break;
case "yasir111": sendvoice($chat_id, "المسـد 🕋", "292", $message_id);break;
case "yasir112": sendvoice($chat_id, "الأخلاص 🕋", "293", $message_id);break;
case "yasir113": sendvoice($chat_id, "الفلـق 🕋", "296", $message_id);break;
case "yasir114": sendvoice($chat_id, "النـاس 🕋", "297", $message_id);break;
# mahir
case "mahir1": sendvoice($chat_id, "الفاتحة 🕋", "3", $message_id);break;
case "mahir2": sendvoice($chat_id, "البقــرة 🕌", "4", $message_id);break;
case "mahir3": sendvoice($chat_id, "آلﻋــمران 🕌", "5", $message_id);break;
case "mahir4": sendvoice($chat_id, "النســاء 🕌", "6", $message_id);break;
case "mahir5": sendvoice($chat_id, "المــائدة 🕌", "7", $message_id);break;
case "mahir6": sendvoice($chat_id, "الأنعــام 🕋", "8", $message_id);break;
case "mahir7": sendvoice($chat_id, "الأعــراف 🕋", "9", $message_id);break;
case "mahir8": sendvoice($chat_id, "الأنفــال 🕌", "10", $message_id);break;
case "mahir9": sendvoice($chat_id, "التوبــه 🕌", "11", $message_id);break;
case "mahir10": sendvoice($chat_id, "يونـس 🕋", "12", $message_id);break;
case "mahir11": sendvoice($chat_id, "هــود 🕋", "13", $message_id);break;
case "mahir12": sendvoice($chat_id, "يوسـف 🕋", "14", $message_id);break;
case "mahir13": sendvoice($chat_id, "الرعــد 🕌", "15", $message_id);break;
case "mahir14": sendvoice($chat_id, "إبراهيــم 🕋", "16", $message_id);break;
case "mahir15": sendvoice($chat_id, "الحجــر 🕋", "17", $message_id);break;
case "mahir16": sendvoice($chat_id, "النحــل 🕋", "18", $message_id);break;
case "mahir17": sendvoice($chat_id, "الإسـراء 🕋", "19", $message_id);break;
case "mahir18": sendvoice($chat_id, "الكهـف 🕋", "20", $message_id);break;
case "mahir19": sendvoice($chat_id, "مريــم 🕋", "21", $message_id);break;
case "mahir20": sendvoice($chat_id, "طــه 🕋", "22", $message_id);break;
case "mahir21": sendvoice($chat_id, "الأنبيــاء 🕋", "23", $message_id);break;
case "mahir22": sendvoice($chat_id, "الحــج 🕌", "24", $message_id);break;
case "mahir23": sendvoice($chat_id, "المؤمنـون 🕋", "25", $message_id);break;
case "mahir24": sendvoice($chat_id, "النــور 🕌", "26", $message_id);break;
case "mahir25": sendvoice($chat_id, "الفــرقان 🕋", "27", $message_id);break;
case "mahir26": sendvoice($chat_id, "الشعــراء 🕋", "28", $message_id);break;
case "mahir27": sendvoice($chat_id, "النــمل 🕋", "29", $message_id);break;
case "mahir28": sendvoice($chat_id, "القصص 🕋", "30", $message_id);break;
case "mahir29": sendvoice($chat_id, "العـنكبوت 🕋", "31", $message_id);break;
case "mahir30": sendvoice($chat_id, "الــروم 🕋", "32", $message_id);break;
case "mahir31": sendvoice($chat_id, "لقــمان 🕋", "33", $message_id);break;
case "mahir32": sendvoice($chat_id, "السجـدة 🕋", "34", $message_id);break;
case "mahir33": sendvoice($chat_id, "الأحـزاب 🕌", "35", $message_id);break;
case "mahir34": sendvoice($chat_id, "سبـأ 🕋", "36", $message_id);break;
case "mahir35": sendvoice($chat_id, "فـاطـر 🕋", "37", $message_id);break;
case "mahir36": sendvoice($chat_id, "يــس 🕋", "38", $message_id);break;
case "mahir37": sendvoice($chat_id, "الصـافات 🕋", "39", $message_id);break;
case "mahir38": sendvoice($chat_id, "ص 🕋", "40", $message_id);break;
case "mahir39": sendvoice($chat_id, "الزمــر 🕋", "41", $message_id);break;
case "mahir40": sendvoice($chat_id, "غــافر 🕋 ", "42", $message_id);break;
case "mahir41": sendvoice($chat_id, "فصـلت 🕋", "43", $message_id);break;
case "mahir42": sendvoice($chat_id, "الشــورﻯ 🕋", "44", $message_id);break;
case "mahir43": sendvoice($chat_id, "الزخـرف 🕋", "45", $message_id);break;
case "mahir44": sendvoice($chat_id, "الدخان 🕋", "46", $message_id);break;
case "mahir45": sendvoice($chat_id, "الجاثية 🕋", "47", $message_id);break;
case "mahir46": sendvoice($chat_id, "الأحقاف 🕋", "48", $message_id);break;
case "mahir47": sendvoice($chat_id, "محــمد 🕌", "49", $message_id);break;
case "mahir48": sendvoice($chat_id, "الفتــح 🕌", "50", $message_id);break;
case "mahir49": sendvoice($chat_id, "الحجرات 🕌", "51", $message_id);break;
case "mahir50": sendvoice($chat_id, "ق 🕋", "52", $message_id);break;
case "mahir51": sendvoice($chat_id, "الذاريات 🕋", "104", $message_id);break;
case "mahir52": sendvoice($chat_id, "الطـور 🕋", "63", $message_id);break;
case "mahir53": sendvoice($chat_id, "النـجم 🕋", "61", $message_id);break;
case "mahir54": sendvoice($chat_id, "القمـر 🕋", "60", $message_id);break;
case "mahir55": sendvoice($chat_id, "الرحمـن 🕌", "64", $message_id);break;
case "mahir56": sendvoice($chat_id, "الواقعة 🕌", "65", $message_id);break;
case "mahir57": sendvoice($chat_id, "الحــديد 🕌", "66", $message_id);break;
case "mahir58": sendvoice($chat_id, "المجادلة 🕌", "67", $message_id);break;
case "mahir59": sendvoice($chat_id, "الحــشر 🕌", "68", $message_id);break;
case "mahir60": sendvoice($chat_id, "الممتحنــة 🕌", "69", $message_id);break;
case "mahir61": sendvoice($chat_id, "الصــف 🕌", "70", $message_id);break;
case "mahir62": sendvoice($chat_id, "الجمعــة 🕌", "71", $message_id);break;
case "mahir63": sendvoice($chat_id, "المناقــون 🕌", "103", $message_id);break;
case "mahir64": sendvoice($chat_id, "التغـابن 🕌", "72", $message_id);break;
case "mahir65": sendvoice($chat_id, "الطــلاق 🕌", "113", $message_id);break;
case "mahir66": sendvoice($chat_id, "التحــريم 🕌", "73", $message_id);break;
case "mahir67": sendvoice($chat_id, "الملك 🕋", "74", $message_id);break;
case "mahir68": sendvoice($chat_id, "القلم 🕋", "75", $message_id);break;
case "mahir69": sendvoice($chat_id, "الحاقة 🕋", "76", $message_id);break;
case "mahir70": sendvoice($chat_id, "المعارج 🕋", "77", $message_id);break;
case "mahir71": sendvoice($chat_id, "نـوح 🕋", "114", $message_id);break;
case "mahir72": sendvoice($chat_id, "الجـن 🕋", "78", $message_id);break;
case "mahir73": sendvoice($chat_id, "المزمل 🕋", "79", $message_id);break;
case "mahir74": sendvoice($chat_id, "المدثر 🕋", "80", $message_id);break;
case "mahir75": sendvoice($chat_id, "القيامة 🕋", "81", $message_id);break;
case "mahir76": sendvoice($chat_id, "الأنسان 🕌", "82", $message_id);break;
case "mahir77": sendvoice($chat_id, "المرسلات 🕋", "83", $message_id);break;
case "mahir78": sendvoice($chat_id, "النبأ 🕋", "84", $message_id);break;
case "mahir79": sendvoice($chat_id, "النازعات 🕋", "85", $message_id);break;
case "mahir80": sendvoice($chat_id, "عبـس 🕋", "86", $message_id);break;
case "mahir81": sendvoice($chat_id, "التكوير 🕋", "87", $message_id);break;
case "mahir82": sendvoice($chat_id, "الانفطار 🕋", "88", $message_id);break;
case "mahir83": sendvoice($chat_id, "المطففين 🕋", "89", $message_id);break;
case "mahir84": sendvoice($chat_id, "الانشقاق 🕋", "90", $message_id);break;
case "mahir85": sendvoice($chat_id, "البروج 🕋", "91", $message_id);break;
case "mahir86": sendvoice($chat_id, "الطارق 🕋", "92", $message_id);break;
case "mahir87": sendvoice($chat_id, "الأعلى 🕋", "93", $message_id);break;
case "mahir88": sendvoice($chat_id, "الغاشية 🕋", "94", $message_id);break;
case "mahir89": sendvoice($chat_id, "الفجـر 🕋", "95", $message_id);break;
case "mahir90": sendvoice($chat_id, "البلـد 🕋", "96", $message_id);break;
case "mahir91": sendvoice($chat_id, "الشمـس 🕋", "97", $message_id);break;
case "mahir92": sendvoice($chat_id, "الليـل 🕋", "98", $message_id);break;
case "mahir93": sendvoice($chat_id, "الضحـى 🕋", "99", $message_id);break;
case "mahir94": sendvoice($chat_id, "الشـرح 🕋", "100", $message_id);break;
case "mahir95": sendvoice($chat_id, "التيـن 🕋", "101", $message_id);break;
case "mahir96": sendvoice($chat_id, "العلـق 🕋", "102", $message_id);break;
case "mahir97": sendvoice($chat_id, "القـدر 🕋", "115", $message_id);break;
case "mahir98": sendvoice($chat_id, "البينـة 🕌", "116", $message_id);break;
case "mahir99": sendvoice($chat_id, "الزلزلة 🕌", "105", $message_id);break;
case "mahir100": sendvoice($chat_id, "العاديات 🕋", "106", $message_id);break;
case "mahir101": sendvoice($chat_id, "القارعة 🕋", "107", $message_id);break;
case "mahir102": sendvoice($chat_id, "التكاثر 🕋", "108", $message_id);break;
case "mahir103": sendvoice($chat_id, "العصـر 🕋", "109", $message_id);break;
case "mahir104": sendvoice($chat_id, "الهمـزة 🕋", "110", $message_id);break;
case "mahir105": sendvoice($chat_id, "الفيـل 🕋", "111", $message_id);break;
case "mahir106": sendvoice($chat_id, "قريـش 🕋", "112", $message_id);break;
case "mahir107": sendvoice($chat_id, "الماعـون 🕋", "62", $message_id);break;
case "mahir108": sendvoice($chat_id, "الكـوثر 🕋", "53", $message_id);break;
case "mahir109": sendvoice($chat_id, "الكافـرون 🕋", "54", $message_id);break;
case "mahir110": sendvoice($chat_id, "النـصر 🕌", "55", $message_id);break;
case "mahir111": sendvoice($chat_id, "المسـد 🕋", "56", $message_id);break;
case "mahir112": sendvoice($chat_id, "الأخلاص 🕋", "57", $message_id);break;
case "mahir113": sendvoice($chat_id, "الفلـق 🕋", "59", $message_id);break;
case "mahir114": sendvoice($chat_id, "النـاس 🕋", "58", $message_id);break;
# alsuses
case "sds1": sendvoice($chat_id, "الفاتحة 🕋", "348", $message_id);break;
case "sds2": sendvoice($chat_id, "البقــرة 🕌", "349", $message_id);break;
case "sds3": sendvoice($chat_id, "آلﻋــمران 🕌", "350", $message_id);break;
case "sds4": sendvoice($chat_id, "النســاء 🕌", "351", $message_id);break;
case "sds5": sendvoice($chat_id, "المــائدة 🕌", "352", $message_id);break;
case "sds6": sendvoice($chat_id, "الأنعــام 🕋", "353", $message_id);break;
case "sds7": sendvoice($chat_id, "الأعــراف 🕋", "354", $message_id);break;
case "sds8": sendvoice($chat_id, "الأنفــال 🕌", "355", $message_id);break;
case "sds9": sendvoice($chat_id, "التوبــه 🕌", "356", $message_id);break;
case "sds10": sendvoice($chat_id, "يونـس 🕋", "357", $message_id);break;
case "sds11": sendvoice($chat_id, "هــود 🕋", "358", $message_id);break;
case "sds12": sendvoice($chat_id, "يوسـف 🕋", "359", $message_id);break;
case "sds13": sendvoice($chat_id, "الرعــد 🕌", "360", $message_id);break;
case "sds14": sendvoice($chat_id, "إبراهيــم 🕋", "361", $message_id);break;
case "sds15": sendvoice($chat_id, "الحجــر 🕋", "362", $message_id);break;
case "sds16": sendvoice($chat_id, "النحــل 🕋", "363", $message_id);break;
case "sds17": sendvoice($chat_id, "الإسـراء 🕋", "364", $message_id);break;
case "sds18": sendvoice($chat_id, "الكهـف 🕋", "365", $message_id);break;
case "sds19": sendvoice($chat_id, "مريــم 🕋", "366", $message_id);break;
case "sds20": sendvoice($chat_id, "طــه 🕋", "367", $message_id);break;
case "sds21": sendvoice($chat_id, "الأنبيــاء 🕋", "368", $message_id);break;
case "sds22": sendvoice($chat_id, "الحــج 🕌", "369", $message_id);break;
case "sds23": sendvoice($chat_id, "المؤمنـون 🕋", "370", $message_id);break;
case "sds24": sendvoice($chat_id, "النــور 🕌", "371", $message_id);break;
case "sds25": sendvoice($chat_id, "الفــرقان 🕋", "372", $message_id);break;
case "sds26": sendvoice($chat_id, "الشعــراء 🕋", "373", $message_id);break;
case "sds27": sendvoice($chat_id, "النــمل 🕋", "374", $message_id);break;
case "sds28": sendvoice($chat_id, "القصص 🕋", "375", $message_id);break;
case "sds29": sendvoice($chat_id, "العـنكبوت 🕋", "376", $message_id);break;
case "sds30": sendvoice($chat_id, "الــروم 🕋", "377", $message_id);break;
case "sds31": sendvoice($chat_id, "لقــمان 🕋", "378", $message_id);break;
case "sds32": sendvoice($chat_id, "السجـدة 🕋", "379", $message_id);break;
case "sds33": sendvoice($chat_id, "الأحـزاب 🕌", "380", $message_id);break;
case "sds34": sendvoice($chat_id, "سبـأ 🕋", "381", $message_id);break;
case "sds35": sendvoice($chat_id, "فـاطـر 🕋", "382", $message_id);break;
case "sds36": sendvoice($chat_id, "يــس 🕋", "383", $message_id);break;
case "sds37": sendvoice($chat_id, "الصـافات 🕋", "384", $message_id);break;
case "sds38": sendvoice($chat_id, "ص 🕋", "385", $message_id);break;
case "sds39": sendvoice($chat_id, "الزمــر 🕋", "386", $message_id);break;
case "sds40": sendvoice($chat_id, "غــافر 🕋 ", "387", $message_id);break;
case "sds41": sendvoice($chat_id, "فصـلت 🕋", "388", $message_id);break;
case "sds42": sendvoice($chat_id, "الشــورﻯ 🕋", "389", $message_id);break;
case "sds43": sendvoice($chat_id, "الزخـرف 🕋", "390", $message_id);break;
case "sds44": sendvoice($chat_id, "الدخان 🕋", "391", $message_id);break;
case "sds45": sendvoice($chat_id, "الجاثية 🕋", "392", $message_id);break;
case "sds46": sendvoice($chat_id, "الأحقاف 🕋", "393", $message_id);break;
case "sds47": sendvoice($chat_id, "محــمد 🕌", "394", $message_id);break;
case "sds48": sendvoice($chat_id, "الفتــح 🕌", "395", $message_id);break;
case "sds49": sendvoice($chat_id, "الحجرات 🕌", "396", $message_id);break;
case "sds50": sendvoice($chat_id, "ق 🕋", "397", $message_id);break;
case "sds51": sendvoice($chat_id, "الذاريات 🕋", "448", $message_id);break;
case "sds52": sendvoice($chat_id, "الطـور 🕋", "411", $message_id);break;
case "sds53": sendvoice($chat_id, "النـجم 🕋", "455", $message_id);break;
case "sds54": sendvoice($chat_id, "القمـر 🕋", "456", $message_id);break;
case "sds55": sendvoice($chat_id, "الرحمـن 🕌", "412", $message_id);break;
case "sds56": sendvoice($chat_id, "الواقعة 🕌", "398", $message_id);break;
case "sds57": sendvoice($chat_id, "الحــديد 🕌", "413", $message_id);break;
case "sds58": sendvoice($chat_id, "المجادلة 🕌", "414", $message_id);break;
case "sds59": sendvoice($chat_id, "الحــشر 🕌", "415", $message_id);break;
case "sds60": sendvoice($chat_id, "الممتحنــة 🕌", "416", $message_id);break;
case "sds61": sendvoice($chat_id, "الصــف 🕌", "417", $message_id);break;
case "sds62": sendvoice($chat_id, "الجمعــة 🕌", "418", $message_id);break;
case "sds63": sendvoice($chat_id, "المناقــون 🕌", "419", $message_id);break;
case "sds64": sendvoice($chat_id, "التغـابن 🕌", "420", $message_id);break;
case "sds65": sendvoice($chat_id, "الطــلاق 🕌", "399", $message_id);break;
case "sds66": sendvoice($chat_id, "التحــريم 🕌", "421", $message_id);break;
case "sds67": sendvoice($chat_id, "الملك 🕋", "422", $message_id);break;
case "sds68": sendvoice($chat_id, "القلم 🕋", "423", $message_id);break;
case "sds69": sendvoice($chat_id, "الحاقة 🕋", "424", $message_id);break;
case "sds70": sendvoice($chat_id, "المعارج 🕋", "425", $message_id);break;
case "sds71": sendvoice($chat_id, "نـوح 🕋", "426", $message_id);break;
case "sds72": sendvoice($chat_id, "الجـن 🕋", "427", $message_id);break;
case "sds73": sendvoice($chat_id, "المزمل 🕋", "428", $message_id);break;
case "sds74": sendvoice($chat_id, "المدثر 🕋", "400", $message_id);break;
case "sds75": sendvoice($chat_id, "القيامة 🕋", "429", $message_id);break;
case "sds76": sendvoice($chat_id, "الأنسان 🕌", "430", $message_id);break;
case "sds77": sendvoice($chat_id, "المرسلات 🕋", "431", $message_id);break;
case "sds78": sendvoice($chat_id, "النبأ 🕋", "432", $message_id);break;
case "sds79": sendvoice($chat_id, "النازعات 🕋", "433", $message_id);break;
case "sds80": sendvoice($chat_id, "عبـس 🕋", "434", $message_id);break;
case "sds81": sendvoice($chat_id, "التكوير 🕋", "435", $message_id);break;
case "sds82": sendvoice($chat_id, "الانفطار 🕋", "401", $message_id);break;
case "sds83": sendvoice($chat_id, "المطففين 🕋", "436", $message_id);break;
case "sds84": sendvoice($chat_id, "الانشقاق 🕋", "437", $message_id);break;
case "sds85": sendvoice($chat_id, "البروج 🕋", "402", $message_id);break;
case "sds86": sendvoice($chat_id, "الطارق 🕋", "403", $message_id);break;
case "sds87": sendvoice($chat_id, "الأعلى 🕋", "404", $message_id);break;
case "sds88": sendvoice($chat_id, "الغاشية 🕋", "438", $message_id);break;
case "sds89": sendvoice($chat_id, "الفجـر 🕋", "439", $message_id);break;
case "sds90": sendvoice($chat_id, "البلـد 🕋", "440", $message_id);break;
case "sds91": sendvoice($chat_id, "الشمـس 🕋", "406", $message_id);break;
case "sds92": sendvoice($chat_id, "الليـل 🕋", "441", $message_id);break;
case "sds93": sendvoice($chat_id, "الضحـى 🕋", "442", $message_id);break;
case "sds94": sendvoice($chat_id, "الشـرح 🕋", "443", $message_id);break;
case "sds95": sendvoice($chat_id, "التيـن 🕋", "444", $message_id);break;
case "sds96": sendvoice($chat_id, "العلـق 🕋", "445", $message_id);break;
case "sds97": sendvoice($chat_id, "القـدر 🕋", "446", $message_id);break;
case "sds98": sendvoice($chat_id, "البينـة 🕌", "447", $message_id);break;
case "sds99": sendvoice($chat_id, "الزلزلة 🕌", "407", $message_id);break;
case "sds100": sendvoice($chat_id, "العاديات 🕋", "449", $message_id);break;
case "sds101": sendvoice($chat_id, "القارعة 🕋", "450", $message_id);break;
case "sds102": sendvoice($chat_id, "التكاثر 🕋", "452", $message_id);break;
case "sds103": sendvoice($chat_id, "العصـر 🕋", "457", $message_id);break;
case "sds104": sendvoice($chat_id, "الهمـزة 🕋", "451", $message_id);break;
case "sds105": sendvoice($chat_id, "الفيـل 🕋", "458", $message_id);break;
case "sds106": sendvoice($chat_id, "قريـش 🕋", "459", $message_id);break;
case "sds107": sendvoice($chat_id, "الماعـون 🕋", "453", $message_id);break;
case "sds108": sendvoice($chat_id, "الكـوثر 🕋", "460", $message_id);break;
case "sds109": sendvoice($chat_id, "الكافـرون 🕋", "461", $message_id);break;
case "sds110": sendvoice($chat_id, "النـصر 🕌", "405", $message_id);break;
case "sds111": sendvoice($chat_id, "المسـد 🕋", "408", $message_id);break;
case "sds112": sendvoice($chat_id, "الأخلاص 🕋", "409", $message_id);break;
case "sds113": sendvoice($chat_id, "الفلـق 🕋", "410", $message_id);break;
case "sds114": sendvoice($chat_id, "النـاس 🕋", "454", $message_id);break;
# saad
case "saad1": sendvoice($chat_id, "الفاتحة 🕋", "118", $message_id);break;
case "saad2": sendvoice($chat_id, "البقــرة 🕌", "119", $message_id);break;
case "saad3": sendvoice($chat_id, "آلﻋــمران 🕌", "120", $message_id);break;
case "saad4": sendvoice($chat_id, "النســاء 🕌", "121", $message_id);break;
case "saad5": sendvoice($chat_id, "المــائدة 🕌", "122", $message_id);break;
case "saad6": sendvoice($chat_id, "الأنعــام 🕋", "123", $message_id);break;
case "saad7": sendvoice($chat_id, "الأعــراف 🕋", "124", $message_id);break;
case "saad8": sendvoice($chat_id, "الأنفــال 🕌", "125", $message_id);break;
case "saad9": sendvoice($chat_id, "التوبــه 🕌", "126", $message_id);break;
case "saad10": sendvoice($chat_id, "يونـس 🕋", "127", $message_id);break;
case "saad11": sendvoice($chat_id, "هــود 🕋", "128", $message_id);break;
case "saad12": sendvoice($chat_id, "يوسـف 🕋", "129", $message_id);break;
case "saad13": sendvoice($chat_id, "الرعــد 🕌", "130", $message_id);break;
case "saad14": sendvoice($chat_id, "إبراهيــم 🕋", "131", $message_id);break;
case "saad15": sendvoice($chat_id, "الحجــر 🕋", "132", $message_id);break;
case "saad16": sendvoice($chat_id, "النحــل 🕋", "133", $message_id);break;
case "saad17": sendvoice($chat_id, "الإسـراء 🕋", "134", $message_id);break;
case "saad18": sendvoice($chat_id, "الكهـف 🕋", "135", $message_id);break;
case "saad19": sendvoice($chat_id, "مريــم 🕋", "136", $message_id);break;
case "saad20": sendvoice($chat_id, "طــه 🕋", "137", $message_id);break;
case "saad21": sendvoice($chat_id, "الأنبيــاء 🕋", "138", $message_id);break;
case "saad22": sendvoice($chat_id, "الحــج 🕌", "139", $message_id);break;
case "saad23": sendvoice($chat_id, "المؤمنـون 🕋", "140", $message_id);break;
case "saad24": sendvoice($chat_id, "النــور 🕌", "141", $message_id);break;
case "saad25": sendvoice($chat_id, "الفــرقان 🕋", "142", $message_id);break;
case "saad26": sendvoice($chat_id, "الشعــراء 🕋", "143", $message_id);break;
case "saad27": sendvoice($chat_id, "النــمل 🕋", "144", $message_id);break;
case "saad28": sendvoice($chat_id, "القصص 🕋", "145", $message_id);break;
case "saad29": sendvoice($chat_id, "العـنكبوت 🕋", "146", $message_id);break;
case "saad30": sendvoice($chat_id, "الــروم 🕋", "147", $message_id);break;
case "saad31": sendvoice($chat_id, "لقــمان 🕋", "148", $message_id);break;
case "saad32": sendvoice($chat_id, "السجـدة 🕋", "149", $message_id);break;
case "saad33": sendvoice($chat_id, "الأحـزاب 🕌", "150", $message_id);break;
case "saad34": sendvoice($chat_id, "سبـأ 🕋", "151", $message_id);break;
case "saad35": sendvoice($chat_id, "فـاطـر 🕋", "152", $message_id);break;
case "saad36": sendvoice($chat_id, "يــس 🕋", "153", $message_id);break;
case "saad37": sendvoice($chat_id, "الصـافات 🕋", "154", $message_id);break;
case "saad38": sendvoice($chat_id, "ص 🕋", "155", $message_id);break;
case "saad39": sendvoice($chat_id, "الزمــر 🕋", "156", $message_id);break;
case "saad40": sendvoice($chat_id, "غــافر 🕋 ", "157", $message_id);break;
case "saad41": sendvoice($chat_id, "فصـلت 🕋", "158", $message_id);break;
case "saad42": sendvoice($chat_id, "الشــورﻯ 🕋", "159", $message_id);break;
case "saad43": sendvoice($chat_id, "الزخـرف 🕋", "160", $message_id);break;
case "saad44": sendvoice($chat_id, "الدخان 🕋", "161", $message_id);break;
case "saad45": sendvoice($chat_id, "الجاثية 🕋", "162", $message_id);break;
case "saad46": sendvoice($chat_id, "الأحقاف 🕋", "163", $message_id);break;
case "saad47": sendvoice($chat_id, "محــمد 🕌", "164", $message_id);break;
case "saad48": sendvoice($chat_id, "الفتــح 🕌", "165", $message_id);break;
case "saad49": sendvoice($chat_id, "الحجرات 🕌", "166", $message_id);break;
case "saad50": sendvoice($chat_id, "ق 🕋", "167", $message_id);break;
case "saad51": sendvoice($chat_id, "الذاريات 🕋", "168", $message_id);break;
case "saad52": sendvoice($chat_id, "الطـور 🕋", "177", $message_id);break;
case "saad53": sendvoice($chat_id, "النـجم 🕋", "178", $message_id);break;
case "saad54": sendvoice($chat_id, "القمـر 🕋", "223", $message_id);break;
case "saad55": sendvoice($chat_id, "الرحمـن 🕌", "179", $message_id);break;
case "saad56": sendvoice($chat_id, "الواقعة 🕌", "182", $message_id);break;
case "saad57": sendvoice($chat_id, "الحــديد 🕌", "183", $message_id);break;
case "saad58": sendvoice($chat_id, "المجادلة 🕌", "169", $message_id);break;
case "saad59": sendvoice($chat_id, "الحــشر 🕌", "180", $message_id);break;
case "saad60": sendvoice($chat_id, "الممتحنــة 🕌", "181", $message_id);break;
case "saad61": sendvoice($chat_id, "الصــف 🕌", "184", $message_id);break;
case "saad62": sendvoice($chat_id, "الجمعــة 🕌", "185", $message_id);break;
case "saad63": sendvoice($chat_id, "المناقــون 🕌", "186", $message_id);break;
case "saad64": sendvoice($chat_id, "التغـابن 🕌", "187", $message_id);break;
case "saad65": sendvoice($chat_id, "الطــلاق 🕌", "188", $message_id);break;
case "saad66": sendvoice($chat_id, "التحــريم 🕌", "189", $message_id);break;
case "saad67": sendvoice($chat_id, "الملك 🕋", "190", $message_id);break;
case "saad68": sendvoice($chat_id, "القلم 🕋", "191", $message_id);break;
case "saad69": sendvoice($chat_id, "الحاقة 🕋", "192", $message_id);break;
case "saad70": sendvoice($chat_id, "المعارج 🕋", "193", $message_id);break;
case "saad71": sendvoice($chat_id, "نـوح 🕋", "194", $message_id);break;
case "saad72": sendvoice($chat_id, "الجـن 🕋", "170", $message_id);break;
case "saad73": sendvoice($chat_id, "المزمل 🕋", "195", $message_id);break;
case "saad74": sendvoice($chat_id, "المدثر 🕋", "196", $message_id);break;
case "saad75": sendvoice($chat_id, "القيامة 🕋", "197", $message_id);break;
case "saad76": sendvoice($chat_id, "الأنسان 🕌", "198", $message_id);break;
case "saad77": sendvoice($chat_id, "المرسلات 🕋", "199", $message_id);break;
case "saad78": sendvoice($chat_id, "النبأ 🕋", "200", $message_id);break;
case "saad79": sendvoice($chat_id, "النازعات 🕋", "201", $message_id);break;
case "saad80": sendvoice($chat_id, "عبـس 🕋", "202", $message_id);break;
case "saad81": sendvoice($chat_id, "التكوير 🕋", "203", $message_id);break;
case "saad82": sendvoice($chat_id, "الانفطار 🕋", "204", $message_id);break;
case "saad83": sendvoice($chat_id, "المطففين 🕋", "205", $message_id);break;
case "saad84": sendvoice($chat_id, "الانشقاق 🕋", "206", $message_id);break;
case "saad85": sendvoice($chat_id, "البروج 🕋", "207", $message_id);break;
case "saad86": sendvoice($chat_id, "الطارق 🕋", "208", $message_id);break;
case "saad87": sendvoice($chat_id, "الأعلى 🕋", "209", $message_id);break;
case "saad88": sendvoice($chat_id, "الغاشية 🕋", "210", $message_id);break;
case "saad89": sendvoice($chat_id, "الفجـر 🕋", "211", $message_id);break;
case "saad90": sendvoice($chat_id, "البلـد 🕋", "212", $message_id);break;
case "saad91": sendvoice($chat_id, "الشمـس 🕋", "213", $message_id);break;
case "saad92": sendvoice($chat_id, "الليـل 🕋", "214", $message_id);break;
case "saad93": sendvoice($chat_id, "الضحـى 🕋", "215", $message_id);break;
case "saad94": sendvoice($chat_id, "الشـرح 🕋", "216", $message_id);break;
case "saad95": sendvoice($chat_id, "التيـن 🕋", "217", $message_id);break;
case "saad96": sendvoice($chat_id, "العلـق 🕋", "218", $message_id);break;
case "saad97": sendvoice($chat_id, "القـدر 🕋", "171", $message_id);break;
case "saad98": sendvoice($chat_id, "البينـة 🕌", "219", $message_id);break;
case "saad99": sendvoice($chat_id, "الزلزلة 🕌", "220", $message_id);break;
case "saad100": sendvoice($chat_id, "العاديات 🕋", "221", $message_id);break;
case "saad101": sendvoice($chat_id, "القارعة 🕋", "222", $message_id);break;
case "saad102": sendvoice($chat_id, "التكاثر 🕋", "224", $message_id);break;
case "saad103": sendvoice($chat_id, "العصـر 🕋", "225", $message_id);break;
case "saad104": sendvoice($chat_id, "الهمـزة 🕋", "226", $message_id);break;
case "saad105": sendvoice($chat_id, "الفيـل 🕋", "227", $message_id);break;
case "saad106": sendvoice($chat_id, "قريـش 🕋", "228", $message_id);break;
case "saad107": sendvoice($chat_id, "الماعـون 🕋", "229", $message_id);break;
case "saad108": sendvoice($chat_id, "الكـوثر 🕋", "230", $message_id);break;
case "saad109": sendvoice($chat_id, "الكافـرون 🕋", "231", $message_id);break;
case "saad110": sendvoice($chat_id, "النـصر 🕌", "174", $message_id);break;
case "saad111": sendvoice($chat_id, "المسـد 🕋", "172", $message_id);break;
case "saad112": sendvoice($chat_id, "الأخلاص 🕋", "173", $message_id);break;
case "saad113": sendvoice($chat_id, "الفلـق 🕋", "176", $message_id);break;
case "saad114": sendvoice($chat_id, "النـاس 🕋", "175", $message_id);break;
# abdelbasit
case "smd1": sendvoice($chat_id, "الفاتحة 🕋", "580", $message_id);break;
case "smd2": sendvoice($chat_id, "البقــرة 🕌", "581", $message_id);break;
case "smd3": sendvoice($chat_id, "آلﻋــمران 🕌", "582", $message_id);break;
case "smd4": sendvoice($chat_id, "النســاء 🕌", "583", $message_id);break;
case "smd5": sendvoice($chat_id, "المــائدة 🕌", "584", $message_id);break;
case "smd6": sendvoice($chat_id, "الأنعــام 🕋", "585", $message_id);break;
case "smd7": sendvoice($chat_id, "الأعــراف 🕋", "586", $message_id);break;
case "smd8": sendvoice($chat_id, "الأنفــال 🕌", "587", $message_id);break;
case "smd9": sendvoice($chat_id, "التوبــه 🕌", "588", $message_id);break;
case "smd10": sendvoice($chat_id, "يونـس 🕋", "589", $message_id);break;
case "smd11": sendvoice($chat_id, "هــود 🕋", "590", $message_id);break;
case "smd12": sendvoice($chat_id, "يوسـف 🕋", "591", $message_id);break;
case "smd13": sendvoice($chat_id, "الرعــد 🕌", "592", $message_id);break;
case "smd14": sendvoice($chat_id, "إبراهيــم 🕋", "593", $message_id);break;
case "smd15": sendvoice($chat_id, "الحجــر 🕋", "594", $message_id);break;
case "smd16": sendvoice($chat_id, "النحــل 🕋", "595", $message_id);break;
case "smd17": sendvoice($chat_id, "الإسـراء 🕋", "596", $message_id);break;
case "smd18": sendvoice($chat_id, "الكهـف 🕋", "597", $message_id);break;
case "smd19": sendvoice($chat_id, "مريــم 🕋", "598", $message_id);break;
case "smd20": sendvoice($chat_id, "طــه 🕋", "599", $message_id);break;
case "smd21": sendvoice($chat_id, "الأنبيــاء 🕋", "600", $message_id);break;
case "smd22": sendvoice($chat_id, "الحــج 🕌", "601", $message_id);break;
case "smd23": sendvoice($chat_id, "المؤمنـون 🕋", "602", $message_id);break;
case "smd24": sendvoice($chat_id, "النــور 🕌", "603", $message_id);break;
case "smd25": sendvoice($chat_id, "الفــرقان 🕋", "604", $message_id);break;
case "smd26": sendvoice($chat_id, "الشعــراء 🕋", "605", $message_id);break;
case "smd27": sendvoice($chat_id, "النــمل 🕋", "606", $message_id);break;
case "smd28": sendvoice($chat_id, "القصص 🕋", "607", $message_id);break;
case "smd29": sendvoice($chat_id, "العـنكبوت 🕋", "608", $message_id);break;
case "smd30": sendvoice($chat_id, "الــروم 🕋", "609", $message_id);break;
case "smd31": sendvoice($chat_id, "لقــمان 🕋", "610", $message_id);break;
case "smd32": sendvoice($chat_id, "السجـدة 🕋", "611", $message_id);break;
case "smd33": sendvoice($chat_id, "الأحـزاب 🕌", "612", $message_id);break;
case "smd34": sendvoice($chat_id, "سبـأ 🕋", "613", $message_id);break;
case "smd35": sendvoice($chat_id, "فـاطـر 🕋", "614", $message_id);break;
case "smd36": sendvoice($chat_id, "يــس 🕋", "615", $message_id);break;
case "smd37": sendvoice($chat_id, "الصـافات 🕋", "616", $message_id);break;
case "smd38": sendvoice($chat_id, "ص 🕋", "617", $message_id);break;
case "smd39": sendvoice($chat_id, "الزمــر 🕋", "618", $message_id);break;
case "smd40": sendvoice($chat_id, "غــافر 🕋 ", "619", $message_id);break;
case "smd41": sendvoice($chat_id, "فصـلت 🕋", "620", $message_id);break;
case "smd42": sendvoice($chat_id, "الشــورﻯ 🕋", "621", $message_id);break;
case "smd43": sendvoice($chat_id, "الزخـرف 🕋", "622", $message_id);break;
case "smd44": sendvoice($chat_id, "الدخان 🕋", "623", $message_id);break;
case "smd45": sendvoice($chat_id, "الجاثية 🕋", "624", $message_id);break;
case "smd46": sendvoice($chat_id, "الأحقاف 🕋", "625", $message_id);break;
case "smd47": sendvoice($chat_id, "محــمد 🕌", "626", $message_id);break;
case "smd48": sendvoice($chat_id, "الفتــح 🕌", "627", $message_id);break;
case "smd49": sendvoice($chat_id, "الحجرات 🕌", "628", $message_id);break;
case "smd50": sendvoice($chat_id, "ق 🕋", "629", $message_id);break;
case "smd51": sendvoice($chat_id, "الذاريات 🕋", "630", $message_id);break;
case "smd52": sendvoice($chat_id, "الطـور 🕋", "640", $message_id);break;
case "smd53": sendvoice($chat_id, "النـجم 🕋", "641", $message_id);break;
case "smd54": sendvoice($chat_id, "القمـر 🕋", "637", $message_id);break;
case "smd55": sendvoice($chat_id, "الرحمـن 🕌", "642", $message_id);break;
case "smd56": sendvoice($chat_id, "الواقعة 🕌", "643", $message_id);break;
case "smd57": sendvoice($chat_id, "الحــديد 🕌", "644", $message_id);break;
case "smd58": sendvoice($chat_id, "المجادلة 🕌", "645", $message_id);break;
case "smd59": sendvoice($chat_id, "الحــشر 🕌", "646", $message_id);break;
case "smd60": sendvoice($chat_id, "الممتحنــة 🕌", "647", $message_id);break;
case "smd61": sendvoice($chat_id, "الصــف 🕌", "648", $message_id);break;
case "smd62": sendvoice($chat_id, "الجمعــة 🕌", "649", $message_id);break;
case "smd63": sendvoice($chat_id, "المناقــون 🕌", "631", $message_id);break;
case "smd64": sendvoice($chat_id, "التغـابن 🕌", "632", $message_id);break;
case "smd65": sendvoice($chat_id, "الطــلاق 🕌", "650", $message_id);break;
case "smd66": sendvoice($chat_id, "التحــريم 🕌", "651", $message_id);break;
case "smd67": sendvoice($chat_id, "الملك 🕋", "652", $message_id);break;
case "smd68": sendvoice($chat_id, "القلم 🕋", "653", $message_id);break;
case "smd69": sendvoice($chat_id, "الحاقة 🕋", "654", $message_id);break;
case "smd70": sendvoice($chat_id, "المعارج 🕋", "655", $message_id);break;
case "smd71": sendvoice($chat_id, "نـوح 🕋", "656", $message_id);break;
case "smd72": sendvoice($chat_id, "الجـن 🕋", "657", $message_id);break;
case "smd73": sendvoice($chat_id, "المزمل 🕋", "658", $message_id);break;
case "smd74": sendvoice($chat_id, "المدثر 🕋", "659", $message_id);break;
case "smd75": sendvoice($chat_id, "القيامة 🕋", "660", $message_id);break;
case "smd76": sendvoice($chat_id, "الأنسان 🕌", "661", $message_id);break;
case "smd77": sendvoice($chat_id, "المرسلات 🕋", "662", $message_id);break;
case "smd78": sendvoice($chat_id, "النبأ 🕋", "663", $message_id);break;
case "smd79": sendvoice($chat_id, "النازعات 🕋", "664", $message_id);break;
case "smd80": sendvoice($chat_id, "عبـس 🕋", "665", $message_id);break;
case "smd81": sendvoice($chat_id, "التكوير 🕋", "666", $message_id);break;
case "smd82": sendvoice($chat_id, "الانفطار 🕋", "667", $message_id);break;
case "smd83": sendvoice($chat_id, "المطففين 🕋", "668", $message_id);break;
case "smd84": sendvoice($chat_id, "الانشقاق 🕋", "669", $message_id);break;
case "smd85": sendvoice($chat_id, "البروج 🕋", "670", $message_id);break;
case "smd86": sendvoice($chat_id, "الطارق 🕋", "671", $message_id);break;
case "smd87": sendvoice($chat_id, "الأعلى 🕋", "638", $message_id);break;
case "smd88": sendvoice($chat_id, "الغاشية 🕋", "672", $message_id);break;
case "smd89": sendvoice($chat_id, "الفجـر 🕋", "673", $message_id);break;
case "smd90": sendvoice($chat_id, "البلـد 🕋", "674", $message_id);break;
case "smd91": sendvoice($chat_id, "الشمـس 🕋", "675", $message_id);break;
case "smd92": sendvoice($chat_id, "الليـل 🕋", "676", $message_id);break;
case "smd93": sendvoice($chat_id, "الضحـى 🕋", "677", $message_id);break;
case "smd94": sendvoice($chat_id, "الشـرح 🕋", "678", $message_id);break;
case "smd95": sendvoice($chat_id, "التيـن 🕋", "679", $message_id);break;
case "smd96": sendvoice($chat_id, "العلـق 🕋", "691", $message_id);break;
case "smd97": sendvoice($chat_id, "القـدر 🕋", "680", $message_id);break;
case "smd98": sendvoice($chat_id, "البينـة 🕌", "681", $message_id);break;
case "smd99": sendvoice($chat_id, "الزلزلة 🕌", "639", $message_id);break;
case "smd100": sendvoice($chat_id, "العاديات 🕋", "682", $message_id);break;
case "smd101": sendvoice($chat_id, "القارعة 🕋", "683", $message_id);break;
case "smd102": sendvoice($chat_id, "التكاثر 🕋", "684", $message_id);break;
case "smd103": sendvoice($chat_id, "العصـر 🕋", "685", $message_id);break;
case "smd104": sendvoice($chat_id, "الهمـزة 🕋", "686", $message_id);break;
case "smd105": sendvoice($chat_id, "الفيـل 🕋", "687", $message_id);break;
case "smd106": sendvoice($chat_id, "قريـش 🕋", "688", $message_id);break;
case "smd107": sendvoice($chat_id, "الماعـون 🕋", "689", $message_id);break;
case "smd108": sendvoice($chat_id, "الكـوثر 🕋", "690", $message_id);break;
case "smd109": sendvoice($chat_id, "الكافـرون 🕋", "692", $message_id);break;
case "smd110": sendvoice($chat_id, "النـصر 🕌", "693", $message_id);break;
case "smd111": sendvoice($chat_id, "المسـد 🕋", "633", $message_id);break;
case "smd112": sendvoice($chat_id, "الأخلاص 🕋", "634", $message_id);break;
case "smd113": sendvoice($chat_id, "الفلـق 🕋", "635", $message_id);break;
case "smd114": sendvoice($chat_id, "النـاس 🕋", "636", $message_id);break;
# alminshawy
case "minshay1": sendvoice($chat_id, "الفاتحة 🕋", "463", $message_id);break;
case "minshay2": sendvoice($chat_id, "البقــرة 🕌", "464", $message_id);break;
case "minshay3": sendvoice($chat_id, "آلﻋــمران 🕌", "465", $message_id);break;
case "minshay4": sendvoice($chat_id, "النســاء 🕌", "466", $message_id);break;
case "minshay5": sendvoice($chat_id, "المــائدة 🕌", "467", $message_id);break;
case "minshay6": sendvoice($chat_id, "الأنعــام 🕋", "468", $message_id);break;
case "minshay7": sendvoice($chat_id, "الأعــراف 🕋", "469", $message_id);break;
case "minshay8": sendvoice($chat_id, "الأنفــال 🕌", "470", $message_id);break;
case "minshay9": sendvoice($chat_id, "التوبــه 🕌", "471", $message_id);break;
case "minshay10": sendvoice($chat_id, "يونـس 🕋", "472", $message_id);break;
case "minshay11": sendvoice($chat_id, "هــود 🕋", "473", $message_id);break;
case "minshay12": sendvoice($chat_id, "يوسـف 🕋", "474", $message_id);break;
case "minshay13": sendvoice($chat_id, "الرعــد 🕌", "475", $message_id);break;
case "minshay14": sendvoice($chat_id, "إبراهيــم 🕋", "476", $message_id);break;
case "minshay15": sendvoice($chat_id, "الحجــر 🕋", "477", $message_id);break;
case "minshay16": sendvoice($chat_id, "النحــل 🕋", "478", $message_id);break;
case "minshay17": sendvoice($chat_id, "الإسـراء 🕋", "479", $message_id);break;
case "minshay18": sendvoice($chat_id, "الكهـف 🕋", "480", $message_id);break;
case "minshay19": sendvoice($chat_id, "مريــم 🕋", "481", $message_id);break;
case "minshay20": sendvoice($chat_id, "طــه 🕋", "482", $message_id);break;
case "minshay21": sendvoice($chat_id, "الأنبيــاء 🕋", "483", $message_id);break;
case "minshay22": sendvoice($chat_id, "الحــج 🕌", "484", $message_id);break;
case "minshay23": sendvoice($chat_id, "المؤمنـون 🕋", "485", $message_id);break;
case "minshay24": sendvoice($chat_id, "النــور 🕌", "486", $message_id);break;
case "minshay25": sendvoice($chat_id, "الفــرقان 🕋", "487", $message_id);break;
case "minshay26": sendvoice($chat_id, "الشعــراء 🕋", "488", $message_id);break;
case "minshay27": sendvoice($chat_id, "النــمل 🕋", "489", $message_id);break;
case "minshay28": sendvoice($chat_id, "القصص 🕋", "490", $message_id);break;
case "minshay29": sendvoice($chat_id, "العـنكبوت 🕋", "491", $message_id);break;
case "minshay30": sendvoice($chat_id, "الــروم 🕋", "492", $message_id);break;
case "minshay31": sendvoice($chat_id, "لقــمان 🕋", "493", $message_id);break;
case "minshay32": sendvoice($chat_id, "السجـدة 🕋", "494", $message_id);break;
case "minshay33": sendvoice($chat_id, "الأحـزاب 🕌", "495", $message_id);break;
case "minshay34": sendvoice($chat_id, "سبـأ 🕋", "496", $message_id);break;
case "minshay35": sendvoice($chat_id, "فـاطـر 🕋", "497", $message_id);break;
case "minshay36": sendvoice($chat_id, "يــس 🕋", "498", $message_id);break;
case "minshay37": sendvoice($chat_id, "الصـافات 🕋", "499", $message_id);break;
case "minshay38": sendvoice($chat_id, "ص 🕋", "500", $message_id);break;
case "minshay39": sendvoice($chat_id, "الزمــر 🕋", "501", $message_id);break;
case "minshay40": sendvoice($chat_id, "غــافر 🕋 ", "502", $message_id);break;
case "minshay41": sendvoice($chat_id, "فصـلت 🕋", "503", $message_id);break;
case "minshay42": sendvoice($chat_id, "الشــورﻯ 🕋", "504", $message_id);break;
case "minshay43": sendvoice($chat_id, "الزخـرف 🕋", "505", $message_id);break;
case "minshay44": sendvoice($chat_id, "الدخان 🕋", "506", $message_id);break;
case "minshay45": sendvoice($chat_id, "الجاثية 🕋", "507", $message_id);break;
case "minshay46": sendvoice($chat_id, "الأحقاف 🕋", "508", $message_id);break;
case "minshay47": sendvoice($chat_id, "محــمد 🕌", "509", $message_id);break;
case "minshay48": sendvoice($chat_id, "الفتــح 🕌", "510", $message_id);break;
case "minshay49": sendvoice($chat_id, "الحجرات 🕌", "511", $message_id);break;
case "minshay50": sendvoice($chat_id, "ق 🕋", "512", $message_id);break;
case "minshay51": sendvoice($chat_id, "الذاريات 🕋", "557", $message_id);break;
case "minshay52": sendvoice($chat_id, "الطـور 🕋", "568", $message_id);break;
case "minshay53": sendvoice($chat_id, "النـجم 🕋", "520", $message_id);break;
case "minshay54": sendvoice($chat_id, "القمـر 🕋", "565", $message_id);break;
case "minshay55": sendvoice($chat_id, "الرحمـن 🕌", "521", $message_id);break;
case "minshay56": sendvoice($chat_id, "الواقعة 🕌", "522", $message_id);break;
case "minshay57": sendvoice($chat_id, "الحــديد 🕌", "523", $message_id);break;
case "minshay58": sendvoice($chat_id, "المجادلة 🕌", "524", $message_id);break;
case "minshay59": sendvoice($chat_id, "الحــشر 🕌", "525", $message_id);break;
case "minshay60": sendvoice($chat_id, "الممتحنــة 🕌", "526", $message_id);break;
case "minshay61": sendvoice($chat_id, "الصــف 🕌", "527", $message_id);break;
case "minshay62": sendvoice($chat_id, "الجمعــة 🕌", "528", $message_id);break;
case "minshay63": sendvoice($chat_id, "المناقــون 🕌", "529", $message_id);break;
case "minshay64": sendvoice($chat_id, "التغـابن 🕌", "530", $message_id);break;
case "minshay65": sendvoice($chat_id, "الطــلاق 🕌", "531", $message_id);break;
case "minshay66": sendvoice($chat_id, "التحــريم 🕌", "532", $message_id);break;
case "minshay67": sendvoice($chat_id, "الملك 🕋", "533", $message_id);break;
case "minshay68": sendvoice($chat_id, "القلم 🕋", "513", $message_id);break;
case "minshay69": sendvoice($chat_id, "الحاقة 🕋", "534", $message_id);break;
case "minshay70": sendvoice($chat_id, "المعارج 🕋", "535", $message_id);break;
case "minshay71": sendvoice($chat_id, "نـوح 🕋", "536", $message_id);break;
case "minshay72": sendvoice($chat_id, "الجـن 🕋", "537", $message_id);break;
case "minshay73": sendvoice($chat_id, "المزمل 🕋", "538", $message_id);break;
case "minshay74": sendvoice($chat_id, "المدثر 🕋", "539", $message_id);break;
case "minshay75": sendvoice($chat_id, "القيامة 🕋", "540", $message_id);break;
case "minshay76": sendvoice($chat_id, "الأنسان 🕌", "541", $message_id);break;
case "minshay77": sendvoice($chat_id, "المرسلات 🕋", "542", $message_id);break;
case "minshay78": sendvoice($chat_id, "النبأ 🕋", "514", $message_id);break;
case "minshay79": sendvoice($chat_id, "النازعات 🕋", "543", $message_id);break;
case "minshay80": sendvoice($chat_id, "عبـس 🕋", "544", $message_id);break;
case "minshay81": sendvoice($chat_id, "التكوير 🕋", "545", $message_id);break;
case "minshay82": sendvoice($chat_id, "الانفطار 🕋", "546", $message_id);break;
case "minshay83": sendvoice($chat_id, "المطففين 🕋", "547", $message_id);break;
case "minshay84": sendvoice($chat_id, "الانشقاق 🕋", "548", $message_id);break;
case "minshay85": sendvoice($chat_id, "البروج 🕋", "549", $message_id);break;
case "minshay86": sendvoice($chat_id, "الطارق 🕋", "550", $message_id);break;
case "minshay87": sendvoice($chat_id, "الأعلى 🕋", "515", $message_id);break;
case "minshay88": sendvoice($chat_id, "الغاشية 🕋", "551", $message_id);break;
case "minshay89": sendvoice($chat_id, "الفجـر 🕋", "552", $message_id);break;
case "minshay90": sendvoice($chat_id, "البلـد 🕋", "553", $message_id);break;
case "minshay91": sendvoice($chat_id, "الشمـس 🕋", "554", $message_id);break;
case "minshay92": sendvoice($chat_id, "الليـل 🕋", "555", $message_id);break;
case "minshay93": sendvoice($chat_id, "الضحـى 🕋", "556", $message_id);break;
case "minshay94": sendvoice($chat_id, "الشـرح 🕋", "558", $message_id);break;
case "minshay95": sendvoice($chat_id, "التيـن 🕋", "559", $message_id);break;
case "minshay96": sendvoice($chat_id, "العلـق 🕋", "560", $message_id);break;
case "minshay97": sendvoice($chat_id, "القـدر 🕋", "561", $message_id);break;
case "minshay98": sendvoice($chat_id, "البينـة 🕌", "562", $message_id);break;
case "minshay99": sendvoice($chat_id, "الزلزلة 🕌", "566", $message_id);break;
case "minshay100": sendvoice($chat_id, "العاديات 🕋", "563", $message_id);break;
case "minshay101": sendvoice($chat_id, "القارعة 🕋", "567", $message_id);break;
case "minshay102": sendvoice($chat_id, "التكاثر 🕋", "569", $message_id);break;
case "minshay103": sendvoice($chat_id, "العصـر 🕋", "570", $message_id);break;
case "minshay104": sendvoice($chat_id, "الهمـزة 🕋", "571", $message_id);break;
case "minshay105": sendvoice($chat_id, "الفيـل 🕋", "572", $message_id);break;
case "minshay106": sendvoice($chat_id, "قريـش 🕋", "573", $message_id);break;
case "minshay107": sendvoice($chat_id, "الماعـون 🕋", "519", $message_id);break;
case "minshay108": sendvoice($chat_id, "الكـوثر 🕋", "574", $message_id);break;
case "minshay109": sendvoice($chat_id, "الكافـرون 🕋", "575", $message_id);break;
case "minshay110": sendvoice($chat_id, "النـصر 🕌", "576", $message_id);break;
case "minshay111": sendvoice($chat_id, "المسـد 🕋", "518", $message_id);break;
case "minshay112": sendvoice($chat_id, "الأخلاص 🕋", "577", $message_id);break;
case "minshay113": sendvoice($chat_id, "الفلـق 🕋", "516", $message_id);break;
case "minshay114": sendvoice($chat_id, "النـاس 🕋", "517", $message_id);break;

/* End switch */
}
	# next sura
	 if($data =="nexts"){
		 $nsura = file_get_contents("data/n$chat_id.txt");
	$nsura = $nsura + 1;
	if($nsura >= 114){
		$nsura = 114;
	}
	file_put_contents("data/n$chat_id.txt",$nsura);
	$nsura = file_get_contents("data/n$chat_id.txt");
		 switch($nsura){
case 1: send($chat_id, "الفاتحة 🕋", 7, 1, $message_id);break;
case 2: send($chat_id, "البقــرة 🕌", 286, 2, $message_id);break;
case 3: send($chat_id, "آلﻋــمران 🕌",200, 50, $message_id);break;
case 4: send($chat_id, "النســاء 🕌",176, 77, $message_id);break;
case 5: send($chat_id, "المــائدة 🕌", 120, 106, $message_id);break;
case 6: send($chat_id, "الأنعــام 🕋", 165, 128, $message_id);break;
case 7: send($chat_id, "الأعــراف 🕋", 296, 151, $message_id);break;
case 8: send($chat_id, "الأنفــال 🕌", 75, 177, $message_id);break;
case 9: send($chat_id, "التوبــه 🕌", 129, 187, $message_id);break;
case 10: send($chat_id, "يونـس 🕋", 109, 208, $message_id);break;
case 11: send($chat_id, "هــود 🕋", 123, 221, $message_id);break;
case 12: send($chat_id, "يوسـف 🕋", 111, 235, $message_id);break;
case 13: send($chat_id, "الرعــد 🕌", 43, 249, $message_id);break;
case 14: send($chat_id, "إبراهيــم 🕋", 52, 255, $message_id);break;
case 15: send($chat_id, "الحجــر 🕋", 99, 262, $message_id);break;
case 16: send($chat_id, "النحــل 🕋", 128, 267, $message_id);break;
case 17: send($chat_id, "الإسـراء 🕋", 111, 282, $message_id);break;
case 18: send($chat_id, "الكهـف 🕋", 110, 293, $message_id);break;
case 19: send($chat_id, "مريــم 🕋", 98, 305, $message_id);break;
case 20: send($chat_id, "طــه 🕋", 135, 312, $message_id);break;
case 21: send($chat_id, "الأنبيــاء 🕋", 112, 322, $message_id);break;
case 22: send($chat_id, "الحــج 🕌", 98, 332, $message_id);break;
case 23: send($chat_id, "المؤمنـون 🕋", 118, 342, $message_id);break;
case 24: send($chat_id, "النــور 🕌", 64, 350, $message_id);break;
case 25: send($chat_id, "الفــرقان 🕋", 77, 359, $message_id);break;
case 26: send($chat_id, "الشعــراء 🕋", 227, 367, $message_id);break;
case 27: send($chat_id, "النــمل 🕋", 93, 377, $message_id);break;
case 28: send($chat_id, "القصص 🕋", 88, 385, $message_id);break;
case 29: send($chat_id, "العـنكبوت 🕋", 69, 396, $message_id);break;
case 30: send($chat_id, "الــروم 🕋", 60, 404, $message_id);break;
case 31: send($chat_id, "لقــمان 🕋", 34, 411, $message_id);break;
case 32: send($chat_id, "السجـدة 🕋", 30, 415, $message_id);break;
case 33: send($chat_id, "الأحـزاب 🕌", 73, 418, $message_id);break;
case 34: send($chat_id, "سبـأ 🕋", 54, 428, $message_id);break;
case 35: send($chat_id, "فـاطـر 🕋", 45, 434, $message_id);break;
case 36: send($chat_id, "يــس 🕋", 83, 440, $message_id);break;
case 37: send($chat_id, "الصـافات 🕋", 182, 446, $message_id);break;
case 38: send($chat_id, "ص 🕋", 88, 453, $message_id);break;
case 39: send($chat_id, "الزمــر 🕋", 75, 458, $message_id);break;
case 40: send($chat_id, "غــافر 🕋 ", 85, 467, $message_id);break;
case 41: send($chat_id, "فصـلت 🕋", 54, 477, $message_id);break;
case 42: send($chat_id, "الشــورﻯ 🕋", 53, 483, $message_id);break;
case 43: send($chat_id, "الزخـرف 🕋", 89, 489, $message_id);break;
case 44: send($chat_id, "الدخان 🕋", 59, 496, $message_id);break;
case 45: send($chat_id, "الجاثية 🕋", 37, 499, $message_id);break;
case 46: send($chat_id, "الأحقاف 🕋", 35, 502, $message_id);break;
case 47: send($chat_id, "محــمد 🕌", 38, 507, $message_id);break;
case 48: send($chat_id, "الفتــح 🕌", 29, 511, $message_id);break;
case 49: send($chat_id, "الحجرات 🕌", 18, 515, $message_id);break;
case 50: send($chat_id, "ق 🕋", 45, 518, $message_id);break;
case 51: send($chat_id, "الذاريات 🕋", 60, 520, $message_id);break;
case 52: send($chat_id, "الطـور 🕋", 40, 523, $message_id);break;
case 53: send($chat_id, "النـجم 🕋", 62, 526, $message_id);break;
case 54: send($chat_id, "القمـر 🕋", 55, 528, $message_id);break;
case 55: send($chat_id, "الرحمـن 🕌", 75, 531, $message_id);break;
case 56: send($chat_id, "الواقعة 🕌", 96, 534, $message_id);break;
case 57: send($chat_id, "الحــديد 🕌", 29, 537, $message_id);break;
case 58: send($chat_id, "المجادلة 🕌", 22, 542, $message_id);break;
case 59: send($chat_id, "الحــشر 🕌", 24, 545, $message_id);break;
case 60: send($chat_id, "الممتحنــة 🕌", 13, 549, $message_id);break;
case 61: send($chat_id, "الصــف 🕌", 14, 551, $message_id);break;
case 62: send($chat_id, "الجمعــة 🕌", 11, 553, $message_id);break;
case 63: send($chat_id, "المناقــون 🕌", 11, 554, $message_id);break;
case 64: send($chat_id, "التغـابن 🕌", 18, 556, $message_id);break;
case 65: send($chat_id, "الطــلاق 🕌", 12, 558, $message_id);break;
case 66: send($chat_id, "التحــريم 🕌", 12, 560, $message_id);break;
case 67: send($chat_id, "الملك 🕋", 30, 562, $message_id);break;
case 68: send($chat_id, "القلم 🕋", 52, 564, $message_id);break;
case 69: send($chat_id, "الحاقة 🕋", 52, 566, $message_id);break;
case 70: send($chat_id, "المعارج 🕋", 44, 568, $message_id);break;
case 71: send($chat_id, "نـوح 🕋", 28, 570, $message_id);break;
case 72: send($chat_id, "الجـن 🕋", 28, 572, $message_id);break;
case 73: send($chat_id, "المزمل 🕋", 20, 574, $message_id);break;
case 74: send($chat_id, "المدثر 🕋", 56, 575, $message_id);break;
case 75: send($chat_id, "القيامة 🕋", 40, 577, $message_id);break;
case 76: send($chat_id, "الأنسان 🕌", 31, 578, $message_id);break;
case 77: send($chat_id, "المرسلات 🕋", 50, 580, $message_id);break;
case 78: send($chat_id, "النبأ 🕋", 40, 582, $message_id);break;
case 79: send($chat_id, "النازعات 🕋", 46, 583, $message_id);break;
case 80: send($chat_id, "عبـس 🕋", 42, 585, $message_id);break;
case 81: send($chat_id, "التكوير 🕋", 29, 586, $message_id);break;
case 82: send($chat_id, "الانفطار 🕋", 19, 587, $message_id);break;
case 83: send($chat_id, "المطففين 🕋", 36, 587, $message_id);break;
case 84: send($chat_id, "الانشقاق 🕋", 25, 589, $message_id);break;
case 85: send($chat_id, "البروج 🕋", 22, 590, $message_id);break;
case 86: send($chat_id, "الطارق 🕋", 17, 591, $message_id);break;
case 87: send($chat_id, "الأعلى 🕋", 19, 591, $message_id);break;
case 88: send($chat_id, "الغاشية 🕋", 26, 592, $message_id);break;
case 89: send($chat_id, "الفجـر 🕋", 30, 593, $message_id);break;
case 90: send($chat_id, "البلـد 🕋", 20, 594, $message_id);break;
case 91: send($chat_id, "الشمـس 🕋", 15, 595, $message_id);break;
case 92: send($chat_id, "الليـل 🕋", 21, 595, $message_id);break;
case 93: send($chat_id, "الضحـى 🕋", 11, 596, $message_id);break;
case 94: send($chat_id, "الشـرح 🕋", 8, 596, $message_id);break;
case 95: send($chat_id, "التيـن 🕋", 8, 597, $message_id);break;
case 96: send($chat_id, "العلـق 🕋", 19, 597, $message_id);break;
case 97: send($chat_id, "القـدر 🕋", 5, 598, $message_id);break;
case 98: send($chat_id, "البينـة 🕌", 8, 598, $message_id);break;
case 99: send($chat_id, "الزلزلة 🕌", 8, 599, $message_id);break;
case 100: send($chat_id, "العاديات 🕋", 11, 599, $message_id);break;
case 101: send($chat_id, "القارعة 🕋", 11, 600, $message_id);break;
case 102: send($chat_id, "التكاثر 🕋", 8, 600, $message_id);break;
case 103: send($chat_id, "العصـر 🕋", 3, 601, $message_id);break;
case 104: send($chat_id, "الهمـزة 🕋", 9, 601, $message_id);break;
case 105: send($chat_id, "الفيـل 🕋", 5, 601, $message_id);break;
case 106: send($chat_id, "قريـش 🕋", 4, 602, $message_id);break;
case 107: send($chat_id, "الماعـون 🕋", 7, 602, $message_id);break;
case 108: send($chat_id, "الكـوثر 🕋", 3, 602, $message_id);break;
case 109: send($chat_id, "الكافـرون 🕋", 6, 603, $message_id);break;
case 110: send($chat_id, "النـصر 🕌", 3, 603, $message_id);break;
case 111: send($chat_id, "المسـد 🕋", 5, 603, $message_id);break;
case 112: send($chat_id, "الأخلاص 🕋", 4, 604, $message_id);break;
case 113: send($chat_id, "الفلـق 🕋", 5, 604, $message_id);break;
case 114: send($chat_id, "النـاس 🕋", 6, 604, $message_id);break;
}
}
	# back sura
	 if($data =="backs"){
		  $nsura = file_get_contents("data/n$chat_id.txt");
		$nsura = $nsura - 1;
	if($nsura <= 0){
		$nsura = 1;
	}
	file_put_contents("data/n$chat_id.txt",$nsura);
	$nsura = file_get_contents("data/n$chat_id.txt");
		 switch($nsura){
case 1: send($chat_id, "الفاتحة 🕋", 7, 1, $message_id);break;
case 2: send($chat_id, "البقــرة 🕌", 286, 2, $message_id);break;
case 3: send($chat_id, "آلﻋــمران 🕌",200, 50, $message_id);break;
case 4: send($chat_id, "النســاء 🕌",176, 77, $message_id);break;
case 5: send($chat_id, "المــائدة 🕌", 120, 106, $message_id);break;
case 6: send($chat_id, "الأنعــام 🕋", 165, 128, $message_id);break;
case 7: send($chat_id, "الأعــراف 🕋", 296, 151, $message_id);break;
case 8: send($chat_id, "الأنفــال 🕌", 75, 177, $message_id);break;
case 9: send($chat_id, "التوبــه 🕌", 129, 187, $message_id);break;
case 10: send($chat_id, "يونـس 🕋", 109, 208, $message_id);break;
case 11: send($chat_id, "هــود 🕋", 123, 221, $message_id);break;
case 12: send($chat_id, "يوسـف 🕋", 111, 235, $message_id);break;
case 13: send($chat_id, "الرعــد 🕌", 43, 249, $message_id);break;
case 14: send($chat_id, "إبراهيــم 🕋", 52, 255, $message_id);break;
case 15: send($chat_id, "الحجــر 🕋", 99, 262, $message_id);break;
case 16: send($chat_id, "النحــل 🕋", 128, 267, $message_id);break;
case 17: send($chat_id, "الإسـراء 🕋", 111, 282, $message_id);break;
case 18: send($chat_id, "الكهـف 🕋", 110, 293, $message_id);break;
case 19: send($chat_id, "مريــم 🕋", 98, 305, $message_id);break;
case 20: send($chat_id, "طــه 🕋", 135, 312, $message_id);break;
case 21: send($chat_id, "الأنبيــاء 🕋", 112, 322, $message_id);break;
case 22: send($chat_id, "الحــج 🕌", 98, 332, $message_id);break;
case 23: send($chat_id, "المؤمنـون 🕋", 118, 342, $message_id);break;
case 24: send($chat_id, "النــور 🕌", 64, 350, $message_id);break;
case 25: send($chat_id, "الفــرقان 🕋", 77, 359, $message_id);break;
case 26: send($chat_id, "الشعــراء 🕋", 227, 367, $message_id);break;
case 27: send($chat_id, "النــمل 🕋", 93, 377, $message_id);break;
case 28: send($chat_id, "القصص 🕋", 88, 385, $message_id);break;
case 29: send($chat_id, "العـنكبوت 🕋", 69, 396, $message_id);break;
case 30: send($chat_id, "الــروم 🕋", 60, 404, $message_id);break;
case 31: send($chat_id, "لقــمان 🕋", 34, 411, $message_id);break;
case 32: send($chat_id, "السجـدة 🕋", 30, 415, $message_id);break;
case 33: send($chat_id, "الأحـزاب 🕌", 73, 418, $message_id);break;
case 34: send($chat_id, "سبـأ 🕋", 54, 428, $message_id);break;
case 35: send($chat_id, "فـاطـر 🕋", 45, 434, $message_id);break;
case 36: send($chat_id, "يــس 🕋", 83, 440, $message_id);break;
case 37: send($chat_id, "الصـافات 🕋", 182, 446, $message_id);break;
case 38: send($chat_id, "ص 🕋", 88, 453, $message_id);break;
case 39: send($chat_id, "الزمــر 🕋", 75, 458, $message_id);break;
case 40: send($chat_id, "غــافر 🕋 ", 85, 467, $message_id);break;
case 41: send($chat_id, "فصـلت 🕋", 54, 477, $message_id);break;
case 42: send($chat_id, "الشــورﻯ 🕋", 53, 483, $message_id);break;
case 43: send($chat_id, "الزخـرف 🕋", 89, 489, $message_id);break;
case 44: send($chat_id, "الدخان 🕋", 59, 496, $message_id);break;
case 45: send($chat_id, "الجاثية 🕋", 37, 499, $message_id);break;
case 46: send($chat_id, "الأحقاف 🕋", 35, 502, $message_id);break;
case 47: send($chat_id, "محــمد 🕌", 38, 507, $message_id);break;
case 48: send($chat_id, "الفتــح 🕌", 29, 511, $message_id);break;
case 49: send($chat_id, "الحجرات 🕌", 18, 515, $message_id);break;
case 50: send($chat_id, "ق 🕋", 45, 518, $message_id);break;
case 51: send($chat_id, "الذاريات 🕋", 60, 520, $message_id);break;
case 52: send($chat_id, "الطـور 🕋", 40, 523, $message_id);break;
case 53: send($chat_id, "النـجم 🕋", 62, 526, $message_id);break;
case 54: send($chat_id, "القمـر 🕋", 55, 528, $message_id);break;
case 55: send($chat_id, "الرحمـن 🕌", 75, 531, $message_id);break;
case 56: send($chat_id, "الواقعة 🕌", 96, 534, $message_id);break;
case 57: send($chat_id, "الحــديد 🕌", 29, 537, $message_id);break;
case 58: send($chat_id, "المجادلة 🕌", 22, 542, $message_id);break;
case 59: send($chat_id, "الحــشر 🕌", 24, 545, $message_id);break;
case 60: send($chat_id, "الممتحنــة 🕌", 13, 549, $message_id);break;
case 61: send($chat_id, "الصــف 🕌", 14, 551, $message_id);break;
case 62: send($chat_id, "الجمعــة 🕌", 11, 553, $message_id);break;
case 63: send($chat_id, "المناقــون 🕌", 11, 554, $message_id);break;
case 64: send($chat_id, "التغـابن 🕌", 18, 556, $message_id);break;
case 65: send($chat_id, "الطــلاق 🕌", 12, 558, $message_id);break;
case 66: send($chat_id, "التحــريم 🕌", 12, 560, $message_id);break;
case 67: send($chat_id, "الملك 🕋", 30, 562, $message_id);break;
case 68: send($chat_id, "القلم 🕋", 52, 564, $message_id);break;
case 69: send($chat_id, "الحاقة 🕋", 52, 566, $message_id);break;
case 70: send($chat_id, "المعارج 🕋", 44, 568, $message_id);break;
case 71: send($chat_id, "نـوح 🕋", 28, 570, $message_id);break;
case 72: send($chat_id, "الجـن 🕋", 28, 572, $message_id);break;
case 73: send($chat_id, "المزمل 🕋", 20, 574, $message_id);break;
case 74: send($chat_id, "المدثر 🕋", 56, 575, $message_id);break;
case 75: send($chat_id, "القيامة 🕋", 40, 577, $message_id);break;
case 76: send($chat_id, "الأنسان 🕌", 31, 578, $message_id);break;
case 77: send($chat_id, "المرسلات 🕋", 50, 580, $message_id);break;
case 78: send($chat_id, "النبأ 🕋", 40, 582, $message_id);break;
case 79: send($chat_id, "النازعات 🕋", 46, 583, $message_id);break;
case 80: send($chat_id, "عبـس 🕋", 42, 585, $message_id);break;
case 81: send($chat_id, "التكوير 🕋", 29, 586, $message_id);break;
case 82: send($chat_id, "الانفطار 🕋", 19, 587, $message_id);break;
case 83: send($chat_id, "المطففين 🕋", 36, 587, $message_id);break;
case 84: send($chat_id, "الانشقاق 🕋", 25, 589, $message_id);break;
case 85: send($chat_id, "البروج 🕋", 22, 590, $message_id);break;
case 86: send($chat_id, "الطارق 🕋", 17, 591, $message_id);break;
case 87: send($chat_id, "الأعلى 🕋", 19, 591, $message_id);break;
case 88: send($chat_id, "الغاشية 🕋", 26, 592, $message_id);break;
case 89: send($chat_id, "الفجـر 🕋", 30, 593, $message_id);break;
case 90: send($chat_id, "البلـد 🕋", 20, 594, $message_id);break;
case 91: send($chat_id, "الشمـس 🕋", 15, 595, $message_id);break;
case 92: send($chat_id, "الليـل 🕋", 21, 595, $message_id);break;
case 93: send($chat_id, "الضحـى 🕋", 11, 596, $message_id);break;
case 94: send($chat_id, "الشـرح 🕋", 8, 596, $message_id);break;
case 95: send($chat_id, "التيـن 🕋", 8, 597, $message_id);break;
case 96: send($chat_id, "العلـق 🕋", 19, 597, $message_id);break;
case 97: send($chat_id, "القـدر 🕋", 5, 598, $message_id);break;
case 98: send($chat_id, "البينـة 🕌", 8, 598, $message_id);break;
case 99: send($chat_id, "الزلزلة 🕌", 8, 599, $message_id);break;
case 100: send($chat_id, "العاديات 🕋", 11, 599, $message_id);break;
case 101: send($chat_id, "القارعة 🕋", 11, 600, $message_id);break;
case 102: send($chat_id, "التكاثر 🕋", 8, 600, $message_id);break;
case 103: send($chat_id, "العصـر 🕋", 3, 601, $message_id);break;
case 104: send($chat_id, "الهمـزة 🕋", 9, 601, $message_id);break;
case 105: send($chat_id, "الفيـل 🕋", 5, 601, $message_id);break;
case 106: send($chat_id, "قريـش 🕋", 4, 602, $message_id);break;
case 107: send($chat_id, "الماعـون 🕋", 7, 602, $message_id);break;
case 108: send($chat_id, "الكـوثر 🕋", 3, 602, $message_id);break;
case 109: send($chat_id, "الكافـرون 🕋", 6, 603, $message_id);break;
case 110: send($chat_id, "النـصر 🕌", 3, 603, $message_id);break;
case 111: send($chat_id, "المسـد 🕋", 5, 603, $message_id);break;
case 112: send($chat_id, "الأخلاص 🕋", 4, 604, $message_id);break;
case 113: send($chat_id, "الفلـق 🕋", 5, 604, $message_id);break;
case 114: send($chat_id, "النـاس 🕋", 6, 604, $message_id);break;
}
		}
# next
               if($data =="next"){
               	$next=$next+1;
				if($next >= 604){
					$next =604;
				}
file_put_contents("data/$chat_id.txt",$next);
 $next = file_get_contents("data/$chat_id.txt");
               bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"http://www.islamicbook.ws/2/$next.jpg",
'caption'=>"
- الصفحه رقم $next -",
     'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"الصفحه السابقه◀️",'callback_data'=>"back"],
           ['text'=>"▶️الصفحه التاليه",'callback_data'=>"next"]],
           [['text'=>"السورة السابقه◀️",'callback_data'=>"backs"],
           ['text'=>"▶️السورة التاليه",'callback_data'=>"nexts"]],

           [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main"]]
                ]
                ])
]);

}
# back
if($data =="back"){
               	$next=$next-1;
               if($next <= 0){
               	$next= 1;
file_put_contents("data/$chat_id.txt","$next");
}
file_put_contents("data/$chat_id.txt",$next);
 $next = file_get_contents("data/$chat_id.txt");
               bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>"http://www.islamicbook.ws/2/$next.jpg",
'caption'=>"
- الصفحه رقم $next -",
     'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"الصفحه السابقه◀️",'callback_data'=>"back"],
           ['text'=>"▶️الصفحه التاليه",'callback_data'=>"next"]],
           [['text'=>"السورة السابقه◀️",'callback_data'=>"backs"],
           ['text'=>"▶️السورة التاليه",'callback_data'=>"nexts"]],

           [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main"]]
                ]
                ])
]);

}
/*----------------------------------*/
#hisn almuslim
/*if($data =="next1"){
               	$next1=$next1+1;
				if($next1 >= 154){
					$next1 = 154;
				}
file_put_contents("data/h$chat_id.txt",$next1);
 $next1 = file_get_contents("data/h$chat_id.txt");
              
}
# back
if($data =="back1"){
               	$next1=$next1-1;
               if($next1 <= 0){
               	$next= 1;
file_put_contents("data/$hchat_id.txt","$next1");
}
file_put_contents("data/h$chat_id.txt","$next1");
 $next1 = file_get_contents("data/h$chat_id.txt");
              
}*/

# content 1
if($data =="quran"){
	bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المرسلات 🕋",'callback_data'=>"77"],['text'=>"الزمــر 🕋",'callback_data'=>"39"],['text'=>"الفاتحة 🕋",'callback_data'=>"1"]],
		   [['text'=>"النبأ 🕋",'callback_data'=>"78"],['text'=>"غــافر 🕋",'callback_data'=>"40"],['text'=>"البقــرة 🕌",'callback_data'=>"2"]],
		   [['text'=>"النازعات 🕋",'callback_data'=>"79"],['text'=>"فصـلت 🕋",'callback_data'=>"41"],['text'=>"آلﻋــمران 🕌",'callback_data'=>"3"]],
		   [['text'=>"عبـس 🕋",'callback_data'=>"80"],['text'=>"الشــورﻯ 🕋",'callback_data'=>"42"],['text'=>"النســاء 🕌",'callback_data'=>"4"]],
		   [['text'=>"التكوير 🕋",'callback_data'=>"81"],['text'=>"الزخـرف 🕋",'callback_data'=>"43"],['text'=>"المــائدة 🕌",'callback_data'=>"5"]],
		   [['text'=>"الانفطار 🕋",'callback_data'=>"82"],['text'=>"الدخان 🕋",'callback_data'=>"44"],['text'=>"الأنعــام 🕋",'callback_data'=>"6"]],
		   [['text'=>"المطففين 🕋",'callback_data'=>"83"],['text'=>"الجاثية 🕋",'callback_data'=>"45"],['text'=>"الأعــراف 🕋",'callback_data'=>"7"]],
		   [['text'=>"الانشقاق 🕋",'callback_data'=>"84"],['text'=>"الأحقاف 🕋",'callback_data'=>"46"],['text'=>"الأنفــال 🕌",'callback_data'=>"8"]],
		   [['text'=>"البروج 🕋",'callback_data'=>"85"],['text'=>"محــمد 🕌",'callback_data'=>"47"],['text'=>"التوبــه 🕌",'callback_data'=>"9"]],
		   [['text'=>"الطارق 🕋",'callback_data'=>"86"],['text'=>"الفتــح 🕌",'callback_data'=>"48"],['text'=>"يونـس 🕋",'callback_data'=>"10"]],
		   [['text'=>"الأعلى 🕋",'callback_data'=>"87"],['text'=>"الحجرات 🕌",'callback_data'=>"49"],['text'=>"هــود 🕋",'callback_data'=>"11"]],
		   [['text'=>"الغاشية 🕋",'callback_data'=>"88"],['text'=>"ق 🕋",'callback_data'=>"50"],['text'=>"يوسـف 🕋",'callback_data'=>"12"]],
		   [['text'=>"الفجـر 🕋",'callback_data'=>"89"],['text'=>"الذاريات 🕋",'callback_data'=>"51"],['text'=>"الرعــد 🕌",'callback_data'=>"13"]],
		   [['text'=>"البلـد 🕋",'callback_data'=>"90"],['text'=>"الطـور 🕋",'callback_data'=>"52"],['text'=>"إبراهيــم 🕋",'callback_data'=>"14"]],
		   [['text'=>"الشمـس 🕋",'callback_data'=>"91"],['text'=>"النـجم 🕋",'callback_data'=>"53"],['text'=>"الحجــر 🕋",'callback_data'=>"15"]],
		   [['text'=>"الليـل 🕋",'callback_data'=>"92"],['text'=>"القمـر 🕋",'callback_data'=>"54"],['text'=>"النحــل 🕋",'callback_data'=>"16"]],
		   [['text'=>"الضحـى 🕋",'callback_data'=>"93"],['text'=>"الرحمـن 🕌",'callback_data'=>"55"],['text'=>"الإسـراء 🕋",'callback_data'=>"17"]],
		   [['text'=>"الشـرح 🕋",'callback_data'=>"94"],['text'=>"الواقعة 🕌",'callback_data'=>"56"],['text'=>"الكهـف 🕋",'callback_data'=>"18"]],
		   [['text'=>"التيـن 🕋",'callback_data'=>"95"],['text'=>"الحــديد 🕌",'callback_data'=>"57"],['text'=>"مريــم 🕋 🕋",'callback_data'=>"19"]],
		   [['text'=>"التالي↪️",'callback_data'=>"quran1"],['text'=>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]],
                ]
                ])
                ]);
	}
	# content 2
	if($data =="quran1"){
	bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
		   [['text'=>"العلـق 🕋",'callback_data'=>"96"],['text'=>"المجادلة 🕌",'callback_data'=>"58"],['text'=>"طــه 🕋",'callback_data'=>"20"]],
		   [['text'=>"القـدر 🕋",'callback_data'=>"97"],['text'=>"الحــشر 🕌",'callback_data'=>"59"],['text'=>"الأنبيــاء 🕋",'callback_data'=>"21"]],
		   [['text'=>"البينـة 🕌",'callback_data'=>"98"],['text'=>"الممتحنــة 🕌",'callback_data'=>"60"],['text'=>"الحــج 🕌 🕌",'callback_data'=>"22"]],
		   [['text'=>"الزلزلة 🕌",'callback_data'=>"99"],['text'=>"الصــف 🕌",'callback_data'=>"61"],['text'=>"المؤمنـون 🕋",'callback_data'=>"23"]],
		   [['text'=>"العاديات 🕋",'callback_data'=>"100"],['text'=>"الجمعــة 🕌",'callback_data'=>"62"],['text'=>"النــور 🕌",'callback_data'=>"24"]],
		   [['text'=>"القارعة 🕋",'callback_data'=>"101"],['text'=>"المناقــون 🕌",'callback_data'=>"63"],['text'=>"الفــرقان 🕋",'callback_data'=>"25"]],
		   [['text'=>"التكاثر 🕋",'callback_data'=>"102"],['text'=>"التغـابن 🕌",'callback_data'=>"64"],['text'=>"الشعــراء 🕋",'callback_data'=>"26"]],
		   [['text'=>"العصـر 🕋",'callback_data'=>"103"],['text'=>"الطــلاق 🕌",'callback_data'=>"65"],['text'=>"النــمل 🕋",'callback_data'=>"27"]],
		   [['text'=>"الهمـزة 🕋",'callback_data'=>"104"],['text'=>"التحــريم 🕌",'callback_data'=>"66"],['text'=>"القصص 🕋",'callback_data'=>"28"]],
		   [['text'=>"الفيـل 🕋",'callback_data'=>"105"],['text'=>"الملك 🕋",'callback_data'=>"67"],['text'=>"العـنكبوت 🕋",'callback_data'=>"29"]],
		   [['text'=>"قريـش 🕋",'callback_data'=>"106"],['text'=>"القلم 🕋",'callback_data'=>"68"],['text'=>"الــروم 🕋",'callback_data'=>"30"]],
		   [['text'=>"الماعـون 🕋",'callback_data'=>"107"],['text'=>"الحاقة 🕋",'callback_data'=>"69"],['text'=>"لقــمان 🕋",'callback_data'=>"31"]],
		   [['text'=>"الكـوثر 🕋",'callback_data'=>"108"],['text'=>"المعارج 🕋",'callback_data'=>"70"],['text'=>"السجـدة 🕋",'callback_data'=>"32"]],
		   [['text'=>"الكافـرون 🕋",'callback_data'=>"109"],['text'=>"نـوح 🕋",'callback_data'=>"71"],['text'=>"الأحـزاب 🕌",'callback_data'=>"33"]],
		   [['text'=>"النـصر 🕌",'callback_data'=>"110"],['text'=>"الجـن 🕋",'callback_data'=>"72"],['text'=>"سبـأ 🕋 ",'callback_data'=>"34"]],
		   [['text'=>"المسـد 🕋",'callback_data'=>"111"],['text'=>"المزمل 🕋",'callback_data'=>"73"],['text'=>"فـاطـر 🕋",'callback_data'=>"35"]],
		   [['text'=>"الأخلاص 🕋",'callback_data'=>"112"],['text'=>"المدثر 🕋",'callback_data'=>"74"],['text'=>"يــس 🕋",'callback_data'=>"36"]],
		   [['text'=>"الفلـق 🕋",'callback_data'=>"113"],['text'=>"القيامة 🕋",'callback_data'=>"75"],['text'=>"الصـافات 🕋",'callback_data'=>"37"]],
		   [['text'=>"النـاس 🕋",'callback_data'=>"114"],['text'=>"الأنسان 🕌",'callback_data'=>"76"],['text'=>"ص 🕋",'callback_data'=>"38"]],
		   [['text'=>"↩️السابق",'callback_data'=>"quran"],['text'=>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]],
                ]
                ])
                ]);
	}
	# Download
	if($data =="download"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
				- 💽 اضفط على احد الروابط ادناه لتحميل القرآن الكريم كامل برابط مباشر -

القرآن كامل ماهر المعيقلي💾
https://download.tvquran.com/download/recitations/archives/82-mp3.zip

القرآن كامل العفاسي💾
https://download.tvquran.com/download/recitations/archives/23-mp3.zip

 القرآن كامل ابو بكر الشاطري💾
https://download.tvquran.com/download/recitations/archives/39-mp3.zip

القرآن كامل علي جابر💾
https://download.tvquran.com/download/recitations/archives/31-mp3.zip
		 ",
		 'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
	'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main1"]]
                ]
                ])
]);
	}
	# AZKAR
	if($data =="azkar"){
		 bot('sendvoice',[
   'chat_id'=>$chat_id,
   'voice'=>"https://t.me/Ari7msm3k/196",
    'caption'=>"اذكار الصباح📿",
	'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main"]]
                ]
                ])
]);
		bot('sendvoice',[
   'chat_id'=>$chat_id,
   'voice'=>"https://t.me/Ari7msm3k/197",
    'caption'=>"اذكار المساء📿",
	'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main"]]
                ]
                ])
]);
	}
# mp3
if($data =="mp3"){
	bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"اختر احد القراء",
		 'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
	'reply_markup' =>json_encode([
            'inline_keyboard' =>[
		   [['text'=>"🎧ماهر المعيقلي",'callback_data'=>"mahir"],['text'=>"🎧سعد الغامدي💽",'callback_data'=>"sad"]],
		   [['text'=>"🎧ياسر الدوسري💽",'callback_data'=>"yasir"],['text'=>"🎧عبدالرحمن السديس💽",'callback_data'=>"sds"]],
		   [['text'=>"🎧محمد المنشاوي،مع تردد الاطفال💽",'callback_data'=>"minshay"],['text'=>"🎧عبدالباسط عبدالصمد",'callback_data'=>"smd"]],
		   [[ 'text' =>"↩️الصفحه الرئيسيه↪️",  'callback_data' =>"main1"]]
                ]
                ])
]);
	}
	# yaser
	if($data =="yasir"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: ياسر الدوسري -
- الروايه: حفص عن عاصم -
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المرسلات 🕋",'callback_data'=>"yasir77"],['text'=>"الزمــر 🕋",'callback_data'=>"yasir39"],['text'=>"الفاتحة 🕋",'callback_data'=>"yasir1"]],
		   [['text'=>"النبأ 🕋",'callback_data'=>"yasir78"],['text'=>"غــافر 🕋",'callback_data'=>"yasir40"],['text'=>"البقــرة 🕌",'callback_data'=>"yasir2"]],
		   [['text'=>"النازعات 🕋",'callback_data'=>"yasir79"],['text'=>"فصـلت 🕋",'callback_data'=>"yasir41"],['text'=>"آلﻋــمران 🕌",'callback_data'=>"yasir3"]],
		   [['text'=>"عبـس 🕋",'callback_data'=>"yasir80"],['text'=>"الشــورﻯ 🕋",'callback_data'=>"yasir42"],['text'=>"النســاء 🕌",'callback_data'=>"yasir4"]],
		   [['text'=>"التكوير 🕋",'callback_data'=>"yasir81"],['text'=>"الزخـرف 🕋",'callback_data'=>"yasir43"],['text'=>"المــائدة 🕌",'callback_data'=>"yasir5"]],
		   [['text'=>"الانفطار 🕋",'callback_data'=>"yasir82"],['text'=>"الدخان 🕋",'callback_data'=>"yasir44"],['text'=>"الأنعــام 🕋",'callback_data'=>"yasir6"]],
		   [['text'=>"المطففين 🕋",'callback_data'=>"yasir83"],['text'=>"الجاثية 🕋",'callback_data'=>"yasir45"],['text'=>"الأعــراف 🕋",'callback_data'=>"yasir7"]],
		   [['text'=>"الانشقاق 🕋",'callback_data'=>"yasir84"],['text'=>"الأحقاف 🕋",'callback_data'=>"yasir46"],['text'=>"الأنفــال 🕌",'callback_data'=>"yasir8"]],
		   [['text'=>"البروج 🕋",'callback_data'=>"yasir85"],['text'=>"محــمد 🕌",'callback_data'=>"yasir47"],['text'=>"التوبــه 🕌",'callback_data'=>"yasir9"]],
		   [['text'=>"الطارق 🕋",'callback_data'=>"yasir86"],['text'=>"الفتــح 🕌",'callback_data'=>"yasir48"],['text'=>"يونـس 🕋",'callback_data'=>"yasir10"]],
		   [['text'=>"الأعلى 🕋",'callback_data'=>"yasir87"],['text'=>"الحجرات 🕌",'callback_data'=>"yasir49"],['text'=>"هــود 🕋",'callback_data'=>"yasir11"]],
		   [['text'=>"الغاشية 🕋",'callback_data'=>"yasir88"],['text'=>"ق 🕋",'callback_data'=>"yasir50"],['text'=>"يوسـف 🕋",'callback_data'=>"yasir12"]],
		   [['text'=>"الفجـر 🕋",'callback_data'=>"yasir89"],['text'=>"الذاريات 🕋",'callback_data'=>"yasir51"],['text'=>"الرعــد 🕌",'callback_data'=>"yasir13"]],
		   [['text'=>"البلـد 🕋",'callback_data'=>"yasir90"],['text'=>"الطـور 🕋",'callback_data'=>"yasir52"],['text'=>"إبراهيــم 🕋",'callback_data'=>"yasir14"]],
		   [['text'=>"الشمـس 🕋",'callback_data'=>"yasir91"],['text'=>"النـجم 🕋",'callback_data'=>"yasir53"],['text'=>"الحجــر 🕋",'callback_data'=>"yasir15"]],
		   [['text'=>"الليـل 🕋",'callback_data'=>"yasir92"],['text'=>"القمـر 🕋",'callback_data'=>"yasir54"],['text'=>"النحــل 🕋",'callback_data'=>"yasir16"]],
		   [['text'=>"الضحـى 🕋",'callback_data'=>"yasir93"],['text'=>"الرحمـن 🕌",'callback_data'=>"yasir55"],['text'=>"الإسـراء 🕋",'callback_data'=>"yasir17"]],
		   [['text'=>"الشـرح 🕋",'callback_data'=>"yasir94"],['text'=>"الواقعة 🕌",'callback_data'=>"yasir56"],['text'=>"الكهـف 🕋",'callback_data'=>"yasir18"]],
		   [['text'=>"التيـن 🕋",'callback_data'=>"yasir95"],['text'=>"الحــديد 🕌",'callback_data'=>"yasir57"],['text'=>"مريــم 🕋 🕋",'callback_data'=>"yasir19"]],
		   [['text'=>"التالي↪️",'callback_data'=>"yasirn"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# yaser 1
	if($data =="yasirn"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: ياسر الدوسري -
- الروايه: حفص عن عاصم -
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
		   [['text'=>"العلـق 🕋",'callback_data'=>"yasir96"],['text'=>"المجادلة 🕌",'callback_data'=>"yasir58"],['text'=>"طــه 🕋",'callback_data'=>"yasir20"]],
		   [['text'=>"القـدر 🕋",'callback_data'=>"yasir97"],['text'=>"الحــشر 🕌",'callback_data'=>"yasir59"],['text'=>"الأنبيــاء 🕋",'callback_data'=>"yasir21"]],
		   [['text'=>"البينـة 🕌",'callback_data'=>"yasir98"],['text'=>"الممتحنــة 🕌",'callback_data'=>"yasir60"],['text'=>"الحــج 🕌 🕌",'callback_data'=>"yasir22"]],
		   [['text'=>"الزلزلة 🕌",'callback_data'=>"yasir99"],['text'=>"الصــف 🕌",'callback_data'=>"yasir61"],['text'=>"المؤمنـون 🕋",'callback_data'=>"yasir23"]],
		   [['text'=>"العاديات 🕋",'callback_data'=>"yasir100"],['text'=>"الجمعــة 🕌",'callback_data'=>"yasir62"],['text'=>"النــور 🕌",'callback_data'=>"yasir24"]],
		   [['text'=>"القارعة 🕋",'callback_data'=>"yasir101"],['text'=>"المناقــون 🕌",'callback_data'=>"yasir63"],['text'=>"الفــرقان 🕋",'callback_data'=>"yasir25"]],
		   [['text'=>"التكاثر 🕋",'callback_data'=>"yasir102"],['text'=>"التغـابن 🕌",'callback_data'=>"yasir64"],['text'=>"الشعــراء 🕋",'callback_data'=>"yasir26"]],
		   [['text'=>"العصـر 🕋",'callback_data'=>"yasir103"],['text'=>"الطــلاق 🕌",'callback_data'=>"yasir65"],['text'=>"النــمل 🕋",'callback_data'=>"yasir27"]],
		   [['text'=>"الهمـزة 🕋",'callback_data'=>"yasir104"],['text'=>"التحــريم 🕌",'callback_data'=>"yasir66"],['text'=>"القصص 🕋",'callback_data'=>"yasir28"]],
		   [['text'=>"الفيـل 🕋",'callback_data'=>"yasir105"],['text'=>"الملك 🕋",'callback_data'=>"yasir67"],['text'=>"العـنكبوت 🕋",'callback_data'=>"yasir29"]],
		   [['text'=>"قريـش 🕋",'callback_data'=>"yasir106"],['text'=>"القلم 🕋",'callback_data'=>"yasir68"],['text'=>"الــروم 🕋",'callback_data'=>"yasir30"]],
		   [['text'=>"الماعـون 🕋",'callback_data'=>"yasir107"],['text'=>"الحاقة 🕋",'callback_data'=>"yasir69"],['text'=>"لقــمان 🕋",'callback_data'=>"yasir31"]],
		   [['text'=>"الكـوثر 🕋",'callback_data'=>"yasir108"],['text'=>"المعارج 🕋",'callback_data'=>"yasir70"],['text'=>"السجـدة 🕋",'callback_data'=>"yasir32"]],
		   [['text'=>"الكافـرون 🕋",'callback_data'=>"yasir109"],['text'=>"نـوح 🕋",'callback_data'=>"yasir71"],['text'=>"الأحـزاب 🕌",'callback_data'=>"yasir33"]],
		   [['text'=>"النـصر 🕌",'callback_data'=>"yasir110"],['text'=>"الجـن 🕋",'callback_data'=>"yasir72"],['text'=>"سبـأ 🕋 ",'callback_data'=>"yasir34"]],
		   [['text'=>"المسـد 🕋",'callback_data'=>"yasir111"],['text'=>"المزمل 🕋",'callback_data'=>"yasir73"],['text'=>"فـاطـر 🕋",'callback_data'=>"yasir35"]],
		   [['text'=>"الأخلاص 🕋",'callback_data'=>"yasir112"],['text'=>"المدثر 🕋",'callback_data'=>"yasir74"],['text'=>"يــس 🕋",'callback_data'=>"yasir36"]],
		   [['text'=>"الفلـق 🕋",'callback_data'=>"yasir113"],['text'=>"القيامة 🕋",'callback_data'=>"yasir75"],['text'=>"الصـافات 🕋",'callback_data'=>"yasir37"]],
		   [['text'=>"النـاس 🕋",'callback_data'=>"yasir114"],['text'=>"الأنسان 🕌",'callback_data'=>"yasir76"],['text'=>"ص 🕋",'callback_data'=>"yasir38"]],
		   [['text'=>"↩️السابق",'callback_data'=>"yasir"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# asudes
	if($data =="sds"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: عبدالرحمن السديس -
- الروايه: حفص عن عاصم -
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المرسلات 🕋",'callback_data'=>"sds77"],['text'=>"الزمــر 🕋",'callback_data'=>"sds39"],['text'=>"الفاتحة 🕋",'callback_data'=>"sds1"]],
		   [['text'=>"النبأ 🕋",'callback_data'=>"sds78"],['text'=>"غــافر 🕋",'callback_data'=>"sds40"],['text'=>"البقــرة 🕌",'callback_data'=>"sds2"]],
		   [['text'=>"النازعات 🕋",'callback_data'=>"sds79"],['text'=>"فصـلت 🕋",'callback_data'=>"sds41"],['text'=>"آلﻋــمران 🕌",'callback_data'=>"sds3"]],
		   [['text'=>"عبـس 🕋",'callback_data'=>"sds80"],['text'=>"الشــورﻯ 🕋",'callback_data'=>"sds42"],['text'=>"النســاء 🕌",'callback_data'=>"sds4"]],
		   [['text'=>"التكوير 🕋",'callback_data'=>"sds81"],['text'=>"الزخـرف 🕋",'callback_data'=>"sds43"],['text'=>"المــائدة 🕌",'callback_data'=>"sds5"]],
		   [['text'=>"الانفطار 🕋",'callback_data'=>"sds82"],['text'=>"الدخان 🕋",'callback_data'=>"sds44"],['text'=>"الأنعــام 🕋",'callback_data'=>"sds6"]],
		   [['text'=>"المطففين 🕋",'callback_data'=>"sds83"],['text'=>"الجاثية 🕋",'callback_data'=>"sds45"],['text'=>"الأعــراف 🕋",'callback_data'=>"sds7"]],
		   [['text'=>"الانشقاق 🕋",'callback_data'=>"sds84"],['text'=>"الأحقاف 🕋",'callback_data'=>"sds46"],['text'=>"الأنفــال 🕌",'callback_data'=>"sds8"]],
		   [['text'=>"البروج 🕋",'callback_data'=>"sds85"],['text'=>"محــمد 🕌",'callback_data'=>"sds47"],['text'=>"التوبــه 🕌",'callback_data'=>"sds9"]],
		   [['text'=>"الطارق 🕋",'callback_data'=>"sds86"],['text'=>"الفتــح 🕌",'callback_data'=>"sds48"],['text'=>"يونـس 🕋",'callback_data'=>"sds10"]],
		   [['text'=>"الأعلى 🕋",'callback_data'=>"sds87"],['text'=>"الحجرات 🕌",'callback_data'=>"sds49"],['text'=>"هــود 🕋",'callback_data'=>"sds11"]],
		   [['text'=>"الغاشية 🕋",'callback_data'=>"sds88"],['text'=>"ق 🕋",'callback_data'=>"sds50"],['text'=>"يوسـف 🕋",'callback_data'=>"sds12"]],
		   [['text'=>"الفجـر 🕋",'callback_data'=>"sds89"],['text'=>"الذاريات 🕋",'callback_data'=>"sds51"],['text'=>"الرعــد 🕌",'callback_data'=>"sds13"]],
		   [['text'=>"البلـد 🕋",'callback_data'=>"sds90"],['text'=>"الطـور 🕋",'callback_data'=>"sds52"],['text'=>"إبراهيــم 🕋",'callback_data'=>"sds14"]],
		   [['text'=>"الشمـس 🕋",'callback_data'=>"sds91"],['text'=>"النـجم 🕋",'callback_data'=>"sds53"],['text'=>"الحجــر 🕋",'callback_data'=>"sds15"]],
		   [['text'=>"الليـل 🕋",'callback_data'=>"sds92"],['text'=>"القمـر 🕋",'callback_data'=>"sds54"],['text'=>"النحــل 🕋",'callback_data'=>"sds16"]],
		   [['text'=>"الضحـى 🕋",'callback_data'=>"sds93"],['text'=>"الرحمـن 🕌",'callback_data'=>"sds55"],['text'=>"الإسـراء 🕋",'callback_data'=>"sds17"]],
		   [['text'=>"الشـرح 🕋",'callback_data'=>"sds94"],['text'=>"الواقعة 🕌",'callback_data'=>"sds56"],['text'=>"الكهـف 🕋",'callback_data'=>"sds18"]],
		   [['text'=>"التيـن 🕋",'callback_data'=>"sds95"],['text'=>"الحــديد 🕌",'callback_data'=>"sds57"],['text'=>"مريــم 🕋 🕋",'callback_data'=>"sds19"]],
		   [['text'=>"التالي↪️",'callback_data'=>"sdsn"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# asudes 1
	if($data =="sdsn"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: عبدالرحمن السديس -
- الروايه: حفص عن عاصم -
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
		   [['text'=>"العلـق 🕋",'callback_data'=>"sds96"],['text'=>"المجادلة 🕌",'callback_data'=>"sds58"],['text'=>"طــه 🕋",'callback_data'=>"sds20"]],
		   [['text'=>"القـدر 🕋",'callback_data'=>"sds97"],['text'=>"الحــشر 🕌",'callback_data'=>"sds59"],['text'=>"الأنبيــاء 🕋",'callback_data'=>"sds21"]],
		   [['text'=>"البينـة 🕌",'callback_data'=>"sds98"],['text'=>"الممتحنــة 🕌",'callback_data'=>"sds60"],['text'=>"الحــج 🕌 🕌",'callback_data'=>"sds22"]],
		   [['text'=>"الزلزلة 🕌",'callback_data'=>"sds99"],['text'=>"الصــف 🕌",'callback_data'=>"sds61"],['text'=>"المؤمنـون 🕋",'callback_data'=>"sds23"]],
		   [['text'=>"العاديات 🕋",'callback_data'=>"sds100"],['text'=>"الجمعــة 🕌",'callback_data'=>"sds62"],['text'=>"النــور 🕌",'callback_data'=>"sds24"]],
		   [['text'=>"القارعة 🕋",'callback_data'=>"sds101"],['text'=>"المناقــون 🕌",'callback_data'=>"sds63"],['text'=>"الفــرقان 🕋",'callback_data'=>"sds25"]],
		   [['text'=>"التكاثر 🕋",'callback_data'=>"sds102"],['text'=>"التغـابن 🕌",'callback_data'=>"sds64"],['text'=>"الشعــراء 🕋",'callback_data'=>"sds26"]],
		   [['text'=>"العصـر 🕋",'callback_data'=>"sds103"],['text'=>"الطــلاق 🕌",'callback_data'=>"sds65"],['text'=>"النــمل 🕋",'callback_data'=>"sds27"]],
		   [['text'=>"الهمـزة 🕋",'callback_data'=>"sds104"],['text'=>"التحــريم 🕌",'callback_data'=>"sds66"],['text'=>"القصص 🕋",'callback_data'=>"sds28"]],
		   [['text'=>"الفيـل 🕋",'callback_data'=>"sds105"],['text'=>"الملك 🕋",'callback_data'=>"sds67"],['text'=>"العـنكبوت 🕋",'callback_data'=>"sds29"]],
		   [['text'=>"قريـش 🕋",'callback_data'=>"sds106"],['text'=>"القلم 🕋",'callback_data'=>"sds68"],['text'=>"الــروم 🕋",'callback_data'=>"sds30"]],
		   [['text'=>"الماعـون 🕋",'callback_data'=>"sds107"],['text'=>"الحاقة 🕋",'callback_data'=>"sds69"],['text'=>"لقــمان 🕋",'callback_data'=>"sds31"]],
		   [['text'=>"الكـوثر 🕋",'callback_data'=>"sds108"],['text'=>"المعارج 🕋",'callback_data'=>"sds70"],['text'=>"السجـدة 🕋",'callback_data'=>"sds32"]],
		   [['text'=>"الكافـرون 🕋",'callback_data'=>"sds109"],['text'=>"نـوح 🕋",'callback_data'=>"sds71"],['text'=>"الأحـزاب 🕌",'callback_data'=>"sds33"]],
		   [['text'=>"النـصر 🕌",'callback_data'=>"sds110"],['text'=>"الجـن 🕋",'callback_data'=>"sds72"],['text'=>"سبـأ 🕋 ",'callback_data'=>"sds34"]],
		   [['text'=>"المسـد 🕋",'callback_data'=>"sds111"],['text'=>"المزمل 🕋",'callback_data'=>"sds73"],['text'=>"فـاطـر 🕋",'callback_data'=>"sds35"]],
		   [['text'=>"الأخلاص 🕋",'callback_data'=>"sds112"],['text'=>"المدثر 🕋",'callback_data'=>"sds74"],['text'=>"يــس 🕋",'callback_data'=>"sds36"]],
		   [['text'=>"الفلـق 🕋",'callback_data'=>"sds113"],['text'=>"القيامة 🕋",'callback_data'=>"sds75"],['text'=>"الصـافات 🕋",'callback_data'=>"sds37"]],
		   [['text'=>"النـاس 🕋",'callback_data'=>"sds114"],['text'=>"الأنسان 🕌",'callback_data'=>"sds76"],['text'=>"ص 🕋",'callback_data'=>"sds38"]],
		   [['text'=>"↩️السابق",'callback_data'=>"sds"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# saad

	if($data =="sad"){
	bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: سعد الغامدي -
- الروايه: حفص عن عاصم -
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المرسلات 🕋",'callback_data'=>"saad77"],['text'=>"الزمــر 🕋",'callback_data'=>"saad39"],['text'=>"الفاتحة 🕋",'callback_data'=>"saad1"]],
		   [['text'=>"النبأ 🕋",'callback_data'=>"saad78"],['text'=>"غــافر 🕋",'callback_data'=>"saad40"],['text'=>"البقــرة 🕌",'callback_data'=>"saad2"]],
		   [['text'=>"النازعات 🕋",'callback_data'=>"saad79"],['text'=>"فصـلت 🕋",'callback_data'=>"saad41"],['text'=>"آلﻋــمران 🕌",'callback_data'=>"saad3"]],
		   [['text'=>"عبـس 🕋",'callback_data'=>"saad80"],['text'=>"الشــورﻯ 🕋",'callback_data'=>"saad42"],['text'=>"النســاء 🕌",'callback_data'=>"saad4"]],
		   [['text'=>"التكوير 🕋",'callback_data'=>"saad81"],['text'=>"الزخـرف 🕋",'callback_data'=>"saad43"],['text'=>"المــائدة 🕌",'callback_data'=>"saad5"]],
		   [['text'=>"الانفطار 🕋",'callback_data'=>"saad82"],['text'=>"الدخان 🕋",'callback_data'=>"saad44"],['text'=>"الأنعــام 🕋",'callback_data'=>"saad6"]],
		   [['text'=>"المطففين 🕋",'callback_data'=>"saad83"],['text'=>"الجاثية 🕋",'callback_data'=>"saad45"],['text'=>"الأعــراف 🕋",'callback_data'=>"saad7"]],
		   [['text'=>"الانشقاق 🕋",'callback_data'=>"saad84"],['text'=>"الأحقاف 🕋",'callback_data'=>"saad46"],['text'=>"الأنفــال 🕌",'callback_data'=>"saad8"]],
		   [['text'=>"البروج 🕋",'callback_data'=>"saad85"],['text'=>"محــمد 🕌",'callback_data'=>"saad47"],['text'=>"التوبــه 🕌",'callback_data'=>"saad9"]],
		   [['text'=>"الطارق 🕋",'callback_data'=>"saad86"],['text'=>"الفتــح 🕌",'callback_data'=>"saad48"],['text'=>"يونـس 🕋",'callback_data'=>"saad10"]],
		   [['text'=>"الأعلى 🕋",'callback_data'=>"saad87"],['text'=>"الحجرات 🕌",'callback_data'=>"saad49"],['text'=>"هــود 🕋",'callback_data'=>"saad11"]],
		   [['text'=>"الغاشية 🕋",'callback_data'=>"saad88"],['text'=>"ق 🕋",'callback_data'=>"saad50"],['text'=>"يوسـف 🕋",'callback_data'=>"saad12"]],
		   [['text'=>"الفجـر 🕋",'callback_data'=>"saad89"],['text'=>"الذاريات 🕋",'callback_data'=>"saad51"],['text'=>"الرعــد 🕌",'callback_data'=>"saad13"]],
		   [['text'=>"البلـد 🕋",'callback_data'=>"saad90"],['text'=>"الطـور 🕋",'callback_data'=>"saad52"],['text'=>"إبراهيــم 🕋",'callback_data'=>"saad14"]],
		   [['text'=>"الشمـس 🕋",'callback_data'=>"saad91"],['text'=>"النـجم 🕋",'callback_data'=>"saad53"],['text'=>"الحجــر 🕋",'callback_data'=>"saad15"]],
		   [['text'=>"الليـل 🕋",'callback_data'=>"saad92"],['text'=>"القمـر 🕋",'callback_data'=>"saad54"],['text'=>"النحــل 🕋",'callback_data'=>"saad16"]],
		   [['text'=>"الضحـى 🕋",'callback_data'=>"saad93"],['text'=>"الرحمـن 🕌",'callback_data'=>"saad55"],['text'=>"الإسـراء 🕋",'callback_data'=>"saad17"]],
		   [['text'=>"الشـرح 🕋",'callback_data'=>"saad94"],['text'=>"الواقعة 🕌",'callback_data'=>"saad56"],['text'=>"الكهـف 🕋",'callback_data'=>"saad18"]],
		   [['text'=>"التيـن 🕋",'callback_data'=>"saad95"],['text'=>"الحــديد 🕌",'callback_data'=>"saad57"],['text'=>"مريــم 🕋 🕋",'callback_data'=>"saad19"]],
		   [['text'=>"التالي↪️",'callback_data'=>"sadn"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# saad next
	if($data =="sadn"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: سعد الغامدي -
- الروايه: حفص عن عاصم -
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
		   [['text'=>"العلـق 🕋",'callback_data'=>"saad96"],['text'=>"المجادلة 🕌",'callback_data'=>"saad58"],['text'=>"طــه 🕋",'callback_data'=>"saad20"]],
		   [['text'=>"القـدر 🕋",'callback_data'=>"saad97"],['text'=>"الحــشر 🕌",'callback_data'=>"saad59"],['text'=>"الأنبيــاء 🕋",'callback_data'=>"saad21"]],
		   [['text'=>"البينـة 🕌",'callback_data'=>"saad98"],['text'=>"الممتحنــة 🕌",'callback_data'=>"saad60"],['text'=>"الحــج 🕌 🕌",'callback_data'=>"saad22"]],
		   [['text'=>"الزلزلة 🕌",'callback_data'=>"saad99"],['text'=>"الصــف 🕌",'callback_data'=>"saad61"],['text'=>"المؤمنـون 🕋",'callback_data'=>"saad23"]],
		   [['text'=>"العاديات 🕋",'callback_data'=>"saad100"],['text'=>"الجمعــة 🕌",'callback_data'=>"saad62"],['text'=>"النــور 🕌",'callback_data'=>"saad24"]],
		   [['text'=>"القارعة 🕋",'callback_data'=>"saad101"],['text'=>"المناقــون 🕌",'callback_data'=>"saad63"],['text'=>"الفــرقان 🕋",'callback_data'=>"saad25"]],
		   [['text'=>"التكاثر 🕋",'callback_data'=>"saad102"],['text'=>"التغـابن 🕌",'callback_data'=>"saad64"],['text'=>"الشعــراء 🕋",'callback_data'=>"saad26"]],
		   [['text'=>"العصـر 🕋",'callback_data'=>"saad103"],['text'=>"الطــلاق 🕌",'callback_data'=>"saad65"],['text'=>"النــمل 🕋",'callback_data'=>"saad27"]],
		   [['text'=>"الهمـزة 🕋",'callback_data'=>"saad104"],['text'=>"التحــريم 🕌",'callback_data'=>"saad66"],['text'=>"القصص 🕋",'callback_data'=>"saad28"]],
		   [['text'=>"الفيـل 🕋",'callback_data'=>"saad105"],['text'=>"الملك 🕋",'callback_data'=>"saad67"],['text'=>"العـنكبوت 🕋",'callback_data'=>"saad29"]],
		   [['text'=>"قريـش 🕋",'callback_data'=>"saad106"],['text'=>"القلم 🕋",'callback_data'=>"saad68"],['text'=>"الــروم 🕋",'callback_data'=>"saad30"]],
		   [['text'=>"الماعـون 🕋",'callback_data'=>"saad107"],['text'=>"الحاقة 🕋",'callback_data'=>"saad69"],['text'=>"لقــمان 🕋",'callback_data'=>"saad31"]],
		   [['text'=>"الكـوثر 🕋",'callback_data'=>"saad108"],['text'=>"المعارج 🕋",'callback_data'=>"saad70"],['text'=>"السجـدة 🕋",'callback_data'=>"saad32"]],
		   [['text'=>"الكافـرون 🕋",'callback_data'=>"saad109"],['text'=>"نـوح 🕋",'callback_data'=>"saad71"],['text'=>"الأحـزاب 🕌",'callback_data'=>"saad33"]],
		   [['text'=>"النـصر 🕌",'callback_data'=>"saad110"],['text'=>"الجـن 🕋",'callback_data'=>"saad72"],['text'=>"سبـأ 🕋 ",'callback_data'=>"saad34"]],
		   [['text'=>"المسـد 🕋",'callback_data'=>"saad111"],['text'=>"المزمل 🕋",'callback_data'=>"saad73"],['text'=>"فـاطـر 🕋",'callback_data'=>"saad35"]],
		   [['text'=>"الأخلاص 🕋",'callback_data'=>"saad112"],['text'=>"المدثر 🕋",'callback_data'=>"saad74"],['text'=>"يــس 🕋",'callback_data'=>"saad36"]],
		   [['text'=>"الفلـق 🕋",'callback_data'=>"saad113"],['text'=>"القيامة 🕋",'callback_data'=>"saad75"],['text'=>"الصـافات 🕋",'callback_data'=>"saad37"]],
		   [['text'=>"النـاس 🕋",'callback_data'=>"saad114"],['text'=>"الأنسان 🕌",'callback_data'=>"saad76"],['text'=>"ص 🕋",'callback_data'=>"saad38"]],
		   [['text'=>"↩️السابق",'callback_data'=>"sad"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# mahir
	if($data =="mahir"){
	bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: ماهر المعيقلي-
- الروايه: حفص عن عاصم -
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المرسلات 🕋",'callback_data'=>"mahir77"],['text'=>"الزمــر 🕋",'callback_data'=>"mahir39"],['text'=>"الفاتحة 🕋",'callback_data'=>"mahir1"]],
		   [['text'=>"النبأ 🕋",'callback_data'=>"mahir78"],['text'=>"غــافر 🕋",'callback_data'=>"mahir40"],['text'=>"البقــرة 🕌",'callback_data'=>"mahir2"]],
		   [['text'=>"النازعات 🕋",'callback_data'=>"mahir79"],['text'=>"فصـلت 🕋",'callback_data'=>"mahir41"],['text'=>"آلﻋــمران 🕌",'callback_data'=>"mahir3"]],
		   [['text'=>"عبـس 🕋",'callback_data'=>"mahir80"],['text'=>"الشــورﻯ 🕋",'callback_data'=>"mahir42"],['text'=>"النســاء 🕌",'callback_data'=>"mahir4"]],
		   [['text'=>"التكوير 🕋",'callback_data'=>"mahir81"],['text'=>"الزخـرف 🕋",'callback_data'=>"mahir43"],['text'=>"المــائدة 🕌",'callback_data'=>"mahir5"]],
		   [['text'=>"الانفطار 🕋",'callback_data'=>"mahir82"],['text'=>"الدخان 🕋",'callback_data'=>"mahir44"],['text'=>"الأنعــام 🕋",'callback_data'=>"mahir6"]],
		   [['text'=>"المطففين 🕋",'callback_data'=>"mahir83"],['text'=>"الجاثية 🕋",'callback_data'=>"mahir45"],['text'=>"الأعــراف 🕋",'callback_data'=>"mahir7"]],
		   [['text'=>"الانشقاق 🕋",'callback_data'=>"mahir84"],['text'=>"الأحقاف 🕋",'callback_data'=>"mahir46"],['text'=>"الأنفــال 🕌",'callback_data'=>"mahir8"]],
		   [['text'=>"البروج 🕋",'callback_data'=>"mahir85"],['text'=>"محــمد 🕌",'callback_data'=>"mahir47"],['text'=>"التوبــه 🕌",'callback_data'=>"mahir9"]],
		   [['text'=>"الطارق 🕋",'callback_data'=>"mahir86"],['text'=>"الفتــح 🕌",'callback_data'=>"mahir48"],['text'=>"يونـس 🕋",'callback_data'=>"mahir10"]],
		   [['text'=>"الأعلى 🕋",'callback_data'=>"mahir87"],['text'=>"الحجرات 🕌",'callback_data'=>"mahir49"],['text'=>"هــود 🕋",'callback_data'=>"mahir11"]],
		   [['text'=>"الغاشية 🕋",'callback_data'=>"mahir88"],['text'=>"ق 🕋",'callback_data'=>"mahir50"],['text'=>"يوسـف 🕋",'callback_data'=>"mahir12"]],
		   [['text'=>"الفجـر 🕋",'callback_data'=>"mahir89"],['text'=>"الذاريات 🕋",'callback_data'=>"mahir51"],['text'=>"الرعــد 🕌",'callback_data'=>"mahir13"]],
		   [['text'=>"البلـد 🕋",'callback_data'=>"mahir90"],['text'=>"الطـور 🕋",'callback_data'=>"mahir52"],['text'=>"إبراهيــم 🕋",'callback_data'=>"mahir14"]],
		   [['text'=>"الشمـس 🕋",'callback_data'=>"mahir91"],['text'=>"النـجم 🕋",'callback_data'=>"mahir53"],['text'=>"الحجــر 🕋",'callback_data'=>"mahir15"]],
		   [['text'=>"الليـل 🕋",'callback_data'=>"mahir92"],['text'=>"القمـر 🕋",'callback_data'=>"mahir54"],['text'=>"النحــل 🕋",'callback_data'=>"mahir16"]],
		   [['text'=>"الضحـى 🕋",'callback_data'=>"mahir93"],['text'=>"الرحمـن 🕌",'callback_data'=>"mahir55"],['text'=>"الإسـراء 🕋",'callback_data'=>"mahir17"]],
		   [['text'=>"الشـرح 🕋",'callback_data'=>"mahir94"],['text'=>"الواقعة 🕌",'callback_data'=>"mahir56"],['text'=>"الكهـف 🕋",'callback_data'=>"mahir18"]],
		   [['text'=>"التيـن 🕋",'callback_data'=>"mahir95"],['text'=>"الحــديد 🕌",'callback_data'=>"mahir57"],['text'=>"مريــم 🕋 🕋",'callback_data'=>"mahir19"]],
		   [['text'=>"التالي↪️",'callback_data'=>"mahirn"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# mahir next
	if($data =="mahirn"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: ماهر المعيقلي-
- الروايه: حفص عن عاصم -
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
		   [['text'=>"العلـق 🕋",'callback_data'=>"mahir96"],['text'=>"المجادلة 🕌",'callback_data'=>"mahir58"],['text'=>"طــه 🕋",'callback_data'=>"mahir20"]],
		   [['text'=>"القـدر 🕋",'callback_data'=>"mahir97"],['text'=>"الحــشر 🕌",'callback_data'=>"mahir59"],['text'=>"الأنبيــاء 🕋",'callback_data'=>"mahir21"]],
		   [['text'=>"البينـة 🕌",'callback_data'=>"mahir98"],['text'=>"الممتحنــة 🕌",'callback_data'=>"mahir60"],['text'=>"الحــج 🕌 🕌",'callback_data'=>"mahir22"]],
		   [['text'=>"الزلزلة 🕌",'callback_data'=>"mahir99"],['text'=>"الصــف 🕌",'callback_data'=>"mahir61"],['text'=>"المؤمنـون 🕋",'callback_data'=>"mahir23"]],
		   [['text'=>"العاديات 🕋",'callback_data'=>"mahir100"],['text'=>"الجمعــة 🕌",'callback_data'=>"mahir62"],['text'=>"النــور 🕌",'callback_data'=>"mahir24"]],
		   [['text'=>"القارعة 🕋",'callback_data'=>"mahir101"],['text'=>"المناقــون 🕌",'callback_data'=>"mahir63"],['text'=>"الفــرقان 🕋",'callback_data'=>"mahir25"]],
		   [['text'=>"التكاثر 🕋",'callback_data'=>"mahir102"],['text'=>"التغـابن 🕌",'callback_data'=>"mahir64"],['text'=>"الشعــراء 🕋",'callback_data'=>"mahir26"]],
		   [['text'=>"العصـر 🕋",'callback_data'=>"mahir103"],['text'=>"الطــلاق 🕌",'callback_data'=>"mahir65"],['text'=>"النــمل 🕋",'callback_data'=>"mahir27"]],
		   [['text'=>"الهمـزة 🕋",'callback_data'=>"mahir104"],['text'=>"التحــريم 🕌",'callback_data'=>"mahir66"],['text'=>"القصص 🕋",'callback_data'=>"mahir28"]],
		   [['text'=>"الفيـل 🕋",'callback_data'=>"mahir105"],['text'=>"الملك 🕋",'callback_data'=>"mahir67"],['text'=>"العـنكبوت 🕋",'callback_data'=>"mahir29"]],
		   [['text'=>"قريـش 🕋",'callback_data'=>"mahir106"],['text'=>"القلم 🕋",'callback_data'=>"mahir68"],['text'=>"الــروم 🕋",'callback_data'=>"mahir30"]],
		   [['text'=>"الماعـون 🕋",'callback_data'=>"mahir107"],['text'=>"الحاقة 🕋",'callback_data'=>"mahir69"],['text'=>"لقــمان 🕋",'callback_data'=>"mahir31"]],
		   [['text'=>"الكـوثر 🕋",'callback_data'=>"mahir108"],['text'=>"المعارج 🕋",'callback_data'=>"mahir70"],['text'=>"السجـدة 🕋",'callback_data'=>"mahir32"]],
		   [['text'=>"الكافـرون 🕋",'callback_data'=>"mahir109"],['text'=>"نـوح 🕋",'callback_data'=>"mahir71"],['text'=>"الأحـزاب 🕌",'callback_data'=>"mahir33"]],
		   [['text'=>"النـصر 🕌",'callback_data'=>"mahir110"],['text'=>"الجـن 🕋",'callback_data'=>"mahir72"],['text'=>"سبـأ 🕋 ",'callback_data'=>"mahir34"]],
		   [['text'=>"المسـد 🕋",'callback_data'=>"mahir111"],['text'=>"المزمل 🕋",'callback_data'=>"mahir73"],['text'=>"فـاطـر 🕋",'callback_data'=>"mahir35"]],
		   [['text'=>"الأخلاص 🕋",'callback_data'=>"mahir112"],['text'=>"المدثر 🕋",'callback_data'=>"mahir74"],['text'=>"يــس 🕋",'callback_data'=>"mahir36"]],
		   [['text'=>"الفلـق 🕋",'callback_data'=>"mahir113"],['text'=>"القيامة 🕋",'callback_data'=>"mahir75"],['text'=>"الصـافات 🕋",'callback_data'=>"mahir37"]],
		   [['text'=>"النـاس 🕋",'callback_data'=>"mahir114"],['text'=>"الأنسان 🕌",'callback_data'=>"mahir76"],['text'=>"ص 🕋",'callback_data'=>"mahir38"]],
		   [['text'=>"↩️السابق",'callback_data'=>"mahir"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# abdelbasit
	if($data =="smd"){
	bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: عبدالباسط عبدالصمد-
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المرسلات 🕋",'callback_data'=>"smd77"],['text'=>"الزمــر 🕋",'callback_data'=>"smd39"],['text'=>"الفاتحة 🕋",'callback_data'=>"smd1"]],
		   [['text'=>"النبأ 🕋",'callback_data'=>"smd78"],['text'=>"غــافر 🕋",'callback_data'=>"smd40"],['text'=>"البقــرة 🕌",'callback_data'=>"smd2"]],
		   [['text'=>"النازعات 🕋",'callback_data'=>"smd79"],['text'=>"فصـلت 🕋",'callback_data'=>"smd41"],['text'=>"آلﻋــمران 🕌",'callback_data'=>"smd3"]],
		   [['text'=>"عبـس 🕋",'callback_data'=>"smd80"],['text'=>"الشــورﻯ 🕋",'callback_data'=>"smd42"],['text'=>"النســاء 🕌",'callback_data'=>"smd4"]],
		   [['text'=>"التكوير 🕋",'callback_data'=>"smd81"],['text'=>"الزخـرف 🕋",'callback_data'=>"smd43"],['text'=>"المــائدة 🕌",'callback_data'=>"smd5"]],
		   [['text'=>"الانفطار 🕋",'callback_data'=>"smd82"],['text'=>"الدخان 🕋",'callback_data'=>"smd44"],['text'=>"الأنعــام 🕋",'callback_data'=>"smd6"]],
		   [['text'=>"المطففين 🕋",'callback_data'=>"smd83"],['text'=>"الجاثية 🕋",'callback_data'=>"smd45"],['text'=>"الأعــراف 🕋",'callback_data'=>"smd7"]],
		   [['text'=>"الانشقاق 🕋",'callback_data'=>"smd84"],['text'=>"الأحقاف 🕋",'callback_data'=>"smd46"],['text'=>"الأنفــال 🕌",'callback_data'=>"smd8"]],
		   [['text'=>"البروج 🕋",'callback_data'=>"smd85"],['text'=>"محــمد 🕌",'callback_data'=>"smd47"],['text'=>"التوبــه 🕌",'callback_data'=>"smd9"]],
		   [['text'=>"الطارق 🕋",'callback_data'=>"smd86"],['text'=>"الفتــح 🕌",'callback_data'=>"smd48"],['text'=>"يونـس 🕋",'callback_data'=>"smd10"]],
		   [['text'=>"الأعلى 🕋",'callback_data'=>"smd87"],['text'=>"الحجرات 🕌",'callback_data'=>"smd49"],['text'=>"هــود 🕋",'callback_data'=>"smd11"]],
		   [['text'=>"الغاشية 🕋",'callback_data'=>"smd88"],['text'=>"ق 🕋",'callback_data'=>"smd50"],['text'=>"يوسـف 🕋",'callback_data'=>"smd12"]],
		   [['text'=>"الفجـر 🕋",'callback_data'=>"smd89"],['text'=>"الذاريات 🕋",'callback_data'=>"smd51"],['text'=>"الرعــد 🕌",'callback_data'=>"smd13"]],
		   [['text'=>"البلـد 🕋",'callback_data'=>"smd90"],['text'=>"الطـور 🕋",'callback_data'=>"smd52"],['text'=>"إبراهيــم 🕋",'callback_data'=>"smd14"]],
		   [['text'=>"الشمـس 🕋",'callback_data'=>"smd91"],['text'=>"النـجم 🕋",'callback_data'=>"smd53"],['text'=>"الحجــر 🕋",'callback_data'=>"smd15"]],
		   [['text'=>"الليـل 🕋",'callback_data'=>"smd92"],['text'=>"القمـر 🕋",'callback_data'=>"smd54"],['text'=>"النحــل 🕋",'callback_data'=>"smd16"]],
		   [['text'=>"الضحـى 🕋",'callback_data'=>"smd93"],['text'=>"الرحمـن 🕌",'callback_data'=>"smd55"],['text'=>"الإسـراء 🕋",'callback_data'=>"smd17"]],
		   [['text'=>"الشـرح 🕋",'callback_data'=>"smd94"],['text'=>"الواقعة 🕌",'callback_data'=>"smd56"],['text'=>"الكهـف 🕋",'callback_data'=>"smd18"]],
		   [['text'=>"التيـن 🕋",'callback_data'=>"smd95"],['text'=>"الحــديد 🕌",'callback_data'=>"smd57"],['text'=>"مريــم 🕋 🕋",'callback_data'=>"smd19"]],
		   [['text'=>"التالي↪️",'callback_data'=>"smdn"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# abdelbasit next
	if($data =="smdn"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: عبدالباسط عبدالصمد-
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
		   [['text'=>"العلـق 🕋",'callback_data'=>"smd96"],['text'=>"المجادلة 🕌",'callback_data'=>"smd58"],['text'=>"طــه 🕋",'callback_data'=>"smd20"]],
		   [['text'=>"القـدر 🕋",'callback_data'=>"smd97"],['text'=>"الحــشر 🕌",'callback_data'=>"smd59"],['text'=>"الأنبيــاء 🕋",'callback_data'=>"smd21"]],
		   [['text'=>"البينـة 🕌",'callback_data'=>"smd98"],['text'=>"الممتحنــة 🕌",'callback_data'=>"smd60"],['text'=>"الحــج 🕌 🕌",'callback_data'=>"smd22"]],
		   [['text'=>"الزلزلة 🕌",'callback_data'=>"smd99"],['text'=>"الصــف 🕌",'callback_data'=>"smd61"],['text'=>"المؤمنـون 🕋",'callback_data'=>"smd23"]],
		   [['text'=>"العاديات 🕋",'callback_data'=>"smd100"],['text'=>"الجمعــة 🕌",'callback_data'=>"smd62"],['text'=>"النــور 🕌",'callback_data'=>"smd24"]],
		   [['text'=>"القارعة 🕋",'callback_data'=>"smd101"],['text'=>"المناقــون 🕌",'callback_data'=>"smd63"],['text'=>"الفــرقان 🕋",'callback_data'=>"smd25"]],
		   [['text'=>"التكاثر 🕋",'callback_data'=>"smd102"],['text'=>"التغـابن 🕌",'callback_data'=>"smd64"],['text'=>"الشعــراء 🕋",'callback_data'=>"smd26"]],
		   [['text'=>"العصـر 🕋",'callback_data'=>"smd103"],['text'=>"الطــلاق 🕌",'callback_data'=>"smd65"],['text'=>"النــمل 🕋",'callback_data'=>"smd27"]],
		   [['text'=>"الهمـزة 🕋",'callback_data'=>"smd104"],['text'=>"التحــريم 🕌",'callback_data'=>"smd66"],['text'=>"القصص 🕋",'callback_data'=>"smd28"]],
		   [['text'=>"الفيـل 🕋",'callback_data'=>"smd105"],['text'=>"الملك 🕋",'callback_data'=>"smd67"],['text'=>"العـنكبوت 🕋",'callback_data'=>"smd29"]],
		   [['text'=>"قريـش 🕋",'callback_data'=>"smd106"],['text'=>"القلم 🕋",'callback_data'=>"smd68"],['text'=>"الــروم 🕋",'callback_data'=>"smd30"]],
		   [['text'=>"الماعـون 🕋",'callback_data'=>"smd107"],['text'=>"الحاقة 🕋",'callback_data'=>"smd69"],['text'=>"لقــمان 🕋",'callback_data'=>"smd31"]],
		   [['text'=>"الكـوثر 🕋",'callback_data'=>"smd108"],['text'=>"المعارج 🕋",'callback_data'=>"smd70"],['text'=>"السجـدة 🕋",'callback_data'=>"smd32"]],
		   [['text'=>"الكافـرون 🕋",'callback_data'=>"smd109"],['text'=>"نـوح 🕋",'callback_data'=>"smd71"],['text'=>"الأحـزاب 🕌",'callback_data'=>"smd33"]],
		   [['text'=>"النـصر 🕌",'callback_data'=>"smd110"],['text'=>"الجـن 🕋",'callback_data'=>"smd72"],['text'=>"سبـأ 🕋 ",'callback_data'=>"smd34"]],
		   [['text'=>"المسـد 🕋",'callback_data'=>"smd111"],['text'=>"المزمل 🕋",'callback_data'=>"smd73"],['text'=>"فـاطـر 🕋",'callback_data'=>"smd35"]],
		   [['text'=>"الأخلاص 🕋",'callback_data'=>"smd112"],['text'=>"المدثر 🕋",'callback_data'=>"smd74"],['text'=>"يــس 🕋",'callback_data'=>"smd36"]],
		   [['text'=>"الفلـق 🕋",'callback_data'=>"smd113"],['text'=>"القيامة 🕋",'callback_data'=>"smd75"],['text'=>"الصـافات 🕋",'callback_data'=>"smd37"]],
		   [['text'=>"النـاس 🕋",'callback_data'=>"smd114"],['text'=>"الأنسان 🕌",'callback_data'=>"smd76"],['text'=>"ص 🕋",'callback_data'=>"smd38"]],
		   [['text'=>"↩️السابق",'callback_data'=>"smd"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# minshay
	if($data =="minshay"){
	bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: محمد صديق المنشاوي، المصحف المعلم مع تردد الاطفال-
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
           [['text'=>"المرسلات 🕋",'callback_data'=>"minshay77"],['text'=>"الزمــر 🕋",'callback_data'=>"minshay39"],['text'=>"الفاتحة 🕋",'callback_data'=>"minshay1"]],
		   [['text'=>"النبأ 🕋",'callback_data'=>"minshay78"],['text'=>"غــافر 🕋",'callback_data'=>"minshay40"],['text'=>"البقــرة 🕌",'callback_data'=>"minshay2"]],
		   [['text'=>"النازعات 🕋",'callback_data'=>"minshay79"],['text'=>"فصـلت 🕋",'callback_data'=>"minshay41"],['text'=>"آلﻋــمران 🕌",'callback_data'=>"minshay3"]],
		   [['text'=>"عبـس 🕋",'callback_data'=>"minshay80"],['text'=>"الشــورﻯ 🕋",'callback_data'=>"minshay42"],['text'=>"النســاء 🕌",'callback_data'=>"minshay4"]],
		   [['text'=>"التكوير 🕋",'callback_data'=>"minshay81"],['text'=>"الزخـرف 🕋",'callback_data'=>"minshay43"],['text'=>"المــائدة 🕌",'callback_data'=>"minshay5"]],
		   [['text'=>"الانفطار 🕋",'callback_data'=>"minshay82"],['text'=>"الدخان 🕋",'callback_data'=>"minshay44"],['text'=>"الأنعــام 🕋",'callback_data'=>"minshay6"]],
		   [['text'=>"المطففين 🕋",'callback_data'=>"minshay83"],['text'=>"الجاثية 🕋",'callback_data'=>"minshay45"],['text'=>"الأعــراف 🕋",'callback_data'=>"minshay7"]],
		   [['text'=>"الانشقاق 🕋",'callback_data'=>"minshay84"],['text'=>"الأحقاف 🕋",'callback_data'=>"minshay46"],['text'=>"الأنفــال 🕌",'callback_data'=>"minshay8"]],
		   [['text'=>"البروج 🕋",'callback_data'=>"minshay85"],['text'=>"محــمد 🕌",'callback_data'=>"minshay47"],['text'=>"التوبــه 🕌",'callback_data'=>"minshay9"]],
		   [['text'=>"الطارق 🕋",'callback_data'=>"minshay86"],['text'=>"الفتــح 🕌",'callback_data'=>"minshay48"],['text'=>"يونـس 🕋",'callback_data'=>"minshay10"]],
		   [['text'=>"الأعلى 🕋",'callback_data'=>"minshay87"],['text'=>"الحجرات 🕌",'callback_data'=>"minshay49"],['text'=>"هــود 🕋",'callback_data'=>"minshay11"]],
		   [['text'=>"الغاشية 🕋",'callback_data'=>"minshay88"],['text'=>"ق 🕋",'callback_data'=>"minshay50"],['text'=>"يوسـف 🕋",'callback_data'=>"minshay12"]],
		   [['text'=>"الفجـر 🕋",'callback_data'=>"minshay89"],['text'=>"الذاريات 🕋",'callback_data'=>"minshay51"],['text'=>"الرعــد 🕌",'callback_data'=>"minshay13"]],
		   [['text'=>"البلـد 🕋",'callback_data'=>"minshay90"],['text'=>"الطـور 🕋",'callback_data'=>"minshay52"],['text'=>"إبراهيــم 🕋",'callback_data'=>"minshay14"]],
		   [['text'=>"الشمـس 🕋",'callback_data'=>"minshay91"],['text'=>"النـجم 🕋",'callback_data'=>"minshay53"],['text'=>"الحجــر 🕋",'callback_data'=>"minshay15"]],
		   [['text'=>"الليـل 🕋",'callback_data'=>"minshay92"],['text'=>"القمـر 🕋",'callback_data'=>"minshay54"],['text'=>"النحــل 🕋",'callback_data'=>"minshay16"]],
		   [['text'=>"الضحـى 🕋",'callback_data'=>"minshay93"],['text'=>"الرحمـن 🕌",'callback_data'=>"minshay55"],['text'=>"الإسـراء 🕋",'callback_data'=>"minshay17"]],
		   [['text'=>"الشـرح 🕋",'callback_data'=>"minshay94"],['text'=>"الواقعة 🕌",'callback_data'=>"minshay56"],['text'=>"الكهـف 🕋",'callback_data'=>"minshay18"]],
		   [['text'=>"التيـن 🕋",'callback_data'=>"minshay95"],['text'=>"الحــديد 🕌",'callback_data'=>"minshay57"],['text'=>"مريــم 🕋 🕋",'callback_data'=>"minshay19"]],
		   [['text'=>"التالي↪️",'callback_data'=>"minshayn"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
	# minshay next
	if($data =="minshayn"){
		bot('editMessageText',[
         'chat_id' =>$chat_id,
         'text' =>"
- ✅فهـرس السور -
- القارئ: محمد صديق المنشاوي، المصحف المعلم مع تردد الاطفال-
- عدد السور :114 -
",
       'disable_web_page_preview'=>'true',
       'parse_mode'=>"MarkDown",
       "message_id"=>$message_id,
         'reply_markup' =>json_encode([
            'inline_keyboard' =>[
		   [['text'=>"العلـق 🕋",'callback_data'=>"minshay96"],['text'=>"المجادلة 🕌",'callback_data'=>"minshay58"],['text'=>"طــه 🕋",'callback_data'=>"minshay20"]],
		   [['text'=>"القـدر 🕋",'callback_data'=>"minshay97"],['text'=>"الحــشر 🕌",'callback_data'=>"minshay59"],['text'=>"الأنبيــاء 🕋",'callback_data'=>"minshay21"]],
		   [['text'=>"البينـة 🕌",'callback_data'=>"minshay98"],['text'=>"الممتحنــة 🕌",'callback_data'=>"minshay60"],['text'=>"الحــج 🕌 🕌",'callback_data'=>"minshay22"]],
		   [['text'=>"الزلزلة 🕌",'callback_data'=>"minshay99"],['text'=>"الصــف 🕌",'callback_data'=>"minshay61"],['text'=>"المؤمنـون 🕋",'callback_data'=>"minshay23"]],
		   [['text'=>"العاديات 🕋",'callback_data'=>"minshay100"],['text'=>"الجمعــة 🕌",'callback_data'=>"minshay62"],['text'=>"النــور 🕌",'callback_data'=>"minshay24"]],
		   [['text'=>"القارعة 🕋",'callback_data'=>"minshay101"],['text'=>"المناقــون 🕌",'callback_data'=>"minshay63"],['text'=>"الفــرقان 🕋",'callback_data'=>"minshay25"]],
		   [['text'=>"التكاثر 🕋",'callback_data'=>"minshay102"],['text'=>"التغـابن 🕌",'callback_data'=>"minshay64"],['text'=>"الشعــراء 🕋",'callback_data'=>"minshay26"]],
		   [['text'=>"العصـر 🕋",'callback_data'=>"minshay103"],['text'=>"الطــلاق 🕌",'callback_data'=>"minshay65"],['text'=>"النــمل 🕋",'callback_data'=>"minshay27"]],
		   [['text'=>"الهمـزة 🕋",'callback_data'=>"minshay104"],['text'=>"التحــريم 🕌",'callback_data'=>"minshay66"],['text'=>"القصص 🕋",'callback_data'=>"minshay28"]],
		   [['text'=>"الفيـل 🕋",'callback_data'=>"minshay105"],['text'=>"الملك 🕋",'callback_data'=>"minshay67"],['text'=>"العـنكبوت 🕋",'callback_data'=>"minshay29"]],
		   [['text'=>"قريـش 🕋",'callback_data'=>"minshay106"],['text'=>"القلم 🕋",'callback_data'=>"minshay68"],['text'=>"الــروم 🕋",'callback_data'=>"minshay30"]],
		   [['text'=>"الماعـون 🕋",'callback_data'=>"minshay107"],['text'=>"الحاقة 🕋",'callback_data'=>"minshay69"],['text'=>"لقــمان 🕋",'callback_data'=>"minshay31"]],
		   [['text'=>"الكـوثر 🕋",'callback_data'=>"minshay108"],['text'=>"المعارج 🕋",'callback_data'=>"minshay70"],['text'=>"السجـدة 🕋",'callback_data'=>"minshay32"]],
		   [['text'=>"الكافـرون 🕋",'callback_data'=>"minshay109"],['text'=>"نـوح 🕋",'callback_data'=>"minshay71"],['text'=>"الأحـزاب 🕌",'callback_data'=>"minshay33"]],
		   [['text'=>"النـصر 🕌",'callback_data'=>"minshay110"],['text'=>"الجـن 🕋",'callback_data'=>"minshay72"],['text'=>"سبـأ 🕋 ",'callback_data'=>"minshay34"]],
		   [['text'=>"المسـد 🕋",'callback_data'=>"minshay111"],['text'=>"المزمل 🕋",'callback_data'=>"minshay73"],['text'=>"فـاطـر 🕋",'callback_data'=>"minshay35"]],
		   [['text'=>"الأخلاص 🕋",'callback_data'=>"minshay112"],['text'=>"المدثر 🕋",'callback_data'=>"minshay74"],['text'=>"يــس 🕋",'callback_data'=>"minshay36"]],
		   [['text'=>"الفلـق 🕋",'callback_data'=>"minshay113"],['text'=>"القيامة 🕋",'callback_data'=>"minshay75"],['text'=>"الصـافات 🕋",'callback_data'=>"minshay37"]],
		   [['text'=>"النـاس 🕋",'callback_data'=>"minshay114"],['text'=>"الأنسان 🕌",'callback_data'=>"minshay76"],['text'=>"ص 🕋",'callback_data'=>"minshay38"]],
		   [['text'=>"↩️السابق",'callback_data'=>"minshay"],['text' =>"رجوع 🔙",'callback_data'=>"mp3"]],
		   [['text' =>"↩️الصفحه الرئيسيه↪️",'callback_data'=>"main1"]]
                ]
                ])
                ]);
	}
?>