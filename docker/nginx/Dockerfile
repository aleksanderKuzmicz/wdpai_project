FROM nginx:1.17.8-alpine

# Copy the public directory
# COPY ./public/ /app/public /
# COPY nginx files to '/app' directiory on nginx server
COPY . /app/

# COPY the nginx config file to standard nginx configuration directory
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf
