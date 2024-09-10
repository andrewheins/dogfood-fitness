<template>
  <footer class="bg-gray-800 text-white p-4 mt-8">
    <nav class="container mx-auto flex justify-between items-center">
      <!-- Left side: Footer navigation links -->
      <div class="flex space-x-4">
        <a href="/" class="hover:text-gray-400">Home</a>
        <a href="/privacy-policy" class="hover:text-gray-400">Privacy Policy</a>
        <a href="/terms-of-service" class="hover:text-gray-400">Terms of Service</a>
      </div>

      <!-- Right side: Copyright or any additional information -->
      <div class="text-sm">
        © {{ new Date().getFullYear() }} Dogfood Fitness
      </div>
    </nav>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
};
</script>
