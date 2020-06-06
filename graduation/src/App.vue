<template>
  <div id="app">
    <div class="top">毕业留言</div>
    <!-- <div class="pic">
      <img
        src="http://sres.whu.edu.cn/dfiles/11276/d/file/p/2017-10-18/7616ea6d6b430ddb491441b8178affc3.jpg"
        alt
      />
    </div>-->
    <swiper :options="swiperOption" class="pic">
      <swiper-slide v-for="(item, index) in bannerList" :key="index">
        <img :src="item" alt style="width:100%;height:100%;" preview="index" />
      </swiper-slide>
      <!-- 常见的小圆点 -->
      <div
        class="swiper-pagination"
        v-for="(item,index) in bannerList"
        :key="index"
        slot="pagination"
      ></div>
    </swiper>
    <div class="title-list">
      <div
        :class="curTab==index?'title title-select':'title'"
        v-for="(item, index) in titleList"
        :key="index"
        @click="setTab(index)"
      >{{item}}</div>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
import "swiper/dist/css/swiper.css";
import { swiper, swiperSlide } from "vue-awesome-swiper";

export default {
  name: "App",
  components: {
    swiper,
    swiperSlide
  },
  watch: {
    curTab(val) {
      switch (val) {
        case 0:
          this.$router.push("/");
          break;
        case 1:
          this.$router.push("/video");
          break;
        case 2:
          this.$router.push("/heying");
          break;
        case 3:
          this.$router.push("/remark");
          break;
      }
    }
  },
  data() {
    return {
      titleList: ["老师寄语", "毕业视频", "毕业合影", "同学留言"],
      bannerList: [
        "https://image.zhishiring.top/graduation/1.jpg?x-oss-process=style/default",
        "http://image.zhishiring.top/graduation/2.jpg?x-oss-process=style/default"
      ],
      curTab: 0,
      swiperOption: {
        // 分页器配置
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        },
        // 设定初始化时slide的索引
        initialSlide: 0,
        //Slides的滑动方向，可设置水平(horizontal)或垂直(vertical)
        direction: "horizontal",
        // 自动切换图配置
        autoplay: {
          delay: 3000,
          stopOnLastSlide: false,
          disableOnInteraction: true
        },
        // 箭头配置
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        // 环状轮播
        // loop: true,
        // loopedSlides: 3,
        // loopAdditionalSlides: 0,
        // 间距
        // spaceBetween: 26,
        // 修改swiper自己或子元素时，自动初始化swiper
        observer: true,
        // 修改swiper的父元素时，自动初始化swiper
        observeParents: true
      }
    };
  },
  methods: {
    setTab(index) {
      this.curTab = index;
    }
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

.top {
  width: 100%;
  height: 40px;
  background: #00cc66;
  color: #fff;
  font-weight: 600;
  font-style: oblique;
  line-height: 40px;
}

.pic {
  width: 100%;
  /* height: 50vw; */
}

.pic > img {
  width: 100%;
  height: 100%;
}

.title-list {
  display: flex;
  justify-content: space-between;
  width: 100%;
  height: 30px;
  border-bottom: dashed 0.1px #00cc66;
}

.title-list > .title {
  width: 28%;
  height: 30px;
  line-height: 30px;
  color: #657180;
  text-align: center;
}

.title-list > .title-select {
  color: #00cc66;
  font-weight: 700;
}
</style>
