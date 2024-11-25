@extends('website.layouts.master')

@section('title', __('website/pages/contact.Contact'))

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">{{ __('website/pages/contact.Home') }}</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ __('website/pages/contact.Contact') }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">{{ __('website/pages/contact.Get In Touch') }}</h2>
                </div>
                <div class="col-md-7">
                    <form action="#" method="post">
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">{{ __('website/pages/contact.First Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="c_fname" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">{{ __('website/pages/contact.Last Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="c_lname" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_email" class="text-black">{{ __('website/pages/contact.Email') }} <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_subject" class="text-black">{{ __('website/pages/contact.Subject') }}</label>
                                    <input type="text" class="form-control" id="c_subject" name="c_subject">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_message" class="text-black">{{ __('website/pages/contact.Message') }}</label>
                                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="{{ __('website/pages/contact.Send Message') }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 ml-auto">
                    <div class="p-4 border mb-3">
                        <span class="d-block text-primary h6 text-uppercase">{{ __('website/pages/contact.New York') }}</span>
                        <p class="mb-0">{{ __('website/pages/contact.Address') }}</p>
                    </div>
                    <div class="p-4 border mb-3">
                        <span class="d-block text-primary h6 text-uppercase">{{ __('website/pages/contact.London') }}</span>
                        <p class="mb-0">{{ __('website/pages/contact.Address') }}</p>
                    </div>
                    <div class="p-4 border mb-3">
                        <span class="d-block text-primary h6 text-uppercase">{{ __('website/pages/contact.Canada') }}</span>
                        <p class="mb-0">{{ __('website/pages/contact.Address') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
