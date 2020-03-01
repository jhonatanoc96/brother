<?php $__env->startSection('title', 'Add Customer'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="<?php echo e(url('customer/create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Customer &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Add Customer</strong>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <div class="col-lg-12">
                    <?php echo Form::open(array('route' => 'customer.store','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation')); ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Cédula / NIT</label>
                                <input class="form-control" placeholder="CC / NIT" name="ident" type="text" value="<?php echo e(old('ident')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Nombre(s)</label>
                                <input class="form-control" placeholder="Primer Nombre" name="first_name" type="text" value="<?php echo e(old('first_name')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Apellido(s)</label>
                                <input class="form-control" placeholder="Apellidos" name="last_name" type="text" value="<?php echo e(old('last_name')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input class="form-control" placeholder="Email" name="email" type="email" value="<?php echo e(old('email')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Celular</label>
                                <input class="form-control" placeholder="Celular" name="cel" type="text" value="<?php echo e(old('cel')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Teléfono</label>
                                <input class="form-control" placeholder="Teléfono" name="tel" type="text" value="<?php echo e(old('tel')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Activo &nbsp; &nbsp; &nbsp; &nbsp;</label>
                                <input type="checkbox" name="active">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150">Enviar</button>
                        <button type="reset" class="btn btn-warning width-150">Restablecer</button>
                        <a href="<?php echo e(url('customer')); ?>" class="btn btn-default">Cancelar</a>
                    </div>
                    <?php echo Form::close(); ?>

                </div>

            </div>
        </div>
    </section>

    <?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>