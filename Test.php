// ready for updating 
$stmt=$mysqli->prepare("UPDATE events SET time= ?, event= ? WHERE ID = ?");
            $stmt->bind_param("ssi", $newTime,  $newEvent, $idevent);
            $stmt->execute();
            $stmt->close(); 

// ready for deleting
$stmt = $mysqli->prepare("DELETE FROM events WHERE ID = ?");      
            $stmt->bind_param("i", $ids[$i]);
            $stmt->execute();
            $stmt->close();

 //user ID
    $stmt = $mysqli->prepare("SELECT ID FROM users WHERE nick = ?");
    $stmt->bind_param("s", $_SESSION["prezdivka"]);
    $stmt->execute();
    $stmt->store_result(); 
    $stmt->bind_result($id);
    $stmt->fetch();      
    $stmt->close();

    $eventDate=$_GET["date"];
   //users events for the specific date
   $stmt = $mysqli->prepare("SELECT ID, time, event FROM events WHERE u_id = ? AND date= ? ORDER BY time ASC");
   $stmt->bind_param("is", $id, $eventDate);
   $stmt->execute();

   $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No event');
    while($row = $result->fetch_assoc()) {
       $ids[] = $row['ID'];   //event ID
       $times[] = $row['time'];
       $events[] = $row['event'];
    }

    $stmt->close();