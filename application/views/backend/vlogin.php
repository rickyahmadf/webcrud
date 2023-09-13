<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body class="bg-dark text-light">
    <div class="container" style="text-align: center;">
<h2 class="text-info">Login untuk Mahasiswa</h2>
<div class="row">

</div>
</div>

<center>
<div class="col-md-3 " >

<?php if ($this->session->flashdata('salah')) { ?>
    <div class="alert alert-warning"  role="alert">
        Username atau Password kamu salah bebbbb!!!
    </div>
<?php } ?>

</div> 
</center>
<div class="global-container text-dark position-absolute top-50 start-50 translate-middle">
<div class="card login-form">
  <div class="card-body bg-dark">
    <div class="card-text text-info fw-bold">
<form action="<?php echo site_url('admin/Login/validasi')?>" method="post">
  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="text" class="form-control" name="email">
  </div>
  

  <div class="mb-3">
    <label  class="form-label">Kata Sandi</label>
    <input type="password" class="form-control" name="kata_sandi">
  </div>
  <button type="submit" class="btn btn-info">Submit</button>
</form>
</div>

</div>
</div>
</div>









</body>
</html>