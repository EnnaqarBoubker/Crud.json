<?php
    $index = $_GET['index'];

    $json = file_get_contents('gasbi.json');
    $data = json_decode($json, true);

    $row = $data[$index];
  
    include './include.php/head.php';
?>

<body>
    <div class="container">
       <a href="./index.php" class="my-4 btn btn-primary btn-create p-2">BACk</a>
        <form method="POST">
        <div class="form-outline mb-4">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname']; ?>"/>
        </div>

        <div class="form-outline mb-4">
            <label class="form-check-label">Phone</label>
            <input type="text" class="form-control" name="phone" value = "<?php echo $row['phone']; ?>"/>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4" name="send">Save</button>
        </form>
    </div>

<?php
    if(isset($_POST['send'])) {



        $input = array (
            'id'       => $_POST['id'],
            'fullname' => $_POST['fullname'],
            'phone'    => $_POST['phone']
        );

        $data[$index] = $input;
 
        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('gasbi.json', $json);


        header('location: index.php');
    }

include './include.php/footre.php';
?>