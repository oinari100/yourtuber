<template>
  <v-btn
    rounded
    large
    dark
    color="#FF7E7E"
    width="250"
    height="60"
    to="search"
  >
    <img src='/img/btn/search.png' class="search-btn"/>
    <span class="search-btn-text">動画をさがす</span>
  </v-btn>
</template>

<style lang="scss">
.search-btn {
  width: 40px;

  &-text {
    font-size: 20px;
    font-weight: bold;
    color: #FFF;
    padding: 0 10px;
  }
}

</style>