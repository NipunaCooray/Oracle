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
    

    $.get("view_all_tokens.php",function(all_tokens){
      $("#all_tokens").html(all_tokens);
    });
  });



   $(document).ready(function() {


    // $(".delete_class").live( 'click', function() {
    //   console.log('wORKING');
    // });

    $("#all_tokens").on( 'click','.delete_class', function() {
      console.log('Working');
      var tabid = $(this).attr('id');

      console.log(tabid);

      if (confirm("Are you sure you want to delete records of this tab ?")) {
          var datastr = 'tabid='+tabid ;    

          console.log(datastr);


          $.ajax({
          type: "POST",
          url: "delete_tab_info.php",
          data: datastr,
          processData: false,
          cache: false,
          timeout: 600000,
          success: function (data) {

            $("#result").html(data).fadeIn();
            console.log("SUCCESS : ", data);
            

          },
          error: function (e) {

            // $("#result").text(e.responseText);
            $("#result").html(data).fadeIn();
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
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Add defect types</a> </div>
    
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
              <h5>Setup firebase token for tabs</h5>
            </div>

            <div class="widget-content nopadding">
                

                <form class="form-horizontal" id="addTokensForm">

                    <div class="control-group">
                      <label class="control-label">IMEI Number:</label>
                      <div class="controls">
                        <input type="text" class="span11" placeholder="IMEI number" id="imei_number" name="imei_number" />
                      </div>
                    </div>
                    
                    
                   <!--  <div class="control-group">
                      <label class="control-label">Firebase token:</label>
                      <div class="controls">
                        <input type="text" class="span11" placeholder="Firebase token" id="tokenid" name="tokenid" />
                      </div>
                    </div> -->

  
                    <div class="form-actions">
                      <button  id="btnSave" type="submit" name="submit" class="btn btn-success">Save</button>
                      <button  id="btnRefresh" type="reset" class="btn btn-success">Refresh</button>
                    </div>
                    
                    
                </form>

                <!-- Error message area -->

                <div class ="row-fluid">
                    <div class="span12"> 
                      <div class="widget-content">
                        <div id="result" class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                          
                        </div>

                        <div id="noValues" class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a>
                          Need to fill all fields
                        </div>

                        

                      </div>

 
                    </div>
                </div> 

                <div class ="row-fluid">
                    <div class="span12"> 
                      <div class="widget-content" id="all_tokens">
                        

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



    $("#btnSave").click(function (event) {


        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#addTokensForm')[0];

    // Create an FormData object
        var data = new FormData(form);

    // If you want to add an extra field for the FormData
        data.append("CustomField", "This is some extra data, testing");

    // disabled the submit button
        $("#btnSave").prop("disabled", true);


        if( $("#imei_number").val() ){

            $.ajax({
                type: "POST",
                url: "add_token_data.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {

                    //$("#result").text(data);
                    $("#result").html(data).fadeIn();
                    console.log("SUCCESS : ", data);
                    $("#btnSave").prop("disabled", false);

                },
                error: function (e) {

                    // $("#result").text(e.responseText);
                    $("#result").html(data).fadeIn();
                    console.log("ERROR : ", e);
                    $("#btnSave").prop("disabled", false);

                }
  
             });
        }else{
          $("#noValues").fadeIn();
        }    

    });


 

  $("#btnRefresh").click(function(event){
    location.reload();

    //  $.get("view_all_defect_types.php",function(all_defects){
    //   $("#defect_types").html(all_defects);
    // });


  });

 





</script>


</body>
</html>
