<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Payment;
use Auth; // Student Model
use Illuminate\Http\Request; // Payment Model
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {

        //dd('kjkk');
        try {

            /**
             *  In the case where you need to pass the data from your
             *  controller instead of a form
             *  Make sure to send:
             *  required: email, amount, reference, orderID(probably)
             *  optionally: currency, description, metadata
             *  e.g:
             *
             */
            $data = array(
                "amount" => 4000 * 100,
                "callback_url" => url('payment/callback'),
                "reference" => rand(000000000, 9999999999),
                "email" => 'user@mail.com',
                "currency" => "NGN",
                "metadata" => [
                'user_id' => \Auth::id(),
                ],
            );

            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

        $paymentDetails = Paystack::getPaymentData(); //this comes with all the data needed to process the transaction

        //dd($paymentDetails, $paymentDetails['data']['metadata']['user_id']);
        //dd($paymentDetails['data']['status']);


        if ($paymentDetails['status'] === true) {

            $user_id = $paymentDetails['data']['metadata']['user_id'];
            $amount = $paymentDetails['data']['amount'];
            $reference = $paymentDetails['data']['reference'];
            $status = $paymentDetails['data']['status'];

            $user = User::find($user_id);
            $user->amount = $amount;
            $user->reference = $reference;
            $user->status = $status;
            $user->save();
        }
        return redirect('form');
    }

    public function form()
    {
        $user = Auth::user();
        //$paymentDetails = Paystack::getPaymentData(); //this comes with all the data needed to process the transaction

        //dd($paymentDetails, $paymentDetails['data']['metadata']['user_id']);

        //if ($paymentDetails['status'] === true) {

            //$user_id = $paymentDetails['data']['metadata']['user_id'];
            //$amount = $paymentDetails['data']['amount'];
            //$reference = $paymentDetails['data']['reference'];

            //$user = User::find($user_id);
            //$user->amount = $amount;
            //$user->reference = $reference;
            //$user->save();
            return view('student.applicationform', compact('user'));
        }
     
    

    public function apply()
    {
        $user = Auth::user();
        //$paymentDetails = User::getPaymentData(); //this comes with all the data needed to process the transaction

        //dd($paymentDetails, $paymentDetails['data']['metadata']['user_id']);

        //if ($user['status'] === true)
        //{

        //$user->save();

        // }
        return view('student.applicationform', compact('user'));
    }
}
