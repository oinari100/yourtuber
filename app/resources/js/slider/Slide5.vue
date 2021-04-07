<template>
  <div class="slider-heigth">
    <div class="smh-registration">
      <v-img src='/img/top/start.svg'  class="smh-registration-last"/>
    </div>
    <div class="slider-last-text">
      <p class="slider-last-text-content">
        ＼ 面倒な会員登録など一切不要 ／<br>
        あなたもYourTubeを始めてみませんか？
      </p>
    </div>
    <div class="slider-last-btn">
      <SearchBtn />
    </div>
    <div class="slider-last-btn">
      <EntryBtn />
    </div>
    <div class="slider-last-king">
      <RankingBtn />
    </div>
  </div>
</template>

<script>
import SearchBtn from '../btn/SearchBtn.vue'
import EntryBtn from '../btn/EntryBtn.vue'
import RankingBtn from '../btn/RankingBtn.vue'

export default {
  components: {
    SearchBtn,
    EntryBtn,
    RankingBtn
  }
}
</script>

<style lang="scss" local>
.slider-heigth {
  width: 100%;
  height: 110%;
}

.smh-registration {
  margin: 100px auto 0px;

  &-last {
    margin: auto;
    width: 280px;
  }
}

.slider-last {
  width: 300px;

  &-text {
    margin: 30px auto 0;
    width: 280px;
    text-align: center;

    &-content {
      color: #333;
      font-size: 14px;
      line-height: 26px;
      margin: 0 0 30px;
    }
  }

  &-btn {
    margin: 40px 0 0;
    text-align: center;
  }

  &-king {
    text-align: center;
    margin: 30px 0 0;
  }
}
</style>