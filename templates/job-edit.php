<?php include 'inc/header.php';?>

<main role="main">
<div class="jumbotron"> 
<h2 class="page-header"> Edit  Job</h2>

</div>
<div class="container ">
    <div class="row align-items-center">
<form action="edit.php?id=<?=$job->id?>" method="POST" class="col-md-6 p-10  " >
<input type="hidden" name="id" value = "<?=$job->id?>">
<div class="form-group">
<label for="">Company</label>
<input type="text" class="form-control" name="company" value = <?=$job->company?>>
</div>
<div class="form-group">
<label for="">Category</label>
<select class="form-control" name="category">
<option value="0">Choose Category from List</option>
<?php foreach($categories as $category):?>
    <?php if($job->category_id == $category->id):?>
        <option value= <?= $category->id?> selected><?= $category->cat_name?></option>
<?php else:?>
<?php endif?>

<?php endforeach;?>
</select>
</div>
<div class="form-group">
<label for="">Job title</label>
<input type="text" class="form-control" name="job_title" value = "<?=$job->job_title?>">
</div>
<div class="form-group">
<label for="">Description</label>
<input type="text" class="form-control" name="description" value = "<?=$job->description?>">
</div>
<div class="form-group">
<label for="">location</label>
<input type="text" class="form-control" name="location" value = "<?=$job->location?>">
</div>
<div class="form-group">
<label for="">Salary</label>
<input type="text" class="form-control" name="salary" value = "<?=$job->salary?>">
</div>

<div class="form-group">
<label for="">Phone number</label>
<input type="number" class="form-control" name="phone" value = "<?=$job->contact_user?>">
</div>
<div class="form-group">
<label for="">Email</label>
<input type="email" class="form-control" name="email" value =" <?=$job->contact_email?>"><br>
<input type="submit" name="submit" class="btn btn-danger" value="Update JOB">
</div>
</form>
</div>
</div>
</main>

<?php include 'inc/footer.php';?>