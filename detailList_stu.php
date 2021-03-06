<?php
    session_start();
    include "dataTable.php";
    include "dbConnection.php";
    include "header.php";
    $ex_id = $_GET["id"];
    $_SESSION['role'] = "student";
    $username = $_SESSION['user'];
?>
<script>
function goBack() {
  window.history.back();
}
$(document).ready(function(){
  $("button").hover(function(){
    $(this).css("background-color", "#0066cc");
    }, function(){
    $(this).css("background-color", "#0080ff");
  });
});
</script>
<br>
<div class="card">
    <div class="card-header" style="font-size: 20px; font-weight: 500;">
        Detail List
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" style="width: 100%;" id="detail_table" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Your Answer</th>
                <th scope="col">Correct Answer</th>
                <th scope="col">Result</th>
                <th scope="col">Marks Obtained</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM result JOIN question ON result.questionID = question.questionID WHERE result.studentID='$username' AND result.examID='$ex_id'";
                $detailQuery = mysqli_query($conn, $query);
                $detailRow = mysqli_fetch_assoc($detailQuery);
                $i = 0;
                do {
                    $i++;
                    //$detailRow = array_unique($detailRow);
                    echo "<tr><td>$i</td>";
                    echo "<td>".$detailRow['question']."</td>";
                    echo "<td>".$detailRow['studentAns']."</td>";
                    echo "<td>".$detailRow['correctAns']."</td>";
                    echo "<td>".$detailRow['result']."</td>";
                    if($detailRow['marks']>0)
                    {
                        echo "<td><span style=color:#13ec13;>".$detailRow['marks']."</span></td>";
                    }
                    else
                    {
                        echo "<td><span style=color:#ff0000;>".$detailRow['marks']."</span></td>";
                    }
                    //echo "<td>".$detailRow['marks']."</td>";
                    $detailRow = mysqli_fetch_assoc($detailQuery);
                } while ($detailRow);
            ?>
            </tbody>
        </table>
        <button onclick="goBack()" style="background-color: #0080ff; color:#FDFEFE; width:95; height:40; border-radius: 5px; border: 1px #3498DB; float: right;">Go Back</button>
    </div>
</div>
