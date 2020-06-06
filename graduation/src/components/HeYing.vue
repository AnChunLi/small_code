<template>
  <div class="heying">
    <div class="img-item" v-for="(item, index) in heyingList" :key="index">
      <img :src="item.img" alt preview="index" />
      <p>{{item.title}}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      heyingList: [
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E5%9C%B0%E7%90%86%E4%BF%A1%E6%81%AF%E7%A7%91%E5%AD%A61%E7%8F%AD.jpg?x-oss-process=style/default",
          title: "地理信息科学1班"
        },
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E5%9C%B0%E7%90%86%E4%BF%A1%E6%81%AF%E7%A7%91%E5%AD%A62%E7%8F%AD.jpg?x-oss-process=style/default",
          title: "地理信息科学2班"
        },
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E5%9C%B0%E7%90%86%E4%BF%A1%E6%81%AF%E7%A7%91%E5%AD%A63%E7%8F%AD.jpg?x-oss-process=style/default",
          title: "地理信息科学3班"
        },
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E5%9C%B0%E7%90%86%E4%BF%A1%E6%81%AF%E7%A7%91%E5%AD%A64%E7%8F%AD.jpg?x-oss-process=style/default",
          title: "地理信息科学4班"
        },
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E5%9C%B0%E7%90%86%E7%A7%91%E5%AD%A6%E5%9F%BA%E5%9C%B0%E7%8F%AD.jpg?x-oss-process=style/default",
          title: "地理科学基地班"
        },
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E4%BA%BA%E6%96%87%E8%87%AA%E7%84%B6%E5%9C%B0%E7%90%86%E7%8F%AD.png?x-oss-process=style/default",
          title: "人文自然地理班"
        },
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E7%8E%AF%E5%A2%83%E5%B7%A5%E7%A8%8B%E7%8F%AD.jpeg?x-oss-process=style/default",
          title: "环境工程班"
        },
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E7%8E%AF%E5%A2%83%E7%A7%91%E5%AD%A6%E7%8F%AD.png?x-oss-process=style/default",
          title: "环境科学班"
        },
        {
          img:
            "http://image.zhishiring.top/graduation/heying/%E5%9C%9F%E5%9C%B0%E8%B5%84%E6%BA%90%E7%AE%A1%E7%90%86%E7%8F%AD.jpg?x-oss-process=style/default",
          title: "土地资源管理班"
        }
      ]
    };
  }
};
</script>

<style scoped>
.heying {
  width: 100%;
}

.heying > .img-item {
  width: 92%;
  margin: 10px 4%;
}

.heying > .img-item > img {
  width: 100%;
  height: 100%;
  border-radius: 5px;
}
</style>