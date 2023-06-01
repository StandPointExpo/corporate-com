<template>
    <div class="custom-form-group custom-control custom-radio">
        <input type="radio" :id="id" :name="name" :value="value" class="custom-control-input" @change="handleInput">
        <label class="custom-control-label" :for="id">{{ label }}</label>
        <div v-if="error" class="invalid-feedback">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    name: "InputRadio",
    inheritAttrs: false,
    model: {
        prop: 'checked',
        event: 'change'
    },
    props: {
        checked: {
            type: String,
            default: ''
        },
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
        error: {
            type: String,
            default: null
        }
    },
    methods: {
        handleInput(event) {
            console.log(event.target.value)
            this.$emit('change', event.target.value);
        }
    }
}
</script>

<style scoped>

</style>
