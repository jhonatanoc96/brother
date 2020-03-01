<?php $__env->startSection('title', 'Update Income'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

    <!-- START: ecommerce/moto-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="<?php echo e(url('income/create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Income &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Edit income</strong>
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
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
                    <?php echo Form::model($income, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['income.update', $income->id]]); ?>

                    <?php $__env->startSection('title', 'Update income'); ?>
                    <?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="cat__content">

                        <!-- START: ecommerce/moto-edit -->
                        <section class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
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
                                        <?php echo Form::model($income, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['income.update', $income->id]]); ?>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Descripción</label>
                                                    <textarea class="summernote" rows="4" id="l15" name="description" placeholder="Descripción"><?php echo e($income->description); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Cliente:</label>
                                                    <select class="form-control js-example-basic-single" name="customer_id">

                                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($income->customer->id == $customer->id): ?>
                                                        <option value="<?php echo e($customer->id); ?>" selected><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?></option>
                                                        <?php else: ?>
                                                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?></option>
                                                        <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </select> </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Valor:</label>
                                                    <input class="form-control" placeholder="Valor" name="amount" type="number" value="<?php echo e($income->amount); ?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Activo &nbsp; &nbsp; &nbsp; &nbsp;</label>
                                                    <input type="checkbox" name="active" <?php echo e(($income->active) ? "checked" : ""); ?>>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary width-150">Submit</button>
                                            <button type="reset" class="btn btn-warning width-150">Reset</button>
                                            <a href="<?php echo e(url('income')); ?>" class="btn btn-default">Cancel</a>
                                        </div>
                                        <?php echo Form::close(); ?>

                                    </div>

                                </div>
                            </div>
                        </section>
                        <!-- END: ecommerce/product-edit -->
                        <!-- END: ecommerce/products-list -->

                    </div>

                </div>
            </div>
    </section>

    <!-- TEXTAREA -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>

    <?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>