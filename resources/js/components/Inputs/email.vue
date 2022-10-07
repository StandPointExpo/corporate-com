<template>
    <div class="form-group custom-form-group">
        <label :for="inputId">{{ label }}</label>
        <input type="email" class="form-control" :id="inputId" :aria-describedby="`${inputId}Help`" :value="value"
               :name="name"
               @input="handleInput">
        <div v-if="error" class="invalid-feedback">
            {{ error }}
        </div>
        <small :id="`${inputId}Help`" class="form-text text-muted">{{ help }}</small>
    </div>
</template>

<script>
export default {
    name: "InputEmail",
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
        error: {
            type: String,
            default: null
        }
    },
    methods: {
        handleInput(event) {
            this.$emit('input', event.target.value);
        }
    }
}
</script>

<style scoped>

</style>
