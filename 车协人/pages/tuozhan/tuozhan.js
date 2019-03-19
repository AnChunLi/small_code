// pages/tuozhan/tuozhan.js
Page({
  data: {
    bikeindex: 0,
    joinindex:0,
    cycleindex:0,
    joinguanliindex:0,
    gatindex:0,
    bike: ['公路车', '山地车','共享单车','死飞','BMX/街车','速降','通勤用自行车'],
    objectBike: [
      {
        id: 0,
        name: '公路车'
      },
      {
        id: 1,
        name: '山地车'
      },
      {
        id: 2,
        name: '共享单车'
      },
      {
        id: 3,
        name: '死飞'
      },
      {
        id: 4,
        name: 'BMX/街车'
      },
      {
        id: 5,
        name: '速降'
      },
      {
        id: 6,
        name: '通勤用自行车'
      },
    ],
    shifou: ['否', '是'],
    objectShifou: [
      {
        id: 0,
        name:'否'
      },
      {
        id: 1,
        name: '是'
      }
    ],

  },
  bindbikeChange: function (e) {
    console.log('picker发送选择改变，携带值为', e.detail.value)
    this.setData({
      bikeindex: e.detail.value
    })
  },
  bindjoinChange: function (e) {
    console.log('picker发送选择改变，携带值为', e.detail.value)
    this.setData({
      joinindex: e.detail.value
    })
  },
  bindcycleChange: function(e) {
    console.log('picker发送选择改变，携带值为', e.detail.value)
    this.setData({
      cycleindex: e.detail.value
    })
  },
  joinguanliChange: function (e) {
    console.log('picker发送选择改变，携带值为', e.detail.value)
    this.setData({
      joinguanliindex: e.detail.value
    })
  },
  gatChange: function (e) {
    console.log('picker发送选择改变，携带值为', e.detail.value)
    this.setData({
      gatindex: e.detail.value
    })
  },
  formSubmit: function (e) {
    var that = this;
    var data = e.detail.value;
    // console.log(data);
    if(data.distance.length==0)
    {
      wx.showToast({
        title: '请填写完整哦！',
        icon:'none'
      })
    }
    else
    {
      wx.getStorage({
        key: 'id',
        success: function(res) {
          wx.request({
            url: 'https://1758541396.cn/tuozhan.php?id='+res.data,
            data:{
              biketype:data.bike,
              joinchedui:data.join,
              cycle:data.cycle,
              distance:data.distance,
              joinguanli:data.joinguanli,
              gat:data.gat
            },
            method: 'POST',
            header: {
              'content-type': "application/x-www-form-urlencoded"
            },
            success:function(res){
              wx.showToast({
                title: '提交成功！',
              })
              setTimeout(function(){
                wx.navigateBack({
                  delta:1
                })
              },1000)
            }
          })
        },
      })
      
    }
  },

})