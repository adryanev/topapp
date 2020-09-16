<template>
    <input ref="input" :value="value" class="form-input rounded-md shadow-sm"
           @input="$emit('input', $event.target.value)">
</template>

<script>
export default {
    props: ['value'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>

