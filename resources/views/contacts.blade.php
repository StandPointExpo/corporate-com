@extends('layouts.master')

@section('content')


<div class="jumbotron jumbotron-contacts jumbotron-fluid">
    <div class="container contacts-block d-flex align-items-center px-lg-4">
        <div class="content container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h1 class="display-4">@lang('ui.contacts')</h1>
                    <br>
                    @if($contact !== null)
                        @if(optional($contact->address) !== null)
                            <p> {!! $contact->address !!}</p>
                        @endif
                    @if(optional($contact->phones) !== null)
                    <div class="mb-3">@lang('contacts.telephone_fax'):
                        @foreach( $contact->phones as $key => $phone)
                        <div><a href="tel:{{$phone->phone}}" class="big-phone">{{$phone->phone}}</a></div>
                        @endforeach
                    @endif
                    </div>
                    <p>
                        @lang('contacts.e-mail'): <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                    </p>
                    @endif
                </div>
                <div class="col-lg-6 col-12 d-flex align-items-center">
                    <img src="/images/icons/logo.svg" class="logo-contacts-page">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid big-map-block">
    <div class="row">
{{--        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.4212339474397!2d30.589044181022913!3d50.45188022439202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cfeeb7684bed%3A0xd63c2daa1ff5f52c!2z0JHRgNC-0LLQsNGA0YHRjNC60LjQuSDQv9GA0L7RgdC_0LXQutGCLCAxNSwg0JrQuNGX0LIsIDAyMDAw!5e0!3m2!1suk!2sua!4v1581785114098!5m2!1suk!2sua" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>--}}

    </div>
</div>

@stop
