<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<?php
$style = [
    /* Layout ------------------------------ */
    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',
    /* Masthead ----------------------- */
    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',
    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',
    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
    /* Body ------------------------------ */
    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
    /* Type ------------------------------ */
    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',
    /* Buttons ------------------------------ */
    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>
<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="{{ $style['email-wrapper'] }}" align="center">
            <table width="100%" cellpadding="0" cellspacing="0">
                <!-- Logo -->
                <tr>
                    <td style="{{ $style['email-masthead'] }}"><a
                            style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}"
                            href="{{ url('/') }}" target="_blank"> <img
                                src="{{ asset('/images/icons/logo.svg') }}" height="150px"/>
                            <!--{{ config('app.name') }}-->
                        </a><br/><br/>
                        <div align="center">Company name: {{ $companyName }}</div>
                    </td>
                </tr>
                <!-- Email Body -->
                <tr>
                    <td style="{{ $style['email-body'] }}" width="100%">
                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                               cellspacing="0">
                            <thead class="thead-light">
                            <tr>
                                <th colspan="2">
                                    <h2>About the company:</h2>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($briefValue as $key => $data)
                                @if ($key === 'company_name')
                                    <tr>
                                        <td align="left">
                                            Company name:
                                        </td>
                                        <td align="left">
                                            {{ $data }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($key === 'company_person')

                                    <tr>
                                        <td align="left">
                                            Contact Person:
                                        </td>
                                        <td align="left">
                                            {{ $data }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($key === 'company_number')

                                    <tr>
                                        <td align="left">
                                            Contact No:
                                        </td>
                                        <td align="left">
                                            {{ $data }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($key === 'company_email')

                                    <tr>
                                        <td align="left">
                                            Email:
                                        </td>
                                        <td align="left">
                                            <a href="mailto:{{ $data }}">{{ $data }}</a>
                                        </td>
                                    </tr>
                                @endif
                                @if ($key === 'company_web')

                                    <tr>
                                        <td align="left">
                                            Web Site:
                                        </td>
                                        <td align="left">
                                            <a href="{{ $data }}">{{ $data }}</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                               cellspacing="0">
                        <thead class="thead-light">
                        <tr>
                            <th colspan="2">
                                <h2>Event:</h2>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($briefValue as $key => $data)
                            @if ($key === 'event_name')
                                <tr>
                                    <td align="left">
                                        Exhibition name:
                                    </td>
                                    <td align="left">
                                        {{ $data }}
                                    </td>
                                </tr>
                            @endif
                            @if ($key === 'event_location')
                                <tr>
                                    <td align="left">
                                        Exhibition location:
                                    </td>
                                    <td align="left">
                                        {{ $data }}
                                    </td>
                                </tr>
                            @endif
                            @if ($key === 'event_date')
                                <tr>
                                    <td align="left">
                                        Exhibition dates:
                                    </td>
                                    <td align="left">
                                        {{ $data }}
                                    </td>
                                </tr>
                            @endif
                            @if ($key === 'event_date')
                                <tr>
                                    <td align="left">
                                        Exhibition dates:
                                    </td>
                                    <td align="left">
                                        {{ $data }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
            </table>
                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                               cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th colspan="2">
                        <h2>Stand area:</h2>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($briefValue as $key => $data)
                    @if ($key === 'stand_area_size')
                        <tr>
                            <td align="left">
                                Stand Size (length and depth):
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'stand_area_stand_no')
                        <tr>
                            <td align="left">
                                Stand No.:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'stand_area_attach_plan')
                        <tr>
                            <td align="left">
                                Attach hall plan with stand location:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                               cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th colspan="2">
                        <h2>Indicate positions for your stand design:</h2>
                        <small>(yes/no/quantity)</small>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($briefValue as $key => $data)
                    @if ($key === 'positions_of_design_info_counter')
                        <tr>
                            <td align="left">
                                - info counter:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'positions_of_design_meeting_rooms')
                        <tr>
                            <td align="left">
                                - meeting rooms (closed/half-closed):
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'positions_of_design_meeting_places')
                        <tr>
                            <td align="left">
                                - meeting places (open):
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'positions_of_design_storage_room')
                        <tr>
                            <td align="left">
                                - storage room (shelf, refrigerator, coffee maker, etc.):
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'positions_of_design_podium')
                        <tr>
                            <td align="left">
                                - podium for equipment (LxWxH):
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'positions_of_design_showcase')
                        <tr>
                            <td align="left">
                                - showcase:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'positions_of_design_screen')
                        <tr>
                            <td align="left">
                                - LED Screen / TV:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'positions_of_design_floor')
                        <tr>
                            <td align="left">
                                - floor: (carpet/ laminate/ raised-floor h = mm):
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'positions_of_design_suspension_structure')
                        <tr>
                            <td align="left">
                                - suspension structure:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                               cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th colspan="2">
                        <h2>Elements of design (indicate/attach):</h2>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($briefValue as $key => $data)
                    @if ($key === 'elements_of_design_company_logo')
                        <tr>
                            <td align="left">
                                - company’s logo in ai, cdr, eps formats:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'elements_of_design_corporate_colors')
                        <tr>
                            <td align="left">
                                - corporate colors/ pantone / ral or ORACAL:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'elements_of_design_brand_book')
                        <tr>
                            <td align="left">
                                - brand book:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'elements_of_design_graphic_files')
                        <tr>
                            <td align="left">
                                - graphic files: existing posters & branding or Product Photos:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'elements_of_design_colors_preferred')
                        <tr>
                            <td align="left">
                                - colors preferred:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'elements_of_design_stand_style')
                        <tr>
                            <td align="left">
                                - stand style (minimalistic, curvy, semi curve, european, thematic, heavy, light,
                                open…etc..):
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                    @if ($key === 'elements_of_design_previous_experience_design')
                        <tr>
                            <td align="left">
                                - anything from your previous experience that you prefer to repeat in the Design:
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                               cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th colspan="2">
                        <h2>Your product list (name, quantity & LxWxH):</h2>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($briefValue as $key => $data)
                    @if ($key === 'product_list')
                        <tr>
                            <td align="left">
                                &nbsp;
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                               cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th colspan="2">
                        <h2>Estimated stand budget (Fixed/Lower limit to upper limit):</h2>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($briefValue as $key => $data)
                    @if ($key === 'stand_budget')
                        <tr>
                            <td align="left">
                                &nbsp;
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
                        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0"
                               cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th colspan="2">
                        <h2>Additional conditions or wishes:</h2>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($briefValue as $key => $data)
                    @if ($key === 'additional_conditions')
                        <tr>
                            <td align="left">
                                &nbsp;
                            </td>
                            <td align="left">
                                {{ $data }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <!-- Footer -->
    <tr>
        <td>
            <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0"
                   cellspacing="0">
                <tr>
                    <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                        <p style="{{ $style['paragraph-sub'] }}"> &copy; {{ date('Y') }} <a
                                style="{{ $style['anchor'] }}" href="{{ url('/') }}"
                                target="_blank">StandPoint</a>.
                            All rights reserved. </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</td>
</tr>
</table>
</body>

</html>
