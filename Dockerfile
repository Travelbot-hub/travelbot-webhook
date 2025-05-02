# Use an official PHP image from the Docker Hub
FROM php:8.0-cli

# Set the working directory in the container
WORKDIR /var/www/html

# Copy your project files into the container
COPY . /var/www/html

# Expose the port the app will run on
EXPOSE 80

# Start the PHP built-in web server
CMD ["php", "-S", "0.0.0.0:80"]
