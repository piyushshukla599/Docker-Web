<?php
$cmd = $_GET['x'];
if (isset($_GET['y'])){
    $y = $_GET['y']; 
}
if (isset($_GET['z'])){
    $z = $_GET['z'];
}

switch($cmd){
    case "list":
        echo "<br />";
        echo "<pre>";
        $cmd2 = 'sudo docker ps';
        $content = system($cmd2, $ret);
        echo "</pre>";
        echo "<br />";
        break;
    case "images":
        echo "<br />";
        echo "<pre>";
        $cmd2 = 'sudo docker images';
        $content = system($cmd2, $ret);
        echo "</pre>";
        echo "<br />";
        break;
    case "run":
        echo "<br />";
        echo "<pre>";
        $cmd2 = "sudo docker run -dit $y:$z";
        $content = system($cmd2, $ret);
        echo "</pre>";
        echo "<br />";
        break;
    case "exec":
        echo "<br />";
        echo "<pre>";
        $cmd2 = "sudo docker exec -t $y $z";
        $content = system($cmd2, $ret);
        echo "</pre>";
        echo "<br />";
        break;
    case "rem":
        echo "<br />";
        echo "<pre>";
        $cmd2 = "sudo docker rm $y --force";
        $content = system($cmd2, $ret);
        echo "</pre>";
        echo "<br />";
        break;
    case "remi":
        echo "<br />";
        echo "<pre>";
        $cmd2 = "sudo docker rmi $y --force";
        $content = system($cmd2, $ret);
        echo "</pre>";
        echo "<br />";
        break;
}
?>
