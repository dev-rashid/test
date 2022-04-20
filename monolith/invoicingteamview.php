
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    TDWS
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
<?php include("components/sidebar.php") ?>
<?php include("models/db.php")?>
<?php
     $data = read('bookings', "ID, BookingNo, POL,POD, ETD,CustomerName, DraftStatus, ContainerStatus");
    //  print_r($data);
     
?>


  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
     <!-- Modal -->
<div class="modal fade"  id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" onclick="closemodal()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- this is our dynamic form data -->
          <div class="spinner-border preloader" style="display:none;" role="status">
            <span class="sr-only">Loading...</span>
          </div>

        <div id="dynamicData" style="display:none;">
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div id="view_more" style="display:none;">

</div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Bookings table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>

                      <?php foreach($data[0] as $key => $value){
                         echo '<th class="text-uppercase text-secondary text-xs font-weight-bolder ">'.$key.'</th>';
                         
                      };
                      echo '<th class="text-uppercase text-secondary text-xs font-weight-bolder ">Actions</th>';
                       ?>
                     
                    </tr>
                    
                  </thead>
                  <tbody>
                    <tr>
                    <?php
                    // print_r($data); exit; 
                    echo "<script>var options=" . json_encode($data) .";</script>";
                      
                    foreach($data as $boxes){
                      echo '<tr>';
                
                            foreach($boxes as $k => $v)
                            {
                             echo "<td class='text-secondary text-xs'>". $v ."</td>";
                            }

                            echo '<td><button type="button" class="btn btn-primary" id="'.$boxes['ID'].'"  onclick="showmodel('.$boxes['ID'].')">Edit</button>
                            <button type="button" data-url class="btn show_button btn-primary" id="'.$boxes['ID'].'"  onclick="showbutton('.$boxes['ID'].')">View More</button>
                            </td>';
                            
                          echo '</tr>';
                        };  ?>
                    </tr>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

<script>
                        (function(){

                        
                          $('.btn').on('click', function() {
                            $("#exampleModal").show();
                           let id = $(this).data('id');
                           saveNote(id);
                           $('#exampleModal').modal('toggle');
                          
                        
                       });

                       
//BookingNo, POL,POD, ETD,CustomerName, DraftStatus, ContainerStatus
                      });
                      //modal code here
                      function showmodel(id){
                          var pointerid = id-1;
                          var pointer = options[pointerid];

                          var BookingNo = makeEditField(pointer.BookingNo, 'BookingNo');
                         var POL = makeEditField(pointer.POL, 'POL');
                         var POD = makeEditField(pointer.POD, 'POD');
                         var ETD = makeEditField(pointer.ETD, 'ETD');
                         var CustomerName = makeEditField(pointer.CustomerName, 'CustomerName');
                         var DraftStatus = makeEditField(pointer.DraftStatus, 'DraftStatus');
                         var ContainerStatus = makeEditField(pointer.ContainerStatus, 'ContainerStatus');

                         var fields = [BookingNo, POL, POD, ETD, CustomerName, DraftStatus, ContainerStatus];
                          myform = makeForm(fields, 'models/savedata_api.php', 'post');

                        // console.log(myform)
                          $('#dynamicData').html(myform) //use .html instead of append
                          $('#dynamicData').show();
                          $('#editModal').modal('toggle');
                      }

                      function makeEditField(fieldname, key){
                             return '<label>'+key+'</label><br><input type="text" name="'+key+'" id="'+fieldname+'" value="'+fieldname+'"><br>';
                          }
                  
                      function makeForm(fields, uniqueid, action, method){
                        var myfromstring = '<form id="myfrom" method="'+method+'" action="'+action+'">';
                        myfromstring += '<input type="hidden" name="ID" value="'+uniqueid+'">';
                        var arrayLength = fields.length;
                        for (var i = 0; i < arrayLength; i++) {
                            
                            myfromstring += fields[i];
                            //Do something

                        }
                        
                        myfromstring += '<button type="submit" class="btn btn-primary"></from>';
                        return myfromstring;
                      }

                      function closemodal(){
                        $('#editModal').modal('toggle');
                        $('#dynamicData').empty();
                        //clear dynamic data div by using .clear metho3d
                      }

                      //view more button code here

                      function showbutton(rowid){
                        console.log(rowid);

                           var request =  $.ajax({
                              method: "POST",
                              url: "models/viewmore_api.php",
                              data: { id: rowid }
                              });
                           request.done(function(msg){
                             
                             var message = formatMsgtoUlLi(msg); 
                             $('#view_more').html(message) //use .html instead of append
                              $('#view_more').show();
                              $('#myModal').modal('toggle');
                              
                           })

                        }

                        function formatMsgtoUlLi(msg){
                          arr = $.parseJSON(msg)[0];
                          // console.log(arr)

                          var myUlLiString = '<ul style="padding-left:0px !important;">'
                          var i=0;
                          jQuery.each( arr, function( key, val ) {
                              if(i%2==0){
                               myUlLiString += '<li class="list-group-item border-0 ps-0 pt-0 text-sm" style="background-color:#eeeeee;"><strong class="text-dark">'+key+':</strong> &nbsp; '+val+'</li>';
                              }
                              else{
                                myUlLiString += '<li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">'+key+':</strong> &nbsp; '+val+'</li>';  
                              }
                              // console.log(i);
                              i++;
                            });
                          myUlLiString += '</ul>'

                          return myUlLiString;
                        }



</script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>