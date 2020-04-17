<?php $__env->startSection('title', 'Manage Debt'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
                    Add Debt
                </button>
            </div>
            <span class="cat__core__title">
                <strong>Debt List Temp</strong>
            </span>

        </div>

        <div class="row">

            <div class="col-lg-4">
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <?php echo Form::open(array('route' => 'debt_temp.store','method'=>'POST')); ?>


                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Descripción</label>
                                            <input class="form-control" placeholder="Descripción" name="description" placeholder="Descripción" value="<?php echo e(old('description')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">Valor:</label>
                                            <input class="form-control" placeholder="Valor" name="amount" type="number" value="<?php echo e(old('amount')); ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button> </div>

                            <?php echo Form::close(); ?>


                        </div>
                    </div>
                </div>

            </div>
        </div>

        <br>




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
                        <th>Descripción</th>
                        <th>Valor</th>
                        <th>Activo</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $debts_temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debt_temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php echo Form::model($debt_temp, ['method' => 'PATCH', 'id'=>$debt_temp->id, 'route' => ['debt_temp.update', $debt_temp->id]]); ?>

                        <td><?php echo e($debt_temp->id); ?></td>

                        <td><input class="form-control" name="description" type="text" value="<?php echo e($debt_temp->description); ?>"></td>

                        <td><input class="form-control" name="amount" type="number" value="<?php echo e($debt_temp->amount); ?>"></td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" name="active" onclick="getElementById(<?php echo e($debt_temp->id); ?>).submit()" <?php echo e(($debt_temp->active) ? "checked" : ""); ?>>
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <td><?php echo e($debt_temp->created_at); ?></td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>

                            <?php echo Form::close(); ?>



                            <?php echo Form::open(['method' => 'DELETE','route' => ['debt_temp.destroy', $debt_temp->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']); ?>

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
    <script src="<?php echo asset('/js/select.js'); ?>"></script>

    <?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>