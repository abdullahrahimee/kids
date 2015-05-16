		<script src="jquery-1.8.3.js"></script>
    <script src="../../../assets/js/parsley.js" type="text/javascript">
    </script>
    <script type="text/javascript" src="../../../assets/js/parsley.js"></script>
    <script type="text/javascript">
     // Below Function Executes On Form Submit
function ValidationEvent() {
// Storing Field Values In Variables
  var file = document.getElementById('file').value;
   if(file !='')
   {
       alert('file is required');
       return false;
   }
    </script>
  
              <form id="js-upload-form" method="post" action="assinment.php"  enctype="multipart/form-data" onsubmit="return ValidationEvent();">
              <table class="table">
               
               		<input type="hidden" id="subject" name="id" value="<?php echo $_GET['id']; ?>" class="form-control">
                 <tr><td>Subject Title</td><td><input type="text" required  id="subject" name="subject" class="form-control" data-rules-required="true" data-rules-required-message="This fild is mandatory (personalized message)"></td></tr>
                 <tr><td>Select Your File here</td><td><input type="file" name="file" id="file" placeholder="select your file" data-rules-required="true" data-rules-required-message="This fild is mandatory (personalized message)"></td></tr>
                 <tr><td>Description</td><td><textarea rows="4" class="form-control" id="details" name="area" data-parsley-required="true" data-rules-required-message="This fild is mandatory (personalized message)"></textarea></td></tr>
                 <tr><td></td><td><input type="submit" class="btn btn-primary" name="assinment" onclick="validate();"></td></tr>
               
              </table>
             </form>
             <script type="text/javascript">
	           	$('form#demo').validarium();
	           </script>