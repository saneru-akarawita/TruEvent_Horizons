<!--create a small form with 3 input fields when I enter 2 values in the first 2 inputs, third one automatically adds them and show using php javascript html? -->
<html>
<head>
<title>Sum of Two Numbers</title>
</head>
<body>
<form>
    <!--if a radio button is selected only show all three input fields else hide them-->
    <input type="radio" name="radio" value="no" onclick="document.getElementById('txt1').disabled=true;document.getElementById('txt2').style.display='none';document.getElementById('txt3').style.display='none';">No
    <input type="radio" name="radio" value="yes" onclick="document.getElementById('txt1').disabled=false;document.getElementById('txt2').style.display='block';document.getElementById('txt3').style.display='block';">Yes
    <br><br>
    <input type="text" id="txt1" name="txt1" onkeyup="sum();"/><br>
    <input type="text" id="txt2" name="txt2" onkeyup="sum();"/><br>
    <input type="text" id="txt3" name="txt3"/>
</form>

<script>
function sum() {
       var txtFirstNumberValue = document.getElementById('txt1').value;
       var txtSecondNumberValue = document.getElementById('txt2').value;
       if (txtFirstNumberValue == "")
           txtFirstNumberValue = 0;
       if (txtSecondNumberValue == "")
           txtSecondNumberValue = 0;

       var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
       if (!isNaN(result)) {
           document.getElementById('txt3').value = result;
       }
   }
</script>
</body>
</html>