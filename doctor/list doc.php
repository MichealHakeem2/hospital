<?php include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
$select= "SELECT * from `theem`";
$s= mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$noc = $row['color'];
if(isset($_GET['cha'])){
    $num = $_GET['cha'];
    $update= "UPDATE `theem` SET color = $num";
    $u= mysqli_query($conn , $update);
    header('location: /tryy/doctor/list doc.php');
}
$select= "SELECT doctor.id as docID, doctor.name as docName, doctor.email as docEmail, categories.name as docCategory FROM `doctor` JOIN `categories` ON doctor.category_id = categories.id";
$s= mysqli_query($conn , $select);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete= "DELETE from `categories` where `id` = $id";
  $d= mysqli_query($conn , $delete);

}
if (isset($_GET['edit'])) {
  $update = true;
  $id = $_GET['edit'];
  $select = "SELECT * from `categories` where id = $id";
  $ss = mysqli_query($conn,$select);
  $row = mysqli_fetch_assoc($ss);
  $name = $row['name'];
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $update= "UPDATE `categories` SET `name` = $name where `id` = $id";
  $u= mysqli_query($conn , $update);

}
}
?>
<?php if($noc == '1') :?>
<a href="/tryy/doctor/list doc.php?cha=<?php echo $data['color']?>" type="submit" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/tryy/doctor/list doc.php?cha=<?php echo $data['color']?>" type="submit" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
        <h1 class="display-1 text-center text-info">Doctors List</h1>
    </div>
    <div class="container">
   <div class="card">
     <div class="card-body">
     <table class="table table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>email</th>
        <th>category_id</th>
        <th columespan="2">action</th>
      </tr>
      <?php foreach($s as $data){?>
      <tr>
        <td> <?php echo $data['docID'] ?> </td>
        <td> <?php echo $data['docName'] ?> </td>
        <td> <?php echo $data['docEmail'] ?> </td>
        <td> <?php echo $data['docCategory'] ?> </td>
        <td><a onclick="return confirm('Are You Sure ? ')" name="delete" href="/list doc.php?delete=<?php echo $data['docID']?>" class="btn btn-danger">Delete</a></td><br>
        <td><a  name="edit" href="/tryy/doctor/add doc.php?edit=<?php echo $data['docID']?>" class="btn btn-info">Edit</a></td>
      </tr>
      <?php };?>
    </table>
     </div>
   </div>
  </div>
    
    <?php include '../shared/script.php'; ?>
