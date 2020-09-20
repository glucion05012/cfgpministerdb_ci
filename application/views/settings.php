<div class="content-wrapper">

    <div class='errormsg'>
            <?php echo validation_errors(); ?>
    </div>

    <div class='successmsg'>
        <?php if($this->session->flashdata('successmsg')): ?> 
            <p><?php echo $this->session->flashdata('successmsg'); ?></p>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <form action="<?= base_url('settings'); ?>" method="post" accept-charset="utf-8">
            <h1>Change your Password</h1>

            <div class="row" style='margin: 3em;'>
                <div class='col-sm-12'><input type="hidden" name='username' value='<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; } ?>'></div>
                
                <div class='col-sm-6'><b>Username:</b></div>
                <div class='col-sm-6'><b><h5><?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; } ?></b></h5></div>

                <div class='col-sm-6'><b>Enter your NEW password:</b></div>
                <div class='col-sm-6'><input type="password" name='new_password'></div>
                
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form
    </div>
</div>