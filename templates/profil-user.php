<?php include 'inc/header.php';?>
 <?php if($_SESSION['id'] == $user->id || $_SESSION['role'] == 1):?>
   
<div class="container emp-profile">

    <div class="row">
        <!-- image area -->
           
            <?php $image = "images_$user->id" ?>  
             <div class="col-md-4">
             <div class="profile-img">
            <?php if(isset($myProfil->image)):?>
             <img src= "<?=$image ?>/<?=$myProfil->image?>">
            <?php else:?>
            <img src= "images/avatar.jpg">
             <?php endif;?>
            
             <?php if($_SESSION['id'] == $user->id): ?>
             <form action="edit-profil.php" method="POST" enctype="multipart/form-data">
              <div class="file btn btn-sm btn-primary">
                Change Photo 
                <input type="file"   name="image" >
                </div></br>
               <input type="hidden" name="id" value=<?=$user->id?>></br>
               <div class="file btn btn-sm btn-primary">
               Add
               <input type="submit" class="btn btn-success col-md-8" value="Add Photo" name="submit">
             
              </form>
              </div>
      
             <?php endif;?>
              
                </div>
             </div>
        <div class="col-md-8">
            <div class="profile-head">
            <h5><?=  $user->name; ?></h5>
          <h4 >
          <?php if($_SESSION['id'] == $user->id): ?>
            <i class="fas fa-edit" data-col="category_id" onclick="edit(this.dataset)" id="edit"></i><i data-id="<?=$user->id?>" data-col ="category_id" class=" fas fa-check-square" onclick= "update(this.dataset)" id="update"></i>
             <?php endif;?>
            Category
             <?php if(isset($myProfil->cat_name)):?>
             <?= $myProfil->cat_name ?? 'Your category'?> 
             <?php endif;?> 
             <select class="form-control cat" name="category" style="display:none" id="profil_cat"  >
              <option value="0">Choose Category from List</option>
              <?php foreach($categories as $category):?>
               <option value="<?= $category->id?>" <?php if(isset($myProfil->category_id) && $myProfil->category_id == $category->id ):?> selected <?php endif;?>><?= $category->cat_name?></option>
              <?php endforeach;?>
              </select>
               
            </h4>
            <div class="col-xs-12 col-sm-8">
              <div id="about">
              <?php if($_SESSION['id'] == $user->id): ?> 
              <i data-col="about_me" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editAbout"></i><i data-id="<?=$user->id?>" data-col ="about_me" class=" fas fa-check-square updateAbout" onclick= "update(this.dataset)" ></i>
              <?php endif;?>
              <strong>About: </strong> <p class="aboutMe"> <?=$myProfil->about_me ?? 'About Your Self';?></p>
              </div>
              <div class="education">
              <?php if($_SESSION['id'] == $user->id): ?> 
              <i data-col="education" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editEd"></i><i data-id="<?=$user->id?>" data-col ="education" class=" fas fa-check-square updateEd" onclick= "update(this.dataset)"></i>
              <?php endif;?>
              <strong>Education:</strong>

              <?php if(isset($myProfil->education)):?>
              <ul class="list-group list-group-flush">
              <?php $arrEd =  json_decode($myProfil->education)?>
              <?php foreach($arrEd as $item): ?>
                   <li class="list-group-item"><?=$item ;?></li>
              <?php endforeach;?>
               </ul>
              <?php endif;?>
              </div>
              <div class="Skills">
              <?php if($_SESSION['id'] == $user->id): ?> 
              <i data-col="my_skills" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editSk"></i><i data-id="<?=$user->id?>" data-col ="my_skills" class=" fas fa-check-square updateSk" onclick="update(this.dataset)"></i>
              <?php endif;?>
              <strong>Skills:</strong>
                <?php if(isset($myProfil->my_skills)):?>
                <?php $arrSk =  json_decode($myProfil->my_skills)?>
                <?php foreach($arrSk as $skill): ?>
                    <span class="tags"><?= $skill ;?></span>
                <?php endforeach;?>
                <?php endif;?>
                </div>
                <div class="links">
                 <?php if($_SESSION['id'] == $user->id): ?> 
                 <i data-col="links" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editLi"></i><i data-id="<?=$user->id?>" data-col ="links" class=" fas fa-check-square updateLi" onclick="update(this.dataset)"></i>
                 <?php endif;?>
                <strong>WORK LINK</strong> <small>Max 3 links</small></br>
                <?php if(isset($myProfil->links)):?>
                <?php $arrLi =  json_decode($myProfil->links)?>
                <?php foreach($arrLi as $link): ?>
                    <a class="text-primary col-md-4"  href="<?= $link ?? '#'?>"><?=$link; ?></a><br/>
                <?php endforeach;?>
                <?php endif;?>
            
             </div>
          
        
                <!-- ///cv aread -->
              <?php $def = 'default.pdf' ?>
              <?php $cv = "cv_$user->id" ?>  
              <?php if(isset($myProfil->cv)):?>
              <iframe  src= "<?=$cv?>/<?= $myProfil->cv?>" width='250px' style='height:180px'></iframe>
              <?php else:?>
             <iframe  src="cv/default.pdf" width='250px' style='height:180px'></iframe>
             <?php endif;?>
               <?php if($_SESSION['id'] == $user->id): ?> 
               <form action="edit-profil.php" method="POST" enctype="multipart/form-data">
               <input type="file"   name="cv" >
               <input type="hidden" name="id" value=<?=$user->id?>>
               <input type="submit" class="btn btn-success col-md-8" value="Add cv" name="submit">
              </form>
              <?php endif;?>

   <?php include 'inc/footer.php';?>
               <?php else:?>

   <?php header('Location:login.php');?>
   <?php endif;?>