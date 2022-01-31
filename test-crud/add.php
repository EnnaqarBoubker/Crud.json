<?php
    include './include.php/head.php';

   
?>
<body>
    <div class="container">
       <a href="./index.php" class="my-4 btn btn-primary btn-create p-2">BACk</a>
        <form method="POST">
        <div class="form-outline mb-4">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" name="id"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-check-label">Phone</label>
            <input type="text" class="form-control" name="phone"/>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4" name="save">Envoyer</button>
        </form>
    </div>

<?php 
        if(isset ($_POST['save'])) {


            $json = file_get_contents('gasbi.json');
            $json = json_decode($json, true);

            $input = array(
                'id'       => $_POST['id'],
                'fullname' => $_POST['fullname'],
                'phone'    => $_POST['phone']
            );
            

            $json[] = $input;

            
            $json = json_encode($json, JSON_PRETTY_PRINT);
		    file_put_contents('gasbi.json', $json);

            header('location: index.php');

        }
        
?>