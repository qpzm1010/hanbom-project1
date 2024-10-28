<?php
session_start();

// 세션에 사용자 정보가 있는지 확인
if (isset($_SESSION['name']) && isset($_SESSION['grade']) && isset($_SESSION['class']) && isset($_SESSION['number'])) {
    // 세션에 사용자 정보가 있으면 환영 메시지 출력
    $name = $_SESSION['name'];
    $department = $_SESSION['department'];
    $grade = $_SESSION['grade'];
    $class = $_SESSION['class'];
    $number = $_SESSION['number'];
} else {
    // 세션에 정보가 없으면 로그인 페이지로 리다이렉트
    header("Location: ../main/index.html");
    exit();
}
?>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Noto Sans KR', sans-serif;
    font-weight: 700; /* Bold 설정 */
    background-color: #f9f9f9;
}


header {
    background-color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
}

.logo-container {
    display: flex;
    align-items: center;
}

.logo-container img {
    width: 50px;
    margin-right: 10px;
}

.logo-container p {
    font-size: 20px;
    color: #000000;
}

.search-bar {
    display: flex;
    align-items: center;
    flex-grow: 1;
    margin: 0 20px;
}

/* .search-bar input {
    width: 400px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 50px;
    margin-right: 10px;
} */

.search-bar button {
    padding: 10px 20px;
    border: none;
    background-color: #A62651;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.auth-buttons a {
    padding: 10px 20px;
    background-color: #A62651;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    margin-right: 10px;
}

.auth-buttons a:hover {
    background-color: #A62651;
}

.banner {
    width: 100%;
    text-align: center; /* 이미지를 가운데 정렬 */
    margin: 20px 0;
}

.banner img {
    width: 20%; /* 이미지를 원래 크기의 50%로 줄임 */
    height: auto; /* 비율을 유지하면서 이미지 크기 조절 */
    max-width: 600px; /* 최대 너비를 제한 */
    border-radius: 10px; /* 둥근 모서리 */
}


.content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.content h2 {
    margin-bottom: 20px;
    font-size: 20px;
    color: #333;
}

.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(1200px, 1fr));
    gap: 20px;
}

.card {
    background-color: white;
    padding: 20px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 10px;
    position: relative;
    text-overflow: ellipsis; /* 넘치는 내용을 생략 부호(...)로 표시 */
    color: #000000;
    box-shadow: 0 0 5px -1px;
}

/* 지원하기 버튼 */
.apply-button-container {
    padding: 10px 0;
}

.apply-text {
    font-size: 14px;
    color: #333;
}

.apply-button {
    display: inline-block;
    width: 100%; /* 버튼을 카드의 전체 너비로 설정 */
    padding: 10px;
    background-color: #A62651;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    text-align: center;
    text-decoration: none; /* 링크 underline 제거 */
    margin-top: 10px; /* 텍스트와 버튼 사이 간격 추가 */
}

.apply-button:hover {
    background-color: #A62651;
}



/* 카드 아이콘 및 이미지 및 글씨 */
.card .icon {
    width: 50px; /* 원의 크기 */
    height: 50px;
    /* background-color: #A62651; 원의 배경 색상 */
    border-radius: 50%; /* 원 모양 */
    margin: 0 auto 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card .icon img {
    width: 80px; /* 로고 크기 */
    height: 70px;
}

.card p {
    margin-bottom: 10px;
    font-size: 16px;
    color: #333;
    margin-top: 20px;
    margin: -10x;
    text-align: left;
    white-space: nowrap; /* 텍스트 줄바꿈 방지 */
}
.card div {
    margin-bottom: 10px;
    font-size: 16px;
    color: #333;
    margin-top: 20px;
    margin: -10x;
    text-align: left;
    white-space: nowrap; /* 텍스트 줄바꿈 방지 */
}


footer {
    text-align: center;
    padding: 20px;
    background-color: white;
    border-top: 1px solid #ddd;
    margin-top: 20px;
}


</style>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내 손으로 미래잡기</title>
    <link href="imge/logo.png" rel="shortcut icon" type="imge/x-icon"> <!--서버 아이콘 변경-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@700&display=swap" rel="stylesheet"> <!--폰트설정-->
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo-container">
                <img src="imge/logo.png" alt="Logo" class="logo">
                <p>내 손으로 미래잡기 [ <?php echo $name; ?>님 반갑습니다! ]</p>
            </div>
            <!-- <div class="search-bar">
                <input type="text" placeholder="어떤 챌린지스타커를 원하세요?">
                <button>검색</button>
            </div> -->
        </div>
        <div class="auth-buttons">
            <a href="resume.php" class="resume-button">입사지원서 등록</a> <a href="logout.php" class="resume-button">로그아웃</a>
            
        </div>  
    </header>

    <section class="content">
        <h2>(주)스마트테크</h2>
        <div class="card-grid">
            <!-- 1번 -->
            <div class="card">
                <div class="icon">
                    <img src="imge/smart.png" alt="회사 로고">
                </div>
                <h3 style="text-align: left;">1. 회사현황</h3>
                <p>
                    회사명: (주)스마트테크ㅣ전화번호: 070-7860-7482<br>
                    FAX: 070-7862-6710<br>
                    주소: 경기도 수원시 권선구 호매실로<br>
                    우편번호: 12345<br>
                    대표자명: 신선한<br>
                    담당부장: 진명욱<br>
                    주요생산품: 전자 제품 및 반도체 소재<br>
                    종업원수: 30명
                </p>
                <h3 style="text-align: left;">2. 채용현황</h3>
                <p>
                    근무부서 모집직종: 제품 연구 개발 및 연구 보조, 품질 관리(QC),반도체 소자 제조 공정(오퍼레이터)<br>
                    채용인원: 2명<br>
                    자격조건: 특성화고(전자관련 전공) 졸업(예정) 및 관련 자격증 보유자 우대<br>
                    모집직종과 관련된 다양한 활동(동아리, 단기근로, 체험 등) 유경험자<br>
                    해외여행에 결격사유가 없는 자
                </p>
                <h3 style="text-align: left;">3. 급여</h3>
                <p>
                    근무시간: 09:00 ~ 18:00 (8시간)<br>
                    근무형태: 주 5일 / 주당 40시간 근무<br>
                    급여: 연봉 2,400만원<br>
                    상여금: 1년 근속 400%<br>
                    기타: 도서지원비(10만원), 중식 제공, 근무성과 우수자 인센티브 지급
                </p>
                <h3 style="text-align: left;">4. 지원전형</h3>
                <p>
                    서류전형 마감: 2024.10.25.(금) 17:00ㅣ입사지원서, 생활기록부<br>
                    서류전형 합격자 발표: 2024.10.28.(월) 13:00ㅣGOE메신저(담임)로 통보<br>
                    1차 실무자면접: 2024.10.29.(화) 17:00ㅣ각 면접장(취업정보센터 추후 공지)
                    1차 합격자 발표: 2024.11.01.(금) 13:00ㅣGOE메신저(담임)로 통보<br>
                    2차 임원면접: 2024.11.06.(수) 17:00ㅣ각 면접장(취업정보센터 추후 공지)<br>
                    최종합격자 발표: 2024.11.08.(금) 13:00ㅣGOE메신저(담임)로 통보
                </p>
                <div class="apply-button-container">
                    <span class="apply-text">스마트제어과</span>
                </div>
                <a href="https://hanbom.iwinv.kr" class="apply-button" id="applyBtn">메인 페이지로</a>
            </div>
        </div>
    </section>

    <footer>
        <p>Copyright © 한봄고등학교. All Rights Reserved. Powerd by 스마일서브</p>
    </footer>
</body>
</html>


