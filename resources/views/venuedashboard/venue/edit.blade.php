@extends('venuedashboard.layout')
@extends('venuedashboard.bootstrap')
@section('title', 'Edit Venue | KELA Venue Owner')
@section('content')
<div class="fluid-container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Edit Venue') }}</h2>
                </div>
                <div class="col-auto">

                    <a href="{{route('venuedashboard.venues.index')}}" class="btn btn-primary" style="color:white">
                        <span style="color:white"></span> {{ __('Back') }}
                    </a>

                </div>
            </div>
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('venuedashboard.dashboard')}}">{{
                                        __('Dashboard') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('venuedashboard.venues.index')}}">{{
                                        __('Venues') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Edit Venue') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-body">

                    <form action="{{ route('venuedashboard.venues.update',$venue->id) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
        
                        <input type="hidden" name="id" id="id" value="{{$venue->id}}">
                        <div class="form-group">
                            <label for="name">Name<span class="require"></label>
                            <input type="text" class="form-control" name="name" value="{{$venue->name}}"/>
                        </div>
        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="desc-editor" rows="5" name="description" class="form-control">{{$venue->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="my-editor" name="address" class="form-control">{{$venue->address}}</textarea>
                        </div>
        
                        <div class="form-group">
                            <label for="phonenumber">Phone Number<span class="require"></label>
                            <input type="tel" class="form-control" name="phonenumber" value="{{$venue->phonenumber}}"/>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file[]" id="customFile" accept="image/*" multiple>
                                <label class="custom-file-label" for="customFile">Choose multiple images for slider</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img_url" id="customFile" accept="image/*">
                                <label class="custom-file-label" for="customFile">Choose image for venue thumbnail</label>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-lg float-right">
                            <i class='bx bx-list-plus' ></i> Update
                            </button>
                        </div>
        
                    </form>

                </div>
            </div> <!-- / .card -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<script>
    $(customFile).ready(function () {
        bsCustomFileInput.init()
    })
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#desc-editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection