import { createApp } from 'vue/dist/vue.esm-bundler';
import { createRouter, createWebHistory } from 'vue-router';
import NotFound from './components/NotFound.vue';
import Home from './components/Home.vue';
import Header from './components/Header.vue';  // Import the Header component
import Footer from './components/Footer.vue';  // Import the Footer component

// Helper function to convert route names with hyphens to PascalCase
const toPascalCase = (str) => {
    return str
        .split('-')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join('');
};

// Function to dynamically import Vue components based on the PascalCase route
const loadComponent = async (name) => {
    try {
        const componentName = toPascalCase(name);  // Convert the route to PascalCase
        return await import(`./components/${componentName}.vue`);
    } catch (error) {
        console.error(`Component ${name}.vue not found. Loading NotFound component.`);
        return NotFound;  // Return NotFound component if the dynamic import fails
    }
};

// Define routes for Vue Router
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,  // Directly use the Home component for the root path
    },
    {
        path: '/:page',
        name: 'page',
        component: (route) => loadComponent(route.params.page),  // Pass route param to dynamic loader
    },
    {
        path: '/:catchAll(.*)',
        name: 'not-found',
        component: NotFound,  // Use the NotFound component for undefined routes
    }
];

// Create Vue Router instance
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Create Vue app instance
const app = createApp({});

// Register Header and Footer components globally
app.component('header-component', Header);
app.component('footer-component', Footer);

// Use router in the app
app.use(router);

// Mount the Vue app to the DOM
app.mount('#app');
