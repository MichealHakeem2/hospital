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
    header('location: /tryy/categories/list cat.php');
}
$select= "SELECT * from `doctor`";
$s= mysqli_query($conn , $select);
?>
<?php if($noc == '1') :?>
<a href="/tryy/categories/list cat.php?change=1" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/tryy/categories/list cat.php?change=2" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
        <h1 class="display-1 text-center text-info">categories List</h1>
    </div>
    <div class="container">
   <div class="card">
     <div class="card-body">
     <table class="table table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th columespan="2">action</th>
      </tr>
      <?php foreach($s as $data){?>
      <tr>
        <td> <?php echo $data['id'] ?> </td>
        <td> <?php echo $data['name'] ?> </td>
        <td><a onclick="return confirm('Are You Sure ? ')" name="delete" href="list cat.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a></td><br>
        <td><a  name="edit" href="list cat.php?edit=<?php echo $data['id']?>" class="btn btn-info">Edit</a></td>
      </tr>
      <?php };?>
    </table>
     </div>
   </div>
  </div>
    
    <?php include '../shared/script.php'; ?>