create database db32213850;
use db32213850;

-- 고객 정보 테이블
CREATE TABLE usertbl (
  userID VARCHAR(50) NOT NULL PRIMARY KEY,
  user_password VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL,
  gender char(2),
  mobile VARCHAR(15),
  addr VARCHAR(20),
  age SMALLINT
);
insert into usertbl values ('1234','1234','민성','남성','21313','경기',20);

-- 여행지 정보 테이블
CREATE TABLE traveltbl (
  country VARCHAR(50) NOT NULL PRIMARY KEY,
  departure DATE NOT NULL,
  price DECIMAL(10, 2) NOT NULL
);

-- 여행 신청 테이블
CREATE TABLE usertraveltbl (
  num INT AUTO_INCREMENT PRIMARY KEY,
  usertbl_userID VARCHAR(50),
  traveltbl_country VARCHAR(50),
  FOREIGN KEY (usertbl_userID) REFERENCES usertbl(userID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (traveltbl_country) REFERENCES traveltbl(country) ON DELETE CASCADE ON UPDATE CASCADE,
  UNIQUE (usertbl_userID, traveltbl_country)
);

-- 여행지 상세 정보 테이블
CREATE TABLE travel_detail_tbl (
  country VARCHAR(50) NOT NULL,
  member_limit SMALLINT NOT NULL,
  city VARCHAR(100) NOT NULL,
  period char(6) NOT NULL,
  FOREIGN KEY (country) REFERENCES traveltbl(country) ON DELETE CASCADE ON UPDATE CASCADE
);
-- traveltbl 데이터 입력
insert into traveltbl values ('영국','2024-01-11',4000000);
insert into traveltbl values ('스페인','2024-12-22',3000000);
insert into traveltbl values ('중국','2024-12-11',2000000);
insert into traveltbl values ('일본','2024-12-08',2200000);
insert into traveltbl values ('미국','2024-12-20',5000000);
insert into traveltbl values ('태국','2025-01-08',1900000);


-- travel_detail_tbl 데이터 입력
insert into travel_detail_tbl values ('중국','40','베이징','4박5일');
insert into travel_detail_tbl values ('일본','30','오사카','3박4일');
insert into travel_detail_tbl values ('미국','60','LA','6박8일');
insert into travel_detail_tbl values ('태국','20','치앙마이','6박7일');
insert into travel_detail_tbl values ('일본','15','도쿄','3박4일');
insert into travel_detail_tbl values ('미국','20','뉴욕','6박7일');
insert into travel_detail_tbl values ('영국','22','맨체스터','8박9일');
insert into travel_detail_tbl values ('스페인','10','바르세로나','9박10일');
insert into travel_detail_tbl values ('중국','21','광저우','5박6일');
insert into travel_detail_tbl values ('중국','8','충칭','6박7일');
insert into travel_detail_tbl values ('일본','16','삿포로','2박3일');
insert into travel_detail_tbl values ('일본','28','오키나와','4박5일');
insert into travel_detail_tbl values ('태국','35','방콕','5박6일');
insert into travel_detail_tbl values ('영국','33','런던','8박10일');
insert into travel_detail_tbl values ('스페인','14','마드리드','11박13일');
insert into travel_detail_tbl values ('스페인','22','발렌시아','6박8일');
