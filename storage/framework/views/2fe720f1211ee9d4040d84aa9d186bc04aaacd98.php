<?php $__env->startSection('title', 'Add Income'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

    <!-- START: ecommerce/Pages-edit -->
    <section class="card">
        <div class="card-header">
            <div class="dropdown pull-right">
                <a href="<?php echo e(url('income/create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Income &nbsp; &nbsp;</a>
            </div>
            <span class="cat__core__title">
                <strong>Add Income</strong>
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
                    <?php echo Form::open(array('route' => 'income.store','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation')); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Descripción</label>
                                <textarea class="summernote" rows="4" id="l15" name="description" placeholder="Descripción"><?php echo e(old('description')); ?></textarea>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Cliente: <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                                <select class="form-control js-example-basic-single" name="customer_id">
                                    <option value="">--- Seleccione un Cliente ---</option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($customer->id); ?>" <?php echo e((Input::old("customer_id") == $customer->id ? "selected":"")); ?>><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Valor:</label>
                                <input class="form-control" placeholder="Valor" name="amount" type="number" value="<?php echo e(old('amount')); ?>">
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
                        <a href="<?php echo e(url('income')); ?>" class="btn btn-default">Cancelar</a>
                    </div>
                    <?php echo Form::close(); ?>

                </div>

            </div>
        </div>
    </section>
    <!-- END: ecommerce/product-edit -->
    <!-- END: ecommerce/products-list -->

    <!-- START: page scripts -->
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>

    <?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>