// pages/login/login.js
Page({
  data: {

  },
  formSubmit: function (e) {
    var data = e.detail.value;
    if(data.text=='')
    {
      wx.showToast({
        title: '请输入故障内容！',
        icon:'none'
      })
    }
    else{
      wx.getStorage({
        key: 'id',
        success: function (res) {
          // 查询是否完成审核
          var userid = res.data;
          wx.request({
            url: 'https://1758541396.cn/member.php?id=' +userid ,
            data: {
            },
            method: 'GET',
            header: {
              'content-type': 'application/json;'
            },
            success: function (res) {
              if (res.data.shenhe == 1) {
                // 预约表单上传
                wx.request({
                  url: 'https://1758541396.cn/repair.php?id=' + userid,
                  data: {
                    'text': data.text
                  },
                  method: 'POST',
                  header: {
                    'content-type': 'application/x-www-form-urlencoded; '
                  },
                  success: function (res) {
                    console.log(res.data);
                    wx.showToast({
                      title: '预约成功！'
                    });
                    wx.navigateTo({
                      url: '/pages/myorder/order',
                    })
                  }
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
        fail: function () {
          wx.showToast({
            title: '请先完成身份认证！',
            icon:'none'
          })
        }
      })
    }
  }
})