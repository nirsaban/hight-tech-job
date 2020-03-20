<?php include 'inc/header.php';?>
<?php if(isset($_SESSION)){
  $role = isset($_SESSION['role'])?$_SESSION['role']: '';
  $id_session = isset($_SESSION['id'])?$_SESSION['id']: '';
  $noProf = isset($noProf)?$noProf:'';
}
?>
<main role="main">
<?php displayMessage();?>
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <?php if(!$_SESSION):?>
      <h1 class="display-3">Welcome Visitor To do Somthing Please Login</h1>
      <?php else: ?>
       <h1 class="display-3">welcome back <?= $_SESSION['name']?><?php if($role == 2): ?>See All Match<?php elseif($role == 1 ):?>Find Studentd and Create new job post <?php else:?>Find a Job<?php endif;?></h1><?php endif;?>
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
    
    <?php if($role != 2 ):?>
    <?php foreach($jobs as $job):?>
    <div class="row">
      <div class="col-md-10">
       <h6 class="text-muted"><?= $job->job_title; ?></h6>
       <p><?= $job->description ?> </p>
    <p><a class="btn btn-secondary checkLogin" <?php if($id_session && $noProf == false):?> href="job.php?id=<?=$job->id?>" <?php elseif(!$id_session):?> onclick="checklogin()"<?php elseif($noProf == true):?> onclick="goToprofil(<?= $id_session?>)" <?php endif;?> role="button">View details &raquo;</a></p>
      <?php if($role == 1):?>
      <p><a  href="students.php?cat_id=<?=$job->category_id?>&amp;job_id=<?=$job->id?>" class="btn btn-primary"  role="button">See the student from this category &raquo;</a></p>
      <?php endif;?>
      </div>    
    </div>
    <hr>
    <?php endforeach;?>
  </div>
  
  <?php elseif($_SESSION['role'] == 2) :?>
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
        <th>Connection Now</th> 
      </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < count($matches); $i++):?>
      <tr>
        <td><?= $matches[$i][0]->name;?></td>
        <td ><?= $matches[$i][0]->email; ?></td>
        <td><i class="fas fa-heart"></i></td>
        <td><?= $matches[$i][0]->company; ?></td>
        <td><?= $matches[$i][0]->job_title; ?></td>
        <td><?= $matches[$i][0]->contact_email; ?></td>
        <?php $emailStudent = $matches[$i][0]->email; ?>
        <?php $emailJob = $matches[$i][0]->contact_email; ?>
         <td>  <button  href="#"  onclick = "sendEmail('<?= $matches[$i][0]->contact_email; ?>','<?= $matches[$i][0]->email; ?>','<?= $matches[$i][0]->company; ?>','<?= $matches[$i][0]->name;?>','<?= $matches[$i][0]->job_title; ?>','<?=$_SESSION['email']?>','<?= $matches[$i][0]->id; ?>','<?= $matches[$i][0]->user_id; ?>')"   class="btn btn-primary  "><i class="fas fa-envelope-square"></i></button></td>
      </tr>
      <?php endfor?>
    </tbody>
  </table>
</div>
    <?php endif;?>

</main>

<?php include 'inc/footer.php';?>
