<template>
  <header class="bg-gray-800 text-white p-4">
    <nav class="container mx-auto flex justify-between items-center">
      <!-- Left side: Link to the homepage -->
      <div>
        <a href="/" class="text-lg font-bold hover:text-gray-400">Dogfood Fitness</a>
      </div>

      <!-- Right side: Log in and Sign Up buttons -->
      <div class="flex space-x-4">
        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Log in</a>
        <a href="/sign-up" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Sign Up</a> <!-- New Sign Up button -->
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'Header',
};
</script>
