<?php
    include './include.php/head.php';

    
?>
<body>
    <div class="container">
    <a href="./add.php" class="my-5 btn  btn-sm btn-primary btn-create p-2">ADD</a>
        <table class="table table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Full Name</th>
            <th>Phone</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            
            $json = file_get_contents ('gasbi.json');
            $data = json_decode($json, true); //true pour convert a partir d'objet au tab associatif
            
            foreach ($data as $key => $val) :    ?>

            <tr>
                <td><?php echo $val['id']; ?></td>
                <td><?php echo $val['fullname']; ?></td>
                <td><?php echo $val['phone']; ?></td>
                <td>
                <a href="edit.php?index=<?php echo $key; ?>" class="btn btn-primary">Edit</a>
                <a href="delet.php?index=<?php echo $key; ?>" class="btn btn-primary">Delete</a>
                </td>
            </tr>
            
            <?php endforeach; ?>
  
        </tbody>
        </table>
    </div>
<?php
    include './include.php/footre.php';
?>