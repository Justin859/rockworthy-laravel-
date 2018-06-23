@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
        
            <h1>Subscribe to channel</h1>
            <h4>{{$getString}}</h4>
                <form action="/checkout-subscription" method="POST">
                @csrf
                    <input type="hidden" name="merchant_id" value="{{$data['merchant_id']}}">
                    <input type="hidden" name="merchant_key" value="{{$data['merchant_key']}}">
                    <input type="hidden" name="return_url" value="{{$data['return_url']}}">
                    <input type="hidden" name="cancel_url" value="{{$data['cancel_url']}}">
                    <input type="hidden" name="notify_url" value="{{$data['notify_url']}}">
                    <input type="hidden" name="name_first" value="{{$data['name_first']}}">
                    <input type="hidden" name="name_last" value="{{$data['name_last']}}">
                    <input type="hidden" name="email_address" value="{{$data['email_address']}}">
                    <input type="hidden" name="email_confirmation" value="{{$data['email_confirmation']}}">
                    <input type="hidden" name="confirmation_address" value="{{$data['confirmation_address']}}">
                    <input type="hidden" name="payment_method" value="{{$data['payment_method']}}">
                    <input type="hidden" name="subscription_type" value="{{$data['subscription_type']}}">
                    <input type="hidden" name="billing_date" value="{{$data['billing_date']}}">
                    <input type="hidden" name="amount" value="{{$data['amount']}}">
                    <input type="hidden" name="recurring_amount" value="{{$data['recurring_amount']}}">
                    <input type="hidden" name="frequency" value="{{$data['frequency']}}">
                    <input type="hidden" name="cycles" value="{{$data['cycles']}}">
                    <input type="hidden" name="item_name" value="{{$data['item_name']}}">
                    <input type="hidden" name="item_description" value="{{$data['item_description']}}">
                    <input type="hidden" name="signature" value="{{$data['signature']}}">
                    <input type="submit" value="Pay Now" />
                </form>
        </div>
    </div>
</div>

@endsection