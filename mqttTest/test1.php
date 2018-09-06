<?
error_reporting(E_ALL);
ini_set('display_errors', 1);

// require('vendor/autoload.php');
require ("./phpMQTT.php");


// define 왼쪽을 오른쪽으로 쓰겠다.
define('BROKER', 'm12.cloudmqtt.com'); // cloud mqtt 주소 설정
define('PORT', 13288); // 포트 번호 설정
define('User', 'zqgmlwjg'); // User 이름 설정 (사이트에 있는)
define('Password', 'uQietis53KPr'); // pwd 설정 (사이트에 있는)

define('CLIENT_ID', "pubclient_" + getmypid()); // id 설정

$client = new Mosquitto\Client(CLIENT_ID);
$client->setCredentials(User, Password);
$client->onConnect('connect');
$client->onDisconnect('disconnect');
$client->onSubscribe('subscribe');
$client->onMessage('message');
$client->connect(BROKER, PORT, 60); // 주소, 포트번호, 살아있는 시간
$client->subscribe('#', 1); // 모든 메세지 받기 위함

$client->loopForever();

function connect($r) {
	echo "Received response code {$r}\n";
}

function subscribe() {
	echo "Subscribed to a topic\n";
}

function message($message) {
	printf("Got a message on topic %s with payload:\n%s\n", $message->topic, $message->payload);
}

function disconnect() {
	echo "Disconnected cleanly\n";
}

?>