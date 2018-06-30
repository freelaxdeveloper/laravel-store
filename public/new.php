<?php


header("Content-Type: text/event-stream\n\n");

while (1) {
  // Every second, send a "ping" event.
  
  echo 'data: {"time": "цц"}';
  echo "\n\n";
  
  // Send a simple message at random intervals.
  
  $counter--;
   
  ob_end_flush();
  flush();
  sleep(1);
}