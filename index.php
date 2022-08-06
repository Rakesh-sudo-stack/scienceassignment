<?php
include './connections/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
            include './css/style.css';
        ?>
    </style>
    <script src="https://kit.fontawesome.com/40bc81af5c.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        Science Work
    </header>
    <div class="body">
        <table>
            <thead>
                <tr>
                    <td>Roll</td>
                    <td>Name</td>
                    <td class="Physics">Physics</td>
                    <td class="Chemistry">Chemistry</td>
                    <td class="Biology">Biology</td>
                    <td class="EVS">EVS</td>
                    <td class="Activity">Activity</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectquery = "SELECT * FROM `assignments`";
                $response = mysqli_query($con,$selectquery);
                while ($res = mysqli_fetch_array($response)){
                    $completed = explode(',',$res['completed']);
                    ?>
                <tr>
                    <td class="roll"><?php echo $res['Roll']; ?></td>
                    <td><?php echo $res['Name']; ?></td>
                    <td><?php if(in_array('Physics',$completed)){echo '<i class="fa-solid fa-check"></i>';}else{echo '<i class="fa-solid fa-xmark"></i>';} ?></td>
                    <td><?php if(in_array('Chemistry',$completed)){echo '<i class="fa-solid fa-check"></i>';}else{echo '<i class="fa-solid fa-xmark"></i>';} ?></td>
                    <td><?php if(in_array('Biology',$completed)){echo '<i class="fa-solid fa-check"></i>';}else{echo '<i class="fa-solid fa-xmark"></i>';} ?></td>
                    <td><?php if(in_array('EVS',$completed)){echo '<i class="fa-solid fa-check"></i>';}else{echo '<i class="fa-solid fa-xmark"></i>';} ?></td>
                    <td><?php if(in_array('Activity',$completed)){echo '<i class="fa-solid fa-check"></i>';}else{echo '<i class="fa-solid fa-xmark"></i>';} ?></td>
                </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan=6><button id="printbtn" onclick="window.print()">Print</button></td>
                    <td colspan=7 style="text-align:right;"><a href="editPage.php"style="color:green;" ><i class="fa-solid fa-pen-to-square"></i> Edit </a></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>