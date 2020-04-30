@extends('admin.layouts.admin_layout')

@section('content')

<div class="table-agile-info">
  	<div class="panel panel-default">
	    <div class="panel-heading">
	     	Danh sách kiểu kích cỡ
	    </div>
	    <div class="row w3-res-tb">
	  		<div class="col-sm-3">
		        <div class="input-group">
		          	<input type="text" class="input-sm form-control" placeholder="Search">
		          	<span class="input-group-btn">
		            	<button class="btn btn-sm btn-default" type="button">Go!</button>
		          	</span>
		        </div>
	      	</div>
	    </div>
	    <?php alert($errors , session('Success')) ?>
	    <div class="table-responsive">
	      	<table class="table table-striped b-t b-light">
	        	<thead>
		          	<tr>
		            	<th>ID</th>
			            <th>Tên danh mục</th>
			            <th>Tên không dấu</th>
			            <th>Hiện thị</th>
			            <th style="width:30px;"></th>
		          	</tr>
	        	</thead>
		        <tbody>
		        	@foreach($size as $st)
			          	<tr>
				            <td>{{ $st->id }}</td>
				            <td>{{ $st->name }}</td>
				            <td>{{ $st->slug }}</td>
				            <td>
				            	@if(checkLevel(1))
				            		<span class="text-ellipsis">
					            		@if($st->status == 1)
					            			<a <?php echo checkLevel(1); ?> href="{{URL::to('admin/size/all')}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a> 
					            		@else
					            			<a <?php echo checkLevel(1); ?> href="{{URL::to('admin/size/all')}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a> 
					            		@endif
					            	</span>
				            	@else
					            	<span class="text-ellipsis">
					            		@if($st->status == 1)
					            			<a href="{{URL::to('admin/size/all/unactive/' . $st->id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a> 
					            		@else
					            			<a href="{{URL::to('admin/size/all/active/' . $st->id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a> 
					            		@endif
					            	</span>
				            	@endif
				            </td>
				            <td>
				            	@if(checkLevel(1))
				            		<a <?php echo checkLevel(1); ?> href="{{URL::to('admin/size/all')}}" class="active" ui-toggle-class="">
					              		<i class="fa fa-pencil-square-o text-success text-active">Sửa</i>
					              	</a>
				            	@else
					              	<a href="{{URL::to('admin/size/edit/' . $st->id)}}" class="active" ui-toggle-class="">
					              		<i class="fa fa-pencil-square-o text-success text-active">Sửa</i>
					              	</a>
				              	@endif

				              	@if(checkLevel(2))
				              		<a <?php echo checkLevel(2); ?> href="{{URL::to('admin/size/all/')}}" class="active" ui-toggle-class="">
					              		<i class="fa fa-times text-danger text">Xóa</i>
					              	</a>
				              	@else				              	
					              	<a onclick="return confirm('Bạn có chắc là muốn xóa không?')" href="{{URL::to('admin/size/delete/' . $st->id)}}" class="active" ui-toggle-class="">
					              		<i class="fa fa-times text-danger text">Xóa</i>
					              	</a>
				              	@endif
				            </td>
			          	</tr>
		          	@endforeach	            
		        </tbody>
	      	</table>
	    </div>

	    <footer class="panel-footer">
	      	<div class="row">
	        
		        <div class="col-sm-5 text-center">
		          	<small class="text-muted inline m-t-sm m-b-sm">Tổng: {{ $size->total() }} danh mục</small>
		        </div>
		        <div class="col-sm-7 text-right text-center-xs">                
		          	{{ $size->links() }}
	    		</div>
	      	</div>
    	</footer>
  	</div>
</div>

@endsection