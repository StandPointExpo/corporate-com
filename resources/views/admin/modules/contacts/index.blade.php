@extends('admin.layouts.master')

@section('pagenav', 'Контакты компании')

@section('content')

    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            {{ Form::open(['url' => route('admin.contacts.update', $contact), 'method' => 'PUT', 'id' => 'companyForm']) }}
                <div class="form-group">
                    @component('admin.components._group', ['el' => 'name'])
                        {{ Form::label('name', 'Имя') }}
                        {{ Form::text('name', $contact->name, ['readonly', 'class' => 'form-control', 'id' => 'name']) }}
                    @endcomponent

                    @component('admin.components._group', ['el' => 'email'])
                        {{ Form::label('email', 'Почта компании') }}
                        {{ Form::text('email', $contact->email, ['class' => 'form-control', 'id' => 'email']) }}
                    @endcomponent

                    @component('admin.components._group', ['el' => 'phone'])
                        <h5>Phone numbers</h5>
                        <div id="phones-company" style="margin-bottom: 15px;">
                        @foreach($contact->phones as $key => $phone  )
                        <div class="input-group">
                            {{ Form::label("phone-$key", "Phone - " . $key + 1 ) }}
                            {{ Form::text('phones[]', $phone->phone, ['class' => 'form-control phone mb-2', 'id' => "phone-$key", 'style' => "margin-bottom: 15px;"]) }}
                            <span class="input-group-btn">
                                <button class="btn btn-default remove-phone" style="margin-top: 10px;"
                                data-phone-route="{{ route('admin.phones.destroy', $phone) }}" type="button">delete</button>
                            </span>
                        </div>
                        @endforeach
                        </div>
                        <p class="btn btn-default" id="addPhoneButton" role="button">Add phone</p>
                    @endcomponent

                    @component('admin.components._group', ['el' => 'address'])
                        {{ Form::label('address', 'Адрес компании') }}
                        {{ Form::textarea('address', $contact->address, ['class' => 'form-control', 'id' => 'address']) }}
                    @endcomponent
                </div>

            @include('admin.partials.buttons._save')
            {{ Form::close() }}
        </div>
    </div>
<script>
    let button = document.querySelector("#addPhoneButton");
    let phonesCompany = document.querySelector("#phones-company");
    let removePhones = document.querySelectorAll('.remove-phone');

    button.addEventListener("click", addNewPhoneInput)

    for( let i = 0; i < removePhones.length; i++){
        removePhones[i].addEventListener('click', removePhoneForm)
    };


    function addNewPhoneInput() {
        let inputsCount = phonesCompany.querySelectorAll('input[type="text"]');
        console.log(inputsCount);
        phonesCompany.insertAdjacentHTML('beforeend', `<div class="input-group">
        <label for="phone-${inputsCount.length + 1}">Phone - ${inputsCount.length + 1}</label>
        <input class="form-control phone mb-2" id="phone-${inputsCount.length + 1}" style="margin-bottom: 15px;" name="phones[]" type="text" value=""></div>`)
    }

    function removePhoneForm () {
        let token = document.querySelector('meta[name="csrf-token"]').content;
        let form = document.createElement('form');
        form.action = this.dataset.phoneRoute;
        form.method = 'POST';
        form.innerHTML = `<input name="_method" type="hidden" value="DELETE">
            <input name="_token" type="hidden" value="${token}">`;
        document.body.append(form);
        form.submit();
    }
</script>
@stop
