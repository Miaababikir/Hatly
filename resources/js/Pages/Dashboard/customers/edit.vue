<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">المستخدمين /<span class="text-gray-700"> تعديل</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="الاسم" name="name" v-model="form.name" :error="$page.errors.name" required></base-input>
                        </div>
                        <div>
                            <base-input type="email" label="البريد الالكتروني" name="email" v-model="form.email" :error="$page.errors.email" required></base-input>
                        </div>
                        <div>
                            <base-input label="كلمة المرور" type="password" v-model="form.password" :error="$page.errors.password"></base-input>
                        </div>
                        <div>
                            <base-input label="تأكيد كلمة المرور" type="password" v-model="form.password_confirmation"></base-input>
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
        props: ['customer', 'areas'],
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    alt_phone: '',
                    password: '',
                    password_confirmation: '',
                    area_id: ''
                }
            }
        },
        created() {
            this.form = this.customer;
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('customers.update', this.customer.id), this.form);
            }
        }
    }
</script>
