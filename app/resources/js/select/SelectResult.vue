<template>
  <div class="done">
    <div class="done-title">Thank You！</div>
    <div class="done-title-sub">動画の登録が完了しました</div>
    <div class="ruselt-youtube">
      <div class="ruselt-youtube-title">{{name}}</div>
      <div class="ruselt-youtube-text pa-2">{{title}}</div>
      <youtube :video-id="url" class="ruselt-youtube-content"/>
    </div>
    <div class="done-btn">
      <SearchBtn  class="mb-10"/>
      <v-btn
        rounded
        large
        dark
        color="#7A80FF"
        width="250"
        height="60"
        class="mb-10"
        @click="refresh"
      >
        <img src='/img/btn/plus.png' class="entry-btn"/>
        <span class="entry-btn-text">動画を登録する</span>
      </v-btn>
      <RankingBtn  class="mb-10"/>
    </div>
  </div>
</template>

<script>
import SearchBtn from '../btn/SearchBtn.vue'
import EntryBtn from '../btn/EntryBtn.vue'
import RankingBtn from '../btn/RankingBtn.vue'

export default {
  components: { 
    SearchBtn,
    EntryBtn,
    RankingBtn
  },
  props: [    
    "url",
    "name",
    "title"
  ],
  methods:{
    refresh: function(){
      this.$router.go({path: this.$router.currentRoute.path, force: true})
  　},
  },
}
</script>

<style lang="scss">
.done {
  text-align: center;
  margin: 50px 0 0;

  &-title {
    font-size: 24px;
    font-weight: bold;
    color: #F66868;
    margin: 0 0 10px;
    
    &-sub {
      font-size: 16px;
      font-weight: bold;
      color: #F66868;
    }
  }

  &-btn {
    margin: 30px 0　0;
    padding: 50px 0 100px;
    background-color: #FFFBF2;
  }

}

</style>