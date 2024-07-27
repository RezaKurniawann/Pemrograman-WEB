<?php
require_once __DIR__ . "/../../connection/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $tangibles = $_POST['tangibles'];
    $reliability = $_POST['reliability'];
    $responsiveness = $_POST['responsiveness'];
    $assurance = $_POST['assurance'];
    $empathy = $_POST['empathy'];
    
    // Validate total weight
    $total_bobot = $tangibles + $reliability + $responsiveness + $assurance + $empathy;
    if ($total_bobot !== 100) {
        echo '<script>alert("Set Bobot Harus = 100!"); window.location.href = "../../views/admin/modul/analisis.php";</script>';
        exit();
    }

    try {
        // Get database connection
        $db = new Database();
        $conn = $db->getConnection();

        // Update each dimension weight
        $sql1 = "UPDATE dimensi SET dimensi_bobot = ? WHERE dimensi_nama = 'tangibles'";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('i', $tangibles);
        $stmt1->execute();
        
        $sql2 = "UPDATE dimensi SET dimensi_bobot = ? WHERE dimensi_nama = 'reliability'";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param('i', $reliability);
        $stmt2->execute();
        
        $sql3 = "UPDATE dimensi SET dimensi_bobot = ? WHERE dimensi_nama = 'responsiveness'";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->bind_param('i', $responsiveness);
        $stmt3->execute();
        
        $sql4 = "UPDATE dimensi SET dimensi_bobot = ? WHERE dimensi_nama = 'assurance'";
        $stmt4 = $conn->prepare($sql4);
        $stmt4->bind_param('i', $assurance);
        $stmt4->execute();
        
        $sql5 = "UPDATE dimensi SET dimensi_bobot = ? WHERE dimensi_nama = 'empathy'";
        $stmt5 = $conn->prepare($sql5);
        $stmt5->bind_param('i', $empathy);
        $stmt5->execute();
        echo '<script>alert("Set Bobot Berhasil Diperbarui"); window.location.href = "../../views/admin/modul/analisis.php";</script>';
        exit();
    } catch (Exception $e) {
        // Handle exceptions
        echo "Error: " . $e->getMessage();
    } finally {
        // Close connection
        $conn->close();
    }
}
?>
