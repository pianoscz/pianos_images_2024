#!/bin/bash
set -e

# Use www-data directly
USER_ID=33
GROUP_ID=33

# Create group if it doesn't exist
grep -q "^www-data:" /etc/group || addgroup -g $GROUP_ID www-data

# Create user if it doesn't exist
grep -q "^www-data:" /etc/passwd || adduser -D -u $USER_ID -G www-data www-data

# Create target directories if they don't exist
mkdir -p /var/www/html/web/{sites,repository,upload,log}

# Set ownership to www-data
chown -R $USER_ID:$GROUP_ID /tmp/{sites,repository,upload,log}
chown -R $USER_ID:$GROUP_ID /var/www/html/web/{sites,repository,upload,log}

# Function to copy files, set permissions and create .gitkeep
copy_directory() {
    local src_dir="/tmp/$1"
    local dest_dir="/var/www/html/web/$1"
    
    # Copy files
    gosu www-data cp -n -r "$src_dir"/* "$dest_dir"/ 2>/dev/null || true
    
    # Create .gitkeep
    gosu www-data touch "$dest_dir/.gitkeep"
    
    # Set directory permissions
    chmod 755 "$dest_dir"  # drwxr-xr-x for directory itself
    find "$dest_dir" -type d -exec chmod 755 {} \;  # drwxr-xr-x for all subdirectories
    find "$dest_dir" -type f -exec chmod 644 {} \;  # -rw-r--r-- for all files
    
    echo "/$1 structure copied and permissions set (only new files that didn't exist)"
}

# Execute copies and permission sets for each directory
copy_directory "sites"
copy_directory "repository"
copy_directory "upload"
copy_directory "log"

echo "All directories processed"