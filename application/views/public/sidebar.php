 <!-- Main Sidebar Container -->

 <style>
   [class*=main-sidebar] {
     background-color: #026C7C !important;
   }

   .nav-link {
     color: white !important;
   }

   .user-panel.mt-3.pb-3.mb-3.d-flex.bg-white img {
     text-align: center;
     display: inline-block;
     margin: 0 auto;

   }

   .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
   .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
     background-color: #041254 !important;
     color: #fff;
   }

   [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active,
   [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus,
   [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
     background-color: #041254 !important;
     color: #343a40;
   }
 </style>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex bg-white">
       <img src="<?= base_url() . 'upload/logo.jpg'; ?>" style="width:59%" height="50%" alt="User Image">
     </div>


     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


         <!-- <?php
              if ($this->session->userdata('Role') == 'education_officer') {
              ?>
           <li class="nav-item">
             <a class="nav-link">
               <p style="font-size: 25px; margin-bottom:20px; color:#e9954f">
                 Education Officer
               </p>
             </a>
           </li>

         <?php
              } elseif ($this->session->userdata('Role') == 'recruitement cell coordinator') {
          ?>

           <li class="nav-item">
             <a class="nav-link">
               <p style="font-size: 25px; margin-bottom:20px; color:#e9954f">
                 Recruitment Cell Coordinator
               </p>
             </a>
           </li>

         <?php
              } elseif ($this->session->userdata('Role') == 'sarchitnis') {
          ?>  

           <li class="nav-item">
             <a class="nav-link">
               <p style="font-size: 25px; margin-bottom:20px; color:#e9954f">
                 Sarchitnis
               </p>
             </a>
           </li>

         <?php
              }
          ?> -->



         <li class="nav-item">
           <a href="<?php echo base_url() . 'Home/dashboard' ?>" class="nav-link <?php if ($this->uri->segment(1) == "Home") {
                                                                                    echo "active";
                                                                                  } ?>">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p style="font-size: 20px">
               Dashboard
             </p>
           </a>
         </li>

         <?php
          if ($this->session->userdata('Role') == 'education_officer') {
          ?>
           <!-- <li class="nav-item">
             <a href="<?php echo base_url() . 'ApplicantList/' ?>" class="nav-link <?php if ($this->uri->segment(1) == "ApplicantList") {
                                                                                      echo "active";
                                                                                    } ?>">
               <i class="fas fa-users" style="margin-right: 10px;"></i>
               <p style="font-size: 20px">
                 Applicant List
               </p>
             </a>
           </li> -->
           <li class="nav-item">

             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-box"></i>
               <p style="font-size: 20px">
                 Application Master
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/index/All' ?>" class="nav-link <?php if ($this->uri->segment(3) == "All") {
                                                                                                  echo "active";
                                                                                                } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                     Application List
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/index/Pending' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Pending") {
                                                                                                      echo "active";
                                                                                                    } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Pending
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/index/In_Process' ?>" class="nav-link <?php if ($this->uri->segment(3) == "In_Process") {
                                                                                                          echo "active";
                                                                                                        } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     In Process
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/index/Selected' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Selected") {
                                                                                                        echo "active";
                                                                                                      } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Selected
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/index/Rejected' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Rejected") {
                                                                                                        echo "active";
                                                                                                      } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Rejected
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/index/Refered_to' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Refered_to") {
                                                                                                          echo "active";
                                                                                                        } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Referred
                   </p>
                 </a>
               </li>
             </ul>
           </li>

           <!-- <li class="nav-item">
              <a href="<?php echo base_url() . 'Recruitment_cell/index' ?>" class="nav-link <?php if ($this->uri->segment(1) == "Recruitment_cell") {
                                                                                              echo "active";
                                                                                            } ?>">
                <i class="nav-icon fas fa-book"></i> 
                <p style="font-size: 20px">
                  Recruitment Cell Coordinator
                </p>
              </a>
            </li> -->
           <li class="nav-item">
             <a href="<?php echo base_url() . 'PositionList/index' ?>" class="nav-link <?php if ($this->uri->segment(1) == "PositionList") {
                                                                                          echo "active";
                                                                                        } ?>">
               <i class="nav-icon fas fa-user"></i>
               <p style="font-size: 20px">
                 Position
               </p>
             </a>
           </li>
           <li class="nav-item">

             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-box"></i>
               <p style="font-size: 20px">
                 Report Master
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Institute_Report/index' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Institute_Report") {
                                                                                                  echo "active";
                                                                                                } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                     Institute Report
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Institute_Report/Reference_report' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Reference_report") {
                                                                                                            echo "active";
                                                                                                          } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Reference Report
                   </p>
                 </a>
               </li>

             </ul>
           </li>


           <!-- <li class="nav-item">
              <a href="<?php echo base_url() . 'Reference/index' ?>" class="nav-link <?php if ($this->uri->segment(1) == "Reference") {
                                                                                        echo "active";
                                                                                      } ?>">
                <i class="nav-icon fas fa-book"></i> 
                <p style="font-size: 20px">
                  Reference
                </p>
              </a>
            </li> -->

         <?php
          }
          if ($this->session->userdata('Role') == 'recruitement cell coordinator') {
          ?>
           <li class="nav-item">

             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-box"></i>
               <p style="font-size: 20px">
                 Application Master
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getallApplicant' ?>" class="nav-link <?php if ($this->uri->segment(2) == "getallApplicant") {
                                                                                                    echo "active";
                                                                                                  } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                     All Candidate List
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/All' ?>" class="nav-link <?php if ($this->uri->segment(3) == "All") {
                                                                                                              echo "active";
                                                                                                            } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                     Application List
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Pending' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Pending") {
                                                                                                                  echo "active";
                                                                                                                } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Pending
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/In_Process' ?>" class="nav-link <?php if ($this->uri->segment(3) == "In_Process") {
                                                                                                                    echo "active";
                                                                                                                  } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     In Process
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Selected' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Selected") {
                                                                                                                  echo "active";
                                                                                                                } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Selected
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Rejected' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Rejected") {
                                                                                                                  echo "active";
                                                                                                                } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Rejected
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Refered_to' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Reffered_to") {
                                                                                                                    echo "active";
                                                                                                                  } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Referred
                   </p>
                 </a>
               </li>
             </ul>
           </li>

           <li class="nav-item">
             <a href="<?php echo base_url() . 'Position/index' ?>" class="nav-link <?php if ($this->uri->segment(1) == "Position") {
                                                                                      echo "active";
                                                                                    } ?>">
               <i class="nav-icon fas fa-user"></i>
               <p style="font-size: 20px">
                 Position
               </p>
             </a>
           </li>
           <li class="nav-item">
             <a href="<?php echo base_url() . 'Education_Officer/index' ?>" class="nav-link <?php if ($this->uri->segment(1) == "Education_Officer") {
                                                                                              echo "active";
                                                                                            } ?>">
               <i class="nav-icon fas fa-user"></i>
               <p style="font-size: 20px">
                 Education Officer
               </p>
             </a>
           </li>

           <li class="nav-item">

             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-box"></i>
               <p style="font-size: 20px">
                 Log Master
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <!-- <li class="nav-item">
                 <a href="<?php echo base_url() . 'Log/index' ?>" class="nav-link <?php if ($this->uri->segment(2) == "index") {
                                                                                    echo "active";
                                                                                  } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                    Log For Candidate
                   </p>
                 </a>
               </li> -->

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Log/index' ?>" class="nav-link <?php if ($this->uri->segment(2) == "LogForApplicant") {
                                                                                    echo "active";
                                                                                  } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                     Log For Application
                   </p>
                 </a>
               </li>

               <!-- <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/Selected' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Selected") {
                                                                                                                  echo "active";
                                                                                                                } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                    Log For Position
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Applicant/getApplicantByStatus/In_Process' ?>" class="nav-link <?php if ($this->uri->segment(3) == "In_Process") {
                                                                                                                    echo "active";
                                                                                                                  } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Log For Education Officer
                   </p>
                 </a>
               </li> -->

             </ul>
           </li>
           <li class="nav-item">

             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-box"></i>
               <p style="font-size: 20px">
                 Report Master
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Institute_Report/index' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Institute_Report") {
                                                                                                  echo "active";
                                                                                                } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                     Institute Report
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Institute_Report/Reference_report' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Reference_report") {
                                                                                                            echo "active";
                                                                                                          } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Reference Report
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Institute_Report/Eo_report' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Eo_report") {
                                                                                                      echo "active";
                                                                                                    } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Education Officer Report
                   </p>
                 </a>
               </li>
             </ul>
           </li>

         <?php
          }
          if ($this->session->userdata('Role') == 'sarchitnis') {
          ?>

           <!-- <li class="nav-item">
             <a href="<?php echo base_url() . 'ApplicantList/index/all' ?>" class="nav-link <?php if ($this->uri->segment(1) == "ApplicantList") {
                                                                                              echo "active";
                                                                                            } ?>">
               <i class="fas fa-users" style="margin-right: 10px;"></i> 
               <p style="font-size: 20px">
                 Applicant List
               </p>
             </a>
           </li> -->
           <li class="nav-item">

             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-box"></i>
               <p style="font-size: 20px">
                 Application Master
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/All' ?>" class="nav-link <?php if ($this->uri->segment(3) == "All") {
                                                                                                                      echo "active";
                                                                                                                    } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                     Application List
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/Pending' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Pending") {
                                                                                                                          echo "active";
                                                                                                                        } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Pending
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/In_Process' ?>" class="nav-link <?php if ($this->uri->segment(3) == "In_Process") {
                                                                                                                              echo "active";
                                                                                                                            } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     In Process
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/Selected' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Selected") {
                                                                                                                            echo "active";
                                                                                                                          } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Selected
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/Rejected' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Rejected") {
                                                                                                                            echo "active";
                                                                                                                          } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Rejected
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'ApplicantList/getApplicantForSarchitnis/Refered_to' ?>" class="nav-link <?php if ($this->uri->segment(3) == "Rejected") {
                                                                                                                            echo "active";
                                                                                                                          } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Referred
                   </p>
                 </a>
               </li>
             </ul>
           </li>
           <li class="nav-item">
             <a href="<?php echo base_url() . 'PositionList/PositionForSarchitnis' ?>" class="nav-link <?php if ($this->uri->segment(1) == "PositionList") {
                                                                                                          echo "active";
                                                                                                        } ?>">
               <i class="fas fa-briefcase" style="margin-right: 10px;"></i>
               <p style="font-size: 20px">
                 Position
               </p>
             </a>
           </li>
           <li class="nav-item">

             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-box"></i>
               <p style="font-size: 20px">
                 Report Master
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Institute_Report/index' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Institute_Report") {
                                                                                                  echo "active";
                                                                                                } ?>">
                   <i class="nav-icon fas fa-book"></i>
                   <p style="font-size: 20px">
                     Institute Report
                   </p>
                 </a>
               </li>

               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Institute_Report/Reference_report' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Reference_report") {
                                                                                                            echo "active";
                                                                                                          } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Reference Report
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo base_url() . 'Institute_Report/Eo_report' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Eo_report") {
                                                                                                      echo "active";
                                                                                                    } ?>">
                   <i class="nav-icon fas fa-th-list"></i>
                   <p style="font-size: 20px">
                     Education Officer Report
                   </p>
                 </a>
               </li>
             </ul>
           </li>
         <?php } ?>


         <!-- <li class="nav-item">

           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-box"></i>
             <p style="font-size: 20px">
               Report Master
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo base_url() . 'Institute_Report/index' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Institute_Report") {
                                                                                                echo "active";
                                                                                              } ?>">
                 <i class="nav-icon fas fa-book"></i>
                 <p style="font-size: 20px">
                   Institute Report
                 </p>
               </a>
             </li>

             <li class="nav-item">
               <a href="<?php echo base_url() . 'Institute_Report/Reference_report' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Reference_report") {
                                                                                                          echo "active";
                                                                                                        } ?>">
                 <i class="nav-icon fas fa-th-list"></i>
                 <p style="font-size: 20px">
                   Reference Report
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url() . 'Institute_Report/Eo_report' ?>" class="nav-link <?php if ($this->uri->segment(2) == "Eo_report") {
                                                                                                    echo "active";
                                                                                                  } ?>">
                 <i class="nav-icon fas fa-th-list"></i>
                 <p style="font-size: 20px">
                   Education Officer Report
                 </p>
               </a>
             </li>
           </ul>
         </li> -->
       </ul>
     </nav>

   </div>
   <!-- /.sidebar -->
 </aside>