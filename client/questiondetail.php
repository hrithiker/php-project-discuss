<div class="container mt-4">

    <!-- 🧾 Heading -->
    <h4 class="text-secondary fw-semibold border-bottom pb-2 mb-4">
        Question
    </h4>

    <div class="row">

        <!-- 🧠 Main Content -->
        <div class="col-12 col-lg-8">

            <?php
            include("./common/db.php");

            // ✅ Safer query
            $stmt = $conn->prepare("SELECT * FROM questions WHERE id = ?");
            $stmt->bind_param("i", $qid);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            ?>

            <!-- 📌 Question Card -->
            <div class="mb-2 p-3 border rounded bg-light">
                <h5 class="fw-bold mb-2">
                    <?= htmlspecialchars($row['title']) ?>
                </h5>
                <p class="mb-0 text-muted">
                    <?= nl2br(htmlspecialchars($row['description'])) ?>
                </p>
            </div>

            <!-- 💬 Answers Section -->
            <?php include("./client/answers.php"); ?>

            <!-- ✍️ Answer Box -->
            <div class="mt-2">

                <?php if (isset($_SESSION['user'])): ?>

                    <form action="./server/requests.php" method="post">
                        <input type="hidden" name="question_id" value="<?= $qid ?>">

                        <textarea
                            name="answer"
                            class="form-control mb-3"
                            placeholder="Write your answer..."
                            rows="4"
                            required></textarea>

                        <button type="submit" name="answer" class="btn btn-primary px-4">
                            Submit Answer
                        </button>
                    </form>

                <?php else: ?>

                    <!-- 🔒 Login Required -->
                    <a href="?login=true" class="btn btn-primary text-white text-decoration-none px-4">
                        Write Answer
                    </a>

                    <p class="text-muted mt-2">
                        Login required to post an answer.
                    </p>

                <?php endif; ?>

            </div>

        </div>

        <!-- 📂 Sidebar -->
        <div class="col-12 col-lg-4 mt-4 mt-lg-0">

            <div class="p-3 border rounded bg-white shadow-sm">

                <!-- 🔹 Title -->
                <h6 class="fw-semibold mb-3 text-secondary border-bottom pb-2">
                    Related Questions
                </h6>

                <?php
                $relatedQuery = "SELECT id, title FROM questions WHERE id != $qid ORDER BY id DESC LIMIT 5";
                $relatedResult = $conn->query($relatedQuery);

                foreach ($relatedResult as $r) {
                    echo "
                 <a href='?q-id={$r['id']}' 
                      class ='d-block px-2 py-2 rounded text-decoration-none text-dark related-link'>

                      <span class='me-2 text-primary fw-bold' style='font-size: 1.2rem;'>●</span>
                      " . htmlspecialchars($r['title']) . "
                     </a>";
                }
                ?>

            </div>

        </div>

    </div>
</div>