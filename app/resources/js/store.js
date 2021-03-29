import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate";
 
Vue.use(Vuex)
 
export default new Vuex.Store({
 
  // 検索結果
  state: {
    data1: {
      url: '',
      name: '',
      title: '',
      genre: [],
      count: 0,
      flg: false
    },
    data2: {
      url: '',
      name: '',
      title: '',
      genre: [],
      count: 0,
      flg: false
    },
    data3: {
      url: '',
      name: '',
      title: '',
      genre: [],
      count: 0,
      flg: false
    }
  },
  
  // ミューテーション
  mutations: {
    initializeData(state) {
      state.data1.url ='';
      state.data1.name ='';
      state.data1.title ='';
      state.data1.genre =[];
      state.data1.count =0;
      state.data2.url ='';
      state.data2.name ='';
      state.data2.title ='';
      state.data2.genre =[];
      state.data2.count =0;
      state.data3.url ='';
      state.data3.name ='';
      state.data3.title ='';
      state.data3.genre =[];
      state.data3.count =0;
    },

    setSearchGenre(state, data) {

      // 結果の1個目をセット
      state.data1.url = data[0].url;
      Object.keys(data[0]).forEach(function (key) {
        if (data[0][key] == 1) {
          state.data1.genre.push(key);
        }
      });

      // 結果の2個目をセット
      state.data2.url = data[1].url;
      Object.keys(data[1]).forEach(function (key) {
        if (data[1][key] == 1) {
          state.data2.genre.push(key);
        }
      });

      // 結果の3個目をセット
      state.data3.url = data[2].url;
      Object.keys(data[2]).forEach(function (key) {
        if (data[2][key] == 1) {
          state.data3.genre.push(key);
        }
      });
    },

    setSearchData(state, data) {

      // 結果の1個目をセット
      state.data1.url = data[0].url;
      state.data1.name = data[0].youtuber;
      state.data1.title = data[0].title;
      
      // 結果の2個目をセット
      state.data2.url = data[1].url;
      state.data2.name = data[1].youtuber;
      state.data2.title = data[1].title;
      
      // 結果の3個目をセット
      state.data3.url = data[2].url;
      state.data3.name = data[2].youtuber;
      state.data3.title = data[2].title;
    },

    setSearchCount(state, data) {

      // 結果の1個目をセット
      state.data1.count = data[0].nice;

      // 結果の2個目をセット
      state.data2.count = data[1].nice;

      // 結果の3個目をセット
      state.data3.count = data[2].nice;
    },
  },
  
  // ゲッター
  getters: {
    getData1(state) {
      return state.data1;
    },
    getData2(state) {
        return state.data2;
    }
    ,getData3(state) {
        return state.data3;
    }
  },
  
  // アクション
  actions: {
    initialize(context) {
      context.commit('initializeData');
    },

    searchGenre(context, data) {
      context.commit('setSearchGenre', data);
    },

    searchData(context, data) {
        context.commit('setSearchData', data);
    },

    searchCount(context, data) {
      context.commit('setSearchCount', data);
    },
  },
  
  // プラグイン
  plugins: [createPersistedState()]
})