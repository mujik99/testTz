copy repository

copy files to local web server

create db 'your db name'

change filename .env.example to .env

change settings in file to 

BROADCAST_DRIVER=redis<br>
QUEUE_DRIVER=redis<br>
REDIS_HOST=127.0.0.1<br>
REDIS_PASSWORD=null<br>
REDIS_PORT=6379<br>

set in this files your db password and db name

start console go to project folder, enter php artisan migrate

<h3>socket io</h3>

make sure that you have:<br>
  Node 6.0+<br>
  Redis 3+<br>
  Laravel 5.3+ <br>
<br>

install predis library<br>
composer require predis/predis

start npm console , go to project folder 
enter 'npm install -g laravel-echo-server'
enter 'laravel-echo-server init'

After this command in the root of your project should create a file laravel-echo-server.json

Install Laravel Echo and Socket.IO clients

npm install --save laravel-echo<br>
npm install --save socket.io-client<br>

After all settings open npm console and write 'laravel-echo-server start'

open new console with project<br>
enter php artisan queue:listen --tries=1

enter url http://localhost.site/
