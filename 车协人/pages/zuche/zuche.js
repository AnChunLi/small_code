// pages/zuche/zuche.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
  
  },
  zuche:function(e){
    var id=e.currentTarget.dataset.id;
    wx.navigateTo({
      url: '/pages/zuchedetail/zuchedetail?id='+id,
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that=this;
    wx.request({
      url: 'https://1758541396.cn/bycycle/getbycycle.php',
      method:'GET',
      header: {
        'content-type': 'application/json;'
      },
      success:function(res){
        that.setData({
          bycyclelist:res.data
        })
      }
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
      duration: 200
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