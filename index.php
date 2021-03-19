<?php 
    require_once("./component.php");
    require_once("./crud.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-Crud</title>

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome cdn -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <main>
        <div class="container py-4 bg-dark text-light rounded text-center">
           <h1><i class="fas fa-swatchbook"></i> Book Store </h1>
        </div>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="col-auto pt-3">
                    <?php inputElement("<i class=\"fas fa-id-badge\"></i>", "ID", "book_id", setID()); ?>

                    <div class="pt-2">
                    <?php inputElement("<i class=\"fas fa-book\"></i>", "Book Name", "book_name", ""); ?>
                    </div>

                    <div class="row">
                        <div class="col pt-2">
                        <?php inputElement("<i class=\"fas fa-people-carry\"></i>", "Publisher", "book_publisher", ""); ?>
                        </div>
                        <div class="col pt-2">
                        <?php inputElement("<i class=\"fas fa-dollar-sign\"></i>", "Price", "book_price", ""); ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php buttonElement("create", "btn-create", "btn btn-success", "<i class= 'fas fa-plus'></i>", "dat-toogle='tooltip' data-placement='bottom'
                        title= 'Create'" );
                        ?>
                        <?php buttonElement("read", "btn-read", "btn btn-primary", "<i class= 'fas fa-sync'></i>", "dat-toogle='tooltip' data-placement='bottom'
                        title= 'Read'" );
                        ?>
                        <?php buttonElement("update", "btn-update", "btn btn-light border", "<i class= 'fas fa-pen-alt'></i>", "dat-toogle='tooltip' data-placement='bottom'
                        title= 'Update'" );
                        ?>
                        <?php buttonElement("delete", "btn-delete", "btn btn-danger", "<i class= 'fas fa-trash-alt'></i>", "dat-toogle='tooltip' data-placement='bottom'
                        title= 'Delete'" );
                        ?>
                        <?php deleteAllBtn(); ?>
                    </div>
                    <div class="d-flex justify-content-center">
                        <table class="table table-striped table-dark">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Book Name</th>
                                    <th>Publisher</th>
                                    <th>Book Price</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    if( isset($_POST['read'])){
                                        $result = getData();

                                        if($result){
                                            while($row = mysqli_fetch_assoc($result)){ ?>
                                                <tr>
                                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                                <td data-id="<?php echo $row['id']; ?>"><?php echo '$'. $row['book_price']; ?></td>
                                                <td><i data-id="<?php echo $row['id']; ?>" class="btnedit fas fa-edit"></i></td>
                                                </tr>
                                            <?php    
                                            }
                                        }
                                    }
                                
                                ?>
                            </tbody>
                        </table>

                    </div>
                   
                </div>    
            </form>    
        </div>
    </main>




    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./main.js?2"></script>
</body>
</html>