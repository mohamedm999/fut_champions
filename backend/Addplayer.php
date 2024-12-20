<?php        

include "./backend/config.php";
    
    
if (!$conn) {
    $response['message'] = 'Database connection failed: ' . mysqli_connect_error();
} else {
    
    $username = mysqli_real_escape_string($conn, $username);
    $photo_path = mysqli_real_escape_string($conn, $upload_path);


    
    // Insert data into the database
    $query = "INSERT INTO personne_info (nom,photo) VALUES ('$username', '$photo_path')";
    
    $var = mysqli_query($conn, $query);


    if ($var) {
        $response['success'] = true;
        $response['message'] = 'Form submitted and data saved successfully!';
    } else {
        $response['message'] = 'Error inserting data: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}


?>