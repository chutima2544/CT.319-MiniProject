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
    <!-- Link to the file hosted on your server, -->

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Itim&family=Kanit:wght@300&family=Noto+Sans+Thai&family=Sarabun:wght@100&display=swap" rel="stylesheet">
    <!-- or link to the CDN -->
    <link rel="stylesheet" href="url-to-cdn/splide.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

    .custom-img {
        width: 100%;
        height: 300px;
        /* ปรับความสูงตามที่คุณต้องการ */
        object-fit: cover;
        /* คำสั่งนี้จะทำให้รูปภาพจัดกระชับในกล่อง */
    }

    .ewide {
        width: 25%;
        height: 51px;
    }

    #intro {
        height: 600px;
        /* margin-top: 10px; */
    }

    .mask {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 600px;
        overflow: hidden;
        background-attachment: fixed;
    }

    .bg-image {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: 50%;
    }

    .centeredit {
        justify-content: center;
        align-items: center;
    }

    .btn-outline-success {
        height: 51px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .card {
        /* border-radius: 15px; */
        border: none;
        box-shadow: 0 7px 14px 0 rgba(65, 69, 88, 0.1), 0 3px 6px 0 rgba(0, 0, 0, 0.07);
    }

    .card:hover {
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    }

    .card-img-top {
        width: 100%;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }
</style>

<body style="background-color: rgba(237, 242, 249, 0.96);">
    <?php
    include('bar.php');
    ?>
    <!-- //style="background-color: rgba(0, 0, 0, 0.7);" -->
    <div class="container">
        <div id="intro" class="p-5 text-center bg-image shadow-1-strong" style="background-image: url('logo/การละเล่นไทย\ \(3\).gif'); margin-top : 7rem; border-radius: 40px;">
        </div>
    </div>

    <div class="container mb-1">
        <div class="d-flex justify-content-end">
            <form class="form mt-5" role="search" method="GET">
                <i class="bi bi-search"></i>
                <input class="form-control form-input" type="search" name="search_query" id="search_query" placeholder="Search" aria-label="Search">
            </form>
        </div>
        <div class="row pb-4">
            <?php
            // กำหนดจำนวนข้อมูลต่อหน้าเป็น 8
            $resultsPerPage = 8;
            $currentPage = 1;

            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                $currentPage = intval($_GET['page']);
            }

            if (isset($_GET['search_query'])) {
                $search_query = $_GET['search_query'];
                $search_query = mysqli_real_escape_string($conn, $search_query);
                $data = "SELECT id_games, name_games, DATE_FORMAT(date_in, '%M %d, %Y') as formatted_date, picture_name FROM games WHERE name_games LIKE '%$search_query%' ORDER BY date_in DESC";
            } else {
                $data = "SELECT id_games, name_games, DATE_FORMAT(date_in, '%M %d, %Y') as formatted_date, picture_name FROM games ORDER BY date_in DESC";
            }

            // คำนวณจำนวนข้อมูลทั้งหมด
            $totalResults = mysqli_num_rows(mysqli_query($conn, $data));
            $totalPages = ceil($totalResults / $resultsPerPage);

            // คำนวณข้อมูลที่จะแสดงในหน้านี้
            $start = ($currentPage - 1) * $resultsPerPage;
            $data .= " LIMIT $start, $resultsPerPage";

            $result = mysqli_query($conn, $data);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-sm-6 pt-4" id="search_results">
                    <a href="data.php?id=<?= $row['id_games'] ?>">
                        <div class="card w-100">
                            <div class="card-body d-flex">
                                <div class="flex-grow-1">
                                    <h4 class="card-title"><?= $row['name_games'] ?></h4>
                                    <div class="text-start">
                                        <p class="card-text"><i class="bi bi-calendar"></i><small class="text-muted">&nbsp;&nbsp;<?= $row['formatted_date'] ?></small></p>
                                    </div>
                                </div>
                                <div class="text-center align-self-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- ตัวควบคุมหน้าเพจ -->
    <div class="container">
        <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-end mb-5">
                <?php
                // หน้าก่อนหน้า
                if ($currentPage > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
                }

                // หมายเลขหน้า
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                // หน้าถัดไป
                if ($currentPage < $totalPages) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>