<!DOCTYPE html>
<html>
<body>

<h1>Error Occured Dumy page</h1>

<p><?php echo $data['repassword_err'] ?></p><br>
<p><?php echo $data['role_err'] ?></p><br>
<p><?php echo $data['fname_err'] ?></p><br>
<p><?php echo $data['lname_err'] ?></p><br>
<p><?php echo $data['email_err'] ?></p><br>
<p><?php echo $data['telephone_err'] ?></p><br>
<p><?php echo $data['bday_err'] ?></p><br>
<p><?php echo $data['isExist']?"Exist":"Not exist" ?></p><br>
<div>
    <?php
        echo $data['result'];
    ?>
</div>



</body>
</html>