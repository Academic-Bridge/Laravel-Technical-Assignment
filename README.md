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

# Access the Queued email
- http://localhost:8025 

# Swager open APi doc

- Once the app is running, you can access the Swagger API doc at http://localhost/docs/api
<img width="958" alt="image" src="https://github.com/richard457/Laravel-Technical-Assignment/assets/8529700/1d94c486-ed01-48a4-a5a7-a79e4326adf4">


# Front-end
```bash
npm install
npm run dev
```



# API Testing in postman
