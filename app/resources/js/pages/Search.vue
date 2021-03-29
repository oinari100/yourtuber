<template>
  <div id="tinder">
    <AppHeader />
    <div class="tinder-text">
      <v-img src='/img/question.svg' />
      <div class="tinder-text-content">おすすめ動画まであと<span class="tinder-text-count">{{this.queueCount}}</span>枚</div>
    </div>
    <Tinder ref="tinder" key-name="id" :queue.sync="queue" :offset-y="10" @submit="onSubmit" superThreshold="999">
      <template slot-scope="scope">
        <div
          class="tinder-img"
          :style="{
            'background-image': `url(/img/search/${scope.data.img})`
          }"
        />
      </template>
      <img class="like-pointer" slot="like" src="/img/swipe/like_swipe.png">
      <img class="nope-pointer" slot="nope" src="/img/swipe/nope_swipe.png">
    </Tinder>
    <div class="btns">
      <img src="/img/swipe/nope.png" @click="decide('nope')">
      <img src="/img/swipe/like.png" @click="decide('like')">
    </div>
    <AppFooter />
    <vue-loading type="spin" color="#FFCC00" :size="{ width: '100px', height: '100px' }" class="loading" v-if="loading"></vue-loading> 
    <v-dialog v-model="lengthErrorDialog" width="300" persistent>
      <v-card justify="center">
        <v-row>
          <v-col md="12" align="center">
          <div class="pt-10 pb-3">
            <v-icon size="36" color="red">mdi-alert-circle</v-icon>
          </div>
          <div class="pb-10">
            興味のあるジャンルがありません
          </div>
          <div class="pb-10">
            <v-btn
              large
              rounded
              dark
              color="#FF7E7E"
              width="250"
              height="60"
              @click="again"
            >
              <v-icon size="36" color="white">mdi-restore</v-icon>
              <span class="search-btn-text">もう1度実行する</span>
            </v-btn>
          </div>
          </v-col>
        </v-row>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import AppHeader from '../common/AppHeader.vue';
import AppFooter from '../common/AppFooter.vue';
import Tinder from "vue-tinder";
import { VueLoading } from 'vue-loading-template'

export default {
  components: { 
    AppHeader,
    Tinder,
    AppFooter,
    VueLoading
  },
  data: () => ({
    queue: [],
    history: [],
    sqlOrigin: [],
    queueMax: 5,
    queueCount: 0,
    search: ['adult.svg','cool.svg','crazy.svg','cute.svg','everyday.svg','love.svg','mysterious.svg','scared.svg','study.svg','surprise.svg','unwind.svg','youth.svg'],
    loading: false,
    lengthErrorDialog: false,
  }),
  created() {
    // ランダム数字生成
    let randomNum = [...Array(12).keys()]
    let randomNumClone = randomNum.concat();
    let resultNum = [];
    let randomNumCount = randomNum.length;
    let num = Math.min(this.queueMax, randomNum.length);
    while(num-- > 0) {
        let random = Math.floor(Math.random() * randomNumCount);
        resultNum.push(randomNumClone[random]);
        randomNumClone[random] = randomNumClone[--randomNumCount];
    }
    // ランダムな質問ジャンルをセット
    let searchContent = [];
    resultNum.forEach(element => {
      searchContent.push(this.search[element]);
    });
    const search = searchContent;
    // DBカラムと合わせるため、拡張子削除
    for (let num = 0; num < this.queueMax; num++) {
      this.queue.push({ id: search[num].replace('.svg', ''), img: search[num]});
    }
    this.queueCount = this.queue.length;
    this.$store.dispatch('initialize');   
  },
  methods: {
    onSubmit(choice) {
      this.queueCount -= 1;
      this.history.push(choice);

      if (choice.type === 'like') {
        this.sqlOrigin.push(choice.key);
      }

      if (this.history.length === this.queueMax) {
        if (this.sqlOrigin.length === this.queueCount){
          this.lengthErrorDialog = true;
        } else {
          axios.get('/selectResultGenre', {params:{conditions:this.sqlOrigin}}).then(
            (res)=>{
              this.$store.dispatch('searchGenre', res.data);

              let youtubeUrl = [];
              youtubeUrl.push(this.$store.getters['getData1'].url)
              youtubeUrl.push(this.$store.getters['getData2'].url)
              youtubeUrl.push(this.$store.getters['getData3'].url)
              axios.get('/selectResultYoutuber', {params:{youtubeUrl:youtubeUrl}}).then(
                (res)=>{
                  this.$store.dispatch('searchData', res.data);
                }
              )
              axios.get('/selectResultAssessment', {params:{youtubeUrl:youtubeUrl}}).then(
                (res)=>{
                  this.$store.dispatch('searchCount', res.data);   
                }
              )
            }
          )
          setTimeout(this.loadingStart, 500);
          setTimeout(this.result, 2500);
        }
      }
    },
    loadingStart() {
      this.loading = true;
    },
    result() {
      this.$router.push('ruselt')
    },
    async decide(choice) {
      this.$refs.tinder.decide(choice);
    },
    again() {
      this.$router.go({path: this.$router.currentRoute.path, force: true})
    }
  }
};
</script>

<style lang="scss">
#tinder .vue-tinder {
  margin: 0 auto ;
  width: 300px;
  height: 300px;
  min-width: 300px;
  max-width: 300px;
}

.nope-pointer,
.like-pointer {
  position: absolute;
  z-index: 1;
  top: 0px;
  width: 100%;
  height: 100%;
}

.nope-pointer {
  right: 0px;
}

.like-pointer {
  left: 0px;
}

.tinder-img {
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
}

.btns {
  margin: 50px auto 140px;
  height: 65px;
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 300px;
  max-width: 300px;
}

.btns img {
  margin-right: 12px;
  box-shadow: 0 4px 9px rgba(0, 0, 0, 0.15);
  border-radius: 50%;
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
}

.btns img {
  width: 85px;
}

.question-title {
  text-align: center;
  background-color: #FFFBF2;
  margin: 100px 50px;
  padding: 20px 0;
  
}

.tinder-text {
  margin: 90px auto 0;
  width: 300px;

  &-content {
    text-align: center;
    position: relative;
    top: -60px;
    color: #FF7B7B;
    font-weight: bold;
  }

  &-count {
    font-size: 25px;
    padding: 0 8px;
    color: #FF5141;
    
  }
}

.mybox {
  width: 200px;
  margin: 80px auto 0;
  padding: 12px 10px;
  color: #fff;
  background:linear-gradient(#ff5555ff, #ffb380ff);
  text-align: center;
  box-shadow:
        2px 2px 5px rgba(18, 47, 61, 0.5),
        -2px -2px 5px rgba(248, 253, 255, 0.9),
        inset 2px 2px 5px transparent,
        inset -2px -2px 5px transparent;

  &-count {
    font-size: 1.5rem;
    font-weight: bold;
    padding: 0 5px;
  }

  &-text {
    text-align: center;
    margin: 30px 0 0;
    color: #333;
  }
}

.loading {
  position: absolute;
  bottom: 50%;
  left: 0;
  right: 0;
  margin: auto;
}
</style>
