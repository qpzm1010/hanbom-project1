<?php
// 세션 시작
session_start();

// 로그인 상태 확인
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); // 로그인 페이지로 리다이렉트
    exit();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>환영합니다</title>
</head>
<body>
    <h1>환영합니다, <?php echo htmlspecialchars($_SESSION['username']); ?>님!</h1>
    <a href="logout.php">로그아웃</a>
</body>
</html>
