<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">KODAMS</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>

    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage styles</span> </a>
      <ul>
        <li><a href="upload_style_images_ui.php">Upload style images</a></li>
        <li><a href="setup_style_ui.php">Setup styles</a></li>
        <li><a href="#">View all styles</a></li>
      </ul>
    </li>

     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage defects</span> </a>
      <ul>
        <li><a href="add_defect_type_ui.php">Add defects</a></li>
        <li><a href="#">View all defects</a></li>
      </ul>
    </li>

     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage downtimes</span> </a>
      <ul>
        <li><a href="add_downtime_reason_ui.php">Add downtime reason</a></li>
        <li><a href="#">View all downtime reasons</a></li>
      </ul>
    </li>

     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage notifying users</span> </a>
      <ul>
        <li><a href="add_notifying_user_ui.php">Add notifying users</a></li>
        <li><a href="#">Add system users</a></li>
      </ul>
    </li>

     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage planning data</span> </a>
      <ul>
        <li><a href="#">Upload planning data</a></li>
        <li><a href="#">View recent data</a></li>
      </ul>
    </li>

    
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>


    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>

  </ul>
</div>
<!--sidebar-menu-->
