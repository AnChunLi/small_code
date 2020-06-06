<template>
  <div class="box">
    <!-- <div class="title">老师寄语</div> -->
    <img style="width:100%;" preview="index" src="@/assets/remarks/1.jpg" alt />
    <swiper :options="swiperOption" class="swiper-wrap">
      <swiper-slide v-for="(item, index) in remarkList" :key="index">
        <img :src="item" alt style="width:100%;height:100%;" preview="index" />
      </swiper-slide>
      <!-- 常见的小圆点 -->
      <div
        class="swiper-pagination"
        v-for="(item,index) in remarkList"
        :key="index"
        slot="pagination"
      ></div>
    </swiper>
  </div>
</template>

<script>
import img2 from "@/assets/remarks/2.jpg";
import img3 from "@/assets/remarks/3.jpg";
import "swiper/dist/css/swiper.css";
import { swiper, swiperSlide } from "vue-awesome-swiper";

export default {
  name: "teacherRemarks",
  components: {
    swiper,
    swiperSlide
  },
  data() {
    return {
      remarkList: [img2, img3],
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
          delay: 5000,
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
  }
};
</script>

<style scoped>
.box {
  width: 92%;
  min-height: 100px;
  padding: 10px 4%;
}

.box > .title {
  width: 28%;
  height: 30px;
  background: #00cc66;
  line-height: 30px;
  color: #ffffff;
  font-style: oblique;
  text-align: center;
}

.box > .swiper-wrap {
  width: 100%;
}
</style>