<div class="container mt-3">

  <!-- ======================= -->
  <!-- 🧾 HEADING -->
  <!-- ======================= -->
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
      // =======================
      // 🔀 QUERY LOGIC
      // =======================

      if (isset($_GET["u-id"])) {

        $uid = (int)$_GET["u-id"];

        $query = "SELECT q.*, u.username 
                  FROM questions q
                  LEFT JOIN user u ON q.user_id = u.id
                  WHERE q.user_id = $uid";
      } elseif (isset($_GET["latest"])) {

        $query = "SELECT q.*, u.username 
                  FROM questions q
                  LEFT JOIN user u ON q.user_id = u.id
                  ORDER BY q.id DESC";
      } elseif (isset($_GET["search"])) {

        $search = $_GET["search"];

        $query = "SELECT q.*, u.username 
                  FROM questions q
                  LEFT JOIN user u ON q.user_id = u.id
                  WHERE q.title LIKE '%$search%'";
      } else {

        $query = "SELECT q.*, u.username 
                  FROM questions q
                  LEFT JOIN user u ON q.user_id = u.id";
      }


      // =======================
      // 📦 EXECUTE QUERY
      // =======================
      $result = $conn->query($query);


      // =======================
      // 🎯 DISPLAY QUESTIONS
      // =======================
      foreach ($result as $row) {

        $title = htmlspecialchars($row['title']);
        $id = (int)$row['id'];

        $username = htmlspecialchars($row['username'] ?? 'Anonymous');
        $created_at = isset($row['created_at'])
          ? date("d M Y", strtotime($row['created_at']))
          : "recently";

        echo "<div class='question-list mb-3 p-3'>
                <div class='d-flex justify-content-between'>
                    
                    <div class='flex-grow-1'>
                        <h5 class='mb-1'>
                            <a href='?q-id=$id' class='text-decoration-none'>$title</a>
                        </h5>

                        <div class='meta'>
                            <span class='user-badge'>👤 $username</span>
                            • 🕒 $created_at
                        </div>
                    </div>";

        // =======================
        // 🗑 DELETE BUTTON
        // =======================
        if (isset($_GET["u-id"])) {
          echo "<div class='flex-shrink-0'>
                    <a href='./server/requests.php?delete=$id' 
                       class='delete-link btn btn-outline-danger btn-sm'>
                       Delete
                    </a>
                </div>";
        }

        echo "  </div>
              </div>";
      }
      ?>

    </div>
  </div>
</div>