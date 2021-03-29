<template>
  <v-btn
    rounded
    large
    dark
    color="#7A80FF"
    width="250"
    height="60"
    to="registration"
  >
    <img src='/img/btn/plus.png' class="entry-btn"/>
    <span class="entry-btn-text">動画を登録する</span>
  </v-btn>
</template>

<style lang="scss">
.entry-btn {
  width: 25px;

  &-text {
    font-size: 20px;
    font-weight: bold;
    color: #FFF;
    padding: 0 10px;
  }
}

</style>