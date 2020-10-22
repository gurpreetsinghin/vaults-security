# Vaults Security
## Steps to install
1. Include the following line in config/app.php
```php
Gurpreetsinghin\VaultsSecurity\ProjectSecurityServiceProvider::class,
```
2. Publish the vendor.
```php
php artisan vendor:publish --provider="Gurpreetsinghin\VaultsSecurity\ProjectSecurityServiceProvider"
```
3. Run Migration
```bash
php artisan migrate
```