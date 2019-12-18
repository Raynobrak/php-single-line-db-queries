<?php

//
// Usage examples
//

// Simply require this one file :
require_once('db_functions.php');

// Execute SQL queries in 1 statement !
$results = executeQuery('SELECT * FROM t_user');

foreach($results as $user) {
    echo $user['username'];
}

// You can even use parameters !
$ok = executeNonQuery('DELETE from t_user WHERE username = :user', array(array('user', 'lucas')));

if($ok) {
    // All went well !
}

// A more complex example :
$ok = executeNonQuery(' INSERT INTO 
                        t_user
                        (username, pwd, email, register_date) 
                        VALUES
                        (:username, :pass, :mail, NOW())', 
                        array(
                            array('username', 'Bob'),
                            array('pass', md5('1234')),
                            array('mail', 'bob@bob.bob')
                        ));

if(!$ok) {
    // Oops, an error occurred !
}

?>