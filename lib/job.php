<?php

class Job {


    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getAllJobs(){
        $this->db->query("SELECT jobs.*,categories.name as cname
          FROM jobs INNER JOIN categories
          ON jobs.category_id = categories.id 
          ORDER BY created_at DESC");

        //assign result set
        $result = $this->db->resultSet();
        return $result;
    }
    public function getCategories(){
        $this->db->query("SELECT * FROM categories");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getByCategory($category){
        $this->db->query("SELECT jobs.*,categories.name as cname
        FROM jobs INNER JOIN categories
        ON jobs.category_id = categories.id 
        WHERE jobs.category_id = $category
        ORDER BY created_at DESC");

      //assign result set
      $result = $this->db->resultSet();
      return $result;
    }
    public function getCategory($category_id){
        $this->db->query("SELECT * FROM categories WHERE id = :category_id");
        $this->db->bind(':category_id',$category_id);
        //assign row 
        $row = $this->db->single();
        return $row;
    }
    public function getJob($id){
        $this->db->query("SELECT * FROM jobs WHERE id = :job_id");
        $this->db->bind(':job_id',$id);
        $row = $this->db->single();
        return $row;

    }
    public function createNewJob($newJob){
        $this->db->query("INSERT INTO jobs(category_id,company,job_title,description,salary,location,contact_user,contact_email)VALUES(:category_id,:company,:job_title,:description,:salary,:location,:contact_user,:contact_email)");
        $this->db->bind(':category_id',$newJob['category']);
        $this->db->bind(':company',$newJob['company']);
        $this->db->bind(':job_title',$newJob['job_title']);
        $this->db->bind(':description',$newJob['description']);
        $this->db->bind(':salary',$newJob['salary']);
        $this->db->bind(':location',$newJob['location']);
        $this->db->bind(':contact_user',$newJob['phone']);
        $this->db->bind(':contact_email',$newJob['email']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){
        $this->db->query("DELETE FROM jobs WHERE id = $id");
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function update($id,$newJob){
        $this->db->query("UPDATE jobs set category_id = :category_id,company = :company,job_title = :job_title,description = :description ,salary = :salary,location = :location ,contact_user = :contact_user,contact_email = :contact_email WHERE id = $id");
        $this->db->bind(':category_id',$newJob['category']);
        $this->db->bind(':company',$newJob['company']);
        $this->db->bind(':job_title',$newJob['job_title']);
        $this->db->bind(':description',$newJob['description']);
        $this->db->bind(':salary',$newJob['salary']);
        $this->db->bind(':location',$newJob['location']);
        $this->db->bind(':contact_user',$newJob['phone']);
        $this->db->bind(':contact_email',$newJob['email']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}





?>