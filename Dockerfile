# Use the official PHP image as a base image
FROM php:8.2-cli

# Set the working directory inside the container
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . .

# Expose port (you can change this if your application uses a different port)
EXPOSE 50301

# Command to run the application
CMD ["php", "-S", "0.0.0.0:50301", "main.php"]