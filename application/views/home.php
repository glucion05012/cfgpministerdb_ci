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
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody> 
            <?php foreach($ordination as $ord) : ?>
                <tr class="table-active"> 
                    <td><?php echo $ord['ord_id']; ?></td>
                    <td>Ordination Application</td>
                    <td><?php echo $ord['ord_district_status']; ?></td>
                    <td><?php echo $ord['ord_district_interview']; ?></td>
                    <td><?php echo $ord['ord_date_submitted']; ?></td>
                    <td><a href="ordination/summary/<?php echo $ord['ord_min_id'] ?>" data-toggle="modal" data-target="#acceptModal"><i class="fa fa-list-alt" style="font-size:24px; margin-left: 1em;"></i></a></td>

                </tr>   
            <?php endforeach; ?>
        
        </tbody>
    </table>

    <!-- MODAL FOR summary -->
    <div id="acceptModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Application Summary</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">  
                    <img src="<?= base_url('assets/images/CodeofEthics.png'); ?>" width="100%" height="100%">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
        <!-- END MODAL summary -->
</div>