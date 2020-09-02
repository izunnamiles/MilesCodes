@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <h3>Add New Post</h3>
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label">Image Caption</label>

                        <input id="caption" type="text" class="form-control {{$errors-> has('caption') ?'is-invalid':''}}"
                               name="caption" value="{{ old('caption') }}" required
                               autocomplete="caption" autofocus>

                        @if($errors->has('caption'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors-> first('caption') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @if($errors->has('image'))
                            <strong>{{ $errors-> first('image') }}</strong>
                        @endif
                    </div>
                    <div class="row pt-4">
                        <button class="btn btn-sm btn-primary">Post</button>
                    </div>
                </div>
            </div>
        </form>


    </div>
@endsection