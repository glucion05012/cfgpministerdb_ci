<div class="content-wrapper">

    <!-- MODAL FOR Requirements -->
    <div class="modal" id="requirementsModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ORDINATION REQUIREMENTS</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">  
                <img src="<?= base_url('assets/images/requirements.png'); ?>" width="100%" height="100%">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Accept and Continue</button>
            </div>

            </div>
        </div>
    </div>
    <!-- END MODAL FOR ADD ACTIVITY -->

    <div class="form-group">
    <form action="<?= base_url('ordination/create'); ?>" method="post" accept-charset="utf-8">
        <h5><p style='margin-bottom: 0;'><b>APPLICATION FOR ORDINATION</b></p></h5>
        <p style='margin-bottom: 0;'><b>Church of the Foursquare Gospel in the Philippines, Inc</b></p>
        <p>1 F. Castillo St., Project 4, Quezon City</p>
        <br/>

        <?php 
            foreach($minister as $min){
                $min_id = $min['min_id'];
                $fullname = $min['min_fullname'];
                $bday = $min['min_bday'];
                $age = floor((time() - strtotime($bday)) / 31556926);
                $civil_status = $min['min_cstatus'];
                $dom = $min['sp_date_marriage'];
                $spouse_name = $min['sp_fullname'];
                
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
                    <input class="form-control" type="text" name="father_name">
                </div>

                <div class='col-sm-2'>
                    <span>Mother's Maiden Name:</span>
                </div>
                <div class='col-sm-4'>
                    <input class="form-control" type="text" name="mother_name">
                </div>

                <div class='col-sm-2'>
                    <span>Mailing Address:</span>
                </div>
                <div class='col-sm-10'>
                    <input class="form-control" type="text" name="mail_address" >
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
                    <input class="form-control" type="text" name="s_official">
                </div>

                <div class='col-sm-2'>
                    <span>Place of Solemnized:</span>
                </div>
                <div class='col-sm-4'>
                    <input class="form-control" type="text" name="s_place">
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
                    <textarea name="if_separated" cols="100" rows="3"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><i>(If engaged to be married)</i></span>
                </div>
                <div class='col-sm-12'>
                    To whom: <input class="form-control" type="text" name="eng_name" style="width: 200px;">
                </div>
                <div class='col-sm-12'>
                    Is he/she a Christian? 
                    <select name="eng_christian">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class='col-sm-12'>
                    Is he/she a member in good standing of the Foursquare Church ?
                    <select name="eng_good_stand">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class='col-sm-12'>
                    Is he/she in symphaty with your ministry?
                    <select name="eng_symp_ministry">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class='col-sm-12'>
                    If not, explain <textarea name="eng_symp_ministry_no" cols="50" rows="1"></textarea>
                </div>
                <div class='col-sm-12'>
                    Is he/she a minister?
                    <select name="eng_minister">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class='col-sm-12'>
                    Is he/she a graduate of Foursquare Bible College:
                    <select name="eng_graduate_fbc">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class='col-sm-12'>
                    When do you plan to get married?
                    <input type="date" name="eng_plan_married" style="width: 200px;">
                </div>

                <div class='col-sm-12'>
                    <p><b>Educational Attainment</b></p>
                </div>

                <table border=1 style="width: 100%; margin-bottom:2em;">
                    <tr>
                        <td><b>Scgool</b></td>
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
                            <option value="">Select</option>
                            <option value="BTh">BTh</option>
                            <option value="Ministerial">Ministerial</option>
                            <option value="Christian Worker">Christian Worker</option>
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
                    <input type="number" name="conversion_date" style="width: 200px;">
                </div>

                <div class='col-sm-6'>
                    Where?
                    <input class="form-control" type="text" name="conversion_place" style="width: 200px;">
                </div>

                <div class='col-sm-12'>
                    <span><b>B.</b> Have you received the Baptism of the Holy Spirit with the evidence of speaking in tongues? (Acts 2:4):</span>
                </div>

                <div class='col-sm-6'>
                    When:
                    <input type="number" name="hs_date" style="width: 200px;">
                </div>

                <div class='col-sm-6'>
                    Where?
                    <input class="form-control" type="text" name="hs_place" style="width: 200px;">
                </div>

                <div class='col-sm-12' style="margin-top: 1em;">
                    <p><b>Ministerial Call and Experience</b></p>
                </div>

                <div class='col-sm-12'>
                    <span><b>A.</b> Relate briefly your testimony concerning your call to the ministry.</span>
                    <textarea name="testimony" cols="100" rows="5"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>B.</b> Relate briefly your ministerial activities since graduation.</span>
                    <textarea name="min_act" cols="100" rows="5"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span>Name of churches you pioneered:</span>
                    <textarea name="ch_pion" cols="100" rows="3"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span>Name of churches you have evangelized:</span>
                    <textarea name="ch_evan" cols="100" rows="3"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>C.</b> Have you resigned, relinquished or withdrawn from pastorate for any reason? (if so, explain)</span>
                    <textarea name="min_resigned" cols="100" rows="5"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>D.</b> Are you at present giving your full time to the ministry? 
                    <select name="fulltime_ministry">
                        <option value="">Select</option>
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
                    <textarea name="sec_emp" cols="100" rows="5"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>F.</b> Years you have received Foursquare credentials: Please indicate all the years applicable:</span>
                    <textarea name="four_cre" cols="100" rows="4" placeholder="ATP-YYYY
CW-YYYY
LM-YYYY
Reinstated-YYYY
"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>G.</b> Have you ever been licensed, ordained by another church, mission or denomination? (if so, explain)</span>
                    <textarea name="another_ord" cols="100" rows="3"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>H.</b> Do you have a pending application for any type of credential with any other church, mission or
                    denomination? (if so, explain)</span>
                    <textarea name="pend_ord" cols="100" rows="3"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>I.</b> Will you to the best of your ability work in harmony with those in authority over you?</span>
                    <select name="authority">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class='col-sm-12'>
                    <span><b>J.</b> Do you pledge yourself to be 100% Foursquare-100% loyal first to Christ and then to the
                    Foursquare Organization?</span>
                    <select name="pledge">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class='col-sm-12'>
                    <span><b>K.</b> Are you teaching the principles of New Testament indigenous support of local ministers?</span>
                    <select name="principles">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class='col-sm-12'>
                    <span>Do you teach tithing?</span>
                    <select name="tithing">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class='col-sm-12'>
                    <span>Are you personally a consistent tither?</span>
                    <select name="cons_tithing">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class='col-sm-12'>
                    <span>How is your ministry being supported?</span>
                    <textarea name="min_supp" cols="100" rows="3"></textarea>
                </div>

                <div class='col-sm-12' style="margin-top: 1em;">
                    <p><b>Doctrinal Position</b></p>
                </div>

                <div class='col-sm-12'>
                    <span><b>A.</b> Do you adhere to and accept in full the Foursquare Declaration of Faith as compiled by Aimee
                    Semple McPherson, founder?</span>
                    <select name="founder">
                        <option value="">Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class='col-sm-12'>
                    <span><b>B.</b> State briefly your doctrinal position on the following:</span>
                </div>

                <div class='col-sm-12'>
                    <span><b>1.</b> The Way of Salvation</span>
                    <textarea name="way_salv" cols="100" rows="5"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>2.</b> The Eternal God (The Holy Trinity)</span>
                    <textarea name="trin" cols="100" rows="5"></textarea>
                </div>

                <div class='col-sm-12'>
                    <span><b>3.</b>  Eternal Security</span>
                    <textarea name="eter_sec" cols="100" rows="5"></textarea>
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
        <div class='center-button'>
            <button type='button' name="createbtn" value='create_ca_as' class='btn btn-success' data-toggle="modal" data-target="#acceptModal">Continue</button>
        </div> 

        <!-- MODAL FOR agree -->
        <div id="acceptModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">MINISTER'S CODE OF ETHICS</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">  
                    <img src="<?= base_url('assets/images/CodeofEthics.png'); ?>" width="100%" height="100%">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Agree and Continue</button>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
                </div>

                </div>
            </div>
        </div>
        <!-- END MODAL FOR ADD ACTIVITY -->

    </form>
    </div>
    
</div>