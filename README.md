# Laravel

## Usage
```terminal
# フォルダに移動
cd Documents/laravel 

# docker立ち上げ
docker-compose up -d

# appコンテナに入る
docker-compose exec app bash
```

## ローカル起動
[http://localhost:8081](http://localhost:8081)


## Contoroller作成
```
php artisan make:controller SampleController
```
## Migration作成
```
php artisan make:migration create_テーブル名_table
```
## Seederファイル作成
```
php artisan make:seeder SampleTableSeeder
```
## ServiceProvaider作成
```
php artisan make:provider SampleServiceProvider
```
## Middleware作成
```
php artisan make:middleware SampleMiddleware
```
## FormRequest作成
```
php artisan make:request SampleRequest
```
## Model作成
```
php artisan make:model モデル名
```

## Laravel8
[https://readouble.com/laravel/8.x/ja/](https://readouble.com/laravel/8.x/ja/)
