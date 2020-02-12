// mine/pages/game/kouzhao.js
const app = getApp();
const ctx = wx.createCanvasContext("mycanvas", this);
const shareCtx = wx.createCanvasContext("canvas", this);
var rectW = 160,
  rectH = 120;
var disX = 0, disY = 0;
var rotate = 0;

Page({
  /**
   * 页面的初始数据
   */
  data: {
    headImg: '',
    windowW: 0,
    kouzhaoList: [
      "img/1.png",
      "img/2.png",
      "img/3.png",
      "img/4.png",
      "img/5.png",
      "img/6.png",
      "img/7.png",
      "img/8.png",
      "img/9.png",
      "img/10.png"
    ],
    kouzhaoImg: '',
    x: 0,
    y: 0,
    isShare:false,
    isSave:false
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function(options) {
    const info = wx.getSystemInfoSync();
    this.setData({
      windowW: info.windowWidth,
      x: info.windowWidth / 2 - rectW / 2,
      y: info.windowWidth / 2 - rectH / 2
    })
  },

  addHead() {
    let that = this;
    if (!app.isLogin()) {
      app.toLogin();
      return;
    }else{
      wx.showActionSheet({
        itemList: ['使用微信头像', '本地上传头像'],
        success: (res) => {
          if (res.tapIndex == 0) {
            wx.showLoading({
              title: '头像加载中',
              mask: true
            })
            wx.downloadFile({
              url: app.thisUser.userHeadimgurl,
              success: (res) => {
                console.log(res);
                that.setData({
                  headImg: res.tempFilePath
                })
                that.drawBg();
                wx.hideLoading();
              },
              fail: function (res) { },
              complete: function (res) { },
            })
          } else if (res.tapIndex == 1) {
            wx.chooseImage({
              count: 1,
              success: (res) => {
                this.setData({
                  headImg: res.tempFilePaths[0]
                })
                this.drawBg();
              },
              fail: function (res) { }
            })
          }
        },
        fail: function (res) {
          console.log(res);
        }
      })
    }
  },

  selectKouzhao(e) {
    this.setData({
      kouzhaoImg: e.currentTarget.dataset.src
    })
    this.drawMove();
  },

  touchend(){
    disX = 0;
    disY = 0;
  },

  move(e) {
    let x = e.touches[0].x,
      y = e.touches[0].y,
      dis = 30;
    if (x < this.data.x + rectW -20 && x >= this.data.x+20 && y < this.data.y + rectW-20&& y >= this.data.y+20){
      if (disX == 0) {
        disX = x - this.data.x
      }
      if (disY == 0) {
        disY = y - this.data.y
      }
      console.log('move');
      this.setData({
        x: x - disX,
        y: y - disY
      })
      // ctx.requestAnimationFrame(this.drawMove);
      this.drawMove();
    } else if (x < this.data.x + rectW + dis && x >= this.data.x + rectW - dis && y < this.data.y + rectH + dis && y >= this.data.y + rectH - dis){
      console.log("scale");
      this.drawScale(x - this.data.x, y - this.data.y);
    }
  },

  longTap(e){
    let x = e.touches[0].x,
      y = e.touches[0].y;
    if (x < this.data.windowW * 0.9 && x >= this.data.windowW * 0.9 - 40 && y < 40 && y >= 0) {
      console.log('rotate');
      // let disX = x - this.data.x,
      //     disY = y- this.data.y;
      // rotate = rotate + Math.atan(disY / disX) * Math.PI / 180;
      // console.log(rotate);
      this.drawRotate();
    }
  },

  drawBg() {
    ctx.drawImage(this.data.headImg, 0, 0, this.data.windowW * 0.9, this.data.windowW * 0.9);
    ctx.draw()
  },

  drawMove() {
    ctx.drawImage(this.data.headImg, 0, 0, this.data.windowW * 0.9, this.data.windowW * 0.9);
    ctx.drawImage(this.data.kouzhaoImg, this.data.x + rectW * 0.25 / 2, this.data.y + rectH / 6 / 2, rectW * 0.75, rectH * 5 / 6);
    ctx.setLineDash([5, 5]);
    ctx.setStrokeStyle('#fff');
    ctx.setLineWidth(3);
    ctx.strokeRect(this.data.x, this.data.y, rectW, rectH);
    ctx.drawImage('img/cancel.png', this.data.x - 20, this.data.y - 20, 40, 40);
    ctx.drawImage('img/move.png', this.data.x + rectW - 20, this.data.y + rectH - 20, 40, 40);
    // ctx.drawImage('img/rotate.png', this.data.x + rectW - 20, this.data.y - 20, 40, 40);
    ctx.drawImage('img/rotate.png', this.data.windowW * 0.9 - 40, 0, 40, 40);
    ctx.draw();
  },

  drawScale(W, H) {
    rectW = W;
    rectH = H;
    this.drawMove();
  },

  drawRotate(){
    rotate = rotate + 0.08;
    ctx.drawImage(this.data.headImg, 0, 0, this.data.windowW * 0.9, this.data.windowW * 0.9);
    ctx.drawImage('img/rotate.png', this.data.windowW * 0.9 - 40, 0, 40, 40);
    ctx.translate(this.data.x + rectW / 2, this.data.y + rectH / 2);
    ctx.rotate(rotate);
    ctx.drawImage(this.data.kouzhaoImg, - rectW / 2 + rectW * 0.25 / 2, - rectH / 2 + rectH / 6 / 2, rectW * 0.75, rectH * 5 / 6);
    ctx.setLineDash([5, 5]);
    ctx.setStrokeStyle('#fff');
    ctx.setLineWidth(3);
    ctx.strokeRect(- rectW / 2, - rectH / 2, rectW, rectH);
    ctx.drawImage('img/cancel.png', - rectW / 2 - 20, - rectH / 2 - 20, 40, 40);
    ctx.drawImage('img/move.png', - rectW / 2 + rectW - 20, - rectH / 2 + rectH - 20, 40, 40);
    // ctx.drawImage('img/rotate.png', this.data.x + rectW - 20, this.data.y - 20, 40, 40);
    ctx.draw();
  },

  touchstart(e) {
    let x = e.touches[0].x,
      y = e.touches[0].y,
      dis = 30;
    if (x < this.data.x + dis && x >= this.data.x - dis && y < this.data.y + dis && y >= this.data.y - dis) {
      console.log("cancel");
      this.drawBg();
      this.setData({
        kouzhaoImg: '',
        x: this.data.windowW/2 - rectW / 2,
        y: this.data.windowW/2 - rectH / 2
      })
    } else if (x < this.data.windowW * 0.9 && x >= this.data.windowW * 0.9 - 40 && y < 40 && y >= 0) {
      console.log('rotate');
      // let disX = x - this.data.x,
      //     disY = y- this.data.y;
      // rotate = rotate + Math.atan(disY / disX) * Math.PI / 180;
      // console.log(rotate);
      this.drawRotate();
    }
  },

  save(){
    if (this.data.headImg==''||this.data.kouzhaoImg==''){
      app.toast("请先选择头像和口罩~");
      return;
    }
    ctx.drawImage(this.data.headImg, 0, 0, this.data.windowW * 0.9, this.data.windowW * 0.9);
    ctx.translate(this.data.x + rectW / 2, this.data.y + rectH / 2);
    ctx.rotate(rotate);
    ctx.drawImage(this.data.kouzhaoImg, - rectW / 2 + rectW * 0.25 / 2, - rectH / 2 + rectH / 6 / 2, rectW * 0.75, rectH * 5 / 6);
    ctx.draw();
    wx.canvasToTempFilePath({
      x: 0,
      y: 0,
      width: this.data.windowW*0.9,
      height: this.data.windowW*0.9,
      canvasId: 'mycanvas',
      fileType: 'png',
      quality: 0,
      success: res=>{
        this.setData({
          isSave:true
        })
        wx.saveImageToPhotosAlbum({
          filePath: res.tempFilePath,
          success: function(res) {},
          fail: function(res) {
            console.log(res);
          },
          complete: function(res) {},
        })
      },
      fail: function(res) {
        console.log(res);
      },
      complete: function(res) {},
    }, this)
  },

  // 分享至朋友圈
  share(){
    if (this.data.headImg == '' || this.data.kouzhaoImg == '') {
      app.toast("请先选择头像和口罩~");
      return;
    }
    if(!this.data.isSave){
      app.toast("请先点击生成头像~");
      return;
    }
    wx.canvasToTempFilePath({
      x: 0,
      y: 0,
      width: this.data.windowW*0.9,
      height: this.data.windowW*0.9,
      canvasId: 'mycanvas',
      fileType: 'png',
      quality: 0,
      success: (res)=>{
        this.setData({
          isShare: true
        })
        this.drawShare(res.tempFilePath);
      },
      fail: function(res) {
        console.log(res);
      },
      complete: function(res) {},
    }, this)
  },

  // 绘制分享图
  drawShare(headImg){
    wx.showLoading({
      title: '生成分享图',
      mask: true
    })
    wx.downloadFile({
      url: `https://image.zhishiring.top/zhishi-mp/kouzhao/${Math.floor(Math.random()*10)+1}.png?x-oss-process=style/default`,
      success: (res)=> {
        // 头像坐标
        let x = this.data.windowW * 0.8 * (275 / 981),
          y = this.data.windowW * 0.8 * (1517 / 981) * (615 / 1517),
          //边长
          a = this.data.windowW * 0.8 * (428 / 981),
          // 圆弧半径
          radius = 20,
          // 圆弧控制点距离
          dis = 20;
        //背景图 
        shareCtx.drawImage(res.tempFilePath, 0, 0, this.data.windowW*0.8, this.data.windowW*0.8*(1517/981));
        // 绘制小程序码
        shareCtx.drawImage("img/code.png", this.data.windowW * 0.8 * (421 / 981), this.data.windowW * 0.8 * (1517 / 981) * (1236 / 1517), this.data.windowW * 0.8 * (151 / 981), this.data.windowW * 0.8 * (151 / 981));
        // 绘制圆角
        shareCtx.beginPath();
        // shareCtx.setFillStyle('yellow');
        // shareCtx.arcTo(x, y + dis, x + dis, y, radius);
        shareCtx.arc(x+dis, y + dis, radius, Math.PI, 1.5* Math.PI);
        shareCtx.moveTo(x + dis, y);
        shareCtx.lineTo(x + a - dis, y);
        // shareCtx.arcTo(x + a - dis, y, x + a, y + dis, radius);
        shareCtx.arc(x + a - dis, y + dis, radius, 1.5*Math.PI, 2 * Math.PI,);
        shareCtx.lineTo(x + a, y + dis);
        shareCtx.lineTo(x + a, y + a - dis);
        // shareCtx.arcTo(x + a, y + a - dis, x + a - dis, y + a, radius);
        shareCtx.arc(x + a - dis, y + a - dis, radius, 0, 0.5 * Math.PI, false);
        shareCtx.lineTo(x + a - dis, y + a);
        shareCtx.lineTo(x + dis, y + a);
        // shareCtx.arcTo(x + dis, y + a, x, y + a - dis, radius);
        shareCtx.arc(x + dis, y + a - dis, radius, 0.5 * Math.PI, 1 * Math.PI);
        shareCtx.lineTo(x, y + a - dis);
        shareCtx.lineTo(x, y + dis);
        // shareCtx.fill();
        shareCtx.closePath();
        shareCtx.clip();
        shareCtx.drawImage(headImg, x, y, a, a);
        shareCtx.draw(); 
        wx.hideLoading();
      },
      fail: function(res) {},
      complete: function(res) {},
    })
  },

  cancelShare(){
    this.setData({
      isShare: false
    })
    // ctx.restore();
    // ctx.draw();
    ctx.drawImage(this.data.headImg, 0, 0, this.data.windowW * 0.9, this.data.windowW * 0.9);
    ctx.translate(this.data.x + rectW / 2, this.data.y + rectH / 2);
    ctx.rotate(rotate);
    ctx.drawImage(this.data.kouzhaoImg, - rectW / 2 + rectW * 0.25 / 2, - rectH / 2 + rectH / 6 / 2, rectW * 0.75, rectH * 5 / 6);
    ctx.draw();
  },

  saveShare(){
    wx.canvasToTempFilePath({
      x: 0,
      y: 0,
      width: this.data.windowW * 0.8,
      height: this.data.windowW * 0.8 * (1517 / 981),
      canvasId: 'canvas',
      fileType: 'png',
      quality: 0,
      success: function(res) {
        wx.saveImageToPhotosAlbum({
          filePath: res.tempFilePath,
          success: function(res) {},
          fail: function(res) {},
          complete: function(res) {},
        })
      },
      fail: function(res) {},
      complete: function(res) {},
    }, this)
  },

  // 进入小程序
  intoHome(){
    wx.switchTab({
      url: '/pages/home/index',
      success: function(res) {},
      fail: function(res) {},
      complete: function(res) {},
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function() {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function() {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function() {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function() {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function() {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function() {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function() {

  }
})