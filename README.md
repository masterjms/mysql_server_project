
## 프로젝트 중점
1. DB를 구현하기 위한 ERP모델(개념적 모델링-논리적모델링-물리적모델링)을 수립하기
2. 모델 수립하고 DB를 다루기 위한 SQL쿼리문 학습
3. PK-FK 지정을 해봄으로써 관계형DB에 대한 이해
4. 웹-서버의 연결(RESTful)에 대한 이해. http와 url을 통한 통신 방식. (GET,POST등)
5. 웹페이지간의 연결을 구조화해봄으로써 상호관계를 이해하고 아키텍쳐해보기
6. 적합한 프론트 구성. 서버스크립트와 클라이언트 스크립트 사용. html-javascript-css,php
7. SQL View 테이블에 대한 이해. 내,외부 조인을 이용한 테이블 뷰 구성. 다대다 관계에서 PK-FK 연결. 데이터 삭제와 삽입,수정 방법
8. 웹-서버 간의 trascation 응답시간 최소화, 동시에 많은 요청 처리, 저장공간의 효율적 배치에 대한 방법 학습

## 시스템 분석
1. 홈페이지에 처음으로 접속하면 메인화면인 menu.php가 뜨고, 이곳에는 [로그인], [계정만들기], [로그인없이 내역확인] 총 3가지 버튼이 있다. 
2. 이미 계정이 있는 경우 아이디와 비밀번호를 입력하고 [로그인]버튼을 누르면 로그인 된다. 성공적으로 로그인이 되면 모든 .php웹 왼쪽 상단에 로그인 정보가 보이며, 로그인된 사용자 세션정보를 저장한다. 세션은 menu.php페이지에서 자동으로 종료되어 재로그인해야한다.
3. [계정 만들기] 버튼을 누르면 회원가입 페이지로 넘어간다. 해당 페이지에서 아이디, 비밀번호, 이름을 필수로 기입해야하며, 이 정보를 적지 않고 [제출] 버튼을 누르면 경고문이 뜨고 제출되지 않는다.
4. [로그인없이 내역확인]버튼을 누르면 여행 신청내역을 확인할 수 있다. 하지만 로그인이 되지않은 상태에서는 수정과 삭제가 불가능하다.(정보 열람만 가능하다. 로그인 과정없이 URL을 통해 여행 신청 페이지로 즉시 건너뛰는 행위도 포함된다.)
5. 로그인이 된 사용자가 접속하면 여행을 신청할 수 있는 페이지가 나온다. 여기서 [신청하기]버튼을 통해 여행신청이 가능하며, 각각의 여행지마다 [상세정보]버튼을 통해 여행지 상세정보를 볼 수 있다. 또한 동일한 사용자가 동일한 여행지를 선택할 수 없다. (동일한 사용자가 다른 여행지를 여러개 신청하는 것은 가능하다.)
6. 성공적으로 신청이 되면, 자동으로 여행신청 내역으로 페이지 이동된다. 이곳에서 사용자가 신청된 여행지를 수정 및 삭제가 가능하다.
7. [수정하기]버튼을 누르면 다른 여행지 옵션을 선택할 수 있고, [수정]버튼을 누르면 자동으로 여행신청 내역 페이지로 이동되며 수정 사항이 반영된다.
8. [삭제]버튼을 누르면 해당 여행 신청 내역이 삭제되고, 자동으로 여행 신청 내역 페이지로 이동된다.
9. 모든 페이지의 [뒤로가기] 또는 [취소]버튼을 통해 이전 페이지로 돌아갈 수 있다.

## 프로젝트 후기
1. 초기 ERP모델링의 중요성을 알게되었다. 정확하게 어떤 서비스를 제공할 것인지 수립하여야하며, 데이터 테이블간의 관계성을 명확히 하지 않아 처음부터 다시 만드는 문제가 생김.
2. php페이지의 네이밍의 중요성을 알게 되었다. 예를들어 로그인 페이지면 login.php-login_insert.php로 이어지도록 하여야하는데 그렇지 못한 파일명들이 있어 사용자나 개발자로 하여금 페이지 구성을 이해하기 어렵게 만든 것이 아쉬움.
3. 데이터의 이동 복잡도를 줄일 수 있었는데 초반 설계의 오류로 고치는것이 힘들었다. 데이터의 삭제를 위한 php코드 입력이 한번에 이루어지지 않고 두개의 .php문서를 거쳐 이동함으로써 트레픽에 대한 고려가 되지 않은것이 아쉬움.
4. 페이지 변수에 대한 처리는 잘 만든 것 같다. 페이지 이동간 오류나 올바르지 않은 접근에 대한 변수 처리들을 잘해놓아 이유 불문의 오류가 생기지 않도록 신경을 많이 썼다.
5. 다음에는 좀더 UX에 대한 고려를 더 해야할 것 같다. 처음 이 페이지에 접속한 사용자라면 다소 어려움을 느낄 수도 있을 것 같다.
6. 무엇보다 관계형데이터베이스에 대해 깊이 알게 되었다. 또한 php문을 통해 서버에 request하고 select,update,delete하는 법을 배우게 되었다. GET과 POST에 대해 확실하게 이해하게 되었고, url의 구조에 대해서도 알 수 있는 기회였다.
7. 좀 더 발전시킨 형태의 프로젝트를 진행해보고 싶다. UI,UX에 대한 중요성을 배웠던 것을 계기로 더 복잡하고 '실제로'사용하는 퀄리티의 웹페이지를 만들어보고 싶다. 이때는 localhost를 사용하는 것이 아닌, 배포용 서버(aws등)을 활용해 불특정 다수의 접속과 데이터를 감당할 수 있는 실용성 있는 프로젝트를 만들어보고자 한다. 또한 이번에는 보안 부분은 딱히 신경쓰지 않았지만 비밀번호의 해싱과 같은 코드를 추가해보려 한다.
