<template>
  <div class="contact">
    <AppHeader />
      <v-img src='/img/contact/post.svg' class="contact-img" />
      <v-img src='/img/contact/contact.svg' class="contact-text" />
      <v-form
        ref="form"
        v-model="valid"
        lazy-validation
      >
        <v-text-field
          v-model="name"
          :rules="nameRules"
          label="お名前"
          required
        ></v-text-field>

        <v-text-field
          v-model="email"
          :rules="emailRules"
          label="メールアドレス"
          required
        ></v-text-field>

        <v-textarea
          v-model="textarea"
          :rules="textareaRules"
          label="ご意見・お問い合わせ内容"
          auto-grow
        ></v-textarea>

        <div class="contact-btn">
          <v-btn
            :disabled="!valid"
            color="#FE7D7D"
            large
            @click="sendMail"
          >
            <span class="contact-btn-text">
              送信
            </span>
          </v-btn>
        </div>
      </v-form>
    <AppFooter />
  </div>
</template>

<script>
import AppHeader from '../common/AppHeader.vue'
import AppFooter from '../common/AppFooter.vue'

export default {
  components: { 
    AppHeader,
    AppFooter,
  },
  data: () => ({
    valid: true,
    name: '',
    nameRules: [
      v => !!v || '入力してください',
    ],
    email: '',
    emailRules: [
      v => !!v || '入力してください',
      v => /.+@.+\..+/.test(v) || 'メールアドレスの形式ではありません',
    ],
    textarea: '',
    textareaRules: [
      v => !!v || '入力してください',
    ],
  }),
  methods: {
    sendMail () {
      const params = {
        name: this.name,
        email: this.email,
        textarea: this.textarea,
      }
      axios.post('/sendMail', params).then(
        (res)=>{
          
        }
      );
    }
  }
}
</script>

<style lang="scss" local>
.contact {

  &-img {
    margin: 90px auto 0;
    width: 90px;
  }

  &-text {
    width: 300px;
    margin: 30px auto;
  }

  &-btn {
    margin: 10px 10px 120px;
    text-align: center;

    &-text {
      color: #FFF;
      font-size: 14px;
      font-weight: bold;
    }
  } 

}

</style>