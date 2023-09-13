<!doctype html>
<html>
    <head>
        <title>Read</title>
        <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body class="bg-dark text-light">
        <h2 style="margin-top:0px">Mahasiswa Read</h2>
        <table class="table  text-light">
	    <tr><td>Npm</td><td><?php echo $npm; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Prodi</td><td><?php echo $prodi; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/mahasiswa') ?>" class="btn btn-light">Cancel</a></td></tr>
	</table>
        </body>
</html>