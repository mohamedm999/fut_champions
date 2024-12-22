<?php

include('../backend/config.php');


header('Content-Type: application/json');


$data = json_decode(file_get_contents('php://input'), true);


$response = [
    'status' => 'error',
    'message' => 'Invalid input',
];

if (isset($data['id']) && isset($data['position'])) {
    $id = intval($data['id']); 
    $position = mysqli_real_escape_string($conn, $data['position']); 

    
    $query = "DELETE FROM player WHERE id = $id";
    if (mysqli_query($conn, $query)) {
     
        if ($position === 'GK') {
            $delete = "DELETE FROM goal_keeper WHERE player_id = $id";
        } else {
            $delete = "DELETE FROM no_goal_keeper WHERE player_id = $id";
        }

     
        if (mysqli_query($conn, $delete)) {
            $response['status'] = 'success';
            $response['message'] = 'Player and position data deleted successfully';
        } else {
            $response['message'] = 'Failed to delete position-specific data';
        }
    } else {
        $response['message'] = 'Failed to delete player';
    }
}


echo json_encode($response);


mysqli_close($conn);

?>
