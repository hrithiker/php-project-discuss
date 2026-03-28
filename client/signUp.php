<?php
// 🔒 Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>

<div class="container mt-5">

    <!-- 🧾 Title -->
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="mb-4">Sign Up</h1>
        </div>
    </div>

    <form action="./server/requests.php" method="POST" autocomplete="off">

        <!-- 👤 Username -->
        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="username" class="form-label">User Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="username"
                    id="username"
                    placeholder="Enter your name"
                    required>
            </div>
        </div>

        <!-- 📧 Email -->
        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="email"
                    placeholder="Enter your email"
                    required
                    autocomplete="username">
            </div>
        </div>

        <!-- 🔐 Password -->
        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="password"
                    placeholder="Create a password"
                    required
                    autocomplete="new-password">
            </div>
        </div>

        <!-- 🚀 Button -->
        <div class="row justify-content-center">
            <div class="mb-3 col-12 col-sm-8 col-md-6 col-lg-4 text-center">
                <button type="submit" name="signup" class="btn btn-primary w-100">
                    Sign Up
                </button>
            </div>
        </div>

    </form>

    <!-- 🔗 Extra link -->
    <div class="row">
        <div class="col-12 text-center mt-2">
            <small>
                Already have an account?
                <a href="?login=true">Login</a>
            </small>
        </div>
    </div>

</div>

<!-- 🔄 Clear password on reload -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const pwd = document.getElementById("password");
        if (pwd) pwd.value = "";
    });
</script>