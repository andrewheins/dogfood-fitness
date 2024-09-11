<template>
  <div class="container mx-auto p-8">
    <h1 class="text-2xl font-bold mb-4">Register for Dogfood Fitness</h1>
    <form @submit.prevent="submitForm">
      <!-- Name Field -->
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" v-model="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
      </div>

      <!-- Email Field -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" v-model="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
      </div>

      <!-- Password Field -->
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" v-model="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
      </div>

      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Sign Up</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',  // Add name field to the data
      email: '',
      password: '',
    };
  },
  methods: {
    async submitForm() {
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      const response = await fetch('/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
          name: this.name,  // Ensure the name is included in the request
          email: this.email,
          password: this.password,
        }),
      });

      if (response.ok) {
        alert('Registration successful!');
        window.location.href = '/';  // Redirect to homepage
      } else {
        alert('There was an error during registration.');
      }
    },
  },
};
</script>
