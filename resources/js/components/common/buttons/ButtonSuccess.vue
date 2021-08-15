<template>
    <button type="button" class="w-full px-2 py-1 text-white bg-success-base rounded focus:outline-none hover:bg-success-light focus:bg-success-light">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "ButtonSuccess",
    }
</script>

<style scoped>

</style>
