<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <Link :href="route('welcome')" class="flex items-center">
                            <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                        </Link>
                    </div>
                    <div class="flex items-center">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700">Dashboard</Link>
                        <template v-else>
                            <Link :href="route('login')" class="text-sm text-gray-700">Log in</Link>
                            <Link :href="route('register')" class="ml-4 text-sm text-gray-700">Register</Link>
                        </template>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <slot></slot>
            </div>
        </main>

        <footer class="bg-white border-t border-gray-100 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="flex justify-center space-x-4">
                    <Link :href="route('welcome')" class="text-sm text-gray-700 hover:text-gray-900">Home</Link>
                    <Link :href="route('terms.service')" class="text-sm text-gray-700 hover:text-gray-900">Terms of Service</Link>
                    <Link :href="route('privacy.policy')" class="text-sm text-gray-700 hover:text-gray-900">Privacy Policy</Link>
                </nav>
            </div>
        </footer>
    </div>
</template>