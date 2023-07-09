const question = document.querySelector("#question");
const choices = Array.from(document.querySelectorAll(".choice-text"));
const progressText = document.querySelector("#progressText");
const scoreText = document.querySelector("#score");
const progressBarFull = document.querySelector("#progressBarFull");
const audio = document.getElementById("audio");

let currentQuestion = {};
let acceptingAnswers = true;
let score = 0;
let questionCounter = 0;
let shuffledQuestions = [];

let questions = [
  {
    question:
      "easy/bath.mp3",
    choice1: "born",
    choice2: "bath",
    choice3: "bird",
    choice4: "bag",
    answer: 2,
  },
  {
    question:
      "easy/again.mp3",
    choice1: "ago",
    choice2: "age",
    choice3: "again",
    choice4: "agree",
    answer: 3,
  },
  {
    question:
      "easy/air.mp3",
    choice1: "add",
    choice2: "able",
    choice3: "air",
    choice4: "all",
    answer: 3,
  },
  {
    question:
      "easy/bright.mp3",
    choice1: "bright",
    choice2: "begin",
    choice3: "break",
    choice4: "best",
    answer: 1,
  },
  {
    question:
      "easy/child.mp3",
    choice1: "charge",
    choice2: "crown",
    choice3: "clown",
    choice4: "child",
    answer: 4,
  },
  {
    question:
      "easy/dress.mp3",
    choice1: "dress",
    choice2: "deal",
    choice3: "drop",
    choice4: "drive",
    answer: 1,
  },
  {
    question:
      "easy/joke.mp3",
    choice1: "job",
    choice2: "house",
    choice3: "joke",
    choice4: "join",
    answer: 3,
  },
  {
    question:
      "easy/kind.mp3",
    choice1: "kill",
    choice2: "kid",
    choice3: "key",
    choice4: "kind",
    answer: 4,
  },
  {
    question:
      "easy/lion.mp3",
    choice1: "live",
    choice2: "lion",
    choice3: "list",
    choice4: "line",
    answer: 2,
  },
  {
    question:
      "easy/must.mp3",
    choice1: "more",
    choice2: "music",
    choice3: "much",
    choice4: "must",
    answer: 4,
  },
  {
    question:
      "easy/nine.mp3",
    choice1: "null",
    choice2: "nine",
    choice3: "nice",
    choice4: "night",
    answer: 2,
  },
  {
    question:
      "easy/pool.mp3",
    choice1: "police",
    choice2: "point",
    choice3: "poor",
    choice4: "pool",
    answer: 4,
  },
  {
    question:
      "easy/put.mp3",
    choice1: "public",
    choice2: "pull",
    choice3: "put",
    choice4: "push",
    answer: 3,
  },
  {
    question:
      "easy/seven.mp3",
    choice1: "seven",
    choice2: "several",
    choice3: "serve",
    choice4: "service",
    answer: 1,
  },
  {
    question:
      "easy/stamp.mp3",
    choice1: "stay",
    choice2: "stamp",
    choice3: "start",
    choice4: "star",
    answer: 2,
  },
  {
    question:
      "easy/such.mp3",
    choice1: "sure",
    choice2: "suffer",
    choice3: "such",
    choice4: "surface",
    answer: 3,
  },
  {
    question:
      "easy/think.mp3",
    choice1: "threat",
    choice2: "think",
    choice3: "theft",
    choice4: "thing",
    answer: 2,
  },
  {
    question:
      "easy/too.mp3",
    choice1: "total",
    choice2: "tough",
    choice3: "town",
    choice4: "too",
    answer: 4,
  },
  {
    question:
      "easy/yard.mp3",
    choice1: "yeah",
    choice2: "yard",
    choice3: "you",
    choice4: "your",
    answer: 2,
  }
];

const SCORE_POINTS = 10;
const MAX_QUESTIONS = 10;

startGame = () => {
  questionCounter = 0;
  score = 0;
  shuffledQuestions = [...questions];
  getNewQuestion();
};

getNewQuestion = () => {
  if (shuffledQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
    localStorage.setItem("mostRecentScore", score);

    return window.location.assign("end.html");
  }
  questionCounter++;
  progressText.innerText = `Question ${questionCounter} of ${MAX_QUESTIONS}`;
  progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

  const questionsIndex = Math.floor(Math.random() * shuffledQuestions.length);
  currentQuestion = shuffledQuestions[questionsIndex];
  // question.innerText = currentQuestion.question;

  choices.forEach((choice) => {
    const number = choice.dataset["number"];
    choice.innerText = currentQuestion["choice" + number];
  });

  audio.src = currentQuestion["question"];

  shuffledQuestions.splice(questionsIndex, 1);

  acceptingAnswers = true;
};

choices.forEach((choice) => {
  choice.addEventListener("click", (e) => {
    if (!acceptingAnswers) return;

    acceptingAnswers = false;
    const selectedChoice = e.target;
    const selectedAnswer = selectedChoice.dataset["number"];

    let classToApply =
      selectedAnswer == currentQuestion.answer ? "correct" : "incorrect";

    if (classToApply === "correct") {
      incrementScore(SCORE_POINTS);
    }

    selectedChoice.parentElement.classList.add(classToApply);

    setTimeout(() => {
      selectedChoice.parentElement.classList.remove(classToApply);
      getNewQuestion();
    }, 1000);
  });
});

incrementScore = (num) => {
  score += num;
  scoreText.innerText = score;
};

function playAudio() {
  audio.play();
}

startGame();
