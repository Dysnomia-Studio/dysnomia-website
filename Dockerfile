FROM nginx:1.26.1

RUN  touch /var/run/nginx.pid && \
     chown -R nginx:nginx /var/cache/nginx /var/run/nginx.pid /etc/nginx/conf.d/

USER nginx

COPY --chown=nginx:nginx dist /usr/share/nginx/html
COPY --chown=nginx:nginx nginx.conf /etc/nginx/nginx.conf
