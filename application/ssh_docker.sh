if [ $1 = "mysql" ]; then
    docker exec -it laravel-botman_database_1 mysql -utradebyte -ptradebyte tradebyte
elif [ $1 = "nginx" ]; then
    docker exec -it laravel-botman_web_1 bash
elif [ $1 = "php" ]; then
    docker exec -it laravel-botman_app_1 bash
else 
    echo "Please pass container as an argument(mysql/nginx/php)."
fi        
