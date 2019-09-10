<?php
	$content = file_get_contents("php://input");
	$update = json_decode($content, true);

	if(!$update)
	{
		exit;
	}

	$message = isset($update['message']) ? $update['message'] : "";
	$messageId = isset($message['message_id']) ? $message['message_id'] : "";
	$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
	$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
	$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
	$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
	$date = isset($message['date']) ? $message['date'] : "";
	$text = isset($message['text']) ? $message['text'] : "";

	$text = trim($text);
	$text = strtolower($text);
	header("Content-Type: application/json");

	$response = '';

	if(strpos($text, "/acquista") === 0 || strpos($text, "/acquista@AmazonReferralBot")) {
		
		$verbs = [
			"https://www.amazon.it/?tag=gioxx-21",
			"https://amzn.to/2ZISSL7"];

		shuffle($verbs);	
		$response = $verbs[0];
		
	} elseif(strpos($text, "/version") === 0 || strpos($text, "/version@AmazonReferralBot")) {
		
		$response = "#AmznRefBot 0.1 - Per segnalare nuovi referral apri una issue su GitHub: https://github.com/gfscom/amznrefbot/issues";
		
	} else {}

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);