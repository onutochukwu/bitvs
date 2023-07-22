@extends('student.master1')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">

            <br><br> <br><br>ghfgdh
            <p>
            @if ($user->status == 'success')
            <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <div class="form-control-wrap">
                    <input name="name" type="text" class="form-control form-control-lg @error('name') error @enderror" id="name" placeholder="Enter your name">
                    @error('name')
                    <span id="fv-full-name-error" class="invalid">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <div class="form-control-wrap">
                    <input name="email" type="text" class="form-control form-control-lg @error('email') error @enderror" id="email" placeholder="Enter your email address">
                    @error('email')
                    <span id="fv-full-name-error" class="invalid">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
           
            @else
            <div class="form-group">
                hhhhhhhhhhhhh
            </div>
            @endif ()
     
     
        </form>
            </p>
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>

@endsection