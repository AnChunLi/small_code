// pages/register/register.js
Page({
  data: {
    index:0,
    genderindex:0,
    school:['资环','遥感','测绘','印包','生科','物院','化院','电信','计院','数院','新传','社会','历史','文院','政管','马院','哲院','国学','信管','经管','法院','外院','动机','药院','基医','健康','口腔','电气','水院','艺术','城设','土建','国软','弘毅'],
    objectSchool: [
      {
        id: 0,
        name: '资环'
      },
      {
        id: 1,
        name: '遥感'
      },
      {
        id: 2,
        name: '测绘'
      },
      {
        id: 3,
        name: '印包'
      },
      {
        id: 4,
        name: '生科'
      }, 
      {
        id: 5,
        name: '物院'
      },
      {
        id: 6,
        name: '化院'
      },
      {
        id: 7,
        name: '电信'
      },
      {
        id: 8,
        name: '计院'
      },
      {
        id: 9,
        name: '数院'
      },
      {
        id: 10,
        name: '新传'
      },
      {
        id:11,
        name: '社会'
      },
      {
        id: 12,
        name: '历史'
      },
      {
        id: 13,
        name: '文院'
      },
      {
        id: 14,
        name: '政管'
      },
      {
        id: 15,
        name: '马院'
      },
      {
        id: 16,
        name: '哲院'
      },
      {
        id: 17,
        name: '国学'
      },
      {
        id: 18,
        name: '信管'
      },
      {
        id: 19,
        name: '经管'
      },
      {
        id: 20,
        name: '法院'
      },
      {
        id: 21,
        name: '外院'
      },
      {
        id: 22,
        name: '动机'
      },
      {
        id: 23,
        name: '药院'
      },
      {
        id: 24,
        name: '基医'
      },
      {
        id: 25,
        name: '健康'
      },
      {
        id: 26,
        name: '口腔'
      },
      {
        id: 27,
        name: '电气'
      },
      {
        id: 28,
        name: '水院'
      },
      {
        id: 29,
        name: '艺术'
      },
      {
        id: 30,
        name: '城设'
      },
      {
        id: 31,
        name: '土建'
      },
      {
        id: 32,
        name: '国软'
      },
      {
        id: 33,
        name: '弘毅'
      },

    ],
    gender:['男','女'],
    objectGender:[
      {
        id:0,
        name:'男'
      },
      {
        id:1,
        name:'女'
      }
    ],
    imageList: [],
    imagesrc:""
   
  },
  bindschoolChange: function (e) {
    console.log('picker发送选择改变，携带值为', e.detail.value)
    this.setData({
      index: e.detail.value
    })
  },
  bindgenderChange: function (e) {
    console.log('picker发送选择改变，携带值为', e.detail.value)
    this.setData({
      genderindex: e.detail.value
    })
  },
  chooseImage: function (event) {
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
          url: 'https://1758541396.cn/uploadschoolcard.php',
          filePath: tempFilePaths[0],
          name: 'file',
          header: { 'content-type':"multipart/form-data"},
          formData: {},
          success: function(res) {
            that.setData({
              imagesrc: res.data
              // 成功之后返回图片路径
            })
            wx.showToast({
              title: '上传成功！',
              icon:'none'
            })
          },
          fail: function(res){
            wx.showToast({
              title: '上传失败！',
              icon: 'none'
            })
          },
        })
      }
    })
  },
  
  previewImage: function (e) {
    var that = this;
    var dataid = e.currentTarget.dataset.id;
    var imageList = that.data.imageList;
    wx.previewImage({
      current: imageList[dataid],
      urls: this.data.imageList
    });
  },
  formSubmit: function (e) {
          var that = this;  
          var data=e.detail.value;
          var formid = e.detail.formId;
    if (e.detail.value.name.length == 0 || e.detail.value.studentnumber.length == 0 || e.detail.value.school.length == 0 || e.detail.value.grade.length == 0 || e.detail.value.gender.length == 0 || e.detail.value.tel.length == 0 || e.detail.value.qq.length == 0 || e.detail.value.sushe.length == 0 || e.detail.value.password.length == 0 || e.detail.value.password2.length == 0 ) {
            wx.showToast({
              title: '不能留空！',
              image:'../../image/fail.png',
              duration: 2000})
        } else if (e.detail.value.password2 != e.detail.value.password) {
            wx.showToast({
              title: '密码不一致！',
              image: '../../image/fail.png',
              duration: 2000
            })
        }
          else {
            var image = this.data.imagesrc;
            console.log(this.data.imagesrc);
            wx.request({
              url: 'https://1758541396.cn/userregister.php',
              data: {
                name: data.name,
                studentnumber: data.studentnumber,
                school: data.school,
                grade: data.grade,
                gender: data.gender,
                tel: data.tel,
                qq: data.qq,
                sushe: data.sushe,
                password: data.password,
                imagesrc:image,
                formid: formid
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
                  mask: true,
                  success: function () {
                    wx.navigateBack({
                      delta: 1
                    })
                  }
                })
              }

            })
          }
          
  },
  formReset: function () {
    console.log('form发生了reset事件')
  },
  
})