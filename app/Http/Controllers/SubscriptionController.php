<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    //

    public function checkout_subscription()
    {
        $user = Auth::user();     

        return view('subscription.checkout', ['user' => $user]);
    }

    public function post_subscription(Request $request)
    {
        $user = Auth::user();
        $unique_id = md5(uniqid(rand(), true));
        $pfOutput = "";
        $passPhrase = 'Monkeywrench1';

        $recurring_amount = '30';

        if($request->subscription_type == 'full_access')
        {
            $recurring_amount = '60';
        }

        $data = array(
            // Merchant details
            'merchant_id' => '10009086',
            'merchant_key' => '0k4ypwayi3j1m',
            'return_url' => 'https://mighty-everglades-22117.herokuapp.com/subscription/success',
            'cancel_url' => 'https://mighty-everglades-22117.herokuapp.com/subscription/cancel',
            'notify_url' => 'https://mighty-everglades-22117.herokuapp.com/subscription/notify',
            // Buyer details
            'name_first' => $user->firstname,
            'name_last'  => $user->surname,
            'email_address'=> $user->email,
            'email_confirmation' => 1,
            'confirmation_address' => $user->email,
            // Transaction details
            'payment_method' => 'cc',
            'subscription_type' => 1,
            'billing_date' => date('Y-m-d'),
            'm_payment_id' => $unique_id, //Unique payment ID to pass through to notify_url
            // Amount needs to be in ZAR
            // If multicurrency system its conversion has to be done before building this array
            'amount' => number_format( sprintf( "%.2f", $recurring_amount ), 2, '.', '' ),
            'recurring_amount' => number_format( sprintf( "%.2f", $recurring_amount ), 2, '.', '' ),
            'frequency' => 3,
            'cycles' => 0,
            'item_name' => 'Paperclip SA Subscription',
            'item_description' => 'Subscribtion type: '. $request->subscription_type,
            'custom_str1' => $user->id,
            'custom_str2' => $request->channel,
            'custom_str3' => $request->subscription_type,
        );
        // Create GET string
        foreach( $data as $key => $val )
        {
            if(!empty($val))
            {
                $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
            }
        }

        // Remove last ampersand
        $getString = substr( $pfOutput, 0, -1 );

        $data['signature'] = md5( trim( $getString ) );

        if( isset( $passPhrase ) )
        {
            $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
        }   

        return redirect()->to('https://sandbox.payfast.co.za/eng/process?'.$getString);
    }

    public function notify(Request $request)
    {
        if($request->payment_status = 'COMPLETE')
        {
            $new_subscribed_user = \App\SubscribedUser::create([
                'user_id' => $request->custom_str1,
                'pf_payment_id' => $request->pf_payment_id,
                'payment_status' => $request->payment_status,
                'item_name' => $request->item_name,
                'amount_gross' => $request->amount_gross,
                'amount_fee' => $request->amount_fee,
                'amount_net' => $request->amount_net,
                'token' => $request->token,
                'signature' => $request->signature
            ]);
        }

        return response(200);   

    }

    public function success() 
    {
        return view('subscription.success');
    }

    public function cancel() 
    {
        return view('subscription.cancel');
    }
}
