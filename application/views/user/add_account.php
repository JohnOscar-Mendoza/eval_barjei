<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $username; ?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?php echo base_url('user/add'); ?>">Add Account</a>
                </li>
                <li>
                    <a href="<?php echo base_url('user/view'); ?>">View All</a>
                </li>
                <li>
                    <a href="<?php echo base_url('user/logout'); ?>">Log Out</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">

          <!-- <div id="ad-first">
            <h2>
                YOUR ADS HERE
            </h2>
        </div> -->

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user-plus"></i> Fill up all fields </h3>
            </div>
            <div class="panel-body">
                <?php

                $firstName = [
                "name"=>"firstName",
                "class"=>"form-control",
                "placeholder"=>"First Name",
                "required"=>"required",
                "autofocus"=>"autofocus"
                ];

                $lastName = [
                "name"=>"lastName",
                "class"=>"form-control",
                "placeholder"=>"Last Name",
                "required"=>"required"
                ];

                $username = [
                "name"=>"username",
                "class"=>"form-control",
                "placeholder"=>"Username",
                "required"=>"required"
                ];

                $password = [
                "name"=>"password",
                "class"=>"form-control",
                "placeholder"=>"Password",
                "required"=>"required"
                ];
                $retype = [
                "name"=>"retype",
                "class"=>"form-control",
                "placeholder"=>"Re-type Password",
                "required"=>"required"
                ];

                $birthdate = [
                "name"=>"birthdate",
                "class"=>"form-control",
                "required"=>"required"
                ];

                $notes = [
                "name"=>"notes",
                "id" => "notes",
                "class"=>"form-control",
                "placeholder"=>"Notes",
                "required"=>"required"
                ];

                echo form_open_multipart("user/addAccount", ["class"=>"add-account"]);
                ?>
                <fieldset>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php
                            echo form_label("First Name", "class='sr-only'");
                            echo form_input($firstName, set_value("firstName"));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label("Last Name", "class='sr-only'");
                            echo form_input($lastName, set_value("lastName"));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php 
                            echo form_label("Birthday", "class='sr-only'");
                            ?>
                            <input type="text" id="datepicker" name="birthdate" class="form-control" placeholder="mm/dd/YYYY" required>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php
                            echo form_label("Image", "class='sr-only'");
                            ?>
                            <!-- <p class='help-block'>Use a square image.</p> -->
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php
                            echo form_label("Email", "class='sr-only'");
                            ?>
                            <input type="email" name="email" class="form-control" placeholder="Email" required> 
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label("Username", "class='sr-only'");
                            echo form_input($username, set_value("username"));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label("Password", "class='sr-only'");
                            echo form_password($password);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label("Re-type Password", "class='sr-only'");
                            echo form_password($retype);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            echo form_label("Notes", "class='sr-only'");
                            echo form_textarea($notes, set_value("notes"));
                            ?>
                        </div>
                    </div>
                </fieldset>
                <div class="col-md-4 col-md-offset-8">
                    <div class="btn-group">
                        <?php
                        echo form_reset("reset", "Clear", ["class"=>"btn btn-default"]);
                        echo form_submit("submit", "Submit", ["class"=>"btn btn-primary"]);
                        ?>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
</div>
