#!/usr/local/bin/php
<?

/*

This is a very simple example of an interactive bot using t0xirc.

The script says "hello" when it connects to the bot, and monitors the channel
text and private queries.

It echoes the public channel text to the console, can answer a basic question,
and quits when someone tells him to do in private.

*/

include "t0xirc.php";

function public_txt_handler($nick, $msg) {

	global $mybot;

	if (strpos($msg, "where?")!==false) $mybot->say("$nick: DTC");
	echo "$nick said '$msg'\n";

}

function private_txt_handler($nick, $msg) {

	if ($msg=="quit") exit;

}

function join_handler($nick, $host) {

	global $mybot;

	$mybot->say("hi $nick");

}

$mybot =& new t0xirc_bot("login", "password");
$mybot->register_callback(TCB_PUBMSG, "public_txt_handler");
$mybot->register_callback(TCB_PRIVMSG, "private_txt_handler");
$mybot->register_callback(TCB_JOIN, "join_handler");

$mybot->connect();
$mybot->say("hello world");

echo "connected to ".$mybot->bot_nick.", monitoring ".$mybot->channel["name"].".\n";

$mybot->run();

?>
