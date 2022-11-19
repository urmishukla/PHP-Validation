<?php
/*
Template Name: Testing
Template Post Type: page
*/

// redirect if the alphabet is not given

get_header();


    $firstName = $middleInitial = $lastName = $email = $pubMedID = $phone = $linkedin = "";
    $Err = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["first-name"])) {

            $firstNameErr = "Please enter a valid first name.";
            $err = true;
        }
        else
        {
            $firstName = test_input($_POST["first-name"]);
        }

        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName))
        {
            $firstNameErr = "Only letters and white space allowed.";
            $err = true;
        }


        if (empty($_POST["middle-initial"])) {

            $middleNameErr = "Please enter a valid initial.";
            $err = true;
        }
        else
        {
            $middleInitial = test_input($_POST["middle-initial"]);
        }

        if (!preg_match("/^[a-zA-Z-' ]*$/",$middleInitial))
        {
            $middleNameErr = "Only letters and white space allowed.";
            $err = true;
        }


        if (empty($_POST["last-name"])) {

            $lastNameErr = "Please enter a valid last name.";
            $err = true;
        }
        else
        {
            $lastName = test_input($_POST["last-name"]);
        }

        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName))
        {
            $lastNameErr = "Only letters and white space allowed.";
            $err = true;
        }

        if (empty($_POST["email"])) {

            $emailErr = "Please enter a valid email address.";
            $err = true;
        }
        else
        {
            $email = test_input($_POST["email"]);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "This email address is not formatted correctly.";
            $err = true;
        }

        if (empty($_POST["phone"])) {

            $phoneErr = "Please enter a valid phone number.";
            $err = true;
        }
        else
        {
            $phone = test_input($_POST["phone"]);
        }

        if(!preg_match("/^[0-9]*$/", $phone))
        {
            $phoneErr = "Only xxx-xxx-xxxx format accepted.";
            $err = true;
        }

        if (empty($_POST["linkedin"])) {

            $linkedinErr = "Please enter a valid URL.";
            $err = true;
        }
        else
        {
            $linkedin = test_input($_POST["linkedin"]);
        }

        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $linkedin))
        {
            $linkedinErr = "Please format URL correctly.";
            $err = true;
        }

        if (empty($_POST["pub-med-id"])) {

            $pubMedIDErr = "Please enter a valid ID number.";
            $err = true;
        }
        else
        {
            $pubMedID = test_input($_POST["pub-med-id"]);
        }

        if(!preg_match("/^[0-9]*$/", $pubMedID))
        {
            $pubMedIDErr = "Please format ID correctly.";
            $err = true;
        }

        $title = test_input($_POST["title"]);
       
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>


<?php if ((isset($_POST["submit"])) && ($Err == false)) {?>

<div class="results">
    <div id="text">
       
        <?php if ((empty($firstNameErr) && empty($middleNameErr) && empty($lastNameErr))) : ?>
            <b>Hello, <?php echo $_POST["first-name"];?> <?php echo $_POST["last-name"];?>! Here is your submitted information.</b><br>
            Name: <?php echo $_POST["first-name"]; ?> <?php echo $_POST["middle-initial"];?> <?php echo $_POST["last-name"];?></br>
        <?php else: ?>
            <b>Error: <?php echo $firstNameErr;?> <?php echo $middleNameErr;?> <?php echo $lastNameErr;?></b></br>
        <?php endif; ?>

        Nick Name: <?php

            if(isset($_POST["nick-name-box"]))
            {
                echo $_POST["nick-name"];
            }
            ?></br>

        <?php if ((empty($emailErr))) : ?>
            Email: <?php echo $_POST["email"]; ?>></br>
        <?php else: ?>
            <b>Error: <?php echo $emailErr;?></b></br>
        <?php endif; ?>

        <?php if ((empty($phoneErr))) : ?>
            Phone Number: <?php echo $_POST["phone"]; ?>></br>
        <?php else: ?>
            <b>Error: <?php echo $phoneErr;?></b></br>
        <?php endif; ?>

        <?php if ((empty($linkedinErr))) : ?>
            LinkedIn URL: <?php echo $_POST["linkedin"]; ?>></br>
        <?php else: ?>
            <b>Error: <?php echo $linkedinErr;?></b></br>
        <?php endif; ?>
    </div>
</div>
<?php } ?>





        <!--pageName: Testing-->
        <div id="page" class="content page-builder">
            <?php if (($Err = true) || !isset($_POST["submit"])) {?>
            <form class="form1" action="" method="post">
                <div class=line>
                    <div class="name">
                    </div>
                </div>
                <div class="line">
                    <div class="name">
                        <label for="first-name" title="First Name">First Name:</label>
                        <input type="text" name="first-name" id="first-name" placeholder="First Name" class="input-box" value=<?php echo $firstName?>></br>
                        <!-- <b>Error: First Name should not be empty</b> -->
                        <?php if (isset($_POST['submit']) && (!empty($firstNameErr))) : ?>
                            <b>Error: <?php echo $firstNameErr;?></b>
                        <?php endif; ?>
                    </div>
                    <div class="name">
                        <label for="middle-initial" title="Middle Initial">MI:</label>
                        <input type="text" name="middle-initial" id="middle-initial" placeholder="MI" class="input-box" value=<?php echo $middleInitial?>></br>
                        <?php if (isset($_POST['submit']) && (!empty($middleNameErr))) : ?>
                            <b>Error: <?php echo $middleNameErr;?></b>
                        <?php endif; ?>
                    </div>
                    <div class="name">
                        <label for="last-name" title="Last Name">Last Name:</label>
                        <input type="text" name="last-name" id="last-name" placeholder="Last Name" class="input-box"value=<?php echo $lastName?>></br>
                        <!-- <b>Error: Last Name should not be empty</b> -->
                        <?php if (isset($_POST['submit']) && (!empty($lastNameErr))) : ?>
                            <b>Error: <?php echo $lastNameErr;?></b>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="line">
                    <div class="name">
                        <label for="email" title="Email">Email:</label>
                        <input type="text" name="email" id="email" placeholder="Work Email" class="input-box"  value=<?php echo $email?>></br>
                        <?php if (isset($_POST['submit']) && (!empty($emailErr))) : ?>
                            <b>Error: <?php echo $emailErr;?></b>
                        <?php endif; ?>
                    </div>
                    <div class="name">
                        <label for="phone" title="Phone">Phone:</label>
                        <input type="text" name="phone" id="phone" placeholder="Phone Number" class="input-box" value=<?php echo $phone?>></br>
                        <?php if (isset($_POST['submit']) && (!empty($phoneErr))) : ?>
                            <b>Error: <?php echo $phoneErr;?></b>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="line">
                    <div class="name">
                        <label for="linkedin" title="LinkedIn">LinkedIn:</label>
                        <input type="text" name="linkedin" id="linkedin" placeholder="LinkedIn Profile URL" class="input-box" value=<?php echo $linkedin?>></br>
                        <?php if (isset($_POST['submit']) && (!empty($linkedinErr))) : ?>
                            <b>Error: <?php echo $linkedinErr;?></b>
                        <?php endif; ?>
                    </div>
                    <div class="name">
                        <label for="pub-med-id" title="pubMedID">pubMedID:</label>
                        <input type="text" name="pub-med-id" id="pub-med-id" placeholder="pubMedID" class="input-box" value=<?php echo $pubMedID?>></br>
                        <?php if (isset($_POST['submit']) && (!empty($pubMedIDErr))) : ?>
                            <b>Error: <?php echo $pubMedIDErr;?></b>
                        <?php endif; ?>
                    </div>
                </div>

            <input type="submit" name="submit" class="button" id="submit">
            </form>
            <?php } ?>
        </div>

<?php get_template_part( 'content-parts/content', 'lower' ); ?>

<?php get_footer();
