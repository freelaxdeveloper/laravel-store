## Laravel store

Интрнет-магазин на базе фреймворка Laravel v5.6

### Инструкции по работе с очередями
<dl>
  <dt>Устанавливаем Supervisor</dt>
  <dd>

    sudo apt-get install supervisor
  </dd>
  <dt>Создаем конфигурационный файл <b>/etc/supervisor/conf.d/laravel-worker.conf</b></dt>
  <dd>

  ```
  [program:laravel-worker]
  process_name=%(program_name)s_%(process_num)02d
  command=php /var/www/dcmsx/artisan queue:work database --sleep=3 --tries=3
  autostart=true
  autorestart=true
  user=root
  numprocs=8
  redirect_stderr=true
  stdout_logfile=/var/log/worker.log
  ```

  </dd>
  <dt>После создания файла настроек обновляем конфигурацию Supervisor и запускаем его</dt>
  <dd>
  
    sudo supervisorctl reread
    sudo supervisorctl update
    sudo supervisorctl start laravel-worker:*
  </dd>
  
  <dt>После изменения в очередях, выполнить команду</dt>
  <dd>
  
    php artisan queue:restart
  </dd>
  <dt>Для работы очередей </dt>
</dl>