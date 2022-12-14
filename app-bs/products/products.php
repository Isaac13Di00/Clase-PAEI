<?php
    session_start();
    include "../app/ProductController.php";
    include "../app/BrandController.php";
    $productController = new Productos();
    $products = $productController->getProducts();
    $brand = new Brand();
    $brands = $brand->getBrands();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style type="text/css">
        aside{
            height: 90vh;
        }
    </style>
    <title>Products-Home</title>
</head>
<body class="vh-100">
    <!-- NAVBAR -->
    <?php include "../templates/navbar.template.php"?>
    <div class="container-fluid">
        <div class="row">
        <?php include "../templates/sidebar.template.php"?>        
            <div class="col-lg-10 col-sm-12">
               <div class="border-bottom">
                    <div class="row m-2">
                        <div class="col ">
                            <p class="">Products</p>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                New Product
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                                        <form method="POST" action="../app/ProductController.php" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Name product:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Product slug:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="slug">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Description:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="description">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Features::</label>
                                                <input type="text" class="form-control" id="recipient-name" name="features">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Product brand_id:</label>
                                                <select name="brand_id" class="form-control">
                                                    <?php if (isset($brands) && count($brands)):?>
                                                        <?php foreach ($brands as $bra):?>
                                                            <option value="<?=$bra->id?>">
                                                                <?= $bra->name ?>
                                                            </option>
                                                        <?php endforeach?>
                                                    <?php endif?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Cover:</label>
                                                <input type="file" class="form-control" id="recipient-name" name="cover">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" type="submit">Save changes</button>
                                            </div>
                                            <input type="hidden" id="action" name="action" value="create">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
            <?php if (isset($products)&&count($products)>0):?>
            <?php foreach($products as $product) :?>
                <div class="col-sm-3 col-md-3 mb-5">
                    <div class="card bg-light " style="width: 20rem;">
                        <img src="<?= $product->cover;?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title "><?= $product->name;?></h5>
                            <p class="card-text text-center"><?= isset($product->brand->name)?$product->brand->name:'No brand';?></p>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="btn btn-warning w-100" id="btn" onclick="edit(this)"data-bs-toggle="modal" data-product="<?=$product?>" data-bs-target="#exampleModal">Editar</a>
                                </div>

                                <div class="col">
                                    <a href="#" class="btn btn-danger w-100" onclick="remove(this)">Eliminar</a>
                                </div>
                                <a href="" class="btn btn-info mt-2">Detalles</a>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php endforeach;?>
            <?php endif;?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>   
        function remove(target){
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
                }
            })
        }
        function edit(target){
            document.getElementById("action").value = 'update';
            let product = document.getElementById("btn");
            // console.log(product);

        }
    </script>  
</body>
</html>