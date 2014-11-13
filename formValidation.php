<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    return;
}
$warning = "";
if ($_POST['fname'] === "") {
    $warning .= 'Empty field for "First name"\n';
}
if ($_POST['lname'] === "") {
    $warning .= 'Empty field for "Last name"\n';
}
if ($_POST['phone'] === "") {
    $warning .= 'Empty field for "Phone number"\n';
}
if ($_POST['email'] === "") {
    $warning .= 'Empty field for "Email address"\n';
}
if ($_POST['loginName'] === "") {
    $warning .= 'Empty field for "Login Name"\n';
}
if ($_POST['passwrd1'] === "") {
    $warning .= 'Empty field for "Choose password"\n';
}
if ($_POST['passwrd2'] === "") {
    $warning .= 'Empty field for "Confirm password"\n';
}
if ($_POST['passwrd1'] !== $_POST['passwrd2']) {
    $warning .= 'Both passwords do not match\n';
}
if (strlen($_POST['passwrd1']) < 8) {
    $warning .= 'Password must be at least 8 characters';
}
if ($warning !== "") {
    return;
} else {
    $file = 'db/members.txt';
    $users = unserialize(file_get_contents($file));
    if (!is_array($users))
        $users = [];

    $users[$_POST['loginName']] = array(
        'passwrd' => $_POST['passwrd1'],
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'additionTotal' => 0,
        'substractionTotal' => 0,
        'multiplicationTotal' => 0,
        'additionScore' => 0,
        'substractionScore' => 0,
        'multiplicationScore' => 0,
        'operationTotal' => 0,
        'scoreTotal' => 0
        );
    file_put_contents($file, serialize($users));
	header('Location: login.php');
    die();
}
?>
