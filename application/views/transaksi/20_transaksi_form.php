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
        <h2 style="margin-top:0px">transaksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Tgl Trx <?php echo form_error('tgl_trx') ?></label>
            <input type="text" class="form-control" name="tgl_trx" id="tgl_trx" placeholder="Tgl Trx" value="<?php echo $tgl_trx; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Warga <?php echo form_error('id_warga') ?></label>
            <input type="text" class="form-control" name="id_warga" id="id_warga" placeholder="Id Warga" value="<?php echo $id_warga; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bukti Pembayaran <?php echo form_error('bukti_pembayaran') ?></label>
            <input type="text" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" placeholder="Bukti Pembayaran" value="<?php echo $bukti_pembayaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Total Bayar <?php echo form_error('total_bayar') ?></label>
            <input type="text" class="form-control" name="total_bayar" id="total_bayar" placeholder="Total Bayar" value="<?php echo $total_bayar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Bukti Bayar <?php echo form_error('bukti_bayar') ?></label>
            <input type="text" class="form-control" name="bukti_bayar" id="bukti_bayar" placeholder="Bukti Bayar" value="<?php echo $bukti_bayar; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>