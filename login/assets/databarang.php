<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Cafe Serenity</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Menu Cafe Serenity</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Ambil data menu dari database (contoh sederhana menggunakan array)
            $menu_list = array(
                array("nama" => "Coffee", "harga" => 5.00),
                array("nama" => "Cake", "harga" => 3.00),
                array("nama" => "Heavy Meal", "harga" => 8.00)
            );

            // Tampilkan data menu
            foreach ($menu_list as $menu) {
                echo "<tr>";
                echo "<td>{$menu['nama']}</td>";
                echo "<td>Rp. {$menu['harga']}</td>";
                echo "<td><a href='edit_menu.php?id=1'>Edit</a> | <a href='hapus_menu.php?id=1'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="tambah_menu.html">Tambah Menu Baru</a>
</body>
</html>
