@extends('page')

@section('title', __('ZARIT'))

@section('navbar')
@endsection

<?php
    use Carbon\Carbon;
    $dt = Carbon::now();
?>

@section('main-content')

<div class="section-body">
    <h2 class="section-title">{{__('ZARIT')}}</h2>
    <!-- card wrapper -->
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <p class="lead">Grille d’identification et d’évaluation du fardeau de l’aidant</p>
            <p>
                Cet outil permet d’évaluer la souffrance des aidant-e-s accompagnant des personnes atteintes dans leur santé.
            </p>
            <form action="{{ URL::to('/zarit/new') }}" method="post">
                @csrf

                @foreach ($questions as $question)
                    <div class="card @error('question' . $question->id) card-danger @enderror" id="question-block{{$question->id}}">
                        <div class="card-header">
                            <h4 @error('question' . $question->id) class="text-danger" @enderror>{{ $question->content }}</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body text-center">
                            {{ old('question' . $question->id) }}
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="zero{{$question->id}}" name="question{{$question->id}}" class="custom-control-input" value="zero" @if (old('question' . $question->id) == "zero") checked @endif>
                                <label class="custom-control-label" for="zero{{$question->id}}"><b>0</b></label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="half{{$question->id}}" name="question{{$question->id}}" class="custom-control-input" value="0.5" @if (old('question' . $question->id) == 0.5) checked @endif>
                                <label class="custom-control-label" for="half{{$question->id}}"><b>&frac12;</b></label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="one-id{{$question->id}}" name="question{{$question->id}}" class="custom-control-input" value="1" @if (old('question' . $question->id) == 1) checked @endif>
                                <label class="custom-control-label" for="one-id{{$question->id}}"><b>1</b></label>
                            </div>
                        </div>
                        @error('question' . $question->id)
                            <div class="card-footer text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                @endforeach
                <p class="text-right">
                    <button class="btn" type="reset">Reset</button>
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </p>
                <span class="text-left">
                    0
                </span>
            </form>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
        </div>
    </div>

</div>

@endsection
