@extends('Admin.adminLayout.admin_design')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->

		@if(Session::has('flash_msg_err'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>{{ Session('flash_msg_err') }}</strong>								
			</div>					
		@endif

		 @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Course List</h1>
			</div>
		</div><!--/.row-->				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Course Table</div>
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						        <th data-field="C_id" >SN</th>
						        <th data-field="program_name" >Program</th>
						        <th data-field="semester_name" >Semester</th>
						        <th data-field="C_code" >Course Code</th>
						        <th data-field="C_name" >Course Name</th>
						        <th data-field="slug" >Slug </th>
						        <th data-field="created_at" >Created at</th>
						        <th data-field="updated_at" >Updated at</th>

						        <th data-field="status" >Status</th>

						         <th data-field="action"  colspan="2">Actions</th>	

						    </tr>
						    </thead>
						    <?php $i = 1 ?>  {{-- for serial number of items --}}
						    @foreach($courses as $course)
							    <tr>
							    	<td >{{ $i++ }}</td>
							    	<td >{{ $course->program->program_name }}</td>
					    			<td >{{ $course->semester->semester_name }}</td>
					    			<td >{{ $course->C_code }}</td>
					    			<td >{{ $course->C_name }}</td>
					    			<td >{{ $course->slug }}</td>
							    	<td >{{ $course->created_at }}</td>
                                    <td >{{ $course->updated_at }}</td> 
                                    @if($course->status == 0)
							    		  <td > <a href="/course/toogle/{{ $course->id }}">  
							    		  	<button type="button" class = 'btn btn-danger'>inactive</button> 
							    		  </a>
							    		  </td>							    		  
							    	@else 
							    	<td ><a href="/course/toogle/{{ $course->id }}"> <button class = 'btn btn-success'>active</button> </td></a>  
                                    @endif
							    		 <td >
							    		 	 {{-- <a href="/course/update_course/{{ $course->id }}"> --}}
                                        <a href="/course/{{ $course->id }}/edit">
								    		<button type="button" class = 'btn btn-primary'>Update
								    		</button>								
							    		</a>
							    </tr>
						    @endforeach
						    
						</table>
					</div>
				</div>
			</div>			
		</div><!--/.row-->			
		
	</div><!--/.main-->

@endsection
