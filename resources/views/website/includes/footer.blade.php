<footer class="site-footer border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">{{ __('website/includes/footer.navigations') }}</h3>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('website/includes/footer.sell_online') }}</a></li>
                            <li><a href="#">{{ __('website/includes/footer.features') }}</a></li>
                            <li><a href="#">{{ __('website/includes/footer.shopping_cart') }}</a></li>
                            <li><a href="#">{{ __('website/includes/footer.store_builder') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('website/includes/footer.mobile_commerce') }}</a></li>
                            <li><a href="#">{{ __('website/includes/footer.dropshipping') }}</a></li>
                            <li><a href="#">{{ __('website/includes/footer.website_development') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('website/includes/footer.point_of_sale') }}</a></li>
                            <li><a href="#">{{ __('website/includes/footer.hardware') }}</a></li>
                            <li><a href="#">{{ __('website/includes/footer.software') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3 class="footer-heading mb-4">{{ __('website/includes/footer.promo') }}</h3>
                <a href="#" class="block-6">
                    <img src="{{asset('assets/images/hero_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
                    <h3 class="font-weight-light mb-0">{{ __('website/includes/footer.finding_promo') }}</h3>
                    <p>{{ __('website/includes/footer.promo_from') }}</p>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">{{ __('website/includes/footer.contact_info') }}</h3>
                    <ul class="list-unstyled">
                        <li class="address">{{ __('website/includes/footer.address') }}</li>
                        <li class="phone"><a href="tel://23923929210">{{ __('website/includes/footer.phone') }}</a></li>
                        <li class="email">{{ __('website/includes/footer.email') }}</li>
                    </ul>
                </div>

                <div class="block-7">
                    <form action="#" method="post">
                        <label for="email_subscribe" class="footer-heading">{{ __('website/includes/footer.subscribe') }}</label>
                        <div class="form-group">
                            <input type="text" class="form-control py-4" id="email_subscribe" placeholder="{{ __('website/includes/footer.email_placeholder') }}">
                            <input type="submit" class="btn btn-sm btn-primary" value="{{ __('website/includes/footer.send') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    {{ __('website/includes/footer.copyright') }} &copy;<script>document.write(new Date().getFullYear());</script> |
                    {{ __('website/includes/footer.made_with') }} <i class="icon-heart" aria-hidden="true"></i>
                    {{ __('website/includes/footer.by_colorlib') }}
                </p>
            </div>
        </div>
    </div>
</footer>
