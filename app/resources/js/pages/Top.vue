<template>
  <div class="top">
    <div class="top-select-title">
      <v-img src='/img/top/top-title.svg' />
    </div>
    <div class="top-select-title-sub">
      <v-img src='/img/top/sub-title.svg' />
    </div>
    <div class="top-select-img">
      <v-img src='/img/top/top-img.svg' />
    </div>
    <div class="top-select-content">
      <div>
        <SearchBtn class="my-10"/>
      </div>
      <div>
        <EntryBtn class="mb-10"/>
      </div>
      <div class="pb-10">
        <RankingBtn />
      </div>
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
  },
}
</script>

<style lang="scss" local>
.top-select {

  &-title {
    width: 150px;
    margin: 130px auto 0;

    &-sub {
      width: 230px;
      margin: 20px auto; 
    }
  }

  &-img {
    margin: 80px auto 0;
    width: 250px;
  }

  &-content {
    text-align: center;
  }
}


</style>