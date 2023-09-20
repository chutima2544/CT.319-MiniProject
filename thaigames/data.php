<?php
session_start();
include "condb.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การละเล่นไทย</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Itim&family=Kanit:wght@300&family=Noto+Sans+Thai&family=Sarabun:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    body {
        /* font-family: 'Bebas Neue', sans-serif; */
        font-family: 'Itim', cursive;
        /* font-family: 'Kanit', sans-serif; */
        /* font-family: 'Mali', cursive; */
        /* font-family: 'Noto Sans Thai', sans-serif; */
        /* font-family: 'Sarabun', sans-serif; */
    }

    .magin {
        margin-top: 4rem;
    }

    .card {
        border-radius: 10px;
        border: none;
    }
</style>

<body style="background-color: #f1f5f9">
    <?php
    include('bar.php');
    ?>

    <div class="container py-5">
        <?php
        if (isset($_GET['id'])) {
            $id_games = $_GET['id'];
            $sql = "SELECT * FROM games WHERE id_games = '$id_games'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            // แสดงรายละเอียดเกม
            // ...
        } else {
            // จัดการกรณีที่พารามิเตอร์ 'id' ไม่ถูกให้ใน URL
        }
        ?>
        <div class="card magin" style="border: 1px solid #8f8f8f;">
            <div class="card-header" style="border-bottom: 1px solid #8f8f8f;">
                <h1 class=" card-title fw-bolw"><?= $row['name_games'] ?></h1>
            </div>
            <div class="card-body pb-4 pt-4">

                <div class="text-center">
                    <img src="img/<?= $row['id_games'] ?>/<?= $row['picture_name'] ?>" class="img-fluid" alt="...">
                </div>
                <div class="container">
                    <p class="pt-5" style="font-size: 19px;"><b>อุปกรณ์ที่ใช้ : </b><?= $row['tool'] ?></p>
                    <p style="font-size: 19px;"><b>รายละเอียด : </b><?= $row['details'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>