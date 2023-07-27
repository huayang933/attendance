<?php 
    $title = 'View Record';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 

    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Please check details and try again!</h1>";
    } else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $result['firstname'] . ' ' . $result['lastname'] ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name'] ?></h6>
        <p class="card-text">
            Date of Birth: <?php echo $result['dateofbirth']; ?>
        </p>
        <p class="card-text">
            Email Address: <?php echo $result['emailaddress']; ?>
        </p>
        <p class="card-text">
            Contact Number: <?php echo $result['contactnumber']; ?>
        </p>
    </div>
</div>

<a class="btn btn-info" href="viewrecords.php">Back to List</a>
<a class="btn btn-warning" href="edit.php?id=<?php echo $result['attendee_id'] ?>">Edit</a>
<a onclick="return confirm('Are you sure want to delete this record?');" class="btn btn-danger" href="delete.php?id=<?php echo $result['attendee_id'] ?>">Delete</a>

<?php } ?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php' ?>