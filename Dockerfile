FROM php:8.0-apache
COPY . /Users/amalul/IdeaProjects/mta-final-project-2022-W84
WORKDIR /Users/amalul/IdeaProjects/mta-final-project-2022-W84
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get upgrade -y