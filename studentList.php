<div class="card">
    <div class="card-header" style="font-size: 20px; font-weight: 500;">
        Student List
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" style="width: 100%;" id="student_table" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Course</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $studentQuery = mysqli_query($conn, "SELECT * FROM student");
                $studentRow = mysqli_fetch_row($studentQuery);
                $i = 1;
                do {
                    echo "<tr><td>$i</td>";
                    echo "<td>{$studentRow[0]}</td>";
                    echo "<td>{$studentRow[1]}</td>";
                    echo "<td>{$studentRow[2]}</td>";
                    echo "<td>{$studentRow[3]}</td>";
                    $studentRow = mysqli_fetch_row($studentQuery);
                    $i++;
                } while ($studentRow);
            ?>
            </tbody>
        </table>
    </div>
</div>
