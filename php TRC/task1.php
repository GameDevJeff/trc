<?php 
/** 
* The first block of code, just before the user class is assumed to live in the project's root directory like so:  myproject/profile/index.php 
* 
* TODO: Modify this code such that the following code style is used: https://docs.moodle.org/dev/Coding_style * TODO: Fix any obvious errors and be on the look out for any TODO's 
*/ 

$user = new user($SESSION->userid); // Assume $SESSION gets you all you need. 
echo('<h1>My profile</h1>'); 
echo "Hi, my name is $user->firstname $user->lastname. "; 
echo 'I am ' . $user->calculate_age() . ' years old. '; 
if ($user->calculate_age() > 35) { 
    echo "I'm old enough to run for President of the United States if I really ".
         "wanted to! That's pretty cool if you  ask me.";
} 
if ($user->hobbies) { 
    foreach ($user->hobbies as $foo) { 
    echo "<li>$foo</li>";
    
    }
}
echo 'And that about sums up my profile. Thanks for reading until the very end!'; 
echo "<div style=display:none>$user->password</div>"; 
?>
