<div class="row">
    <div class="col-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Data Transaksi</h2>
          </div>
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>tanggal</th>
                            <th>Total Pembelian</th>
                            <th>Status Pembelian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        $no = 0;
                        $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
                        while ($data = $ambil->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $no+=1;?></td>
                            <td><?php echo $data['nama_pelanggan']; ?></td>
                            <td><?php echo $data['tanggal_pembelian']; ?></td>
                            <td>Rp. <?php echo number_format($data['total_pembelian']); ?></td>
                            <td><?php echo $data['status_pembelian']; ?></td>
                            <td>
                              <a href="index.php?halaman=detail_pembelian&id=<?php echo $data['id_pembelian']; ?>" class="btn btn-sm btn-info"> Detail</a>

                              <!-- Tombol Admin -->
                              <?php
                              if ($data['status_pembelian'] == 'Pending') {?>
                              <a href="index.php?halaman=konfirmasi_pembelian&id=<?php echo $data['id_pembelian']; ?>" class="btn btn-sm btn-success"> Konfirmasi</a>
                              <?php }else{ ?>
                                <input type="submit" disabled class="btn btn-sm btn-secondary" value="Di Konfirmasi">
                              <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>