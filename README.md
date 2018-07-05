# Tradebyte Senior PHP Developer Test - PIM System

### Tools, Technologies & Frameworks used used
1. `docker` for environment management
2. `ngnix` web server
3. `php 7.1.12` for backend programs
4. `Mysql 5.7` a database
5. `Laravel 5.*` framework for backend API & web rendering
6. `VueJs 2.*` for frontend
7. `Bootstrap` for UI

### Prerequisites
1. composer installed on local (`This is for temporary, since we don't have enough time to configure everything inside docker`)
2. npm installed on your machine
2. docker client

### Installation Steps:

1. Clone the repository
2. Run this command: `composer update`
3. Then, run this command to install npm dependencies: `npm install`
4. Run this command: `php artisan migrate` inside docker php container. (`You can ssh to container using bash application/ssh_docker.sh php command`)
5. Then run this command: npm run dev
6. Next type this command: `docker-compose up -d` to start required docker environment
7. It will start the server at this URL http://localhost:8091

### For Developers:
1. `npm run watch`
2. To run unit tests `composer test`
3. Browser test `php artisan dusk`
4. API doc available at `http://localhost:8091/doc/index.html`
