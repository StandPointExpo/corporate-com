<template>
    <div class="brief-page__create-component container py-4">
        <BriefHeader :contacts="contacts" :phones="phones"/>
        <h3 class="brief-page__create-component-title">Request for stand design & production</h3>
        <div class="row">
            <form name="briefFrom" @submit.prevent="submit" class="table-responsive col-12 px-0">
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
                            <InputText v-model.trim="form.company.name" label="Company name:"></InputText>
                            <InputText v-model.trim="form.company.person" label="Contact Person:"></InputText>
                            <InputText v-model.trim="form.company.number" label="Contact No:"></InputText>
                            <InputEmail v-model.trim="form.company.email" label="Email:"></InputEmail>
                            <InputText v-model.trim="form.company.web" label="Web Site:"></InputText>
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
                            <InputText v-model.trim="form.event.name" label="Exhibition name:"></InputText>
                            <InputText v-model.trim="form.event.location" label="Exhibition location:"></InputText>
                            <InputText v-model.trim="form.event.date" label="Exhibition dates:"></InputText>
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
                            <InputText v-model.trim="form.stand_area.size"
                                       label="Stand Size  (length and depth):"></InputText>
                            <InputText v-model.trim="form.stand_area.hall_no" label="Hall No."></InputText>
                            <InputText v-model.trim="form.stand_area.stand_no" label="Stand No."></InputText>
                            <InputText v-model.trim="form.stand_area.attach_plan"
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
                            <InputText v-model.trim="form.positions_of_design.info_counter"
                                       label="- info counter"></InputText>
                            <InputText v-model.trim="form.positions_of_design.meeting_rooms"
                                       label="- meeting rooms (closed/half-closed)"></InputText>
                            <InputText v-model.trim="form.positions_of_design.meeting_places"
                                       label="- meeting places (open)"></InputText>
                            <InputText v-model.trim="form.positions_of_design.storage_room"
                                       label="- storage room (shelf, refrigerator, coffee maker, etc.)"></InputText>
                            <InputText v-model.trim="form.positions_of_design.podium"
                                       label="- podium for equipment  (LxWxH)"></InputText>
                            <InputText v-model.trim="form.positions_of_design.showcase"
                                       label="- showcase"></InputText>
                            <InputText v-model.trim="form.positions_of_design.screen"
                                       label="- LED Screen / TV"></InputText>
                            <InputText v-model.trim="form.positions_of_design.floor"
                                       label="- floor:  (carpet/ laminate/ raised-floor h = mm)"></InputText>
                            <InputText v-model.trim="form.positions_of_design.suspension_structure"
                                       label="- suspension structure"></InputText>
                            <InputText v-model.trim="form.positions_of_design.plants"
                                       label="- plants"></InputText>
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
                            <InputText v-model.trim="form.elements_of_design.company_logo"
                                       label="- company’s logo in ai, cdr, eps formats"></InputText>
                            <InputText v-model.trim="form.elements_of_design.corporate_colors"
                                       label="- corporate colors/ pantone / ral or ORACAL"></InputText>
                            <InputText v-model.trim="form.elements_of_design.brand_book"
                                       label="- brand book"></InputText>
                            <InputText v-model.trim="form.elements_of_design.graphic_files"
                                       label="- graphic files: existing posters & branding or Product Photos"></InputText>
                            <InputText v-model.trim="form.elements_of_design.colors_preferred"
                                       label="- colors preferred"></InputText>
                            <InputText v-model.trim="form.elements_of_design.stand_style"
                                       label="- stand style (minimalistic, curvy, semi curve, european, thematic, heavy, light, open…etc..)"></InputText>
                            <InputText v-model.trim="form.elements_of_design.previous_experience_design"
                                       label="- anything from your previous experience that you prefer to repeat in the Design:"></InputText>

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
                            <InputText v-model.trim="form.product_list"></InputText>
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
                            <InputText v-model.trim="form.stand_budget"></InputText>
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
                            <InputTextarea v-model.trim="form.additional_conditions"></InputTextarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-outline-corporate btn-corporate" value="Send">
            </form>
        </div>
    </div>
</template>

<script>
import BriefHeader from './BriefHeader.vue';
import InputText from "./Inputs/text.vue";
import InputRadio from "./Inputs/radio.vue";
import InputEmail from "./Inputs/email.vue";
import InputTextarea from "./Inputs/textarea.vue";

export default {
    name: 'BriefCreateComponent',
    props: ['contacts', 'phones'],
    components: {
        InputText,
        InputEmail,
        InputRadio,
        BriefHeader,
        InputTextarea,
    },
    data: function () {
        return {
            form: {
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
    mounted() {
        //
    },
    methods: {
        submit() {
            console.log(this.form)
        }
    }
}
</script>
<style lang="scss" scoped>

</style>
