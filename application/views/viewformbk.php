<div class="modal fade" id="modal-info<?php echo $row['id']; ?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Applicant Details </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                    </div>
                                    <div class="modal-body">


                                        <div class="form-group row ">
                                            <!-- form div 1 -->
                                            <div class=" col-md-12 col-11 mx-auto d-block">
                                                <div class="box-tbl-1">
                                                    <div class="col-md-11 row">
                                                        <h4><b>Personal Details</b></h4>
                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Name :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Email Id :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['email_id']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Mobile Number :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['contact_no']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Aadhar Number :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['aadhar']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>District :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['district_name']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Taluka :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['taluka_name']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Village :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['city']; ?></div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- form div 1 -->
                                            <!-- form div 2 -->
                                            <div class="col-md-12 col-11 mx-auto d-block">
                                                <div class="box-tbl-1">
                                                    <div class="col-md-11 row">
                                                        <h4><b>Applied For</b></h4>
                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Reference :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['reference_name']; ?></div>

                                                    </div>

                                                    <?php
                                                    if ($row['reference_id'] == 1) { ?>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Sabhasad Name :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['other_reference_name']; ?></div>

                                                        </div>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Relation :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['relation']; ?></div>

                                                        </div>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Sabhasad Mobile Number :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['sabhasad_mobile_no']; ?></div>

                                                        </div>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Sabhasad ID :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['other_reference_id']; ?></div>

                                                        </div>

                                                    <?php
                                                    } elseif ($row['reference_id'] == 2 || $row['reference_id'] == 4) {
                                                    ?>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Reference Name :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['other_reference_name']; ?></div>

                                                        </div>
                                                    <?php } elseif ($row['reference_id'] == 3) {
                                                    ?>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Sabhasad Name :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['other_reference_name']; ?></div>

                                                        </div>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Director Name :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['director_name']; ?></div>

                                                        </div>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Relation :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['relation']; ?></div>

                                                        </div>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Sabhasad Mobile Number :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['sabhasad_mobile_no']; ?></div>

                                                        </div>

                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Sabhasad ID :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['other_reference_id']; ?></div>

                                                        </div>
                                                    <?php } ?>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Position :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['name']; ?></div>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- form div 2 -->
                                            <!-- form div 3 -->
                                            <div class="col-md-12 col-11 mx-auto d-block">
                                                <div class="box-tbl-1">
                                                    <div class="col-md-11 row">
                                                        <h4><b>Applied For</b></h4>
                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Institute :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['institute_id']; ?></div>

                                                    </div>

                                                    <?php if ($row['institute_id'] == 'school') {  ?>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Medium :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['education']; ?></div>

                                                        </div>

                                                    <?php } elseif ($row['institute_id'] == 'college') {
                                                    ?>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>College :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['college']; ?></div>

                                                        </div>
                                                    <?php  } elseif ($row['institute_id'] == 'Professional-College') {
                                                    ?>
                                                        <div class="bb-line"></div>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Professional College :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['professional']; ?></div>

                                                        </div>
                                                    <?php  }
                                                    ?>

                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Qualification :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['qualification']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Exam :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['exam']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Demo Lectures :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['demo_lectures']; ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Assign To EO :</b></div>
                                                        <div class="col-md-7 "> <?php if ($row['assign_to'] == 'all') {
                                                                                    echo $row['assign_to'];
                                                                                } else {
                                                                                    echo $row['eo_name'];
                                                                                }
                                                                                ?></div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Background :</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['background']; ?></div>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- form div 3 -->
                                            <!-- form div 4 -->
                                            <div class="col-md-12 col-11 mx-auto d-block">
                                                <div class="box-tbl-1">
                                                    <div class="col-md-11 row">
                                                        <h4><b>Other Information</b></h4>
                                                    </div>

                                                    <?php if ($row['exam'] == 'done') {
                                                    ?>
                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Exam Remark :</b></div>
                                                            <div class="col-md-7">
                                                                <?php echo $row['exam_remark']; ?>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div class="bb-line"></div>
                                                    <?php if ($row['demo_lectures'] == 'done') {
                                                    ?>

                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b>Demo Lecture Remark :</b></div>
                                                            <div class="col-md-7 "> <?php echo $row['demo_lectures_remark']; ?>
                                                            </div>

                                                        </div>
                                                        <div class="bb-line"></div>
                                                    <?php } ?>


                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b>Sarchitnis Remark:</b></div>
                                                        <div class="col-md-7 "> <?php echo $row['remark']; ?>
                                                        </div>

                                                    </div>
                                                    <div class="bb-line"></div>
                                                    <div class="col-md-11 row">
                                                        <div class="col-md-5 px-3"> <b> Date :</b></div>
                                                        <div class="col-md-7 "><?php $this->load->helper('date');

                                                                                $originalDate  = $row['reg_date_time'];
                                                                                $newDate = date("d-m-Y", strtotime($originalDate));
                                                                                ?>

                                                            <?php echo $newDate; ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- form div 4 -->
                                            <!-- form div 5 -->
                                            <div class="col-md-12 col-11 mx-auto d-block">
                                                <div class="box-tbl-1">

                                                    <?php
                                                    $applicant_id = $row['id'];
                                                    $this->load->model('Applicant_Model');
                                                    $document = $this->Applicant_Model->getAllDocument($applicant_id);

                                                    foreach ($document as $value) {
                                                        //  print_r($value['resume']);

                                                    ?>

                                                        <div class="col-md-11 row">
                                                            <div class="col-md-5 px-3"> <b><?php echo $value['type']; ?> :</b></div>

                                                            <div class="col-md-7 "> <?php
                                                                                    $resume = $value['resume'];

                                                                                    if (!empty($resume)) {
                                                                                        $fileExtension = pathinfo($resume, PATHINFO_EXTENSION);

                                                                                        $baseURL = base_url();
                                                                                        $pdfURL = $baseURL . $resume;


                                                                                        // Display PDF icon if the file is a PDF
                                                                                        if (strtolower($fileExtension) === 'pdf') {
                                                                                            echo '<a href="' . $pdfURL . '" target="_blank"><img src="' . $baseURL . 'upload/pdf.png" alt="PDF Icon" width="50" height="50"> || </a>';
                                                                                        }
                                                                                        // Display document icon if the file is not a PDF
                                                                                        else {
                                                                                            echo '
                                                        <a href="' . $pdfURL . '" target="_blank"><img src="' . $baseURL . 'upload/document.png" alt="Document Icon" width="50" height="50"> || </a>';
                                                                                        }
                                                                                        echo '<a href="' . $pdfURL . '" download>Download</a>';
                                                                                    } else {
                                                                                        // Certificate1 is not uploaded, display a message in red.
                                                                                        echo '<p style="color: red;">Resume not uploaded</p>';
                                                                                    }
                                                                                    ?>
                                                            </div>
                                                        </div>
                                                        <div class="bb-line"></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!-- form div 5 -->


                                            <form method="post" action="<?php echo base_url('Applicant/updateStatusRemark'); ?>">
                                                <input type="hidden" value="<?php echo $row['id']; ?>" id="id" class="form-control" name="id">
                                                <div class="col-md-12 row last-table-cls mx-auto d-block">
                                                    <div class="col-md-12" style="text-align: center;">
                                                        <h5> <b><label>Change Status:</label></b></h5>
                                                    </div>

                                                    <div class="col-md-6 offset-md-3">
                                                        <?php
                                                        $status = $row['status'];
                                                        $status_options = array(
                                                            'Pending' => 'Pending',
                                                            'Selected' => 'Selected',
                                                            'In_Process' => 'In_Process',
                                                            'Rejected' => 'Rejected'
                                                        );
                                                        ?>
                                                        <select name="status" id="status_dropdown" class="form-control">
                                                            <?php
                                                            foreach ($status_options as $option_value => $option_label) {
                                                                $selected = ($status == $option_value) ? 'selected' : '';
                                                                echo "<option value='$option_value' $selected>$option_label</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 text-center mx-auto d-block">


                                                        <button type="submit" class="btn btn-primary form-button-cls">Submit</button>

                                                    </div>

                                            </form>







                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>