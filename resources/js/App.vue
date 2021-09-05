<template>
  <div class="w-full h-full flex flex-col overflow-y-auto">
    <div class="flex-shrink-0 h-20 flex justify-between items-center px-4 lg:px-40">
      <p class="text-2xl">Zeal Academy</p>
      <p class="flex flex-col items-center">
        <span class="flex space-x-1 items-center">
          <img src="https://assets.coingecko.com/coins/images/10366/small/SLP.png?1578640057" class="w-4 h-4">
          <span>{{ `$${slpPrice.toString().substring(0, slpPrice.toString().indexOf('.') + 5)}` }}</span>
        </span>
        <span class="text-xs hidden lg:block">Auto-syncs every 5 minutes.</span>
      </p>
      <div class="flex items-center space-x-4">
        <router-link to="/scholars">
          <img src="/images/scholar-ico.png" class="w-6 h-6 lg:hidden">
          <span class="hidden lg:block">Scholars</span>
        </router-link>
      </div>
    </div>
    <div class="flex-grow px-4 lg:px-40 py-4 lg:py-8">
      <router-view :key="$route.fullPath"></router-view>
    </div>
  </div>
</template>

<script>
  export default {
    name: "App",
    data() {
      return {
        timer: 60 * 5,
      }
    },
    created() {
      this.checkSLPPrice();

      setInterval(function () {
        this.checkSLPPrice();
      }.bind(this), 1000 * 60 * 5);
    },
    methods: {
      checkSLPPrice() {
        axios.get('/api/token_price/SLPUSDT')
          .then(response => this.$store.dispatch('setSLPPrice', response.data));
      },
    },
    computed: {
      slpPrice() {
        return this.$store.getters['getSLPPrice'];
      },
    },
  }
</script>
