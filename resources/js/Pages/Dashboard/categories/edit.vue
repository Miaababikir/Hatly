<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">الاصناف /<span class="text-gray-700"> تعديل</span>
                </h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <base-input label="الاسم" name="name" v-model="form.name" :error="$page.errors.name"
                                    required></base-input>
                        <base-input label="الاسم بالعربي" name="name_ar" v-model="form.name_ar"
                                    :error="$page.errors.name_ar" required></base-input>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>تعديل</base-button>
                    </div>
                </form>
            </base-panel>

        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";

    export default {
        components: {Layout},
        props: ['category'],
        data() {
            return {
                form: {
                    name: '',
                    name_ar: '',
                }
            }
        },
        created() {
            this.form = this.category;
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('categories.update', this.category.id), this.form);
            }
        }
    }
</script>
