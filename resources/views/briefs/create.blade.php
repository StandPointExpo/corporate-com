@extends('layouts.master')

@push('scripts')
    <script type="text/x-template" id="input-text-template">
    <div class="form-group custom-form-group" :class="[required ? 'required': null]">
        <label :for="inputId">@{{ label }}</label>
        <input type="text" class="form-control" :class="[errors[name] ? 'is-invalid' : null ]" :id="inputId" :aria-describedby="`${inputId}Help`" :value="value"
               :name="name"
               @input="handleInput">
        <div v-if="errors[name]" class="invalid-feedback">
            @{{ errors[name] }}
        </div>
        <small :id="`${inputId}Help`" class="form-text text-muted">@{{ help }}</small>
    </div>
</script>

    <script type="text/x-template" id="input-email-template">
    <div class="form-group custom-form-group">
        <label :for="inputId">@{{ label }}</label>
        <input type="email" class="form-control"  :class="[errors[name] ? 'is-invalid' : null ]" :id="inputId" :aria-describedby="`${inputId}Help`" :value="value"
               :name="name"
               @input="handleInput">
        <div v-if="errors[name]" class="invalid-feedback">
            @{{ errors[name] }}
        </div>
        <small :id="`${inputId}Help`" class="form-text text-muted">@{{ help }}</small>
    </div>
</script>

    <script type="text/x-template" id="textarea-template">
    <div class="form-group custom-form-group">
        <label :for="id">@{{ label }}</label>
        <textarea class="form-control" :id="id" :aria-describedby="`${id}Help`" :value="value"
                  :name="name"
                  :class="[errors[name] ? 'is-invalid' : null ]"
                  @input="handleInput" rows="3"></textarea>
        <div v-if="errors[name]" class="invalid-feedback">
            @{{ errors[name] }}
        </div>
    </div>
</script>

    <script type="text/x-template" id="brief-create-template">
        <div class="brief-page__create-component container py-4">
        <div class="brief-page__header row">
            <div class="col-12 col-md-8">
                <img class="logo" src="/images/icons/logo.svg">
            </div>
            <div class="col-12 col-md-4 d-flex align-items-center">
                <div class="brief-page__header-contacts">
                    <p v-for="(phone, index) in phones" :key="index" class="pb-0 mb-0"><a :href="`tel:${phone.phone}`">@{{ phone.phone }}</a>
                    </p>
                    <a :href="`mailto:${contacts.email}`">@{{ contacts.email }}</a>
                </div>
            </div>
        </div>
        <h3 class="brief-page__create-component-title">Request for stand design & production</h3>
        <div class="row">
            <form name="briefFrom" action="{{ route('briefs.store') }}" enctype="application/x-www-form-urlencoded" method="post" class="table-responsive col-12 px-0">
            <input type="hidden" name="id" value="null" />
            <input type="hidden" name="uuid" value="{{ Str::uuid() }}" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h6>About the company:</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="scope-row">
                                1
                            </th>
                            <td>
                                <InputText :value="form.company.name" name="company_name" :errors="errors" :required="true" label="Company name:"/>
                                <InputText :value="form.company.person" name="company_person" :errors="errors" :required="true" label="Contact Person:"/>
                                <InputText :value="form.company.number" name="company_number" :errors="errors" :required="true" label="Contact No:"/>
                                <InputEmail :value="form.company.email" name="company_email" :errors="errors" label="Email:"></InputEmail>
                                <InputText :value="form.company.web" name="company_web" :errors="errors" label="Web Site:"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h6>Event:</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="scope-row">
                                2
                            </th>
                            <td>
                                <InputText :value="form.event.name" name="event.name" :errors="errors" label="Exhibition name:"></InputText>
                                <InputText :value="form.event.location" name="event_location" :errors="errors" label="Exhibition location:"></InputText>
                                <InputText :value="form.event.date" name="event_date" :errors="errors" label="Exhibition dates:"></InputText>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h6>Stand area:</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="scope-row">
                                3
                            </th>
                            <td>
                                <InputText :value="form.stand_area.size"
                                    name="stand_area_size"
                                    :errors="errors" label="Stand Size  (length and depth):">
                                </InputText>
                                <InputText :value="form.stand_area.hall_no"
                                    name="stand_area_hall_no"
                                    :errors="errors" label="Hall No."></InputText>
                                <InputText :value="form.stand_area.stand_no"
                                name="stand_area_stand_no" :errors="errors" label="Stand No."></InputText>
                                <InputText :value="form.stand_area.attach_plan"
                                    name="stand_area_attach_plan"
                                    :errors="errors"
                                    label="Attach hall plan with stand location"></InputText>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h6>Indicate positions for your stand design:</h6>
                                <small>(yes/no/quantity)</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="scope-row">
                                4
                            </th>
                            <td>
                                <InputText :value="form.positions_of_design.info_counter"
                                    name="positions_of_design_info_counter"
                                    :errors="errors" label="- info counter" />
                                <InputText :value="form.positions_of_design.meeting_rooms"
                                    :errors="errors"
                                    name="positions_of_design_meeting_rooms"
                                    label="- meeting rooms (closed/half-closed)" />
                                <InputText :value="form.positions_of_design.meeting_places"
                                    :errors="errors"
                                    name="positions_of_design_meeting_places"
                                    label="- meeting places (open)" />
                                <InputText :value="form.positions_of_design.storage_room"
                                    :errors="errors"
                                    name="positions_of_design_storage_room"
                                    label="- storage room (shelf, refrigerator, coffee maker, etc.)"></InputText>
                                <InputText :value="form.positions_of_design.podium"
                                    name="positions_of_design_podium"
                                    :errors="errors"
                                    label="- podium for equipment  (LxWxH)"></InputText>
                                <InputText :value="form.positions_of_design.showcase" name="positions_of_design_showcase" :errors="errors" label="- showcase">
                                </InputText>
                                <InputText :value="form.positions_of_design.screen" name="positions_of_design_screen" :errors="errors" label="- LED Screen / TV">
                                </InputText>
                                <InputText :value="form.positions_of_design.floor"
                                    :errors="errors"
                                    name="positions_of_design_floor"
                                    label="- floor:  (carpet/ laminate/ raised-floor h = mm)"></InputText>
                                <InputText :value="form.positions_of_design.suspension_structure"
                                    :errors="errors"
                                    name="positions_of_design_suspension_structure"
                                    label="- suspension structure"></InputText>
                                <InputText :value="form.positions_of_design.plants" name="positions_of_design_plants" :errors="errors" label="- plants"></InputText>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h6>Elements of design (indicate/attach):</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="scope-row">
                                5
                            </th>
                            <td>
                                <InputText :value="form.elements_of_design.company_logo"
                                    :errors="errors"
                                    name="elements_of_design_company_logo"
                                    label="- company’s logo in ai, cdr, eps formats"></InputText>
                                <InputText :value="form.elements_of_design.corporate_colors"
                                    name="elements_of_design_corporate_colors"
                                    :errors="errors"
                                    label="- corporate colors/ pantone / ral or ORACAL"></InputText>
                                <InputText :value="form.elements_of_design.brand_book" name="elements_of_design_brand_book" :errors="errors" label="- brand book">
                                </InputText>
                                <InputText :value="form.elements_of_design.graphic_files" :errors="errors"
                                    name="elements_of_design_graphic_files"
                                    label="- graphic files: existing posters & branding or Product Photos"></InputText>
                                <InputText :value="form.elements_of_design.colors_preferred"
                                    name="elements_of_design_colors_preferred"
                                    :errors="errors"
                                    label="- colors preferred"></InputText>
                                <InputText :value="form.elements_of_design.stand_style" :errors="errors"
                                    name="elements_of_design_stand_style"
                                    label="- stand style (minimalistic, curvy, semi curve, european, thematic, heavy, light, open…etc..)">
                                </InputText>
                                <InputText :value="form.elements_of_design.previous_experience_design" :errors="errors"
                                    name="elements_of_design_previous_experience_design"
                                    label="- anything from your previous experience that you prefer to repeat in the Design:">
                                </InputText>

                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h6>Your product list (name, quantity & LxWxH)</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="scope-row">
                                6
                            </th>
                            <td>
                                <InputText :value="form.product_list" name="product_list" :errors="errors"></InputText>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h6>Estimated stand budget (Fixed/Lower limit to upper limit)</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="scope-row">
                                7
                            </th>
                            <td>
                                <InputText :value="form.stand_budget" name="stand_budget" :errors="errors"></InputText>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h6>Additional conditions or wishes:</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="scope-row">
                                8
                            </th>
                            <td>
                                <InputTextarea :value="form.additional_conditions" name="additional_conditions" :errors="errors"></InputTextarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-outline-corporate btn-corporate" value="Send">
            </form>
        </div>
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 1050; right: 0; top: 0;">
        <div id="toastError" class="toast hide toast-error" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000">
            <div class="toast-header">
                <strong class="mr-auto">Error</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
            @{{messageError}}
            </div>
        </div>
        </div>
    </div>
</script>

    <script>
        const Vue = window.Vue;

        const InputText = {
            name: "InputText",
            inheritAttrs: false,
            template: "#input-text-template",
            model: {
                prop: 'input',
                event: 'input',
            },
            props: {
                value: {
                    type: String,
                    default: ''
                },
                label: {
                    type: String,
                    default: ''
                },
                name: {
                    type: String,
                    default: ''
                },
                inputId: {
                    type: String,
                    default: ''
                },
                help: {
                    type: String,
                    default: ''
                },
                errors: {
                    type: Object
                },
                required: {
                    type: Boolean,
                    default: false
                }
            },
            data() {
                return {
                    errorMessage: {}
                }
            },
            watch: {},
            methods: {
                handleInput(event) {
                    this.$emit('input', event.target.value);
                }
            }
        }

        const InputEmail = {
            name: "InputEmail",
            inheritAttrs: false,
            template: "#input-email-template",
            model: {
                prop: 'input',
                event: 'input',
            },
            props: {
                value: {
                    type: String,
                    default: ''
                },
                name: {
                    type: String,
                    default: ''
                },
                label: {
                    type: String,
                    default: ''
                },
                inputId: {
                    type: String,
                    default: ''
                },
                help: {
                    type: String,
                    default: ''
                },
                errors: {
                    type: Object
                }
            },
            methods: {
                handleInput(event) {
                    this.$emit('input', event.target.value);
                }
            }
        }

        const InputTextarea = {
            name: "InputTextarea",
            template: "#textarea-template",
            inheritAttrs: false,
            model: {
                prop: 'input',
                event: 'input',
            },
            props: {
                value: {
                    type: String,
                    default: ''
                },
                label: {
                    type: String,
                    default: ''
                },
                name: {
                    type: String,
                    default: ''
                },
                id: {
                    type: String,
                    default: ''
                },
                help: {
                    type: String,
                    default: ''
                },
                errors: {
                    type: Object
                }
            },
            methods: {
                handleInput(event) {
                    this.$emit('input', event.target.value);
                }
            }
        }

        Vue.component("brief-create-component", {
            name: "brief-create-component",
            template: "#brief-create-template",
            props: ['contacts', 'phones', 'errors'],
            components: {
                'InputText': InputText,
                'InputEmail': InputEmail,
                'InputTextarea': InputTextarea
            },
            data: function() {
                return {
                    messageError: null,
                    form: {
                        id: null,
                        uuid: "{{ Str::uuid() }}",
                        _token: "{{ csrf_token() }}",
                        company: {
                            name: "{{ old('company_name') }}",
                            person: "{{ old('company_person') }}",
                            number: "{{ old('company_number') }}",
                            email: "{{ old('company_email') }}",
                            web: "{{ old('company_web') }}"
                        },
                        event: {
                            name: "{{ old('event_name') }}",
                            location: "{{ old('event_location') }}",
                            date: "{{ old('event_date') }}"
                        },
                        stand_area: {
                            size: "{{ old('stand_area_size') }}",
                            hall_no: "{{ old('stand_area_hall_no') }}",
                            stand_no: "{{ old('stand_area_stand_no') }}",
                            attach_plan: "{{ old('stand_area_attach_plan') }}"
                        },
                        positions_of_design: {
                            info_counter: "{{ old('positions_of_design_info_counter') }}",
                            meeting_rooms: "{{ old('positions_of_design_meeting_rooms') }}",
                            meeting_places: "{{ old('positions_of_design_meeting_places') }}",
                            storage_room: "{{ old('positions_of_design_storage_room') }}",
                            podium: "{{ old('positions_of_design_podium') }}",
                            showcase: "{{ old('positions_of_design_showcase') }}",
                            screen: "{{ old('positions_of_design_screen') }}",
                            floor: "{{ old('positions_of_design_floor') }}",
                            suspension_structure: "{{ old('positions_of_design_suspension_structure') }}",
                            plants: "{{ old('positions_of_design_plants') }}",
                        },
                        elements_of_design: {
                            company_logo: "{{ old('elements_of_design_company_logo') }}",
                            corporate_colors: "{{ old('elements_of_design_corporate_colors') }}",
                            brand_book: "{{ old('elements_of_design_brand_book') }}",
                            graphic_files: "{{ old('elements_of_design_graphic_files') }}",
                            colors_preferred: "{{ old('elements_of_design_colors_preferred') }}",
                            stand_style: "{{ old('elements_of_design_stand_style') }}",
                            previous_experience_design: "{{ old('elements_of_design_previous_experience_design') }}",
                        },
                        product_list: "{{ old('product_list') }}",
                        stand_budget: "{{ old('stand_budget') }}",
                        additional_conditions: "{{ old('additional_conditions') }}"
                    },
                    errorsMessages: {
                        company: {
                            name: '',
                            person: '',
                            number: '',
                            email: '',
                            web: ''
                        },
                        event: {
                            name: '',
                            location: '',
                            date: null
                        },
                        stand_area: {
                            size: '',
                            hall_no: '',
                            stand_no: null,
                            attach_plan: null
                        },
                        positions_of_design: {
                            info_counter: '',
                            meeting_rooms: '',
                            meeting_places: '',
                            storage_room: '',
                            podium: '',
                            showcase: '',
                            screen: '',
                            floor: '',
                            suspension_structure: '',
                            plants: '',
                        },
                        elements_of_design: {
                            company_logo: '',
                            corporate_colors: '',
                            brand_book: '',
                            graphic_files: '',
                            colors_preferred: '',
                            stand_style: '',
                            previous_experience_design: '',
                        },
                        product_list: '',
                        stand_budget: '',
                        additional_conditions: ''
                    }
                }
            },
            created() {
                this.errorsMessages = this.errors;
            },
            methods: {
                getDefaultErrorsValue() {
                    return {
                        company: {
                            name: '',
                            person: '',
                            number: '',
                            email: '',
                            web: ''
                        },
                        event: {
                            name: '',
                            location: '',
                            date: null
                        },
                        stand_area: {
                            size: '',
                            hall_no: '',
                            stand_no: null,
                            attach_plan: null
                        },
                        positions_of_design: {
                            info_counter: '',
                            meeting_rooms: '',
                            meeting_places: '',
                            storage_room: '',
                            podium: '',
                            showcase: '',
                            screen: '',
                            floor: '',
                            suspension_structure: '',
                            plants: '',
                        },
                        elements_of_design: {
                            company_logo: '',
                            corporate_colors: '',
                            brand_book: '',
                            graphic_files: '',
                            colors_preferred: '',
                            stand_style: '',
                            previous_experience_design: '',
                        },
                        product_list: '',
                        stand_budget: '',
                        additional_conditions: ''
                    }
                },
                submit() {
                    // const app = this;
                    // app.errors = this.getDefaultErrorsValue();
                    // app.messageError = null;
                    // axios.post("{{ route('briefs.store') }}", this.form).then(result => {
                    //     console.log(result);
                    // }).catch((error) => {
                    //     if(error?.response && error.response.status === 422) {
                    //         app.errors = error.response.data.errors;
                    //         app.messageError = error.response.data.message;
                    //         $('#toastError').toast('show')
                    //     }
                    // });
                },

            }
        });
    </script>
@endpush

@section('content')

    <div class="brief-page align-items-start container">
        <div class="row">
            @if (session('success'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('errors'))
                <div class="col-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
            <div class="col-12">
                <brief-create-component :errors="{{ $errors }}" :contacts="{{ json_encode($contact) }}"
                    :phones="{{ json_encode($phones) }}"></brief-create-component>
            </div>
        </div>
    </div>

@endsection
