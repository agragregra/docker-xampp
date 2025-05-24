# Docker XAMPP (PHP MySQL phpMyAdmin)
Docker configuration for running PHP application with MySQL (MySQLi/PDO) and phpMyAdmin.

## Clone
```
git clone https://github.com/agragregra/docker-xampp . && rm -rf trunk .git && chmod +x run.sh
```

## Features
- **PHP**: Stable PHP version.
- **MySQL**: Stable MySQL version.
- **DB**: MySQLi & PDO.
- **phpMyAdmin**: Stable version.
- **Composer** (uncomment "command").

## Server
  - ./www:/opt/lampp/htdocs
  - http: http://localhost
  - https: https://localhost:8443
  - phpMyAdmin: http://localhost/phpmyadmin/ (user: 'root' | password: '')

## Service

* ./run.sh args
```
Usage: ./run.sh { backup | bash | deploy | down | prune | up }
```

* import db
```
docker-compose exec -T xampp /opt/lampp/bin/mysql test < backup.sql
```

* export db
```
docker-compose exec xampp /opt/lampp/bin/mysqldump test > backup.sql
```

## Troubleshooting
```
chmod -R 777 .
linux: sed -i 's/\r$//' run.sh
macos: sed -i '' 's/\r$//' run.sh
```

## Troubleshooting NTFS /mnt Issues

If you encounter issues when using this setup with MySQL data stored on an NTFS partition (e.g., /mnt in WSL2), it may be due to permission or compatibility problems with the file system. Follow these steps to resolve them:

1. Adding the [automount] block to /etc/wsl.conf
```
grep -q "\[automount\]" /etc/wsl.conf || echo -e "\n[automount]\noptions=\"metadata,umask=0022\"" | sudo tee -a /etc/wsl.conf
```

2. Then restart WSL:
```
logout
wsl --shutdown
```

Note: This configuration ensures proper metadata handling and sets a umask of 0022 to align file permissions with WSL2 and MySQL requirements. After restarting, re-run your Docker Compose setup to verify the fix
