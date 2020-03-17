<?php include 'inc/header.php';

?>
<div class="container">
<div class="row" style="margin-top:10rem">
<h5 class="">Do you think I fit into this job?
   A marker I liked and the placement department would contact us </h5>
<?php foreach($studentByCat as $student):?>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images_<?=$student->id?>/<?=$student->image ??'avatar.jpg'?>" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title"><?=$student->name ?></h5>
    <p class="card-text"><?= $student->about_me?></p>
    <a href="profil.php?id=<?=$student->id?>" class="btn btn-primary">Go To my profil </a>

<!-- <button  href="#"  onclick="sendError(this)"  id="Like<?=$student->id?>" class="btn btn-primary <?= $student->name?> "><i class="far fa-thumbs-up"></i></button> -->

  <button  href="#"  onclick="addLike(<?=$student->id?>,<?=$_GET['job_id']?>,'employers_messages')"  id="Like<?=$student->id?>" class="btn btn-primary <?= $student->name?> "><i class="far fa-thumbs-up"></i></button>
 
</div>
</div>

<?php endforeach;
?>
</div>
</div>

<?php include 'inc/footer.php'; ?>