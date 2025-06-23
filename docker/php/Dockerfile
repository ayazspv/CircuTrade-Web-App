FROM php:8.2-cli

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

# Install Node.js (optional for your backend)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www/backend

# Copy composer files first and install dependencies
COPY ./backend/composer.json ./backend/composer.lock* ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy the rest of the backend files
COPY ./backend ./

# Install Node dependencies if package.json exists
RUN [ -f package.json ] && npm install || true

# Expose PHP built-in server port
EXPOSE 8000

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "."]
