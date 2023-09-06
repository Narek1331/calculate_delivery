composer i 
php artisan key:generate
cp .env.example .env
configure .env file (database)
configure .env (SLOW_DELIVERY_COST_KG,FAST_DELIVERY_COST_KG,SLOW_DELIVERY_COST_KM_DURING_DAY,FAST_DELIVERY_COST_KM_DURING_DAY)
php artisan migrate --seed 
