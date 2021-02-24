<?php
$play_count = 0;
$correct_guesses = 0;
$guess_high = 0;
$guess_low = 0;

echo "Let's see how well you can guess what number (between 1 and 10, inclusive) we're thinking of. You get 10 tries!";

function guessNumber() {
  global $play_count, $correct_guesses, $guess_high, $guess_low;
  $play_count++;
  $num = rand(1, 10);
  do {
    echo "\nTry to guess my number!\n";
  $guess = readline(">> ");
  $guess = intval($guess);
  } while($guess < 1 || $guess > 10);
  echo "\nRound ".$play_count."\n";
  echo "My number was: ".$num."\n";
  echo "You guessed: ".$guess."\n";

  if($guess > $num) {
    $guess_high++;
  } elseif($guess < $num) {
    $guess_low++;
  } else {
    $correct_guesses++;
  }
}

for($i=0; $i<10; $i++) {
  guessNumber();
}

$win_percentage = ($correct_guesses/10) * 100;

echo "\nYou guessed my number ${win_percentage}%!\n";

if($guess_high > $guess_low) {
  echo "When you guessed wrong, you tended to guess high.";
} else {
  echo "When you guessed wrong, you tended to guess low.";
}
