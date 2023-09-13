<!-- <!doctype html>
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
    <body> -->
    <?php $this->load->view('backend/header') ?>
        <h2 style="margin-top:0px">Data Warga</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/warga/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/warga/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/warga'); ?>" class="btn btn-light">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered text-light" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nik</th>
		<th>Nama Lengkap</th>
		<th>Jenis Kelamin</th>
		<th>Action</th> 
            </tr><?php
            foreach ($warga_data as $warga)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $warga->nik ?></td>
			<td><?php echo $warga->nama_lengkap ?></td>
			<td><?php echo $warga->jenis_kelamin ?></td>
			<!-- <td><?php echo $warga->no_rumah ?></td>
			<td><?php echo $warga->email ?></td>
			<td><?php echo $warga->kata_sandi ?></td>
			<td><?php echo $warga->status ?></td>
			<td><?php echo $warga->jumlah_penghuni ?></td> -->
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('admin/warga/read/'.$warga->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('admin/warga/update/'.$warga->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('admin/warga/delete/'.$warga->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <?php $this->load->view('backend/footer') ?>
    <!-- </body>
</html> -->