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
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown pull-right">

                        <?php if(\Route::is('consultar')): ?>

                        <?php $__currentLoopData = $incomeSelected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong<?php echo e($temp->id); ?>">
                            Añadir individual
                        </button>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong2<?php echo e($temp->id); ?>">
                            Añadir varios
                        </button>

                        <!-- Modal para añadir un único registro-->
                        <div class="modal fade" id="exampleModalLong<?php echo e($temp->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <?php echo Form::open(array('route' => 'debt.store','method'=>'POST')); ?>


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

                        <!-- Modal para añadir varios registros-->
                        <div class="modal fade" id="exampleModalLong2<?php echo e($temp->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Descripción</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <table class="table table-hover nowrap" id="debtsTable" width="100%">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Descripción</th>
                                                <th>Valor</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $debts_temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debt_temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php echo Form::model($debt_temp, ['method' => 'PATCH', 'id'=>$debt_temp->id, 'route' => ['debt_temp.update', $debt_temp->id]]); ?>

                                                <td><input class="form-control" name="description" type="text" value="<?php echo e($debt_temp->description); ?>"></td>
                                                <td><input class="form-control" name="amount" type="number" value="<?php echo e($debt_temp->amount); ?>"></td>
                                                <td style="width:250px;">
                                                    <!-- Button trigger modal -->
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>

                                                    <?php echo Form::close(); ?>


                                                    <?php echo Form::open(['class' => 'deleteDebtTemp', 'method' => 'DELETE','action' => ['DebttempController@destroy', $debt_temp->id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']); ?>

                                                    <?php echo Form::submit('Remove', ['class' => 'submitDelete btn btn-danger',
                                                    'data-id' => $debt_temp->id ]); ?>

                                                    <?php echo Form::close(); ?>

                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                    <!-- Agregar un registro de debttemp -->
                                    <form action="<?php echo e(route('agregar_registro')); ?>" id="addDebtTemp" method="POST">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Descripción</label>
                                                        <input class="form-control" id="amountDebt" placeholder="Descripción" name="description" placeholder="Descripción" value="<?php echo e(old('description')); ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Valor:</label>
                                                        <input class="form-control" id="descriptionDebt" placeholder="Valor" name="amount" type="number" value="<?php echo e(old('amount')); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" id="submit" class="submit btn btn-primary">
                                                Save
                                            </button>

                                        </div>

                                    </form>

                                    <!-- Agregar todos los registros de debttemp a debts. -->
                                    <form action="<?php echo e(route('agregar_todos')); ?>">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <?php else: ?>
                        <!-- No hacer nada -->
                        <?php endif; ?>

                    </div>




                </div>
            </div>

            <br>

            <span class="cat__core__title">
                <?php if(\Route::is('consultar')): ?>
                <strong>Debt List - Concepto: <?php echo e($income->description); ?> - Valor: $<?php echo e(number_format($incomeSelected[0]->amount)); ?> - Fecha: <?php echo e($incomeSelected[0]->created_at); ?></strong>
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

    <!-- Ajax para ingresar registros en la tabla de debts_temp -->
    <script>
        $(document).ready(function() {
            $(".submit").click('#submit', function(e) {
                e.preventDefault();
                var description = document.getElementById('descriptionDebt').value;
                var amount = document.getElementById('amountDebt').value;

                if (description == "") {
                    alert('Description is Required');
                } else if (amount == "") {
                    alert('Amount is Required');
                } else {
                    $.ajax({
                        url: "<?php echo e(route('agregar_registro')); ?>",
                        type: 'POST',
                        data: $('#addDebtTemp').serialize(),
                        success: function(msg) {
                            // limpiar el formulario
                            $("#addDebtTemp")[0].reset();
                            // Refrescar el datatable sin actualizar la página
                            $("#debtsTable").load(location.href + " #debtsTable");

                        }
                    });
                }
            });
        });
    </script>

    <!-- Script para eliminar registros de la tabla de debts_temp -->
    <script>
        $(document).ready(function() {
            $('.submitDelete').on('click', function(e) {
                e.preventDefault();
                var dataId = $('.submitDelete').attr('data-id');

                $.ajax({
                    url: "<?php echo e(url('eliminar_registro' )); ?>" + '/' + dataId,
                    type: 'DELETE',
                    data: $('.deleteDebtTemp').serialize(),

                    success: function(msg) {
                        $("#debtsTable").load(location.href + " #debtsTable");
                    },

                    error: function(data) {
                        if (data.status === 422) {
                            alert('error');
                            toastr.error('Cannot delete the debt');
                        }
                    }
                });
            });
        });
    </script>

    <?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>