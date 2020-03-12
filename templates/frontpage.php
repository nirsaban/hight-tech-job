<?php include 'inc/header.php';?>

<main role="main">
<?php displayMessage();?>
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <?php if(!$_SESSION):?>
      <h1 class="display-3">Welcome Visitor To do Somthing Please Login</h1>
      <?php else: ?>
       <h1 class="display-3">welcome back <?= $_SESSION['name']?><?php if($_SESSION['role'] == 2): ?>See All Match<?php elseif($_SESSION['role'] == 1 ):?>Find Studentd and Create new job post <?php else:?>Find a Job<?php endif;?></h1><?php endif;?>
      <div class="row md-5 text-center">
      <form action="index.php" method="GET"> 
    <select name="category" class="form-control" id="">
    <option value="0">Choose Category</option>
    <?php foreach($categories as $category):?>
    <option value = <?= $category->id;?>><?= $category->cat_name;?></option>
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
    <?php if(!$_SESSION['role'] == 2 && !$_SESSION):?>
    <?php foreach($jobs as $job):?>
    <div class="row">
      <div class="col-md-10">
       <h6 class="text-muted"><?= $job->job_title; ?></h6>
       <p><?= $job->description ?> </p>
       <p><a class="btn btn-secondary checkLogin" <?php if(isset($_SESSION['id'])):?> href="job.php?id=<?=$job->id?>" <?php else:?> onclick="checklogin()"<?php endif?> role="button">View details &raquo;</a></p>
      <?php if($_SESSION['role'] == 1):?>
      <p><a  href="students.php?cat_id=<?=$job->category_id?>&amp;job_id=<?=$job->id?>" class="btn btn-primary"  role="button">See the student from this category &raquo;</a></p>
      <?php endif;?>
      </div>    
    </div>
    <hr>
    <?php endforeach;?>
  </div>
  <?php elseif($_SESSION['role'] == 2) :
    print_r($matches[1][0]->name)?>
    <div class="container" style="margin-top:10rem">
  <h2>List of matches</h2>
  
  <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>#</th>
        <th>Company</th>
        <th>The job</th>
        <th>Job Email</th> 
      </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < count($matches); $i++):?>
      <tr>
        <td><?= $matches[$i][0]->name;?></td>
        <td><?= $matches[$i][0]->email; ?></td>
        <td><i class="fas fa-heart"></i></td>
        <td><?= $matches[$i][0]->company; ?></td>
        <td><?= $matches[$i][0]->job_title; ?></td>
        <td><?= $matches[$i][0]->contact_email; ?></td>
      </tr>
      <?php endfor?>
    </tbody>
  </table>
</div>
  <?php endif;?>
 
</main>
<?php include 'inc/footer.php';?>
