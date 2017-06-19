<?php
require_once('./line_class.php');
$channelAccessToken = 'i2g1ajRXqBIieiy1V0dx2xltyT73roFSiDKoHM4BeUKgd+a4Ik/P+Vp6iON18XQPeWJVRexzGBa6+zijuhSJHZni3cEzafMlihthHrnrpMe5UrNOPAFs7Nsw9mQ/DVtfpns3zVmMc14l8T10LWJn4wdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'c5e8a89066b2822d0815d020ab58e6f5';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$incoming_message = $message['text'];

if($message['type']=='text')
{
	if($incoming_message=='Hello')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Hello '.$profil->displayName.'-sama'
									)
							)
						);
				
	}
	else
	if($incoming_message=='2')
	{
		$get_sub = array();
		$aa =   array(
						'type' => 'image',									
						'originalContentUrl' => 'https://medantechno.com/line/images/bolt/1000.jpg',
						'previewImageUrl' => 'https://medantechno.com/line/images/bolt/240.jpg'	
						
					);
		array_push($get_sub,$aa);	
		$get_sub[] = array(
									'type' => 'text',									
									'text' => 'Halo '.$profil->displayName.', Anda memilih menu 2, harusnya gambar muncul.'
								);
		
		$balas = array(
					'replyToken' 	=> $replyToken,														
					'messages' 		=> $get_sub
				 );	
	}
	else
	if($incoming_message=='3')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Fungsi PHP base64_encode medantechno.com :'. base64_encode("medantechno.com")
									)
							)
						);
				
	}
	else
	if($incoming_message=='4')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Jam Server Saya : '. date('Y-m-d H:i:s')
									)
							)
						);
				
	}
	else
	if($incoming_message=='6')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'location',					
										'title' => 'Lokasi Saya.. Klik Detail',					
										'address' => 'Medan',					
										'latitude' => '3.521892',					
										'longitude' => '98.623596' 
									)
							)
						);
				
	}
	else
	if($incoming_message=='7')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Testing PUSH pesan ke anda'
									)
							)
						);
						
		$push = array(
							'to' => $userId,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Pesan ini dari medantechno.com'
									)
							)
						);
						
		
		$client->pushMessage($push);
				
	}
	else{
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo.. Selamat datang di medantechno.com .        Untuk testing menu pilih 1,2,3,4,5 ... atau stiker'
									)
							)
						);
						
	}
}else if($message['type']=='sticker')
{	
	$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',									
										'text' => 'Terimakasih stikernya... '										
									
									)
							)
						);
						
}
 
$result =  json_encode($balas);
//$result = ob_get_clean();
file_put_contents('./balasan.json',$result);
$client->replyMessage($balas);
