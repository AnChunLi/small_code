// pages/member/member.js
Page({
  data:{
  },
  onLoad: function (e) {
    var that = this
    wx.request({
      url: 'https://1758541396.cn/member.php?id='+e.id,
      data: {
      },
      method: 'GET',
      header: {
        'content-type': 'application/json; '
      },
      success: function (res) {
        console.log(res.data);
        that.setData({ 
          member: res.data
         });
      }
    })
  },
  
  call:function(e) {
    var tel = e.currentTarget.id;
    wx.makePhoneCall({
      phoneNumber:tel
    })
  },
  add:function(e)
  {
    var tel = e.currentTarget.id;
    var name = e.currentTarget.dataset.name;
    wx.addPhoneContact({
      firstName: name,
      mobilePhoneNumber: tel
    })
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  }
})