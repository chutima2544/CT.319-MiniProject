<?php
include "condb.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ค่าที่รับมาจากฟอร์ม
    $name_games = $_POST["name_games"];
    $tool = $_POST["tool"];
    $details = $_POST["details"];
    
    // ตรวจสอบว่ามีการอัปโหลดไฟล์รูปภาพ
    if(isset($_FILES["picture_name"])) {
        // ข้อมูลรูปภาพ
        $picture_name = $_FILES["picture_name"]["name"];
        $picture_tmp = $_FILES["picture_name"]["tmp_name"];
    
        // บันทึกข้อมูลลงในฐานข้อมูล
        $sql = "INSERT INTO games (name_games, tool, details, picture_name, date_in) VALUES ('$name_games', '$tool', '$details', '$picture_name', NOW())";
    
        if ($conn->query($sql) === TRUE) {
            // ดึง id_games ที่เพิ่มล่าสุด
            $id_games = mysqli_insert_id($conn);
    
            // สร้างโฟลเดอร์ใหม่ใน img โดยใช้ id_games
            $upload_directory = "img/$id_games/";
    
            if (!file_exists($upload_directory)) {
                mkdir($upload_directory, 0777, true); // สร้างโฟลเดอร์ถ้าไม่มีอยู่
            }
    
            // ย้ายไฟล์รูปภาพไปยังโฟลเดอร์ใหม่
            $picture_path = "$upload_directory$picture_name";
            move_uploaded_file($picture_tmp, $picture_path);
    
            echo "<script>window.location='index.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        // ไม่มีการอัปโหลดไฟล์รูปภาพ
        echo "Please select an image to upload.";
    }
}
?>