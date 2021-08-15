<template>
    <div class="w-full flex items-center space-x-1">
        <input type="checkbox" :id="id" :class="getClass" :name="name" :value="value" :checked="checked" @change="$emit('change')" class="outline-none focus:ring-1 focus:ring-primary-base">
        <label :for="id">
            <slot></slot>
        </label>
    </div>
</template>

<script>
    export default {
        name: "FormCheckbox",
        props: {
            name: String,
            value: String,
            class: String,
            id: String,
            checked: Boolean,
        },
        computed: {
            getClass() {
                return this.class;
            },
        },
    }
</script>

<style scoped>
    input[type="checkbox"]:checked {
        visibility: hidden;
    }

    input[type="checkbox"]:checked:before {
        width: 13px;
        height: 13px;
        border-radius: 2px;
        top: -4px;
        left: 0;
        position: relative;
        content: '';
        display: inline-block;
        visibility: visible;
        background-color: theme("colors.primary.base");
    }
</style>
