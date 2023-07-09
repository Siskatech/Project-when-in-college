const username = document.querySelector('#username')
const saveScoreBtn = document.querySelector('#saveScoreBtn')
const finalScore = document.querySelector('#finalScore')
const mostRecentScore = localStorage.getItem('mostRecentScore')

const highScores = JSON.parse(localStorage.getItem('highScores')) || []

const MAX_HIGH_SCORES = 5

finalScore.innerText = mostRecentScore


saveHighScore = e => {
    e.preventDefault()

    const score = {
        score: mostRecentScore,
        name: username.value
    }

    highScores.push(score)

    highScores.sort((a,b) => {
        return b.score - a.score
    })

    highScores.splice(5)

    localStorage.setItem('highScores', JSON.stringify(highScores))
    window.location.assign('/')
}

    let remarks = null
    let remarksColor = null

    if(mostRecentScore <=30){
        remarks ="Bad Grades, Keep Practicing."
        remarksColor = "red"
    }
    else if(mostRecentScore >=40 && finalScore < 70){
        remarks = "Average Grades, You can do better."
        remarksColor = "orange"
    }
    else if(mostRecentScore >=70){
        remarks = "Excelent,keep the good work going."
        remarksColor = "green"
    }

    document.getElementsById('remarks').innerHTML = remarks
    document.getElementsById('remarks').innerHTML = remarksColor
