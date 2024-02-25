# How to Run the project
- First ensure you have Docker installed and if you are on windows
- Ensure you have wsl2 installed
- Run in Vs code with remote development environment
- then run

``bash
vendor/bin/sail artisan migrate .
vendor/bin/sail up
``
# Make sure your system (WSL2) meet php PDF generation requirement
``bash
composer require h4cc/wkhtmltopdf-amd64 0.12.4
composer require h4cc/wkhtmltoimage-amd64 0.12.4
``


# API Testing in postman
