<template>
  <v-btn
    color="#1DA1F2"
    class="twitter-btn"
    large
    @click="tweet"
  >
    <v-icon color="#FFF" class="px-3">mdi-twitter</v-icon>
    <span class="twitter-btn-text">ツイートして結果を共有</span>
  </v-btn>
</template>

<script>
export default {
  methods: {
    tweet () {
      axios.get('/resultTweet').then(
        (res)=>{
          
        }
      );
    }
  }
}
</script>

<style lang="scss">
.twitter-btn {

  &-text {
    color: #FFF;
    font-size: 16px;
    font-weight: bold;
  }
}
</style>