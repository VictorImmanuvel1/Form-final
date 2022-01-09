jQuery.validator.addMethod("noSpace", function(value, element) { 
    return value == '' || value.trim().length != 0;  
}, "No space please and don't leave it empty");
jQuery.validator.addMethod("notEqual", function(value, element, param) {
 return this.optional(element) || value.toLowerCase() != $(param).val().toLowerCase();
}, "This has to be different...");

var $registrationForm = $('#registration');
if($registrationForm.length){
  $registrationForm.validate({
      rules:{
          fname: {
              required: true,
              noSpace: true,
              lettersonly: true
          },
          lname: {
              required: true,
              noSpace: true,
              lettersonly: true,
              notEqual:"#fname"
          },
          age: {
            required: true,
            digits: true,
            min:1,
            max:100
          },
          gender: {
              required: true
          },
          ug: {
              required: true,
              maxlength: 1
          },
          college_ug: {
            required: true
          },
          pg: {
              required: false,
              maxlength: 1
          },
          college_pg: {
            required: true
          },
          states: {
              required: true
          },
          cities: {
              required: true
          },
      },
      messages:{
          fname: {
              required: 'Please enter first name!',
              lettersonly: 'Only letters allowed'
          },
          lname: {
              required: 'Please enter last name!',
              lettersonly: 'Only letters allowed',
              notEqual: 'First name and last name should not be same'
          },
          age: {
            required: 'Please enter your age',
            digits:'Only numbers are allowed',
            max:'Please Enter your correct age'
          },
          ug: {
            maxlength: 'Please Select one'
          },
          college_ug: {
            required: 'Please enter your college name'
          },
          pg: {
            maxlength: 'Please Select one'
          },
          college_pg: {
            required: 'Please enter your college name'
          },
          states: {
              required: 'Please select state!'
          },
         cities: {
              required: 'Please select city!'
          },
      },
    errorPlacement: function (error, element) {
            if (element.attr("name") == "ug") {
                error.appendTo(element.parents('.ug'));
        }
        else if (element.attr("name") == "pg") {
                error.appendTo(element.parents('.pg'));
        }
        else if (element.attr("name")=="gender"){
          error.appendTo(element.parents('.gender'));
        }
        
        else 
        { 
            error.insertAfter( element );
        }
        
       }
  });
}