<?php $con=mysqli_connect('localhost','root','','db_pemira'); ?>
      <div class="row">
          <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Data Calon</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Nama Calon</th>
                                  <th>Nim Calon</th>
                                  <th>Tempat Lahir</th>
                                  <th>Agama</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php
                                  $query=mysqli_query($con,"select * from calon order by id_calon desc");
                                  while($has=mysqli_fetch_row($query))
                                  {

                                      echo "
                                      <tr>
                                          <td>$has[4]</td>
                                          <td>$has[5]</td>
                                          <td>$has[6]</td>
                                          <td>$has[9]</td>
                                          <td style='text-align:center'>
                                          <a href='index.php?page=calon&id=$has[0]'>
                                          <span data-placement='top' data-toggle='tooltip' title='Edit'>
                                          <button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' >
                                          <span class='glyphicon glyphicon-pencil'></span></button><span></a>
                                          <span data-placement='top' data-toggle='tooltip' title='Delete'><button onclick='datadel($has[0],&#39;listCalon&#39;)' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-target='#myModal' ><span class='glyphicon glyphicon-trash'></span></button><span>
                                          </td>
                                      </tr>
                                      ";
                                  }
                             ?>
                          </tbody>
                      </table>
                      <br></br><br></br><br></br><br></br><br></br><br></br>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>

        </div>
      <script>
          function datadel(value,jenis){
             document.getElementById('mylink').href="hapus.php?del="+value+"&data="+jenis;
          }
      </script>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
                  </div>
                  <div class="modal-body">
                      Anda yakin ingin menghapus data ini ?
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <a id="mylink" href=""><button type="button" class="btn btn-primary">Delete Data</button></a>
                  </div>
              </div>
          </div>
      </div>
