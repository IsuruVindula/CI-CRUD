<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: templates/header");
}
?>
<head>
<title>Profile</title>
<link rel='stylesheet' href="<?php echo base_url('application\views\templates\bootstrap.min.css'); ?>">
</head>
<body>
<div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "Welcome to Admin Page";
echo "<br/>";
echo "<br/>";
echo "Your Username is " . $username;
echo "<br/>";
echo "Your Email is " . $email;
echo "<br/>";
?>
<b id="logout"><a href="logout">Logout</a></b>
</div>
<br/>
</body>
</html>