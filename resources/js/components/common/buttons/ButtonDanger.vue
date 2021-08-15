<template>
    <button type="button" class="w-full px-2 py-1 text-white bg-danger-base rounded focus:outline-none hover:bg-danger-light focus:bg-danger-light">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "ButtonDanger",
    }
</script>

<style scoped>

</style>
