<!-- <html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter User Registration Form Demo</title>
    <link rel='stylesheet' href="<?php echo base_url('application\views\templates\bootstrap.min.css'); ?>">
</head>

<title>Login Form</title>
<link rel='stylesheet' href="<?php echo base_url('application\views\templates\bootstrap.min.css'); ?>">
</head>
<body>

<?php echo form_open('user_login/user_login_process'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<br><br>
<label>UserName :</label>
<input type="text" name="username" id="name"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password"/><br/><br />
<input type="submit" value="Login" name="submit" class="btn btn-primary"/><br />
<?php echo form_close(); ?>
</div>
</div>
</body>
</html> -->


<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
}
?>
<head>
<title>Login Form</title>
<link rel='stylesheet' href="<?php echo base_url('application\views\templates\bootstrap.min.css'); ?>">

</head>
<body>
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<hr/>
<?php echo form_open('user_login/user_login_process'); ?>
<?php
echo "<div class='alrt wy-alert-neutral'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="Email"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password"/><br/><br />
<input class="btn btn-secondary" type="submit" value=" Login " name="submit"/><br />
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>