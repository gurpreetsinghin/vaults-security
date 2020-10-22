# Vaults Security
## Steps to install
1. Include the following line in config/app.php
```php
Gurpreetsingh\ProjectSecurity\ProjectSecurityServiceProvider::class,
```
2. Publish the vendor first.
```php
php artisan vendor:publish
```
3. Run Migration
```bash
php artisan migrate
```
4. Run Seeding
```bash
php artisan db:seed --class=Gurpreetsinghin\\VaultsSecurity\\Seeds\\VaultsSeeder
```
## Run Admin
- Open followed URL:
```bash
{website_url}/vaults-security/
```
- Login URL:
```bash
{website_url}/vaults-security/admin/login
```