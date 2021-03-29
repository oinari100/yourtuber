<template>
  <div class="slider">
    <div class="skip">
      <v-img src='/img/icon/skip.svg' class="skip-icon" v-if="!isLastSlide" @click="slidSkip"/>
    </div>
    <hooper style="width: 100%;" ref="carousel" :settings="hooperSettings" @slide="slide">
      <slide>
        <Slide1/>
      </slide>
      <slide>
        <Slide2 />
      </slide>
      <slide>
        <Slide3 />
      </slide>
      <slide>
        <Slide4/>
      </slide>
      <slide>
        <Slide5/>
      </slide>
      <hooper-pagination slot="hooper-addons" v-if="!isLastSlide"></hooper-pagination>
    </hooper>
    <div class="hooper-btn">
      <v-btn 
        class="hooper-btn-content"
        v-if="!isFirstSlide && !isLastSlide"
        color="#FFADAD"
        large
        @click="slideNext"
      >
        <span class="hooper-btn-content-text">次へ</span>
      </v-btn>
    </div>
  </div>
</template>

<script>
import { Hooper, Slide,Pagination as HooperPagination, } from 'hooper'
import 'hooper/dist/hooper.css'
import Slide1 from '../slider/Slide1.vue'
import Slide2 from '../slider/Slide2.vue'
import Slide3 from '../slider/Slide3.vue'
import Slide4 from '../slider/Slide4.vue'
import Slide5 from '../slider/Slide5.vue'

const SLIDE_COUNT = 4

export default {
  components: {
    Hooper,
    Slide,
    HooperPagination,
    Slide1,
    Slide2,
    Slide3,
    Slide4,
    Slide5,
  },
  data() {
    return {
      hooperSettings: {
        itemsToShow: 1,
        centerMode: true,
        wheelControl: false,
      },
      currentSlide: 0,
    }
  },
  computed: {
    isFirstSlide() {
      return this.currentSlide == 0
    },
    isLastSlide() {
      return this.currentSlide >= SLIDE_COUNT
    },
  },
  methods: {
    slideNext() {
      this.$refs.carousel.slideNext();
    },
    slide({currentSlide}) {
        this.currentSlide = currentSlide;
    },
    slidSkip() {
      this.$refs.carousel.slideTo(4);
    }
  }
}
</script>

<style lang="scss">
.slider {
  height: 100%;
  width: 100%;
}

.hooper {
  height: 87%;

  &-slide {
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-size: 30px;
  }

  &-pagination {
    top: 92%;
  }

  &-indicator {
    background-color: #CFCECD ;
    margin: 3px;
    width: 6px;
    height: 6px;
  }

  &-btn {
    text-align: right;

    &-content {
      margin: 10px 20px;

      &-text {
        color: #FFF;
        font-size: 14px;
        font-weight: bold;
      }
    }
  }
}

.hooper-indicator:hover, .hooper-indicator.is-active {
  background-color: #FF5141 ;
}

.v-application ol, .v-application ul {
    padding-left: 0 !important;
}

.skip {
  margin: 15px 15px 0 0;

  &-icon {
    width: 50px;
    margin-left: auto;
  }
}
</style>