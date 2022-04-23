<?php
require_once 'class_BMI.php';
require_once 'class_pasien.php';

class BMIPasien extends BMI
{
    public $id;
    public $bmi;
    public $tanggal;
    public $pasien;

    function __construct($nama, $gender, $bb, $tb, $tanggal)
    {
        parent::__construct($nama, $gender, $bb, $tb);
        $this->tanggal = $tanggal;
    }
}

$psn1 = new BMIPasien("Jaehyuk", "L", 65, 178, date("d-m-Y"));
$psn2 = new BMIPasien("Jake", "P", 65, 176, date("d-m-Y"));
$psn3 = new BMIPasien("Bonon", "L", 58, 178, date("d-m-Y"));
$psn4 = new BMIPasien($_POST['nama'], $_POST['gender'], $_POST['bb'], $_POST['tb'], date("d-m-Y"));

$ar_pasien = [$psn1, $psn2, $psn3, $psn4];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <style>
        .hasil {
            margin-top: 0px;
            margin-bottom: 10px;
            font-family: sans-serif;
            font-size: 3rem;
            background: linear-gradient(to right, #ef5350, #f48fb1, #7e57c2, #2196f3, #26c6da, #43a047, #eeff41, #f9a825, #ff5722);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body>
    <h1 class="text-center display-4 hasil">BMI Anda adalah <?= $psn4->nilaiBMI() ?></h1>
    <table class="table table-striped table-hover">
        <thead class="text-center">
            <th>Nomor</th>
            <th>Tanggal Periksa</th>
            <th>Kode Pasien</th>
            <th>Nama Pasien</th>
            <th>Gender Pasien</th>
            <th>Berat (kg)</th>
            <th>Tinggi (cm)</th>
            <th>Nilai BMI</th>
            <th>Status BMI</th>
        </thead>
        <tbody style="text-align: center;">
            <?php $nomer = 1; ?>
            <?php foreach ($ar_pasien as $obj) : ?>
                <tr>
                    <td><?= $nomer ?></td>
                    <td><?= $obj->tanggal ?></td>
                    <td><?= "P00" . $nomer++ ?></td>
                    <td><?= $obj->nama ?></td>
                    <td><?= $obj->gender ?></td>
                    <td><?= $obj->berat ?></td>
                    <td><?= $obj->tinggi ?></td>
                    <td><?= $obj->nilaiBMI() ?></td>
                    <td><?= $obj->statusBMI() ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>