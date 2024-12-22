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

    $upload_dir = 'src/playerImage/';
    $photo_file = uniqid() . '_' . basename($_FILES['photo_player']['name']);


    $photo_path = $upload_dir . $photo_file;

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES['photo_player']['tmp_name'], $photo_path)) {

        include "../backend/config.php";

        if (!$conn) {
            $response['message'] = 'Database connection failed: ' . mysqli_connect_error();
        } else {
   
            $username = mysqli_real_escape_string($conn, trim($_POST['nom_player']));
            $position = mysqli_real_escape_string($conn, $_POST['positions']);
            $club = mysqli_real_escape_string($conn, $_POST['club_select']);
            $nationality = mysqli_real_escape_string($conn, $_POST['nationality_select']);
            $rating = (int) $_POST['rating'];
            $photo_path = mysqli_real_escape_string($conn, $photo_path);
             
            $Nat = "SELECT id FROM nationalite WHERE name_nationality = '$nationality'";
            $result = mysqli_query($conn, $Nat);  
            $row = mysqli_fetch_assoc($result);
            $idNat = $row['id'];
            
            $Clb = "SELECT id FROM club WHERE name_club = '$club'"; 
            $result = mysqli_query($conn, $Clb);
            $row = mysqli_fetch_assoc($result);
            $idClb = $row['id'];
        

            $stats = [];
            if ($position === "GK") {
                $stats = [
                    'diving' => (int) $_POST['diving'],
                    'handling' => (int) $_POST['handling'],
                    'kicking' => (int) $_POST['kicking'],
                    'positioning' => (int) $_POST['positioning'],
                    'reflexes' => (int) $_POST['reflexes'],
                    'speed' => (int) $_POST['speed'],
                ];
            } else {
                $stats = [
                    'pace' => (int) $_POST['pace'],
                    'shooting' => (int) $_POST['shooting'],
                    'passing' => (int) $_POST['passing'],
                    'dribbling' => (int) $_POST['dribbling'],
                    'defending' => (int) $_POST['defending'],
                    'physical' => (int) $_POST['physical'],
                ];
            }


            $query = "INSERT INTO player (nom_player,player_photo,positions,rating,club_id,nationalite_id) 
            VALUES ('$username', '$photo_path','$position','$rating','$idClb','$idNat')";


            
            $addData = mysqli_query($conn, $query);

            if ($addData) {
                $last_id = mysqli_insert_id($conn);
            
                if ($position == 'Gk') {
                    $query1 = "
                    INSERT INTO goal_keeper (player_id, " . implode(", ", array_keys($stats)) . ")
                    VALUES ($last_id, '" . implode("', '", $stats) . "')
                    ";
                } else {
                    $query1 = "
                    INSERT INTO no_goal_keeper (player_id, " . implode(", ", array_keys($stats)) . ")
                    VALUES ($last_id, '" . implode("', '", $stats) . "')
                    ";
                }
            
                $addStats = mysqli_query($conn, $query1);
            
                if ($addStats) {
                    $response['success'] = true;
                    $response['message'] = 'Form submitted and data saved successfully!';
                } else {
                    $response['message'] = 'Error inserting data: ' . mysqli_error($conn);
                }
            }
            mysqli_close($conn);
        }
    }


} else {
        $response['message'] = 'Error saving the file';
}

echo json_encode($response);
?>