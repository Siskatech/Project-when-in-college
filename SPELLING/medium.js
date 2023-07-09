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
      "medium/ambulance.mp3",
    choice1: "ambulatory",
    choice2: "ambulance",
    choice3: "ambulation",
    choice4: "ambush",
    answer: 2,
  },
  {
    question:
      "medium/determine.mp3",
    choice1: "determine",
    choice2: "determined",
    choice3: "detect",
    choice4: "details",
    answer: 1,
  },
  {
    question:
      "medium/equation.mp3",
    choice1: "aquipment",
    choice2: "equivalent",
    choice3: "equation",
    choice4: "equity",
    answer: 3,
  },
  {
    question:
      "medium/forward.mp3",
    choice1: "forward",
    choice2: "forw",
    choice3: "forwarded",
    choice4: "forsake",
    answer: 1,
  },
  {
    question:
      "medium/inventor.mp3",
    choice1: "invention",
    choice2: "investment",
    choice3: "inventor",
    choice4: "investigation",
    answer: 3,
  },
  {
    question:
      "medium/journey.mp3",
    choice1: "journey",
    choice2: "journalist",
    choice3: "journalism",
    choice4: "jobs",
    answer: 1,
  },
  {
    question:
      "medium/neither.mp3",
    choice1: "neighbor",
    choice2: "never",
    choice3: "neither",
    choice4: "next",
    answer: 3,
  },
  {
    question:
      "medium/numeral.mp3",
    choice1: "number",
    choice2: "nurse",
    choice3: "numerous",
    choice4: "numeral",
    answer: 4,
  },
  {
    question:
      "medium/pattern.mp3",
    choice1: "patterned",
    choice2: "pattern",
    choice3: "patient",
    choice4: "path",
    answer: 2,
  },
  {
    question:
      "medium/perhaps.mp3",
    choice1: "performance",
    choice2: "perfect",
    choice3: "period",
    choice4: "perhaps",
    answer: 4,
  },
  {
    question:
      "medium/quietly.mp3",
    choice1: "quickly",
    choice2: "quietly",
    choice3: "quite",
    choice4: "question",
    answer: 2,
  },
  {
    question:
      "medium/receive.mp3",
    choice1: "recently",
    choice2: "recognize",
    choice3: "recur",
    choice4: "receive",
    answer: 4,
  },
  {
    question:
      "medium/rehearse.mp3",
    choice1: "rehabilitation",
    choice2: "reheat",
    choice3: "rehearse",
    choice4: "rehearsing",
    answer: 3,
  },
  {
    question:
      "medium/scissors.mp3",
    choice1: "scissors",
    choice2: "science",
    choice3: "sciss",
    choice4: "scientist",
    answer: 1,
  },
  {
    question:
      "medium/slippery.mp3",
    choice1: "slightly",
    choice2: "slippery",
    choice3: "slide",
    choice4: "sleeping",
    answer: 2,
  },
  {
    question:
      "medium/southern.mp3",
    choice1: "soulmate",
    choice2: "source",
    choice3: "southern",
    choice4: "sometimes",
    answer: 3,
  },
  {
    question:
      "medium/successful.mp3",
    choice1: "stomp",
    choice2: "successful",
    choice3: "stock",
    choice4: "stright",
    answer: 2,
  },
  {
    question:
      "medium/stomach.mp3",
    choice1: "succeed",
    choice2: "should",
    choice3: "short",
    choice4: "stomach",
    answer: 4,
  },
  {
    question:
      "medium/whisper.mp3",
    choice1: "whiped",
    choice2: "whisper",
    choice3: "whiplash",
    choice4: "which",
    answer: 2,
  },
  {
    question:
      "medium/yesterday.mp3",
    choice1: "yesterday",
    choice2: "yeste",
    choice3: "yourself",
    choice4: "yeah",
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
