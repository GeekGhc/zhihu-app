## Laravel-Zhihu
基于Laravel5.3 开发

## 前言
基于[laravist](https://www.laravist.com/)社区知乎系列项目
  
修复了一些bug 增加了几项功能

## 功能

### 用户
- [x] 登录注册(邮件认证)
- [x] 用户设置
- [x] 头像上传至七牛云存储
- [x] 修改密码
- [x] 忘记密码(邮件认证)
- [x] 用户相互关注(邮件提醒)
- [x] 用户发送私信(消息通知)
- [x] 显示私信(已读和未读)
- [x] 标志私信
- [x] 标志私信全部已读
- [x] 回复私信
- [x] 个人主页(各项数据)

### 问题
- [x] 问题列表
- [x] 收藏问题(消息通知)
- [x] 分享问题到第三方
- [x] 问题答案评论(消息通知)
- [x] 问题评论,答案评论(消息通知)
- [x] 答案点赞
- [x] 发布问题
- [x] 修改问题(仅限问题的作者)
- [x] 删除问题(仅限问题的作者)

## 效果预览
![7](public/screenshot/7.png)
![2](public/screenshot/2.png)
![6](public/screenshot/6.png)
![5](public/screenshot/5.png)
![3](public/screenshot/3.png)

## 安装
### 1.克隆源码到本地
> git clone https://github.com/GeekGhc/zhihu-app

### 2.进入项目目录
> cd zhihu-app

### 3. 拷贝`.env`文件
一些 `secret key` 改成自己服务的`key`即可
> cp .env.example .env

### 4. 下载相关的依赖包(也可以使用yarn)
下载`laravel`相关依赖的包
> composer install

### 5. 创建数据
> php artisan zhihu:install