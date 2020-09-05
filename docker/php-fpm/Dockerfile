FROM phpdockerio/php74-fpm:latest
WORKDIR /application

ENV DEBIAN_FRONTEND noninteractive

ADD * /application/

# Installera paket (från packages.list)
RUN apt-get update \
    && cat packages.list | xargs apt-get -y -qq --no-install-recommends install \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# # Installera NodeJS (för Webpack Encore).
# RUN apt-get update \
#     && apt-get -y -qq --no-install-recommends install nodejs npm \
#     && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# # Installera git
# RUN apt-get update \
#     && apt-get -y -qq install git \
#     && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*