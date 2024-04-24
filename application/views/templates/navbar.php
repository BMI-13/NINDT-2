
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"> 
            <img src="<?php echo $this->config->item('sys_imgs'). 'logo.png'; ?>" alt=""/>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <!-- admin -->
            <?php if($this->session->userdata('user_role') === 'admin') { ?>
                <li class="dropdown  active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Administration  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo site_url('users'); ?>"><span class="glyphicon glyphicon-user" ></span> Users</a></li>
                      <li><a href="<?php echo site_url('user/add'); ?>"><span class="glyphicon glyphicon-plus" ></span> New User</a></li>
                  </ul>
                </li>

            <?php } ?>
            <!-- staff -->
            <?php if($this->session->userdata('user_role') === 'staff') { ?>
                <li class="dropdown active">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Patients  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('patients'); ?>"><span class="glyphicon glyphicon-user" ></span> Patients</a></li>
                    <li><a href="<?php echo site_url('patients/add'); ?>"><span class="glyphicon glyphicon-plus" ></span> New Patient</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo site_url('reports'); ?>"><span class="glyphicon glyphicon-file" ></span> Reports</a></li>
                    
            <?php } ?>    
          
        </ul>
        
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('home/signout'); ?>">Sign Out</a></li>
              <li><a href="#">My Profile</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>