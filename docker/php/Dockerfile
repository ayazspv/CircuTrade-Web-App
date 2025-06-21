FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    zip \
    mariadb-client \
    && docker-php-ext-install pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js (latest LTS)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www/backend

# Copy backend files
COPY ./backend /var/www/backend

# Install PHP and Node dependencies
RUN composer install
RUN npm install

# Expose port for built-in server if needed
EXPOSE 8000

CMD ["php-fpm"]
