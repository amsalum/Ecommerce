<?php
$con= mysqli_connect('localhost', 'root','', 'tutor');
if(!$con){
    echo 'connect error';
}
mysqli_close($con);
 ?>