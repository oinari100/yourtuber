<template>
  <v-footer padless absolute color="#FE7D7D">
    <v-container>
      <v-row class="footer-content">
        <v-col class="footer-content-contact pa-3 ma-0" v-for="(footerItem, index) in footerItems" :key="index">
          <router-link :to="footerItem.url"><span class="footer-text">{{footerItem.text}}</span></router-link>
        </v-col>
      </v-row>
      <v-row>
        <div class="footer-twitter">
          <a @click="linkToOtherWindow('https://twitter.com/oinari_pg')"><v-icon color="#fff">mdi-twitter</v-icon></a>
        </div>
      </v-row>
    </v-container>

    <div class="footer-name">
      <div class="footer-copy">&copy; Yourtube 2021</div>
    </div>
  </v-footer>
</template>

<script>
  export default {
    data () {
      return {
        footerItems: {
          1: { text:'お問い合わせ', url: '/contact'},
          2: { text:'利用規約', url: '/terms'},
        }
      }
    },
    methods: {
      linkToOtherWindow (url) {
        window.open(url, '_blank')
      }
    }
  }
</script>

<style lang="scss">
.footer {
  &-text {
    color: #fff;
    font-weight: bold;
    text-align: center;
    margin: auto;
  }

  &-copy {
    color: #fff;
  }

  &-content {
    justify-content: center;

    &-contact {
      text-align: center;
    }
  }

  &-twitter {
    margin: auto;
  } 
  
  &-name{
    width: 100%;
    text-align: center;
    padding: 6px;
  }
}

</style>