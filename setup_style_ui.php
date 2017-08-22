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
    #draggable { width: 30px; height: 30px;  }
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

        var screenPosition = $("#screen").offset();
        var left = screenPosition.left; //269


        var relativePostion_x = ((absPosition_x-left)/500)*100;
        return relativePostion_x;         
    }

    function findRelativePosition_y(absPosition_y){

        var screenPosition = $("#screen").offset();
        var top = screenPosition.top; //269

        var relativePostion_y = ((absPosition_y-top)/770)*100;
        return relativePostion_y;
    }



    $(document).ready(function() {
        $("#findpos").click(function(){


          //var pos1 = $("#imgA").position(); 
          var A = $("#imgA").offset(); 
         
          var A_x = findRelativePosition_x(A.left);
          var A_y = findRelativePosition_y(A.top);

          alert(A_x);
          alert(A_y);

          console.log("Relative_X : "+ A_x);
          console.log("Relative_Y : "+ A_y);

        }); 

        //Initially disabling all the area icons
        imageEnable();

    });
  

  </script>


  <script type="text/javascript">
    //Method to call to check and enable area images

    function imageEnable() {
        
        if($("#A").is(':checked')) {
            $("#imgA").show();
            $("#imgA").prop('disabled',false);
        } else {
           $("#imgA").hide();
           $("#imgA").prop('disabled',true);
        }  

        if($("#A1").is(':checked')) {
            $("#imgA1").show();
            $("#imgA1").prop('disabled',false);
        } else {
           $("#imgA1").hide();
           $("#imgA1").prop('disabled',true);
        }

        if($("#A2").is(':checked')) {
            $("#imgA2").show();
            $("#imgA2").prop('disabled',false);
        } else {
           $("#imgA2").hide();
           $("#imgA2").prop('disabled',true);
        }

        if($("#B").is(':checked')) {
            $("#imgB").show();
            $("#imgB").prop('disabled',false);
        } else {
           $("#imgB").hide();
           $("#imgB").prop('disabled',true);
        } 

        if($("#B1").is(':checked')) {
            $("#imgB1").show();
            $("#imgB1").prop('disabled',false);
        } else {
           $("#imgB1").hide();
           $("#imgB1").prop('disabled',true);
        } 

        if($("#B2").is(':checked')) {
            $("#imgB2").show();
            $("#imgB2").prop('disabled',false);
        } else {
           $("#imgB2").hide();
           $("#imgB2").prop('disabled',true);
        } 

         if($("#B3").is(':checked')) {
            $("#imgB3").show();
            $("#imgB3").prop('disabled',false);
        } else {
           $("#imgB3").hide();
           $("#imgB3").prop('disabled',true);
        } 

         if($("#B4").is(':checked')) {
            $("#imgB4").show();
            $("#imgB4").prop('disabled',false);
        } else {
           $("#imgB4").hide();
           $("#imgB4").prop('disabled',true);
        } 

         if($("#B5").is(':checked')) {
            $("#imgB5").show();
            $("#imgB5").prop('disabled',false);
        } else {
           $("#imgB5").hide();
           $("#imgB5").prop('disabled',true);
        } 

        if($("#B6").is(':checked')) {
            $("#imgB6").show();
            $("#imgB6").prop('disabled',false);
        } else {
           $("#imgB6").hide();
           $("#imgB6").prop('disabled',true);
        }

        if($("#C").is(':checked')) {
            $("#imgC").show();
            $("#imgC").prop('disabled',false);
        } else {
           $("#imgC").hide();
           $("#imgC").prop('disabled',true);
        }

        if($("#C1").is(':checked')) {
            $("#imgC1").show();
            $("#imgC1").prop('disabled',false);
        } else {
           $("#imgC1").hide();
           $("#imgC1").prop('disabled',true);
        }

        if($("#C2").is(':checked')) {
            $("#imgC2").show();
            $("#imgC2").prop('disabled',false);
        } else {
           $("#imgC2").hide();
           $("#imgC2").prop('disabled',true);
        }

        if($("#E1").is(':checked')) {
            $("#imgE1").show();
            $("#imgE1").prop('disabled',false);
        } else {
           $("#imgE1").hide();
           $("#imgE1").prop('disabled',true);
        }

        if($("#E2").is(':checked')) {
            $("#imgE2").show();
            $("#imgE2").prop('disabled',false);
        } else {
           $("#imgE2").hide();
           $("#imgE2").prop('disabled',true);
        }

        if($("#H").is(':checked')) {
            $("#imgH").show();
            $("#imgH").prop('disabled',false);
        } else {
           $("#imgH").hide();
           $("#imgH").prop('disabled',true);
        }

        if($("#H1").is(':checked')) {
            $("#imgH1").show();
            $("#imgH1").prop('disabled',false);
        } else {
           $("#imgH1").hide();
           $("#imgH1").prop('disabled',true);
        }

        if($("#H2").is(':checked')) {
            $("#imgH2").show();
            $("#imgH2").prop('disabled',false);
        } else {
           $("#imgH2").hide();
           $("#imgH2").prop('disabled',true);
        }

        if($("#H3").is(':checked')) {
            $("#imgH3").show();
            $("#imgH3").prop('disabled',false);
        } else {
           $("#imgH3").hide();
           $("#imgH3").prop('disabled',true);
        }

        if($("#H4").is(':checked')) {
            $("#imgH4").show();
            $("#imgH4").prop('disabled',false);
        } else {
           $("#imgH4").hide();
           $("#imgH4").prop('disabled',true);
        }

        if($("#S1").is(':checked')) {
            $("#imgS1").show();
            $("#imgS1").prop('disabled',false);
        } else {
           $("#imgS1").hide();
           $("#imgS1").prop('disabled',true);
        }

        if($("#S2").is(':checked')) {
            $("#imgS2").show();
            $("#imgS2").prop('disabled',false);
        } else {
           $("#imgS2").hide();
           $("#imgS2").prop('disabled',true);
        }

        if($("#S3").is(':checked')) {
            $("#imgS3").show();
            $("#imgS3").prop('disabled',false);
        } else {
           $("#imgS3").hide();
           $("#imgS3").prop('disabled',true);
        }

        if($("#S4").is(':checked')) {
            $("#imgS4").show();
            $("#imgS4").prop('disabled',false);
        } else {
           $("#imgS4").hide();
           $("#imgS4").prop('disabled',true);
        }

        if($("#T").is(':checked')) {
            $("#imgT").show();
            $("#imgT").prop('disabled',false);
        } else {
           $("#imgT").hide();
           $("#imgT").prop('disabled',true);
        }

        if($("#TT").is(':checked')) {
            $("#imgTT").show();
            $("#imgTT").prop('disabled',false);
        } else {
           $("#imgTT").hide();
           $("#imgTT").prop('disabled',true);
        }

        if($("#V1").is(':checked')) {
            $("#imgV1").show();
            $("#imgV1").prop('disabled',false);
        } else {
           $("#imgV1").hide();
           $("#imgV1").prop('disabled',true);
        }

        if($("#V2").is(':checked')) {
            $("#imgV2").show();
            $("#imgV2").prop('disabled',false);
        } else {
           $("#imgV2").hide();
           $("#imgV2").prop('disabled',true);
        }

        if($("#V3").is(':checked')) {
            $("#imgV3").show();
            $("#imgV3").prop('disabled',false);
        } else {
           $("#imgV3").hide();
           $("#imgV3").prop('disabled',true);
        }

        if($("#V4").is(':checked')) {
            $("#imgV4").show();
            $("#imgV4").prop('disabled',false);
        } else {
           $("#imgV4").hide();
           $("#imgV4").prop('disabled',true);
        }


    }


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



                        <div class="span3">

                            <label class="control-label">Select areas for this style:</label>

                             <div class="control-group">
                              
                              <div class="controls">
                                <label>
                                  <input type="checkbox" name="A" id="A" onclick="imageEnable();" />
                                  A</label>
                                <label>
                                  <input type="checkbox" name="A1" id="A1" onclick="imageEnable();"/>
                                  A1</label>
                                <label>
                                  <input type="checkbox" name="A2" id="A2" onclick="imageEnable();"/>
                                  A2</label>
                                <label>
                                  <input type="checkbox" name="B" id="B" onclick="imageEnable();"/>
                                  B</label>
                                <label>
                                  <input type="checkbox" name="B1" id="B1" onclick="imageEnable();"/>
                                  B1</label>
                                <label>
                                  <input type="checkbox" name="B2" id="B2" onclick="imageEnable();"/>
                                  B2</label>
                                <label>
                                  <input type="checkbox" name="B3" id="B3" onclick="imageEnable();"/>
                                  B3</label>
                                <label>
                                  <input type="checkbox" name="B4" id="B4" onclick="imageEnable();"/>
                                  B4</label>
                                <label>
                                  <input type="checkbox" name="B5" id="B5" onclick="imageEnable();"/>
                                  B5</label>
                                <label>
                                  <input type="checkbox" name="B6" id="B6" onclick="imageEnable();"/>
                                  B6</label> 


                              </div>
                            </div>

                        </div>   

                        <div class="span3">

                             <div class="control-group">
                              
                              <div class="controls">
                                <label>
                                  <input type="checkbox" name="C" id="C" onclick="imageEnable();"/>
                                  C</label>
                                <label>
                                  <input type="checkbox" name="C1" id="C1" onclick="imageEnable();"/>
                                  C1</label>
                                <label>
                                  <input type="checkbox" name="C2" id="C2" onclick="imageEnable();"/>
                                  C2</label>
                                <label>
                                  <input type="checkbox" name="E1" id="E1" onclick="imageEnable();"/>
                                  E1</label>
                                <label>
                                  <input type="checkbox" name="E2" id="E2" onclick="imageEnable();" />
                                  E2</label>
                                <label>
                                  <input type="checkbox" name="H" id="H" onclick="imageEnable();"/>
                                  H</label>
                                <label>
                                  <input type="checkbox" name="H1" id="H1" onclick="imageEnable();"/>
                                  H1</label>
                                <label>
                                  <input type="checkbox" name="H2" id="H2" onclick="imageEnable();"/>
                                  H2</label>
                                <label>
                                  <input type="checkbox" name="H3" id="H3" onclick="imageEnable();"/>
                                  H3</label>
                                <label>
                                  <input type="checkbox" name="H4" id="H4" onclick="imageEnable();"/>
                                  H4</label> 


                              </div>
                            </div>

                        </div>   

                        <div class="span3">

                             <div class="control-group">
                              
                              <div class="controls">
                                <label>
                                  <input type="checkbox" name="S1" id="S1" onclick="imageEnable();"/>
                                  S1</label>
                                <label>
                                  <input type="checkbox" name="S2" id="S2" onclick="imageEnable();"/>
                                  S2</label>
                                <label>
                                  <input type="checkbox" name="S3" id="S3" onclick="imageEnable();"/>
                                  S3</label>
                                <label>
                                  <input type="checkbox" name="S4" id="S4" onclick="imageEnable();"/>
                                  S4</label>
                                <label>
                                  <input type="checkbox" name="T" id="T" onclick="imageEnable();"/>
                                  T</label>
                                <label>
                                  <input type="checkbox" name="TT" id="TT" onclick="imageEnable();"/>
                                  TT</label>
                                <label>
                                  <input type="checkbox" name="V1" id="V1" onclick="imageEnable();"/>
                                  V1</label>
                                <label>
                                  <input type="checkbox" name="V2" id="V2" onclick="imageEnable();"/>
                                  V2</label>
                                <label>
                                  <input type="checkbox" name="V3" id="V3" onclick="imageEnable();"/>
                                  V3</label>
                                <label>
                                  <input type="checkbox" name="V4" id="V4" onclick="imageEnable();"/>
                                  V4</label>        

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

                <div class="row-fluid">
                
                  <div class="span8" id="screen">  

                        <!-- Loading the area image icons -->

                        <img id="imgA" src="AreaIcons/A.png" class="draggable" alt="" title=""  />
                        <img id="imgA1" src="AreaIcons/A1.png" class="draggable" alt="" title=""  />
                        <img id="imgA2" src="AreaIcons/A2.png" class="draggable" alt="" title=""  />
                        <img id="imgB" src="AreaIcons/B.png" class="draggable" alt="" title=""  />
                        <img id="imgB1" src="AreaIcons/B1.png" class="draggable" alt="" title=""  />
                        <img id="imgB2" src="AreaIcons/B2.png" class="draggable" alt="" title=""  />
                        <img id="imgB3" src="AreaIcons/B3.png" class="draggable" alt="" title=""  />
                        <img id="imgB4" src="AreaIcons/B4.png" class="draggable" alt="" title=""  />
                        <img id="imgB5" src="AreaIcons/B5.png" class="draggable" alt="" title=""  />
                        <img id="imgB6" src="AreaIcons/B6.png" class="draggable" alt="" title=""  />
                        <img id="imgC" src="AreaIcons/C.png" class="draggable" alt="" title=""  />
                        <img id="imgC1" src="AreaIcons/C1.png" class="draggable" alt="" title=""  />
                        <img id="imgC2" src="AreaIcons/C2.png" class="draggable" alt="" title=""  />
                        <img id="imgE1" src="AreaIcons/E1.png" class="draggable" alt="" title=""  />
                        <img id="imgE2" src="AreaIcons/E2.png" class="draggable" alt="" title=""  />
                        <img id="imgH" src="AreaIcons/H.png" class="draggable" alt="" title=""  />
                        <img id="imgH1" src="AreaIcons/H1.png" class="draggable" alt="" title=""  />
                        <img id="imgH2" src="AreaIcons/H2.png" class="draggable" alt="" title=""  />
                        <img id="imgH3" src="AreaIcons/H3.png" class="draggable" alt="" title=""  />
                        <img id="imgH4" src="AreaIcons/H4.png" class="draggable" alt="" title=""  />
                        <img id="imgS1" src="AreaIcons/S1.png" class="draggable" alt="" title=""  />
                        <img id="imgS2" src="AreaIcons/S2.png" class="draggable" alt="" title=""  />
                        <img id="imgS3" src="AreaIcons/S3.png" class="draggable" alt="" title=""  />
                        <img id="imgS4" src="AreaIcons/S4.png" class="draggable" alt="" title=""  />
                        <img id="imgT" src="AreaIcons/T.png" class="draggable" alt="" title=""  />
                        <img id="imgTT" src="AreaIcons/TT.png" class="draggable" alt="" title=""  />
                        <img id="imgV1" src="AreaIcons/V1.png" class="draggable" alt="" title=""  />
                        <img id="imgV2" src="AreaIcons/V2.png" class="draggable" alt="" title=""  />
                        <img id="imgV3" src="AreaIcons/V3.png" class="draggable" alt="" title=""  />
                        <img id="imgV4" src="AreaIcons/V4.png" class="draggable" alt="" title=""  />
   
                        <!-- <img id="productid_2" src="icon.png" class="draggable" alt="" title="" /> -->

                    
                  </div> 
                
                  <div class="span4">
                    <button  id="findpos"  name="findpos" class="btn btn-success">Find positions</button>
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


$("#btnSetImage").click(function(event){
  event.preventDefault();

   // Get form
  var form = $('#fileUploadForm')[0];
  // Create an FormData object
  var data = new FormData(form);

  var A = $("#imgA").offset(); 

  var A_x = findRelativePosition_x(A.left);
  var A_y = findRelativePosition_y(A.top);

  alert(A_x);
  alert(A_y);

  data.append("A_x", A_x);
  data.append("A_y", A_y);

  // disabled the submit button
  $("#btnSetImage").prop("disabled", true);

  

  if($("#styleNumber").val() && $('#myFileSelect').val()){

      $.ajax({
          type: "POST",
          url: "setup_style.php",
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