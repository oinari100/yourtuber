<template>
  <div>
    <v-app-bar
     app
     flat
     color="#FFF"
    >
      <router-link to="/top">
        <v-img :src="'/img/header-title.svg'" class="top-image-logo"></v-img>
      </router-link>
    </v-app-bar>
  </div>
</template>

<script>
export default {
    name: 'AppHeader',
}
</script>

<style scoped>
.top-image-logo {
    width: 50%;
}

</style>