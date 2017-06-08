 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/tata.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
	    <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main.php?t=fm"><i class="fa fa-circle-o"></i> Issue Form</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="main.php?t=list">
            <i class="fa fa-table"></i> <span>List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main.php?t=list"><i class="fa fa-circle-o"></i> List (Not Solved)</a></li>
            <li><a href="main.php?t=listS"><i class="fa fa-circle-o"></i> List Solved</a></li>
          </ul>
        </li>
        <li>
          <a href="main.php?t=user">
            <i class="fa fa-users"></i> <span>User Management</span>
           
          </a>
        </li>
       
      
    
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  