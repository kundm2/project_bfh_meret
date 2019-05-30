@extends('page')

@section('title', __('Add Service'))

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">{{__('Add Service')}}</h2>
    <!-- card wrapper -->
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <form action="{{ URL::to('/services/add') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}">
                    @error('url')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categories">Phone</label>
                    <select class="form-control" size="{{$categories->count()}}" style="height: 100%" name="categories[]" id="categories" multiple="multiple">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="text-right">
                    <button class="btn" type="reset">Reset</button>
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </p>
            </form>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
        </div>
    </div>

</div>

@endsection
