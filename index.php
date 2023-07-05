<?php
    require_once 'pdo.php';

    $categories = getAll();

    $products = getAll2();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lesson8!</title>
</head>
<body>
<div class="container pt-4">
    <h1>List category</h1>
    <a href="./create.php" class="btn btn-success">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category): ?>
        <tr>
            <th scope="row"><?= $category['id'] ?></th>
            <td><?= $category['name'] ?></td>
            <td>
                <form id="category_<?= $category['id'] ?>" action="./delete.php" method="POST">
                    <input type="hidden" value="<?= $category['id'] ?>" name="id">
                    <a href="./edit.php?id=<?= $category['id'] ?>" class="btn btn-primary">Edit</a>
                    <button type="button" class="btn btn-danger" onclick="deleteCategory(<?= $category['id'] ?>)">Delete</button>
                    
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="container pt-4">
    <h1>List Products</h1>
    <a href="./create_product.php" class="btn btn-success">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
            <th scope="row"><?= $product['id'] ?></th>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['category_id'] ?></td>
            <td>
                <form id="product_<?= $product['id'] ?>" action="./delete.php" method="POST">
                    <input type="hidden" value="<?= $product['id'] ?>" name="id">
                    <a href="./edit_product.php?id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                    <button type="button" class="btn btn-danger" onclick="deleteProduct(<?= $product['id'] ?>)">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </div>
                    
<script>
    function deleteProduct(id) {
        if (confirm('Are you sure?')) {
            document.getElementById('product_${id}').submit();
        }
    }
</script>

<script>
    function deleteCategory(id) {
        if (confirm('Are you sure?')) {
            document.getElementById(`category_${id}`).submit();
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>