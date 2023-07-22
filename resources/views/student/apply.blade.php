@extends('student.master1')

@section('content')


<div class="container">
                    <div class="row">
                        <div class="col-sm">

                        </div>
                        <div class="col-sm">

                            <br><br> <br><br>
                            <form method="POST" action="{{ route('pay') }}" role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" placeholder="Enter your email address" class="form-control" required>
                                </div>
                                <input type="hidden" name="orderID" value="345">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Amount</label>
                                    <input type="text" name="amount" value="800" class="form-control" readonly> {{-- required in kobo --}}
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Currency</label>
                                    <input type="text" name="currency" value="NGN" class="form-control" readonly>
                                </div>



                                <p>
                                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Proceed to Payment">
                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                    </button>
                                </p>
                            </form>
                        </div>
                        <div class="col-sm">

                        </div>
                    </div>
                </div>
@endsection