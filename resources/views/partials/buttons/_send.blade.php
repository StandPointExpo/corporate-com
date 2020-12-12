<div class="form-group text-center">
    @if(config('services.GOOGLE_RECAPTCHA_KEY'))
        <button class="g-recaptcha btn btn-block mt-3"
                data-sitekey="{{config('services.GOOGLE_RECAPTCHA_KEY')}}"
                data-callback='onSubmit'
                data-action='submit'>@lang('ui.send_message')</button>
    @endif
</div>
