<?php $__env->startSection('title', 'Manage Moto'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="<?php echo e(url('moto/create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Entry &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Moto List</strong>
            </span>
        </div>


        <div class="card-body">
            <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh snap! </strong> <?php echo e($message); ?>

            </div>
            <?php endif; ?>
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Well done! </strong> <?php echo e($message); ?> !
            </div>
            <?php endif; ?>
            <table class="table table-hover nowrap" id="example1" width="100%">
                <thead class="thead-default">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Kilometraje</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $motos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($moto->id); ?></td>
                        <td><?php echo e($moto->title); ?></td>
                        <td><?php echo e(number_format($moto->kilometer)); ?> km</td>
                        <td><?php echo e($moto->realized_at); ?></td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong<?php echo e($moto->id); ?>">
                                <span class="icmn-eye"></span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong<?php echo e($moto->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <?php echo Form::model($moto, ['method' => 'PATCH', 'name'=>'form-validation', 'route' => ['moto.update', $moto->id]]); ?>


                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="summernote" name="description"><?php echo e($moto->description); ?></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button> </div>

                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>
                            </div>


                            </a>
                            <a href="<?php echo e(route('moto.edit',$moto->id )); ?>" class="btn btn-primary"> Edit</a>
                            <?php echo Form::open(['method' => 'DELETE','route' => ['moto.destroy', $moto->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']); ?>

                            <?php echo Form::submit('Remove', ['class' => 'btn btn-danger']); ?>

                            <?php echo Form::close(); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </section>

    <!-- JS -->
    <script src="<?php echo asset('/js/datatable.js'); ?>"></script>
    <script src="<?php echo asset('/js/textarea.js'); ?>"></script>
    <script src="<?php echo asset('/js/select.js'); ?>"></script>

    <?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>