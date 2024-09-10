import { createApp } from 'vue/dist/vue.esm-bundler';
import TermsOfService from './components/TermsOfService.vue';

// Create a Vue app instance
const app = createApp({});

// Register the TermsOfService component globally
app.component('terms-of-service', TermsOfService);

// Mount the Vue app to the #app element
app.mount('#app');
