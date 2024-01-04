<style>
  .navbar-blue {
    background-color: #026C7C !important
  }
</style>


<nav class="main-header navbar navbar-expand navbar-blue navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>
  <h3 style="margin: auto;"><b>TALENT AQUISITION CELL</b></h3>
  <!-- Right navbar links -->
  <ul class="navbar-nav">
    <!-- Navbar Search -->


    <!-- Profile Dropdown -->
    <li class="nav-item dropdown">
      
    <?php 
  
    // $this->load->model('Applicant_Model');
    $Id = $_SESSION['Id'];
    $admin = $this->Applicant_Model->getAdminDetails($Id);  
    
    foreach ($admin as $a) {
        ?>
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 45px; margin-bottom:10px;">
            <img src="<?php echo base_url() . 'upload/profilepic.jpg'; ?>" class="img-circle elevation-2" height="40px" width="40px"> &nbsp;&nbsp; 
            <?php echo $a['name']; ?>
        </a>
   
    
      <div class="dropdown-menu" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="<?php echo base_url() . 'Home/Logout'; ?>" onclick="return confirm('Are you sure you want to logout?')">LOGOUT</a>
      </div>
      <?php } ?>
    </li>
      <?php // print_r($_SESSION['Id']); ?>
    <!-- <a class="nav-link" href="<?php echo base_url() . 'Home/Logout'; ?>" onclick="return confirm('Are you sure want to logout?')" role="button">
      LOGOUT
    </a> -->
  </ul>

</nav>