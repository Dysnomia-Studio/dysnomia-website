FROM nginx:1.27
COPY dist /usr/share/nginx/html
COPY nginx.conf /etc/nginx/nginx.conf