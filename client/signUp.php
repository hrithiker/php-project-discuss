<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="text-center mb-4">
                <h1>Sign Up</h1>
            </div>

            <form action="./server/requests.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>

                <div class="mb-3">
                    <button type="submit" name="signup" class="btn btn-primary w-100">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>