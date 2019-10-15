<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href="<?php echo base_url('application\views\templates\bootstrap.min.css'); ?>">
    <title>Update</title>
</head>
<body>
<!-- <?php echo validation_errors(); ?> -->

<?php
echo form_open('user/update/'.$post['id']);
?>

<!-- <input type="hidden" value="<?php $post['id'] ?>" name="id"> -->

            <div class="form-group">
                <label for="name">First Name</label>
                <input class="form-control" name="fname" placeholder="Your First Name" type="text" value="<?php echo $post['fname']; ?>" />
                <span class="text-danger"><?php echo form_error('fname'); ?></span>
            </div>

                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo $post['lname']; ?>" />
                    <span class="text-danger"><?php echo form_error('lname'); ?></span>
                </div>

                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo $post['email']; ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Password</label>
                    <input class="form-control" name="password" placeholder="Password" type="password" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Confirm Password</label>
                    <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                </div>

                <div class="form-group">
                    <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
                <?php echo form_close(); ?>     

</body>
</html>

