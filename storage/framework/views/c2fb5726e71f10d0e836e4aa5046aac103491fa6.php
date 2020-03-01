<?php $__env->startSection('title', 'Manage Income'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="<?php echo e(url('income/create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Income &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Income List</strong>
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
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Activo</th>
                        <th>Creado en</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $incomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($income->id); ?></td>
                        <td><?php echo e($income->customer->first_name); ?> <?php echo e($income->customer->last_name); ?></td>
                        <td>$<?php echo e(number_format($income->amount)); ?> </td>
                        <?php echo Form::model($income, ['method' => 'PATCH', 'id'=>$income->id, 'name'=>'form-validation', 'route' => ['income.update', $income->id]]); ?>

                        <td>
                            <label class="switch">
                                <input type="checkbox" name="active" onclick="getElementById(<?php echo e($income->id); ?>).submit()" <?php echo e(($income->active) ? "checked" : ""); ?>>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <?php echo Form::close(); ?>


                        <td><?php echo e($income->created_at); ?></td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong<?php echo e($income->id); ?>">
                                <span class="icmn-eye"></span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong<?php echo e($income->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <?php echo Form::model($income, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['income.update', $income->id]]); ?>


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
                            </div>


                            </a>
                            <a href="<?php echo e(route('income.edit',$income->id )); ?>" class="btn btn-primary"> Edit</a>
                            <?php echo Form::open(['method' => 'DELETE','route' => ['income.destroy', $income->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']); ?>

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
    
    <?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>