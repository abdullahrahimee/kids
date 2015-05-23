<!-- 		 
              <script type="text/javascript" src="../../../assets/js/jquery.js"></script>
              <script type="text/javascript" src="../../../assets/js/parsley.js"></script>
              
              <link rel="stylesheet" type="text/css" href="../../../assets/css/parsley.css"> -->
              <form id="demo" method="post" action="assinment.php"  enctype="multipart/form-data" data-parsley-validate>
              <table class="table">
               
               		<input type="hidden" id="subject" name="id" value="<?php echo $_GET['id']; ?>" class="form-control">
                 <tr><td>Subject Title</td><td><input type="text"  id="subject" name="subject" class="form-control" required></td></tr>
                 <tr><td>Select Your File here</td><td><input type="file" name="file" id="file" placeholder="select your file"></td></tr>
                 <tr><td>Description</td><td><textarea rows="4" class="form-control" id="details" name="area"></textarea></td></tr>
                 <tr><td></td><td><input type="submit" class="btn btn-primary" name="assinment"></td></tr>
               
              </table>
             </form>


              <script type="text/javascript">
  $('#demo').parsley();
</script>