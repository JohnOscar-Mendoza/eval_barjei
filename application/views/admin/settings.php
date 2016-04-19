   <body>

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
                <a class="navbar-brand" href="<?php echo base_url('admin'); ?>"><?php echo $username; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
<!--                     <li>
                        <a href="<?php echo base_url('user/add'); ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('user/view'); ?>">View All</a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url('admin/logout'); ?>">Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
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
                <h3 class="panel-title"><i class="fa fa-gear"></i> Advertisment Settings </h3>
            </div>
            <div class="panel-body">
                <?php

                $email = [
                "name"=>"email",
                "id"=>"email",
                "class"=>"form-control",
                "placeholder"=>"Email"
                ];

                $expiry = [
                "name"=>"expiry",
                "id"=>"expiry",
                "class"=>"form-control",
                "placeholder"=>"HH:mm:ss"
                ];

                echo form_open("admin/setExpiry", ["class"=>"reset-admin", "id"=>"set-expiry"]);
                ?>
                <fieldset>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            echo form_label("No. of hours before password expiry", "class='sr-only'");
                            echo form_input($expiry, set_value("expiry"));
                            ?>
                            <!-- <input type="text" id="datepicker" name="expiry" class="form-control" placeholder="H:i" required> -->
                        </div>
                    </div>
                </fieldset>
                <?php
                echo form_close();
                ?>

                <?php
                echo form_open("admin/resetPassword", ["class"=>"admin-reset", "id"=>"reset-password"]);
                ?>
                <fieldset>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            echo form_label("Reset password of user", "class='sr-only'");
                            echo form_input($email, set_value("email"));
                            ?>
                        </div>
                    </div>
                </fieldset>
                <?php
                echo form_close();
                ?>
                <?php
                echo form_open("admin/setLimit", ["class"=>"admin-limit", "id"=>"set-limit"]);
                ?>
                <fieldset>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            echo form_label("Set Page Limit", "class='sr-only'");
                            ?>
                            <input type="number" name="limit" id="limit" min="0" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <?php
                echo form_close();
                ?>

                <?php
                echo form_open_multipart("admin/upload", ["class"=>"admin-upload"]);
                ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        echo form_label("Upload Ad 1 Here", "class='sr-only'");
                        ?>
                        <input type='file' name="img" id="img">
                        <img id="preview" class="preview" src="" style="display:none">
                    </div>
                    <?php
                    echo form_submit("upload", "Upload", ["class"=>"btn btn-primary"]);
                    ?>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        echo form_label("Upload Ad 2 Here", "class='sr-only'");
                        ?>
                        <input type='file' name="img2" id="img2">
                        <img id="preview2" class="preview" src="" style="display:none">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        echo form_label("Upload Ad 3 Here", "class='sr-only'");
                        ?>
                        <input type='file' name="img3" id="img3">
                        <img id="preview3" class="preview" src="" style="display:none">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <?php
                        echo form_label("Upload Ad 4 Here", "class='sr-only'");
                        ?>
                        <input type='file' name="img4" id="img4">
                        <img id="preview4" class="preview" src="" style="display:none">
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
    <!-- /.container -->