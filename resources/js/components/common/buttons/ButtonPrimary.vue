<template>
    <button type="button" class="w-full px-2 py-1 text-white bg-primary-base rounded focus:outline-none hover:bg-primary-light focus:bg-primary-light">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "ButtonPrimary",
    }
</script>

<style scoped>

</style>
