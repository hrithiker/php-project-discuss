<div class="container mt-3 ">

  <h4 class="heading text-secondary fw-semibold border-bottom pb-2 mb-3">Ask A Question </h4>

    <form action="./server/requests.php" method="post">

      <div class="mb-3 col-6 offset-sm-3 ">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Enter question">
      </div>

      <div class="mb-3 col-6 offset-sm-3 ">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" placeholder="Enter question"></textarea>
      </div>

      <!-- <div class="col-6 offset-sm-3 margin-bottom-15">
    <label for="category" class="form-label">Category</label>
    <?php
    include("category.php");
    ?>
  </div> -->
      <div class="mb-3 col-6 offset-sm-3 ">
        <button type="submit" name="ask" class="btn btn-primary">Ask Question</button>

      </div>

    </form>

</div>