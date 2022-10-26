

<script>
import BriefHeader from './BriefHeader.vue';
import InputText from "./Inputs/text.vue";
import InputRadio from "./Inputs/radio.vue";
import InputEmail from "./Inputs/email.vue";
import InputTextarea from "./Inputs/textarea.vue";
import { v4 as uuidv4 } from "uuid";

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
                id: null,
                uuid: uuidv4(),
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
            axios.post('/briefs/create', this.form).then(result => {
                console.log(result);
            })
        }
    }
}
</script>
<style lang="scss" scoped>

</style>
