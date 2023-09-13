<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">transaksi Read</h2>
        <table class="table">
	    <tr><td>Tgl Trx</td><td><?php echo $tgl_trx; ?></td></tr>
	    <tr><td>Id Warga</td><td><?php echo $id_warga; ?></td></tr>
	    <tr><td>Bukti Pembayaran</td><td><?php echo $bukti_pembayaran; ?></td></tr>
	    <tr><td>Total Bayar</td><td><?php echo $total_bayar; ?></td></tr>
	    <tr><td>Bukti Bayar</td><td><?php echo $bukti_bayar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>