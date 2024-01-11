# Use an official PHP runtime as a parent image
FROM php:8.0-apache
COPY ./app ./
EXPOSE 3000
CMD ["php","-S","0.0.0.0:3000"]