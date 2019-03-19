// pages/myinformation/myinformation.js
// pages/member/member.js
Page({
  data: {
  },
  onLoad: function () {
    var that = this
    wx.getStorage({
      key: 'id',
      success: function(res) {
        wx.request({
          url: 'https://1758541396.cn/member.php?id=' + res.data,
          data: {
          },
          method: 'GET',
          header: {
            'content-type': 'application/json; '
          },
          success: function (res) {
            that.setData({
              member: res.data
            });
          }
        })
      },
      fail:function(){
        wx.showToast({
          title: '获取失败！',
          icon:'none'
        })
      }
    })
    
  },
  update:function(){
    wx.navigateTo({
      url: '/pages/updateinformation/updateinformation',
    })
  },
  onShow() {
    this.onLoad();
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})