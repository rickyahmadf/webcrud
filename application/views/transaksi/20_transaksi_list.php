<?php $this->load->view('backend/header') ?>
        <h2 style="margin-top:0px">Transaksi</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/transaksi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/transaksi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/transaksi'); ?>" class="btn btn-light">Reset</a>
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
		<th>Tgl Trx</th>
		<th>Id Warga</th>
		<th>Bukti Pembayaran</th>
		<th>Total Bayar</th>
		<th>Bukti Bayar</th>
		<th>Action</th>
            </tr><?php
            foreach ($transaksi_data as $transaksi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $transaksi->tgl_trx ?></td>
			<td><?php echo $transaksi->id_warga ?></td>
			<td><?php echo $transaksi->bukti_pembayaran ?></td>
			<td><?php echo $transaksi->total_bayar ?></td>
			<td><?php echo $transaksi->bukti_bayar ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('admin/transaksi/read/'.$transaksi->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('admin/transaksi/update/'.$transaksi->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('admin/transaksi/delete/'.$transaksi->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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