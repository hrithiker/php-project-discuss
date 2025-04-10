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

    <div>
        <div class="col-8">
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
                echo "<div class='row question-list mb-3'>
                <h4 class='my-question'>
                    <a href='?q-id=$id'>$title</a>";

                if (isset($_GET["u-id"])) {
                    echo " <a href='./server/requests.php?delete=$id' class='delete-link ms-3'>Delete</a>";
                }

                echo "</h4></div>";
            }
            ?>
        </div>
    </div>
</div>