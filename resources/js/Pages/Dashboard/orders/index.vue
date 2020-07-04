<template>
    <layout>

        <div class="mt-8">
            <div class="flex justify-between">
                <h2 class="text-3xl text-gray-700 font-bold">الطلبات</h2>
            </div>

            <base-panel>
                <h2 class="text-lg text-gray-700 font-bold">تعيين رجال التوصيل</h2>
                <div class="mt-2">
                    <form @submit.prevent="submitAssignDeliveryMan">
                        <div class="flex items-end">
                            <div class="w-1/3">
                                <span class="text-gray-700">اختر الطلبات</span>
                                <base-select label="id" :options="notDeliveredOrders" :reduce="order => order.id"
                                             dir="rtl" :closeOnSelect="false"
                                             v-model="assignDeliveryForm.orders"
                                             multiple required>
                                    <template #search="{attributes, events}">
                                        <input
                                            class="vs__search"
                                            :required="!assignDeliveryForm.orders"
                                            v-bind="attributes"
                                            v-on="events"
                                        />
                                    </template>
                                </base-select>
                            </div>
                            <div class="w-1/3 mr-4">
                                <span class="text-gray-700">اختر رجل التوصيل</span>
                                <base-select label="name" :options="deliveryMen" :reduce="man => man.id" v-model="assignDeliveryForm.delivery_man_id" dir="rtl" required>
                                    <template #search="{attributes, events}">
                                        <input
                                            class="vs__search"
                                            :required="!assignDeliveryForm.delivery_man_id"
                                            v-bind="attributes"
                                            v-on="events"
                                        />
                                    </template>
                                </base-select>
                            </div>
                            <div class="w-1/3 mr-4">
                                <base-button primary>تعيين</base-button>
                            </div>
                        </div>
                    </form>
                </div>
            </base-panel>

            <div class="mt-4">
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        #
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        اسم الزبون
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        رقم الزبون
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        الحالة
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        التعديل
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-700">
                                <tr v-for="order in orders.data">
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ order.id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ order.customer.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ order.customer.phone }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="px-2 py-1 bg-green-500 text-white text-xs rounded"
                                              v-if="order.editable">يمكن التعديل</span>
                                        <span class="px-2 py-1 bg-yellow-500 text-white text-xs rounded" v-else>لا يمكن التعديل</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="px-2 py-1 bg-green-500 text-white text-xs rounded"
                                              v-if="order.delivered">تم التوصيل</span>
                                        <span class="px-2 py-1 bg-yellow-500 text-white text-xs rounded" v-else>لم يتم التوصيل</span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        <inertia-link :href="'#'" class="text-indigo-600 hover:text-indigo-900">تعديل
                                        </inertia-link>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <pagination :links="orders.links" class="mt-5"></pagination>
        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";
    import Pagination from "../../../Shared/Pagination";

    export default {
        components: {Pagination, Layout},
        props: ['orders', 'notDeliveredOrders', 'deliveryMen'],
        data() {
            return {
                assignDeliveryForm: {
                    orders: [],
                    delivery_man_id: ''
                }
            }
        },

        methods: {
            submitAssignDeliveryMan() {
                this.$inertia.post(this.$route('deliveryMen.orders.store', this.assignDeliveryForm.delivery_man_id), this.assignDeliveryForm)
                .then(() => {
                    this.assignDeliveryForm = {
                        orders: [],
                        delivery_man_id: ''
                    }
                });
            }
        }
    }
</script>
