# Laravel 项目

## [Bootcamp](https://bootcamp.laravel.com/)

- Blade 是 Laravel 附带的简单而强大的模板引擎。HTML 将在服务器端渲染，使其轻松包含来自数据库的动态内容，使用 Tailwind CSS
    - `php artisan make:model -mrc Chirp`
    - 添加路由、实现控制器逻辑和页面
        - index 展示
            - `Chirp::with('user')->latest()->get()`
                - 用 Eloquent 的 with 方法来预加载每个 Chirp 关联的用户
                - 用了 latest 作用域来按时间倒序返回记录
        - store 保存
        - 'edit', 'update' 编辑|创建
        - delete
    - 在 $request->user() 对象上调用了 chirps 方法，需要在 User 模型上创建此方法以定义一个 "一对多" 关系
    - 批量赋值漏洞 如果将整个请求传递给模型，用户可以编辑任何列，
        - Laravel 默认阻止批量赋值，从而保护免受意外操作的影响
        - 批量赋值非常方便，可以防止逐个分配每个属性，通过将安全属性标记为“可填充”来启用批量赋值。
    - 默认情况下 ` Gate::authorize('update', $chirp);` 方法阻止所有人更新
      Chirp
        - 通过命令 `php artisan make:policy ChirpPolicy --model=Chirp` 创建一个模型策略
          来指定谁被允许更新它
    - 通知和事件
        - 创建新的 Chirp 时发送电子邮件通知。 除了支持发送电子邮件外，还支持通过各种交付渠道发送通知，包括电子邮件、短信和
          Slack。还创建了各种社区构建的通知渠道
        - 通知 `php artisan make:notification NewChirp`
        - 事件 `php artisan make:event ChirpCreated` 可以在应用程序生命周期的任何地方派发事件，但由于我们的事件与
          Eloquent 模型的创建有关，可以配置 Chirp 模型派发事件
        - 创建一个监听器订阅 ChirpCreated
          事件 `php artisan make:listener SendChirpCreatedNotifications --event=ChirpCreated`
            - 用 ShouldQueue 接口标记了监听器，告诉 Laravel 监听器应该在队列 中运行。
            - 默认情况下，将使用“数据库”队列异步处理作业。要开始处理排队的作业，应该在终端中运行 `php artisan queue:work`
              命令
- Livewire 是一种使用 PHP 构建动态、反应式前端 UI 的强大方法
- 用 Inertia Vue 和 React 连接起来

```curl
GET 	/chirps 	index 	chirps.index
POST 	/chirps 	store 	chirps.store
GET 	/chirps/{chirp}/edit 	edit 	chirps.edit
PUT/PATCH 	/chirps/{chirp} 	update 	chirps.update
DELETE 	/chirps/{chirp} 	销毁 	chirps.destroy

GET	 /photos	index	photos.index
GET	 /photos/create	create	photos.create
POST /photos	store	photos.store
GET	 /photos/{photo}	show	photos.show
GET	 /photos/{photo}/edit	edit	photos.edit
PUT/PATCH	/photos/{photo}	update	photos.update
DELETE	/photos/{photo}	destroy	photos.destroy
```

## [TDD 构建 Laravel 论坛笔记](https://learnku.com/docs/forum-in-laravel-tdd)

- [Let's Build A Forum with Laravel and TDD](https://laracasts.com/series/lets-build-a-forum-with-laravel)
    - [Code](https://github.com/laracasts/Lets-Build-a-Forum-in-Laravel)

### forum

1.Thread `php artisan make:model Thread -mr`
2.Reply `php artisan make:model Reply -mr`
3.User

- A.Thread is created by a user
- B.A reply belongs to a thread,and belongs to a user.

### 步骤

- 数据填充
    - `php artisan tinker`
    - `factory('App\Reply',50)->create();`
- `php artisan make:auth`

### 工具

- Pest
    - pest --dirty
    - pest --bail # stop execution on first non-passing test
    - pest --filter 'returns a successful response'
    - pest --retry # reorders higher priority to failed tests
    - pest --group|--exclude-group # Like PHPUnit, filter by test groups.
    - pest --todo # List tests marked as `->todo()`
