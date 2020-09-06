#執行開發者伺服器
php artisan serve

#建立資料表遷移 migration
php artisan make:migration create_posts_table

php artisan make:migration add_user_id_to_posts --table=posts


#執行migration
php artisan migrate

#回復上一次migrate
php artisan migrate:rollback

#重製migration
php artisan migrate:reset

#查看migration狀態
php artisan migrate:status

#建立Controller
php artisan make:controller postcontroller

#使用resource建立Controller 
php artisan make:controller PostController --resource

#查詢路由
php artisan route:list

#建立Model
php artisan make:model Post

參數
- c: controller
- m: migration
- r: resource

#建立AUTH(會員系統)
php artisan make:auth

#建立storage連結
php artisan storage:link