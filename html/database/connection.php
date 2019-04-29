<?php
$servername = "db";
$username = "root";
$password = "root";

//if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//    echo 'We don\'t have mysqli!!!';
//} else {
//    echo 'Phew we have it!';
//}

$conn = new mysqli($servername, $username, $password, "socialmedia");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE TABLE friendship(
   friendship_id INT AUTO_INCREMENT PRIMARY KEY,
   fk_user_1 INT,
   fk_user_2 INT
);");

$conn->query("CREATE TABLE users(
   user_id INT AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(40),
   password VARCHAR(255),
   email VARCHAR(255)
);");


$conn->query("CREATE TABLE posts(
   post_id INT AUTO_INCREMENT PRIMARY KEY,
   text VARCHAR(4000),
   fk_user_id INT
);");

$conn->query("CREATE TABLE friendship_posts(
   friendship_post_id INT AUTO_INCREMENT PRIMARY KEY,
   fk_user_id INT,
   fk_post_id INT
);");

$conn->query("ALTER TABLE `friendship` ADD CONSTRAINT `fk_user_1` FOREIGN KEY ( `fk_user_1` ) REFERENCES `users` ( `user_id` );");
$conn->query("ALTER TABLE `friendship` ADD CONSTRAINT `fk_user_2` FOREIGN KEY ( `fk_user_2` ) REFERENCES `users` ( `user_id` );");
$conn->query("ALTER TABLE `posts` ADD CONSTRAINT `fk_user_id` FOREIGN KEY ( `fk_user_id` ) REFERENCES `users` ( `user_id` );");
$conn->query("ALTER TABLE `friendship_posts` ADD CONSTRAINT `fk_user_id` FOREIGN KEY ( `fk_user_id` ) REFERENCES `users` ( `user_id` );");
$conn->query("ALTER TABLE `friendship_posts` ADD CONSTRAINT `fk_post_id` FOREIGN KEY ( `fk_post_id` ) REFERENCES `posts` ( `post_id` );");