# этап сборки (build stage)
FROM node:16.3.0-alpine as develop-stage
WORKDIR /tretyakov_gallery
COPY ./tretyakov_gallery/package*.json ./
RUN npm install
COPY ./tretyakov_gallery ./
ENV NUXT_PORT=3000
ENV NUXT_HOST=0.0.0.0
#RUN npm run serve

# этап сборки (build stage)
FROM develop-stage as build-stage
RUN npm run build

# этап production (production-stage)
FROM build-stage as production-stage
EXPOSE 3000
CMD ["npm", "run", "start"]