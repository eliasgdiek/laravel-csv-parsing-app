@extends('layouts.app')
@section('styles')
{!! htmlScriptTagJsApi([
    'action' => 'contact',
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch'
]) !!}
@endsection

@section('content')
<section class="probootstrap-section" id="contact-page" data-section="contact">
    <br />
    <div class="container">
        <h3 class="text-black mt0 underline">Get In Touch</h3>
        <div class="row">
            @if (Session::has('success'))
                <div class="col-sm-12 col-xs-12">
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{Session::get('success')}}</p>
                    </div>
                </div>
            @endif
            <div class="col-md-8 col-xs-12">
            <form action="{{ route('contact.post') }}" method="POST" class="myform form">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback pb20" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback pb20" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" name="phone" placeholder="Your Phone" value="{{ old('phone') }}">

                    @if ($errors->has('phone'))
                    <span class="invalid-feedback pb20" role="alert">
                        {{ $errors->first('phone') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <textarea class="form-control" cols="30" name="message" rows="10" placeholder="Write a Message" required>{{ old('message') }}</textarea>

                    @if ($errors->has('message'))
                    <span class="invalid-feedback pb20" role="alert">
                        {{ $errors->first('message') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! NoCaptcha::display() !!}
    
                    @if ($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback pb20 captcha-err" role="alert">
                        {{ $errors->first('g-recaptcha-response') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary right" value="Send Message">
                </div>
            </form>
            </div>
            <div class="col-md-4 col-xs-12 col-md-push-1">
                <ul class="probootstrap-contact-details">
                    <li>
                        <span class="text-uppercase mytext-dark-blue">Email:</span>
                        <a href="mailto:{{$settings->email}}" class="to-email">{{$settings->email}}</a>
                    </li>
                    <li>
                    <span class="text-uppercase mytext-dark-blue">Phone:</span>
                    {{$settings->phone}}
                    </li>
                    <li>
                    <span class="text-uppercase mytext-dark-blue">Address:</span>
                    <pre>{{$settings->address}}</pre>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/link.js')}}"></script>
@endsection