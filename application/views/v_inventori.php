<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nama Barang</title>
</head>
<body>
    <table border="1px solid black">
        <tr>
            <th>Nama Barang</th>
        </tr>

        <?php foreach ($barang as $nama_barang) : ?>
            <tr>
                <td><?php echo $nama_barang['nama_barang']; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>