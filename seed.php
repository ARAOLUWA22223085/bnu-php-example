<?php

    //include("_includes/config.inc");
    //include("_includes/dbconnect.inc");
    include("_includes/functions.inc");

    // Creates a new instance of the Faker library
    $faker = Faker\Factory::create();

    // Connects to the database
    $db = new mysqli("localhost", "root", "", "cw2_students");

    $db->query("ALTER TABLE student ADD COLUMN profile_picture blob not null varchar(255)");
    
    // Deletes all records from the student table
    $db->query("DELETE FROM student");

    // Inserts a predefined record for a student with id 20000000
    $db->query("INSERT INTO student (studentid, password, dob, firstname, 
                lastname, house, town, county, country, postcode) 
                VALUES ('20000000', '$2y$10$.LJBOl64nZWEVVE/v5mgNuzR01zx1zoyXuGJUa/zp2U.MQxkps3LS', 
                '1974-11-10', 'Jon', 'Smith', '23 Victoria Road', 'High Wycombe', 
                'Bucks', 'UK', 'HP11 1RT');");

    // Resets the auto-increment value
    $db->query("ALTER TABLE student AUTO_INCREMENT = 1");

    // Loops through a range of student
    foreach(range(20000001,29999999) as $x) {
        $student_id = $x;

        // Inserts a new record into the student table using Faker generated data
        $db->query("
            INSERT INTO student (studentid, password, dob, firstname, 
            lastname, house, town, county, country, postcode)
            VALUES ('$student_id', '{$faker->password}', 
            '{$faker->date}', '{$faker->firstName}', '{$faker->lastName}', '{$faker->word}', 
            '{$faker->city}', '{$faker->city}', '{$faker->country}', '{$faker->postcode}')
        ");
    }



?>