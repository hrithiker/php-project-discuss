<?php
function getAvatarColor($name)
{
    $colors = [
        '#0d6efd', // blue
        '#198754', // green
        '#dc3545', // red
        '#ffc107', // yellow
        '#6f42c1', // purple
        '#20c997', // teal
        '#fd7e14', // orange
    ];

    $index = ord(strtoupper($name[0])) % count($colors);
    return $colors[$index];
}
?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['user'] ?? null;
$username = $user['username'] ?? null;
$userId = $user['user_id'] ?? null;
?>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="./">
            <img src="./public/discuss.webp" alt="logo" style="height:40px; margin-right:8px;">
            <span class="brand-text">Discuss</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link active" href="./">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="?latest=true">Latest</a>
                </li>

                <?php if ($username): ?>

                    <li class="nav-item">
                        <a class="nav-link" href="?ask=true">+ Ask</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?u-id=<?php echo $userId ?>">My Questions</a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="?signup=true">SignUp</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?login=true">Login</a>
                    </li>

                <?php endif; ?>
            </ul>

            <!-- Search -->
            <!-- <form class="d-flex me-3 mt-3 mt-lg-0" action="">
                <input class="form-control search-box me-2" name="search" type="search" placeholder="Search...">
                <button class="btn btn-primary" type="submit">Search</button>
            </form> -->
            <form class="search-wrapper me-3 mt-3 mt-lg-0" action="">
                <input class="form-control search-box" name="search" type="search" placeholder="Search...">
                <button class="search-btn" type="submit">🔍</button>
            </form>

            <!-- User badge / logout -->
            <?php if ($username): ?>
                <div class="user-controls mt-3 mt-lg-0">
                    <?php
                    $firstLetter = strtoupper(substr($username, 0, 1));
                    $bgColor = getAvatarColor($username);
                    ?>

                    <div class="nav-avatar me-2" style="background-color: <?= $bgColor ?>;">
                        <?= $firstLetter ?>
                    </div>

                    <a href="./server/requests.php?logout=true" class="btn btn-sm btn-outline-danger">
                        Logout
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</nav>