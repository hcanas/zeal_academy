<template>
  <div v-if="scholar" class="w-full h-full flex flex-col">
    <div class="flex-shrink-0 flex flex-col pb-2 border-b">
      <p class="text-2xl">{{ scholar.name }}</p>
      <div class="flex">
        <div class="w-1/2 flex flex-col">
          <div class="flex items-center space-x-1">
            <img src="https://assets.coingecko.com/coins/images/10366/small/SLP.png?1578640057" class="w-4 h-4">
            <span class="text-sm w-14">(in bag)</span>
            <span>:</span>
            <span>{{ scholar.latest_earning.in_game_slp.toLocaleString() }}</span>
            <span class="text-sm">{{ `($${currentSLPPrice.toLocaleString()})` }}</span>
          </div>
          <div class="flex items-center space-x-1">
            <img src="https://assets.coingecko.com/coins/images/10366/small/SLP.png?1578640057" class="w-4 h-4">
            <span class="text-sm w-14">(claimed)</span>
            <span>:</span>
            <span>{{ scholar.latest_earning.ronin_slp.toLocaleString() }}</span>
            <span class="text-sm">{{ `($${claimedSLPPrice.toLocaleString()})` }}</span>
          </div>
          <div class="flex items-center space-x-1">
            <img src="https://assets.coingecko.com/coins/images/10366/small/SLP.png?1578640057" class="w-4 h-4">
            <span class="text-sm w-14">(overall)</span>
            <span>:</span>
            <span>{{ totalSLP.toLocaleString() }}</span>
          </div>
        </div>
        <div class="w-1/2 flex items-end flex-col">
          <p>{{ `${scholar.latest_earning.mmr.toLocaleString()} MMR` }}</p>
          <span class="text-xs font-bold uppercase mt-2">next claim availability</span>
          <span class="text-sm">{{ scholar.latest_earning.next_claim_date }}</span>
        </div>
      </div>
    </div>
    <div class="flex-grow flex flex-col items-center lg:flex-row lg:flex-wrap">
      <div v-for="axie in scholar.axies" class="lg:w-1/3 flex flex-col items-center">
        <div class="flex-shrink-0 flex justify-center w-2/3">
          <img :src="axie.image">
        </div>
        <div class="flex justify-center flex-wrap">
          <img v-for="part in axie.parts" :src="`/images/${part.card.skill}.png`" class="w-1/2 p-1">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Scholar",
    data() {
      return {
        scholar: null,
      }
    },
    async created() {
      await axios.get(`/api/scholars/${this.$route.params.id}`)
      .then(response => this.scholar = response.data)
      .catch(error => this.scholar = null);

      await axios.get(`/api/token_price/SLPUSDT`)
        .then(response => this.slp_price = response.data);
    },
    computed: {
      currentSLPPrice() {
        const total = (this.scholar.latest_earning.in_game_slp * this.$store.getters['getSLPPrice']).toString();
        return total.substring(0, total.indexOf('.') + 3) / 1;
      },
      claimedSLPPrice() {
        const total = (this.scholar.latest_earning.ronin_slp * this.$store.getters['getSLPPrice']).toString();
        return total.substring(0, total.indexOf('.') + 3) / 1;
      },
      totalSLP() {
        return (this.scholar.latest_earning.in_game_slp ?? 0)
          + (this.scholar.latest_earning.ronin_slp ?? 0)
          + (this.scholar.latest_earning.last_claimed_amount ?? 0);
      },
    },
  }
</script>

<style scoped>
  .top-26 {
    top: 6.5rem;
  }

  .top-45 {
    top: 11.25rem;
  }

  .top-50 {
    top: 12.5rem;
  }
</style>
