<!--2. Event Countdown Using Date and Time Functions
Objective: To calculate the number of days remaining until a future event using PHP’s date
and time functions.
Outcome: Students will learn to manipulate timestamps and format output for real-time
applications.-->
<?php
// Set your timezone
date_default_timezone_set('UTC');

// Define your future event date and time (YYYY-MM-DD HH:MM:SS)
$eventDateTime = '2025-9-30 23:59:59';

// Convert event date/time to timestamp for JS
$eventTimestamp = strtotime($eventDateTime);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Event Countdown</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #282c34;
    color: #61dafb;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    flex-direction: column;
  }
  h1 {
    margin-bottom: 20px;
  }
  .countdown {
    display: flex;
    gap: 15px;
    font-size: 2.5rem;
  }
  .time-box {
    background: #20232a;
    padding: 20px 30px;
    border-radius: 10px;
    text-align: center;
    min-width: 90px;
  }
  .number {
    font-weight: bold;
    font-size: 3rem;
  }
  .label {
    font-size: 1rem;
    margin-top: 5px;
    color: #a0a0a0;
  }
</style>
</head>
<body>

<h1>Countdown to Event: <?= htmlspecialchars($eventDateTime) ?></h1>

<div class="countdown" id="countdown">
  <div class="time-box">
    <div class="number" id="days">0</div>
    <div class="label">Days</div>
  </div>
  <div class="time-box">
    <div class="number" id="hours">0</div>
    <div class="label">Hours</div>
  </div>
  <div class="time-box">
    <div class="number" id="minutes">0</div>
    <div class="label">Minutes</div>
  </div>
  <div class="time-box">
    <div class="number" id="seconds">0</div>
    <div class="label">Seconds</div>
  </div>
</div>

<script>
// Event timestamp from PHP (in seconds)
const eventTimestamp = <?= $eventTimestamp ?> * 1000; // convert to milliseconds

function updateCountdown() {
  const now = new Date().getTime();
  const distance = eventTimestamp - now;

  if (distance < 0) {
    document.getElementById("countdown").innerHTML = "<h2>The event has started!</h2>";
    clearInterval(intervalId);
    return;
  }

  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("days").textContent = days;
  document.getElementById("hours").textContent = hours.toString().padStart(2, '0');
  document.getElementById("minutes").textContent = minutes.toString().padStart(2, '0');
  document.getElementById("seconds").textContent = seconds.toString().padStart(2, '0');
}

// Update countdown every second
updateCountdown(); // initial call
const intervalId = setInterval(updateCountdown, 1000);
</script>

</body>
</html>
