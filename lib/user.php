<?php 

class User{  
    private $db;
    private $data;
    private $dataLogin;
    public $row;
    public $errors = [];
    private static $filds = ['name','email','password','password_confirm'];
    public function __construct($data){
       
        $this->db = new Database();
        $this->dataLogin = $data;
        $this->data = $data;
    }
    public function validateForm(){

        foreach(self::$filds as $field){
            if(!array_key_exists($field,$this->data)){
            trigger_error("$field is not present in data");
            return;
            }
        }
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePassword();
        // $this->validateCv();
        if(empty($this->errors)){
            return true;
        }else{
            return false;
        }
          
    }
   private function validateUsername(){
    $val = trim($this->data['name']);
    if(empty($val)){
        $this->addError('name','Name canot be empty');
    }else{
        if(strlen($val) < 2){
            $this->addError('name','Name must be min 2 chars ');
        }
    }
    }
    public function validateEmail(){
        $val = trim($this->data['email']);
        if(empty($val)){
            $this->addError('email','email canot be empty');
           
        }else{
            $this->db->query("SELECT email from users WHERE email = :email");
            $this->db->bind(':email',$this->data['email']); 
           
            if( $this->db->single()){
                $this->addError('email','this email alreadey exist');
            }
            if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
                $this->addError('email','email must be a valid email');
            }
        }
    }

    public function validatePassword(){
        if(empty(trim($this->data['password'])) || empty(trim($this->data['password_confirm']))){
            $this->addError('password','your passwords inputs cann\'t be empty');
        }
        if($this->data['password'] != $this->data['password_confirm']){
            $this->addError('password','your passwords inputs no match');
        }if(strlen(trim($this->data['password'])) < 6 || strlen(trim($this->data['password'])) > 20 ){
            $this->addError('password','your passwords must be 6 - 20 chars');
        }
    }
   
    
    public function validateCv(){
        if (file_exists("cv/" . $_FILES["cv"]["name"])){  
            $this->addError('cv',$_FILES["cv"]["name"] . " already exists. ");
            }
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
    
    public function createNewUser(){
        
        $this->db->query("INSERT INTO users(name,email,password,role)VALUES(:name,:email,:password,:role)");
            $this->db->bind(':name',$this->data['name']);
            $this->db->bind(':email',$this->data['email']);
            $this->db->bind(':password',password_hash($this->data['password'], PASSWORD_BCRYPT));
            $this->db->bind(':role',$this->data['role']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
    }
    private function addError($key,$val){
        $this->errors[$key] = $val;
    }
    public function login(){
        $this->db->query("SELECT * FROM users WHERE email = :email LIMIT 1");
        $this->db->bind(':email',$this->dataLogin['email']);
        $this->row = $this->db->single();
        if($this->row){
            if(password_verify($this->dataLogin['password'], $this->row->password)){    
                return true;
            } else{
            $this->addError('password','invalid your email or password');
            return false;
        }
        }else{
            $this->addError('email','this email not registred please sign up ');
            return false;
        }
    }
    public function getUser(){
        $this->db->query("SELECT * FROM users WHERE id = :id ");
        $this->db->bind(':id',$this->data);
        $this->row = $this->db->single();
        return $this->row;
    }
    public function getAllStudent(){
        $this->db->query("SELECT profil.image,categories.cat_name,users.name,users.id FROM profil 
        INNER JOIN categories
        ON profil.category_id = categories.id
        JOIN users ON users.id = profil.user_id  ORDER BY users.name ASC");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getStudentByCat($id){
        $this->db->query("SELECT profil.image,profil.about_me,categories.cat_name,users.name,users.id FROM profil 
        INNER JOIN categories
        ON profil.category_id = categories.id
        JOIN users ON users.id = profil.user_id WHERE  profil.category_id = $id ORDER BY users.name ASC");
        $result = $this->db->resultSet();
        return $result;
    }
}
// "SELECT profil.*,categories.cat_name,users.name FROM profil 
//         INNER JOIN categories
//         ON profil.category_id = categories.id
//           JOIN users ON users.id = profil.user_id 



