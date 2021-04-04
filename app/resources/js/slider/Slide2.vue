<template>
  <div class="slider">
    <div class="color-img">
      <v-img src='/img/top/color-img.svg' />
    </div>
    <div class="slider-title">
      <v-img src='/img/top/slider-title.svg' />
    </div>
    <div class="slider-title-text">
      <p class="slider-title-text-content">
        YourTubeは、あなたに合う動画をみつけたり、好きな動画を共有し、周りに広げるサービスです。
      </p>
    </div>
  </div>
</template>

<script>

</script>

<style lang="scss" local>
.color-img {
  width: 300px;
  margin: 80px auto;
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
</style>