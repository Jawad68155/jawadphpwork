<?php
include("components/header.php");
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row  bg-light rounded mx-0">
                    <div class="col-lg-12">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Add Product
</button>
                    </div>
                    <div class="col-md-12">

                        <h3 class="py-3 px-3">All products</h3>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Image</th>
                                        <th scope="col" colspan="2">Actoin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->query("select * from categories");
                                    $catRows = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($catRows as $catValues){
                                        ?>
                                        
                                        
                                        <tr>
                                        <th scope="row"><?php echo $catValues['catId']?></th>
                                        <td><?php echo $catValues['catName']?></td>
                                        <td><img src="<?php echo $catImgAddress.$catValues['catImage']?>" width="80"></td>
                                        <td><a href="updatecatagory.php?cid=<?php echo $catValues['catId']?>" class="btn btn-outline-primary">Edit</a></td>
                                        <td><a href="" class="btn btn-outline-danger">Delete</a></td>
                                    </tr>
                                        <?php
                                    }
                                    ?>
                                 
                                   
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="mx-3" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">category name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="catName">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proName">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product Quantity</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proQuantity">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product Price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proPrice">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">product description</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="proDescription">
                                   
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">category image</label>
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="catName">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                               
                                <button type="submit" class="btn btn-primary" name="addCategory">Add Category</button>
                            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
include("components/footer.php");
?>