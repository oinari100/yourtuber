<template>
  <div class="information">
    <div class="information-title">動画の情報を入力してください</div>
    <div class="information-content">
      <v-form
        ref="form"
        v-model="valid"
      >
        <v-text-field
          v-model="name"
          label="チャンネル名"
          required
          :rules="channelRules"
          class="mt-5"
          outlined
        ></v-text-field>

        <v-text-field
          v-model="title"
          label="動画のタイトル名"
          required
          :rules="videoRules"
          class="mt-5"
          outlined
        ></v-text-field>

        <v-text-field
          v-model="url"
          label="動画のURL（https://www.youtube.com/...）"
          required
          :rules="urlRules"
          class="mt-5"
          outlined
        ></v-text-field>
      </v-form>
    </div>
    <div class="next">
      <v-btn
        color="error"
        @click="next"
        large
        :disabled="!valid"
      >
        <v-icon  size="36" class="mr-3">mdi-hand-pointing-right</v-icon>
        <span class="next-btn">ジャンルを選ぶ</span>
      </v-btn>
    </div>
  </div>
</template>

<script>
export default {
  methods:{
    next: function(){
      this.$emit('videoData', this.name,this.title,this.url);
    }
  },
  data () {
    return {
      name: '',
      title: '',
      url: '',
      channelRules: [
        v => !!v || 'チャンネル名が入力されていません',
      ],
      videoRules: [
        v => !!v || '動画のタイトルが入力されていません',
      ],
      urlRules: [
        v => !!v || '動画のURLが入力されていません',
        v => /https\:\/\/?(www\.)?youtube.com\/watch/.test(v) || 'Youtube動画のURL形式ではありません',
      ],
      valid: true,
    }
 }
}
</script>

<style lang="scss">
.information {
  margin: 0 0 120px;

  &-title {
    text-align: center;
    color: #727171;
    font-size: 16px;
    margin: 20px 0 0;
  }

  &-content {
    padding: 10px 0 0;
    margin: 10px 0 0;
  }
}

.v-form {
  width: 300px;
  margin: auto;
}

.next {
  margin: 20px 0 ;
  text-align: center;

  &-btn {
    font-weight: bold;
  }
}
</style>