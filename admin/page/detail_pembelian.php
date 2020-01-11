<h2>Detail Pembelian</h2>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <?php

                        $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
                        $detail = $ambil->fetch_assoc();
                        //var_dump($detail);
                        ?>

                        <div class="row">
                            <div class="col-6">
                                <table cellpadding="7">
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <th>:</th>
                                        <td>MSOFF00<?php echo $detail['id_pembelian']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th>:</th>
                                        <td><?php echo $detail['nama_pelanggan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td>:</td>
                                        <td><?php echo $detail['telepon_pelanggan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td><?php echo $detail['email_pelanggan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pembelian</th>
                                        <td>:</td>
                                        <td><?php echo $detail['tanggal_pembelian']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Pembelian</th>
                                        <td>:</td>
                                        <td><?php echo $detail['status_pembelian']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Pembelian</th>
                                        <td>:</td>
                                        <td>Rp. <?php echo number_format($detail['total_pembelian']); ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6">
                                <table cellpadding="7">
                                    <tr>
                                        <th colspan="3">Pengiriman</th>
                                    </tr>
                                    <tr>
                                        <td>Kota</td>
                                        <td>:</td>
                                        <td><?php echo $detail['nama_kota']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Lengkap</td>
                                        <td>:</td>
                                        <td><?php echo $detail['alamat_pengiriman']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Kirim</td>
                                        <td>:</td>
                                        <td>Rp. <?php echo number_format($detail['tarif']); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Link Pembayaran -->
                        <!-- <div class="row">
                                        <div class="col-md">
                                            <div class="alert alert-info">
                                                Silahkan Melakukan Pembayaran Sebesar Rp.  echo number_format($detail['total_pembelian']); Ke Rekening BRI
                                                <b>Rek : 5835450043</b> an SAHL. Kirim bukti pembayaran <a href="#">disini</a>
                                            </div>
                                        </div>
                                    </div> -->
                        <table class="table table-bordered table-hover table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th>Qty</th>
                                    <th>Sub-Berat</th>
                                    <th>Sub-Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                $total_pembelian = 0;
                                $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id];'");
                                while ($data = $ambil->fetch_assoc()) {
                                    // $subharga = $data['harga_produk']*$data['jumlah'];
                                    //var_dump($data);
                                ?>
                                    <tr>
                                        <td><?= $i = $i + 1; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td>Rp. <?= number_format($data['harga']); ?></td>
                                        <td><?= number_format($data['berat']); ?>gr</td>
                                        <td><?= $data['jumlah']; ?> </td>
                                        <td><?= number_format($data['subberat']); ?>gr</td>
                                        <td>Rp. <?= number_format($data['subharga']); ?></td>
                                    </tr>
                                    <?php $total_pembelian += $data['subharga']; ?>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" align="right">Biaya Kirim <?php echo $detail['kurir']; ?></td>
                                    <td>Rp. <?php echo number_format($detail['tarif']); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="right"><b>Total Pembelian</b></td>
                                    <td><b>Rp. <?= number_format($total_pembelian + $detail['tarif']); ?></b></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="row mt-5">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3 mt-3">
                                <h5>Hormat Kami</h5>
                                <img src="img/ttd.png" alt="Ms shop" width="120px" class="my-3">
                                <p>Admin MSOFF</p>
                            </div>
                        </div>

                        <a href="page/print_pembelian.php?id=<?php echo $_GET['id']; ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>