<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Ubah Jabatan</center></div>

               
                <div class="panel-body">
                    <form action="<?php echo e(route('jabatan.update',$jabatan->id)); ?>" method="POST">
                        <input name="_method" type="hidden" value="PATCH">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                        <label for="kode_jabatan" class="col-md-4 control-label">Kode Jabatan </label>
                            <input type="text" name="jabatan" class="form-control"  value="<?php echo e($jabatan->kode_jabatan); ?>">
                        </div>

                        <div class="form-group">
                            <label for="nama_jabatan" class="col-md-4 control-label">Nama Jabatan</label>
                            <input type="text" name="nama_jabatan" class="form-control" value ="<?php echo e($jabatan->nama_jabatan); ?>">
                        </div>

                        <div class="form-group">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
                            <input type="text" name="besaran_uang" class="form-control" value ="<?php echo e($jabatan->besaran_uang); ?>">
                        </div>
                        



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>





                

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>