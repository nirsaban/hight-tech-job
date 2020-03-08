<?php include 'inc/header.php';?>
<?php
 if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
}
?>
<main role="main">
<?php displayMessage();?>
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
<h1 class="display-3">welcome <?php if(isset($_SESSION['name'])):?> <?= " back $name" ?><?php endif;?>Find a Job</h1>
      <div class="row md-5 text-center">
      <form action="index.php" method="GET"> 
    <select name="category" class="form-control" id="">
    <option value="0">Choose Category</option>
    <?php foreach($categories as $category):?>
    <option value = <?= $category->id;?>><?= $category->name;?></option>
    <?php endforeach;?>
    </select>
    <input type="submit" name="submit" class="btn btn-success" value="Find ">
    </form>
    </div>
    </div>
    
  </div>
  
  <div class="container">

  
    <!-- Example row of columns -->
    <h2><?= $title?> </h2>
    <?php foreach($jobs as $job):?>
    <div class="row">
      <div class="col-md-10">
        <h6 class="text-muted"><?= $job->job_title; ?></h6>
        <p><?= $job->description ?> </p>
        <p><a class="btn btn-secondary" href="job.php?id=<?=$job->id?>" role="button">View details &raquo;</a></p>
      </div>    
    </div>
    <hr>
    <?php endforeach;?>
  </div>
  
  
   <!-- /container -->
</main>
<?php include 'inc/footer.php';?>
