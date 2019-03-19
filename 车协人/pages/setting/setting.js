// pages/setting/setting.js
Page({
  data: {
  },
  clear:function(){
    wx.showModal({
      title: '确认要清除吗？',
      content: '点击确定清除身份认证数据',
      success:function(res){
        if(res.confirm)
        {
          wx.removeStorage({
            key: 'id',
            success: function(res) {
              wx.navigateBack({
                delta: 1
              })
            },
          })
        }
      }
    })
  },
  updatepwd:function(){
    wx.navigateTo({
      url: '/pages/changepassword/changepassword',
    })
  },
  updatecolor:function()
  {
    wx.showToast({
      title: '即将开放！',
      icon:'none'
    })
    // wx.navigateTo({
    //   url: '/pages/changecolor/changecolor',
    // })
  },
  onLoad: function (options) {
  
  },
  onShow: function () {
  
  },
})