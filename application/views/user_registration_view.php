<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter User Registration Form Demo</title>
    <link rel='stylesheet' href="<?php echo base_url('application\views\templates\bootstrap.min.css'); ?>">
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>User Registration Form</h4>
            </div>
            <div class="panel-body">
                <?php $attributes = array("name" => "registrationform");
                echo form_open("user/register", $attributes);?>
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input class="form-control" name="fname" type="text" value="<?php echo set_value('fname'); ?>" />
                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
                </div>

                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input class="form-control" name="lname" type="text" value="<?php echo set_value('lname'); ?>" />
                    <span class="text-danger"><?php echo form_error('lname'); ?></span>
                </div>

                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input class="form-control" name="email" type="text" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Password</label>
                    <input class="form-control" name="password" type="password" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>

                <div class="form-group">
                    <label for="subject">Confirm Password</label>
                    <input class="form-control" name="cpassword" type="password" />
                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-default">Signup</button>
                    <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                </div>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        </div>
    </div>
</div>
<div class=" table table-responsive">
        <table class="table table-boarderd wy-text-center">
            <tr>
                <th>ID</th>
                <th>User First Name</th>
                <th>User last Name</th>
                <th>User Email Address</th>
                <th>User Password(Hashed)</th>
            </tr>
            <?php
                if($fetch_data ->num_rows() > 0){
                    foreach($fetch_data->result() as $row){
                        ?>
                        <tr class="text-center">
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->fname ?></td>
                            <td><?php echo $row->lname ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->password ?></td>
                            <td><a href="<?php echo base_url('user/getdata/').$row->id ?>" class="btn btn-default">Edit</a></td>
                            <?php echo form_open('/user/delete/'.$row->id); ?>
                            <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                            <?php echo form_close(); ?>
                        </tr>
                    <?php
                    }
                }else{
                    ?>
                    <tr>
                        <td>No Data Found</td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>
</html>