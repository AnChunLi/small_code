<template>
  <div class="remark-box">
    <div class="item" v-for="(item, index) in remarkList" :key="index">
      <div class="item-top">
        <div class="nick">{{item.nick_name}}</div>
        <div class="time">{{item.showTime}}</div>
      </div>
      <div class="item-content">{{item.content}}</div>
    </div>
    <div class="tip" v-show="!hasMore">没有更多啦</div>
    <div class="add" @click="add">
      <img src="../assets/add.png" alt />
    </div>
    <div class="form" v-show="showForm" @click="cancelAdd">
      <div class="form-box" @click.stop>
        <input placeholder="请输入你的姓名" v-model="name" />
        <input placeholder="请输入你的毕业留言" v-model="content" />
        <button @click="publish">发布</button>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  data() {
    return {
      remarkList: [],
      curPage: 1,
      size: 10,
      hasMore: true,
      name: "",
      content: "",
      showForm: false
    };
  },
  created() {
    this.getData();
  },
  mounted() {
    window.addEventListener("scroll", this.handleScroll, true);
  },
  methods: {
    getData() {
      if (!this.hasMore) return;
      Axios.get(`https://api.zhishiring.top/graduation/list/${this.curPage}/${this.size}`).then(res => {
        this.remarkList = this.remarkList.concat(res.data.data);
        for (let item of this.remarkList) {
          item.showTime = this.dateFormat(
            "YYYY-mm-dd HH:MM",
            new Date(item.time)
          );
        }
        this.hasMore = res.data.hasMore;
      });
    },
    dateFormat(fmt, date) {
      let ret;
      const opt = {
        "Y+": date.getFullYear().toString(), // 年
        "m+": (date.getMonth() + 1).toString(), // 月
        "d+": date.getDate().toString(), // 日
        "H+": date.getHours().toString(), // 时
        "M+": date.getMinutes().toString(), // 分
        "S+": date.getSeconds().toString() // 秒
        // 有其他格式化字符需求可以继续添加，必须转化成字符串
      };
      for (let k in opt) {
        ret = new RegExp("(" + k + ")").exec(fmt);
        if (ret) {
          fmt = fmt.replace(
            ret[1],
            ret[1].length == 1 ? opt[k] : opt[k].padStart(ret[1].length, "0")
          );
        }
      }
      return fmt;
    },
    add() {
      this.showForm = true;
    },
    cancelAdd() {
      this.showForm = false;
    },
    publish() {
      if (!this.name || !this.content) {
        alert("请输入完整内容");
        return;
      }
      if (this.content.length > 200) {
        alert("内容过长，请输入200字以内的内容");
        return;
      }
      Axios.post(`https://api.zhishiring.top/graduation/add`, {
        nickName: this.name,
        content: this.content
      }).then(() => {
        this.showForm = false;
        this.remarkList = [];
        this.hasMore = true;
        this.curPage = 1;
        this.getData();
      });
    },
    handleScroll() {
      var scrollTop =
        document.documentElement.scrollTop || document.body.scrollTop; //变量windowHeight是可视区的高度
      var windowHeight =
        document.documentElement.clientHeight || document.body.clientHeight; //变量scrollHeight是滚动条的总高度
      var scrollHeight =
        document.documentElement.scrollHeight || document.body.scrollHeight;
      if (scrollTop + windowHeight == scrollHeight) {
        //请求数据接口
        this.curPage ++;
        this.getData();
        return false;
      }
    }
  }
};
</script>

<style scoped>
.remark-box {
  width: 92%;
  margin: 10px 4%;
}

.remark-box > .item {
  width: 100%;
  text-align: start;
  margin: 5px 0;
  border-bottom: 1px dashed #eee;
}

.remark-box > .item > .item-top > .nick {
  color: #00cc66;
  font-weight: 700;
  font-size: 16px;
  font-family: "宋体";
}

.remark-box > .item > .item-top > .time {
  color: #9ea7b4;
  font-weight: 300;
  font-size: 12px;
  font-family: "宋体";
  padding-left: 2px;
}

.remark-box > .item > .item-content {
  word-break: break-all;
  font-size: 14px;
}

.remark-box > .tip {
  width: 100%;
  height: 40px;
  color: #b2b2b2;
  text-align: center;
  font-size: 12px;
}

.remark-box > .add {
  position: fixed;
  right: 15px;
  bottom: 15px;
  width: 60px;
  height: 60px;
}

.remark-box > .add > img {
  width: 100%;
  height: 100%;
}

.remark-box > .form {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1;
  background: rgba(0, 0, 0, 0.4);
}

.remark-box > .form > .form-box {
  width: 80%;
  background: #fff;
  border-radius: 5px;
  padding: 10px 0;
}

.remark-box > .form > .form-box > input {
  display: block;
  width: 90%;
  height: 30px;
  margin: 5px 5%;
  border: 1.2px solid #00cc66;
  border-radius: 4px;
  padding: 0;
}

.remark-box > .form > .form-box > button {
  width: 90%;
  height: 40px;
  margin: 10px 5%;
  background: #00cc66;
  padding: 0;
  border: none;
  outline: none;
  color: #fff;
  font-size: 18px;
}
</style>