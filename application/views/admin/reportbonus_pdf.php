<div class = "card card-custom" style="padding: 15px;">
	<div class="card-header">
        <div class="card-body">
	<div class="card-title">
			<span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
			<h3 class="card-label">Print Data Bonus PDF</h3>
	</div>
        <form method="get" action="<?php echo base_url('admin/reportbonus_pdf/index') ?>">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Filter Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
                            <span class="input-group-addon">s/d</span>
                            <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
            <?php
            if(isset($_GET['filter'])) 
                echo '<a href="'.base_url('admin/reportbonus_pdf/index').'" class="btn btn-default">RESET</a>';
            ?>
        </form>
        <hr />
        <h4 style="margin-bottom: 5px;"><b>Data Bonus</b></h4>
         <?php echo $label ?><br />
        <div style="margin-top: 5px;">
            <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
        </div>
	
            <table class="table table-bordered" id="table" style="margin-top: 13px !important" >
                <thead>
				<tr>
					<th>Nama user</th>
					<th>jumlah bonus</th>
					<th>catatan</th>
					<th>tanggal bonus</th>
				</tr>
                </thead>
                <tbody>
                    <?php
                    if(empty($export)){ // Jika data tidak ada
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        foreach($export as $data){ // Looping hasil data export
                            $tanggal_bonus = date('d-m-Y', strtotime($data->tanggal_bonus)); // Ubah format tanggal jadi dd-mm-yyyy
                             
							echo "<tr>";
                            echo "<td>".$data->nama_lengkap."</td>";
                            echo "<td>".$data->jml_bonus."</td>";
                            echo "<td>".$data->catatan."</td>";
                            echo "<td>".$tanggal_bonus."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
				</div>
				</div>
				</div>
        </div>
</div>

    <!-- Include File JS Bootstrap -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- Include library Bootstrap Datepicker -->
    <script src="<?php echo base_url('assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
    <script>
    $(document).ready(function(){
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    })
    </script>