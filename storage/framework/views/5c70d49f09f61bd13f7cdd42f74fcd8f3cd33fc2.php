
<?php $__env->startSection('title', 'Login'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="cat__pages__login">
<!-- START: pages/login -->
<div class="cat__pages__login cat__pages__login--fullscreen" style="background-image: url(dist/modules/pages/common/img/login/1.jpg)">
    <div class="cat__pages__login__block">
        <div class="row">
            <div class="col-xl-12">
                <div class="cat__pages__login__block__promo text-white text-center">
                    <h2 class="mb-">
                        <strong>BIENVENIDO - BROTHER</strong>
                    </h2>
                </div>
                <div class="cat__pages__login__block__inner">
                    <div class="cat__pages__login__block__form">
                        <h4 class="text-uppercase">
                            <strong>INICIAR SESIÓN</strong>
                        </h4>
                        <br />
						<?php if(isset(Auth::user()->email)): ?>
							<script>window.location="/dashboard"</script>
						<?php endif; ?>
						<?php if($message = Session::get('error')): ?>
							<div class="alert alert-danger alert-block">
								<button type="button" class="close" data-dismiss="alert">x</button>
								<strong><?php echo e($message); ?></strong>
							</div>	
						<?php endif; ?>		
						<?php if(count($errors)>0): ?>
							<div class="alert alert-danger">
								<ul>
									<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($error); ?></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
								</ul>
							</div>
						<?php endif; ?>	
                        <form id="form-validation" name="form-validation" method="POST" action="<?php echo e(route('login')); ?>">
						<?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="form-label">Correo Electrónico</label>
                                <input id="validation-email"
                                       class="form-control"
                                       placeholder="Correo Electrónico"
                                       name="email"
                                       type="text"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Contraseña</label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="password"
                                       type="password" data-validation="[L>=6]"
                                       data-validation-message="$ must be at least 6 characters"
                                       placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <a href="<?php echo e(url('/password/lost')); ?>" class="pull-right cat__core__link--blue cat__core__link--underlined">¿Olvidaste la contraseña?</a>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  checked>
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary mr-3" name="login" value="login">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cat__pages__login__footer text-center">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="javascript: void(0);">Terms of Use</a></li>
            <li class="active list-inline-item"><a href="javascript: void(0);">Compliance</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Confidential Information</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Contacts</a></li>
        </ul>
    </div>
</div>
<!-- END: pages/login-alpha -->

<!-- START: page scripts -->
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

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

        // Change BG
        var min = 1, max = 3,
            next = Math.floor(Math.random()*max) + min,
            final = next > max ? min : next;
        $('.random-bg-image').data('img', final);
        $('.cat__pages__login').data('img', final).css('backgroundImage', 'url(dist/modules/pages/common/img/login/' + final + '.jpg)');
    
    });
</script>
<!-- END: page scripts -->
</body>

