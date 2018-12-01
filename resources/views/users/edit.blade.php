<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="myForm1" action="/update" method="post">
{{ csrf_field() }} 
    Username: <input type="text" name="username" data-validation='required'/> 
    Password: <input type="password" name="password" data-validation='required'/>
<input type="text" name="" id="output1" value="">

    <input type="submit" value="Submit" name="update" /> 
</form>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://raw.githubusercontent.com/defunkt/jquery-pjax/master/jquery.pjax.js"></script>
<script type="text/javascript">
	// prepare the form when the DOM is ready 
$(document).pjax('a.pjax-link', [container], options)
$(document).ready(function() {
    var options = { 
        // target:        '#output1',   // target element(s) to be updated with server response 
        beforeSubmit:  beforeSubmit,  // pre-submit callback 
        success:       success  // post-submit callback 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#myForm1').ajaxForm(options); 
}); 
 
// pre-submit callback 
function beforeSubmit(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 	if(JSON.stringify(formData).includes('update')){
 		    for (var i=0; i < formData.length; i++) { 
        	if($('[name='+formData[i].name+']').attr('data-validation')=='required')
        	{

        	}
        if (!formData[i].value) { 
            alert('Please enter a value for both Username and Password'); 
            return false; 
        } 
    }
 	}
    // console.log('About to submit: \n\n' + queryString);
    // console.log(jqForm[0]);
    // console.log(options); 
     
    alert('Both fields contain values.');
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true; 
} 
 
// post-submit callback 
function success(responseText, statusText, xhr, $form)  { 
    
    // alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
    //     '\n\nThe output div should have already been updated with the responseText.');
    $('#output1').val(responseText);
    alert('dfdf');
    console.log(responseText);
    console.log(statusText);

} 
</script>
</body>
</html>