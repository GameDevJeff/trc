<?php
/**
* The below user class is defined in the project's root directory like so:
* myproject/profile/classes/user.php
*/
class user {
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $favoritecolor;
    protected $birthdate;
    protected $hobbies;
    private $password;

    public function calculate_age() {
    /**
    * TODO: Assuming $birthdate is stored in unix time, use PHP DateTime() to 
    * return the user's age inyears.
    */
        $today = new DateTime();
        $birthday = new DateTime("@$this->birthdate");
        $ageinepoch = $today->getTimestamp() - $birthday->getTimestamp();
        $ageoffset = new DateTime("@$ageinepoch");
        $age = $ageoffset->format('Y') - 1970;
        return $age;
    }

    public function get_hobbies() {
        return $this->hobbies;
    }
    
    /**
    * TODO: Using the properties that have already been defined for
    * this class, write a list of methods that could be useful in a read
    * only profile page.
    */
    public function get_id(){
        return $this->id;
    }
    
    public function get_name($format = null) {
        if($format == null) {
            return $this->firstname . ' ' . $this->lastname;
        }
        
        if($format == 'full') {
            return $this->firstname . ' ' . $this->lastname;
        }
        
        if($format == 'first') {
            return $this->firstname;
        }
        
        if($format == 'last') {
            return $this->lastname;
        }
        
        if($format == 'legal') {
            return $this->lastname . ', ' . $this->firstname;
        }
        
    }
    
    public function get_email() {
        return $this->email;
    }
    
    public function get_favoriteColor() {
        return $this->color;
    }
    
    public function get_birthday($quickformat = null) {
        
        $birthday = new DateTime("@$this->birthdate");
        if($quickformat == null) {
            return $birthday->format('m-d-y');
        }
        if($quickformat == 'us') {
            return $birthday->format('m-d-Y');
        }
        if($quickformat == 'eur') {
            return $birthday->format('d-m-Y');
        }
        if($quickformat == 'asia') {
            return $birthday->format('Y-m-d');
        }
        if($quickformat == 'data') {
            return $birthday->format('Y-m-d');
        }
        if($quickformat == 'casual') {
            return $birthday->format('M j');
        }
    }

}

?>
