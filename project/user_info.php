<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli&display=swap">
    <style>
		
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,500&display=swap');

* {
    box-sizing: border-box;
}

body {
    background-color: #77b659d4;
    font-family: 'Open Sans', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    width: 400px;
    max-width: 100%;
}

.header {
    border-bottom: 1px solid #f0f0f0;
    background-color: #f7f7f7;
    padding: 20px 40px;
}

.header h2 {
    margin: 0;
}

.form {
    padding: 30px 40px;
}

.form-control {
    margin-bottom: 10px;
    padding-bottom: 20px;
    position: relative;
}

.form-control label {
    display: inline-block;
    margin-bottom: 5px;
}

.form-control input, .form-control select {
    border: 2px solid #f0f0f0;
    border-radius: 4px;
    display: block;
    font-family: inherit;
    font-size: 14px;
    padding: 10px;
    width: 100%;
}

.form-control input:focus, .form-control select:focus {
    outline: 0;
    border-color: #777;
}

.form-control.success input, .form-control.success select {
    border-color: #2ecc71;
}

.form-control.error input, .form-control.error select {
    border-color: #e74c3c;
}

.form-control i {
    visibility: hidden;
    position: absolute;
    top: 40px;
    right: 10px;
}

.form-control.success i.fa-check-circle {
    color: #2ecc71;
    visibility: visible;
}

.form-control.error i.fa-exclamation-circle {
    color: #e74c3c;
    visibility: visible;
}

.form-control small {
    color: #e74c3c;
    position: absolute;
    bottom: 0;
    left: 0;
    visibility: hidden;
}

.form-control.error small {
    visibility: visible;
}

.form button {
    background-color: #59b65a;
    border: 2px solid #59b65a;
    border-radius: 4px;
    color: #fff;
    display: block;
    font-family: inherit;
    font-size: 16px;
    padding: 10px;
    margin-top: 20px;
    width: 100%;
	cursor: pointer;
}

.cancel-btn {
    background-color: #59b65ac7;
    border: 2px solid #59b65ac7;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    padding: 10px;
    width: 100%;
    text-align: center;
    margin-top: 10px;
	cursor: pointer;
	text-decoration: none;
}
a {
	text-decoration: none;
}
    </style>
</head>

<div class="container">
<style>

</style>
    <div class="header">
        <h2>고객 정보 입력</h2>
    </div>
    <form id="form" class="form" method="post" action="newlogin_insert.php">
        <div class="form-control">
            <label for="username">아이디</label>
            <input type="text" id="username" name="userID" placeholder="아이디를 입력하세요" />
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>아이디를 입력하세요</small>
        </div>
        <div class="form-control">
            <label for="password">비밀번호</label>
            <input type="password" id="password" name="user_password" placeholder="비밀번호를 입력하세요" />
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>비밀번호를 입력하세요</small>
        </div>
        <div class="form-control">
            <label for="username">이름</label>
            <input type="text" id="name" name="username" placeholder="이름을 입력하세요" />
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>이름을 입력하세요</small>
        </div>
        <div class="form-control">
		<label for="male">성별</label>
		<input type="radio" name="gender" value="남성" id="male">남성
		<input type="radio" name="gender" value="여성" id="female">여성
		</div>
        <div class="form-control">
            <label for="mobile">전화번호</label>
            <input type="text" id="mobile" name="mobile" placeholder="전화번호를 입력하세요" />
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>전화번호를 입력하세요</small>
        </div>
        <div class="form-control">
            <label for="addr">주소</label>
            <select name="addr" id="addr">
                <option value="서울">서울</option>
                <option value="경기">경기</option>
                <option value="전남">전남</option>
                <option value="전북">전북</option>
                <option value="충남">충남</option>
                <option value="충북">충북</option>
                <option value="강원">강원</option>
                <option value="경남">경남</option>
                <option value="경북">경북</option>
                <option value="제주">제주</option>
            </select>
        </div>
        <div class="form-control">
            <label for="age">나이</label>
            <input type="text" id="age" name="age" placeholder="나이를 입력하세요" />
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>나이를 입력하세요</small>
        </div>
        <button type="submit">저장</button>
        <a href="menu.php"><button type="button" class="cancel-btn">취소</button></a>
    </form>
	<script>
	const form = document.getElementById('form');
	const username = document.getElementById('username');
	const password = document.getElementById('password');
	const name = document.getElementById('name');
	const mobile = document.getElementById('mobile');
	const addr = document.getElementById('addr');
	const age = document.getElementById('age');

	form.addEventListener('submit', e => {
    e.preventDefault();  // 기본 제출 동작 금지
    
    if (checkInputs()) {  // 유효성 검사
        form.submit();
    }
});

function checkInputs() {
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    const nameValue = name.value.trim();
    const mobileValue = mobile.value.trim();
    const addrValue = addr.value;
    const ageValue = age.value.trim();
    let isValid = true;  // 유효성 검사 상태를 추적하는 변수
    
    if (usernameValue === '') {
        setErrorFor(username, '필수 입력 정보입니다.');
        isValid = false;
    } else {
        setSuccessFor(username);
    }
    
    if (passwordValue === '') {
        setErrorFor(password, '필수 입력 정보입니다.');
        isValid = false;
    } else {
        setSuccessFor(password);
    }
    
    if (nameValue === '') {
        setErrorFor(name, '필수 입력 정보입니다.');
        isValid = false;
    } else {
        setSuccessFor(name);
    }
    
    return isValid;  // 모든 필드가 유효하면 true 반환
}

	function setErrorFor(input, message) {
		const formControl = input.parentElement;
		const small = formControl.querySelector('small');
		formControl.className = 'form-control error';
		small.innerText = message;
	}

	function setSuccessFor(input) {
		const formControl = input.parentElement;
		formControl.className = 'form-control success';
	}
	</script>
</div> 