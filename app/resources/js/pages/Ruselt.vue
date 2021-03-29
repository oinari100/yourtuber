<template>
  <div class="ruselt-body">
    <AppHeader />
      <div class="ruselt">
        <div class="ruselt-title">
          あなたへのおすすめは•••
        </div>
        <div class="ruselt-content">
          <v-card
            max-width="320"
            class="ruselt-square"
          >
            <div v-for="(youtubeItem, index) in youtubeItems" :key="index">
              <div class="ruselt-square-youtuber">{{youtubeItem.num}}．{{youtubeItem.youtuber}}</div>
              <div class="ruselt-square-title pt-1 pb-3">{{youtubeItem.title}}</div>
            </div>
          </v-card>
          <img src='/img/btn/search.png' class="ruselt-img"/>
        </div>
        <TwitterBtn class="my-8"/>
      </div>
      <div class="ruselt-youtube" v-for="(youtubeItem, index) in youtubeItems" :key="index">
        <div class="ruselt-youtube-title">{{youtubeItem.num}}．{{youtubeItem.youtuber}}</div>
        <div class="ruselt-youtube-text pa-2">{{youtubeItem.title}}</div>
        <youtube :video-id="youtubeItem.url" class="ruselt-youtube-content"/>
        <div class="ruselt-youtube-genre mx-2">
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
        <div class="ma-5">
          <v-btn
            :color="youtubeItem.flg === true ? '#00EE5F' : '#FFFBF2'"
            @click.once="youtubeItem.flg = countUp(youtubeItem.url, youtubeItem.flg, index)"
            :class="youtubeItem.flg === true ? 'white--text' : 'black--text'"
          >
            <v-icon class="pr-1" :color="youtubeItem.flg === true ? '#FFF' : '#000'">mdi-thumb-up-outline</v-icon>
            <span class="ruselt-youtube-content-text" v-bind:style="{color: myColor}">{{youtubeItem.count}}</span>
          </v-btn>
        </div>
      </div>
      <div class="ruselt-btn">
        <div>
          <TwitterBtn class="mb-10"/>
        </div>
        <div>
          <SearchBtn  class="mb-10"/>
        </div>
        <div>
          <EntryBtn  class="mb-10"/>
        </div>
        <div>
          <RankingBtn  class="mb-10"/>
        </div>
      </div>
    <AppFooter />
    <v-dialog v-model="ErrorDialog" width="300" persistent>
      <v-card justify="center">
        <v-row>
          <v-col md="12" align="center">
          <div class="pt-10 pb-3">
            <v-icon size="36" color="red">mdi-alert-circle</v-icon>
          </div>
          <div class="pb-10">
            結果がありません
          </div>
          <div class="pb-10">
            <v-btn
              large
              rounded
              dark
              color="#FF7E7E"
              width="250"
              height="60"
              to="search"
            >
              <v-icon size="36" color="white">mdi-restore</v-icon>
              <span class="search-btn-text">動画を探す</span>
            </v-btn>
          </div>
          </v-col>
        </v-row>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import AppHeader from '../common/AppHeader.vue'
import AppFooter from '../common/AppFooter.vue'
import TwitterBtn from '../btn/TwitterBtn.vue'
import SearchBtn from '../btn/SearchBtn.vue'
import EntryBtn from '../btn/EntryBtn.vue'
import RankingBtn from '../btn/RankingBtn.vue'
import VueYoutube from 'vue-youtube'

export default {
  components: { 
    AppHeader,
    AppFooter,
    TwitterBtn,
    SearchBtn,
    EntryBtn,
    RankingBtn
  },
  data () {
    return {
      youtubeItems: [
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 1, flg: false},
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 2, flg: false },
        { youtuber:'', title:'', url: '', genre:[], count: 0, num: 3, flg: false },
      ],
      ErrorDialog: false,
    }
  },
  created () { 
    const getData1 = this.$store.getters['getData1']
    this.youtubeItems[0].youtuber = getData1.name;
    this.youtubeItems[0].title = getData1.title;
    this.youtubeItems[0].url = getData1.url;
    this.youtubeItems[0].count = getData1.count;
    this.youtubeItems[0].genre = this.genreConvert(getData1.genre);

    const getData2 = this.$store.getters['getData2']
    this.youtubeItems[1].youtuber = getData2.name;
    this.youtubeItems[1].title = getData2.title;
    this.youtubeItems[1].url = getData2.url;
    this.youtubeItems[1].count = getData2.count;
    this.youtubeItems[1].genre = this.genreConvert(getData2.genre);

    const getData3 = this.$store.getters['getData3']
    this.youtubeItems[2].youtuber = getData3.name;
    this.youtubeItems[2].title = getData3.title;
    this.youtubeItems[2].url = getData3.url;
    this.youtubeItems[2].count = getData3.count;
    this.youtubeItems[2].genre = this.genreConvert(getData3.genre);

    if (!this.youtubeItems[0].youtuber | !this.youtubeItems[1].youtuber | !this.youtubeItems[2].youtuber) {
      this.ErrorDialog = true;
    }

  },
  methods: {
    genreConvert(genre, genreJa = []) {
      genre.forEach(element => {
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
    countUp(url, flg, index) {
      //いいね数UP
      this.youtubeItems[index].count++;
      axios.get('/updateCount', {params:this.youtubeItems[index]}).then(
        (res)=>{

        }
      )
      return !flg
    }
  }
}

</script>

<style lang="scss">
.ruselt {
  padding: 50px 0 20px;
  text-align: center;
  background-color: #FFADAD;

  &-title {
    padding: 20px;
    color: #FFF;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
  }

  &-square {
    margin: auto;
    padding: 14px;
      
      &-youtuber {
        text-align: left;
        font-size: 18px;
        font-weight: bold;
      }

      &-title {
        text-align: left;
        margin: 0 0 15px 15px;
      }
  }

  &-img {
    margin: 10px auto;
    width: 50px;
  }

  &-body {
    background-color: #FFF6F6;
    padding: 50px 0 30px;
  }

  &-youtube {
    text-align: center;
    margin: 40px auto 0;
    padding: 20px 10px 10px;
    border-radius: 20px;
    background-color: #FFF;
    width: 340px;

    &-content {
      margin: 0 auto;
      width: 300px;
      height: auto;

      &-text {
        font-size: 16px;
      }
    }

    &-genre {
      text-align: left;

      &-text {
        color: #FFF;
        margin: auto;
        font-weight: bold;
      }
    }

    &-title {
      font-size: 18px;
      font-weight: bold;
    }
  }

  &-btn {
    text-align: center;
    padding: 80px 0 100px;
    background-color: #FFF6F6;
  }
}

</style>