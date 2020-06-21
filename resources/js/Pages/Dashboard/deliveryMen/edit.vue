<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">رجال التوصيل /<span class="text-gray-700"> تعديل</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="الاسم" name="name" v-model="form.name" :error="$page.errors.name" required></base-input>
                        </div>
                        <div>
                            <base-input label="رقم الهاتف" name="phone" v-model="form.phone" :error="$page.errors.phone" required></base-input>
                        </div>
                        <div>
                            <base-input label="الهاتف البديل" name="alt_phone" v-model="form.alt_phone" :error="$page.errors.alt_phone" required></base-input>
                        </div>
                        <div>
                            <span class="text-gray-700">المنطقة</span>
                            <base-select label="name_ar" :options="areas" :reduce="area => area.id"
                                         v-model="form.area_id" dir="rtl" required>
                                <template #search="{attributes, events}">
                                    <input
                                        class="vs__search"
                                        :required="!form.area_id"
                                        v-bind="attributes"
                                        v-on="events"
                                    />
                                </template>
                            </base-select>
                        </div>
                        <div>
                            <base-input label="العنوان" name="address" v-model="form.address" :error="$page.errors.address" required></base-input>
                        </div>
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
        props: ['deliveryMan', 'areas'],
        data() {
            return {
                form: {
                    name: '',
                    phone: '',
                    alt_phone: '',
                    area_id: ''
                }
            }
        },
        created() {
            this.form = this.deliveryMan;
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('deliveryMen.update', this.deliveryMan.id), this.form);
            }
        }
    }
</script>
