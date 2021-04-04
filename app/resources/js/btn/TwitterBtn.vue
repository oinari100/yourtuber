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
  data () {
    return {
      youtubeItems: [
        { youtuber:'', title:''},
        { youtuber:'', title:''},
        { youtuber:'', title:''},
      ]
    }
  },
  created () { 
    const getData1 = this.$store.getters['getData1']
    const getData2 = this.$store.getters['getData2']
    const getData3 = this.$store.getters['getData3']
    this.youtubeItems[0].youtuber = getData1.name;
    this.youtubeItems[0].title = getData1.title;
    this.youtubeItems[1].youtuber = getData2.name;
    this.youtubeItems[1].title = getData2.title;
    this.youtubeItems[2].youtuber = getData3.name;
    this.youtubeItems[2].title = getData3.title;
  },
  methods: {
    tweet () {
      javascript:location.href="twitter://post?message="+"あなたにオススメの動画は…"+"%0D%0A"+"%0D%0A"+
        "・"+this.youtubeItems[0].youtuber+"「"+this.youtubeItems[0].title+"」"+"%0D%0A"+
        "・"+this.youtubeItems[1].youtuber+"「"+this.youtubeItems[1].title+"」"+"%0D%0A"+
        "・"+this.youtubeItems[2].youtuber+"「"+this.youtubeItems[2].title+"」"+"%0D%0A"+"%0D%0A"+
        encodeURIComponent(document.title)+"%0D%0A"+encodeURIComponent(location.href);
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