<template>
    <layout>

        <div class="mt-8">
            <div class="flex justify-between">
                <h2 class="text-3xl text-gray-700 font-bold">خدمة العملاء</h2>
            </div>

            <div class="mt-4 flex">
                <div class="text-gray-700 body-font w-2/3">
                    <div class="flex flex-wrap -m-4">
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full" v-for="product in products">
                            <div class="shadow-lg rounded-lg overflow-hidden">
                                <img class="h-48 w-full object-cover mt-2"
                                     :src="product.image"
                                     alt="NIKE AIR">

                                <div class="flex items-center justify-between px-4 py-2 bg-white">
                                    <div class="flex flex-col">
                                        <h1 class="font-bold text-lg">{{ product.name_ar }}</h1>
                                        <p class="text-gray-600 font-bold">{{ product.price }} جنيه</p>
                                    </div>
                                    <base-button primary small>اضافة</base-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-1/3 px-8">
                    <base-panel>
                        <div class="flex items-center">
                            <svg class="w-6 text-indigo-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <h2 class="text-xl text-gray-700 font-bold">سلة المنتجات</h2>
                        </div>

                        <div class="mt-4">
                            <div class="flex flex-col">
                                <div>
                                    <div class="flex justify-between items-center py-4 mt-3 border-b">
                                        <h2>طماطم</h2>
                                        <div class="flex items-center">
                                            <button class="w-8 h-8 bg-indigo-400 flex items-center justify-center rounded">
                                                <svg class="w-5 text-gray-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                            <input class="w-8 h-8 border mx-2 rounded focus:outline-none focus:border-indigo-500 p-2 text-gray-700" disabled value="10">
                                            <button class="w-8 h-8 bg-indigo-500 flex items-center justify-center rounded">
                                                <svg class="w-5 text-gray-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                        </div>
                                        <div>
                                            <span>120 جنيه</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center py-4 mt-3 border-b">
                                        <h2>طماطم</h2>
                                        <div class="flex items-center">
                                            <button class="w-8 h-8 bg-indigo-400 flex items-center justify-center rounded">
                                                <svg class="w-5 text-gray-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                            <input class="w-8 h-8 border mx-2 rounded focus:outline-none focus:border-indigo-500 p-2 text-gray-700" disabled value="10">
                                            <button class="w-8 h-8 bg-indigo-500 flex items-center justify-center rounded">
                                                <svg class="w-5 text-gray-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                        </div>
                                        <div>
                                            <span>120 جنيه</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center py-4 mt-3 border-b">
                                        <h2>طماطم</h2>
                                        <div class="flex items-center">
                                            <button class="w-8 h-8 bg-indigo-400 flex items-center justify-center rounded">
                                                <svg class="w-5 text-gray-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                            <input class="w-8 h-8 border mx-2 rounded focus:outline-none focus:border-indigo-500 p-2 text-gray-700" disabled value="10">
                                            <button class="w-8 h-8 bg-indigo-500 flex items-center justify-center rounded">
                                                <svg class="w-5 text-gray-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                        </div>
                                        <div>
                                            <span>120 جنيه</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center py-4 mt-3 border-b">
                                        <h2>طماطم</h2>
                                        <div class="flex items-center">
                                            <button class="w-8 h-8 bg-indigo-400 flex items-center justify-center rounded">
                                                <svg class="w-5 text-gray-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                            <input class="w-8 h-8 border mx-2 rounded focus:outline-none focus:border-indigo-500 p-2 text-gray-700" disabled value="10">
                                            <button class="w-8 h-8 bg-indigo-500 flex items-center justify-center rounded">
                                                <svg class="w-5 text-gray-100" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </button>
                                        </div>
                                        <div>
                                            <span>120 جنيه</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <p class="font-semibold text-gray-700">المجموع: </p>
                                    <p>250 جنيه</p>
                                </div>
                                <base-button primary class="w-full mt-4">شراء</base-button>
                            </div>
                        </div>
                    </base-panel>
                </div>

            </div>

        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";
    import Pagination from "../../../Shared/Pagination";

    export default {
        components: {Pagination, Layout},
        props: ['products'],
        data() {
            return {}
        },

        methods: {}
    }
</script>
