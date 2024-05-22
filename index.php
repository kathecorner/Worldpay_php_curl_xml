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

</style>
<body>
<form action="curl.php" method="post">
<div class="purchase" id='checkoutDiv'>
  <h1 class="submit">WPG Redirect to HPP site</h1>
   <div>Amount</div><div><input type="text" name="amount" size=10 value="1.00"></div>
   <div>Currency</div><div><input type="text" name="currency" size=4 value="EUR"></div>
   <div class="submit"><input type="submit" value="Submit"></input></div>
</div>
</form>
</body>
</html>