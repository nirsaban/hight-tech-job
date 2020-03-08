<?php include 'inc/header.php';?>
<form action="signup.php" style="margin-top:10rem;" class="col-md-6" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name"  <?php if(isset($_POST['submit'])): ?>value="<?= htmlspecialchars($_POST['name']) ?? ' ' ?>"<?php endif;?>>
    <span class="text-danger"><?= $errors['name'] ?? ''?></span>
  </div>
  <div class="form-group">
    <label for="">Email address:</label>
    <input type="text" class="form-control" id="email" name="email"  <?php if(isset($_POST['submit'])): ?>value="<?= htmlspecialchars($_POST['email']) ?? ' ' ?>"<?php endif;?>>
    <span class="text-danger"><?= $errors['email'] ?? '' ?></span>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control"  name="password"  <?php if(isset($_POST['submit'])): ?>value="<?= htmlspecialchars($_POST['password']) ?? ' ' ?>"<?php endif;?>>
    <span class="text-danger"><?= $errors['password'] ?? ''?></span>
  </div>
  <div class="form-group">
    <label for="pwd">Password confirm:</label>
    <input type="password" class="form-control" id="pwd" name="password_confirm"  <?php if(isset($_POST['submit'])): ?>value="<?= htmlspecialchars($_POST['password_confirm']) ?? ' ' ?>"<?php endif;?>>
  </div>
  <select class="form-control" name="role">
<option value="0">Choose Your role</option>
<option value="1">Placement Department</option>
<option value="2">Employers</option>
<option value="3">graduate</option>
</select>
  <!-- <div class="form-group">
    <label for="CV">Your CV</label>
    <input type="file" class="form-control" id="pwd" name="cv" >
    <span class="text-danger"><?= $errors['cv'] ?? '' ?></span>
  
  </div> -->
  <input type="submit" class="btn btn-success" value="submit" name="submit">
</form>
  <?php include 'inc/footer.php';?>