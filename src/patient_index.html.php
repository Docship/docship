<?php
session_start();

?>

<!DOCTYPE html>
<html>
<body>

<h1>Patient index</h1>

<p>
    <?php
        echo $_SESSION['p_firstname']." welcome!";
    ?>
</p>

</body>
</html>
