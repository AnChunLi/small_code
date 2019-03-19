// pages/map/map.js
Page({
  data:{
  },
  onReady: function (e) {
    // 使用 wx.createMapContext 获取 map 上下文
    this.mapCtx = wx.createMapContext('myMap');
  },
  onLoad:function()
  {
    var that=this;
    wx.request({
      url: 'https://1758541396.cn/map.php',
      method: 'GET',
      header: {
        'content-type': 'application/json;'
      },
      success:function(res)
      {
        // console.log(res.data);
          that.setData({
            markers:res.data
          })
      }
    })
  },
  markertap(e)
  {
    var markerid=e.markerId;
    var arr=this.data.markers;
    var lat;
    var long;
    var name;
    for(var i=0;i<arr.length;i++)
    {
      if(arr[i].id===markerid)
      {
        lat = parseFloat(arr[i].latitude);
        long = parseFloat(arr[i].longitude);
        name=arr[i].callout.content;
      }
    }
    wx.openLocation({
      latitude: lat,
      longitude: long,
      name:name
    })
    
  },
  markerid(e)
  {
    var markerid = e.markerId;
    var arr = this.data.markers;
    var lat;
    var long;
    var name;
    for (var i = 0; i < arr.length; i++) {
      if (arr[i].id === markerid) {
        lat = parseFloat(arr[i].latitude);
        long = parseFloat(arr[i].longitude);
        name = arr[i].callout.content;
      }
    }
    wx.openLocation({
      latitude: lat,
      longitude: long,
      name: name
    })
  },
})