
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
            <img src="<?php echo $this->config->item('sys_imgs'). 'logo22.png'; ?>" alt="Logo" height="45" width="45"/>
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
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-heart" aria-hidden="true"></i>  Patients  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('patients'); ?>"><span class="glyphicon glyphicon-user" ></span> Patients</a></li>
                    <li><a href="<?php echo site_url('patients/add'); ?>"><span class="glyphicon glyphicon-plus" ></span> New Patient</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo site_url('machines'); ?>"><i class="fa fa-life-ring" aria-hidden="true"></i> Machines</a></li>
                <li><a href="<?php echo site_url('reports'); ?>"><i class="fa fa-heartbeat" aria-hidden="true"></i>
                  
                  
                  <svg fill="#9d9d9d" viewBox="0 0 50 50" enable-background="new 0 0 50 50" version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  height="15" width="15"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Layer_23"></g> <g id="Layer_22"></g> <g id="Layer_21"></g> <g id="Layer_20"></g> <g id="Layer_19"></g> <g id="Layer_18"></g> <g id="Layer_17"></g> <g id="Layer_16"></g> <g id="Layer_15"></g> <g id="Layer_14"></g> <g id="Layer_13"></g> <g id="Layer_12"></g> <g id="Layer_11"></g> <g id="Layer_10"></g> <g id="Layer_9"></g> <g id="Layer_8"></g> <g id="Layer_7"></g> <g id="Layer_6"></g> <g id="Layer_5"></g> <g id="Layer_4"> <path clip-rule="evenodd" d="M8.962,18.405c-1.91,3.132-1.424,8.599-0.525,11.866l-2.413,0.658 c-1.1-4.002-1.514-10.037,0.8-13.828L8.962,18.405z M42.282,20.334c-0.346-3.371-1.876-8.642-4.79-10.869l1.52-1.99 c3.531,2.694,5.332,8.469,5.757,12.598L42.282,20.334z M27.36,18.432c2.853,3.102,2.808,5.526,1.697,9.431 c-0.732,2.579-1.475,5.198-0.083,8.454c2.023,4.729,7.067,6.773,11.737,4.774c5.325-2.279,8.062-8.7,8.94-14.104 c1.085-6.673-0.363-14.643-4.309-20.21C35.224-7.498,17.402,7.589,27.36,18.432z M17.423,49.048 c5.077,0.17,9.038-3.563,9.209-8.703c0.118-3.54-1.524-5.711-3.141-7.85c-2.45-3.236-3.37-5.479-1.835-9.405 C27.007,9.376,4.928,1.774,0.671,18.745c-1.66,6.619-0.121,14.571,3.308,20.397C6.756,43.862,11.634,48.854,17.423,49.048z" fill-rule="evenodd"></path> </g> <g id="Layer_3"></g> <g id="Layer_2"></g> </g></svg>
                  
                  Dialysys Prescriptions</a></li>
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