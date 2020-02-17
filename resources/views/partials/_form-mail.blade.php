{{ Form::open(['url' => route('send_mail'), 'method' => 'POST']) }}
<div class="form-group">
    @component('admin.components._group', ['el' => 'name'])
        {{ Form::text('name', null, ['placeholder' => trans('ui.your_name'), 'class' => 'form-control', 'id' => 'name']) }}
    @endcomponent

    @component('admin.components._group', ['el' => 'email'])
        {{ Form::text('email', null, ['placeholder' => trans('ui.your_email'), 'class' => 'form-control', 'id' => 'email']) }}
    @endcomponent

    @component('admin.components._group', ['el' => 'subject'])
        {{ Form::text('subject', null, ['placeholder' => trans('ui.subject'), 'class' => 'form-control', 'id' => 'subject']) }}
    @endcomponent

    @component('admin.components._group', ['el' => 'message'])
        {{ Form::textarea('message', null, ['placeholder' => trans('ui.your_message'), 'class' => 'form-control', 'id' => 'message']) }}
    @endcomponent
</div>
@if(env('GOOGLE_RECAPTCHA_KEY'))
    <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
@endif
@include('partials.buttons._send')
{{ Form::close() }}
