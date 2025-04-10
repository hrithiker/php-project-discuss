<div class="container">
    
    <div class="col-12 text-center">
        <h1>Sign Up</h1>
    </div>
    <form action="./server/requests.php" method="POST">
        <div class="mb-3 col-6 offset-sm-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your name" aria-describedby="username">
        </div>
        <div class="mb-3 col-6 offset-sm-3">
            <label for="email" class="form-label">User email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="enter your email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-6 offset-sm-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" aria-describedby="password">
        </div>

        <div class="mb-3 col-6 offset-sm-3">
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </div>
    </form>
</div>