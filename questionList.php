<?php
    include "security.php";
    $_SESSION["role"] = "admin";
    include "header.php";
    include "dbConnection.php";
    include "dataTable.php";

    $id = $_GET["id"];
?>

<br>
<div class="card">
    <div class="card-header" style="font-size: 20px; font-weight: 500;">
        Question List
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" style="width: 100%;" id="question_table" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Option 1</th>
                <th scope="col">Option 2</th>
                <th scope="col">Option 3</th>
                <th scope="col">Option 4</th>
                <th scope="col">Answer</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $questionQuery = mysqli_query($conn, "SELECT question, option1, option2,
                                            option3, option4, answer FROM question WHERE examID='$id'");
                $questionRow = mysqli_fetch_row($questionQuery);
                $i = 1;
                do {
                    echo "<tr><td>$i</td>";
                    echo "<td>{$questionRow[0]}</td>";
                    echo "<td>{$questionRow[1]}</td>";
                    echo "<td>{$questionRow[2]}</td>";
                    echo "<td>{$questionRow[3]}</td>";
                    echo "<td>{$questionRow[4]}</td>";
                    echo "<td>{$questionRow[5]}</td>";
                    $questionRow = mysqli_fetch_row($questionQuery);
                    $i++;
                } while ($questionRow);
            ?>
            </tbody>
        </table>
    </div>
</div>
