FROM node:14.16-buster-slim

ADD /frontend /frontend
ADD ./.env ./.env

WORKDIR /frontend

RUN npm install

EXPOSE 3000
