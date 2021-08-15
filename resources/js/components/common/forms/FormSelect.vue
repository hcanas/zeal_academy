<template>
    <select class="w-full px-2 py-1 border border-light rounded outline-none focus:ring-1">
        <form-select-option v-if="options" v-for="option in options" :key="option.title">{{ option.title }}</form-select-option>
        <slot></slot>
    </select>
</template>

<script>
    import FormSelectOption from "./FormSelectOption";
    export default {
        name: "FormSelect",
        components: {FormSelectOption},
        props: {
            options: Object,
        },
    }
</script>

<style scoped>

</style>
