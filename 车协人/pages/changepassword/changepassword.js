// pages/changepassword/changepassword.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
  
  },
  formSubmit:function(e){
    // console.log(e.detail.value);
    var password=e.detail.value.pwd;
    var confirm=e.detail.value.confirmpwd;
    if(password.length==0||confirm.length==0)
    {
        wx.showToast({
          title: '请输入密码',
          icon:'none'
        })
    }
    else
    {
          if (password == confirm) {
            wx.getStorage({
              key: 'id',
              success: function (res) {
                wx.request({
                  url: 'https://1758541396.cn/updatepwd.php?id=' + res.data,
                  data: {
                    pwd: password
                  },
                  method: 'POST',
                  header: {
                    'content-type': "application/x-www-form-urlencoded"
                  },
                  success: function (res) {
                    wx.showToast({
                      title: '修改成功！',
                    })
                    setTimeout(function () {
                      wx.removeStorage({
                        key: 'id',
                      })
                      wx.navigateBack({
                        delta: 2
                      })
                    }, 1000)
                  }
                })
              }
            })
          }
          else {
            wx.showToast({
              title: '输入密码不一致！',
              icon: 'none'
            })
          }
    }
    
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    
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