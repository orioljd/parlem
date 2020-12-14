# Objectiu del codi

Es tracta de fer una fitxa de client amb els seus productes, aquestes dades s'obtindran mitjançant una API:

> **ATENCIÓ**: no hi ha restricció de accés, s'haria doncs de programar alguna manera d'obtenir i utilitzar les credencials necessàries per accedir a aquesta informació privada.


## Part backend
- Crear la taula en base de dades de clients i productes (customers & products)
- Omplir les taules amb 10 clients i 2 productes per client.
- Fer un API per consultar clients i els seus productes corresponents.

## Part frontend
- Crear una fitxa de client
- Fer Crides a les api per tal d'obtenir la informació.

# Ús de Laravel com a framework

S'ha utilitzat Laravel com a framework.

- [Web oficial de laravel](https://laravel.com/).

## instal·lació
Per al correcte funcionamient, després d'haver fet `clone` del projecte,
des del directori del projecte hauriem d'executar:

- Crear les taules en base de dades parlem (o el nom que es vulgui)
- copiar .env.example com a .env -> `cp .env.example .env`
- Generar clau php `php artisan key:generate`
- Modificar les dades de tots els DB_... en `.env` amb els valors adients
- Fem `composer install` que instalarà totes les dependencies
- Fem `php artisan migrate --seed` que crearà les taules customers i products i les omplirà.

### Problemes de permisos en Linux
Es posible que hi hagin problemes de permisos d'accés als directoris
logs i cache per això es recomendable seguir les instruccions en el cas de que passi:

- https://stackoverflow.com/a/37266353/7047274

# Utilització de la API (partim que la URL base es parlem.local)

## Llistat de clients (mètode GET)
`http://parlem.local/api/customer`

## Obtenir un client per id (mètode GET)
`http://parlem.local/api/customer/49`

- 49 es l'identificador del client que es vol obtenir

## Llistat de productes (mètode GET)
`http://parlem.local/api/product?customer=49`
- customer es per filtrar que volem els productes del client 49