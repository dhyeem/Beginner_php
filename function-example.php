<?php

function getMesage($morning)
{
  if ($morning) {
    return "Good Morning!";
  }
  else {
    return "Good Evning.";
  }
}


$message = getMesage(false);

echo $message;
 ?>
