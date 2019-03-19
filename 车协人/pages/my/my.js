var app = getApp
Page({
  data: {
  },
  setting:function(e){
    if (e.currentTarget.dataset.id)
    {
      wx.navigateTo({
        url: '/pages/setting/setting'
      })
    }
    else
    {
      wx.showToast({
        title: '你还未登录，无法设置！',
        icon:'none'
      })
    }

  },
  about:function(){
    wx.showModal({
      title: '关于我们',
      content: '技术开发：武汉大学自行车协会\n\n版本信息：v1.0.5\n\n更新日志：新增拓展表单功能\n\n联系客服：1758541396（qq）',
      showCancel:false
    })
  },
  myorder:function(e){
    if (e.currentTarget.dataset.id) {
      wx.navigateTo({
        url: '/pages/myorder/order'
      })
    }
    else {
      wx.navigateTo({
        url: '/pages/login/login'
      })
    }
  },
  myzuche: function (e) {
    if (e.currentTarget.dataset.id) {
      wx.navigateTo({
        url: '/pages/myzuche/myzuche'
      })
    }
    else {
      wx.navigateTo({
        url: '/pages/login/login'
      })
    }
  },
  login: function (e) {
    // console.log(e);
    if (e.currentTarget.dataset.id) {
      wx.showToast({
        title: '你已完成认证！',
        icon: 'succes',
        duration: 2000
      })
    }
    else {
      wx.navigateTo({
        url: '/pages/login/login'
      })
    }
  },
  myinformation:function(){
    wx.getStorage({
      key: 'id',
      success: function(res) {
        wx.navigateTo({
          url: '/pages/myinformation/myinformation',
        })
      },
      fail:function(){
        wx.showToast({
          title: '请先登录！',
          icon:'none'
        })
      }
    })
    
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
    wx.getStorage({
      key: 'id',
      success: function(res) {
        that.setData({userid:res.data})
        wx.request({
          url: 'https://1758541396.cn/member.php?id=' +res.data,
          data: {
          },
          method: 'GET',
          header: {
            'content-type': 'application/json; '
          },
          success: function (res) {
            // console.log(res.data);
            that.setData({
              member: res.data
            });
          }
        })
      },
      fail:function()
      {
        that.setData({ userid:0 })
      }
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