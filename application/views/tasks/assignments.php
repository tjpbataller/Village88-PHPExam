<?php
    $this->load->view("tasks/partials/header.php");
?>
    <!-- -->
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
            /* loop through tasks */
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
        <form action="../show" method="post">
            <input type="hidden" name="more" value="more">
            <input class="btn btn-success w-100" type="submit" name="submit" value="Show more">
        </form>
    </div>
</body>
</html>