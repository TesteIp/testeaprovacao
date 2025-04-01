FROM php:8.0-cli

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    git unzip zip && \
    docker-php-ext-install pdo_mysql

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar o diretório de trabalho
WORKDIR /app

# Copiar arquivos do projeto
COPY . .

# Instalar dependências do Composer
RUN composer install

# Comando padrão
CMD ["vendor/bin/phpunit", "--testdox"]