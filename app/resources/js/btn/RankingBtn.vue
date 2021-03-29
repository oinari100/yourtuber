<template>
  <div class="king">
    <router-link to="/ranking">
      <v-icon color="#FFB800">mdi-chess-queen</v-icon>
      <span class="king-btn-text">人気の動画を見る</span>
      <v-icon color="#FFB800">mdi-chess-queen</v-icon>
    </router-link>
  </div>
</template>

<style lang="scss">
.king {
  border-bottom: thin solid #FFB800;
  width: 200px;
  margin: auto;

  &-btn {
    width: 30px;

    &-text {
      font-size: 16px;
      font-weight: bold;
      color: #FFB800;
    }
  }
}

</style>