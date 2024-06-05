<?php
$ordernum = file_get_contents("./ordercode.txt");
//echo $ordernum;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WPG HPP demo</title>
</head>
<style>
  * {
    font-family: arial;
    margin: 0px;
  }

  .purchase {
     display:grid;
     grid-template-columns: 100px auto;
     grid-row-gap: 10px;
     background-color: #D5F6F5;
     border: 1px solid black;
     border-radius: 10px;
     padding: 10px;
     font-size: 20px;
     width: 400px;
     margin: 30px;
   }

   .dropin {
    margin: 20px;
    width: 600px;
   }

   h1 {
    padding: 0px;
    margin: 0px;
    margin-bottom: 10px;
   }

   input {
     font-size: 20px;
   }

   .submit {
     grid-column-start: 1;
     grid-column-end: 3;
     justify-self: center;
   }

   .submitButton {
     background-color: rgb(13,183,73);
     font-size: 18px;
     border: 0px;
     border-radius: 8px;
     padding: 10px 15px 10px 15px;
     margin-top: 10px;
     cursor: pointer;
     box-shadow: 1px 1px 2px black;
   }

    .submitButton:hover {
     background-color: rgb(232,203,103);
   }

   #dropin-container {
    margin:  10px;
   }

   .switch_outer {
    width: 120px;
    height: 60px;
    background-color: lightgray;
    border-radius: 30px;
    position: relative;
    cursor: pointer;
    transition: background-color .2s ease-in-out;
}
.switch_outer.active {
    background-color: #51E373;
}
.toggle_switch {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    position: absolute;
    background-color: white;
    top: 0;
    bottom: 0;
    left: 5px;
    margin: auto;
    box-shadow: 1px 1px 7px #B7B7B7, -1px -1px 4px #CECECE inset;
    transition: left .3s ease-in-out;
}
.toggle_switch.active {
    left: 65px;
}


</style>
<body>
<form action="curl.php" method="post">
<div class="purchase" id='checkoutDiv'>
  <h1 class="submit">WPG Redirect to HPP site</h1>
   <div>Amount</div><div><input type="text" name="amount" size=8 value="1000"></div>
   <div>Currency</div><div><input type="text" name="currency" size=5 value="EUR"></div>
   <div>orderCode</div><div><input type="text" name="ordernum" size=12 value=<?php echo $ordernum ?>></div>
   <div class="submit"><input type="submit" value="Submit"></input></div>
</div>
    <div class="switch_outer">
    <div class="toggle_switch"></div>
</div>
</form>
</body>
    <script>
        //スイッチの外枠とスイッチの要素を取得
const switchOuter = document.querySelector(".switch_outer");
const toggleSwitch = document.querySelector(".toggle_switch");

//クリックでacitveクラスを追加/削除
switchOuter.addEventListener("click", () => {
    switchOuter.classList.toggle("active");
    toggleSwitch.classList.toggle("active");
});

    </script>
</html>
