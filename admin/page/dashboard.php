<div class="row">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-12 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
			<div class="row no-gutters align-items-center">
				<div class="col mr-2">
				<div class="text-lg font-weight-bold text-secondary text-uppercase mb-1">Selamat Datang Admin</div>
				</div>
			</div>
			</div>
		</div>
		</div>
</div>
<div class="row">

	<!-- Akun Terhubung -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
			<div class="col mr-2">
				<div class="text-sm font-weight-bold text-primary text-uppercase">Akun Pelanggan</div>
				<?php
				$akun = $koneksi->query("SELECT * FROM pelanggan");
				$jml_pelanggan = $akun->num_rows;
				?>
				<hr>
				<div class="h3 mb-0 font-weight-bold text-gray-8 text-center" >
				<?= $jml_pelanggan;?>
				<i class="fas fa-user text-gray-300"></i>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<!-- Produk Tersedia -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
			<div class="col mr-2">
				<div class="text-sm font-weight-bold text-primary text-uppercase">Produk Tersedia</div>
				<?php
				$produk = $koneksi->query("SELECT * FROM produk");
				$jml_produk = $produk->num_rows;
				?>
				<hr>
				<div class="h3 mb-0 font-weight-bold text-gray-8 text-center" >
				<?= $jml_produk;?>
				<i class="fa fa-boxes text-gray-300"></i>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<!-- Jumlah Transaksi -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
			<div class="col mr-2">
				<div class="text-sm font-weight-bold text-primary text-uppercase">Jumlah Transaksi</div>
				<?php
				$transaksi = $koneksi->query("SELECT * FROM pembelian");
				$jml_transaksi = $transaksi->num_rows;
				?>
				<hr>
				<div class="h3 mb-0 font-weight-bold text-gray-8 text-center" >
				<?= $jml_transaksi;?>
				<i class="fa fa-money-check text-gray-300"></i>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<!-- Jumlah Admin -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
		<div class="card-body">
			<div class="row no-gutters align-items-center">
			<div class="col mr-2">
				<div class="text-sm font-weight-bold text-primary text-uppercase">Admin</div>
				<?php
				$admin = $koneksi->query("SELECT * FROM admin");
				$jml_admin = $admin->num_rows;
				?>
				<hr>
				<div class="h3 mb-0 font-weight-bold text-gray-8 text-center" >
				<?= $jml_admin;?>
				<i class="fas fa-cogs text-gray-300"></i>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>