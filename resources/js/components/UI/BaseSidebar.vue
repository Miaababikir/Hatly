<template>
    <aside class="w-full md:w-64 bg-gray-800 md:min-h-screen">
        <div class="flex items-center justify-between bg-gray-900 p-4 h-16">
            <inertia-link href="/dashboard" class="flex items-center">
                <svg class="w-6" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M32.6883 0.335913C32.3407 -0.0248702 31.7929 -0.104067 31.3596 0.142322L19.2249 6.96861L20.3117 1.53926C20.4063 1.06188 20.1797 0.582302 19.7529 0.353512C19.3261 0.126923 18.7981 0.199519 18.455 0.544904L2.96986 16.03C2.94127 16.052 2.91487 16.0762 2.89067 16.1026C1.02735 17.9945 0 20.4804 0 23.1005C0 28.5584 4.4416 33 9.89955 33C12.5218 33 15.0077 31.9727 16.8974 30.1115C16.926 30.0829 16.9502 30.0543 16.9766 30.0235L30.1232 16.8792C30.4532 16.5492 30.539 16.0454 30.3366 15.6252C30.1364 15.205 29.6876 14.9674 29.2235 15.0092L24.4409 15.5394L32.8379 1.67125C33.0975 1.24227 33.0381 0.694497 32.6883 0.335913ZM9.89955 29.7002C6.25431 29.7002 3.29985 26.7457 3.29985 23.1005C3.29985 19.4552 6.25431 16.5008 9.89955 16.5008C13.5448 16.5008 16.4992 19.4552 16.4992 23.1005C16.4992 26.7457 13.5448 29.7002 9.89955 29.7002Z"
                        fill="#667EEA"/>
                </svg>

                <span class="text-gray-300 text-xl font-semibold mx-2">لوحة التحكم</span>
            </inertia-link>
            <div class="flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                        class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                    <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="px-2 py-6 md:block" :class="isOpen? 'block': 'hidden'">
            <ul>
                <li class="px-2 py-3 hover:bg-gray-900 rounded"
                    :class="route().current('dashboard.index')? 'bg-gray-900' : ''">
                    <inertia-link href="/dashboard" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="mx-2 text-gray-300">الرئيسية</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('users.*')? 'bg-gray-900' : ''">
                    <inertia-link href="/dashboard/users" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="mx-2 text-gray-300">الادمن</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('customers.*')? 'bg-gray-900' : ''">
                    <inertia-link href="/dashboard/customers" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="mx-2 text-gray-300">المستخدمين</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('deliveryMen.*')? 'bg-gray-900' : ''">
                    <inertia-link href="/dashboard/delivery-men" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="mx-2 text-gray-300">رجال التوصيل</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('areas.*')? 'bg-gray-900' : ''">
                    <inertia-link :href="$route('areas.index')" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="mx-2 text-gray-300">المناطق</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('categories.*')? 'bg-gray-900' : ''">
                    <inertia-link :href="$route('categories.index')" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <span class="mx-2 text-gray-300">الاصناف</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('units.*')? 'bg-gray-900' : ''">
                    <inertia-link :href="$route('units.index')" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                        <span class="mx-2 text-gray-300">الوحدات</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('products.*')? 'bg-gray-900' : ''">
                    <inertia-link :href="$route('products.index')" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="mx-2 text-gray-300">المنتجات</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('orders.*')? 'bg-gray-900' : ''">
                    <inertia-link :href="$route('orders.index')" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        <span class="mx-2 text-gray-300">الطلبات</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2"
                    :class="route().current('callCenter.*')? 'bg-gray-900' : ''">
                    <inertia-link :href="$route('callCenter.index')" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span class="mx-2 text-gray-300">خدمة العملاء</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="#" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="mx-2 text-gray-300">التقارير</span>
                    </a>
                </li>
            </ul>
            <div class="border-t border-gray-700 -mx-2 mt-2 md:hidden"></div>
            <ul class="mt-6 md:hidden">
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <a href="#" class="mx-2 text-gray-300">تعديل الحساب</a>
                </li>
                <li class="px-2 py-3 hover:bg-gray-900 rounded mt-2">
                    <button class="mx-2 text-gray-300" @click="logout">تسجيل الخروج</button>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script>
    export default {
        name: "BaseSidebar",
        data() {
            return {
                isOpen: false
            }
        },
        methods: {
            logout() {
                axios.post('/logout')
                    .then(() => location.reload());
            }
        }
    }
</script>

<style scoped>

</style>
