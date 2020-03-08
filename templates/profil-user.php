<?php include 'inc/header.php';?>

<div class="container emp-profile">

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src=images/<?=$myProfil->image??'avatar.jpg'?> alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                       <?= $myProfil->name ?? $user->name; ?>
                                    </h5>
                                    <h6>
                                       <?= $myProfil->cat_name ?? 'Your specialty'?>
                                    </h6>
                                    <div class="col-xs-12 col-sm-8">
                                        <?php $def = 'default.pdf' ?>
                                    <iframe  src='cv/<?= $myProfil->cv ?? $def?>' width='500px' style='height:350px'></iframe>
                   
                    <p><strong>About: </strong> <?=$myProfil->about_me ?? 'About Your Self';?></p>
                    <p><strong>Education </strong><?= $myProfil->education ?? 'Your Education';?> </p>
                    <p><strong>Skills: </strong>
                    <?php if(isset($myProfil->my_skills)):?>
                        <?php $skills = explode(' ',$myProfil->my_skills); ?>
                           <?php foreach($skills as $skill): ?>
                            <span class="tags"><?= $skill ?? 'Your skills'; ?></span>
                           <?php endforeach; ?>
                      </div> 
                    <?php else:?>
                      <span class="tags">Your skills</span>
                      <?php endif; ?>
                        </div>
                    </div>
                    <div class="row col-md-12">
                    <div class="col-md-12">
                    <div class="profile-work">
                            <p>WORK LINK</p>
                            <a class="text-primary col-md-4"  href="<?=$myProfil->work_one ?? '#'?>"><?=$myProfil->work_one ?? 'You First project';?></a><br/>
                            <a class="text-primary col-md-4" href="<?=$myProfil->work_two?>"><?=$myProfil->work_two ?? 'You second project'; ?></a><br/>
                            <a class="text-primary col-md-4" href="<?=$myProfil->work_three?>"><?=$myProfil->work_three ?? 'You third project';?></a><br/>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <div class="col-md-2">
                      <a href="edit-profil.php?id=<?=$user->id?>"  class="profile-edit-btn" >Edit Profil</a>
                    </div>
               
              
        </div>
      
        <?php include 'inc/footer.php';?>