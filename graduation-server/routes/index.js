var express = require('express');
var router = express.Router();
const mysql = require('mysql');
const flakeId = require('flake-idgen'),
  moment = require('moment'),
  biguintFormat = require('biguint-format');

// 数据库配置 
const dbConf = {
  host: 'cdb-n80hluz0.bj.tencentcdb.com',
  user: 'lac_prod', // 用户名
  password: 'laczhishi666', // 密码
  port: '10064',
  database: 'mapTiles' // 数据库名称
};

/* GET home page. */
router.get('/', function (req, res, next) {
  res.render('index', { title: 'Express' });
});

router.post('/add', (req, res) => {
  res.writeHead(200, { 'Content-Type': 'application/json;charset=UTF8' });
  const { nickName, content } = req.body;
  if (!nickName || !content) {
    res.end('参数错误');
    return;
  }
  const connection = mysql.createConnection(dbConf);
  connection.connect();
  connection.query(`insert into remark (id, nick_name, time, content) values ('${biguintFormat(new flakeId().next(), 'hex', { prefix: 'remark' })}', '${nickName}', '${moment(new Date()).format('YYYY-MM-DD HH:mm:ss')}', '${content}')`, err => {
    if (err) console.log('add error', err);
    res.end();
  })
  connection.end();
});

function getRemarkCount() {
  return new Promise((resolve, reject) => {
    const connection = mysql.createConnection(dbConf);
    connection.connect();
    connection.query(`select count(*) as num from remark`, (err, data) => {
      if (err) {
        console.log('getRemarkCount SQL ERROR');
        reject();
      }
      else {
        resolve(data[0]['num']);
      }
    })
    connection.end();
  });
}

router.get('/list/:page/:size', async (req, res) => {
  res.writeHead(200, { 'Content-Type': 'application/json;charset=UTF8' });
  const { page, size } = req.params;
  let total = await getRemarkCount();
  const connection = mysql.createConnection(dbConf);
  connection.connect();
  connection.query(`select * from remark order by time desc limit ${(page - 1) * size}, ${size}`, (err, data) => {
    if (err) console.log('getList SQL ERROR');
    res.end(JSON.stringify({
      data: data,
      hasMore: total - (page - 1) * size <= size ? false : true,
      page: page,
      size: size,
      total: total
    }))
  })
  connection.end();
})

module.exports = router;
