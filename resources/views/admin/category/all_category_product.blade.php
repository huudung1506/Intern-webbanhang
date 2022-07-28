@extends('admin_layout')
@section('admin_content')


<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                      
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Search</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">


    	<?php

		$message = Session::get('message');
		if($message){
			echo '<span class="text-alert">'.$message.'</span>';
			Session::put('message',null);
		}

		?>


      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên danh mục</th>
           {{--  <th>Slug</th> --}}
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

        	@foreach($all_category_product as $key => $cate_pro)

          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>
            	{{ $cate_pro->category_name }}
            </td>

           {{--  <td>{{ $cate_pro->slug_category_product }}</td> --}}
            
            <td><span class="text-ellipsis">
            	
            	<?php

            	if($cate_pro->category_status==1){

            	?>
            		 <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
            	<?php
            	}else{
            	?>
            		<a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
            	<?php
            	}


            	?>

            </span></td>


            <td>
              <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>

              <a onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>



          </tr>
          

          @endforeach

        </tbody>
      </table>


      <form action="{{URL::to('/import-category')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="file" name="file_category" accept=".xlsx" required=""><br>
          <input type="submit" value="Import" name="import_csv" class="btn btn-warning">
      </form>
      <form action="{{URL::to('/export-category')}}" method="POST">
          {{ csrf_field() }}
          <input type="submit" value="Export" name="export_csv" class="btn btn-success">
      </form>


    </div>
    <footer class="panel-footer">
      <div class="row">
        
        
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination">
            
            <li>{!!$all_category_product->links()!!}</li>
            
            
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>


@endsection