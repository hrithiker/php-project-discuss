<div class="container">
    <div class="row">
        <div class="col-12">
            <h5 class="mb-3">Answers:</h5>

            <?php
            $query = "select * from answers where question_id=$qid";
            $result = $conn->query($query);
            foreach ($result as $row) {
                $answer = $row['answer'];
                echo "<div class='row mb-3'>
                        <div class='col-12'>
                            <div class='answer-wrapper p-3'>$answer</div>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </div>
</div>