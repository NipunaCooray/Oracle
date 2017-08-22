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
    

    $.get("view_all_defect_types.php",function(all_defects){
      $("#defect_types").html(all_defects);
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

<script type="text/javascript">
  

</script>

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
              <h5>Add defect types</h5>
            </div>

            <div class="widget-content nopadding">
               <form class="form-horizontal">

                  <div class="control-group">
                      <label class="control-label">Defect ID:</label>
                      <div class="controls">
                        <input type="text" class="span3" placeholder="Defect ID" id="defectid" name="defectid" />
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">Defect name:</label>
                      <div class="controls">
                        <input type="text" class="span10" placeholder="Enter defect name (ex: fray yarn) " id="defectname" name="defectname" />
                      </div>
                  </div>

                  <div class ="row-fluid">
                    <div class="span6"> 
                      <div class="control-group">
                        <label class="control-label">Notifying user - 1:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `notifyingusers`";
                              $res = mysql_query($query,$link);
                              echo '<select name = "userlist1" class="form-control" id="userlist1" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['notifyinguserid'].'" ';
                                  echo ">{$row['username']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>
                    </div>

                    <div class="span6"> 
                        <div class="control-group">
                            <label class="control-label">Defect count margin - 1 :</label>
                            <div class="controls">
                              <input type="text" class="span10" placeholder="Enter notifying margin" id= "defectcountmargin1" name="defectcountmargin1" />
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class ="row-fluid">
                    <div class="span6"> 
                      <div class="control-group">
                        <label class="control-label">Notifying user - 2:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `notifyingusers`";
                              $res = mysql_query($query,$link);
                              echo '<select name = "userlist2" class="form-control" id="userlist2" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['notifyinguserid'].'" ';
                                  echo ">{$row['username']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>
                    </div>

                    <div class="span6"> 
                        <div class="control-group">
                            <label class="control-label">Defect count margin - 2 :</label>
                            <div class="controls">
                              <input type="text" class="span10" placeholder="Enter notifying margin" id= "defectcountmargin2" name="defectcountmargin2" />
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class ="row-fluid">
                    <div class="span6"> 
                      <div class="control-group">
                        <label class="control-label">Notifying user - 3:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `notifyingusers`";
                              $res = mysql_query($query,$link);
                              echo '<select name = "userlist3" class="form-control" id="userlist3" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['notifyinguserid'].'" ';
                                  echo ">{$row['username']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>
                    </div>

                    <div class="span6"> 
                        <div class="control-group">
                            <label class="control-label">Defect count margin - 3 :</label>
                            <div class="controls">
                              <input type="text" class="span10" placeholder="Enter notifying margin" id= "defectcountmargin3" name="defectcountmargin3" />
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class ="row-fluid">
                    <div class="span6"> 
                      <div class="control-group">
                        <label class="control-label">Notifying user - 4:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `notifyingusers`";
                              $res = mysql_query($query,$link);
                              echo '<select name = "userlist4" class="form-control" id="userlist4" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['notifyinguserid'].'" ';
                                  echo ">{$row['username']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>
                    </div>

                    <div class="span6"> 
                        <div class="control-group">
                            <label class="control-label">Defect count margin - 4 :</label>
                            <div class="controls">
                              <input type="text" class="span10" placeholder="Enter notifying margin" id= "defectcountmargin4" name="defectcountmargin4" />
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class="form-actions">
                      <button id="btnSave" type="submit" class="btn btn-success">Save new defect type</button>
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
                      <div class="widget-content" id="defect_types">
                        

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

    if(($("#defectid").val() != "") && ($("#defectname").val()) && ($("#userlist1").val()) && ($("#defectcountmargin1").val()) && ($("#userlist2").val()) && ($("#defectcountmargin2").val()) && ($("#userlist3").val()) && ($("#defectcountmargin3").val()) && ($("#userlist4").val()) && ($("#defectcountmargin4").val())  ){
      $.get("add_defect_types.php?defectid="+ $("#defectid").val()+"&defectname="+ $("#defectname").val() +"&userlist1="+ $("#userlist1").val() +"&defectcountmargin1="+ $("#defectcountmargin1").val() +"&userlist2="+ $("#userlist2").val() +"&defectcountmargin2="+ $("#defectcountmargin2").val()+"&userlist3="+ $("#userlist3").val()+"&defectcountmargin3="+ $("#defectcountmargin3").val()+"&userlist4="+ $("#userlist4").val()+"&defectcountmargin4="+ $("#defectcountmargin4").val(),function(data){
        //alert(data);
        

        if(data==""){
          
          //$("#fail").fadeIn();
          $("#fail").html(data).fadeIn();

        } else{
          
          //$("#success").fadeIn();
          $("#success").html(data).fadeIn();

          $.get("view_all_defect_types.php",function(all_defects){
            $("#defect_types").html(all_defects);
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

    //  $.get("view_all_defect_types.php",function(all_defects){
    //   $("#defect_types").html(all_defects);
    // });


  });

 





</script>


</body>
</html>
