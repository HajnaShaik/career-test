<?php

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Collect form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $question1 = $_POST['question1'];
  $question2 = $_POST['question2'];
  $question3 = $_POST['question3'];

  // Connect to database
  $conn = new mysqli('localhost', 'username', 'password', 'database_name');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert form data into database
  $sql = "INSERT INTO mcq_form_data (name, email, question1, question2, question3)
          VALUES ('$name', '$email', '$question1', '$question2', '$question3')";

  if ($conn->query($sql) === TRUE) {
    echo "Form submitted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

?>