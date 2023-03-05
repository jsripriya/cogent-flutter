<?php

  include'table.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Categories</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="Alt-Tab" />
  <meta name="description" content="Alt-Tab">
  <link rel="icon" type="image/png" href="images/favicon.png">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="css/plugins.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
</head>
<body>
  <div class="body-inner">
    
    <section class="p-t-10">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="rating-bars" style="list-style-type: none;">
              
                 
                  <div class="boxheadaction">
                    
                  </div>
                </a>
              
              <li>
                <h3 style="padding-top:10px !important">Admin Panel</h3>
              </li>
            </ul>
          </div>
        </div>
        <div style="background: white;border-radius: 20px;padding:20px">
            <div class="row">
                <div class="col-md-9">
                  <input type="Search" class="form-control" placeholder="Search" name="">
                </div>
                
            </div>
            <div class="row m-t-30 p-t-10 p-b-10 border-bottom">
              <div class="col-md-4"><b>Id</b></div>
              <div class="col-md-4"><b>Email</b></div>
              
              
              <!-- <div class="col-md-2"><b>Status</b></div> -->

              <div class="col-md-4"><center><b>Action</b></center></div>
            </div>
              
              <?php
                  $fetch=$esdy_in->prepare("SELECT * FROM flutter_tble  ");
                  $fetch->execute(); 
                  if ($fetch->rowCount()==0) {
                      echo '<div class="row p-t-10 p-b-10 border-bottom" style="font-size:13px !important"><center> ---- No data found ---- </center></div>';
                    }else{
                  $c=1;
                  foreach($fetch->fetchAll(PDO::FETCH_ASSOC)as $key)
                  {
                    // if($key['status']=='1'){
                    //     $status='<div style="color:green !important"><i class="fas fa-check-circle"></i> Active</div>';
                    //     }else if($key['status']=='0'){
                    //     $status='<div style="color:red  !important"><i class="fas fa-times-circle"></i> Draft</div>';
                    //     }   
                          echo' <div class="row p-t-10 p-b-10 border-bottom" style="font-size:13px !important">
              <div class="col-md-4">
                '.$c.'
              </div>
              <div class="col-md-4">
                '.$key['email'].'
              </div>
             
              
              <div class="col-md-4">
                <center>
                  <a class="remove-list"href="?id='.$key['id'].'&show_delete_model" data-id="2"  role="button"> <i class="fas fa-trash"></i></a>
                </center>
              </div>
            </div>
                            ';
                            $c++;
                        }
                    }      
              ?>
            
           
          
        </div>
      </div>
    </section>
  </div>
  <?php
    include 'footer.php';
  ?>
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/functions.js"></script>
<?php
        if(isset($_GET['show_delete_modal'])){
            ?>
              <script type="text/javascript">
                $(document).ready(function(){
                    $('#deleteModel').modal('show');
                    $('#deleteModel').modal('show');
                });
              </script>
            <?php
        }
        if(isset($_GET['show_delete_model'])){
            $id=htmlspecialchars(trim($_GET['id']));
            ?>
            <div id="deleteModel" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you sure ? </h4>
                                    <h5 style="color:#303030 !important">Are you sure you want to remove this item ? Data related to this will be deleted as well. </h5>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button data-dismiss="modal" class="btn btn-b" type="button" style="background:#303030;border-color:#303030">Close</button>
                                <a href="?delete&id=<?=$id?>"  class="btn w-sm btn-danger" id="remove-fileitem">Yes, Delete It!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <?php
              }
                if(isset($_GET['delete'])){
                $id=htmlspecialchars(trim($_GET['id']));
                $delete_head=$esdy_in->prepare("DELETE FROM flutter_tble WHERE id=:id ");
                $delete_head->bindparam(':id',$id);
                $delete_head->execute();
                if($delete_head){
                    echo '<script>window.location.href="?success"</script>';
                }else{
                   echo '<script>window.location.href="?failed"</script>';
                }
              }
?>
<?php
    if(isset($_GET['success'])){
        ?>
          <script type="text/javascript">
            $(document).ready(function(){
                $('#successModel').modal('show');
                $('#successModel').modal('show');
            });
          </script>
        <?php
    }
    if(isset($_GET['success'])){
        ?>
        <div id="successModel" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <img src="../images/icons/checked.png" style="width:100px;margin-bottom: 2%;">
                                <h4 style="color:#303030 !important">Data Deleted Successfully !</h4>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button data-dismiss="modal" class="btn btn-b" type="button" style="background:#303030;border-color:#303030">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php
          }    
?>

<?php
    if(isset($_GET['failed'])){
        ?>
          <script type="text/javascript">
            $(document).ready(function(){
                $('#failModel').modal('show');
                $('#failModel').modal('show');
            });
          </script>
        <?php
    }
    if(isset($_GET['failed'])){
        ?>
        <div id="failModel" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <img src="../images/vs-ico3.png" style="width:100px;margin-bottom: 2%;">
                                <h4 style="color:#303030 !important">Failed To Delete Data !</h4>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button data-dismiss="modal" class="btn btn-b" type="button" style="background:#303030;border-color:#303030">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php
          }    
?>
</body>
</html>