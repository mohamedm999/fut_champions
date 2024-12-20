<?php
header('Content-Type: application/json');

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method';
    echo json_encode($response);
    exit;
}

$errors = false;


if (empty($_POST['nom_player'])) {
    $response['nameplayer'] = 'Username is required';
    $errors = true;
} else {
    $username = trim($_POST['nom_player']);
    if (strlen($username) < 3) {
        $response['nameplayer'] = 'Username must be at least 3 characters long';
        $errors = true;
    }
}

if(isset($_POST['positions'])) {
    if(empty($_POST['positions'])) {
        $response['positions'] = 'Please select an option from the select box.';
        $errors = true;
    } else if($_POST['positions'] === "GK") {

        $gk_stats = ['diving', 'handling', 'kicking', 'positioning', 'reflexes', 'speed'];
        
        foreach($gk_stats as $stat) {
            if(!isset($_POST[$stat]) || $_POST[$stat] === '') {
                $response[$stat] = "Please enter a value for $stat";
                $errors = true;
            } else {
                $value = $_POST[$stat];
                if(!is_numeric($value) || $value < 0 || $value > 100) {
                    $response[$stat] = "$stat must be a number between 0 and 100";
                    $errors = true;
                }
            }
        }
    }else{

        $player_stats = ['pace', 'shooting', 'passing', 'dribbling', 'defending', 'physical'];
            
        foreach($player_stats as $stat) {
            if(!isset($_POST[$stat]) || $_POST[$stat] === '') {
                $response[$stat] = "Please enter a value for $stat";
                $errors = true;
            } else {
                $value = $_POST[$stat];
                if(!is_numeric($value) || $value < 0 || $value > 100) {
                    $response[$stat] = "$stat must be a number between 0 and 100";
                    $errors = true;
                }
            }
        }}  
    }



if(isset($_POST['club_select'])) {

    if(empty($_POST['club_select'])) {

    $response['club_select'] = 'Please select an option from the select box.' ;
    $errors = true;

    }
}

if(isset($_POST['nationality_select'])) {

    if(empty($_POST['nationality_select'])) {

    $response['nationality_select'] = 'Please select an option from the select box.' ;
    $errors = true;

    }
}

if(isset($_POST['rating'])) {

    if(empty($_POST['rating'])) {

    $response['rating'] = 'rating is required.' ;
    $errors = true;

    }else if ($_POST['rating'] < 0 || $_POST['rating'] > 99) {
        $response['rating'] = 'Rating must be a number between 0 and 99.';
        $errors = true;
    }
}

if (!isset($_FILES['flag']) || $_FILES['flag']['error'] === UPLOAD_ERR_NO_FILE) {
    $response['flag'] = 'flag is required';
    $errors = true;
} else {

    if ($_FILES['flag']['error'] !== UPLOAD_ERR_OK) {
        $response['flag'] = 'Error uploading file';
        $errors = true;
    } else {
    
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['flag']['type'];
        if (!in_array($file_type, $allowed_types)) {
            $response['flag'] = 'Invalid file type. Only JPG, PNG, and GIF are allowed';
            $errors = true;
        }


        $max_size = 5 * 1024 * 1024; 
        if ($_FILES['flag']['size'] > $max_size) {
            $response['flag'] = 'File is too large. Maximum size is 5MB';
            $errors = true;
        }
    }
}

if (!isset($_FILES['logo']) || $_FILES['logo']['error'] === UPLOAD_ERR_NO_FILE) {
    $response['logo'] = 'logo is required';
    $errors = true;
} else {

    if ($_FILES['logo']['error'] !== UPLOAD_ERR_OK) {
        $response['logo'] = 'Error uploading file';
        $errors = true;
    } else {
    
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['logo']['type'];
        if (!in_array($file_type, $allowed_types)) {
            $response['logo'] = 'Invalid file type. Only JPG, PNG, and GIF are allowed';
            $errors = true;
        }


        $max_size = 5 * 1024 * 1024; 
        if ($_FILES['logo']['size'] > $max_size) {
            $response['logo'] = 'File is too large. Maximum size is 5MB';
            $errors = true;
        }
    }
}

if (!isset($_FILES['photo_player']) || $_FILES['photo_player']['error'] === UPLOAD_ERR_NO_FILE) {
    $response['photo'] = 'photo is required';
    $errors = true;
} else {

    if ($_FILES['photo_player']['error'] !== UPLOAD_ERR_OK) {
        $response['photo'] = 'Error uploading file';
        $errors = true;
    } else {
    
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['photo_player']['type'];
        if (!in_array($file_type, $allowed_types)) {
            $response['photo'] = 'Invalid file type. Only JPG, PNG, and GIF are allowed';
            $errors = true;
        }


        $max_size = 5 * 1024 * 1024; 
        if ($_FILES['photo_player']['size'] > $max_size) {
            $response['photo'] = 'File is too large. Maximum size is 5MB';
            $errors = true;
        }
    }
}

if (!$errors) {

    $upload_dir = 'playerImage/';
    $file_name = uniqid() . '_' . basename($_FILES['photo']['name']);
    $upload_path = $upload_dir . $file_name;

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_path)) {

        include "./backend/config.php";

        if (!$conn) {
            $response['message'] = 'Database connection failed: ' . mysqli_connect_error();
        } else {
   
            $username = mysqli_real_escape_string($conn, $username);
            $photo_path = mysqli_real_escape_string($conn, $upload_path);


            $query = "INSERT INTO personne_info (nom,photo) VALUES ('$username', '$photo_path')";
            
            $addData = mysqli_query($conn, $query);


            if ($addData) {
                $response['success'] = true;
                $response['message'] = 'Form submitted and data saved successfully!';
            } else {
                $response['message'] = 'Error inserting data: ' . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    }


} else {
        $response['message'] = 'Error saving the file';
}

echo json_encode($response);
?>