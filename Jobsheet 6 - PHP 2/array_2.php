<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            float: left;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    $Dosen = [
        'Nama' => 'Elok Nur Hamdana',
        'Domisili' => 'Malang',
        'Jenis_kelamin' => 'Perempuan'
    ];

    echo "Nama: {$Dosen['Nama']} <br>";
    echo "Domisili: {$Dosen['Domisili']} <br>";
    echo "Jenis Kelamin: {$Dosen['Jenis_kelamin']} <br>";
    ?>

    <table>
        <tr>
            <th>Informasi</th>
            <th>Detail</th>
        </tr>
        <?php foreach ($Dosen as $key => $value) { ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $value; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>