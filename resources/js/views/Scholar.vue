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
            <span>{{ scholar.stats?.in_game_slp }}</span>
            <span class="text-sm">{{ `($${currentSLPTotalPrice})` }}</span>
          </div>
          <div class="flex items-center space-x-1">
            <img src="https://assets.coingecko.com/coins/images/10366/small/SLP.png?1578640057" class="w-4 h-4">
            <span class="text-sm w-14">(claimed)</span>
            <span>:</span>
            <span>{{ scholar.stats?.ronin_slp }}</span>
            <span class="text-sm">{{ `($${claimedSLPTotalPrice})` }}</span>
          </div>
          <div class="flex items-center space-x-1">
            <img src="https://assets.coingecko.com/coins/images/10366/small/SLP.png?1578640057" class="w-4 h-4">
            <span class="text-sm w-14">(overall)</span>
            <span>:</span>
            <span>{{ scholar.stats?.in_game_slp + scholar.stats?.ronin_slp + scholar.stats?.last_claim_amount }}</span>
          </div>
        </div>
        <div class="w-1/2 flex items-end flex-col">
          <p>{{ `${scholar.stats?.mmr} MMR` }}</p>
          <span class="text-xs font-bold uppercase mt-2">next claim availability</span>
          <span class="text-sm">{{ getNextClaimDate(scholar.stats?.last_claim_timestamp) }}</span>
        </div>
      </div>
    </div>
    <div class="flex-grow flex flex-col lg:flex-row lg:flex-wrap">
      <div v-for="axie in scholar.axies" class="lg:w-1/3 lg:flex lg:flex-col lg:items-center lg:space-x-12">
        <div class="flex-shrink-0 flex justify-center w-56">
          <img :src="axie.image">
        </div>
        <div class="flex justify-center flex-wrap">
          <div v-for="part in axie.parts" class="w-24 lg:w-48 flex flex-wrap relative">
            <img :src="`https://storage.googleapis.com/axie-cdn/game/cards/base/${part.card.code}.png`">
            <span class="w-28 absolute top-4 left-12 text-white text-sm text-center font-changa-one">{{ part.card.skill }}</span>

            <span class="absolute top-2 left-4 text-3xl text-white font-changa-one shadow-lg">{{ part.card.energy }}</span>

            <img :src="`/images/bg-${part.class}.png`" class="w-12 absolute top-12 -left-5">
            <img src="/images/icon-atk.png" class="w-8 absolute top-14 -left-3">
            <span class="w-12 absolute top-14 -left-5 text-white text-center text-2xl font-changa-one shadow-lg">{{ part.card.attack }}</span>

            <img :src="`/images/bg-${part.class}.png`" class="w-12 absolute top-24 -left-5">
            <img src="/images/icon-def.png" class="w-8 absolute top-26 -left-3">
            <span class="w-12 absolute top-26 -left-5 text-white text-center text-2xl font-changa-one shadow-lg">{{ part.card.defense }}</span>

            <img :src="`https://storage.googleapis.com/axie-cdn/game/cards/effect-icons/${part.card.icon}.png`" class="w-4 absolute top-50 left-2.5">
            <span class="absolute w-36 top-45 left-9 text-xs text-white font-montserrat">{{ part.card.description }}</span>
          </div>
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
      await axios.get(`/api/scholars/${this.$route.params.address}`)
      .then(response => this.scholar = response.data)
      .catch(error => this.scholar = null);

      await axios.get(`/api/token_price/SLPUSDT`)
        .then(response => this.slp_price = response.data);
    },
    methods: {
      getNextClaimDate(last_claim_timestamp) {
        const last_claim_date = new Date(last_claim_timestamp * 1000);
        last_claim_date.setDate(last_claim_date.getDate() + 14);
        const next_claim_date = new Date(last_claim_date.getTime() + 8 * 3600 * 1000).toUTCString().replace( / GMT$/, "" );
        return next_claim_date;
      }
    },
    computed: {
      currentSLPTotalPrice() {
        const total = (this.scholar.stats?.in_game_slp * this.$store.getters['getSLPPrice']).toString();
        return total.substring(0, total.indexOf('.') + 3);
      },
      claimedSLPTotalPrice() {
        const total = (this.scholar.stats?.ronin_slp * this.$store.getters['getSLPPrice']).toString();
        return total.substring(0, total.indexOf('.') + 3);
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
