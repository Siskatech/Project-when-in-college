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
      "hard/awkward.mp3",
    choice1: "aboard",
    choice2: "awkward",
    choice3: "awsome",
    choice4: "Against",
    answer: 2,
  },
  {
    question:
      "hard/capably.mp3",
    choice1: "capably",
    choice2: "Cancel",
    choice3: "Caugh",
    choice4: "Capacity",
    answer: 1,
  },
  {
    question:
      "hard/criticize.mp3",
    choice1: "Cringe",
    choice2: "Crisis",
    choice3: "criticize",
    choice4: "Critical",
    answer: 3,
  },
  {
    question:
      "hard/fashionable.mp3",
    choice1: "fashionable",
    choice2: "Fascinating",
    choice3: "Fasting",
    choice4: "Faster",
    answer: 1,
  },
  {
    question:
      "hard/honorary.mp3",
    choice1: "Honestly",
    choice2: "Horrible",
    choice3: "honorary",
    choice4: "Honorable",
    answer: 3,
  },
  {
    question:
      "hard/horizon.mp3",
    choice1: "horizon",
    choice2: "Horse",
    choice3: "Honey",
    choice4: "Hokage",
    answer: 1,
  },
  {
    question:
      "hard/inconvenience.mp3",
    choice1: "increase",
    choice2: "include",
    choice3: "inconvenience",
    choice4: "incredible",
    answer: 3,
  },
  {
    question:
      "hard/interrogate.mp3",
    choice1: "introduction",
    choice2: "intrinsic",
    choice3: "introvert",
    choice4: "interrogate",
    answer: 4,
  },
  {
    question:
      "hard/lucrative.mp3",
    choice1: "luckily",
    choice2: "lucrative",
    choice3: "lucky",
    choice4: "lucretia",
    answer: 2,
  },
  {
    question:
      "hard/malicious.mp3",
    choice1: "male",
    choice2: "malfunctions",
    choice3: "malignant",
    choice4: "malicious",
    answer: 4,
  },
  {
    question:
      "hard/meticulous.mp3",
    choice1: "melting",
    choice2: "meticulous",
    choice3: "metter",
    choice4: "methods",
    answer: 2,
  },
  {
    question:
      "hard/minimize.mp3",
    choice1: "minimum",
    choice2: "minister",
    choice3: "mingle",
    choice4: "minimize",
    answer: 4,
  },
  {
    question:
      "hard/Outrageous.mp3",
    choice1: "outside",
    choice2: "outgoing",
    choice3: "Outrageous ",
    choice4: "outright",
    answer: 3,
  },
  {
    question:
      "hard/parliament.mp3",
    choice1: "parliament",
    choice2: "parlor",
    choice3: "parley",
    choice4: "parliamentary",
    answer: 1,
  },
  {
    question:
      "hard/personification.mp3",
    choice1: "personality",
    choice2: "personification",
    choice3: "perspective",
    choice4: "persuade",
    answer: 2,
  },
  {
    question:
      "hard/phenomenon.mp3",
    choice1: "performer",
    choice2: "person",
    choice3: "phenomenon",
    choice4: "perfect",
    answer: 3,
  },
  {
    question:
      "hard/prestigious.mp3",
    choice1: "phenomenal",
    choice2: "prestigious",
    choice3: "phenotype",
    choice4: "phenytoin",
    answer: 2,
  },
  {
    question:
      "hard/rectangular.mp3",
    choice1: "recruitment",
    choice2: "rectangle",
    choice3: "rectify",
    choice4: "rectangular",
    answer: 4,
  },
  {
    question:
      "hard/scandalized.mp3",
    choice1: "scandalous",
    choice2: "scandalized",
    choice3: "scandals",
    choice4: "scanner",
    answer: 2,
  },
  {
    question:
      "hard/surmise.mp3",
    choice1: "surmise",
    choice2: "surname",
    choice3: "surface",
    choice4: "survey",
    answer: 1,
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
