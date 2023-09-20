    <!-- Add SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<style>
    body {
        background-color: #FFCDD2;
    }

    .bg-black {
        background-color: #000;
    }

    #logo {
        width: 30px;
        height: 30px;
        border-radius: 4px;
    }

    .navbar-brand {
        padding: 14px 20px;
        font-size: 16px;
    }

    .navbar-nav {
        width: 100%;
    }

    .nav-item {
        padding: 6px 14px;
        text-align: center;
    }

    .nav-link {
        padding-bottom: 10px;
    }

    .v-line {
        background-color: gray;
        width: 1px;
        height: 20px;
    }

    .navbar-collapse.collapse.in {
        display: block !important;
    }

    @media (max-width: 576px) {
        .nav-item {
            width: 100%;
            text-align: left;
        }

        .v-line {
            display: none;
        }
    }

    .form {
        position: relative;
    }

    .form .bi-search {
        position: absolute;
        top: 8px;
        left: 20px;
        color: #9ca3af;
    }

    .form span {
        position: absolute;
        right: 17px;
        top: 13px;
        padding: 2px;
        border-left: 1px solid #d1d5db;
    }

    .left-pan {
        padding-left: 7px;
    }

    .left-pan i {
        padding-left: 10px;
    }

    .form-input {
        width: 300px;
        text-indent: 33px;
        border-radius: 100px;
    }

    .form-input:focus {
        box-shadow: none;
        border: none;
    }

    #header-outer {
        box-shadow: 0px 3px 20px 20px rgba(0, 0, 0, 0.15);
    }
</style>
<div class="container-fluid px-0">
    <nav class="navbar navbar-expand-sm navbar-dark bg-black py-0 px-0 fixed-top" id="header-outer" style="height: 4rem;">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img id="logo" src="logo/logoedit.png"> &nbsp;&nbsp;&nbsp;Thai Games</a>
            <span class="v-line"></span>
            <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer; ">เพิ่มการละเล่น</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="creator.php">ผู้จัดทำ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">กรอกรายละเอียดการละเล่น</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="insert.php" name="formgrade" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ชื่อ:</label>
                        <input type="text" class="form-control" name="name_games" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">อุปกรณ์:</label>
                        <textarea class="form-control" name="tool" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">รายละเอียด:</label>
                        <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">รูป:</label>
                        <input class="form-control" type="file" name="picture_name" id="formFileMultiple" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">ล้างค่า</button>
                    <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
        function confirmSubmit() {
            Swal.fire({
                title: 'ยืนยันการส่งข้อมูล?',
                text: 'คุณแน่ใจหรือไม่ที่ต้องการส่งข้อมูลนี้?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.isConfirmed) {
                    submitForm(); // เรียกใช้งานฟังก์ชัน submitForm() หลังจากยืนยัน
                }
            });
        }

        function submitForm() {
            // ส่งฟอร์ม
            document.formgrade.submit();
        }
    </script>