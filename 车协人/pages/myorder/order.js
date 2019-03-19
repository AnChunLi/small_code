// pages/myorder/order.js
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
    
    var that = this;
    wx.getStorage({
      key: 'id',
      success: function (res) {
        that.setData({ userid: res.data })
        wx.request({
          url: 'https://1758541396.cn/myorder.php?id=' + res.data,
          data: {
          },
          method: 'GET',
          header: {
            'content-type': 'application/json; '
          },
          success: function (res) {
            console.log(res.data);
            that.setData({
              order: res.data,
            });
          },
        })
      },
      
    })
  },


  

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  }
})