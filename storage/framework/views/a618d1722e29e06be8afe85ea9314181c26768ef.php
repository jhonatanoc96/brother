<?php $__env->startSection('title', 'Manage Product'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<!-- START: ecommerce/product-list -->
<section class="card">
    <div class="card-header">
        <div class="dropdown pull-right">
           <a href="<?php echo e(url('product/create')); ?>" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Product &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Product List</strong>
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
                <th>Name</th>
                <th>Sku Code</th>
                <th>Product Description</th>
                <th>Meta Title</th>
                <th>Show Home</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Sku Code</th>
                <th>Product Description</th>
                <th>Meta Title</th>
                <th>Show Home</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->product_id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->sku_code); ?></td>
                <td><?php echo e(Str::words($product->disclaimer, 5,'....')); ?></td>
                <td><?php echo e($product->meta_title); ?></td>
                <td style="width:100px;"><?php echo e($product->home_show_product); ?></td>
               <td style="width:250px;">
                     <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Details
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="" role="menu">
                            <a class="dropdown-item" href="<?php echo e(asset('/productcategory/show/'.$product->product_id)); ?>"> &nbsp; <i class="fa fa-tags" aria-hidden="true"></i> &nbsp;  Category</a>
                            <a class="dropdown-item" href="<?php echo e(asset('/productimage/show/'.$product->product_id)); ?>"> &nbsp; <i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp; Image</a>
                            <a class="dropdown-item" href="<?php echo e(asset('/productprice/show/'.$product->product_id)); ?>"> &nbsp;&nbsp; <i class="fa fa-usd" aria-hidden="true"></i> &nbsp;&nbsp; Price</a>
                            <a class="dropdown-item" href="<?php echo e(asset('/productrelative/show/'.$product->product_id)); ?>"> &nbsp; <i class="fa fa-american-sign-language-interpreting"></i> &nbsp;Relative</a>
                            <a class="dropdown-item" href="<?php echo e(asset('/productassociate/show/'.$product->product_id)); ?>"> &nbsp; <i class="fa fa-assistive-listening-systems"></i> &nbsp; Associates</a>
                            <a class="dropdown-item" href="<?php echo e(asset('/productattribute/show/'.$product->product_id)); ?>"> &nbsp; <i class="fa fa-adn"></i> &nbsp; &nbsp;Attribute</a>
                            <a class="dropdown-item" href="<?php echo e(asset('/productfeatures/show/'.$product->product_id)); ?>"> &nbsp; <i class="fa fa-paste"></i> &nbsp;&nbsp;Features</a>
                            <!-- <a class="dropdown-item" href="<?php echo e(asset('/productcrosssells/show/'.$product->product_id)); ?>"> &nbsp; Cross Sells</a>
                            <a class="dropdown-item" href="<?php echo e(asset('/productupsells/show/'.$product->product_id)); ?>"> &nbsp; Up Sells</a> -->
                        </ul>
                    </div>
                    <a href="<?php echo e(route('product.edit',$product->product_id )); ?>" class="btn btn-primary"> Edit</a>
                   <?php echo Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->product_id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']); ?>

					<?php echo Form::submit('Remove', ['class' => 'btn btn-danger']); ?>

					<?php echo Form::close(); ?>

                </td>
            </tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</section>
<!-- END: ecommerce/products-list -->
<script>
    $('#id').delay(3000).fadeOut('fast');
</script>
<!-- START: page scripts -->
<script>
    $(function () {

        // Datatables
        $('#example1').DataTable({
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25,50, 100, 200, "All"]],
            responsive: true,
            "autoWidth": false
        });

    })
</script>
<!-- END: page scripts -->
<!-- END: page scripts -->
<!-- START: page scripts -->
<script>
    $( function() {
		$("#m_section_name").html("Products");
        ///////////////////////////////////////////////////////////
        // tooltips
        $("[data-toggle=tooltip]").tooltip();

        ///////////////////////////////////////////////////////////
        // chart1
        new Chartist.Line(".chart-line", {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            series: [
                [5, 0, 7, 8, 12],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: !0,
            chartPadding: {
                right: 40
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });

        ///////////////////////////////////////////////////////////
        // chart 2
        var overlappingData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                overlappingOptions = {
                    seriesBarDistance: 10,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                },
                overlappingResponsiveOptions = [
                    ["", {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0]
                            }
                        }
                    }]
                ];

        new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);

        ///////////////////////////////////////////////////////////
        // custom scroll
        if (!('ontouchstart' in document.documentElement) && jQuery().jScrollPane) {
            $('.custom-scroll').each(function() {
                $(this).jScrollPane({
                    contentWidth: '100%',
                    autoReinitialise: true,
                    autoReinitialiseDelay: 100
                });
                var api = $(this).data('jsp'),
                        throttleTimeout;
                $(window).bind('resize', function() {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(function() {
                            api.reinitialise();
                            throttleTimeout = null;
                        }, 50);
                    }
                });
            });
        }

    } );
</script>
<!-- END: page scripts -->
<?php echo $__env->make('components/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
