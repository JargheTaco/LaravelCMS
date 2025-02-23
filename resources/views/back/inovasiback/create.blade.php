@extends('back.layout.template')

@section('title', 'Create Inovasi - Admin')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Inovasi</h1>

    </div>

    <div class="mt-3">
        @if ($errors->any())
        <div class="my-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form action="{{ url('inovasiback') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="content">Description</label>
                <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="content">Image (Max 5MB)</label>
                <input type="file" name="img" id="img" class="form-control">

                <div class="mt-1">
                    <img src="" class="img-thumbnail img-preview" width="100px">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" hidden>---chose---</option>
                            <option value="1">Publish</option>
                            <option value="0">Private</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="publish_date">Publish Date</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control">
                    </div>
                </div>
            </div>

            <div class="float-end">
                <button type="submit" class="btn btn-success">Save</button>
            </div>


        </form>
    </div>
    @endsection

    @push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

   
    
    <script>

        $('#img').change(function() {
            previewImage(this);
        });

        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    </script>


    @endpush