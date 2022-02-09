up:	do own nginxpermission chmod 


do:
	docker exec geo_locator_php-fpm_1 $(COM)

own:
	docker exec geo_locator_php-fpm_1 chown 1000:1000 -R ./

nginxpermission:
	docker exec geo_locator_nginx_1 chown 1000:1000 -R ./

chmod:
	chmod 777 -R ./


