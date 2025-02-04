# アプリケーションPigly

## 環境構築
git clone 

dockerビルド docker-compose up -d --build

Laravel環境構築

docker-compose exec php bash

composer install

「.env.example」を 「.env」に名前を変更して作成。 「.env」の環境変数を変更する

DB_CONNECTION=mysql

DB_HOST=mysql

DB_PORT=3306

DB_DATABASE=laravel_db

DB_USERNAME=laravel_user

DB_PASSWORD=laravel_pass

アプリケーションキーの作成
php artisan key:generate

マイグレーションの実行
php artisan migrate

シーディングの実行
php artisan db:seed

## 使用技術(実行環境)
PHP 8.4.1  
Laravel 8.83.8  
MySQL 8.0.26

## ER図


## URL
開発環境: http://localhost/weight.logs
