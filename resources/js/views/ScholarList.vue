<template>
  <div class="w-full h-full flex flex-col px-4 lg:px-20 py-4 lg:py-8">
    <div class="flex flex-col lg:flex-row lg:space-x-8 space-y-4 lg:space-y-0 pb-4">
      <div class="flex-grow flex items-center bg-primary-base border px-4 py-2 rounded">
        <h5 class="text-white font-bold uppercase w-1/2">Manager Share</h5>
        <span class="w-1/2 flex flex-col items-end">
          <span class="text-white">{{(total_slp * 0.4).toLocaleString() }}</span>
          <span class="text-white">{{ `$${slpTotalPrice(total_slp * 0.4).toLocaleString()}` }}</span>
        </span>
      </div>
      <div class="flex-grow flex items-center bg-primary-base border px-4 py-2 rounded">
        <h5 class="text-white font-bold uppercase w-1/2">Scholar Share</h5>
        <span class="w-1/2 flex flex-col items-end">
          <span class="text-white">{{(total_slp * 0.6).toLocaleString() }}</span>
          <span class="text-white">{{ `$${slpTotalPrice(total_slp * 0.6).toLocaleString()}` }}</span>
        </span>
      </div>
      <div class="flex-grow flex items-center bg-primary-base border px-4 py-2 rounded">
        <h5 class="text-white font-bold uppercase w-1/2">Total</h5>
        <span class="w-1/2 flex flex-col items-end">
          <span class="text-white">{{ total_slp.toLocaleString() }}</span>
          <span class="text-white">{{ `$${slpTotalPrice(total_slp).toLocaleString()}` }}</span>
        </span>
      </div>
    </div>

<!--    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center my-4 lg:mt-0">-->
<!--      <form class="order-2 my-2 lg:my-0 lg:order-1">-->
<!--        <form-input type="search" class="px-2 py-2" placeholder="Find scholar..."></form-input>-->
<!--      </form>-->

<!--      <div class="order-1 my-2 lg:my-0 lg:order-2">-->
<!--        <button-primary class="px-4 py-2">New Scholar</button-primary>-->
<!--      </div>-->
<!--    </div>-->

    <div class="overflow-x-auto">
      <table v-if="scholars.length > 0" class="w-full table-fixed">
        <thead>
        <tr class="border-t border-b bg-gray-100">
          <th class="w-72 text-left px-2 py-1">Name</th>
          <th class="w-24 text-center px-2 py-1">Daily SLP</th>
          <th class="w-24 text-center px-2 py-1">Current SLP</th>
          <th class="w-24 text-center px-2 py-1">MMR</th>
          <th class="w-24 text-center px-2 py-1">Relationship</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="scholar in scholars" :key="scholar.id" class="border-t border-b hover:bg-gray-50">
          <td class="px-2 py-1">
            <router-link :to="`/scholar/${scholar.id}`" class="text-blue-600 hover:underline">{{ scholar.name }}</router-link>
          </td>
          <td class="text-center px-2 py-1">
            <span class="block">{{ dailySLP(scholar.in_game_slp, daysPassed(scholar.last_claim_date)) }}</span>
            <span class="text-gray-500 text-sm">{{ `$${slpTotalPrice(dailySLP(scholar.in_game_slp, daysPassed(scholar.last_claim_date)))}` }}</span>
          </td>
          <td class="text-center px-2 py-1">
            <span class="block">{{ scholar.in_game_slp.toLocaleString() }}</span>
            <span class="text-gray-500 text-sm">{{ `$${slpTotalPrice(scholar.in_game_slp)}` }}</span>
          </td>
          <td class="text-center px-2 py-1">
            <span class="block">{{ scholar.mmr.toLocaleString() }}</span>
<!--            <span class="text-gray-500 text-sm">{{ scholar.rank.toLocaleString() }}</span>-->
          </td>
          <td class="text-center px-2 py-1">{{ `${scholar.relationship}` }}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  import ButtonPrimary from "../components/common/buttons/ButtonPrimary";
  import FormInput from "../components/common/forms/FormInput";
  export default {
    name: "ScholarList",
    components: {FormInput, ButtonPrimary},
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
        .then(response => {
          this.scholars = response.data.data
        })
        .catch(error => this.scholars = []);
      },
      daysPassed(from) {
        return Math.floor((new Date() - new Date(from.substr(0, 10))) / (1000 * 60 * 60 * 24));
      },
      dailySLP(slp, days) {
        return Math.floor(slp / days);
      },
      slpTotalPrice(slp) {
        const total = (slp * this.$store.getters['getSLPPrice']).toString();
        return total.substring(0, total.indexOf('.') + 3) / 1;
      },
    },
    computed: {
      total_slp() {
        return this.scholars.reduce((a, b) => a + (b['in_game_slp'] || 0), 0);
      },
    },
  }
</script>
