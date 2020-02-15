<footer class="footer mt-auto">
    <div class="container-fluid">
        <div class="row bottom-message-block">
            <div class="container">
                <h3> @lang('ui.send_us')</h3>
                <div class="row">
                    <div class="offset-sm-0 col-sm-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
                        @include('partials._form-mail')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer-text-block pt-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4 col-md-3">
                    <p class="text-with-icon">
                        <img src="/images/icons/map_point.svg" class="footer-icon map_point">
                        @lang('contacts.address') <br>@lang('contacts.address_landmark_footer')
                    </p>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-3">
                    <p class="text-with-icon"><img src="/images/icons/mail.svg" class="footer-icon mail"><a href="mailto:standpoint@iec-expo.com.ua">standpoint@iec-expo.com.ua</a></p>
                    <p class="text-with-icon"><img src="/images/icons/phone_2.svg" class="footer-icon phone_2"><a href="tel:+380442011149" class="big-phone">+38 (044)
                            201-11-49</a><br><a href="tel:+380442068704">&nbsp;206-87-04</a></p>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-3">
                    <p class="social-icons">
                        <a href="https://www.facebook.com/Standpoint-229904720516883" target="_blank"><img src="/images/icons/fb.svg"></a>
                        <a href="#" target="_blank"><img src="/images/icons/tw.svg"></a>
                        <a href="#" target="_blank"><img src="/images/icons/linkedin.svg"></a>
                    </p>
                    <p><a href="https://standpoint.com.ua">standpoint.com.ua</a></p>
                </div>
            </div>
        </div>
    </div>
<div class="privacy-footer-block" style="display: none" v-show="!$root.closePrivacyBlock">
    <p>This website uses cookies so that we can provide you with the best user experience. By continuing using our website you accept our use of cookies. Further details can be found in our <a href="{{url('/')}}/{{app()->getLocale()}}/privacy-policy">Privacy Policy</a>
    <button @click="$root.closePrivacyBlockAction()">Got it</button>
    </p>
</div>
</footer>
