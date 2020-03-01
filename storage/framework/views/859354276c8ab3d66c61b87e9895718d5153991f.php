<?php $__env->startSection('title', 'Manage Customer'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="cat__content">

    <!-- START: ecommerce/Motos-list -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="<?php echo e(url('customer/create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Customer &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Lista de Clientes</strong>
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
                        <th>Cédula/NIT</th>
                        <th>Nombre</th>
                        <th>Celular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($customer->id); ?></td>
                        <td><?php echo e($customer->ident); ?></td>
                        <td><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?></td>
                        <td><?php echo e($customer->cel); ?></td>
                        <td style="width:250px;">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong<?php echo e($customer->id); ?>">
                                <span class="icmn-eye"></span>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong<?php echo e($customer->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <?php echo Form::model($customer, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['customer.update', $customer->id]]); ?>


                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row border border-secondary">
                                                <div class="col border border-secondary">Cédula / NIT</div>
                                                <div class="col border border-secondary"><?php echo e($customer->ident); ?></div>
                                                <div class="w-100"></div>
                                                <div class="col border border-secondary">Nombre</div>
                                                <div class="col border border-secondary"><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?></div>
                                                <div class="w-100"></div>
                                                <div class="col border border-secondary">Celular</div>
                                                <div class="col border border-secondary"><?php echo e($customer->cel); ?></div>
                                                <div class="w-100"></div>
                                                <div class="col border border-secondary">Teléfono</div>
                                                <div class="col border border-secondary"><?php echo e($customer->tel); ?></div>
                                                <div class="w-100"></div>
                                                <div class="col border border-secondary">Email</div>
                                                <div class="col border border-secondary"><?php echo e($customer->email); ?></div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>

                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>
                            </div>


                            </a>
                            <a href="<?php echo e(route('customer.edit',$customer->id )); ?>" class="btn btn-primary"> Edit</a>
                            <?php echo Form::open(['method' => 'DELETE','route' => ['customer.destroy', $customer->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']); ?>

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