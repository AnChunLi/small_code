//index.js
Page({
  data: {
    list:[],
  },
  onLoad: function () {
    var that=this;
    var nowtime = Date.parse(Date())+8*3600000;
    wx.request({
      url: 'https://1758541396.cn/training.php',
      data: {
      },
      method: 'GET',
      header: {
        'content-type': 'application/json; '
      },
      success: function (res) {
        // console.log(res.data);
        that.setData({
          list: res.data,
          nowtime:nowtime
        });
        // console.log(nowtime);
      }
    })
  },
  go:function(e){
    var lat = parseFloat(e.currentTarget.dataset.lat);
    var long = parseFloat(e.currentTarget.dataset.long);
    var name = e.currentTarget.dataset.place;
    wx.openLocation({
      latitude: lat,
      longitude: long,
      name:name
    })
  },
  previewimage:function(e){
    var image = e.currentTarget.dataset.image;
    // console.log(image);
    wx.previewImage({
      current:image, // 当前显示图片的http链接
      urls: [image]
    })
  },
  text:function(e){
    var text = e.currentTarget.dataset.text;
    wx.showModal({
      title: '活动说明',
      content: text,
      showCancel:false,
      confirmText:'知道了'
    })
  },
  onShareAppMessage()
  {

  },
  onShow: function () {
    this.onLoad();
  },
  onPullDownRefresh: function () {
    wx.showToast({
      title: '加载中',
      icon: "loading",
      duration: 200
    })
    this.onLoad();
    wx.stopPullDownRefresh();
  },   
})