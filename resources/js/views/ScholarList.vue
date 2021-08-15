<template>
  <div class="w-full h-full px-20 py-8">
    <table class="w-full">
      <thead>
      <tr class="border-t border-b bg-gray-100">
        <th class="text-left px-2 py-1">Name</th>
        <th class="text-left px-2 py-1">Address</th>
        <th class="text-left px-2 py-1">Share</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="scholar in scholars" :key="scholar.id" class="border-t border-b hover:bg-gray-50">
        <td class="px-2 py-1">{{ scholar.name }}</td>
        <td class="px-2 py-1">
          <router-link :to="`/scholar/${scholar.address}`" class="text-blue-600 hover:underline">{{ scholar.address }}</router-link>
        </td>
        <td class="px-2 py-1">{{ `${scholar.share}%` }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    name: "ScholarList",
    data() {
      return {
        scholars: [],
      }
    },
    created() {
      this.loadScholars();
    },
    methods: {
      loadScholars() {
        axios.get('/api/scholars')
        .then(response => this.scholars = response.data.data)
        .catch(error => this.scholars = []);
      },
    },
  }
</script>
