<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Assignments</title>
</head>
<body>
    <!-- 
        ui
        display all assignments
        show more
     -->
     <div class="container-fluid w-50">
        <h1>All Assignments</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Assignment</th>
                    <th>Sequence num</th>
                    <th>Level</th>
                    <th>Track</th>
                </tr>
            </thead>
            <tbody>
<?php
            foreach($tasks as $task){
?>
            <tr>
                <td><?= $task['assignment'] ?></td>
                <td><?= $task['sequence'] ?></td>
                <td><?= $task['level'] ?></td>
                <td><?= $task['track'] ?></td>
            </tr>
<?php
            }
?>
            </tbody>
        </table>
        <form action="../tasks/show" method="post">
            <input type="hidden" name="more" value="more">
            <input class="btn btn-success w-100" type="submit" name="submit" value="Show more">
        </form>
    </div>
</body>
</html>