@extends('admin_layout')
@section('admin_content')


<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Banner
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
            <th>Tên slider</th>
            <th>Hình ảnh</th>
            {{-- <th>Mô tả</th> --}}
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

        	@foreach($all_banner as $key => $banner)

          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $banner->banner_name }}</td>
            <td><img src="public/uploads/banner/{{ $banner->banner_image }}"heght="40px" width="200px"></td>
            {{-- <td>{{ $banner->banner_desc }}</td> --}}
            <td><span class="text-ellipsis">
            	
            	<?php

            	if($banner->banner_status==1){

            	?>
            		 <a href="{{URL::to('/unactive-banner/'.$banner->banner_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
            	<?php
            	}else{
            	?>
            		<a href="{{URL::to('/active-banner/'.$banner->banner_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
            	<?php
            	}


            	?>

            </span></td>


            <td>
             

              <a onclick="return confirm('Bạn chắc chắn muốn xóa Banner này?')" href="{{URL::to('/delete-banner/'.$banner->banner_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>



          </tr>
          

          @endforeach

        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
       
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination">
            
            <li>{!!$all_banner->links()!!}</li>
            
            
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>


@endsection