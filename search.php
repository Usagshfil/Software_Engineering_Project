
<div class="card">
                    <div class="card-body">
                        <div class="row">
        <?php
                                if(isset($_GET['search'])){
                                    $keyword = $_GET['search'];
                                }
                                $sql_pro = "SELECT * FROM products WHERE name like '%".$keyword."%'";
                                $query_pro = mysqli_query($conn, $sql_pro);
                                //$books = $conn->query("SELECT * from books $where order by title asc");
                                /*if($books->num_rows <= 0){
                                    echo "<center><h4><i>No Available Product.</i></h4></center>";
                                }*/
                                while($row=mysqli_fetch_array($query_pro)):
                             ?>
                             <div class="col-sm-4">
                                 <div class="card">
                                    <div class="float-right align-top bid-tag">
                                         <span class="badge badge-pill badge-primary text-white"><i class="fa fa-tag"></i> <?php echo number_format($row['price']) ?></span>
                                     </div>
                                     <div class="card-img-top d-flex justify-content-center" style="max-height: 30vh;overflow: hidden">
                                     <img class="img-fluid" src="admin/assets/uploads/<?php echo $row['image_path'] ?>" alt="Card image cap">
                                       
                                     </div>
                                      <div class="float-right align-top d-flex">
                                     </div>
                                     <div class="card-body prod-item">
                                         <p>Name: <?php echo $row['name'] ?></p>
                                         <p>Brand: <?php echo $row['brand'] ?></p>
                                         <p>
                                            <small>
                                          <?php 
                                          $cats = '';
                                          $cat = explode(',', $row['category_ids']);
                                          foreach ($cat as $key => $value) {
                                            if(!empty($cats)){
                                              $cats .=", ";
                                            }
                                            if(isset($cat_arr[$value])){
                                              $cats .= $cat_arr[$value];
                                            }
                                          }
                                          echo $cats;
                                          ?>
                                            
                                            </small>
                                          </p>
                                         <p class="truncate"><?php echo $row['description'] ?></p>
                                        <button class="btn btn-primary btn-sm view_prod" type="button" data-id="<?php echo $row['id'] ?>"> View</button>
                                     </div>
                                 </div>
                             </div>
                            <?php endwhile; ?>
                            </div>
                    </div>
                </div>