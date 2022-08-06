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
                    <td>Physics</td>
                    <td>Chemistry</td>
                    <td>Biology</td>
                    <td>EVS</td>
                    <td>Activity</td>
                </tr>
            </thead>
            <form action="" method="POST">
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
                        <input type="hidden" name="<?php echo $res['Roll']; ?>[]">
                        <td><input type="checkbox" class="checkbox" value="Physics" name="<?php echo $res['Roll']; ?>[]" id="" style="height:1.2rem;width:1.3rem;" <?php if(in_array('Physics',$completed)){echo 'checked="checked"';} ?> ></td>
                        <td><input type="checkbox" class="checkbox" value="Chemistry" name="<?php echo $res['Roll']; ?>[]" id="" style="height:1.2rem;width:1.3rem;" <?php if(in_array('Chemistry',$completed)){echo 'checked="checked"';} ?> ></td>
                        <td><input type="checkbox" class="checkbox" value="Biology" name="<?php echo $res['Roll']; ?>[]" id="" style="height:1.2rem;width:1.3rem;" <?php if(in_array('Biology',$completed)){echo 'checked="checked"';} ?> ></td>
                        <td><input type="checkbox" class="checkbox" value="EVS" name="<?php echo $res['Roll']; ?>[]" id="" style="height:1.2rem;width:1.3rem;" <?php if(in_array('EVS',$completed)){echo 'checked="checked"';} ?> ></td>
                        <td><input type="checkbox" class="checkbox" value="Activity" name="<?php echo $res['Roll']; ?>[]" id="" style="height:1.2rem;width:1.3rem;" <?php if(in_array('Activity',$completed)){echo 'checked="checked"';} ?> ></td>
                    </tr> 
                    <?php
                }
                ?>
                <tr>
                    <td><button id="clearchecksbtn">Clear All</button></td>
                    <td colspan=5 style="text-align:center;"><button name="submit-form">Submit</button></td>
                    <td><a href="index.php"style="color:red;" ><i class="fa-solid fa-house-chimney"></i> Home</a></td>
                    <td></td>
                </tr>
            </tbody>
            </form>
        </table>
    </div>
    <script>
        <?php
            include './js/client.js';
        ?>
    </script>
</body>
</html>
<?php
if(isset($_POST['submit-form'])){
    array_pop($_POST);
    foreach($_POST as $key => $value){
        $subjects = implode(',',$value);
        $updatequery = "UPDATE `assignments` SET `completed`='$subjects' WHERE roll='$key'";
        $query = mysqli_query($con,$updatequery);
    }
    ?>
    <script>
        location.replace('index.php');
    </script>
    <?php
}
?>