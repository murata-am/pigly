# アプリケーションPigly

## 環境構築
git clone git@github.com:murata-am/pigly.git

dockerビルド docker-compose up -d --build

Laravel環境構築

docker-compose exec php bash

composer install

アプリケーションキーの作成
php artisan key:generate

マイグレーションの実行
php artisan migrate

シーディングの実行
php artisan db:seed

## テストユーザーのログイン情報　　　　
メールアドレス：test@example.com      
パスワード：testpass      

## 使用技術(実行環境)
PHP 8.4.1  
Laravel 8.83.8  
MySQL 8.0.26

## ER図
![er-diagram weightlog](https://github.com/user-attachments/assets/e278f914-ba86-4854-8f54-657f6ba47b98)


## URL
開発環境: http://localhost/weight.logs
