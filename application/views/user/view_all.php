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
                <li>
                    <a href="<?php echo base_url('user/add'); ?>">Add Account</a>
                </li>
                <li class="active">
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
                <h3 class="panel-title"><i class="fa fa-table"></i> Users</h3>
            </div>
            <div class="panel-body">
               <div style="overflow-x:auto;">
                 <table class="table table-bordered table-hover" id="dataTable">
                   <thead>
                      <tr class="tr-users" id="tr-head">
                        <th class="td-users">

                        </th>
                        <th class="td-users">

                        </th>
                    </tr>
                </thead>
                <tbody>

                 <?php
                 foreach ($Data as $user) 
                 {
                    $birthday = date('M j, Y', strtotime($user->birthdate));
                    echo "<tr class='tr-users'>
                    <td id='td-image' class='td-users'>";
                        ?>
                        <img src="<?php echo base_url('uploads/'.$user->image); ?>" alt='avatar' class='img-circle img-responsive img-display' onError="this.onerror=null;this.src='/timelogs/assets/images/avatar.png';">
                        <?php
                        echo "</td>
                        <td class='td-users'>
                            <span class='user-info'> 
                                ".$user->username." 
                                <br> ".$user->email."
                                <br> ".$user->firstName." ".$user->lastName."
                                <br> ".$birthday."
                                <br> ".$user->notes."
                            </span>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>

</div>

