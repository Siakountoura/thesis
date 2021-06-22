<?php
    $k = $_POST['id'];
    $k = trim($k);
    $con = mysqli_connect("localhost", "root", "", "gradingsystem");
    $sql = "SELECT * FROM selections WHERE category='{$k}'";
    $res = mysqli_query($con, $sql);

    while($rows = mysqli_fetch_array($res)){
?>        
        <tr>
            <td> <?php echo $rows['grade4']; ?> </td>
            <td> <?php echo $rows['grade3']; ?> </td>
            <td> <?php echo $rows['grade2']; ?> </td>
            <td> <?php echo $rows['grade1']; ?> </td>
        </tr>
<?php

    }
    echo $sql;
?>