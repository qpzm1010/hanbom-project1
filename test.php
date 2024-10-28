<?php 

if (isset($_POST['event_date']) && is_array($_POST['event_date'])) {
    $event_dates = $_POST['event_date'];
    $event_names = $_POST['event_name'];
    $event_authorities = $_POST['event_authority'];

    foreach ($event_dates as $index => $event_date) {
        $event_name = $event_names[$index];
        $event_authority = $event_authorities[$index];
        $sql_event = "INSERT INTO events (resume_id, event_date, event_name, event_authority)
                            VALUES ('$resume_id', '$event_date', '$event_name', '$event_authority')";
        $conn->query($sql_event);
    }
}







?>