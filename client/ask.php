<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
      <h4 class="heading text-secondary fw-semibold border-bottom pb-2 mb-3 text-center">Ask A Question</h4>

      <form action="./server/requests.php" method="post">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="Enter question title" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" class="form-control" id="description" placeholder="Enter question description" rows="5" required></textarea>
        </div>

        <!-- <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <?php
                    include("category.php");
                    ?>
                </div> -->

        <div class="mb-3 text-center">
          <button type="submit" name="ask" class="btn btn-primary w-100 w-md-auto px-4">Ask Question</button>
        </div>
      </form>
    </div>
  </div>
</div>