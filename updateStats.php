<?php
session_start();
$_SESSION[operationTotal]++;
switch ($_POST['op']) {
	case 'add':
		$_SESSION[additionTotal]++;
		incScore($_SESSION[additionScore]);
		break;
	case 'sub':
		$_SESSION[substractionTotal]++;
		incScore($_SESSION[substractionScore]);
		break;
	case 'mul':
		$_SESSION[multiplicationTotal]++;
		incScore($_SESSION[multiplicationScore]);
		break;
}

function incScore(&$score) {
	if ($_POST['correct'] == 'true') {
		$score++;
		$_SESSION['scoreTotal']++;
	}
}
?>
