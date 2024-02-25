# How to Run the project
- First ensure you have Docker installed and if you are on windows
- Ensure you have wsl2 installed
- Run in Vs code with remote development environment
- then run

```bash
vendor/bin/sail artisan migrate .
vendor/bin/sail up
```
# Make sure to use octane to speed up the application
- You might need to cancel sail up after the command to configure octane then re-run it again for
- the app to reflect to binaries required for octane
```bash
./vendor/bin/sail up
 
./vendor/bin/sail composer require laravel/octane

./vendor/bin/sail artisan octane:install --server=frankenphp

```
# Swager open APi doc

- Once the app is running, you can access the swagger API doc at http://localhost/api/documentation

# Front-end
```bash
npm install
npm run dev
```



# API Testing in postman
