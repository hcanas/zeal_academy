<template>
    <div class="w-full flex items-center space-x-1">
        <input type="radio" :id="id" :class="getClass" :name="name" :value="value" :checked="checked" @change="$emit('change')">
        <label :for="id">
            <slot></slot>
        </label>
    </div>
</template>

<script>
    export default {
        name: "FormRadio",
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
    input[type="radio"]:checked {
        visibility: hidden;
    }

    input[type="radio"]:checked:before {
        width: 11px;
        height: 11px;
        border-radius: 50%;
        top: -5px;
        left: 1px;
        position: relative;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
        background-color: theme("colors.primary.base");
    }

    input[type="radio"]:checked:after {
        width: 13px;
        height: 13px;
        border-radius: 50%;
        top: -28.5px;
        left: 0;
        position: relative;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 1px solid theme("colors.primary.base");
    }
</style>
