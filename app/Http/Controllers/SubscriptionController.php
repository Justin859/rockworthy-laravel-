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
        $unique_id = md5(uniqid(rand(), true));
        $pfOutput = "";
        $passPhrase = 'Monkeywrench1';

        $data = array(
            // Merchant details
            'merchant_id' => '10009086',
            'merchant_key' => '0k4ypwayi3j1m',
            'return_url' => 'https://mighty-everglades-22117.herokuapp.com/subscription/success',
            'cancel_url' => 'https://mighty-everglades-22117.herokuapp.com/subscription/cancel',
            'notify_url' => 'https://mighty-everglades-22117.herokuapp.com/subscription/notify',            // Buyer details
            'name_first' => $user->firstname,
            'name_last'  => $user->surname,
            'email_address'=> $user->email,
            'email_confirmation' => 1,
            'confirmation_address' => $user->email,
            // Transaction details
            'payment_method' => 'cc',
            'subscription_type' => 1,
            'billing_date' => date('Y-m-d'),
            //'m_payment_id' => $unique_id, //Unique payment ID to pass through to notify_url
            // Amount needs to be in ZAR
            // If multicurrency system its conversion has to be done before building this array
            'amount' => number_format( sprintf( "%.2f", '50' ), 2, '.', '' ),
            'recurring_amount' => number_format( sprintf( "%.2f", '50' ), 2, '.', '' ),
            'frequency' => 3,
            'cycles' => 0,
            'item_name' => 'Test Subscription',
            'item_description' => 'channel'
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

        return view('subscription.checkout', ['user' => $user, 'data' => $data, 'getString' => $getString]);
    }

    public function post_subscription(Request $request)
    {
        $user = Auth::user();
        $unique_id = md5(uniqid(rand(), true));
        $pfOutput = "";
        $passPhrase = 'Monkeywrench1';

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
            //'m_payment_id' => $unique_id, //Unique payment ID to pass through to notify_url
            // Amount needs to be in ZAR
            // If multicurrency system its conversion has to be done before building this array
            'amount' => number_format( sprintf( "%.2f", '50' ), 2, '.', '' ),
            'recurring_amount' => number_format( sprintf( "%.2f", '50' ), 2, '.', '' ),
            'frequency' => 3,
            'cycles' => 0,
            'item_name' => 'Test Subscription',
            'item_description' => 'channel'
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

        return response()->setStatusCode(200);
        
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
