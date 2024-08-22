<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas 13";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM woilah WHERE title LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM woilah";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar URL</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Daftar URL</h2>
    <form method="get" action="">
        <input type="text" name="search" placeholder="Cari berdasarkan title..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Cari</button>
    </form>
    <table>
        <tr>
            <th>id</th>
            <th>url</th>
            <th>title</th>
            <th>descripsion</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td><a href='" . htmlspecialchars($row["url"]) . "'>" . htmlspecialchars($row["url"]) . "</a></td>";
                echo "<td>" . htmlspecialchars($row["url"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["descripsion"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data yang ditemukan</td></tr>";
        }
        ?>
    </table>
    <?php
    $conn->close();
    ?>
</body>
</html>