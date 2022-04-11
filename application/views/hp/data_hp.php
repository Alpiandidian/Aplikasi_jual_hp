<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title></title>

 </head>
 <body>
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- DataTales Example -->
<?php echo $this->session->flashdata('data') ?>
<?php echo $this->session->flashdata('isi') ?>
<?php echo $this->session->flashdata('file') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-black">Data Hp
        <a href="<?=base_url('hp/tambah_data')?>"class="btn btn-sm
            btn-primary  float-right">
                <i class="plus-black-symbol"></i>
                 Tambah Data 
            </a>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>nilai</th>
                        <th>harga</th>
                        <th>merek</th>
                        <th>stok</th>
                        <th>foto</th>
                        <th>aksi</th>
                        
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php foreach($Hp as $mt): ?>
                    <tr>
                        <td><?=$mt->nilai?></td>
                        <td><?="RP. ".$mt->harga?></td>
                        <td><?=$mt->merek?></td>
                        <td><?=$mt->stok?></td>
                        <td><img src="<?= base_url('foto/').$mt->foto;?>"width="80px"></td>
                       
                        <td> 
                          <a href="<?=base_url("hp/hapus_hp/".$mt->id)?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                          <a href="<?=base_url("hp/edit_hp/".$mt->id)?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->


</body>
 </html>