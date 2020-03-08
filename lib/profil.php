<?php

class Profil{

    private $db;
    private $data;
    public function __construct($prof){
        $this->db = new Database();
        $this->data = $prof;
    }
    public function getProfil($id){
        $this->db->query("SELECT profil.*,categories.cat_name,users.name FROM profil 
        INNER JOIN categories
        ON profil.category_id = categories.id
          JOIN users ON users.id = profil.user_id 
          WHERE profil.user_id = :user_id ");
        $this->db->bind(':user_id',$id);
        $row = $this->db->single();
        return $row;
    }

    public function updateProfil(){
        $this->uploadCv();
        $this->uploadImage();  
    // $image = $this->getProfil($this->data['user_id'])->image;
    // $cv = $this->getProfil($this->data['user_id'])->cv;
    // if($cv != $this->data['cv']){
    //     $this->uploadCv();
    // }
    // if($image != $this->data['image']){
    //     $this->uploadImage();   
    // }
    $this->db->query("UPDATE profil set category_id = :category_id,image = :image,
     work_one = :work_one,work_two = :work_two,work_three = :work_three,my_skills =:my_skills,about_me = :about_me,
     cv=:cv,education=:education WHERE id  = :id ");
      $this->db->bind(':id',$this->data['user_id']);
      $this->db->bind(':category_id',$this->data['category']); 
       $this->db->bind(':image',$this->data['image']); 
       $this->db->bind(':work_one',$this->data['work_one']);
       $this->db->bind(':work_two',$this->data['work_two']);
       $this->db->bind(':work_three',$this->data['work_three']);
       $this->db->bind(':my_skills',$this->data['skills']);
       $this->db->bind(':about_me',$this->data['about_me']);
       $this->db->bind(':cv',$this->data['cv']);
       $this->db->bind(':education',$this->data['education']);
      
      if($this->db->execute()){
          return true;
      }else{
          return false;
      }
    }
    public function editProfil(){
      
       $this->uploadCv();
       $this->uploadImage(); 
        $this->db->query("INSERT INTO profil(user_id,category_id,image,work_one,work_two,work_three,my_skills,about_me,cv,education)
        VALUES(:user_id,:category_id,:image,:work_one,:work_two,:work_three,:my_skills,:about_me,:cv,:education)");
        $this->db->bind(':user_id',$this->data['user_id']);
        $this->db->bind(':category_id',$this->data['category']); 
         $this->db->bind(':image',$this->data['image']); 
         $this->db->bind(':work_one',$this->data['work_one']);
         $this->db->bind(':work_two',$this->data['work_two']);
         $this->db->bind(':work_three',$this->data['work_three']);
         $this->db->bind(':my_skills',$this->data['skills']);
         $this->db->bind(':about_me',$this->data['about_me']);
         $this->db->bind(':cv',$this->data['cv']);
         $this->db->bind(':education',$this->data['education']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
}
public function uploadCv(){
        define('UPLOAD_MAX_SIZE', 1024 * 1024 * 20);
        $ex = ['jpg', 'jpeg', 'png', 'gif', 'bpm', 'pdf', 'doc', 'docx'];
        if (!empty($_FILES['cv']['name'])) {
          if (is_uploaded_file($_FILES['cv']['tmp_name'])) {
          if ($_FILES['cv']['size'] <= UPLOAD_MAX_SIZE && $_FILES['cv']['error'] == 0) {     
                $file_info = pathinfo($_FILES['cv']['name']);
                $file_ex = strtolower($file_info['extension']);        
          if (in_array($file_ex, $ex)) {        
                  move_uploaded_file($_FILES['cv']['tmp_name'], "cv/" . $_FILES['cv']['name']);
                  $this->data['cv'] = $_FILES['cv']['name'];
                  }
              }
          } 
         $this->data['cv'] = $_FILES['cv']['name'];
      }
}
public function uploadImage(){
    define('UPLOAD_MAX_SIZE', 1024 * 1024 * 20);
    $ex = ['jpg', 'jpeg', 'png', 'gif', 'bpm', 'pdf', 'doc', 'docx'];
    if (!empty($_FILES['image']['name'])) {
      if (is_uploaded_file($_FILES['image']['tmp_name'])) {
      if ($_FILES['image']['size'] <= UPLOAD_MAX_SIZE && $_FILES['image']['error'] == 0) {     
            $file_info = pathinfo($_FILES['image']['name']);
            $file_ex = strtolower($file_info['extension']);        
      if (in_array($file_ex, $ex)) {        
              move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $_FILES['image']['name']);
              $this->data['image'] = $_FILES['image']['name'];
              }
          }
      } 
     $this->data['image'] = $_FILES['image']['name'];
  }
}
}