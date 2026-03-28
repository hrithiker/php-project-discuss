<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discuss-project</title>
    <?php require_once('./client/commonFiles.php'); ?>
</head>

<body>

    <?php
    session_start();

    // =======================
    // ✅ DATABASE LOAD (ONLY HERE)
    // =======================
    require_once('./common/db.php');

    require_once('./client/header.php');

    $user = $_SESSION['user'] ?? null;
    $username = $user['username'] ?? null;


    // =======================
    // 🔀 ROUTING (UNCHANGED LOGIC)
    // =======================

    if (isset($_GET['signup']) && !$username) {

        require_once('./client/signUp.php');
    } elseif (isset($_GET['login']) && !$username) {

        require_once('./client/login.php');
    } elseif (isset($_GET['ask']) && $username) {

        require_once('./client/ask.php');
    } elseif (isset($_GET['q-id'])) {

        $qid = isset($_GET['q-id']) ? (int)$_GET['q-id'] : 0;

        require_once('./client/questiondetail.php'); // keeping your filename

    } elseif (isset($_GET['u-id']) && isset($_SESSION['user'])) {

        $uid = $_SESSION['user']['user_id'];
        require_once('./client/questions.php');
    } elseif (isset($_GET['u-id'])) {

        header("Location: ?login=true");
        exit();
    } elseif (isset($_GET['latest'])) {

        require_once('./client/questions.php');
    } elseif (isset($_GET['search'])) {

        $search = $_GET['search'];
        require_once('./client/questions.php');
    } else {

        require_once('./client/questions.php');
    }


    // =======================
    // 🔻 FOOTER
    // =======================
    require_once('./client/footer.php');
    ?>

    <!-- Bootstrap -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.navbar-nav a').forEach(link => {
                link.addEventListener('click', () => {
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                        new bootstrap.Collapse(navbarCollapse, {
                            toggle: true
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>