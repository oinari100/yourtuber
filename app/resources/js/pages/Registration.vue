<template>
  <div>
    <AppHeader></AppHeader>

    <div class="header-blank"></div>

    <div class="registration"><v-img src=/img/registration-title.png class="registration-img"></v-img></div>
    <v-stepper v-model="e1">
      <v-stepper-header>
        <v-stepper-step
          :complete="e1 > 1"
          step="1"
          color="#FE7D7D"
        >
          <span class="select-text">動画情報入力</span>
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step
          :complete="e1 > 2"
          step="2"
          color="#FE7D7D"
        >
          <span class="select-text">ジャンル選択</span>
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step 
          step="3"
          color="#FE7D7D"
        >
          <span class="select-text">登録完了！</span>
        </v-stepper-step>
      </v-stepper-header>

      <v-stepper-items>
        <v-stepper-content step="1" class="pa-0 ma-0">

          <SelectVideo @videoData="nextChange"></SelectVideo>

        </v-stepper-content>

        <v-stepper-content step="2" class="selectQuestion pa-0 ma-0">
          
          <SelectGenre @genreData="nextResult"></SelectGenre>

        </v-stepper-content>

        <v-stepper-content step="3" class="pa-0 ma-0">
          
          <SelectResult :url="url" :name="name" :title="title"></SelectResult>

        </v-stepper-content>
      </v-stepper-items>
    </v-stepper>
    <AppFooter></AppFooter>
    <v-dialog v-model="errorDialog" width="300">
      <v-card justify="center">
        <v-row>
          <v-col md="12" align="center">
          <div class="pt-10 pb-3">
            <v-icon  size="36" color="yellow">mdi-alert</v-icon>
          </div>
          <div class="pb-10">
            この動画は既に登録済みです
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
import SelectGenre from '../select/SelectGenre.vue'
import SelectVideo from '../select/SelectVideo.vue'
import SelectResult from '../select/SelectResult.vue'

export default {
  components: {
    AppHeader,
    SelectGenre,
    SelectVideo,
    SelectResult,
    AppFooter,
  },
  data () {
    return {
      e1: 1,
      name: '',
      title: '',
      url: '',
      errorDialog: false,
      resData: [],
    }
  },
  methods:{
　  nextChange: function(name,title,url){
      const urlId = url.substr( 32 );
      axios.get('/selectYoutuber', {params:{url:urlId}}).then(
        (res)=>{
          if (urlId == res.data.url) {
            this.errorDialog = true;
          } else {
            this.name = name
            this.title = title
            this.url = urlId
            this.e1++;
          }
        }
      )
    },
    nextResult: function(genre){
      const res = axios.get('/registrationYoutuber', {
        params:{
          name: this.name,
          title: this.title,
          url: this.url,
          genre: genre,
        }
      })
      if (res.status != 200) {
        // エラー
      }
      this.e1++;
    }
  },
}

</script>

<style scoped lang=scss>
.header-blank {
  height: 40px;
  background-color: #fff;
}

.v-card__title {
  padding: 8px 0;
  color: #FE7D7D;
}

.v-stepper, .v-stepper__header {
  box-shadow: none;
}

.select-text {
  color: #FE7D7D;
  font-weight: bold;
}

.v-stepper__content {
  height: 100%;
}

.registration {
  margin: 30px auto 0;
  width: 300px;

  &-img {
    z-index: 1;
    margin: 40px auto 20px;
    width: 240px;
  }
}

</style>