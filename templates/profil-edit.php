<?php 
if(isset($check)){
    echo "<pre>";
    print_r($check);die();
}

?>
<?php include 'inc/header.php';?>

<div class="container emp-profile">
     <!-- <form action="profil.php" method="post">
      <input name="user_id"  type="hidden" value=<?= $user->id?>>
      <button type="submit" name="submit" value="My profil" class= "btn btn-warning color-dark"> Back  To My profil</button>
     </form> -->
            <form method="POST" action="edit-profil.php" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT" />
            <input name="user_id"  type="hidden" value=<?= $user->id?>>
            <?= $user->id ?>
                <div class="row">
                    <div class="col-md-4">
                    <!-- <input type="file" class="file " value=" Change Photo" name="image"> -->
                        <div class="profile-img">
                        <img src=images/<?=$myProfil->image??'avatar.jpg'?> alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="image" value="<?= $myProfil->image  ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <h4  class="display-5"><?= $user->name?><h4>
                                    </h5>
                                    <h6>

                                   <select class="form-control" name="category">
                                    <option value="0">Choose Category from List</option>
                                    <?php foreach($categories as $category):?>
                                    <option value="<?= $category->id?>" <?php if(isset($myProfil->category_id) && $myProfil->category_id == $category->id ):?> selected <?php endif;?>><?= $category->cat_name?></option>
                                   <?php endforeach;?>
                                   </select>
                                       
                                    </h6>
                                    <!-- <span class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                                    <div class="col-md-8">
                    <div class="row">
                    <div class="col-md-6">
                    <input type="text" name="about_me" value=" <?= $myProfil->about_me ?? 'About your self'?>"><br>
                   
                    </div>
                    <div class="col-md-6">
                    <input type="text" name="education" value=" <?= $myProfil->education ?? 'Your education'?>">
                   
                    </div>
                    </div>      
                    <label for="">Your CV</label>
                    <div class="col-md-10">

                    </div>
                    <input type="file" name="cv" value="<?= $myProfil->cv?>">
                    </div>
                            
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <input type="text" value= "<?=$myProfil->work_one ?? 'Your project one'?>" class="form-control" name="work_one">
                            <input type="text" value= "<?=$myProfil->work_two ?? 'Your project two' ?>" class="form-control" name="work_two">
                            <input type="text" value= "<?=$myProfil->work_three ?? 'Your project three'  ?>" class="form-control" name="work_three">
                            
                            <p>SKILLS</p>
                            <?php if(isset($myProfil->my_skills)):?>
                              <?php $skills = explode(' ',$myProfil->my_skills); ?>
                              <?php foreach($skills as $skill): ?>
                              <input class="tags" value="<?= $skill  ?>">
                             <?php endforeach; ?>
                             <span class="tags skills"></span>
                         </div> 
                          <?php else:?>
                          <span class="tags skills">Your skills</span>
                          <?php endif; ?>
                          <p   class="profile-edit-btn btn btn-success col-md-1 text-light" id="addSkill" >+</p>
                          <p   class="profile-edit-btn btn btn-success col-md-3 text-light" id="addSkills" >addSkills</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                            <?php if(isset($myProfil->my_skills)):?>
                             <input type ="submit" name="edit"  class="profile-edit-btn" value="Update Your Profil" >
                             <?php else:?>
                            <input type = "submit" name="submit"  class="profile-edit-btn" value="Create Your Profil" >
                            <?php endif; ?>
                         </div>

            </form>        
           
        </div>
      
        <?php include 'inc/footer.php';?>