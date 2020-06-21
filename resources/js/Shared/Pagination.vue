<template>
    <ul class="flex" aria-label="Page navigation" v-if="showPagination">
        <li class="mx-1 px-3 py-2 hover:bg-indigo-600 hover:text-gray-200 rounded-lg" v-for="(link, key) in links" :key="key" :class="isActive(link)">
            <inertia-link class="font-bold" :href="link.url" v-if="link.url">{{ link.label }}</inertia-link>
            <a class="font-bold" href="#" v-else @click.prevent="handleNoLink">{{ link.label }}</a>
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            links: Array,
        },
        computed: {
            showPagination() {
                return this.links.length > 3
            }
        },
        methods: {
            isActive(link) {
                return (link.active === true) ? 'bg-indigo-600 text-gray-200' : 'bg-white text-gray-700'
            },
            handleNoLink() {
                return false
            }
        }
    }
</script>
