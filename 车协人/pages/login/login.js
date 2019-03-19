// pages/login/login.js
Page({
  data: {
  
  },
  formSubmit: function (e) {
    // console.log(e.detail.value);
    var data = e.detail.value;
    wx.request({
      url: 'https://1758541396.cn/login.php',
      data: {
        'studentnumber': data.studentnumber,
        'password': data.password
      },
      method: 'POST',
      header: {
        'content-type': 'application/x-www-form-urlencoded; '
      },
          success:function(res)
          {
            // console.log(res.data);
            if(res.data){
              wx.setStorage({
                key: 'id',
                data: res.data.id
              })
             
              wx.navigateBack({
                delta: 1
              })

            }else{
              wx.showToast({
                title: '认证失败',
                icon:'loading',
                duration:2000
              })
            }
          }
    })
  },
  register:function(){
    wx.navigateTo({
      url: '/pages/register/register'
    })
  }
})