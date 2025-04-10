<div class="container">
    <div class="">
    <h5 style="text-align: left !important;">Answers:</h5>

        <?php
        $query = "select * from answers where question_id=$qid";
        $result = $conn->query($query);
        foreach ($result as $row) {
            $answer = $row['answer'];
            echo "<div class='row'>
<p class='answer-wrapper'>$answer</p>
</div>";
        }
        ?>
    </div>
</div>