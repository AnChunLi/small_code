// pages/zuchedetail/zuchedetail.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
  
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (e) {
    var that = this;
    wx.request({
      url: 'https://1758541396.cn/bycycle/getbycycledetail.php',
      method: 'GET',
      data:{
        id:e.id
      },
      header: {
        'content-type': 'application/json;'
      },
      success: function (res) {
        that.setData({
          bycycle: res.data
          
        })
      }
    })
  },
  call: function (e) {
    var tel = e.currentTarget.id;
    wx.makePhoneCall({
      phoneNumber: tel
    })
  },
  position:function(e){
    var lat = parseFloat(e.currentTarget.dataset.lat);
    var long = parseFloat(e.currentTarget.dataset.long);
    var name = e.currentTarget.dataset.name;
    wx.openLocation({
      latitude: lat,
      longitude: long,
      name:name
    })
  },
  previewimage: function (e) {
    var image = e.currentTarget.dataset.image;
    // console.log(image);
    wx.previewImage({
      current: image, // 当前显示图片的http链接
      urls: [image]
    })
  },
  formSubmit:function(e){
    var data = e.detail.value;
    var id = e.detail.target.id;
    wx.getStorage({
      key: 'id',
      success: function(res) {
        if(data.time.length==0)
        {
          wx.showToast({
            title: '请输入租车期限！',
            icon:'none'
          })
        }
        else{
          wx.request({
            url: 'https://1758541396.cn/bycycle/zuche.php?id='+res.data,
            data: {
              during: data.time,
              bycycleid:id
            },
            method: 'POST',
            header: {
              'content-type': "application/x-www-form-urlencoded"
            },
            success: function (res) {
              wx.showToast({
                title: '提交成功',
                icon: 'succes',
                duration: 2000,
                mask: true
              })
            }
          })
          setTimeout(function(){
            wx.navigateTo({
              url: '/pages/myzuche/myzuche',
            })
          },1000)
        }
      },
      fail:function(){
        wx.showToast({
          title: '请先登录，才能租车哦！',
          icon:'none'
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