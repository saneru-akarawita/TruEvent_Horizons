let countDownTimer;

function startTimer(duration, display) {

  let timer = duration, minutes, seconds;

  countDownTimer = setInterval(() => {
    minutes = parseInt(timer / 60, 10)
    seconds = parseInt(timer % 60, 10);

    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    display.textContent = minutes + ":" + seconds;

    if (--timer < 0) {
      timer = duration;
    }
  }, 1000);
}

const startBtn = document.querySelector('#getOTPBtn');

startBtn.addEventListener('click', () => {
  // Clear previous countdown timers
  clearInterval(countDownTimer);
  // Set time to 5 minutes
  const fiveMinutes = 60 * 5;
  const display = document.querySelector('#countdown');
  
  // Start the tiemr
  startTimer(fiveMinutes, display);
});
