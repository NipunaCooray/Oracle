<?php
  session_start();
  if (empty($_SESSION['username'])) {
    //header('Refresh: 2; URL = login.php');
    header("Location: login.php");
  }

  include("connect.php");   
  
  $link=Connection();

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>KODAMS</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


 <style type="text/css">

    
    .alert{
      display: none;
    }

  
</style>


<script src="js/excanvas.min.js"></script> 

<script src="js/jquery.min.js"></script> 

<script type="text/javascript">
   $(document).ready(function() {
    

    $.get("view_all_notifying_users.php",function(all_users){
      $("#all_users").html(all_users);
    });
  });


$(document).ready(function() {


    // $(".delete_class").live( 'click', function() {
    //   console.log('wORKING');
    // });

    $("#all_users").on( 'click','.delete_class', function() {
      console.log('Working');
      var notifyinguserid = $(this).attr('id');

      console.log(notifyinguserid);

      if (confirm("Are you sure you want to delete this notifying user ?")) {
          var datastr = 'notifyinguserid='+notifyinguserid ;    

          console.log(datastr);


          $.ajax({
          type: "POST",
          url: "delete_notifying_user.php",
          data: datastr,
          processData: false,
          cache: false,
          timeout: 600000,
          success: function (data) {

            $("#success").html(data).fadeIn();
            console.log("SUCCESS : ", data);
            

          },
          error: function (e) {

            // $("#result").text(e.responseText);
            $("#success").html(data).fadeIn();
            console.log("ERROR : ", e);
            

          }

          });

      } else {
        
      }

    });

});



</script>


<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 


</head>
<body>


<?php include 'nav.php';?>

<!--main-container-part-->
<div id="content">

<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Add notifying user</a> </div>
    
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
  
    <?php include 'action_boxes.php';?>
<!--End-Action boxes-->    


    <hr/>
    <div class="row-fluid">

    <div class="span12">

        <div class="widget-box">
          
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Add notifying user</h5>
            </div>

            <div class="widget-content nopadding">
               <form class="form-horizontal" id="form1" >

                  <div class="control-group">
                      <label class="control-label">Name:</label>
                      <div class="controls">
                        <input type="text" class="span3" placeholder="Name of the person" id="username" name="username" />
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">E-mail:</label>
                      <div class="controls">
                        <input type="text" class="span10" placeholder="MAS email " id="email" name="email" />
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">Contact number:</label>
                      <div class="controls">
                        <input type="text" class="span10" placeholder="Contact no " id="contactnumber" name="contactnumber" />
                      </div>
                  </div>



                  <div class="form-actions">
                      <button id="btnSave" type="submit" class="btn btn-success">Save new user</button>
                      <button id="btnRefresh" type="reset" class="btn btn-success">Refresh</button>
                  </div>

                  


                </form>  

                <!-- Error message area -->

                <div class ="row-fluid">
                    <div class="span12"> 
                      <div class="widget-content">
                        <div id="success" class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                          
                        </div>

                        <div id="noValues" class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a>
                          Fill all the values
                        </div>

                      </div>

 
                    </div>
                </div> 

                <div class ="row-fluid">
                    <div class="span12"> 
                      <div class="widget-content" id="all_users">
                        

                      </div>

 
                    </div>
                </div>    


            </div>
            
           


        </div>

    </div>
</div>
</div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; MAS Autonomation Group </div>
</div>

<!--end-Footer-part-->

<!-- Custom js to save data -->

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>



<script type="text/javascript">
    $("#btnSave").click(function(event){

      event.preventDefault();
      $(".alert").hide();

      if(($("#username").val() != "") && ($("#contactnumber").val())  && ($("#email").val())){
        $.get("add_notifying_user.php?username="+ $("#username").val()+"&contactnumber="+ $("#contactnumber").val()+"&email="+ $("#email").val() ,function(data){
          //alert(data);
          

          if(data==""){
            
            //$("#fail").fadeIn();
            $("#fail").html(data).fadeIn();

          } else{
            
            //$("#success").fadeIn();
            $("#success").html(data).fadeIn();

            $.get("view_all_notifying_users.php",function(all_users){
              $("#all_users").html(all_users);
            });

          }
        });
      }else{
        //alert("Please enter valid city name ");
        $("#noValues").fadeIn();
      }

      
    });

    $("#btnRefresh").click(function(event){
      location.reload();
    });

    $( document ).ready(function() {
      $.get("view_all_notifying_users.php",function(all_users){
        $("#all_users").html(all_users);
      });
    });





</script>



</body>
</html>
