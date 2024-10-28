<?php
$host = '127.0.0.1'; // 데이터베이스 호스트
$dbname = 'hanbom'; // 데이터베이스 이름
$username = 'root'; // 데이터베이스 사용자 이름
$password = ''; // 데이터베이스 비밀번호

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "데이터베이스 연결 실패: " . $e->getMessage();
}
?>
