# Messendger

### Messendger v1
Запуск через ms1.php
Использует users.json

### Messendger v2
Запуск через ms2.php
Использует БД. Параметры подключения к БД прописать в файле src/config.php

## Запуск скрипта в консоли
1. Перейти в директорию с php файлом
2. Прописать в консоли:
```bash
php -S 0.0.0.0:port script
```
3. Открыть страницу сервера через адресную строку используя команду:
```bash
*.*.*.*:port/?login=Satan&&pass=123&&text=wqeqw
```

### Примечания
- Вместо ```script``` вставить название скрипта, например ms1.php
- Вместо ```port``` на шагах 2 и 3 необходимо подставить номер порта понравившегося порта.
- Вместо ```*.*.*.*``` подставить ip сервера.
- После ```login=``` написать логин, который есть в файле user.json, с соответствующим паролем ```pass=```.
- После ```text=``` написать текст, который хотите написать.
