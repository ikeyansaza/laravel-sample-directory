#イメージのベースを指定
FROM php:8.1-fpm

#composerのインストール
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

#パッケージ管理ツールapt-getの更新と必要パッケージのインストール
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
&& docker-php-ext-install pdo_mysql bcmath && \
pecl install xdebug && \
docker-php-ext-enable xdebug

WORKDIR /app

#コンテナ内に入った時のディレクトリを指定
WORKDIR /app
