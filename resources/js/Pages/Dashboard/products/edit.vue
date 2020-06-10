<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">المناطق /<span class="text-gray-700"> تعديل</span>
                </h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <base-input label="الاسم" name="name" v-model="form.name" :error="$page.errors.name"
                                        required></base-input>
                        </div>
                        <div>
                            <base-input label="الاسم بالعربي" name="name_ar" v-model="form.name_ar"
                                        :error="$page.errors.name_ar" required></base-input>
                        </div>
                        <div>
                            <base-select label="name_ar" :options="categories" :reduce="category => category.id"
                                         v-model="form.category_id" dir="rtl" required>
                                <template #search="{attributes, events}">
                                    <input
                                        class="vs__search"
                                        :required="!form.category_id"
                                        v-bind="attributes"
                                        v-on="events"
                                    />
                                </template>
                            </base-select>
                        </div>
                        <div>
                            <base-select label="name_ar" :options="units" :reduce="unit => unit.id"
                                         v-model="form.unit_id" dir="rtl" required>
                                <template #search="{attributes, events}">
                                    <input
                                        class="vs__search"
                                        :required="!form.unit_id"
                                        v-bind="attributes"
                                        v-on="events"
                                    />
                                </template>
                            </base-select>
                        </div>
                        <div>
                            <base-input label="الكمية" name="stock" v-model="form.stock" :error="$page.errors.stock"
                                        required></base-input>
                        </div>
                        <div>
                            <base-input label="السعر" name="price" v-model="form.price" :error="$page.errors.price"
                                        required></base-input>
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
        props: ['product', 'categories', 'units'],
        data() {
            return {
                form: {
                    name: '',
                    name_ar: '',
                    category_id: '',
                    unit_id: '',
                    stock: '',
                    price: '',
                }
            }
        },
        created() {
            this.form = this.product;
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('products.update', this.product.id), this.form);
            }
        }
    }
</script>
