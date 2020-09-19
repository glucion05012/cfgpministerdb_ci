<div class="content-wrapper">
    <div class='successmsg'>
        <?php if($this->session->flashdata('successmsg')): ?> 
            <p><?php echo $this->session->flashdata('successmsg'); ?></p>
        <?php endif; ?>
    </div>

    <table id="myTable" class="table table-striped table-bordered table-sm align">
        <thead>
            <tr>
                <th scope="col">Application ID</th>
                <th scope="col">Form</th>
                <th scope="col">Status</th>
                <th scope="col">Remarks</th>
                <th scope="col">Date Submitted</th>
                <th scope="col">R - Forms</th>
                <th scope="col">R - count</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody> 
        
        <?php foreach($ordination_min as $ord) : ?>
            <tr class="table-active"> 
                <td><?php echo $ord['ord_id']; ?></td>
                <td>Ordination Application</td>
               
                <?php
                if($ord['ord_district_status'] == 'For Interview'){
                    echo" <td>". $ord['ord_district_status'] ." on ". $ord['ord_district_interview'] ."</td> ";
                }else if($ord['ord_district_status'] == 'Accepted'){
                    if($ord['ord_national_status'] == 'Accepted'){
                        echo" <td><span style='color: green;'><b>Ordained</b></span></td> ";
                    }else if($ord['ord_national_status'] == 'For Exam'){
                        echo" <td><b>". $ord['ord_national_status'] ."</b> - ". $ord['ord_national_exam'] ."</td> ";
                    }else if($ord['ord_national_status'] == 'For Interview'){
                        echo" <td><b>". $ord['ord_national_status'] ."</b> - ". $ord['ord_national_interview'] ."</td> ";
                    }else if($ord['ord_national_status'] == 'Denied'){
                        echo" <td><span style='color: red;'><b>". $ord['ord_national_status'] ."</b></span></td> ";
                    }else if($ord['ord_national_status'] == 'Submitted'){
                        echo" <td><b>For National Review</b></td> ";
                    }else{
                        echo" <td><b>". $ord['ord_national_status'] ."</b></span></td> ";
                    }
                    
                }else  if($ord['ord_district_status'] == 'Denied'){
                    echo" <td><span style='color: red;'>". $ord['ord_district_status'] ."</span></td> ";
                }else{
                    echo" <td>". $ord['ord_district_status'] ."</td> ";
                }
                ?>
                 <td><?php echo $ord['ord_remarks']; ?></td>
                <td><?php echo $ord['ord_date_submitted']; ?></td>
                <td><a href="<?php echo base_url(); ?>forms/ordination/recommendation/<?php echo $ord['ord_id']; ?>" onclick="copyURI(event)">copy link</a></td>
                <?php
                    $i = 0;
                    foreach($recommendation_ordination as $ro){
                        if ($ord['ord_id'] == $ro['ro_ord_id']){
                            
                            $i++;
                        }
                    };
                ?>
                <td><?php echo $i; ?></td>
                <?php 
                if ($ord['ord_district_status'] == 'Returned'){
                    echo"
                    <td><a href='' data-toggle='modal' data-target='#updateModal-". $ord['ord_id'] ."'><i class='fas fa-edit' style='font-size:24px; margin-left: 1em;'></i></a></td>
                    ";
                }else{
                    echo"
                    <td><a href='' data-toggle='modal' data-target='#acceptModal-". $ord['ord_id'] ."'><i class='fa fa-list-alt' style='font-size:24px; margin-left: 1em;'></i></a></td>
                    ";
                }
                ?>
                

            </tr>   
        <?php endforeach; ?>
        
        </tbody>
    </table>

    <?php foreach($ordination_min as $ord) : ?>
        <?php 
            $father_name = $ord['ord_father_name']; 
            $mother_name = $ord['ord_mother_name']; 
            $mother_name = $ord['ord_mother_name'];
            $solemnizing_official = $ord['ord_solemnizing_official'];
            $solemnizing_place = $ord['ord_solemnizing_place'];
            $if_separated = $ord['ord_if_separated'];
            $if_engaged_to = $ord['ord_if_engaged_to'];
            $if_engaged_christian = $ord['ord_if_engaged_christian'];
            $if_engaged_member = $ord['ord_if_engaged_member'];
            $if_engaged_symphaty = $ord['ord_if_engaged_symphaty'];
            $if_engaged_not_symphaty = $ord['ord_if_engaged_not_symphaty'];
            $if_engaged_minister = $ord['ord_if_engaged_minister'];
            $if_engaged_graduate_fbc = $ord['ord_if_engaged_graduate_fbc'];
            $if_engaged_when_married = $ord['ord_if_engaged_when_married'];
            $course_bible_college = $ord['ord_course_bible_college'];
            $year_conversion_when = $ord['ord_year_conversion_when'];
            $year_conversion_where = $ord['ord_year_conversion_where'];
            $year_baptized_when = $ord['ord_year_baptized_when'];
            $year_baptized_where = $ord['ord_year_baptized_where'];
            $testimony = $ord['ord_testimony'];
            $ministerial_activities = $ord['ord_ministerial_activities'];
            $churches_pioneered = $ord['ord_churches_pioneered'];
            $churches_evangelized = $ord['ord_churches_evangelized'];
            $resigned_pastorate = $ord['ord_resigned_pastorate'];
            $fulltime_ministry = $ord['ord_fulltime_ministry'];
            $secular_employment = $ord['ord_secular_employment'];
            $foursquare_credentials = $ord['ord_foursquare_credentials'];
            $other_licensed = $ord['ord_other_licensed'];
            $pending_application = $ord['ord_pending_application'];
            $harmony_authority = $ord['ord_harmony_authority'];
            $pledged_foursquare = $ord['ord_pledged_foursquare'];
            $teaching_principles = $ord['ord_teaching_principles'];
            $teach_tithing = $ord['ord_teach_tithing'];
            $consistent_tither = $ord['ord_consistent_tither'];
            $ministry_support = $ord['ord_ministry_support'];
            $declaration_faith = $ord['ord_declaration_faith'];
            $way_salvation = $ord['ord_way_salvation'];
            $holy_trinity = $ord['ord_holy_trinity'];
            $eternal_security = $ord['ord_eternal_security'];

            $ord_min_id =  $ord['ord_min_id'];

            $ord_id =  $ord['ord_id'];
        ?>
        <!-- MODAL FOR summary -->
        <div id="acceptModal-<?php echo $ord['ord_id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Application Summary</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">  
                <?php 
                    foreach($minister as $min){
                        $min_id = $min['min_id'];
                        $fullname = $min['min_fullname'];
                        $bday = $min['min_bday'];
                        $age = floor((time() - strtotime($bday)) / 31556926);
                        $civil_status = $min['min_cstatus'];
                        $dom = $min['sp_date_marriage'];
                        $spouse_name = $min['sp_fullname'];
                        $min_address = $min['min_address'];
                    }
                ?>

                <div class="ordination-form">
                    <div class="row">
                        <div class='col-sm-12'>
                            <input type='hidden' name='min_id' value='<?php echo $min_id ?>'>
                            <input type='hidden' name='date_submited' value='<?php echo date("Y-m-d H:i:s"); ?>'>
                            <input type='hidden' name='status' value='Submitted'>
                            <p><b>Personal Record</b></p>
                        </div>
                        <div class='col-sm-2'>
                            <span>Name:</span>
                        </div>
                        <div class='col-sm-10'>
                            <input class="form-control" type="text" name="fullname" value="<?php echo $fullname ?>" readonly>
                        </div>
                        
                        <div class='col-sm-2'>
                            <span>Age:</span>
                        </div>
                        <div class='col-sm-4'>
                            <input class="form-control" type="text" name="age" value="<?php echo $age ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Birthdate:</span>
                        </div>
                        <div class='col-sm-4'>
                            <input class="form-control" type="text" name="birthdate" value="<?php echo $bday ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Father's Name:</span>
                        </div>
                        <div class='col-sm-4'>
                            <input class="form-control" type="text" name="father_name" value="<?php echo $father_name ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Mother's Maiden Name:</span>
                        </div>
                        <div class='col-sm-4'>
                            <input class="form-control" type="text" name="mother_name" value="<?php echo $mother_name ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Address:</span>
                        </div>
                        <div class='col-sm-10'>
                            <input class="form-control" type="text" name="mail_address"  value="<?php echo $min_address ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Marital Status:</span>
                        </div>
                        <div class='col-sm-4'>
                            <input class="form-control" type="text" name="civil_status" value="<?php echo $civil_status ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Date of Marriage:</span>
                        </div>
                        <div class='col-sm-4'>
                            <input class="form-control" type="text" name="dom" value="<?php echo $dom ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Name of Spouse:</span>
                        </div>
                        <div class='col-sm-10'>
                            <input class="form-control" type="text" name="spouse_name" value="<?php echo $spouse_name ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Solemnizing Official:</span>
                        </div>
                        <div class='col-sm-4'>
                            <input class="form-control" type="text" name="s_official" value="<?php echo $solemnizing_official ?>" readonly>
                        </div>

                        <div class='col-sm-2'>
                            <span>Place of Solemnized:</span>
                        </div>
                        <div class='col-sm-4'>
                            <input class="form-control" type="text" name="s_place" value="<?php echo $solemnizing_place ?>" readonly>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>Children:</b></span>
                        </div>
                        <table border=1 style="width: 100%; margin-bottom:2em;">
                            <tr>
                                <td><b>Name</b></td>
                                <td><b>Birthdate</b></td>
                            </tr>
                            <?php 
                            
                                foreach($minister_children as $mc){
                                    $cdn_name = $mc['cdn_fullname'];
                                    $cdn_bday = $mc['cdn_bday'];
                                    echo"
                                    
                                        <tr>
                                            <td>$cdn_name</td>
                                            <td>$cdn_bday</td>
                                        </tr>
                                    
                                    
                                    "; 
                                }
                            ?>
                        </table>

                        <div class='col-sm-12'>
                            <span><i>(If separated)</i> Reason for separation and present residence of former companion (Give particulars)</span>
                        </div>
                        <div class='col-sm-12'>
                            <textarea name="if_separated" cols="100" rows="3" readonly><?php echo $if_separated ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><i>(If engaged to be married)</i></span>
                        </div>
                        <div class='col-sm-12'>
                            To whom: <input class="form-control" type="text" name="eng_name" style="width: 200px;" value="<?php echo $if_engaged_to ?>" readonly>
                        </div>
                        <div class='col-sm-12'>
                            Is he/she a Christian? 
                            <select name="eng_christian">
                                <option value=""><?php echo $if_engaged_christian ?></option>
                            </select>
                        </div>
                        <div class='col-sm-12'>
                            Is he/she a member in good standing of the Foursquare Church ?
                            <select name="eng_good_stand">
                            <option value=""><?php echo $if_engaged_member ?></option>
                            </select>
                        </div>
                        <div class='col-sm-12'>
                            Is he/she in symphaty with your ministry?
                            <select name="eng_symp_ministry">
                            <option value=""><?php echo $if_engaged_symphaty ?></option>
                            </select>
                        </div>
                        <div class='col-sm-12'>
                            If not, explain <textarea name="eng_symp_ministry_no" cols="50" rows="1" readonly><?php echo $if_engaged_not_symphaty ?></textarea>
                        </div>
                        <div class='col-sm-12'>
                            Is he/she a minister?
                            <select name="eng_minister">
                            <option value=""><?php echo $if_engaged_minister ?></option>
                            </select>
                        </div>
                        <div class='col-sm-12'>
                            Is he/she a graduate of Foursquare Bible College:
                            <select name="eng_graduate_fbc">
                            <option value=""><?php echo $if_engaged_graduate_fbc ?></option>
                            </select>
                        </div>
                        <div class='col-sm-12'>
                            When do you plan to get married?
                            <input type="month" name="eng_plan_married" style="width: 200px;"  value="<?php echo $if_engaged_when_married ?>" readonly>
                        </div>

                        <div class='col-sm-12'>
                            <p><b>Educational Attainment</b></p>
                        </div>

                        <table border=1 style="width: 100%; margin-bottom:2em;">
                            <tr>
                                <td><b>School</b></td>
                                <td><b>Year</b></td>
                                <td><b>Level</b></td>
                            </tr>
                            <?php 
                            
                                foreach($minister_education as $me){
                                    $school = $me['educ_school'];
                                    $year = $me['educ_year'];
                                    $level = $me['educ_level'];
                                    echo"
                                    
                                        <tr>
                                            <td>$school</td>
                                            <td>$year</td>
                                            <td>$level</td>
                                        </tr>
                                    
                                    
                                    "; 
                                }
                            ?>
                        </table>

                        <div class='col-sm-5'>
                            <span>Course taken in Bible College:</span>
                        </div>
                        <div class='col-sm-7'>
                            <select name="course_fbc">
                            <option value=""><?php echo $course_bible_college ?></option>
                            </select>
                        </div>

                        <div class='col-sm-12' style="margin-top: 1em;">
                            <p><b>Christian Experience</b></p>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>A.</b> Year of Conversion:</span>
                        </div>

                        <div class='col-sm-6'>
                            When:
                            <input type="number" name="conversion_date" style="width: 200px;" value="<?php echo $year_conversion_when ?>" readonly>
                        </div>

                        <div class='col-sm-6'>
                            Where?
                            <input class="form-control" type="text" name="conversion_place" style="width: 200px;" value="<?php echo $year_conversion_where ?>" readonly>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>B.</b> Have you received the Baptism of the Holy Spirit with the evidence of speaking in tongues? (Acts 2:4):</span>
                        </div>

                        <div class='col-sm-6'>
                            When:
                            <input type="number" name="hs_date" style="width: 200px;" value="<?php echo $year_baptized_when ?>" readonly>
                        </div>

                        <div class='col-sm-6'>
                            Where?
                            <input class="form-control" type="text" name="hs_place" style="width: 200px;" value="<?php echo $year_baptized_where ?>" readonly>
                        </div>

                        <div class='col-sm-12' style="margin-top: 1em;">
                            <p><b>Ministerial Call and Experience</b></p>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>A.</b> Relate briefly your testimony concerning your call to the ministry.</span>
                            <textarea name="testimony" cols="100" rows="5" readonly><?php echo $testimony ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>B.</b> Relate briefly your ministerial activities since graduation.</span>
                            <textarea name="min_act" cols="100" rows="5" readonly><?php echo $ministerial_activities ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span>Name of churches you pioneered:</span>
                            <textarea name="ch_pion" cols="100" rows="3" readonly><?php echo $churches_pioneered ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span>Name of churches you have evangelized:</span>
                            <textarea name="ch_evan" cols="100" rows="3" readonly><?php echo $churches_evangelized ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>C.</b> Have you resigned, relinquished or withdrawn from pastorate for any reason? (if so, explain)</span>
                            <textarea name="min_resigned" cols="100" rows="5" readonly><?php echo $resigned_pastorate ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>D.</b> Are you at present giving your full time to the ministry? 
                            <select name="fulltime_ministry">
                            <option value=""><?php echo $fulltime_ministry ?></option>
                            </select>
                            <i>(A full time minister is one who is depending upon his/her ministry for his/her livelihood, whose principal occupation is the
                            ministry; his/her ministerial activities take the better part of seven days a week of work and he/she is not engaged in any outside
                            employment.)
                            </i></span>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>E.</b> Are you engaged in any secular employment, occupation or business? (if so, explain)</span>
                            <textarea name="sec_emp" cols="100" rows="5" readonly><?php echo $secular_employment ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>F.</b> Years you have received Foursquare credentials: Please indicate all the years applicable:</span>
                            <textarea name="four_cre" cols="100" rows="4" readonly><?php echo $foursquare_credentials ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>G.</b> Have you ever been licensed, ordained by another church, mission or denomination? (if so, explain)</span>
                            <textarea name="another_ord" cols="100" rows="3" readonly><?php echo $other_licensed ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>H.</b> Do you have a pending application for any type of credential with any other church, mission or
                            denomination? (if so, explain)</span>
                            <textarea name="pend_ord" cols="100" rows="3" readonly><?php echo $pending_application ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>I.</b> Will you to the best of your ability work in harmony with those in authority over you?</span>
                            <select name="authority">
                            <option value=""><?php echo $harmony_authority ?></option>
                            </select>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>J.</b> Do you pledge yourself to be 100% Foursquare-100% loyal first to Christ and then to the
                            Foursquare Organization?</span>
                            <select name="pledge">
                            <option value=""><?php echo $pledged_foursquare ?></option>
                            </select>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>K.</b> Are you teaching the principles of New Testament indigenous support of local ministers?</span>
                            <select name="principles">
                            <option value=""><?php echo $teaching_principles ?></option>
                            </select>
                        </div>
                        <div class='col-sm-12'>
                            <span>Do you teach tithing?</span>
                            <select name="tithing">
                            <option value=""><?php echo $teach_tithing ?></option>
                            </select>
                        </div>
                        <div class='col-sm-12'>
                            <span>Are you personally a consistent tither?</span>
                            <select name="cons_tithing">
                            <option value=""><?php echo $consistent_tither ?></option>
                            </select>
                        </div>
                        <div class='col-sm-12'>
                            <span>How is your ministry being supported?</span>
                            <textarea name="min_supp" cols="100" rows="3" readonly><?php echo $ministry_support ?></textarea>
                        </div>

                        <div class='col-sm-12' style="margin-top: 1em;">
                            <p><b>Doctrinal Position</b></p>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>A.</b> Do you adhere to and accept in full the Foursquare Declaration of Faith as compiled by Aimee
                            Semple McPherson, founder?</span>
                            <select name="founder">
                            <option value=""><?php echo $declaration_faith ?></option>
                            </select>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>B.</b> State briefly your doctrinal position on the following:</span>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>1.</b> The Way of Salvation</span>
                            <textarea name="way_salv" cols="100" rows="5" readonly><?php echo $way_salvation ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>2.</b> The Eternal God (The Holy Trinity)</span>
                            <textarea name="trin" cols="100" rows="5" readonly><?php echo $holy_trinity ?></textarea>
                        </div>

                        <div class='col-sm-12'>
                            <span><b>3.</b>  Eternal Security</span>
                            <textarea name="eter_sec" cols="100" rows="5" readonly><?php echo $eternal_security ?></textarea>
                        </div>

                        <div style="margin-top: 5em;">
                        <p><b><u>IMPORTANT NOTE TO THE APPLICANT</u></b></p>  
                                        <p>You are advised to submit all requirements with this application to your District Supervisor, including
                        your latest 2x2 pictures on the top right hand portion of page 1. Incomplete requirements will unduly delay
                        the processing of your application and may even disqualify you.</p>   
                        </div>

                        <div style="margin-top: 3em;">
                        <p><b><u>IMPORTANT NOTE TO THE DISTRICT SUPERVISOR</u></b></p>  
                                        <p>Please go over this application to check if <b>ALL</b> requirements have been Compiled with. DO NOT send
                        any incomplete application to the National Office. This application form will only be submitted, once the applicant have passed the interview.</p>   
                        </div>
                    </div>
                </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
        <!-- END MODAL summary -->

        <!-- UPDATE MODAL FOR summary -->
        <div id="updateModal-<?php echo $ord['ord_id']; ?>" class="modal fade" role="dialog">
            <form action="<?= base_url('ordination/update'); ?>" method="post" accept-charset="utf-8">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Application Summary</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">  
                        <?php 
                            foreach($minister as $min){
                                $min_id = $min['min_id'];
                                $fullname = $min['min_fullname'];
                                $bday = $min['min_bday'];
                                $age = floor((time() - strtotime($bday)) / 31556926);
                                $civil_status = $min['min_cstatus'];
                                $dom = $min['sp_date_marriage'];
                                $spouse_name = $min['sp_fullname'];
                                $min_address = $min['min_address'];
                            }
                        ?>

                        <div class="ordination-form">
                            <div class="row">
                                <div class='col-sm-12'>
                                    <input type='hidden' name='ord_id' value='<?php echo $ord_id ?>'>
                                    <input type='hidden' name='min_id' value='<?php echo $min_id ?>'>
                                    <input type='hidden' name='date_submited' value='<?php echo date("Y-m-d H:i:s"); ?>'>
                                    <input type='hidden' name='status' value='Submitted'>
                                    <input type='hidden' name='remarks' value='For District Review'>
                                    <p><b>Personal Record</b></p>
                                </div>
                                <div class='col-sm-2'>
                                    <span>Name:</span>
                                </div>
                                <div class='col-sm-10'>
                                    <input class="form-control" type="text" name="fullname" value="<?php echo $fullname ?>" readonly>
                                </div>
                                
                                <div class='col-sm-2'>
                                    <span>Age:</span>
                                </div>
                                <div class='col-sm-4'>
                                    <input class="form-control" type="text" name="age" value="<?php echo $age ?>" readonly>
                                </div>

                                <div class='col-sm-2'>
                                    <span>Birthdate:</span>
                                </div>
                                <div class='col-sm-4'>
                                    <input class="form-control" type="text" name="birthdate" value="<?php echo $bday ?>" readonly>
                                </div>

                                <div class='col-sm-2'>
                                    <span>Father's Name:</span>
                                </div>
                                <div class='col-sm-4'>
                                    <input class="form-control" type="text" name="father_name" value="<?php echo $father_name ?>">
                                </div>

                                <div class='col-sm-2'>
                                    <span>Mother's Maiden Name:</span>
                                </div>
                                <div class='col-sm-4'>
                                    <input class="form-control" type="text" name="mother_name" value="<?php echo $mother_name ?>">
                                </div>

                                <div class='col-sm-2'>
                                    <span>Address:</span>
                                </div>
                                <div class='col-sm-10'>
                                    <input class="form-control" type="text" name="mail_address"  value="<?php echo $min_address ?>" readonly>
                                </div>

                                <div class='col-sm-2'>
                                    <span>Marital Status:</span>
                                </div>
                                <div class='col-sm-4'>
                                    <input class="form-control" type="text" name="civil_status" value="<?php echo $civil_status ?>" readonly>
                                </div>

                                <div class='col-sm-2'>
                                    <span>Date of Marriage:</span>
                                </div>
                                <div class='col-sm-4'>
                                    <input class="form-control" type="text" name="dom" value="<?php echo $dom ?>" readonly>
                                </div>

                                <div class='col-sm-2'>
                                    <span>Name of Spouse:</span>
                                </div>
                                <div class='col-sm-10'>
                                    <input class="form-control" type="text" name="spouse_name" value="<?php echo $spouse_name ?>" readonly>
                                </div>

                                <div class='col-sm-2'>
                                    <span>Solemnizing Official:</span>
                                </div>
                                <div class='col-sm-4'>
                                    <input class="form-control" type="text" name="s_official" value="<?php echo $solemnizing_official ?>">
                                </div>

                                <div class='col-sm-2'>
                                    <span>Place of Solemnized:</span>
                                </div>
                                <div class='col-sm-4'>
                                    <input class="form-control" type="text" name="s_place" value="<?php echo $solemnizing_place ?>">
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>Children:</b></span>
                                </div>
                                <table border=1 style="width: 100%; margin-bottom:2em;">
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td><b>Birthdate</b></td>
                                    </tr>
                                    <?php 
                                    
                                        foreach($minister_children as $mc){
                                            $cdn_name = $mc['cdn_fullname'];
                                            $cdn_bday = $mc['cdn_bday'];
                                            echo"
                                            
                                                <tr>
                                                    <td>$cdn_name</td>
                                                    <td>$cdn_bday</td>
                                                </tr>
                                            
                                            
                                            "; 
                                        }
                                    ?>
                                </table>

                                <div class='col-sm-12'>
                                    <span><i>(If separated)</i> Reason for separation and present residence of former companion (Give particulars)</span>
                                </div>
                                <div class='col-sm-12'>
                                    <textarea name="if_separated" cols="100" rows="3"><?php echo $if_separated ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><i>(If engaged to be married)</i></span>
                                </div>
                                <div class='col-sm-12'>
                                    To whom: <input class="form-control" type="text" name="eng_name" style="width: 200px;" value="<?php echo $if_engaged_to ?>">
                                </div>
                                <div class='col-sm-12'>
                                    Is he/she a Christian? 
                                    <select name="eng_christian">
                                        <option value="<?php echo $if_engaged_christian ?>"><?php echo $if_engaged_christian ?></option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class='col-sm-12'>
                                    Is he/she a member in good standing of the Foursquare Church ?
                                    <select name="eng_good_stand">
                                    <option value=""><?php echo $if_engaged_member ?></option>
                                    </select>
                                </div>
                                <div class='col-sm-12'>
                                    Is he/she in symphaty with your ministry?
                                    <select name="eng_symp_ministry">
                                    <option value="<?php echo $if_engaged_symphaty ?>"><?php echo $if_engaged_symphaty ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                <div class='col-sm-12'>
                                    If not, explain <textarea name="eng_symp_ministry_no" cols="50" rows="1"><?php echo $if_engaged_not_symphaty ?></textarea>
                                </div>
                                <div class='col-sm-12'>
                                    Is he/she a minister?
                                    <select name="eng_minister">
                                    <option value="<?php echo $if_engaged_minister ?>"><?php echo $if_engaged_minister ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                <div class='col-sm-12'>
                                    Is he/she a graduate of Foursquare Bible College:
                                    <select name="eng_graduate_fbc">
                                    <option value="<?php echo $if_engaged_graduate_fbc ?>"><?php echo $if_engaged_graduate_fbc ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                <div class='col-sm-12'>
                                    When do you plan to get married?
                                    <input type="month" name="eng_plan_married" style="width: 200px;"  value="<?php echo $if_engaged_when_married ?>">
                                </div>

                                <div class='col-sm-12'>
                                    <p><b>Educational Attainment</b></p>
                                </div>

                                <table border=1 style="width: 100%; margin-bottom:2em;">
                                    <tr>
                                        <td><b>School</b></td>
                                        <td><b>Year</b></td>
                                        <td><b>Level</b></td>
                                    </tr>
                                    <?php 
                                    
                                        foreach($minister_education as $me){
                                            $school = $me['educ_school'];
                                            $year = $me['educ_year'];
                                            $level = $me['educ_level'];
                                            echo"
                                            
                                                <tr>
                                                    <td>$school</td>
                                                    <td>$year</td>
                                                    <td>$level</td>
                                                </tr>
                                            
                                            
                                            "; 
                                        }
                                    ?>
                                </table>

                                <div class='col-sm-5'>
                                    <span>Course taken in Bible College:</span>
                                </div>
                                <div class='col-sm-7'>
                                    <select name="course_fbc">
                                    <option value="<?php echo $course_bible_college ?>"><?php echo $course_bible_college ?></option>
                                    <option value="BTh">BTh</option>
                                    <option value="SMC">SMC</option>
                                    <option value="CMS">CMS</option>
                                    <option value="Others">Others</option>
                                    </select>
                                </div>

                                <div class='col-sm-12' style="margin-top: 1em;">
                                    <p><b>Christian Experience</b></p>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>A.</b> Year of Conversion:</span>
                                </div>

                                <div class='col-sm-6'>
                                    When:
                                    <input type="number" name="conversion_date" style="width: 200px;" value="<?php echo $year_conversion_when ?>">
                                </div>

                                <div class='col-sm-6'>
                                    Where?
                                    <input class="form-control" type="text" name="conversion_place" style="width: 200px;" value="<?php echo $year_conversion_where ?>">
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>B.</b> Have you received the Baptism of the Holy Spirit with the evidence of speaking in tongues? (Acts 2:4):</span>
                                </div>

                                <div class='col-sm-6'>
                                    When:
                                    <input type="number" name="hs_date" style="width: 200px;" value="<?php echo $year_baptized_when ?>">
                                </div>

                                <div class='col-sm-6'>
                                    Where?
                                    <input class="form-control" type="text" name="hs_place" style="width: 200px;" value="<?php echo $year_baptized_where ?>">
                                </div>

                                <div class='col-sm-12' style="margin-top: 1em;">
                                    <p><b>Ministerial Call and Experience</b></p>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>A.</b> Relate briefly your testimony concerning your call to the ministry.</span>
                                    <textarea name="testimony" cols="100" rows="5"><?php echo $testimony ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>B.</b> Relate briefly your ministerial activities since graduation.</span>
                                    <textarea name="min_act" cols="100" rows="5"><?php echo $ministerial_activities ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span>Name of churches you pioneered:</span>
                                    <textarea name="ch_pion" cols="100" rows="3"><?php echo $churches_pioneered ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span>Name of churches you have evangelized:</span>
                                    <textarea name="ch_evan" cols="100" rows="3"><?php echo $churches_evangelized ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>C.</b> Have you resigned, relinquished or withdrawn from pastorate for any reason? (if so, explain)</span>
                                    <textarea name="min_resigned" cols="100" rows="5"><?php echo $resigned_pastorate ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>D.</b> Are you at present giving your full time to the ministry? 
                                    <select name="fulltime_ministry">
                                    <option value="<?php echo $fulltime_ministry ?>"><?php echo $fulltime_ministry ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                    <i>(A full time minister is one who is depending upon his/her ministry for his/her livelihood, whose principal occupation is the
                                    ministry; his/her ministerial activities take the better part of seven days a week of work and he/she is not engaged in any outside
                                    employment.)
                                    </i></span>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>E.</b> Are you engaged in any secular employment, occupation or business? (if so, explain)</span>
                                    <textarea name="sec_emp" cols="100" rows="5"><?php echo $secular_employment ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>F.</b> Years you have received Foursquare credentials: Please indicate all the years applicable:</span>
                                    <textarea name="four_cre" cols="100" rows="4"><?php echo $foursquare_credentials ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>G.</b> Have you ever been licensed, ordained by another church, mission or denomination? (if so, explain)</span>
                                    <textarea name="another_ord" cols="100" rows="3"><?php echo $other_licensed ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>H.</b> Do you have a pending application for any type of credential with any other church, mission or
                                    denomination? (if so, explain)</span>
                                    <textarea name="pend_ord" cols="100" rows="3"><?php echo $pending_application ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>I.</b> Will you to the best of your ability work in harmony with those in authority over you?</span>
                                    <select name="authority">
                                    <option value="<?php echo $harmony_authority ?>"><?php echo $harmony_authority ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>J.</b> Do you pledge yourself to be 100% Foursquare-100% loyal first to Christ and then to the
                                    Foursquare Organization?</span>
                                    <select name="pledge">
                                    <option value="<?php echo $pledged_foursquare ?>"><?php echo $pledged_foursquare ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>K.</b> Are you teaching the principles of New Testament indigenous support of local ministers?</span>
                                    <select name="principles">
                                    <option value="<?php echo $teaching_principles ?>"><?php echo $teaching_principles ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                <div class='col-sm-12'>
                                    <span>Do you teach tithing?</span>
                                    <select name="tithing">
                                    <option value="<?php echo $teach_tithing ?>"><?php echo $teach_tithing ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                <div class='col-sm-12'>
                                    <span>Are you personally a consistent tither?</span>
                                    <select name="cons_tithing">
                                    <option value="<?php echo $consistent_tither ?>"><?php echo $consistent_tither ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>
                                <div class='col-sm-12'>
                                    <span>How is your ministry being supported?</span>
                                    <textarea name="min_supp" cols="100" rows="3"><?php echo $ministry_support ?></textarea>
                                </div>

                                <div class='col-sm-12' style="margin-top: 1em;">
                                    <p><b>Doctrinal Position</b></p>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>A.</b> Do you adhere to and accept in full the Foursquare Declaration of Faith as compiled by Aimee
                                    Semple McPherson, founder?</span>
                                    <select name="founder">
                                    <option value="<?php echo $declaration_faith ?>"><?php echo $declaration_faith ?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    </select>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>B.</b> State briefly your doctrinal position on the following:</span>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>1.</b> The Way of Salvation</span>
                                    <textarea name="way_salv" cols="100" rows="5"><?php echo $way_salvation ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>2.</b> The Eternal God (The Holy Trinity)</span>
                                    <textarea name="trin" cols="100" rows="5"><?php echo $holy_trinity ?></textarea>
                                </div>

                                <div class='col-sm-12'>
                                    <span><b>3.</b>  Eternal Security</span>
                                    <textarea name="eter_sec" cols="100" rows="5"><?php echo $eternal_security ?></textarea>
                                </div>

                                <div style="margin-top: 5em;">
                                <p><b><u>IMPORTANT NOTE TO THE APPLICANT</u></b></p>  
                                                <p>You are advised to submit all requirements with this application to your District Supervisor, including
                                your latest 2x2 pictures on the top right hand portion of page 1. Incomplete requirements will unduly delay
                                the processing of your application and may even disqualify you.</p>   
                                </div>

                                <div style="margin-top: 3em;">
                                <p><b><u>IMPORTANT NOTE TO THE DISTRICT SUPERVISOR</u></b></p>  
                                                <p>Please go over this application to check if <b>ALL</b> requirements have been Compiled with. DO NOT send
                                any incomplete application to the National Office. This application form will only be submitted, once the applicant have passed the interview.</p>   
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    </div>

                    </div>
                </div>
            </form>
        </div>
        <!-- END update modal summary -->
    <?php endforeach; ?>

   
</div>