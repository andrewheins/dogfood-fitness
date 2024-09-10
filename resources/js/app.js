import { createApp } from 'vue/dist/vue.esm-bundler';
import { createRouter, createWebHistory } from 'vue-router';
import NotFound from './components/NotFound.vue';  // Import NotFound component directly

// Helper function to convert route names with hyphens to PascalCase
const toPascalCase = (str) => {
    return str
        .split('-')  // Split the string by hyphens
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))  // Capitalize each word
        .join('');  // Join the words back together without hyphens
};

// Function to dynamically import Vue components based on the PascalCase route
const loadComponent = async (name) => {
    try {
        const componentName = toPascalCase(name);  // Convert the route name (with hyphens) to PascalCase
        return await import(`./components/${componentName}.vue`);  // Dynamically import the PascalCase component
    } catch (error) {
        console.error(`Component ${name}.vue not found. Loading NotFound component.`);
        return NotFound;  // Return the NotFound component if dynamic import fails
    }
};

// Define routes for Vue Router
const routes = [
    {
        path: '/:page',  // Dynamic route matching for single-level routes
        name: 'page',
        component: async () => {
            const componentName = window.routePath;  // Get the original path without removing hyphens
            return await loadComponent(componentName);  // Load the PascalCase component
        },
    },
    {
        path: '/:catchAll(.*)',  // Catch-all route for undefined paths
        name: 'not-found',
        component: NotFound,  // Use NotFound component for invalid paths
    }
];

// Create Vue Router instance
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Create and mount the Vue app
const app = createApp({});
app.use(router);
app.mount('#app');
