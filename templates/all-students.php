<?php include 'inc/header.php';?>

<div class="container" style="margin-top:10rem">
  <h2>List of Students</h2>
  <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Category</th>
        <th>profil</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($students as $student):?>
      <tr>
        <td><?= $student->name;?></td>
        <td><?= $student->cat_name; ?></td>
        <?php $image = "images_$student->id"; ?>  
        <?php if(isset($student->image)):?>
          <td><a href="profil.php?id=<?=$student->id;?>">
           <img src="<?=$image;?>/<?=$student->image?>" height="42" width="42">
          <?php else:?>
           <img src= "images/avatar.jpg">
           <?php endif;?>
           </a></td>
      </tr>
      <?php endforeach?>
    </tbody>
  </table>
</div>