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
```bash
./vendor/bin/sail up
 
./vendor/bin/sail composer require laravel/octane

```
# Front-end
```bash
npm install
npm run dev
```



# API Testing in postman
