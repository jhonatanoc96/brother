<?php $__env->startSection('title', 'Manage Debt'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-8">
                    <form action="<?php echo e(route('consultar')); ?>">
                        <select class="form-control js-example-basic-single" name="income" onchange="this.form.submit()">
                            <option value="">--- Seleccione un Ingreso ---</option>
                            <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($income->id); ?>"><?php echo e($income->created_at); ?> - $<?php echo e(number_format($income->amount)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <!-- <button type="submit">Consultar</button> -->
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown pull-right">
                        <a href="<?php echo e(url('debt/create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Debt &nbsp; &nbsp;</a>
                    </div>
                </div>
            </div>

            <br>

            <span class="cat__core__title">
                <?php if(\Route::is('consultar')): ?>
                <strong><?php $__currentLoopData = $incomeSelected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>Debt List - Fecha: <?php echo e($temp->created_at); ?> - Valor: $<?php echo e(number_format($temp->amount)); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></strong>
                <?php else: ?>
                <strong>Debt List</strong>
                <?php endif; ?>

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
                        <th>Descripción</th>
                        <th>Valor</th>
                        <th>Activo</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $debts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php echo Form::model($debt, ['method' => 'PATCH', 'id'=>$debt->id, 'route' => ['debt.update', $debt->id]]); ?>

                        <td><?php echo e($debt->id); ?></td>

                        <td><input class="form-control" name="description" type="text" value="<?php echo e($debt->description); ?>"></td>

                        <td><input class="form-control" name="amount" type="number" value="<?php echo e($debt->amount); ?>"></td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" name="active" onclick="getElementById(<?php echo e($debt->id); ?>).submit()" <?php echo e(($debt->active) ? "checked" : ""); ?>>
                                <span class="slider round"></span>
                            </label>
                        </td>

                        <td><?php echo e($debt->created_at); ?></td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?php echo e($debt->id); ?>">
                                <span class="icmn-eye"></span>
                            </button> -->

                            <!-- Modal -->
                            <!-- <div class="modal fade" id="exampleModalLong<?php echo e($debt->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <?php echo Form::model($debt, ['method' => 'PATCH', 'route' => ['debt.update', $debt->id]]); ?>


                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button> </div>

                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>
                            </div> -->

                            <?php echo Form::close(); ?>



                            <?php echo Form::open(['method' => 'DELETE','route' => ['debt.destroy', $debt->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']); ?>

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