<?php $__env->startSection('title', 'Update Pages'); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('components/breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="cat__content">

<!-- START: ecommerce/Pages-edit -->
<section class="card">
    <div class="card-header">
        <div class="dropdown pull-right">
           <a href="<?php echo e(url('pages/create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Page &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Edit Pages</strong>
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
			 <?php echo Form::model($pages, ['method' => 'PATCH', 'id'=>'form-validation', 'name'=>'form-validation', 'route' => ['pages.update', $pages->page_id]]); ?>

				<div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-pagename">Page Name <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                           <input id="validation-pagename" class="form-control"  placeholder="Page Name"   name="page_name" value="<?php echo e($pages->page_name); ?>"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Page Name must not be empty!">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pagetitle">Page Title <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                             <input id="validation-pagetitle" class="form-control"  placeholder="Page Title" value="<?php echo e($pages->page_title); ?>"   name="page_title"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Page Title must not be empty!">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Page Detail</label>
                        <textarea class="summernote" rows="4" id="l15" name="page_detail" placeholder="Page Detail"><?php echo e($pages->page_detail); ?></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-metatitle">Meta Title <span style="color:red; font-weight:900; font-size:20px;">*</span></label>
                            <input id="validation-metatitle" class="form-control"  placeholder="Meta Title"  value="<?php echo e($pages->meta_title); ?>"   name="meta_title"  type="text" data-validation="[NOTEMPTY]" data-validation-message="Meta Title must not be empty!">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="validation-metatitle" style="margin-top:9px;">Meta Keyword</label>
                            <input class="form-control"  placeholder="Meta Keyword"   name="meta_keyword" value="<?php echo e($pages->meta_keyword); ?>"  type="text" >
                        </div>
                    </div>
                </div>
				 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="metadescription">Meta Description</label>
                            <textarea  rows="4" class="form-control"  placeholder="Meta Description" name="meta_description"  type="text" ><?php echo e($pages->meta_description); ?></textarea>
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Is active &nbsp; &nbsp; &nbsp; &nbsp;</label>
                            <input type="checkbox" name="is_active" checked value="1" >
                        </div>
                     </div>   
               </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary width-150">Submit</button>
                    <button type="reset" class="btn btn-warning width-150" >Reset</button>
                    <a href="<?php echo e(url('pages')); ?>"  class="btn btn-default">Cancel</a>
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
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
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
		$("#m_section_name").html("Pages");
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
