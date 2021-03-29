<template>
  <div class="slider">
    <div class="smh-swipe">
      <v-img src='/img/smh-swipe.svg' />
    </div>
    <div class="slider-title">
      <v-img src='/img/top/slider-title2.svg' />
    </div>
    <div class="slider-title-text">
      <p class="slider-title-text-content">
        左右にスワイプして自分の好みのジャンルを選択しましょう。<br>5問答えると結果が表示されます。
      </p>
    </div>
    <v-img src='/img/hand.png' class="hand"></v-img>
  </div>
</template>

<script>

</script>

<style lang="scss" local>
.smh-swipe {
  width: 160px;
  margin: 110px auto 80px;
}

.slider-title {
  width: 300px;
  margin: -30px auto 0;

  &-text {
    margin: 40px auto 0;
    width: 230px;

    &-content {
      color: #333;
      font-size: 14px;
      line-height: 26px;
    }
  }
}

.hand {
  position: absolute;
  top: -360px;
  left: 50%;
  width: 80px;
  animation-name: faderight;
  animation-duration: 3s;
  animation-iteration-count: infinite;
}

@keyframes faderight {
  from {
    opacity: 1;
    transform: translateX(0);
  }
  to {
    opacity: 0;
    transform: translateX(60px);
  }
}
</style>