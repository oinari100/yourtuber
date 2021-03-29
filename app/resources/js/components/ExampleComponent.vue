<template>
  <div id="app">
    <div class="select-title">フリックして選んでね</div>
    <div class="select-content">
      <Tinder key-name="id" :queue.sync="queue" :offset-y="10" @submit="onSubmit">
        <template slot-scope="scope">
          <div
            class="pic"
            :style="{
              //'background-image': `url(https://cn.bing.com//th?id=OHR.${scope.data.id}_UHD.jpg&pid=hp&w=720&h=1280&rs=1&c=4&r=0)`,
              //'background-image': `url(https://cn.bing.com//th?id=OHR.BarcolanaTrieste_ZH-CN5745744257_UHD.jpg&pid=hp&w=720&h=1280&rs=1&c=4&r=0)`,
              //'background-image': `url(https://cn.bing.com//th?id=OHR.RedRocksArches_ZH-CN5664546697_UHD.jpg&pid=hp&w=720&h=1280&rs=1&c=4&r=0)`,
              //'background-image': 'url(\'/img/logo.svg\')',
              //'background-image': `url(/img/top-question.svg)`,
              //'background-image': `url(https://cn.bing.com//th?id=OHR.${scope.data.id}_UHD.jpg&pid=hp&w=720&h=1280&rs=1&c=4&r=0)`,
              'background-image': `url(/img/${scope.data.id})`
              //'background-image': `url(/img/logo.svg)`
          }"/>
        </template>
      </Tinder>
    </div>
    <div>
      <v-container class="pa-5">
        <v-row align=center justify=center>
          <v-col>
            <v-card color=#FF9955 height=50>
              <v-cord-title>
                
              </v-cord-title>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </div>
  </div>
</template>

<script>
import Tinder from "vue-tinder";
import source from "@/bing";

export default {
  name: "App",
  components: { Tinder },
  data: () => ({
    queue: [],
    offset: 0
  }),
  created() {
    this.mock();
  },
  methods: {
    mock(count = 5) {
      const list = [];
      for (let i = 0; i < count; i++) {
        list.push({ id: source[this.offset] });
        this.offset++;
      }
      this.queue = this.queue.concat(list);
    },
    onSubmit({ item }) {
      if (this.queue.length < 3) {
        this.mock();
      }
    }
  }
};
</script>

<style lang="scss" scope>
#app .vue-tinder {
  position: absolute;
  z-index: 1;
  left: 70px;
  right: 70px;
  top: 140px;
  bottom: 340px;
  margin: auto;
  min-width: 200px;
  max-width: 300px;
}

.nope-pointer,
.like-pointer {
  position: absolute;
  z-index: 1;
  top: 120px;
  width: 64px;
  height: 64px;
}

.nope-pointer {
  right: 10px;
}

.like-pointer {
  left: 10px;
}

.super-pointer {
  position: absolute;
  z-index: 1;
  bottom: 80px;
  left: 0;
  right: 0;
  margin: auto;
  width: 112px;
  height: 78px;
}

.pic {
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
}

.select {
  &-title {
    text-align: center;
    color: #FF9955;
    font-weight: bold;
    font-size: 20px;
    margin: 0 0 40px;
  }

  &-content {
    background-color: #ff0000ff;
    height: 380px;
  }
}
</style>
