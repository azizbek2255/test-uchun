﻿<?php 

error_reporting(0);

set_time_limit(0);

flush();
$API_KEY = '1307965084:AAFX7xa2PPEK9HZcZDOgMxz_DhoCwEN3Tr8';
define('API_KEY',$API_KEY);
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
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$mybot = "uzjoinbot";
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$username = $update->message->from->username;
$bcpv = file_get_contents("bcpv.txt");
$bcgap = file_get_contents("bcgap.txt");
@mkdir("data/$chat_id");
$azidil = file_get_contents("data/$chat_id/safargul.txt");
@$list = file_get_contents("users.txt");
$channelid = file_get_contents("data/$chat_id/channelid.txt");
$name = $update->message->from->first_name;
$gpname = $update->message->chat->title;
$rt = $update->message->reply_to_message;
$replyid = $update->message->reply_to_message->message_id;
$rtid = $update->message->reply_to_message->from->id;
$data = $update->callback_query->data;
$photo = $update->message->photo;
$forward = $update->message->forward_from;
$video = $update->message->video;
$location = $update->message->location;
$sticker = $update->message->sticker;
$document = $update->message->document;
$contact = $update->message->contact;
$game = $update->message->game;
$music = $update->message->audio;
$gif = $update->message->gif;
$voice = $update->message->voice;
$message_id2 = $update->callback_query->message->message_id;
$messageid = $update->callback_query->message->message_id;
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=@$channelid&user_id=".$from_id)); 
$tch = $forchaneel->result->status;
$type = $update->message->chat->type;
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$info = json_decode($get, true);
$rank = $info['result']['status'];
$reply = $update->message->reply_to_message->message_id;
 $ADMINS = 734436943; 
 $admins = 1157255865;

if ($text == "/start") {
sendaction($chat_id, typing);
        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/safargul.txt");
            file_put_contents('users.txt', $add_user);
        }
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"👋🏻Salom $name
Botimizga xush kelibsiz!
Bu bot kanalizga obuna bo`lmasa,guruhga yozdirmaydi.


<b>📢Kanalimiz</b>
@Texno_Faktlar ",
 'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
[['text' => " Guruhga qo'shish",'url'=>"https://telegram.me/$mybot?startgroup=new"]],
   [['text' => "📣Kanalimiz",'url'=>"https://telegram.me/Texno_Faktlar"]],
    [['text' => "👨💻 Admin",'url'=>"https://telegram.me/Uzbekcoder007"]]
    ]
])
        ]);
 bot('sendmessage', [
                'chat_id' =>'-1001248492501',
                'text' =>"Yangi odam
                
 Nicki:  [$name](tg://user?id=$from_id)
 
  [Foydalanuvchi](tg://user?id=$from_id)
  @Majburiy_RoBot dan roʻyhatdan oʻtdi.
",
 'parse_mode'=>'markdown' ] );
}
if($rank != "creator" && $rank != "administrator"){ 
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
if($type == "supergroup" or $type == "group"){
bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "<a href='tg://user?id=$from_id'>$name</a> Siz @$channelid kanalimizga a'zo bo'lsangizgina,bu guruhda xabar yoza olasiz!",
				'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
    [['text' => "➕A'zo bo'lish",'url'=>"https://telegram.me/$channelid"]],
[['text' => "🤑 Pul Ishlash 🤑",'url'=>"https://telegram.me/LD_ibot?start=813712907"]]
    ]
])
        ]);
    }}
if($text || $photo || $video || $location || $sticker || $document || $contact || $music || $gif || $voice){
if($tch != 'member'){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
  ]);
}
}
}

if($text == "/kanal"){
    if($rank == "creator" or $rank== "administrator"){
sendaction($chat_id, typing);
 file_put_contents("data/$chat_id/safargul.txt","sett");
$channelid = file_get_contents("data/$chat_id/channelid.txt");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"
<b> Shu guruhga qaysi kanalni ulamoqchisiz?
Meni o'sh kanalga super admin qiling va kanalingiz @username sini yuboring @ qo'ymasdan
Namuna </b> @Texno_Faktlar kanalini Texno_Faktlar <b> deb yuborasiz!</b>

📣Kanalimiz @Texno_Faktlar",
 'parse_mode'=>'html']);
} }
if($azidil == "sett"){
    if($rank == "creator" or $rank== "administrator"){
 file_put_contents("data/$chat_id/safargul.txt","none");
 file_put_contents("data/$chat_id/channelid.txt",$text);
     bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"$text <b> Kanaliga a'zo bo'lmaganlar ushbu guruhga yoza olishmaydi😉</b>

📣Kanalimiz: @Texno_Faktlar",
 'parse_mode'=>'html']);
    }}


if ($text == "/panel" && $chat_id == $ADMINS) {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $ADMINS,
            'text' => "Hurmatli @Uzbekcoder007 !
Boshqaruv paneliga xush kelibsiz!",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => "Xabar yuborish", 'callback_data' => "send"]]
                ]
            ])
        ]);
    }     
	elseif ($data == "send") {
        file_put_contents("data/$chatid/safargul.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "📨Endi Xabaringizni Yozing🖊️",
        ]);
    } elseif ($azidil == "send") {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
              bot('sendMessage', [
            'chat_id' => $ckar, 
			 'text' => $text,
				'parse_mode'=>'MarkDown'   ]);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "*Xabaringiz barcha guruh va bot aʼzolariga yuborildi.*",
            'parse_mode'=>"markdown",
            ]);
            }
            if ($text == "/panel" && $chat_id == $admin) {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $admin,
            'text' => "Hurmatli @Uzbekcoder007 !
Boshqaruv paneliga xush kelibsiz!",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => "Xabar yuborish", 'callback_data' => "send"]]
                ]
            ])
        ]);
    }     
	elseif ($data == "send") {
        file_put_contents("data/$chatid/safargul.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "📨Endi Xabaringizni Yozing🖊️",
        ]);
    } elseif ($azidil == "send") {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
              bot('sendMessage', [
            'chat_id' => $ckar, 
			 'text' => $text,
				'parse_mode'=>'MarkDown'   ]);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "*Xabaringiz barcha guruh va bot aʼzolariga yuborildi.*",
            'parse_mode'=>"markdown",
            ]);
            }
?>