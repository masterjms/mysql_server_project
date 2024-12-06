const reviews = [
    {
      id: 1,
      name: "WEB DEVELOPER",
      job: "Jang Min-Sung",
      img:
        "img/introduce.jpg",
      text:
        "Minsung-Travel 홈페이지에 오신 것을 환영합니다.",
    },
    {
      id: 2,
      name: "여행 신청 홈페이지",
      job: "원하는 여행을 검색하고 신청하세요.",
      img:
        "img/plane.jpg",
      text:
        "여행지마다 세부 여행을 검색하실 수 있습니다.",
    },
    {
      id: 3,
      name: "여러 기능을 넣었습니다.",
      job: "단순한 기능을 넘어 실용적인 방향으로",
      img:
        "img/plane2.jpg",
      text:
        "로그인 기능을 넣어 허가된 사용자만 신청 내역에 대해 수정과 삭제가 가능하도록 하였습니다. 모바일과 pc버전 UI를 다르게 설정하였습니다. 확인해보세요!",
    },
  ];
  // select items
  const img = document.getElementById("person-img");
  const author = document.getElementById("author");
  const job = document.getElementById("job");
  const info = document.getElementById("info");
  
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");

// set starting item
let currentItem = 0;

// load initial item
window.addEventListener("DOMContentLoaded", function () {
  const item = reviews[currentItem];
  img.src = item.img;
  author.textContent = item.name;
  job.textContent = item.job;
  info.textContent = item.text;
});

// show person based on item
function showPerson(person) {
  const item = reviews[person];
  img.src = item.img;
  author.textContent = item.name;
  job.textContent = item.job;
  info.textContent = item.text;
}
// show next person
nextBtn.addEventListener("click", function () {
  currentItem++;
  if (currentItem > reviews.length - 1) {
    currentItem = 0;
  }
  showPerson(currentItem);
});
// show prev person
prevBtn.addEventListener("click", function () {
  currentItem--;
  if (currentItem < 0) {
    currentItem = reviews.length - 1;
  }
  showPerson(currentItem);
});