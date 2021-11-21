<!DOCTYPE html>
<html>
<body>

<h1>Error Occured</h1>
<p><?php echo $data['role'] ?></p><br/>

<div>
    <?php
        foreach($data['result'] as $m){
            echo $m;
        }
    ?>
</div>


</body>
</html>