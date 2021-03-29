<template>
  <div class="ranking-body">
    <AppHeader />
      <div class="ranking">
        <v-img src='/img/ranking/ranking-title.svg' class="ranking-title" />
      </div>
      <div class="ruselt-youtube ranking-rank" v-for="(youtubeItem, index) in youtubeItems" :key="index">
        <v-card 
          color="#FFADAD"
          dark
          disabled
          flat
          width="150"
          class="pa-2 ranking-rank-num"
        >
          {{youtubeItem.num}}位
          <v-icon class="pr-1 pl-5">mdi-thumb-up-outline</v-icon>{{youtubeItem.count}}
        </v-card>
        <div class="ruselt-youtube-title">{{youtubeItem.youtuber}}</div>
        <div class="ranking-text pa-2">{{youtubeItem.title}}</div>
        <youtube :video-id="youtubeItem.url" class="ruselt-youtube-content"/>
        <div class="ranking-genre">
          <v-btn
            class="mt-2 mr-1"
            rounded
            depressed
            x-small
            color="#B8ADFF"
            v-for="(genre, index) in youtubeItem.genre" :key="index"
          >
            <span class="ruselt-youtube-genre-text">#{{genre}}</span>
          </v-btn>
        </div>
      </div>
      <div class="ranking-btn">
        <div>
          <SearchBtn  class="mb-10"/>
        </div>
        <div>
          <EntryBtn  class="mb-10"/>
        </div>
      </div>
    <AppFooter />
  </div>
</template>

<script>
import AppHeader from '../common/AppHeader.vue'
import AppFooter from '../common/AppFooter.vue'
import SearchBtn from '../btn/SearchBtn.vue'
import EntryBtn from '../btn/EntryBtn.vue'
import VueYoutube from 'vue-youtube'

export default {
  components: { 
    AppHeader,
    AppFooter,
    SearchBtn,
    EntryBtn,
  },
  data () {
    return {
      youtubeItems: [
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 1, flg: false},
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 2, flg: false },
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 3, flg: false },
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 4, flg: false },
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 5, flg: false },
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 6, flg: false },
      ]
    }
  },
  created () { 
    // 初期化
    for (let num = 0; num < Object.keys(this.youtubeItems).length; num++){
      this.youtubeItems[num].youtuber = '';
      this.youtubeItems[num].title = '';
      this.youtubeItems[num].url = '';
      this.youtubeItems[num].genre = [];
      this.youtubeItems[num].count = 0;
      this.youtubeItems[num].flg = false;
    }


    let urlObj = [];
    axios.get('/selectRankingAssessment').then(
      (resAssessment)=>{
        for (let count = 0; count < Object.keys(resAssessment).length; count++) {
          this.youtubeItems[count].url = resAssessment.data[count].url
          this.youtubeItems[count].count = resAssessment.data[count].nice
          urlObj.push(resAssessment.data[count].url);
        }
        axios.get('/selectResultYoutuber', {params:{youtubeUrl:urlObj}}).then(
          (resYoutuber)=>{
            for (let count = 0; count < Object.keys(resYoutuber).length; count++) {
              this.youtubeItems[count].youtuber = resYoutuber.data[count].youtuber
              this.youtubeItems[count].title = resYoutuber.data[count].title
            }
          }
        )
        axios.get('/selectRankingGenre', {params:urlObj}).then(
          (resGenre)=>{
            for (let count = 0; count < Object.keys(resGenre).length; count++) {
              this.youtubeItems[count].genre = this.genreConvert(resGenre.data[count]);
            }
          }
        )
      }
    )
  },
  methods: {
    genreConvert(genre, genreJa = []) {
      // 論理名のObjct作る
      let tmpObj = [];
      Object.keys(genre).forEach(function (key) {
        if (genre[key] == 1) {
          tmpObj.push(key);
        }
      });
      tmpObj.forEach(element => {
        if (element == 'adult') { genreJa.push('下ネタ') }
        else if (element == 'cool') { genreJa.push('かっこいい') }
        else if (element == 'crazy') { genreJa.push('クレイジー') }
        else if (element == 'cute') { genreJa.push('かわいい') }
        else if (element == 'everyday') { genreJa.push('日常') }
        else if (element == 'love') { genreJa.push('恋愛') }
        else if (element == 'mysterious') { genreJa.push('不思議な') }
        else if (element == 'scared') { genreJa.push('こわい') }
        else if (element == 'study') { genreJa.push('ためになる') }
        else if (element == 'surprise') { genreJa.push('どっきり') }
        else if (element == 'unwind') { genreJa.push('ほっこり') }
        else if (element == 'youth') { genreJa.push('青春') }
      });
      return genreJa
    },
  }
}

</script>

<style lang="scss">
.ranking {

  &-body {
    margin: 0 0 150px;
    background: #FFF;
  }

  &-title {
    margin: 90px auto 0;
    width: 300px;
  }

  &-rank {
    font-size: 18px;
    font-weight: bold;
    background: #FFF6F6;

    &-num {
      margin: auto;
    }
  }

  &-text {
    font-weight: 100;
    font-size: 14px;
  }

  &-genre {
    text-align: left;
  }

  &-btn {
    margin: 50px 0 0;
    text-align: center;
  }
}
</style>