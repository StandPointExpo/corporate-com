<template>
    <div class="form-group custom-form-group">
        <label :for="id">{{ label }}</label>
        <textarea class="form-control" :id="id" :aria-describedby="`${id}Help`" :value="value"
                  :name="name"
                  @input="handleInput" rows="3"></textarea>
        <div v-if="error" class="invalid-feedback">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    name: "InputTextarea",
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
