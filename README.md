# Objectiu del codi

Es tracta de fer una fitxa de client amb els seus productes, aquestes dades s'obtindran mitjançant una API:

> **ATENCIÓ No hi ha restricció d'accés**: S'hauria doncs de programar. Obtenir i utilitzar les credencials necessàries per accedir a aquesta informació privada.

## Part Backend
- Crear la taula en base de dades de clients i productes (customers & products)
- Omplir les taules amb 10 clients i 2 productes per client.
- Fer un API per consultar clients i els seus productes corresponents.

## Part Frontend
- Crear una fitxa de client
- Fer Crides a les api per tal d'obtenir la informació.

# Ús de Laravel com a framework

S'ha utilitzat Laravel 8 com a framework.

- [Web oficial de laravel](https://laravel.com/).

> **Configuracions inicials**: He deixat totes les configuracions inicials que
venen amb laravel 8, per tant encara que hi sigui no he utilitzat docker, ni les
taules de usuaris.

## Instal·lació
Per al correcte funcionamient, després d'haver fet `clone` del projecte:

- Crear la base de dades `parlem` (o el nom que es vulgui)

- Des del directori del projecte executar:
  - `cp .env.example .env` que copiarà `.env.example` com a `.env`
  - `php artisan key:generate` que genera el `APP_KEY` en el `.env`
- Modificar les dades de tots els DB_... en `.env` amb els valors adients
- Des del directori del projecte executar:
  - `composer install` que instalarà totes les dependencies
  - `php artisan migrate --seed` que crearà les taules customers i products i les omplirà.
  - `npm install` això instalarà totes les dependencies del frontend
  - `npm run prod` això compilarà els javascripts i css que necessita la part de front

## Problemes de permisos en Linux
Es posible que hi hagin problemes de permisos d'accés als directoris
logs i cache per això es recomendable seguir les instruccions en el cas de que passi:

- https://stackoverflow.com/a/37266353/7047274

# Utilització de la API (partim que la URL base es parlem.local)

## Llistat de clients (mètode GET)
`http://parlem.local/api/customer`

## Obtenir un client per id (mètode GET)
`http://parlem.local/api/customer/49`

> 49 es el `customerId` del client que es vol obtenir

## Llistat de productes (mètode GET)
`http://parlem.local/api/product?customer=49`
> customer es per filtrar que volem els productes del client amb `customerId` 49
