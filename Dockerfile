FROM nginx:1.25
COPY dist /usr/share/nginx/html
COPY nginx.conf /etc/nginx/nginx.conf