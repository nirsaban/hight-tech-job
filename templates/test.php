    <!-- <!-- <p><strong>Skills: </strong>
           <i data-col="my_skills" class="fas fa-edit"  onclick="edit(this.dataset)"   id="editSk"></i><i data-id="<?=$user->id?>" data-col ="my_skills" class=" fas fa-check-square updateSk" onclick= "update(this.dataset)"></i>
           <?php if(isset($myProfil->my_skills)):?>
                   <?php $arrSk =  json_decode($myProfil->my_skills)?>
                   <?php foreach($arrSk as $skill): ?>
                     <span class="tags"><?= $skill ?? 'Your skills'; ?></span>
                    <?php endforeach; ?>
                </div> 
              <?php else:?>
                      <span class="tags">Your skills</span>
               <?php endif; ?>
          </div>
      </div> -->
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
  
         
   </div> -->
