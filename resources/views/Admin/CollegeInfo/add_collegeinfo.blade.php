@extends('Admin.adminLayout.admin_design')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Add College</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">College Info</h1>
			</div>
		</div><!--/.row-->

		@if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row col-lg-12">
			<div class="col-lg-6">
				<div class="panel panel-default">
				<div class="panel-heading">Add College</div>
					<div class="panel-body">
					<div class="col-md-12">

					<form action="{{route('collegeinfo.store')}}" method="post">
							{{ csrf_field() }}				
							<div class="form-group">
								<label>College name</label>
								<input class="form-control" name="college_name" placeholder="Title">
							</div>

							<div class="form-group">
								<label>Logo</label>
								<input class="form-control" name="logo" placeholder="Logo">
							</div>	

							<div class="form-group">
								<label>Email</label>
								<input class="form-control" name="email" placeholder="Email">
							</div>	

							<div class="form-group">
								<label>Contact_no</label>
								<input class="form-control" name="contact_no" placeholder="Contact no">
							</div>	

							<div class="form-group">
								<label>Address</label>
								<input class="form-control" name="address" placeholder="Address">
							</div>	

							<div class="form-group">
								<label>Status</label>
								<div class="radio">
									<label>
										<input type="radio" name="status" id="optionsRadios1" value="1" checked>Active
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="status" id="optionsRadios2" value="0">Inactive
									</label>
								</div>									
							</div>

							<div class="form-group">
								<label>Facebook link</label>
								<input class="form-control" name="facebook_link" placeholder="Facebook">
							</div>	

							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection