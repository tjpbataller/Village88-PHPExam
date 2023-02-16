<?php
    $this->load->view("tasks/partials/header.php");
?>
    <!-- -->
     <div class="container-fluid w-75">
        <form class="form d-flex mt-5" action="../filter" method="post">
            <h5 class="d-inline-block me-auto">All Assignments</h5>
            <label class="form-check-label me-1"><input class="form-check-input d-inline-block" type="checkbox" name="easy" value="true" <?= $easy==TRUE?"checked":""; ?>> Easy</label>
            <label class="form-check-label me-1"><input class="form-check-input" type="checkbox" name="intermediate" value="true" <?= $intermediate==TRUE?"checked":""; ?>> Intermediate</label>
            <select class="form-select form-select-sm d-inline-block w-50 me-1" name="track">
                <option value="">No Filter</option>
<?php       foreach($tracks as $track){
?>
                <option value="<?= $track["id"] ?>" <?= $track["id"]==$group?"selected":""; ?>><?= $track['name']?></option>
<?php       }
?>
            </select>
            <input class="btn btn-primary btn-sm d-inline-block" type="submit" value="Update">
        </form>
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
        <!-- <form action="../show" method="post">
            <input type="hidden" name="more" value="more">
            <input class="btn btn-success w-100" type="submit" name="submit" value="Show more">
        </form> -->
    </div>
</body>
</html>