<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Style CSS -->
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style.css">

</head>
<body>
<div class="content-wrapper">
<div class='errormsg'>
        <?php echo validation_errors(); ?>
</div>
    <div class="form-group">
    <?php 
        foreach($ordination as $ord){
            $ord_id = $ord['ord_id'];
        }
    ?>
    <form action="<?= base_url('forms/ordination/recommendation/'.$ord_id); ?>" method="post" accept-charset="utf-8">
        <div class="imgcontainer">
            <img src="<?= base_url('assets/logo/4squareLogo.jpg'); ?>" width="100" height="100">
        </div>
            <h1><p style='margin-bottom: 0;'><b>RECOMMENDATION FOR ORDINATION</b></p></h1>
            <p style='margin-bottom: 0;'><b>Church of the Foursquare Gospel in the Philippines, Inc</b></p>
            <p>1 F. Castillo St., Project 4, Quezon City</p>
            <br/>

            <?php 
                foreach($minister as $min){
                    $min_id = $min['min_id'];
                    $fullname = $min['min_fullname'];
                }
            ?>
        <input type='hidden' name='ord_id' value='<?php echo $ord_id ?>'>
        <input type='hidden' name='date_submited' value='<?php date_default_timezone_set('Asia/Manila'); echo date('F j, Y g:i:a  '); ?>'>
        <div class="ordination-form">
            <table>
                <tr>
                    <td>Name of Applicant:</td>
                    <td><input class="form-control" type="text" name="applicant" value="<?php echo $fullname ?>" readonly></td>
                </tr>

                <tr>
                    <td>How long have you known the applicant? </td>
                    <td><textarea name="long_knonwn" cols="100" rows="3"></textarea></td>
                </tr>

                <tr>
                    <td>In what capacity have you known the applicant? </td>
                    <td><textarea name="capacity" cols="100" rows="3"></textarea></td>
                </tr>

                <tr>
                    <td>Do you have reasons to believe that the applicant will remain permanently in the ministry? </td>
                    <td><textarea name="permanent" cols="100" rows="3"></textarea></td>
                </tr>

                <tr>
                    <td>As far as you know, is the applicant doctrinally Foursquare? </td>
                    <td><textarea name="doctrinally" cols="100" rows="3"></textarea></td>
                </tr>

                <tr>
                    <td>In your opinion, has the applicant shown an attitude of loyalty to the Church of the Foursquare Gospel? </td>
                    <td><textarea name="loyalty" cols="100" rows="3"></textarea></td>
                </tr>

                <tr style="line-height:60px">
                    <td colspan=2>Please select from the dropdown your choiced answer, which in your opinion, best describes the applicant in the following respects:</td>
                </tr>

                <tr>
                    <td>Spirituality</td>
                    <td>
                    <select name="spirituality">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Dependability</td>
                    <td>
                    <select name="dependability">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Intelligence</td>
                    <td>
                    <select name="intelligence">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Initiative</td>
                    <td>
                    <select name="initiative">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Personality</td>
                    <td>
                    <select name="personality">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Domestic Adjustment (spouse & children)</td>
                    <td>
                    <select name="adjustment">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Relationship with others</td>
                    <td>
                    <select name="relationship">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Personal Appearance </td>
                    <td>
                    <select name="personal">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>General Health </td>
                    <td>
                    <select name="health">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Attitude towards financial obligations</td>
                    <td>
                    <select name="financial">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Dedication to the ministry </td>
                    <td>
                    <select name="dedication">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Ministerial Abilities </td>
                    <td>
                    <select name="abilities">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>A. Preaching</td>
                    <td>
                    <select name="preaching">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>B. Teaching</td>
                    <td>
                    <select name="teaching">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>C. Youth Ministry</td>
                    <td>
                    <select name="youth">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>D. Music </td>
                    <td>
                    <select name="music">
                        <option value="">Select</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td>Please write any additional comments or explanations which you feel may be helpful in our consideration of the applicant: </td>
                    <td><textarea name="comments" cols="100" rows="5"></textarea></td>
                </tr>

                <tr>
                    <td colspan=2 style="text-align: center; padding-top: 2em;"><b>Do you recommend that the applicant be granted ordination?</b> </td>
                </tr>
                <tr>
                    <td colspan=2 style="text-align: center">
                    <select name="recommend">
                        <option value="">----- PLEASE SELECT -----</option>
                        <option value="Yes">YES</option>
                        <option value="With reservation">With reservation </option>
                        <option value="No">NO</option>
                    </select>
                    </td>
                </tr>     

                <tr>
                    <td colspan=2 style="text-align: center; padding-top: 3em;">Type your <b>Name</b> followed by your <b>Position</b> to confirm the information stated above:</td>
                </tr> 
                <tr>
                    <td colspan=2><input class="form-control" type="text" name="recommender" placeholder="Lastname, Firstname Middlename - Position"></td>
                </tr>       
            </table>
        </div>

        <div class='center-button'>
            <button type='submit' class='btn btn-success' >Submit</button>
        </div> 
        </div>
    </form>

</body>
</html>
