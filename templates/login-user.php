<?php include 'inc/header.php';?>

<form action="login.php" style="margin-top:10rem;" class="col-md-6" method="POST">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" <?php if(isset($_POST['submit'])): ?>value="<?= htmlspecialchars($_POST['email']) ?? ' ' ?>"<?php endif;?>>
    <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" " name="password" <?php if(isset($_POST['submit'])): ?>value="<?= htmlspecialchars($_POST['password']) ?? ' ' ?>"<?php endif;?>>
    <span class="text-danger"><?= $errors['password'] ?? '' ?></span>
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-success" name="submit">Submit</button>
</form>
  <?php include 'inc/footer.php';?>