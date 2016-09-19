<?php
session_start();
if(empty($_SESSION['kosong']))
header("location:admlogin.php");

extract($_POST);
$con=mysqli_connect('localhost','root','','db_pemira');

?>
            <?php include'meta.php'; ?>
            <?php include'header.php'; ?>
            <?php include'menu.php'; ?>
                    <!-- Main content -->
                    <section id="main-content">
                      <section class="wrapper">
                        <?php
                          if(isset($_GET['page']))
                          {
                             switch($_GET['page'])  {
                                case 'berita': include'form_b.php'; break;
                                case 'list_berita': include'list_berita.php';$order=3; break;

            					          case 'agenda': include'form_a.php'; break;
                                case 'list_agenda': include'list_agenda.php';$order=4; break;
                                //case 'calon': include'calon.php'; break;
                                case 'calon': include'listCalon.php'; $order=5; break;
                                case 'pilihcalon': include 'menupemilihan.php'; break;
                            }
                          }
                          ?>
                        </section>
                    </section>
                <!-- /.content-wrapper -->
                <?php include "footer.php" ?>
