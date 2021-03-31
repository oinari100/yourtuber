<template>
  <div class="genre">
    <div class="genre-title">動画のジャンルを3つまで選択してください</div>
    <div class="genre-content">
    <v-container class="genre-content-checkbox pa-0 ma-0">
      <v-row class="genre-content-checkbox-row pa-0 ma-0">
        <v-col md="5" class="my-0">
          <v-checkbox
            v-for="(genreItem, index) in genreItems1" 
            v-model="selected"
            :key="index"
            :label=genreItem.text
            :value=genreItem.value
            required
            color="primary"
            class="pa-0 ma-0"
            @click="selectGenre"
          ></v-checkbox>
        </v-col>
        <v-col md="5" class="my-0">
          <v-checkbox
            v-for="(genreItem, index) in genreItems2" 
            v-model="selected"
            :key="index"
            :label=genreItem.text
            :value=genreItem.value
            required
            color="primary"
            class="pa-0 ma-0"
            @click="selectGenre"
          ></v-checkbox>
        </v-col>
      </v-row>
    </v-container>

    </div>
    <div class="next-result">
      <v-btn
        color="error"
        @click="next"
        large
        :disabled="!valid"
      >
        <v-icon  size="36" class="mr-3">mdi-hand-pointing-right</v-icon>
        <span class="next-btn">登録する！</span>
      </v-btn>
    </div>
    <v-dialog v-model="warningDialog" width="300">
      <v-card justify="center">
        <v-row>
          <v-col md="12" align="center">
          <div class="pt-10 pb-3">
            <v-icon  size="36" color="yellow">mdi-alert</v-icon>
          </div>
          <div class="pb-10">
            ジャンルは<span class="red--text px-1">3</span>個まで選択できます
          </div>
          </v-col>
        </v-row>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        genreItems1: {
          1: { text:'青春', value:'youth'},
          2: { text:'かわいい', value:'cute'},
          3: { text:'恋愛', value:'love'},
          4: { text:'こわい', value:'scared'},
          5: { text:'ほっこり', value:'unwind'},
          6: { text:'不思議な', value:'mysterious'},
        },
        genreItems2: {
          1: { text:'かっこいい', value:'cool'},
          2: { text:'日常', value:'everyday'},
          3: { text:'クレイジー', value:'crazy'},
          4: { text:'下ネタ', value:'adult'},
          5: { text:'どっきり', value:'surprise'},
          6: { text:'ためになる', value:'study'},
        },
        selected: [],
        warningDialog: false,
        valid: false,
      }
    },
    methods:{
      next: function(){
        this.$emit('genreData', this.selected);
      },
      selectGenre: function(){
        if (this.selected.length > 0) {
          this.valid = true
        } else {
          this.valid = false
        }

        if (this.selected.length > 3) {
          this.warningDialog = true
          this.selected.pop()
        }
      }
    }
  }
</script>

<style lang="scss">
.genre {
  margin: 0;

  &-title {
    text-align: center;
    color: #727171;
    font-size: 16px;
    margin: 20px 0 30px;
  }

  &-content {
    padding: 10px 0 0;
    margin: 0 auto;
    width: 330px;
  }

  &-img {
    margin: 10px auto 0;
    width: 60px;
  }

  &-text {
    text-align: center;
    
    &-content {
      color: #fff;
      font-weight: bold;
      font-size: 14px;
    }
  }
}

.v-form {
  width: 300px;
  margin: auto;
}

.sample {
  font-size: 12px;
  color: #AEADAB;
  margin: -20px 0 0 10px;
}

.next-result {
  margin: 20px 0 120px;
  text-align: center;

  &-btn {
    font-weight: bold;
  }
}
</style>