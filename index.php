<!DOCTYPE html>
<html lang="en">
<head>
<!-- Select2 CSS --> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
<link rel="stylesheet" href="style.css">

<!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="cities.js"></script>
   
    <title>Document</title>
</head>
<body >
<form class="registerform" action="script.php" method="post" name="form_name" id= "registration"">

      <div class="form-header">
        <h1>Registration</h1>
      </div>
 
 <div class="form-body">
	     <div class="horizontal-group">
          <div class="form-group left">
            <label for="firstname" class="label-title">First name </label>
            <input type="text" name="fname" id= "fname" class="form-input" placeholder="enter your first name">
          </div>
          <div class="form-group right">
            <label for="lastname" class="label-title">Last name</label>
            <input type="text" name="lname" class="form-input" placeholder="enter your last name">
          </div>
        </div>

       
        <div class="form-group">
          <label for="age" class="label-title">Age</label>
          <input type="text" name="age" class="form-input" placeholder="enter your age">
        </div>

       
          <div class="form-group">
            <label class="label-title">Gender:</label>
            <div class="input-group">
            <div class = "gender">
              <label for="male"><input type="radio" name="gender" value="male" id="male"> Male</label>
              <label for="female"><input type="radio" name="gender" value="female" id="female"> Female</label>
              </div>
            </div>
          </div>
           <label class="label-title">Education</label>
            <div class="ug">
              <label><input class="single-checkbox1" type="checkbox" name="ug" id="one" value="B.Sc.,">B.Sc.,</label>
              <label><input class="single-checkbox1" type="checkbox" name="ug" id="two" value="B.Tech.,">B.Tech.,</label>
              </div>
              <div class="hide_tb1">
              <input type="text" id="textbox1" name="college_ug" placeholder="Enter your College Name"><br>
              </div>
              <script>
              jQuery(document).ready(function($) {
	            $('input.single-checkbox1').change(function(){
		          if(($('#one').is(':checked')) || ($('#two').is(':checked')))
              $('div.hide_tb1').show();
		          else $('div.hide_tb1').hide();
	              }).change();
              });
            </script>
            <div class="pg">
              <label><input class="single-checkbox2" type="checkbox" name="pg" id="three" value="MCA.,">MCA.,</label>
              <label><input class="single-checkbox2" type="checkbox" name="pg" id="four" value="M.Tech.,">M.Tech.,</label>
              </div>
              <div class="hide_tb2">
              <input type="text" id="textbox2" name="college_pg" placeholder="Enter your College Name"><br>
              </div>
              <script>
              jQuery(document).ready(function($) {
	            $('input.single-checkbox2').change(function(){
		          if(($('#three').is(':checked')) || ($('#four').is(':checked')))
               $('div.hide_tb2').show();
		          else $('div.hide_tb2').hide();
	              }).change();
              });
            </script>
            <br>
<div class="form-group" >
            <label class="label-title">State</label>
<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="states" class="form-input" ></select><br>
</div>
<div class="form-group" >
<label class="label-title">City</label>
<select id ="state" class="form-input" name="cities"></select>
<script language="javascript">print_state("sts");</script>
</div>
<script>
$(document).ready(function(){
  $('#sts').select2();
});
</script>
<script>
$(document).ready(function(){
  $('#state').select2();
});
</script>
  	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
     <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    
    <script src="validation.js"></script>  

<input type="submit" class="btn" name="submit" value="Submit">
</form>
</body>
</html>
