<?php include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
include '../genral/function.php';
$select= "SELECT * from `theem`";
$s= mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);
$noc = $row['color'];
if(isset($_GET['cha'])){
    $num = $_GET['cha'];
    $update= "UPDATE `theem` SET color = $num";
    $u= mysqli_query($conn , $update);
    header('location: /tryy/doctor/add doc.php');
}
$name = '';
$email = '';
$category_id = '';
$update = false;
if ($_SERVER ['REQUEST_METHOD']  == "POST") {
if(isset($_POST['send'])){
  $name = $_POST['Name'];
  $email = $_POST['email'];
$category_id = $_POST['category_id'];
$insert = "INSERT INTO `doctor` VALUES(null,'$name','$email',$category_id)";
$i = mysqli_query($conn , $insert);
testMessage($i, "Insert doctors");
}
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete= "DELETE from `doctor` where `id` = $id";
    $d= mysqli_query($conn , $delete);

}
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `doctor` where id = $id";
    $ss = mysqli_query($conn,$select);
    $data = mysqli_fetch_assoc($ss);
    $name = $data['Name'];
    $email = $data['email'];
    $category_id = $data['category_id'];
if (isset($_POST['update'])) {
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $category_id = $_POST['category_id'];
    $update= "UPDATE `doctor` SET `name` = $name,`email` = $email, `category_id` = $category_id where `id` = $id";
    $u= mysqli_query($conn , $update);

}
}
$select= "SELECT * from `categories`";
$cat= mysqli_query($conn , $select);
?>
<?php if($noc == '1') :?>
<a href="/tryy/doctor/add doc.php?change=1" name="cha" class="btn btn-dark">Dark mood</a>
<?php else : ?>
<a href="/tryy/doctor/add doc.php?change=2" name="cha" class="btn btn-light">Light mood</a>
<?php endif ; ?>
    <div class="home">
        <h1 class="display-1 text-center text-info">Add Doctors</h1>
    </div>
    <section class="vh-100 bg-image w-800">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
	  <div class="container h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col-12 col-md-9 col-lg-7 col-xl-6">
			<div class="card" style="border-radius: 15px;">
			  <div class="card-body p-5">
				<h2 class="text-uppercase text-center mb-5">Create an account</h2>
				  <div class="form-outline mb-4">
            <form method="POST">
					<input type="text" id="form3Example1cg" name="Name"  class="form-control form-control-lg" placeholder="Your Name">
				  <div class="form-outline mb-4">
					<input type="email" id="form3Example4cg" name="email" class="form-control form-control-lg" placeholder="email">
				  </div>
				  <div class="form-outline mb-4">
                 <select name="category_id" id="form3Example4cg" class="form-control form-control-lg">
                   <?php foreach($cat as $data){ ?>
                    <option value="<?php echo $data['id']; ?>"> <?php echo $data['name']; ?> </option>
                    <?php } ?>
                 </select>
                   </div>
				  <div class="d-flex justify-content-center">
                      <?php if($update):?>
					<button type="button" name="update" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Update Data</button><br>
					<?php else :?>
                    <button type="button" name="send" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Send Data</button>
				 <?php endif; ?>
                </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
  </section>
    <?php include '../shared/script.php'; ?>
