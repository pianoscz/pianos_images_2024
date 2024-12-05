FROM alpine:latest

# Install necessary packages
RUN apk add --no-cache bash wget

# Install gosu and verify its installation
RUN set -eux; \
    wget -O /usr/local/bin/gosu "https://github.com/tianon/gosu/releases/download/1.17/gosu-amd64" \
    && chmod +x /usr/local/bin/gosu \
    && /usr/local/bin/gosu --version || (echo "Gosu installation failed" && exit 1)

# Create all required directories with full sites structure
RUN mkdir -p /tmp/sites /tmp/repository /tmp/upload /tmp/log

# Copy sites structure to a temporary location
COPY sites /tmp/sites/
COPY log /tmp/log/
COPY upload /tmp/upload/
COPY repository /tmp/repository/

COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

