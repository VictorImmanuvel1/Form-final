<?php
	//get the index from URL
	$index = $_GET['index'];

	//get json data
	$data = file_get_contents('messages.json');
	$data_array = json_decode($data);

	//assign the data to selected index
	$row = $data_array[$index];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="cities.js"></script>

    <title>Edit</title>
</head>

<body>
    <form class="registerform" method="post" name="form_name" id="registration"">

      <div class=" form-header">
        <h1>Registration</h1>
        </div>
<input type="text" name="id" id="textbox3" class="form-input" value="<?php echo $row->id;?>" required="True">
        <div class="form-body">
            <div class="horizontal-group">
                <div class="form-group left">
                    <label for="firstname" class="label-title">First name </label>
                    <input type="text" name="fname" id="fname" class="form-input" value="<?php echo $row->fname;?>">
                </div>
                <div class="form-group right">
                    <label for="lastname" class="label-title">Last name</label>
                    <input type="text" name="lname" class="form-input" value="<?php echo $row->lname;?>">
                </div>
            </div>


            <div class="form-group">
                <label for="age" class="label-title">Age</label>
                <input type="text" name="age" class="form-input" value="<?php echo $row->age;?>">
            </div>


            <div class="form-group">
                <label class="label-title">Gender:</label>
                <div class="input-group">
                    <div class="gender">
                        <label for="male"><input type="radio" name="gender" value="male" id="male" <?php if($row->gender=="male"){ echo "checked";}?>> Male</label>
                        <label for="female"><input type="radio" name="gender" value="female" id="female" <?php if($row->gender=="female"){ echo "checked";}?>> Female</label>
                    </div>
                </div>
            </div>
            <label class="label-title">Education</label>
            <div class="ug">
                <label><input class="single-checkbox1" type="checkbox" name="ug" id="one" value="B.Sc.," <?php if($row->ug=="B.Sc.,"){ echo "checked";}?>>B.Sc.,</label>
                <label><input class="single-checkbox1" type="checkbox" name="ug" id="two" value="B.Tech.," <?php if($row->ug=="B.Tech.,"){ echo "checked";}?> >B.Tech.,</label>
            </div>
            <div class="hide_tb1">
                <input type="text" id="textbox1" name="college_ug" value="<?php echo $row->college_ug;?>"><br>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                    $('input.single-checkbox1').change(function () {
                        if (($('#one').is(':checked')) || ($('#two').is(':checked')))
                            $('div.hide_tb1').show();
                        else $('div.hide_tb1').hide();
                    }).change();
                });
            </script>
            <div class="pg">
                <label><input class="single-checkbox2" type="checkbox" name="pg" id="three" value="MCA.," <?php if($row->pg=="MCA.,"){ echo "checked";}?>>MCA.,</label>
                <label><input class="single-checkbox2" type="checkbox" name="pg" id="four" value="M.Tech.," <?php if($row->pg=="M.Tech.,"){ echo "checked";}?>>M.Tech.,</label>
            </div>
            <div class="hide_tb2">
                <input type="text" id="textbox2" name="college_pg" value="<?php echo $row->college_pg;?>"><br>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                    $('input.single-checkbox2').change(function () {
                        if (($('#three').is(':checked')) || ($('#four').is(':checked')))
                            $('div.hide_tb2').show();
                        else $('div.hide_tb2').hide();
                    }).change();
                });
            </script>
            <br>
            <div class="form-group">
                <label class="label-title">State</label>
                <select onchange="print_city('state', this.selectedIndex);" id="sts" name="states"
                    class="form-input"></select><br>
            </div>
            <div class="form-group">
                <label class="label-title">City</label>
                <select id="state" class="form-input" name="cities"><option value="<?php echo $row->cities;?>" selected>
                        <?php echo $row->cities;?></select>
                <script language="javascript">print_state("sts");
                Array.from(document.querySelector("#sts").options).forEach(function(option_element) {
                       let option_text = option_element.text;
                       let option_value = option_element.value;
                       if(option_text=="<?php echo $row->states;?>"){
                       option_element.selected = 'selected';
                      }
                      console.log('Option Text : ' + option_text);
                      console.log('Option Value : ' + option_value);

                      console.log("\n\r");
});
</script>
            </div>
            <script>
                $(document).ready(function () {
                    $('#sts').select2();
                });
            </script>
            <script>
                $(document).ready(function () {
                    $('#state').select2();
                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
            <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

            <script src="validation.js"></script>

            <input type="submit" class="btn" name="submit" value="Update">
    </form>
    <?php

	if(isset($_POST['submit'])){
	
		$input = array(
      'id' => $_POST['id'],
			"fname" => $_POST['fname'],
      "lname" => $_POST['lname'],
			"age" => $_POST['age'],
			"gender" => $_POST['gender'],
      "ug" => $_POST['ug'],
      "pg" => $_POST['pg'],
      "college_ug"=> $_POST['college_ug'],
      "college_pg"=> $_POST['college_pg'],
      "states" =>$_POST['states'],
      "cities" =>$_POST['cities']
		);

	
		$data_array[$index] = $input;

		//encode back to json
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('messages.json', $data);
    echo "<script>window.location.href='table.php';</script>";
	}
?>
</body>

</html>