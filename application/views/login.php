<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Style CSS -->
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style.css">

</head>
<body>

<form class="form-login" action="<?= base_url('login'); ?>" method="post" accept-charset="utf-8">
    <h1>Minister Profile</h1>
    <p>CHURCH OF THE FOURSQUARE GOSPEL IN THE PHILIPPINES</p>
    <div class="imgcontainer">
        <img src="<?= base_url('assets/logo/4squareLogo.jpg'); ?>" width="100" height="100">
    </div>
    <div>
        <p style="color: gray">Version 1.0.1.4</p>
    </div>

    <div class="container">

    <div class='errormsg'>
        <?php if($this->session->flashdata('errormsg')): ?> 
            <p><?php echo $this->session->flashdata('errormsg'); ?></p>
        <?php endif; ?>
    </div>

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
            
        <button type="submit">Login</button>
    </div>

 
</form>

</body>
</html>
