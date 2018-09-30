<?php
if  ($_SERVER["REQUEST_METHOD"] == "POST"){

  $user = $_POST['userName'];
  $userPass = $_POST['userPass'];

var_dump($_POST);
}





?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" method="post" >
    <form accept-charset="utf-8">
    <div class=""> <label for="username">Username :</label>
      <input type="text" name="userName" value="" id="username" placeholder="example@example.com">
    </div>
      <br>
      <div class=""> <label for="password">Password :</label>
        <input type="password" name="userPass" value="" id="password" placeholder="my strong password">
      </div>
      <br>

      <div placeholder='text Araia'>Text Area: <textarea name="content"></textarea></div>
      <br>
      <fieldset>

<legend>Car Coloru optoin</legend>
      <div class="">
        <select class="" name="carOption[]" multiple>
          <optgroup label="carMake">
            <option value="BMW">BMW</option>
            <option value="Audi">Audi</option>
            <option value="Toyota">Toyota</option>
          </optgroup>
          <optgroup label="carType">
            <option value="Auto">Automatic</option>
            <option value="Manual">Manual</option>
          </optgroup>
        </select>
      </div>
        </fieldset>
      <div class="">
        witch color you like :
        <label for="red"><input type="radio" name="color" value="red" id="red">Red</label><br>
        <label for="green"><input type="radio" name="color" value="green" id="green">Green</label><br>
        <label><input type="radio" name="color" value="blue">Blue</label><br>
      </div>
      <label>Postcode: <input type="text" name="" value="" name="postcode" required pattern="((0[1-9]|5[0-2])|[1-4][0-9])[0-9]{3}
" title="Please use a Valid UK Post Code"></label>
      <label>Number: <input type="number" name="" value="" name="Number" required> </label>
      <label>URL: <input type="url" name="" value="" name="URL" required> </label>
      <label>Email:  <input type="email" name="" value="" name="email" required> </label>

      <button>Send</button>
    </form>
  </body>
</html>
