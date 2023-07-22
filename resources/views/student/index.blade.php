@extends('student.master1')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">

            <br><br> <br><br>
            <p>
                <a href="{{ route('pay') }}">
                    <button class="btn btn-success btn-lg btn-block" type="submit">
                        <i class="fa fa-plus-circle fa-lg"></i> Purchase Application Form Now!
                    </button>
                </a>
            </p>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>

@endsection