<?php 

class Template{

    protected $template;
    //create propety that contain array 
    protected $vars = array();
    //set the path from objects to property
    public function __construct($template){
        $this->template = $template;
    }
    //get the values of property that create automaticlly
    public function __get($key){
        //return vars['title']
        return $this->vars[$key];
    }
    //if create new property with value this method set the property in key on array $vars and value of the key
    public function __set($key,$value){
    // 'set values to vars["title"] = joblist';
    $this->vars[$key] = $value;

    }
    //if you echo the object from this class this method care of the functionallity
    public function __toString(){
        //convert the key from vars array to variable with value of the key
        extract($this->vars);
        //chdir - change directory to the directory that got in
        //dirname - get path and return the parent dir of this path 
        //now templates/frontpage.php sit in the root directory
       chdir(dirname($this->template));
        //
        ob_start();
        //include this component
        include basename($this->template);
        //get correct buffer output end delete the old
        return ob_get_clean();
    }
}



?>