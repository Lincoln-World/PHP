<?php
    include_once "classes/employee.php";
    $employee_instance = new Employee();
    $employees= $employee_instance->selectAllEmployees();

    $emp=$employee_instance->selectAllTeachers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <?php include "components/navbar.php";?>
    <div class="container">
    <?php
        var_dump($emp);
    ?>
        <table class="table">
            <tr>
                <th>id</th>
                <th>FIRST_NAME</th>
                <th>LAST_NAME</th>
                <th>GENDER</th>
                <th>AGE</th>
                <th>OCCUPATION</th>
                <th>INCOME</th>
                <th>MARRIED</th>
            </tr>
            <?php foreach($employees as $employee){?>
            <tr>
                <td><?php echo $employee['id'];?></td>
                <td><?php echo $employee['firstName'];?></td>
                <td><?php echo $employee['lastName'];?></td>
                <td><?php echo $employee['gender'];?></td>
                <td><?php echo $employee['age'];?></td>
                <td><?php echo $employee['occupation'];?></td>
                <td><?php echo $employee['income'];?></td>
                <td><?php echo $employee['married'];?></td>
            </tr>
            <?php
            }?>
        </table>
   </div>
</body>