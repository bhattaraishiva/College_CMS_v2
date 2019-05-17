@extends('Admin.adminLayout.admin_design')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Semester</li>
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
				<h1 class="page-header">Semester List</h1>
			</div>
		</div><!--/.row-->				
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Semester Table</div>
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						        <th data-field="id" >SN</th>
						         <th data-field="program_name" >Program</th>
						        <th data-field="semester_name" >Semester</th>
						        <th data-field="slug" >Slug</th>
						        <th data-field="created_at" >Created at</th>
						        <th data-field="updated_at" >Updated at</th>						        
                                <th data-field="status" >Status</th>						         
                                <th data-field="action"  colspan="2">Actions</th>
						    </tr>
						    </thead>
						    <?php $i = 1 ?>  {{-- for serial number of items --}}
						    @foreach($semesters as $semester)
							    <tr>
							    	<td >{{ $i++ }}</td>
							    	<td>{{ $semester->program->program_name}}</td>
							    	<td >{{ $semester->semester_name }}</td>
					    			<td >{{ $semester->slug }}</td>
							    	<td >{{ $semester->created_at }}</td>
                                    <td >{{ $semester->updated_at }}</td>                                    							    	
							    	@if($semester->status == 0)
							    		  <td > <a href="/semester/toogle/{{ $semester->id }}">  
							    		  	<button type="button" class = 'btn btn-danger'>inactive</button> 
							    		  </a>
							    		  </td>							    		  
							    	@else 
							    	<td ><a href="/semester/toogle/{{ $semester->id }}"> <button class = 'btn btn-success'>active</button> </td></a>  
                                    @endif
                                    
                                    <td >
                                        {{-- <a href="/menu/update_menu/{{ $menu->id }}"> --}}
                                        <a href="/semester/{{ $semester->id }}/edit">
								    		<button type="button" class = 'btn btn-primary'>Update
								    		</button>								    		
							    		</a>
							    	</td>
							    	
							    	
							    		
							    </tr>
						    @endforeach
						    
						</table>
					</div>
				</div>
			</div>			
		</div><!--/.row-->			
		
	</div><!--/.main-->

@endsection