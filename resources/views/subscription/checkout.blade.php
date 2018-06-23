@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-10">
        
            <h1>Purchase Subscription</h1>
            <hr />
                <form action="/checkout-subscription" method="POST">
                {{ csrf_field() }}
                    <div class="form-check form-check-inline">
                        <label class="form-check-label container-w3" for="inlineRadio1">Single Channel Subscription <span class="badge badge-warning">R30.00</span>
                        <input class="form-check-input" checked="checked" type="radio" name="subscription_type" id="inlineRadio1" value="single_channel" />
                        <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label container-w3" for="inlineRadio2">Full Access Subscription <span class="badge badge-warning">R60.00</span>
                        <input class="form-check-input" type="radio" name="subscription_type" id="inlineRadio2" value="full_access" />
                        <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="form-group row" id="select_channel">
                        <label class="col-sm-2 col-form-label" for="custom_str2">Channel</label>
                        <div class="col-sm-10">
                        <select type="hidden" class="form-control" name="custom_str2">
                            <option value="13">Fast Fusion Old Parks</option>
                        </select>  
                        </div>
                    </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn btn-danger" value="Pay Now" />
                        </div>
                </form>
        </div>
    </div>
</div>

@endsection