@section('title', 'Manage Pages')
@include('main')
@include('components/mainmenu')
@include('components/breadcrumb')
<div class="cat__content">

<!-- START: ecommerce/Pages-list -->
<section class="card">
    <div class="card-header">
        <div class="dropdown pull-right">
           <a href="{{ url('pages/create')}}" class="btn btn-success "><i class="fa fa-plus"></i>&nbsp; &nbsp; Add Page &nbsp; &nbsp;</a>
       </div>
        <span class="cat__core__title">
            <strong>Pages List</strong>
        </span>
    </div>
	
	
	<div class="card-body">
		 @if ($message = Session::get('error'))
			<div class="alert alert-danger" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh snap! </strong> {{ $message }}
            </div>
		@endif
		 @if ($message = Session::get('success'))
			<div class="alert alert-success" role="alert" id="id">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Well done! </strong> {{ $message }} !
            </div>
		@endif
        <table class="table table-hover nowrap" id="example1" width="100%">
            <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>Page Name</th>
                <th>Page Title</th>
                <th>Meta Title</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Page Name</th>
                <th>Page Title</th>
                <th>Meta Title</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
			@foreach($pages as $page)
            <tr>
                <td>{{ $page->page_id }}</td>
                <td>{{ $page->page_name }}</td>
                <td>{{ $page->page_title }}</td>
                <td>{{ $page->meta_title }}</td>
                <td>{{ $page->created_at->format('d-M-Y') }}</td>
               <td style="width:250px;">
                    <a href="{{ route('pages.edit',$page->page_id ) }}" class="btn btn-primary" style="margin-left:40px;"> Edit</a>
                   {!! Form::open(['method' => 'DELETE','route' => ['pages.destroy', $page->page_id],'style'=>'display:inline','role'=>'form','onsubmit' => 'return confirm("Do you want to delete this ?")']) !!}
					{!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
                </td>
            </tr>
			@endforeach
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
@include('components/footer')
