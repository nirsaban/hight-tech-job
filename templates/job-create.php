<?php include 'inc/header.php';?>

<main role="main">
<div class="jumbotron"> 
<h2 class="page-header"> Create  Job</h2>

</div>
<div class="container ">
    <div class="row align-items-center">
<form action="create.php" method="POST" class="col-md-6 p-10  " >
<div class="form-group">
<label for="">Company</label>
<input type="text" class="form-control" name="company">
</div>
<div class="form-group">
<label for="">Category</label>
<select class="form-control" name="category">
<option value="0">Choose Category from List</option>
<?php foreach($categories as $category):?>
<option value= <?= $category->id?>><?= $category->cat_name?></option>
<?php endforeach;?>
</select>
</div>
<div class="form-group">
<label for="">Job title</label>
<input type="text" class="form-control" name="job_title">
</div>
<div class="form-group">
<label for="">Description</label>
<input type="text" class="form-control" name="description">
</div>
<div class="form-group">
<label for="">location</label>
<input type="text" class="form-control" name="location">
</div>
<div class="form-group">
<label for="">Salary</label>
<input type="number" class="form-control" name="salary">
</div>

<div class="form-group">
<label for="">Phone number</label>
<input type="number" class="form-control" name="phone">
</div>
<div class="form-group">
<label for="">Email</label>
<input type="email" class="form-control" name="email"><br>
<input type="hidden" class="form-control" name="user_id" value=<?=$_SESSION['id']?>><br>
<input type="submit" name="submit" class="btn btn-danger" value="ADD NEW JOB">
</div>
</form>
</div>
</div>
</main>

<?php include 'inc/footer.php';?>