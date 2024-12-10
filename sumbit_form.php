<?php
    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $ddname = "form";


    // Email notification details
    $recipient_email = "zeeshanrazakhan78@gmail.com"; // Update with your email address
    $subject = "New Form Submission";

    // Create connection

    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Form submission handling

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escape user inputs for security
        $name = $conn->real_escape_string($_POST['name']);
        $mobile = $conn->real_escape_string($_POST['email']);
        $email = $conn->real_escape_string($_POST['father_name']);
        $message = $conn->real_escape_string($_POST['address']);
    
        // SQL query to insert data into the database
        $sql = "INSERT INTO contact_form (name, email,father_name, adress) VALUES ('$name', '$email', '$mobile', '$address')";

        if ($conn->query($sql) === TRUE) {
            // Send email notification
            $email_message = "New Form Submission\n\nName: $name\nemail: $email\nmobile: $mobile\naddress: $address";
            mail($recipient_email, $subject, $email_address);
    
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

// Close the database connection
$conn->close();
?>
?>