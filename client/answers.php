<div class="container">

    <!-- ======================= -->
    <!-- 💬 ANSWERS HEADING -->
    <!-- ======================= -->
    <div class="row">
        <div class="col-12">
            <h5 class="mb-3">Answers:</h5>
        </div>
    </div>

    <!-- ======================= -->
    <!-- 📦 FETCH & DISPLAY -->
    <!-- ======================= -->
    <div class="row">
        <div class="col-12">

            <?php
            // DB already available from index.php

            $stmt = $conn->prepare("SELECT * FROM answers WHERE question_id = ?");
            $stmt->bind_param("i", $qid);
            $stmt->execute();
            $result = $stmt->get_result();

            // =======================
            // 🟡 NO ANSWERS
            // =======================
            if ($result->num_rows === 0) {
                echo "<p class='text-muted'>No answers yet. Be the first to answer!</p>";
            }

            // =======================
            // 🟢 ANSWER LIST
            // =======================
            foreach ($result as $row) {

                $answer = htmlspecialchars($row['answer']);

                echo "<div class='row mb-3'>
                        <div class='col-12'>
                            <div class='answer-wrapper p-3 border rounded bg-white shadow-sm'>
                                $answer
                            </div>
                        </div>
                    </div>";
            }

            $stmt->close();
            ?>

        </div>
    </div>

</div>