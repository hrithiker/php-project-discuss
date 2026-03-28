<div class="container">
    <div class="row">
        <div class="col-12">
            <h5 class="mb-3">Answers:</h5>

            <?php
            $query = "SELECT * FROM answers WHERE question_id=$qid";
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

    <!-- 🔽 ADD ANSWER SECTION -->
    <div class="row mt-2">
        <div class="col-12">

            <?php if (isset($_SESSION['user'])): ?>
            <?php else: ?>
            <?php endif; ?>

        </div>
    </div>
</div>