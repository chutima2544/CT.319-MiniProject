<?php
session_start();
include "condb.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    .card {
        position: relative;
        padding: 0;
        margin: 0 !important;
        border-radius: 20px;
        overflow: hidden;
        max-height: 340px;
        cursor: pointer;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);

    }

    .card .card-image {
        width: 100%;
        max-height: 340px;
    }

    .card .card-image img {
        width: 100%;
        max-height: 340px;
        object-fit: cover;
    }

    .card .card-content {
        position: absolute;
        bottom: -180px;
        color: #fff;
        background: rgb(0 0 0 / 20%);
        backdrop-filter: blur(20px);
        min-height: 100px;
        width: 100%;
        transition: bottom .4s ease-in;
        box-shadow: 0 -10px 10px rgba(255, 255, 255, 0.1);
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card:hover .card-content {
        bottom: 0px;
    }

    .card:hover .card-content h3,
    .card:hover .card-content h4 {
        transform: translateY(10px);
        opacity: 1;
    }

    .card .card-content h3,
    .card .card-content h4 {
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-align: center;
        transition: 0.8s;
        font-weight: 500;
        opacity: 0;
        transform: translateY(-40px);
        transition-delay: 0.2s;
        color: black;
    }

    .card .card-content h5 {
        transition: 0.5s;
        font-weight: 200;
        font-size: 0.8rem;
        letter-spacing: 2px;
    }
</style>

<body style="background-color: #f1f5f9">
    <?php
    include('bar.php');
    ?>
    <div class="container py-5 h-100">
        <div class="container-fluid py-5 text-center" style="margin-top: 4rem;" >
            <h1 class="display-5 fw-bold">จัดทำโดย</h1>
        </div>
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="card p-0">
                    <div class="card-image">
                        <img src="logo/FNzgrl3kOEBHs.jpg" alt="">
                    </div>
                    <div class="card-content d-flex flex-column align-items-center">
                        <h3 class="pt-2">ชุติมา อ่อนนา</h3>
                        <h4>630406401370</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-0">
                    <div class="card-image">
                        <img src="logo/D7zGDmSJ75p0L.jpg" alt="">
                    </div>
                    <div class="card-content d-flex flex-column align-items-center">
                        <h3 class="pt-2">ทิวธวัฒน์ สมอุ่มจาน</h3>
                        <h4>630406401404</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>