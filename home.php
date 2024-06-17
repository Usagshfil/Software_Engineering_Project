<?php 
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
include 'admin/db_connect.php';
//include 'search.php'; 
//include 'list.php';
?>
<style>
    #cat-list li{
        cursor: pointer;
    }
       #cat-list li:hover {
        color: white;
        background: #007bff8f;
    }
    .prod-item p{
        margin: unset;
    }
    .bid-tag {
    position: absolute;
    right: .5em;
}
</style>
<?php 
$cid = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
?>
<div class="contain-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <ul class='list-group' id='cat-list'>
                            <li class='list-group-item' data-id= 'all' data-href="index.php?page=home">All</li>
                            <?php
                                $cat = $conn->query("SELECT * FROM categories order by name asc");
                                while($row=$cat->fetch_assoc()):
                                    $cat_arr[$row['id']] = $row['name'];
                             ?>
                            <li class='list-group-item' data-id='<?php echo $row['id'] ?>' data-href="index.php?page=home&category_id=<?php echo $row['id'] ?>"><?php echo ucwords($row['name']) ?></li>

                            <?php endwhile; ?>
                        </ul>
                    
                                <!-- doan them vao: Search  -->
                <div class="card-body">
                        <?php
                                //code here
                                
                        ?>
                        <div class="row">
                            <div class="col-md-7">
                                <form action="index.php?page=search" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Keyword...">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                                    
                    </div>
                                    <!--  echo '<div id="myDivID">';
    include 'search.php';
echo '</div>'; -->
                                    

                    </div>
                </div>
            </div>
            <div class="col-md-9">
            <?php
            if (strpos($url,'search') !== false) {
                include 'search.php';
            } else {require_once('list.php');}
             ?>
            </div>
        </div>
    </div>
</div>
       
<script>
    $('#cat-list li').click(function(){
        location.href = $(this).attr('data-href')
    })
     $('#cat-list li').each(function(){
        var id = '<?php echo $cid > 0 ? $cid : 'all' ?>';
        if(id == $(this).attr('data-id')){
            $(this).addClass('active')
        }
    })
     $('.view_prod').click(function(){
        uni_modal_right('View Product','view_prod.php?id='+$(this).attr('data-id'))
     })
</script>