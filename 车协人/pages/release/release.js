// pages/release/release.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
        var that=this;
        wx.request({
          url: 'https://1758541396.cn/release/getrelease.php',
          method: 'GET',
          header: {
            'content-type': 'application/json; '
          },
          success: function (res) {
            // console.log(res.data);
            that.setData({
              release: res.data
            });
          }
        })
  },
  // 发布动态
  turnaddrelease:function(){
    wx.navigateTo({
      url: '/pages/addrelease/addrelease',
    })
  },
  // 预览图片
  previewImage: function (e) {
    var src = e.currentTarget.dataset.id;
    wx.previewImage({
      urls: [src]
    });
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
    wx.showToast({
      title: '加载中',
      icon: "loading",
      duration:400
    })
    this.onLoad();
    wx.stopPullDownRefresh();
    
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