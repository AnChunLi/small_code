// pages/addrelease/addrelease.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    imageList: [],
    imagesrc:[],
  },
  
  formSubmit: function (e) {
    var data = e.detail.value;
    if (data.text.length==0) {
      wx.showToast({
        title: '请输入发布内容！',
        icon:'none'
      })
    }
    else
    {
      var image = this.data.imagesrc;
      wx.getStorage({
        key: 'id',
        success: function (res) {
          var userid = res.data;
          wx.request({
            url: 'https://1758541396.cn/release/addrelease.php',
            data: {
              'text': data.text,
              "userid":userid,
              "image":image

            },
            method: 'POST',
            header: {
              'content-type': 'application/x-www-form-urlencoded;'
            },
            success: function (res) {
              // console.log(res.data);
              wx.navigateBack({
                delta: 1
              })
            }

          })
                
         } ,
        fail:function(res){
          wx.showToast({
            title: '请先完成身份认证！',
            icon:'none'
          })
        }
      })
    }
  },
  // 添加图片
  addimage:function(event){
    var that = this;
    wx.chooseImage({
      count: 1,
      sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
      sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
      success: function (res) {
        var imgeList = that.data.imageList.concat(res.tempFilePaths);
        that.setData({
          imageList: imgeList
        });
        // 上传图片
        const tempFilePaths = res.tempFilePaths;
        wx.uploadFile({
          url: 'https://1758541396.cn/release/uploadimage.php',
          filePath: tempFilePaths[0],
          name: 'file',
          header: { 'content-type': "multipart/form-data" },
          formData: {},
          success: function (res) {
            that.data.imagesrc.push(res.data);
              // 成功之后返回图片路径
            // console.log(that.data.imagesrc);
            // console.log(that.data.imagesrc.length);
            if(that.data.imagesrc.length>9)
            { 
              that.data.imagesrc.length=9;
            }
            wx.showToast({
              title: '上传成功！',
              icon: 'none'
            })
          },
          fail: function (res) {
            wx.showToast({
              title: '上传失败！',
              icon: 'none'
            })
          },
        })
      }
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
  
  },


  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
  
  },



  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  }
})