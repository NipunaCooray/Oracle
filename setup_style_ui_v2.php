<?php
  session_start();
  if (empty($_SESSION['username'])) {
    //header('Refresh: 2; URL = login.php');
    header("Location: login.php");
  }

  include("connect.php");   
  
  $link=Connection();

 
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KODAMS</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

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
    

    $.get("view_all_styles.php",function(all_styles){
      $("#all_styles").html(all_styles);
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <style>
    #draggable { width: 30px; height: 30px;  }
  </style>

  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
 
 


<style>
  #screen{
      /*float: left;*/
      width: 500px;
      height: 800px;     
      border: 2px solid black;
      background-repeat: no-repeat;
      background-size:contain;
      /*background-size: cover;*/
  }



</style>


</head>
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
              <h5>Upload style images</h5>
            </div>

            <div class="widget-content nopadding">

                <form class="form-horizontal" id="fileUploadForm" action="#" method="post" enctype="multipart/form-data">
                    
                    <div class="control-group">
                      <label class="control-label">Style number:</label>
                      <div class="controls">
                        <input type="text" class="span3" placeholder="Enter exact style number !" id="styleNumber" name="styleNumber" />
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">Select style image:</label>
                      <div class="controls">
                        <input type="file" name="myFileSelect" id="myFileSelect" >
                      </div>
                    </div>

                    <div class="row-fluid">
                
                      <div class="span8" id="screen" >  
                      </div> 

                      <div class="span4">
                           <div class="control-group">
                             <label class="control-label">Add areas for this style:</label>

                              <div class="controls">
                                <input type="text"  placeholder="Enter area" id="area" name="area" />
                                
                              </div>

                              <div class="controls">
                                <button  id="btnAdd"  class="btn btn-success">Add</button>
                                <button  id="btnRemove"  class="btn btn-danger">Remove</button>
                              </div>

                              <div id="addedAreas">
                                


                              </div>
                       
                          </div>

                      </div> 

                    </div>    
  
                    <div class="form-actions">
                      <button  id="btnSetImage" type="submit" name="submit" class="btn btn-success">Save data</button>
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
                          Style number not entered or style image is not selected
                        </div>

                        

                      </div>

 
                    </div>
                </div> 

                <div class ="row-fluid">
                    <div class="span12"> 
                      <div class="widget-content" id="all_styles">
                        

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
  


// Bind to the change event of our file input
$("input[name='myFileSelect']").on("change", function(){

    // Get a reference to the fileList
    var files = !!this.files ? this.files : [];

    // If no files were selected, or no FileReader support, return
    if ( !files.length || !window.FileReader ) return;

    // Only proceed if the selected file is an image
    if ( /^image/.test( files[0].type ) ) {

        // Create a new instance of the FileReader
        var reader = new FileReader();

        // Read the local file as a DataURL
        reader.readAsDataURL( files[0] );

        // When loaded, set image data as background of page
        reader.onloadend = function(){
            
            $("#screen").css("background-image", "url(" + this.result + ")");

        
        }

    }

});



$("#btnRefresh").click(function(event){
  location.reload();

});

var areaList = [];

function displayArray(){

  $("#addedAreas").empty();

  $("#addedAreas").append("<hr/>");


  for(var y=0;y<areaList.length;y++){
    var span = $('<span class="badge badge-important">' + areaList[y] + '</span>') ; 
    $("#addedAreas").append(span);
  }
}

function unique(list) {
  var result = [];
  $.each(list, function(i, e) {
    if ($.inArray(e, result) == -1) result.push(e);
  });
  return result;
}

$("#btnAdd").click(function(event){
  event.preventDefault();
  var area = $("#area").val();
  areaList.push(area);
  //alert("Pushing area "+area+" to area list");

  // var span = $('<span class="badge badge-important">' + area + '</span>') ; 

  // $("#addedAreas").append(span);
  displayArray();
  $("#area").val("");
  

});


$("#btnRemove").click(function(event){
  event.preventDefault();
  
  
  areaList.pop();
  
  displayArray();
 

});



$("#btnSetImage").click(function(event){
  event.preventDefault();

   // Get form
  var form = $('#fileUploadForm')[0];
  // Create an FormData object
  var data = new FormData(form);

  
 
  //Cleaning datalist to contain unique elements only
  areaList = unique(areaList);

  //Appending data to the POST request
  data.append("areaList", areaList);
  


  // disabled the submit button
  $("#btnSetImage").prop("disabled", true);

  

  if($("#styleNumber").val() && $('#myFileSelect').val()){

      $.ajax({
          type: "POST",
          url: "setup_style_v2.php",
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 600000,
          success: function (data) {

              //$("#result").text(data);
              $("#result").html(data).fadeIn();
              console.log("SUCCESS : ", data);
              $("#styleNumber").prop("disabled", false);

          },
          error: function (e) {

              // $("#result").text(e.responseText);
              $("#result").html(data).fadeIn();
              console.log("ERROR : ", e);
              $("#styleNumber").prop("disabled", false);

          }

       });
    }else{
      $("#noValues").fadeIn();
    } 


});


</script>






</body>
</html>