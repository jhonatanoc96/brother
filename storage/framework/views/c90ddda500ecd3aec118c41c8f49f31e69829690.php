<?php $__env->startSection('title', 'Add Entry'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<!-- START: ecommerce/Pages-edit -->
<section class="card">
   <div class="card-header">
        <div class="dropdown pull-right">
           <a href="<?php echo e(url('moto/create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Entry &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Add Entry</strong>
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
			 <?php echo Form::open(array('route' => 'moto.store','method'=>'POST', 'id'=>'form-validation', 'name'=>'form-validation')); ?>

				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-pagename">Título <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-pagename" class="form-control"  placeholder="Título"   name="title"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Título no puede estar vacío!">
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label class="form-control-label">Descripción</label>
                    <textarea class="summernote" rows="4" id="l15" name="description" placeholder="Descripción"></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-metatitle">Kilometraje <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-metatitle" class="form-control"  placeholder="Kilometraje"   name="kilometer"  type="number" data-validation="[NOTEMPTY]" data-validation-message="Descripción no puede estar vacío!">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-metatitle" style="margin-top:9px;">Creado en</label>
                            <input class="form-control"  placeholder="Creado en"   name="realized_at"  type="date" >
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Activo &nbsp; &nbsp; &nbsp; &nbsp;</label>
                            <input type="checkbox" name="active" checked value="1" >
                        </div>
                     </div>   
               </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150" >Enviar</button>
                    <button type="reset" class="btn btn-warning width-150" >Restablecer</button>
                    <a href="<?php echo e(url('moto')); ?>"  class="btn btn-default">Cancelar</a>
                </div>
			<?php echo Form::close(); ?>

            </div>
 
        </div>
    </div>
</section>

<!-- START: page scripts -->
<script src="<?php echo asset('/js/textarea.js'); ?>"></script>

<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

       
    });
</script>
<!-- END: page scripts -->
<?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
