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
    #draggable { width: 50px; height: 50px; padding: 0.5em; }
  </style>

  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
  $( function() {
    $( ".draggable" ).draggable({


          
      containment: "parent", scroll: false

    });
  } );

  // var pos = $("#productid_1").position(); 
  // concole.log(pos.top);  // top offset position
  // concole.log(pos.left);

    function findRelativePosition_x(absPosition_x) { 
        var relativePostion_x = ((absPosition_x-16)/500)*100;
        return relativePostion_x;         
    }

    function findRelativePosition_y(absPosition_y){
        var relativePostion_y = ((absPosition_y-160)/770)*100;
        return relativePostion_y;
    }

    $(document).ready(function() {
        $("#findpos").click(function(){
          var pos1 = $("#productid_1").position(); 
          alert(pos1.top); //160
          alert(pos1.left); //16

          var relative_x = findRelativePosition_x(pos1.left);
          var relative_y = findRelativePosition_y(pos1.top);

          // var relativeX_1 = ((pos1.left-16)/500)*100;
          // var relativeY_1 = ((pos1.top-160)/770)*100;

          console.log("Relative_X : "+ relative_x);
          console.log("Relative_Y : "+ relative_y);

          // var pos2 = $("#productid_2").position();
          // alert(pos2.top);
          // alert(pos2.left);
        }); 
    });
  

  </script>

<style>
  #screen{
      float: left;
      width: 500px;
      height: 770px;
      
      border: 1px solid black;
      background-repeat: no-repeat;
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
  
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="index.php"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> My Dashboard </a> </li>
        <li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> Charts</a> </li>
        <li class="bg_ly"> <a href="widgets.html"> <i class="icon-inbox"></i><span class="label label-success">101</span> Widgets </a> </li>
        <li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>
        <li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> Full width</a> </li>
        <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
        <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>

      </ul>
    </div>
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
                      <label class="control-label">Select style image:</label>
                      <div class="controls">
                        <input type="file" name="myFileSelect" id="myFileSelect" >
                      </div>
                    </div>

  
                    <div class="form-actions">
                      <button  id="btnSetImage" type="submit" name="submit" class="btn btn-success">Set image</button>
                      <button  id="btnRefresh" type="reset" class="btn btn-success">Refresh</button>
                    </div>
                    
                    
                </form>

                
                
                <div class="span8">  
                  <div id="screen">

            
                      <!-- <div id="success" class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a> -->

                      <img id="productid_1" src="icon.png" class="draggable" alt="" title=""  />
 
                      <!-- <img id="productid_2" src="icon.png" class="draggable" alt="" title="" /> -->

                  </div>
                </div> 
                
                <div class="span4">
                  <button  id="findpos"  name="findpos" class="btn btn-success">Find positions</button>
                </div>

                 

                </div>
               


                <!-- Error message area -->

                <div class ="row-fluid">
                    <div class="span12"> 
                      <div class="widget-content">
                        <div id="result" class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                          
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
  
$("#btnSetImage").click(function(event){
 

});

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

    //  $.get("view_all_defect_types.php",function(all_defects){
    //   $("#defect_types").html(all_defects);
    // });


  });


</script>






</body>
</html>