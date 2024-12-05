#!/bin/bash

# Copy sites structure
cp -n -r /tmp/sites/* /var/www/html/web/sites/
echo "Sites structure copied (only new files that didn't exist)"

# Copy repository structure
cp -n -r /tmp/repository/* /var/www/html/web/repository/
echo "/repository structure copied (only new files that didn't exist)"

# Copy upload structure
cp -n -r /tmp/upload/* /var/www/html/web/upload/
echo "/upload structure copied (only new files that didn't exist)"

# Copy log structure
cp -n -r /tmp/log/* /var/www/html/web/log/
echo "/log structure copied (only new files that didn't exist)"

# Create .gitkeep files
touch /var/www/html/web/sites/.gitkeep
touch /var/www/html/web/repository/.gitkeep
touch /var/www/html/web/log/.gitkeep
touch /var/www/html/web/upload/.gitkeep

# Keep container running
tail -f /dev/null
