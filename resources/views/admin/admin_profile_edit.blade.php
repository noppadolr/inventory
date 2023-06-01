@extends('admin.admin_dashboard')
@section('admin')
{{--  <script src="{{ asset('jquery.min.js') }}"> </script>  --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>

                        <form >

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control"
                                    type="text"
                                    name="name"
                                    id="example-text-input"
                                    value="{{ $EditData->name }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control"
                                    type="text"
                                    name="name"
                                    id="example-text-input"
                                    value="{{ $EditData->username }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control"
                                    type="text"
                                    name="name"
                                    id="example-text-input"
                                    value="{{ $EditData->email }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control"
                                    type="file"
                                    name="profile_image"
                                    id="image"
                                    >
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="ShowImage" class="rounded avatar-lg" src="{{ asset('backend/assets/images/small/img-5.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">

                        </form>













                    </div>
                </div>
            </div> <!-- end col -->
        </div>




    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#ShowImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
