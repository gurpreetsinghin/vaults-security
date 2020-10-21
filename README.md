# Vaults Security
## Steps to install
1. Publish the vendor first.
```php
php artisan vendor:publish
```
2. Include the following line in config/app.php
```php
Gurpreetsingh\ProjectSecurity\ProjectSecurityServiceProvider::class,
```
3. Run Migration
```bash
php artisan migrate
```