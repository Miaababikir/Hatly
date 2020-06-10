<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">وحدة /<span class="text-gray-700"> اضافة</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="الاسم" name="name" v-model="form.name" :error="$page.errors.name" required></base-input>
                        </div>
                        <div>
                            <base-input label="الاسم بالعربي" name="name_ar" v-model="form.name_ar" :error="$page.errors.name_ar" required></base-input>
                        </div>
                        <div>
                            <base-input label="الاسم مختصر" name="short_name" v-model="form.short_name" :error="$page.errors.short_name" required></base-input>
                        </div>
                        <div>
                            <base-input label="الاسم مختصر بالعربي" name="short_name_ar" v-model="form.short_name_ar" :error="$page.errors.short_name_ar" required></base-input>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>اضافة</base-button>
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
        data() {
            return {
                form: {
                    name: '',
                    name_ar: '',
                    short_name: '',
                    short_name_ar: '',
                }
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/dashboard/units', this.form);
            }
        }
    }
</script>
