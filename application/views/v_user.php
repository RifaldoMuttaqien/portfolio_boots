<!DOCTYPE html>
<html>

<head>
    <title>Menghubungkan codeigniter dengan database mysql</title>
</head>

<body>
    <h1>Mengenal Model Pada Codeigniter | MalasNgoding.com</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
        </tr>
        <?php foreach ($blog as $b) { ?>
        <tr>
            <td><?php echo $b->content ?></td>

        </tr>
        <?php } ?>
    </table>
</body>

</html>