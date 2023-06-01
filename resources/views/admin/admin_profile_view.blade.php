@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="container-fluid">


						<div class="row">
                            <div class="col-lg-6">
                                <div class="card">

                                	{{-- <img class="rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-4.jpg" data-holder-rendered="true">  --}}
                                	<br>
                                	<center>

                                    <img class="rounded-circle avatar-xl" src="{{ asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">

                                    </center>

                                    <div class="card-body">
                                        <h4 class="card-title">Name : {{$adminData->name }} </h4>
                                        <hr>
                                        <h4 class="card-title">Username : {{$adminData->username }} </h4>
                                        <hr>
                                        <h4 class="card-title">Email : {{$adminData->email }} </h4>
                                        <hr>
                                        <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>

                                    </div>
                                </div>
                            </div>
        	            </div>



	</div>
</div>



@endsection