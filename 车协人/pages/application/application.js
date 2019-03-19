// pages/application/application.js
Page({

  data: {
    indicatorDots: true,
    autoplay: true,
    interval: 3000,
    duration: 1000
  },
  changeIndicatorDots: function (e) {
    this.setData({
      indicatorDots: !this.data.indicatorDots
    })
  },
  changeAutoplay: function (e) {
    this.setData({
      autoplay: !this.data.autoplay
    })
  },
  intervalChange: function (e) {
    this.setData({
      interval: e.detail.value
    })
  },
  durationChange: function (e) {
    this.setData({
      duration: e.detail.value
    })
  },
  intorepair:function(){
    wx.navigateTo({
      url: '/pages/repair/repair',
    })
  },
  intomap: function () {
    wx.navigateTo({
      url: '/pages/map/map',
    })
  },
  intozuche: function () {
    wx.navigateTo({
      url: '/pages/zuche/zuche',
    })
  //   wx.showToast({
  //     title: '即将上线！',
  //     icon:'none'
  //   })
  },
  intotuozhan:function(){
    wx.getStorage({
      key: 'id',
      success: function(res) {
        wx.navigateTo({
          url: '/pages/tuozhan/tuozhan',
        })
      },
      fail:function(){
        wx.showToast({
          title: '请先登录哦！',
          icon:'none'
        })
      }
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that=this;
    wx.request({
      url: 'https://1758541396.cn/application.php',
      method:'GET',
      header: {
        'content-type': 'application/json;'
      },
      success:function(res){
        // console.log(res.data);
        that.setData({
          banner: res.data
        })
      }
    })
  },
  bannerfunction:function(e)
  {
    // console.log(e);
    var src=e.target.id;
    wx.navigateTo({
      url:src,
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
  
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
    this.onLoad();
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {
  
  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
  
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {
  
  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
  
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  }
})