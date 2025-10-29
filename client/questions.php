<div class="container mt-3">
    <h4 class="heading text-secondary fw-semibold border-bottom pb-2 mb-3">
        <?php
        if (isset($_GET["u-id"])) {
            echo "My Questions";
        } else if (isset($_GET["latest"])) {
            echo "Latest Questions";
        } else {
            echo "All Questions";
        }
        ?>
    </h4>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <?php
            include("./common/db.php");

            if (isset($_GET["u-id"])) {
                $uid = (int)$_GET["u-id"];
                $query = "SELECT * FROM questions WHERE user_id = $uid";
            } else if (isset($_GET["latest"])) {
                $query = "SELECT * FROM questions ORDER BY id DESC";
            } else if (isset($_GET["search"])) {
                $query = "select * from questions where `title` LIKE '%$search%' ";
            } else {
                $query = "SELECT * FROM questions";
            }

            $result = $conn->query($query);

            foreach ($result as $row) {
                $title = htmlspecialchars($row['title']);
                $id = (int)$row['id'];
                echo "<div class='question-list mb-3 p-3'>
                        <div class='d-flex justify-content-between align-items-center'>
                            <h5 class='mb-0 flex-grow-1 me-3'>
                                <a href='?q-id=$id' class='text-decoration-none'>$title</a>
                            </h5>";

                if (isset($_GET["u-id"])) {
                    echo "<div class='flex-shrink-0'>
                            <a href='./server/requests.php?delete=$id' class='delete-link btn btn-outline-danger btn-sm'>Delete</a>
                          </div>";
                }

                echo "</div></div>";
            }
            ?>
        </div>
    </div>
</div>