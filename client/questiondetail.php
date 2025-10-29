<div class="container mt-3">
    <h4 class="heading text-secondary fw-semibold border-bottom pb-2 mb-3">Questions</h4>

    <div class="row">
        <!-- Main Content - becomes full width on mobile -->
        <div class="col-12 col-lg-8">
            <?php
            include("./common/db.php");
            $query = "select * from questions where id = $qid";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();

            echo "<h4 class='question-title mb-3'>Question: " . htmlspecialchars($row['title']) . "</h4>
                   <p class='mb-4'>" . htmlspecialchars($row['description']) . "</p>";

            include("./client/answers.php");
            ?>

            <form action="./server/requests.php" method="post">
                <input type="hidden" name="question_id" value="<?php echo $qid ?>">
                <textarea name="answer" class="form-control mb-3" placeholder="Your answer..." rows="4"></textarea>
                <button class="btn btn-primary w-100 w-md-auto">Submit your answer</button>
            </form>
        </div>

        <!-- Sidebar - stacks below on mobile -->
        <div class="col-12 col-lg-4 mt-4 mt-lg-0">
            <!-- <?php
                    $categoryQuery = "select name from category where id=$cid";
                    $categoryResult = $conn->query($categoryQuery);
                    $categoryRow = $categoryResult->fetch_assoc();
                    echo "<h5 class='mb-3'>" . ucfirst($categoryRow['name']) . "</h5>";
                    $query = "select * from questions where category_id=$cid and id!=$qid";
                    $result = $conn->query($query);
                    foreach ($result as $row) {
                        $id = $row['id'];
                        $title = $row['title'];

                        echo "<div class='question-list mb-2'>
                <h6><a href=?q-id=$id>$title</a></h6>
                </div>";
                    }
                    ?> -->
        </div>
    </div>
</div>