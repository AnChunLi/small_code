FROM node:8.17.0-stretch-slim
#暴露端口3000
EXPOSE 3000

#定义时区参数
ENV TZ=Asia/Shanghai
#设置时区
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo '$TZ' > /etc/timezone

#参数，node的环境为生产环境
ENV NODE_ENV=production
#任意ip
ENV HOST 0.0.0.0
#容器内创建目录app
RUN mkdir -p /app
#复制当前的内容到容器内容部目录app
COPY . /app
#切换工作目录到app
WORKDIR /app
#安装cnpm
RUN npm install cnpm -g --registry=https://registry.npm.taobao.org
#安装依赖
RUN cnpm install
#start  用ENTRYPOINT， CMD会覆盖参数
ENTRYPOINT ["npm","start"]
