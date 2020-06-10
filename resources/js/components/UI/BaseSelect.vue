<template>
    <label class="block">
        <div
            class="text-sm font-semibold mb-1"
            v-if="label"
            v-text="label"
        ></div>
        <select
            class="form-select border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
            :name="name"
            @input="$emit('input', $event.target.value)"
        >
            <option v-for="option in options" :key="option.id" :value="option.id" v-text="option[object]" :selected="option.id === value"></option>
        </select>
    </label>
</template>

<script>
    export default {
        props: {
            value: null,
            label: String,
            object: String,
            name: String,
            options: Array,
        },
    }
</script>

<style scoped>
    .form-select {
        background-position: left 0.5rem center;
    }
</style>
