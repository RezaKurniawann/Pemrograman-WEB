<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prakwebdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// $sql = "INSERT INTO user VALUES (1, 'admin',MD5('123'))";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully <br><br>";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $selectSql = "SELECT * FROM user";
// $result = $conn->query($selectSql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "ID: " . $row['id'] . "<br>" .
//             "Username: " . $row['username'] . "<br>" .
//             "Password: " . $row['password'] . "<br>";
//         echo "---------------------------------------------------<br>";
//     }
// } else {
//     echo "Tidak ada data yang ditemukan.";
// }

// $conn->close();
?>