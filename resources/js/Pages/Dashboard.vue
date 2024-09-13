<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

defineProps({
    fitbitConnected: Boolean,
});

const disconnectForm = useForm({});

const disconnectFitbit = () => {
    disconnectForm.post(route('fitbit.disconnect'));
};
</script>

<template>
        <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        You're logged in as {{ $page.props.auth.user.name }}!
                    </div>
                </div>

                <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4">Integrations</h3>
                        <div v-if="fitbitConnected">
                            <p>Your FitBit account is connected.</p>
                            <form @submit.prevent="disconnectFitbit">
                                <button type="submit" class="mt-2 bg-red-500 text-white px-4 py-2 rounded">Disconnect FitBit</button>
                            </form>
                        </div>
                        <div v-else>
                            <a :href="route('fitbit.redirect')" class="bg-blue-500 text-white px-4 py-2 rounded">Connect FitBit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
