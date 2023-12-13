<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <!-- pengecekan validation -->
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>

<div class="row align-items-center vh-100">
        <div class="col-10 mx-auto">
            <div class="card-deck">
                <div class="card bg-primary">
                    <a href="<?= base_url('produk/aksesoris'); ?>">
                        <div class="card-body">
                            <h5 class="card-title text-white">Aksesoris</h5>
                            <i class="fas fa-database" style="color: #ffffff;"></i>
                        </div>
                </div>
                <div class="card bg-primary">
                    <a href="<?= base_url('produk/mainan'); ?>">
                        <div class="card-body">
                            <h5 class="card-title text-white">Mainan</h5>
                            <i class="fas fa-table" style="color: #ffffff;"></i>
                        </div>
                </div>
                <div class="card bg-primary">
                    <a href="<?= base_url('produk/makanan'); ?>">
                        <div class="card-body">
                            <h5 class="card-title text-white">Makanan</h5>
                            <i class="fas fa-user-cog" style="color: #ffffff;"></i>
                        </div>
                </div>
            </div>
        </div>
</div>
<!-- End of Main Content -->
