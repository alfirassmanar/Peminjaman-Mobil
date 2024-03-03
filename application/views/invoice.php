<?php $this->load->view($header) ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Data Invoice</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <button id="printButton" class="btn btn-success">Print</button>
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div id="example1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                    <div id="example1">
                                        <img src="uploads/logo/my-logo.png" alt="Logo" style="width: 150px;  float: right; margin-bottom: -30px;">
                                        <p style="float: right; clear: right; margin-right: 20px;">Rental Mobil.com</p>
                                        <div class="header">
                                            <div class="text" style="background-color: white;">
                                                <h1 style="font-size: 80pt; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">INVOICE</h1>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <strong><label>Kepada :</label></strong>
                                                    <h5> <?= $this->session->userdata('nama'); ?></h5>
                                                    <h5> <?= $this->session->userdata('username'); ?></h5>
                                                </div>
                                                <div class="col">
                                                    <label>Tanggal : </label><br>
                                                    <?= strftime('%A, %e %B %Y', strtotime(date('Y-m-d'))); ?><br>
                                                    <hr />
                                                    <label>NO INVOICE : </label><br>
                                                    <?= uniqid(); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <table id="example1" class="table table-striped table-bordered">
                                            <thead style="background-color: #3498db; color: #fff;">
                                                <tr id="example1">
                                                    <th>No </th>
                                                    <!-- <th>Gambar</th> -->
                                                    <th>Petugas</th>
                                                    <th>Nama Mobil</th>
                                                    <th>Merk Mobil</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $total_harga_sewa = 0;

                                                foreach ($history as $data) :
                                                    $total_harga_sewa += $data->harga_sewa;
                                                    $pajak = 80000;
                                                    $total_bayar = $total_harga_sewa + $pajak;
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <!-- <td><img style="height:200px;" src="<?= base_url('uploads/mobil/' . $data->gambar) ?>" alt="" srcset=""></td> -->
                                                        <td><?= $data->nama ?></td>
                                                        <td><?= $data->nama_mobil ?></td>
                                                        <td><?= $data->merk_mobil ?></td>
                                                        <td><?= $data->jumlah ?></td>
                                                        <td><?= rupiah($data->harga_sewa) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="5" style="text-align: right;"><strong>SUB TOTAL : </strong></td>
                                                    <td><?= rupiah($total_harga_sewa) ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right;"><strong>PAJAK : </strong></td>
                                                    <td><?= rupiah($pajak) ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="text-align: right;"><strong>TOTAL : </strong></td>
                                                    <td><?= rupiah($total_bayar) ?></td>
                                                </tr>
                                            </tbody>
                                        </table><br>
                                        <div class="row" style="margin-left: 20px;">
                                            <div class="col">
                                                <div class="pembayaran">
                                                    <h5>PEMBAYARAN : </h5>
                                                    <label>Nama : Clartech.cloud</label><br>
                                                    <label>No Rek : 08233212</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php $this->load->view($footer) ?>

<!-- <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script> -->
<script>
    document.getElementById('printButton').addEventListener('click', function() {
        var printContents = document.getElementById('example1').outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });
</script>