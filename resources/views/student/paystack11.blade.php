<form method="POST" action="{{ route('pay') }}" role="form">
                <br><br>
<input type="email" name="email" value="test@gmail.com" required> {{-- required --}}


<input type="hidden" name="orderID" value="345">
<br><br>
<input type="text" name="amount" value="800" > {{-- required in kobo --}}

<input type="hidden" name="quantity" value="1">
<br><br>
<input type="text" name="currency" value="NGN">
<br><br>
<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
{{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

<input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

<p>
    <button class="btn btn-success btn-lg btn-block" type="submit" value="Proceed to Payment">
        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
    </button>
</p>
</form>