<?php include 'inc/header.php';?>



<!-- <h2 class="page-header"><?php echo $job->job_title ?> (<?= $job->location;?>)</h2><br>
<small>Posted By <?= $job->company?><br>
 on <?= $job->created_at?></small>
 <hr>
 <p class="lead"><strong>description</strong><?= $job->description; ?> </p>
 <ul class="list-group">
 <li class="list-group-item"><strong>Company</strong><?= $job->company;?></li>
 <li class="list-group-item"><strong>Salary</strong><?= $job->salary;?></li>
 <li class="list-group-item"><strong>Contact Email</strong><?= $job->contact_email;?></li>
 </ul> -->
 <br><br>
 <div class="container">
 <a href="index.php" class="btn btn-primary">Go Back</a></div>
 <div class="card col-md-6"  style="margin-top:10rem;margin: 0 auto;" >
  <div class="card-body">
    <h2 class="card-title page-header"><?php echo $job->job_title ?> (<?= $job->location;?>)</h2>
    <small>Posted By <?= $job->company?><br>
  on :<?= $job->created_at?></small>
  <hr>
 <ul class="list-group">
 <li class="list-group-item"><strong>Company-</strong> <?= $job->company;?></li>
 <li class="list-group-item"><strong>about job-</strong> <?= $job->description; ?></li>
 <li class="list-group-item"><strong>Salary-</strong> <?= $job->salary;?></li>
 <li class="list-group-item"><strong>Contact Email-</strong> <?= $job->contact_email;?></li>
 </ul>
    <a href="edit.php?id=<?=$job->id?>" class="btn btn-warning">Edit</a>
    <a href="job.php?del_id=<?=$job->id?>" class="btn btn-danger">Delete</a>
   
  </div>
</div>


<?php include 'inc/footer.php';?>