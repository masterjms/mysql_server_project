<?php
$con = mysqli_connect("localhost", "projectuser", "1234", "db32213850") or die("MySQL 접속 실패");

session_start();
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION["userID"];
    $username = $_SESSION["username"];
    echo "로그인한 사용자: " . $username . " (ID: " . $userID . ")";
} else {
    echo "로그인 정보가 없습니다.";
}

$country = isset($_GET["country"]) ? $_GET["country"] : "";

$sql = "SELECT * FROM traveltbl";
$ret = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>여행지 수정</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
			background-color: #f4f4f9;
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .dropdown {
            position: relative;
            width: 300px;
            margin: 20px 0;
        }
        .dropdown-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
        .dropdown-btn span {
            font-size: 16px;
        }
        .dropdown-btn i {
            font-size: 14px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
        .dropdown-content div {
            padding: 10px;
            cursor: pointer;
        }
        .dropdown-content div:hover {
            background-color: #f9f9f9;
        }
        .dropdown-content div.selected {
            background-color: #80f3f0;
            font-weight: bold;
        }
		.button_style {
			color : white;
			background-color : #007bff;
			padding: 5px 10px;
			margin: 5px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
    </style>
</head>
<body>
    <h1>수정할 여행지를 선택하세요.</h1>
    <form method="post" action="travel_update.php">
        <input type="hidden" name="old_country" value="<?php echo $country; ?>">
        <input type="hidden" id="new_country" name="new_country" value="<?php echo $country; ?>">

        <div class="dropdown">
            <div id="dropdown-btn" class="dropdown-btn">
                <span><?php echo $country ?: "여행지를 선택하세요"; ?></span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div id="dropdown-content" class="dropdown-content">
                <?php 
                $countries = ["미국", "스페인", "영국", "일본", "중국", "태국"];
                foreach ($countries as $option) {
                    $selectedClass = $country === $option ? "selected" : "";
                    echo "<div class='$selectedClass' data-value='$option'>$option</div>";
                }
                ?>
            </div>
        </div>

        <button type="submit" class = "button_style">수정</button>
        <a href='reserv_info.php'><button type="button" class = "button_style">취소</button></a>
    </form>

    <script>
        const dropdownBtn = document.getElementById("dropdown-btn");
        const dropdownContent = document.getElementById("dropdown-content");
        const newCountryInput = document.getElementById("new_country");

        dropdownBtn.addEventListener("click", () => {
            dropdownContent.style.display = 
                dropdownContent.style.display === "block" ? "none" : "block";
        });

        document.querySelectorAll("#dropdown-content div").forEach(option => {
            option.addEventListener("click", () => {
                // 기존 선택했던 값을 미리 선택
                newCountryInput.value = option.getAttribute("data-value");

                // 버튼 값을 업데이트
                dropdownBtn.querySelector("span").textContent = option.getAttribute("data-value");

                // 선택 클릭이 되면 사라지게 함
                dropdownContent.style.display = "none";

                // 선택한 옵션을 하이라이트함
                document.querySelectorAll("#dropdown-content div").forEach(opt => {
                    opt.classList.remove("selected");
                });
                option.classList.add("selected");
            });
        });

        // 다른곳을 클릭하면 사라짐
        document.addEventListener("click", (e) => {
            if (!dropdownBtn.contains(e.target) && !dropdownContent.contains(e.target)) {
                dropdownContent.style.display = "none";
            }
        });
    </script>
</body>
</html>

<?php
mysqli_close($con);
?>



