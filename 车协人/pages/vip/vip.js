// pages/vip/vip.js
Page({
  data: {
  },
  turn: function () {
    wx.navigateTo({
      url: '/pages/register/register'
    })
  },
  turnmember: function (event) {
    var userid = event.currentTarget.id;
    wx.getStorage({
      key: 'id',
      success: function (res) {
        wx.request({
          url: 'https://1758541396.cn/member.php?id=' + res.data,
          data: {
          },
          method: 'GET',
          header: {
            'content-type': 'application/json;'
          },
          success: function (res) {
            if (res.data.shenhe == 1) {
              wx.navigateTo({
                url: '/pages/member/member?id=' + userid
              })
            } else {
              wx.showToast({
                title: '未完成会员审核',
                image: '../../image/fail.png'
              })
            }
          }
        })
        
      },
      fail: function (res) {
        wx.showToast({
          title: '未登录不能查看哦！',
          icon:'none'
        })
      }
    })
  },
  onShow() {
    this.onLoad();
  },
  onLoad: function () {
    var that = this;
    wx.request({
      url: 'https://1758541396.cn/userrequest.php',
      data: {
      },
      method: 'GET',
      header: {
        'content-type': 'application/json;'
      },
      success: function (res) {
        that.setData({ user: res.data,
          num: res.data.length
         });
        // wx.setNavigationBarTitle({
        //   title: '会员' + '(' + res.data.length + ')',
        // })
      }
    })
    wx.getStorage({
      key: 'id',
      success: function(res) {
        that.setData({
          isregister:1
        })
      },
      fail:function(){
        that.setData({
          isregister:0
        })
      }
    })
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
})

