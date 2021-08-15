<?php

include('./functions.php');


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])){
    session_start();

}

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])){
    $athlete = edit();

}

if($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["id"])){
    store();
    header("location:./");
    die;
}

if($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST["name"])){
    destroy();
    header("location:./");
    die; 
}
  
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])  ){
    update();
    header("location:./");
    die;
}

//  echo "<pre>";
//  print_r($_SESSION);
//  echo "</pre>";
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<style>

@font-face {
    font-family: popins;
    src: url("fonts/Poppins-Bold.ttf");
}


body {
    background: rgba(0,0,0, .2);
    font-family: popins;

}

.hdr {
    background: rgba(46,186,200, .5);

}


.center{
    text-align: center;
}

.container {
    margin-top: 5rem;
    margin-bottom: 2rem;
    
}

</style>

<body>

<nav class="navbar navbar-dark bg-primary fixed-top">
    <div class="col-md-12 center">
        <h2 style="color:black;">
            OLYMPIC ATHLETES
        </h2>
    </div>
</nav>




<div class="container">
    <div class="row">    
        <div class="col-4">
            <form class="form" action="" method="POST">
    



            <div class="form-group row">
                <label class="col-sm-4 col-form-label" >Name</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="name" value="<?= (isset($athlete))? $athlete["name"] : "" ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label" >Surname</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="surname" value="<?= (isset($athlete))? $athlete["surname"] : "" ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label" >Sport</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="sport" value="<?= (isset($athlete))? $athlete["sport"] : "" ?>">
                </div>  
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label" >Country</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="country" value="<?= (isset($athlete))? $athlete["country"] : "" ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label" >Gender</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="gender" value="<?= (isset($athlete))? $athlete["gender"] : "" ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label" >Victories</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="victories" value="<?= (isset($athlete))? $athlete["victories"] : "" ?>">
                </div>
            </div>

         





            <?php if(!isset($athlete)){
            echo '<button class="btn btn-primary" type="submit">Add athlete</button>';
            }else{
            echo '
            <input type="hidden" name="id" value="'. $athlete["id"].' ">
            <button class="btn btn-info" type="submit">Renew data of athlete</button>';
            } ?>

    

    


            </form>
        </div>

        <div class="col-4">
        
        </div>

        <div class="col-4">
            <img src="img/bcgrd.jpg" height="250px">
        </div>

    </div>    
</div>


    <table class="table hdr">
        <tr>
        <th>Id</th> 
        <th>Name</th> 
        <th>Surname</th>
        <th>Sport</th>
        <th>Country</th>
        <th>Gender</th>
        <th>Victories</th>
        <th>edit</th> 
        <th>delete</th> 
        </tr>


        <?php $count = 0; foreach ($_SESSION["olympics"] as $athlete) {  ?>
            <tr>
                <td> <?= ++$count ?> </td>
                <td> <?= $athlete["name"]  ?> </td>
                <td> <?= $athlete["surname"]  ?> </td>
                <td> <?= $athlete["sport"]  ?> </td>
                <td> <?= $athlete["country"]  ?> </td>
                <td> <?= $athlete["gender"]  ?> </td>
                <td> <?= $athlete["victories"]  ?> </td>

                <td><a class="btn btn-warning" href="?id=<?= $athlete["id"]  ?>">edit</a></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?=$athlete["id"]?>"  >
                        <button class="btn btn-danger" type="submit">delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>






    
</body>
</html>