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
        <h5><p style='margin-bottom: 0;'><b>APPLICATION FOR ORDINATION</b></p></h5>
        <p style='margin-bottom: 0;'><b>Church of the Foursquare Gospel in the Philippines, Inc</b></p>
        <p>1 F. Castillo St., Project 4, Quezon City</p>
        <br/>

        <?php 
            foreach($minister as $min){
                $fullname = $min['min_fullname'];
                $bday = $min['min_bday'];
                $age = floor((time() - strtotime($bday)) / 31556926);
                
            }
        ?>

        <div class="ordination-form">
            <div class="row">
                <div class='col-sm-2'>
                    <span>Name:</span>
                </div>
                <div class='col-sm-10'>
                    <input class="form-control" type="text" name="fullname" value="<?php echo $fullname ?>" readonly>
                </div>
                
                <div class='col-sm-2'>
                    <span>Age:</span>
                </div>
                <div class='col-sm-2'>
                    <input class="form-control" type="text" name="age" value="<?php echo $age ?>" readonly>
                </div>

                <div class='col-sm-2'>
                    <span>Birthdate:</span>
                </div>
                <div class='col-sm-6'>
                    <input class="form-control" type="text" name="birthdate" value="<?php echo $bday ?>" readonly>
                </div>
            </div>
        </div>
    </div>
    
</div>