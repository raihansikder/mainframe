---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.

<!-- END_INFO -->

#Comments


APIs for managing comments
<!-- START_41edaace5e42c41885474c6cd130d70b -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/comments?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/comments?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/comments",
        "per_page": 20,
        "prev_page_url": null,
        "to": 5,
        "total": 5,
        "items": [
            {
                "id": 1,
                "uuid": "118b4820-557b-4b6d-b645-b2827251831f",
                "project_id": null,
                "tenant_id": null,
                "name": null,
                "type": null,
                "body": "lore ipsum dolor sit amet",
                "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "commentable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 09:20:10",
                "updated_at": "2020-02-25 09:20:10",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "10717df9-4f29-4832-a7eb-0b9f4f7913ca",
                "project_id": null,
                "tenant_id": null,
                "name": null,
                "type": null,
                "body": "lets see how things go",
                "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "commentable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 09:25:56",
                "updated_at": "2020-02-25 09:25:56",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 3,
                "uuid": "f1d39614-a496-47e5-94c9-150a4e62b4bd",
                "project_id": null,
                "tenant_id": null,
                "name": null,
                "type": null,
                "body": "Rifat Shara\r\nFebruary 12, 2020, 2:38 PM\r\n\r\nRaihan Sikder ​- Emailed Kuldeep about the intention of updating the logic. Also, sent him the list of tenants that are currently available in live DB for their acknowledgment\r\n\r\nN.B-Staging DB cannot be aligned with live DB as the images folder is big enough which causes space shortage issues when I upload it in the staging server.",
                "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "commentable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 09:32:58",
                "updated_at": "2020-02-25 09:32:58",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 4,
                "uuid": "b3cb1392-fbcd-465d-8441-ef827767db29",
                "project_id": null,
                "tenant_id": null,
                "name": null,
                "type": null,
                "body": "asdfasdfasdf asdf",
                "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "commentable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 09:36:08",
                "updated_at": "2020-02-25 09:36:08",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 5,
                "uuid": "dacb2547-7a66-424d-9f6c-bb045c207bfa",
                "project_id": null,
                "tenant_id": null,
                "name": null,
                "type": null,
                "body": "Alexander Pierce Rifat Shara February 12, 2020, 2:38 PM Raihan Sikder ​- Emailed Kuldeep about the intention of updating the logic. Also, sent him the list of tenants that are currently available in live DB for their acknowledgment N.B-Staging DB cannot be aligned with live DB as the images folder is big enough which causes space shortage issues when I upload it in the staging server.",
                "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "commentable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 10:45:41",
                "updated_at": "2020-02-25 10:45:41",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/comments"
}
```

### HTTP Request
`GET api/1.0/comments`


<!-- END_41edaace5e42c41885474c6cd130d70b -->

<!-- START_2d268a8bd3474df308cac7cf151c21f1 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/comments/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/comments\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/comments\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/comments\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/comments\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/comments/{id}/uploads`


<!-- END_2d268a8bd3474df308cac7cf151c21f1 -->

<!-- START_4cabc1268a0d852559f2ad3dcfbe989b -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/comments/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/comments/{id}/uploads`


<!-- END_4cabc1268a0d852559f2ad3dcfbe989b -->

<!-- START_0cfea4c61738666b048c64475acad675 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/comments`


<!-- END_0cfea4c61738666b048c64475acad675 -->

<!-- START_b8bde86cbfd0416eb79f905a40fa54db -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "118b4820-557b-4b6d-b645-b2827251831f",
        "project_id": null,
        "tenant_id": null,
        "name": null,
        "type": null,
        "body": "lore ipsum dolor sit amet",
        "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
        "commentable_id": 2,
        "module_id": 50,
        "element_id": 2,
        "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2020-02-25 09:20:10",
        "updated_at": "2020-02-25 09:20:10",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/comments\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/comments/{comment}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_b8bde86cbfd0416eb79f905a40fa54db -->

<!-- START_bee78264817bbed4ee5405ac85eb455f -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/comments/{comment}`

`PATCH api/1.0/comments/{comment}`


<!-- END_bee78264817bbed4ee5405ac85eb455f -->

<!-- START_7300c7fe0e893014693ac32e714255d2 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/comments/{comment}`


<!-- END_7300c7fe0e893014693ac32e714255d2 -->

#Countries


APIs for managing countries
<!-- START_8d1da7c9c664bb449e9598f5c005ff35 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/countries?page=1",
        "from": 1,
        "last_page": 13,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/countries?page=13",
        "next_page_url": "http:\/\/localhost\/api\/1.0\/countries?page=2",
        "path": "http:\/\/localhost\/api\/1.0\/countries",
        "per_page": 20,
        "prev_page_url": null,
        "to": 20,
        "total": 252,
        "items": [
            {
                "id": 1,
                "uuid": null,
                "name": "Benin",
                "code": "9999",
                "country_id": "24",
                "iso2": "BJ",
                "country_short_name": "Benin",
                "country_long_name": "Republic of Benin",
                "iso3": "BEN",
                "numcode": "204",
                "un_member": "yes",
                "calling_code": "229",
                "cctld": ".bj",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 2,
                "uuid": null,
                "name": "Russia",
                "code": "9999",
                "country_id": "182",
                "iso2": "RU",
                "country_short_name": "Russia",
                "country_long_name": "Russian Federation",
                "iso3": "RUS",
                "numcode": "643",
                "un_member": "yes",
                "calling_code": "7",
                "cctld": ".ru",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 3,
                "uuid": null,
                "name": "Norway",
                "code": "9999",
                "country_id": "165",
                "iso2": "NO",
                "country_short_name": "Norway",
                "country_long_name": "Kingdom of Norway",
                "iso3": "NOR",
                "numcode": "578",
                "un_member": "yes",
                "calling_code": "47",
                "cctld": ".no",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 4,
                "uuid": null,
                "name": "Burkina Faso",
                "code": "9999",
                "country_id": "36",
                "iso2": "BF",
                "country_short_name": "Burkina Faso",
                "country_long_name": "Burkina Faso",
                "iso3": "BFA",
                "numcode": "854",
                "un_member": "yes",
                "calling_code": "226",
                "cctld": ".bf",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 5,
                "uuid": null,
                "name": "Japan",
                "code": "9999",
                "country_id": "111",
                "iso2": "JP",
                "country_short_name": "Japan",
                "country_long_name": "Japan",
                "iso3": "JPN",
                "numcode": "392",
                "un_member": "yes",
                "calling_code": "81",
                "cctld": ".jp",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 6,
                "uuid": null,
                "name": "Slovakia",
                "code": "9999",
                "country_id": "201",
                "iso2": "SK",
                "country_short_name": "Slovakia",
                "country_long_name": "Slovak Republic",
                "iso3": "SVK",
                "numcode": "703",
                "un_member": "yes",
                "calling_code": "421",
                "cctld": ".sk",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "EUR",
                "currency_symbol": "€",
                "currency_override": "EUR",
                "currency_override_symbol": "€"
            },
            {
                "id": 7,
                "uuid": null,
                "name": "Luxembourg",
                "code": "9999",
                "country_id": "128",
                "iso2": "LU",
                "country_short_name": "Luxembourg",
                "country_long_name": "Grand Duchy of Luxembourg",
                "iso3": "LUX",
                "numcode": "442",
                "un_member": "yes",
                "calling_code": "352",
                "cctld": ".lu",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "EUR",
                "currency_symbol": "€",
                "currency_override": "EUR",
                "currency_override_symbol": "€"
            },
            {
                "id": 8,
                "uuid": null,
                "name": "Malta",
                "code": "9999",
                "country_id": "136",
                "iso2": "MT",
                "country_short_name": "Malta",
                "country_long_name": "Republic of Malta",
                "iso3": "MLT",
                "numcode": "470",
                "un_member": "yes",
                "calling_code": "356",
                "cctld": ".mt",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "EUR",
                "currency_symbol": "€",
                "currency_override": "EUR",
                "currency_override_symbol": "€"
            },
            {
                "id": 9,
                "uuid": null,
                "name": "Kazakhstan",
                "code": "9999",
                "country_id": "114",
                "iso2": "KZ",
                "country_short_name": "Kazakhstan",
                "country_long_name": "Republic of Kazakhstan",
                "iso3": "KAZ",
                "numcode": "398",
                "un_member": "yes",
                "calling_code": "7",
                "cctld": ".kz",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 10,
                "uuid": null,
                "name": "Iraq",
                "code": "9999",
                "country_id": "105",
                "iso2": "IQ",
                "country_short_name": "Iraq",
                "country_long_name": "Republic of Iraq",
                "iso3": "IRQ",
                "numcode": "368",
                "un_member": "yes",
                "calling_code": "964",
                "cctld": ".iq",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 11,
                "uuid": null,
                "name": "Ukraine",
                "code": "9999",
                "country_id": "233",
                "iso2": "UA",
                "country_short_name": "Ukraine",
                "country_long_name": "Ukraine",
                "iso3": "UKR",
                "numcode": "804",
                "un_member": "yes",
                "calling_code": "380",
                "cctld": ".ua",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 12,
                "uuid": null,
                "name": "Hungary",
                "code": "9999",
                "country_id": "100",
                "iso2": "HU",
                "country_short_name": "Hungary",
                "country_long_name": "Hungary",
                "iso3": "HUN",
                "numcode": "348",
                "un_member": "yes",
                "calling_code": "36",
                "cctld": ".hu",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "EUR",
                "currency_symbol": "€",
                "currency_override": "EUR",
                "currency_override_symbol": "€"
            },
            {
                "id": 13,
                "uuid": null,
                "name": "Australia",
                "code": "9999",
                "country_id": "14",
                "iso2": "AU",
                "country_short_name": "Australia",
                "country_long_name": "Commonwealth of Australia",
                "iso3": "AUS",
                "numcode": "36",
                "un_member": "yes",
                "calling_code": "61",
                "cctld": ".au",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 14,
                "uuid": null,
                "name": "San Marino",
                "code": "9999",
                "country_id": "192",
                "iso2": "SM",
                "country_short_name": "San Marino",
                "country_long_name": "Republic of San Marino",
                "iso3": "SMR",
                "numcode": "674",
                "un_member": "yes",
                "calling_code": "378",
                "cctld": ".sm",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 15,
                "uuid": null,
                "name": "Lesotho",
                "code": "9999",
                "country_id": "123",
                "iso2": "LS",
                "country_short_name": "Lesotho",
                "country_long_name": "Kingdom of Lesotho",
                "iso3": "LSO",
                "numcode": "426",
                "un_member": "yes",
                "calling_code": "266",
                "cctld": ".ls",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 16,
                "uuid": null,
                "name": "Haiti",
                "code": "9999",
                "country_id": "96",
                "iso2": "HT",
                "country_short_name": "Haiti",
                "country_long_name": "Republic of Haiti",
                "iso3": "HTI",
                "numcode": "332",
                "un_member": "yes",
                "calling_code": "509",
                "cctld": ".ht",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 17,
                "uuid": null,
                "name": "Latvia",
                "code": "9999",
                "country_id": "121",
                "iso2": "LV",
                "country_short_name": "Latvia",
                "country_long_name": "Republic of Latvia",
                "iso3": "LVA",
                "numcode": "428",
                "un_member": "yes",
                "calling_code": "371",
                "cctld": ".lv",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "EUR",
                "currency_symbol": "€",
                "currency_override": "EUR",
                "currency_override_symbol": "€"
            },
            {
                "id": 18,
                "uuid": null,
                "name": "Vatican City",
                "code": "9999",
                "country_id": "241",
                "iso2": "VA",
                "country_short_name": "Vatican City",
                "country_long_name": "State of the Vatican City",
                "iso3": "VAT",
                "numcode": "336",
                "un_member": "no",
                "calling_code": "39",
                "cctld": ".va",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 19,
                "uuid": null,
                "name": "Cambodia",
                "code": "9999",
                "country_id": "38",
                "iso2": "KH",
                "country_short_name": "Cambodia",
                "country_long_name": "Kingdom of Cambodia",
                "iso3": "KHM",
                "numcode": "116",
                "un_member": "yes",
                "calling_code": "855",
                "cctld": ".kh",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            },
            {
                "id": 20,
                "uuid": null,
                "name": "Yemen",
                "code": "9999",
                "country_id": "248",
                "iso2": "YE",
                "country_short_name": "Yemen",
                "country_long_name": "Republic of Yemen",
                "iso3": "YEM",
                "numcode": "887",
                "un_member": "yes",
                "calling_code": "967",
                "cctld": ".ye",
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": null,
                "updated_at": null,
                "deleted_at": null,
                "deleted_by": null,
                "currency": "USD",
                "currency_symbol": "$",
                "currency_override": "USD",
                "currency_override_symbol": "$"
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/countries"
}
```

### HTTP Request
`GET api/1.0/countries`


<!-- END_8d1da7c9c664bb449e9598f5c005ff35 -->

<!-- START_327d95b66178e9d6ac9566d6e3947a0d -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/countries/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/countries\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/countries\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/countries\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/countries\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/countries/{id}/uploads`


<!-- END_327d95b66178e9d6ac9566d6e3947a0d -->

<!-- START_e0b600c95443a9b41b709953657a08d8 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/countries/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/countries/{id}/uploads`


<!-- END_e0b600c95443a9b41b709953657a08d8 -->

<!-- START_5b0ba41bddc44c4a79c172e786d871c5 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/countries`


<!-- END_5b0ba41bddc44c4a79c172e786d871c5 -->

<!-- START_2c728b12bdcbf3615641c12b41266c2e -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/countries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": null,
        "name": "Benin",
        "code": "9999",
        "country_id": "24",
        "iso2": "BJ",
        "country_short_name": "Benin",
        "country_long_name": "Republic of Benin",
        "iso3": "BEN",
        "numcode": "204",
        "un_member": "yes",
        "calling_code": "229",
        "cctld": ".bj",
        "is_active": 1,
        "created_by": null,
        "updated_by": null,
        "created_at": null,
        "updated_at": null,
        "deleted_at": null,
        "deleted_by": null,
        "currency": "USD",
        "currency_symbol": "$",
        "currency_override": "USD",
        "currency_override_symbol": "$"
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/countries\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/countries/{country}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_2c728b12bdcbf3615641c12b41266c2e -->

<!-- START_0d724dff7e699df1f786206640b15c69 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/countries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/countries/{country}`

`PATCH api/1.0/countries/{country}`


<!-- END_0d724dff7e699df1f786206640b15c69 -->

<!-- START_bd3e5345baae5ac5ab6741f893eac5c2 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/countries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/countries/{country}`


<!-- END_bd3e5345baae5ac5ab6741f893eac5c2 -->

#Groups


APIs for managing groups
<!-- START_56f82dc0f79f0bac4e81fbec8015aa70 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/groups?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/groups?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/groups",
        "per_page": 20,
        "prev_page_url": null,
        "to": 5,
        "total": 5,
        "items": [
            {
                "id": 1,
                "uuid": "d48c591a-e6b2-4f7b-9458-0693362e55a6",
                "project_id": null,
                "tenant_id": null,
                "name": "superuser",
                "title": "Superuser",
                "permissions": {
                    "superuser": 1
                },
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-10 06:50:18",
                "updated_at": "2019-11-13 15:51:18",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "9c085751-ea3a-44e4-a858-e008894dc1f3",
                "project_id": null,
                "tenant_id": null,
                "name": "api",
                "title": "API",
                "permissions": {
                    "apis": 1,
                    "superuser": 1,
                    "make-api-call": 1
                },
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-10 16:10:53",
                "updated_at": "2020-02-25 11:48:05",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 3,
                "uuid": "2e5c36e4-7ec2-4c77-8167-1e99237c1336",
                "project_id": null,
                "tenant_id": null,
                "name": "tenant-admin",
                "title": "Tenant Admin",
                "permissions": [],
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "1970-01-01 00:00:05",
                "updated_at": "2019-12-19 14:21:45",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 4,
                "uuid": "bacee691-a0f7-4ba2-93b6-462b4af9cfb0",
                "project_id": null,
                "tenant_id": null,
                "name": "project-admin",
                "title": "Project Admin",
                "permissions": [],
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-12-28 14:16:31",
                "updated_at": "2019-12-28 14:16:38",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 26,
                "uuid": "03682753-1654-46f1-ad9d-7a7f78794a3d",
                "project_id": null,
                "tenant_id": null,
                "name": "user",
                "title": "User",
                "permissions": {
                    "uploads": 1,
                    "uploads-view-any": 1,
                    "uploads-view": 1,
                    "uploads-create": 1,
                    "uploads-update": 1,
                    "uploads-delete": 1,
                    "uploads-view-change-log": 1,
                    "uploads-view-report": 1
                },
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-18 11:42:51",
                "updated_at": "2021-01-29 07:35:17",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/groups"
}
```

### HTTP Request
`GET api/1.0/groups`


<!-- END_56f82dc0f79f0bac4e81fbec8015aa70 -->

<!-- START_e155b910bfbfa91df0af786c09d7578b -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/groups/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/groups\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/groups\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/groups\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/groups\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/groups/{id}/uploads`


<!-- END_e155b910bfbfa91df0af786c09d7578b -->

<!-- START_a551f3de836e9475af2de958f17eedfa -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/groups/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/groups/{id}/uploads`


<!-- END_a551f3de836e9475af2de958f17eedfa -->

<!-- START_9da9d3b068469bf28416bf728105aecb -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/groups`


<!-- END_9da9d3b068469bf28416bf728105aecb -->

<!-- START_b08bd21688301bba5d438b6d867b9ad3 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "d48c591a-e6b2-4f7b-9458-0693362e55a6",
        "project_id": null,
        "tenant_id": null,
        "name": "superuser",
        "title": "Superuser",
        "permissions": {
            "superuser": 1
        },
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2018-12-10 06:50:18",
        "updated_at": "2019-11-13 15:51:18",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/groups\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/groups/{group}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_b08bd21688301bba5d438b6d867b9ad3 -->

<!-- START_9b270705b48c6f0f12b9e58a23df2af6 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/groups/{group}`

`PATCH api/1.0/groups/{group}`


<!-- END_9b270705b48c6f0f12b9e58a23df2af6 -->

<!-- START_403d568ce1902212b6c9dd1930d956d0 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/groups/{group}`


<!-- END_403d568ce1902212b6c9dd1930d956d0 -->

#Module-groups


APIs for managing module-groups
<!-- START_7b87d505a4b2516cad0814007d2f4d92 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/module-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/module-groups?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/module-groups?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/module-groups",
        "per_page": 20,
        "prev_page_url": null,
        "to": 2,
        "total": 2,
        "items": [
            {
                "id": 1,
                "uuid": "770e22e8-e572-44a3-9a9a-be7fb1964ae5",
                "name": "app-settings",
                "title": "Settings",
                "description": "Manage configuration",
                "route_path": "app-settings",
                "route_name": "app-settings",
                "parent_id": 0,
                "level": 0,
                "order": 0,
                "default_route": "app-configs.index",
                "color_css": "aqua",
                "icon_css": "fa fa-gears",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-10 06:47:46",
                "updated_at": "2019-10-28 14:07:42",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "a0dc562b-d6ce-45d1-9279-2a8ca2982dc8",
                "name": "accounts",
                "title": "Accounts",
                "description": null,
                "route_path": "app-settings",
                "route_name": "app-settings",
                "parent_id": 0,
                "level": 0,
                "order": 0,
                "default_route": "letsbab.index",
                "color_css": "aqua",
                "icon_css": "fa fa-calculator",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-14 06:18:07",
                "updated_at": "2019-10-28 12:41:42",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/module-groups"
}
```

### HTTP Request
`GET api/1.0/module-groups`


<!-- END_7b87d505a4b2516cad0814007d2f4d92 -->

<!-- START_2ead648cce18b2253b5e7cfb10f3bdce -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/module-groups/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/module-groups\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/module-groups\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/module-groups\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/module-groups\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/module-groups/{id}/uploads`


<!-- END_2ead648cce18b2253b5e7cfb10f3bdce -->

<!-- START_93e47bbdb8765a00d548b78e158692d5 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/module-groups/{id}/uploads`


<!-- END_93e47bbdb8765a00d548b78e158692d5 -->

<!-- START_1415b95a0e65daee0ee488896cae536e -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/module-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/module-groups`


<!-- END_1415b95a0e65daee0ee488896cae536e -->

<!-- START_bcac507c85eaa559188b9d4fe704d1be -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/module-groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "770e22e8-e572-44a3-9a9a-be7fb1964ae5",
        "name": "app-settings",
        "title": "Settings",
        "description": "Manage configuration",
        "route_path": "app-settings",
        "route_name": "app-settings",
        "parent_id": 0,
        "level": 0,
        "order": 0,
        "default_route": "app-configs.index",
        "color_css": "aqua",
        "icon_css": "fa fa-gears",
        "is_visible": 1,
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2018-12-10 06:47:46",
        "updated_at": "2019-10-28 14:07:42",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/module-groups\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/module-groups/{module_group}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_bcac507c85eaa559188b9d4fe704d1be -->

<!-- START_06b0df02f44221aac111cb583a4d9d3b -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/module-groups/{module_group}`

`PATCH api/1.0/module-groups/{module_group}`


<!-- END_06b0df02f44221aac111cb583a4d9d3b -->

<!-- START_e088091c2050a79b9d57d953c8309122 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/module-groups/{module_group}`


<!-- END_e088091c2050a79b9d57d953c8309122 -->

#Modules


APIs for managing modules
<!-- START_44aa204054d79546b60055acfe1374a4 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/modules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/modules?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/modules?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/modules",
        "per_page": 20,
        "prev_page_url": null,
        "to": 17,
        "total": 17,
        "items": [
            {
                "id": 1,
                "uuid": "ca56b8a2-368a-4f84-8336-e9850c406e2d",
                "name": "modules",
                "project_id": null,
                "tenant_id": null,
                "title": "Module",
                "description": "Manage modules",
                "module_table": "modules",
                "route_path": "modules",
                "route_name": "modules",
                "class_directory": "app\/Mainframe\/Modules\/Modules",
                "namespace": "\\App\\Mainframe\\Modules\\Modules",
                "model": "\\App\\Mainframe\\Modules\\Modules\\Module",
                "policy": "\\App\\Mainframe\\Modules\\Modules\\ModulePolicy",
                "processor": "\\App\\Mainframe\\Modules\\Modules\\ModuleProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Modules\\ModuleController",
                "view_directory": "mainframe.modules.modules",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "modules.index",
                "color_css": "aqua",
                "icon_css": "fa fa-puzzle-piece",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-10 06:47:46",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "0b89564c-7198-4b1b-9869-a02a0e584262",
                "name": "module-groups",
                "project_id": null,
                "tenant_id": null,
                "title": "Module group",
                "description": "Manage module groups",
                "module_table": "module_groups",
                "route_path": "module-groups",
                "route_name": "module-groups",
                "class_directory": "app\/Mainframe\/Modules\/ModuleGroups",
                "namespace": "\\App\\Mainframe\\Modules\\ModuleGroups",
                "model": "\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroup",
                "policy": "\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroupPolicy",
                "processor": "\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroupProcessor",
                "controller": "\\App\\Mainframe\\Modules\\ModuleGroups\\ModuleGroupController",
                "view_directory": "mainframe.modules.module-groups",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "moduleg-roups.index",
                "color_css": "aqua",
                "icon_css": "fa fa-puzzle-piece",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-10 06:47:46",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 3,
                "uuid": "eee7b4a8-abab-4b79-a751-b681624eb586",
                "name": "tenants",
                "project_id": null,
                "tenant_id": null,
                "title": "Tenant",
                "description": "Manage tenants",
                "module_table": "tenants",
                "route_path": "tenants",
                "route_name": "tenants",
                "class_directory": "app\/Mainframe\/Modules\/Tenants",
                "namespace": "\\App\\Mainframe\\Modules\\Tenants",
                "model": "\\App\\Mainframe\\Modules\\Tenants\\Tenant",
                "policy": "\\App\\Mainframe\\Modules\\Tenants\\TenantPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Tenants\\TenantProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Tenants\\TenantController",
                "view_directory": "mainframe.modules.tenants",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "tenants.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-10 06:47:46",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 4,
                "uuid": "8f27f918-3a05-4b04-9bd3-d953e9492293",
                "name": "users",
                "project_id": null,
                "tenant_id": null,
                "title": "User",
                "description": "Manage users",
                "module_table": "users",
                "route_path": "users",
                "route_name": "users",
                "class_directory": "app\/Projects\/MyProject\/Modules\/Users",
                "namespace": "\\App\\Projects\\MyProject\\Modules\\Users",
                "model": "\\App\\User",
                "policy": "\\App\\Projects\\MyProject\\Modules\\Users\\UserPolicy",
                "processor": "\\App\\Projects\\MyProject\\Modules\\Users\\UserProcessor",
                "controller": "\\App\\Projects\\MyProject\\Modules\\Users\\UserController",
                "view_directory": "projects.my-project.modules.users",
                "parent_id": 0,
                "module_group_id": 0,
                "level": 0,
                "order": 4,
                "default_route": "users.index",
                "color_css": "aqua",
                "icon_css": "fa fa-user-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-10 06:47:46",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 5,
                "uuid": "14612def-5850-49fb-bf99-48d99c73b589",
                "name": "groups",
                "project_id": null,
                "tenant_id": null,
                "title": "Group",
                "description": "Manage groups",
                "module_table": "groups",
                "route_path": "groups",
                "route_name": "groups",
                "class_directory": "app\/Mainframe\/Modules\/Groups",
                "namespace": "\\App\\Mainframe\\Modules\\Groups",
                "model": "\\App\\Group",
                "policy": "\\App\\Mainframe\\Modules\\Groups\\GroupPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Groups\\GroupProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Groups\\GroupController",
                "view_directory": "mainframe.modules.groups",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "groups.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-10 06:47:46",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 6,
                "uuid": "50ed1cc8-3ecf-4caf-9724-819cd90dd3d2",
                "name": "uploads",
                "project_id": null,
                "tenant_id": null,
                "title": "Upload",
                "description": "Manage uploads",
                "module_table": "uploads",
                "route_path": "uploads",
                "route_name": "uploads",
                "class_directory": "app\/Mainframe\/Modules\/Uploads",
                "namespace": "\\App\\Mainframe\\Modules\\Uploads",
                "model": "\\App\\Mainframe\\Modules\\Uploads\\Upload",
                "policy": "\\App\\Mainframe\\Modules\\Uploads\\UploadPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Uploads\\UploadProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Uploads\\UploadController",
                "view_directory": "mainframe.modules.uploads",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "uploads.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-13 20:57:47",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 21,
                "uuid": "6d1fff93-328b-4501-b643-e21cc6cbf9d2",
                "name": "settings",
                "project_id": null,
                "tenant_id": null,
                "title": "Setting",
                "description": "Manage settings",
                "module_table": "settings",
                "route_path": "settings",
                "route_name": "settings",
                "class_directory": "app\/Mainframe\/Modules\/Settings",
                "namespace": "\\App\\Mainframe\\Modules\\Settings",
                "model": "\\App\\Mainframe\\Modules\\Settings\\Setting",
                "policy": "\\App\\Mainframe\\Modules\\Settings\\SettingPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Settings\\SettingProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Settings\\SettingController",
                "view_directory": "mainframe.modules.settings",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "settings.index",
                "color_css": "aqua",
                "icon_css": "fa fa-list-alt",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-24 19:56:38",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 23,
                "uuid": "3207985e-3886-4a1c-8121-c8e4147cfa72",
                "name": "reports",
                "project_id": null,
                "tenant_id": null,
                "title": "Report",
                "description": "Manage reports",
                "module_table": "reports",
                "route_path": "reports",
                "route_name": "reports",
                "class_directory": "app\/Mainframe\/Modules\/Reports",
                "namespace": "\\App\\Mainframe\\Modules\\Reports",
                "model": "\\App\\Mainframe\\Modules\\Reports\\Report",
                "policy": "\\App\\Mainframe\\Modules\\Reports\\ReportPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Reports\\ReportProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Reports\\ReportController",
                "view_directory": "mainframe.modules.reports",
                "parent_id": 0,
                "module_group_id": 0,
                "level": 0,
                "order": 999,
                "default_route": "reports.index",
                "color_css": "aqua",
                "icon_css": "fa fa-pie-chart",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-01-17 05:00:25",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 50,
                "uuid": "778e5ea8-acee-4458-aab7-5e275a4084a5",
                "name": "lorem-ipsums",
                "project_id": null,
                "tenant_id": null,
                "title": "Lorem ipsum",
                "description": "Manage lorem ipsums",
                "module_table": "lorem_ipsums",
                "route_path": "lorem-ipsums",
                "route_name": "lorem-ipsums",
                "class_directory": "app\/Mainframe\/Modules\/Samples\/LoremIpsums",
                "namespace": "\\App\\Mainframe\\Modules\\LoremIpsums",
                "model": "\\App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "policy": "\\App\\Mainframe\\Modules\\LoremIpsums\\LoremIpsumPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsumProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsumController",
                "view_directory": "mainframe.modules.samples.lorem-ipsums",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "lorem-ipsums.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-11-20 14:08:23",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 51,
                "uuid": "a0c23e13-1bd6-4346-828b-b7878d67ee29",
                "name": "dolor-sits",
                "project_id": null,
                "tenant_id": null,
                "title": "Dolor sit",
                "description": "Manage dolor sits",
                "module_table": "dolor-sits",
                "route_path": "dolor-sits",
                "route_name": "dolor-sits",
                "class_directory": "app\/Mainframe\/Modules\/Samples\/DolorSits",
                "namespace": "\\App\\Mainframe\\Modules\\DolorSits",
                "model": "\\App\\Mainframe\\Modules\\Samples\\DolorSits\\DolorSit",
                "policy": "\\App\\Mainframe\\Modules\\DolorSits\\DolorSitPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Samples\\DolorSits\\DolorSitProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Samples\\DolorSits\\DolorSitController",
                "view_directory": "mainframe.modules.samples.dolor-sits",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "dolor-sits.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-11-20 14:10:34",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 52,
                "uuid": "2da95896-4a15-4ad6-9919-767dabeef9fe",
                "name": "subscriptions",
                "project_id": null,
                "tenant_id": null,
                "title": "Subscription",
                "description": "Manage subscriptions",
                "module_table": "subscriptions",
                "route_path": "subscriptions",
                "route_name": "subscriptions",
                "class_directory": "app\/Mainframe\/Modules\/Subscriptions",
                "namespace": "\\App\\Mainframe\\Modules\\Subscriptions",
                "model": "\\App\\Mainframe\\Modules\\Subscriptions\\Subscription",
                "policy": "\\App\\Mainframe\\Modules\\Subscriptions\\SubscriptionPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Subscriptions\\SubscriptionProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Subscriptions\\SubscriptionController",
                "view_directory": "mainframe.modules.subscriptions",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "subscriptions.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-12-19 14:00:52",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 53,
                "uuid": "11a3b809-b3e0-4c8f-b59a-b99192e99588",
                "name": "packages",
                "project_id": null,
                "tenant_id": null,
                "title": "Package",
                "description": "Manage packages",
                "module_table": "packages",
                "route_path": "packages",
                "route_name": "packages",
                "class_directory": "app\/Mainframe\/Modules\/Packages",
                "namespace": "\\App\\Mainframe\\Modules\\Packages",
                "model": "\\App\\Mainframe\\Modules\\Packages\\Package",
                "policy": "\\App\\Mainframe\\Modules\\Packages\\PackagePolicy",
                "processor": "\\App\\Mainframe\\Modules\\Packages\\PackageProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Packages\\PackageController",
                "view_directory": "mainframe.modules.packages",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "packages.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-12-19 14:39:47",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 54,
                "uuid": "c4582951-e9ee-4d1d-a9de-9230c037699a",
                "name": "countries",
                "project_id": null,
                "tenant_id": null,
                "title": "Country",
                "description": "Manage countries",
                "module_table": "countries",
                "route_path": "countries",
                "route_name": "countries",
                "class_directory": "app\/Mainframe\/Modules\/Countries",
                "namespace": "\\App\\Mainframe\\Modules\\Countries",
                "model": "\\App\\Mainframe\\Modules\\Countries\\Country",
                "policy": "\\App\\Mainframe\\Modules\\Countries\\CountryPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Countries\\CountryProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Countries\\CountryController",
                "view_directory": "mainframe.modules.countries",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "countries.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-12-19 14:39:47",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 55,
                "uuid": "cb21c345-ba75-452c-b326-5c20f6cd17b8",
                "name": "notifications",
                "project_id": null,
                "tenant_id": null,
                "title": "Notification",
                "description": "List of notifications",
                "module_table": "notifications",
                "route_path": "notifications",
                "route_name": "notifications",
                "class_directory": "app\/Mainframe\/Modules\/Notifications",
                "namespace": "\\App\\Mainframe\\Modules\\Notifications",
                "model": "\\App\\Mainframe\\Modules\\Notifications\\Notification",
                "policy": "\\App\\Mainframe\\Modules\\Notifications\\NotificationPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Notifications\\NotificationProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Notifications\\NotificationController",
                "view_directory": "mainframe.modules.notifications",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "notifications.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-12-19 14:39:47",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 57,
                "uuid": "47df59d0-bacb-4d1e-bfda-01c051c63681",
                "name": "projects",
                "project_id": null,
                "tenant_id": null,
                "title": "Project",
                "description": "Manage projects",
                "module_table": "projects",
                "route_path": "projects",
                "route_name": "projects",
                "class_directory": "app\/Mainframe\/Modules\/Projects",
                "namespace": "\\App\\Mainframe\\Modules\\Projects",
                "model": "\\App\\Mainframe\\Modules\\Projects\\Project",
                "policy": "\\App\\Mainframe\\Modules\\Projects\\ProjectPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Projects\\ProjectProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Projects\\ProjectController",
                "view_directory": "mainframe.modules.projects",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "projects.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-12-28 13:57:38",
                "updated_at": "2020-01-23 06:53:54",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 60,
                "uuid": "74ed8001-1178-46f4-b1e6-b6e73fd7ae04",
                "name": "comments",
                "project_id": null,
                "tenant_id": null,
                "title": "Comment",
                "description": "Manage comment",
                "module_table": "comments",
                "route_path": "comments",
                "route_name": "comments",
                "class_directory": "app\/Mainframe\/Modules\/Comments",
                "namespace": "\\App\\Mainframe\\Modules\\Comments",
                "model": "\\App\\Mainframe\\Modules\\Comments\\Comment",
                "policy": "\\App\\Mainframe\\Modules\\Comments\\CommentPolicy",
                "processor": "\\App\\Mainframe\\Modules\\Comments\\CommentProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Comments\\CommentController",
                "view_directory": "mainframe.modules.comments",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "comments.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": null,
                "created_at": "2020-02-25 08:42:04",
                "updated_at": "2020-02-25 08:42:04",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 61,
                "uuid": "0a79b419-8960-4957-badc-ee905f7bf020",
                "name": "changes",
                "project_id": null,
                "tenant_id": null,
                "title": "Change",
                "description": "Manage change",
                "module_table": "changes",
                "route_path": "changes",
                "route_name": "changes",
                "class_directory": "app\/Mainframe\/Modules\/Changes",
                "namespace": "\\App\\Mainframe\\Modules\\Changes",
                "model": "\\App\\Mainframe\\Modules\\Changes\\Change",
                "policy": "\\App\\Mainframe\\Modules\\Changes\\ChangePolicy",
                "processor": "\\App\\Mainframe\\Modules\\Changes\\ChangeProcessor",
                "controller": "\\App\\Mainframe\\Modules\\Changes\\ChangeController",
                "view_directory": "mainframe.modules.changes",
                "parent_id": 0,
                "module_group_id": 1,
                "level": 0,
                "order": 0,
                "default_route": "changes.index",
                "color_css": "aqua",
                "icon_css": "fa fa-plus",
                "is_visible": 1,
                "is_active": 1,
                "created_by": 1,
                "updated_by": null,
                "created_at": "2020-06-02 04:34:41",
                "updated_at": "2020-06-02 04:34:41",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/modules"
}
```

### HTTP Request
`GET api/1.0/modules`


<!-- END_44aa204054d79546b60055acfe1374a4 -->

<!-- START_a42f69b81a4d8c0b493bed7fbad238d4 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/modules/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/modules\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/modules\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/modules\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/modules\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/modules/{id}/uploads`


<!-- END_a42f69b81a4d8c0b493bed7fbad238d4 -->

<!-- START_c67004a31107b325bf8515fb8024e5c4 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/modules/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/modules/{id}/uploads`


<!-- END_c67004a31107b325bf8515fb8024e5c4 -->

<!-- START_9842d449941f1ab66fe30ac8d5abdce9 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/modules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/modules`


<!-- END_9842d449941f1ab66fe30ac8d5abdce9 -->

<!-- START_1350367c675e18d9686da71733c24c7c -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/modules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "ca56b8a2-368a-4f84-8336-e9850c406e2d",
        "name": "modules",
        "project_id": null,
        "tenant_id": null,
        "title": "Module",
        "description": "Manage modules",
        "module_table": "modules",
        "route_path": "modules",
        "route_name": "modules",
        "class_directory": "app\/Mainframe\/Modules\/Modules",
        "namespace": "\\App\\Mainframe\\Modules\\Modules",
        "model": "\\App\\Mainframe\\Modules\\Modules\\Module",
        "policy": "\\App\\Mainframe\\Modules\\Modules\\ModulePolicy",
        "processor": "\\App\\Mainframe\\Modules\\Modules\\ModuleProcessor",
        "controller": "\\App\\Mainframe\\Modules\\Modules\\ModuleController",
        "view_directory": "mainframe.modules.modules",
        "parent_id": 0,
        "module_group_id": 1,
        "level": 0,
        "order": 0,
        "default_route": "modules.index",
        "color_css": "aqua",
        "icon_css": "fa fa-puzzle-piece",
        "is_visible": 1,
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2018-12-10 06:47:46",
        "updated_at": "2020-01-23 06:53:54",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/modules\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/modules/{module}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_1350367c675e18d9686da71733c24c7c -->

<!-- START_686daf998bac2426321566aa2cce5d9e -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/modules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/modules/{module}`

`PATCH api/1.0/modules/{module}`


<!-- END_686daf998bac2426321566aa2cce5d9e -->

<!-- START_436fcad62e095567b176b8de0d66b48b -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/modules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/modules/{module}`


<!-- END_436fcad62e095567b176b8de0d66b48b -->

#Notifications


APIs for managing notifications
<!-- START_64be862e056d566ff15091dfed8d52a9 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/notifications?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/notifications?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/notifications",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/notifications"
}
```

### HTTP Request
`GET api/1.0/notifications`


<!-- END_64be862e056d566ff15091dfed8d52a9 -->

<!-- START_6a44df4299a055c4ee27974f81578af1 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/notifications/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/notifications\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/notifications\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/notifications\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/notifications\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/notifications/{id}/uploads`


<!-- END_6a44df4299a055c4ee27974f81578af1 -->

<!-- START_6c05dc7a19df6f5c12dc376585c738e0 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/notifications/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/notifications/{id}/uploads`


<!-- END_6c05dc7a19df6f5c12dc376585c738e0 -->

<!-- START_e0f35262052ae1c3ea055bfafe578fe1 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/notifications`


<!-- END_e0f35262052ae1c3ea055bfafe578fe1 -->

<!-- START_55dd0015d0743d446d72d44124775913 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/notifications/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Not found"
}
```

### HTTP Request
`GET api/1.0/notifications/{notification}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_55dd0015d0743d446d72d44124775913 -->

<!-- START_f5c72e2c12a553160de5a8f67b407c63 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/notifications/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/notifications/{notification}`

`PATCH api/1.0/notifications/{notification}`


<!-- END_f5c72e2c12a553160de5a8f67b407c63 -->

<!-- START_722bc05de54438c5e46d6a9146650a6a -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/notifications/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/notifications/{notification}`


<!-- END_722bc05de54438c5e46d6a9146650a6a -->

#Packages

APIs for managing packages
<!-- START_416fce805fde3049712d2cec2a95a5cf -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/packages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/packages?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/packages?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/packages",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/packages"
}
```

### HTTP Request
`GET api/1.0/packages`


<!-- END_416fce805fde3049712d2cec2a95a5cf -->

<!-- START_a9770a287b0cd17c1a89d46c2311fe64 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/packages/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/packages\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/packages\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/packages\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/packages\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/packages/{id}/uploads`


<!-- END_a9770a287b0cd17c1a89d46c2311fe64 -->

<!-- START_703750953b15b89c74a8c5b821677362 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/packages/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/packages/{id}/uploads`


<!-- END_703750953b15b89c74a8c5b821677362 -->

<!-- START_218d5bb048c357290ee86d048df4bcf9 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/packages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/packages`


<!-- END_218d5bb048c357290ee86d048df4bcf9 -->

<!-- START_740255810f64ee8bd8b22785265551a6 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/packages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Not found"
}
```

### HTTP Request
`GET api/1.0/packages/{package}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_740255810f64ee8bd8b22785265551a6 -->

<!-- START_131f141a15f0eca1c5b69ce7860fa028 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/packages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/packages/{package}`

`PATCH api/1.0/packages/{package}`


<!-- END_131f141a15f0eca1c5b69ce7860fa028 -->

<!-- START_a2eeced0b41bc6ebe9e3bcd087701df4 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/packages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/packages/{package}`


<!-- END_a2eeced0b41bc6ebe9e3bcd087701df4 -->

#Projects

APIs for managing projects
<!-- START_f6989b34d3f1a54e31c298794eff8f02 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/projects?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/projects?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/projects",
        "per_page": 20,
        "prev_page_url": null,
        "to": 2,
        "total": 2,
        "items": [
            {
                "id": 1,
                "uuid": "b632635d-877b-461e-8f3f-97256567eea7",
                "code": "artp",
                "name": "ArtemisPod",
                "description": null,
                "configuration": null,
                "route_group": "artp",
                "class_directory": "app\/Projects\/ArtemisPod",
                "namespace": "\\App\\ArtemisPod",
                "view_directory": "mainframe.projects.artemis-pod",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-12-28 14:13:40",
                "updated_at": "2019-12-28 14:13:40",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "cedb4d2c-a465-4bb4-818e-09100ed02580",
                "code": "orhc",
                "name": "OrangeHC",
                "description": null,
                "configuration": null,
                "route_group": "orhc",
                "class_directory": "app\/Projects\/OrangeHc",
                "namespace": "\\App\\OrangeHC",
                "view_directory": "mainframe.projects.orange-hc",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-12-28 14:14:04",
                "updated_at": "2019-12-28 14:14:04",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/projects"
}
```

### HTTP Request
`GET api/1.0/projects`


<!-- END_f6989b34d3f1a54e31c298794eff8f02 -->

<!-- START_1db75011616e7112a60fc8f11c1084e0 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/projects/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/projects\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/projects\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/projects\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/projects\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/projects/{id}/uploads`


<!-- END_1db75011616e7112a60fc8f11c1084e0 -->

<!-- START_08002ff9ec16a094173a54a32ce4bfc8 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/projects/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/projects/{id}/uploads`


<!-- END_08002ff9ec16a094173a54a32ce4bfc8 -->

<!-- START_318494bef4a2bb971ef9137ea9348aae -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/projects`


<!-- END_318494bef4a2bb971ef9137ea9348aae -->

<!-- START_231e458a52a5fcd069b0a67b185f453a -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "b632635d-877b-461e-8f3f-97256567eea7",
        "code": "artp",
        "name": "ArtemisPod",
        "description": null,
        "configuration": null,
        "route_group": "artp",
        "class_directory": "app\/Projects\/ArtemisPod",
        "namespace": "\\App\\ArtemisPod",
        "view_directory": "mainframe.projects.artemis-pod",
        "is_active": 1,
        "created_by": 5,
        "updated_by": 5,
        "created_at": "2019-12-28 14:13:40",
        "updated_at": "2019-12-28 14:13:40",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/projects\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/projects/{project}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_231e458a52a5fcd069b0a67b185f453a -->

<!-- START_be947407f971ba940a9f84c407b1f93a -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/projects/{project}`

`PATCH api/1.0/projects/{project}`


<!-- END_be947407f971ba940a9f84c407b1f93a -->

<!-- START_a817b3ae739cff6218a995c864c07498 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/projects/{project}`


<!-- END_a817b3ae739cff6218a995c864c07498 -->

#Reports

APIs for managing reports
<!-- START_5a0b5b630089e753ac99b0b129cdb0a6 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/reports?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/reports?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/reports",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/reports"
}
```

### HTTP Request
`GET api/1.0/reports`


<!-- END_5a0b5b630089e753ac99b0b129cdb0a6 -->

<!-- START_ddf566b7f8fe41d8439b6faa902911ad -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/reports/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/reports\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/reports\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/reports\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/reports\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/reports/{id}/uploads`


<!-- END_ddf566b7f8fe41d8439b6faa902911ad -->

<!-- START_4298a9a3541e9912ff07e6206cf6d09c -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/reports/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/reports/{id}/uploads`


<!-- END_4298a9a3541e9912ff07e6206cf6d09c -->

<!-- START_04479e4a4d2641141698f678299c85bf -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/reports`


<!-- END_04479e4a4d2641141698f678299c85bf -->

<!-- START_a95480e8706a0571189dd370802fcfe6 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/reports/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Not found"
}
```

### HTTP Request
`GET api/1.0/reports/{report}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_a95480e8706a0571189dd370802fcfe6 -->

<!-- START_1d5f6cab34d93aeccf0ecbdb4aa5ec61 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/reports/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/reports/{report}`

`PATCH api/1.0/reports/{report}`


<!-- END_1d5f6cab34d93aeccf0ecbdb4aa5ec61 -->

<!-- START_40f64173bb7c3b3e2d395c2c32357b2c -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/reports/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/reports/{report}`


<!-- END_40f64173bb7c3b3e2d395c2c32357b2c -->

#Settings

APIs for managing settings
<!-- START_ff8a7a253c42a88dca5cd859b16fcd38 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/settings?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/settings?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/settings",
        "per_page": 20,
        "prev_page_url": null,
        "to": 5,
        "total": 5,
        "items": [
            {
                "id": 1,
                "uuid": "6e9d6b57-966d-4b1e-aa77-fc937d9118b6",
                "name": "app-name",
                "title": "App Name",
                "type": "string",
                "description": "Mainframe Rapid Development Framework",
                "value": "Mainframe",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-24 20:25:41",
                "updated_at": "2020-01-29 02:45:23",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "2dfc744e-752b-49ef-baee-048fa2fa4969",
                "name": "ios-app-version",
                "title": "iOS App Version",
                "type": "string",
                "description": "Buddy Ramp",
                "value": "1.1.c.u",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-24 20:26:42",
                "updated_at": "2020-06-26 07:09:28",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 3,
                "uuid": "e446d927-902b-4633-83d8-5f9fa0ef43cb",
                "name": "android-app-version",
                "title": "Android App Version",
                "type": "string",
                "description": "Latest Android app version. This is matched with the users app version to prompt app update.",
                "value": "1.24",
                "is_active": 0,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-24 20:27:46",
                "updated_at": "2019-04-11 09:16:28",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 4,
                "uuid": "279fb65c-30c2-4727-b3e6-fc18a3476bf7",
                "name": "mobile-portrait-help-steps",
                "title": "Mobile Portrait Help Steps",
                "type": "file",
                "description": "Mobile Portrait Helps slides for screen size.",
                "value": null,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-03-19 10:02:46",
                "updated_at": "2019-03-20 09:21:39",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 5,
                "uuid": "f8e2ab99-e6ef-46d5-ae98-edee783b8f56",
                "name": "mobile-landscape-help-steps",
                "title": "Mobile Landscape Help Steps",
                "type": "file",
                "description": "Mobile landscape Helps slides for screen size.",
                "value": "test lorem",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2019-03-19 10:15:44",
                "updated_at": "2020-05-22 06:44:05",
                "deleted_at": null,
                "deleted_by": 1
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/settings"
}
```

### HTTP Request
`GET api/1.0/settings`


<!-- END_ff8a7a253c42a88dca5cd859b16fcd38 -->

<!-- START_bac51c106286f22a2bc9f3dd63d846e7 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/settings/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/settings\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/settings\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/settings\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/settings\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/settings/{id}/uploads`


<!-- END_bac51c106286f22a2bc9f3dd63d846e7 -->

<!-- START_c1a84ee50ec403b4e03b5bdd0c91f2b7 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/settings/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/settings/{id}/uploads`


<!-- END_c1a84ee50ec403b4e03b5bdd0c91f2b7 -->

<!-- START_8d70526ef267a3f564ed3aabfb738c5b -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/settings`


<!-- END_8d70526ef267a3f564ed3aabfb738c5b -->

<!-- START_ddfba902e80d6b8338f9e117b36885ef -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "6e9d6b57-966d-4b1e-aa77-fc937d9118b6",
        "name": "app-name",
        "title": "App Name",
        "type": "string",
        "description": "Mainframe Rapid Development Framework",
        "value": "Mainframe",
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2018-12-24 20:25:41",
        "updated_at": "2020-01-29 02:45:23",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/settings\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/settings/{setting}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_ddfba902e80d6b8338f9e117b36885ef -->

<!-- START_21d545ea33377b3825fdefacb9f75f81 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/settings/{setting}`

`PATCH api/1.0/settings/{setting}`


<!-- END_21d545ea33377b3825fdefacb9f75f81 -->

<!-- START_cfa8b753d221b7d6a70d4691d2ca0a1c -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/settings/{setting}`


<!-- END_cfa8b753d221b7d6a70d4691d2ca0a1c -->

<!-- START_21f5cfe7136ec865d701a276e042e269 -->
## Get the setting value from name(key)

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/setting/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/setting/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 422,
    "status": "fail",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "118b4820-557b-4b6d-b645-b2827251831f",
        "project_id": null,
        "tenant_id": null,
        "name": null,
        "type": null,
        "body": "lore ipsum dolor sit amet",
        "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
        "commentable_id": 2,
        "module_id": 50,
        "element_id": 2,
        "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2020-02-25 09:20:10",
        "updated_at": "2020-02-25 09:20:10",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/setting\/1"
}
```

### HTTP Request
`GET api/1.0/setting/{name}`


<!-- END_21f5cfe7136ec865d701a276e042e269 -->

#Subscriptions

APIs for managing subscriptions
<!-- START_f01d1c290dd9bc43d0283a4483484d39 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/subscriptions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/subscriptions?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/subscriptions?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/subscriptions",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/subscriptions"
}
```

### HTTP Request
`GET api/1.0/subscriptions`


<!-- END_f01d1c290dd9bc43d0283a4483484d39 -->

<!-- START_3d5ea40aee9123175f5a310ea2f382df -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/subscriptions\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/subscriptions\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/subscriptions\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/subscriptions\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/subscriptions/{id}/uploads`


<!-- END_3d5ea40aee9123175f5a310ea2f382df -->

<!-- START_994ddd7f77245708a38200becff4dbe3 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/subscriptions/{id}/uploads`


<!-- END_994ddd7f77245708a38200becff4dbe3 -->

<!-- START_93770bf66ac454b546dacc921367ddb9 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/subscriptions`


<!-- END_93770bf66ac454b546dacc921367ddb9 -->

<!-- START_369593a00f2b3bf74d67efbd84d5f28a -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Not found"
}
```

### HTTP Request
`GET api/1.0/subscriptions/{subscription}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_369593a00f2b3bf74d67efbd84d5f28a -->

<!-- START_b0bb07f0ab848641956f4212b6bf47d0 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/subscriptions/{subscription}`

`PATCH api/1.0/subscriptions/{subscription}`


<!-- END_b0bb07f0ab848641956f4212b6bf47d0 -->

<!-- START_61729118641c7d1252f17e8a6eb5ce4c -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/subscriptions/{subscription}`


<!-- END_61729118641c7d1252f17e8a6eb5ce4c -->

#Tenants

APIs for managing tenants
<!-- START_6e2d71376453ad9e14dfd23c1cc01cbc -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/tenants" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/tenants?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/tenants?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/tenants",
        "per_page": 20,
        "prev_page_url": null,
        "to": 2,
        "total": 2,
        "items": [
            {
                "id": 1,
                "uuid": "ceba2dba-bfad-4045-a36f-ce0572f77679",
                "project_id": 1,
                "name": "ArtemisPod-default",
                "code": "artp",
                "user_id": null,
                "route_group": "artp",
                "class_directory": "app\/Projects\/ArtemisPod",
                "namespace": "\\App\\ArtemisPod",
                "view_directory": "mainframe.projects.artemis-pod",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-12-19 13:31:02",
                "updated_at": "2019-12-19 13:31:02",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "2170cada-a1fc-43a9-90e5-6bf6a5037952",
                "project_id": 2,
                "name": "OrangeHC-default",
                "code": "orhc",
                "user_id": null,
                "route_group": "orhc",
                "class_directory": "app\/Projects\/OrangeHc",
                "namespace": "\\App\\OrangeHC",
                "view_directory": "mainframe.projects.orange-hc",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-12-19 13:31:02",
                "updated_at": "2019-12-28 14:26:39",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/tenants"
}
```

### HTTP Request
`GET api/1.0/tenants`


<!-- END_6e2d71376453ad9e14dfd23c1cc01cbc -->

<!-- START_94785db23bc12a7aa15764a14a0041a8 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/tenants/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/tenants\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/tenants\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/tenants\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/tenants\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/tenants/{id}/uploads`


<!-- END_94785db23bc12a7aa15764a14a0041a8 -->

<!-- START_e613003ecc4d9688a3a273efae47f314 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/tenants/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/tenants/{id}/uploads`


<!-- END_e613003ecc4d9688a3a273efae47f314 -->

<!-- START_33ca92f104a59c8bcc56351651e9f94d -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/tenants" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/tenants`


<!-- END_33ca92f104a59c8bcc56351651e9f94d -->

<!-- START_04a459cbb5178d411590c926ba7f5298 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "ceba2dba-bfad-4045-a36f-ce0572f77679",
        "project_id": 1,
        "name": "ArtemisPod-default",
        "code": "artp",
        "user_id": null,
        "route_group": "artp",
        "class_directory": "app\/Projects\/ArtemisPod",
        "namespace": "\\App\\ArtemisPod",
        "view_directory": "mainframe.projects.artemis-pod",
        "is_active": 1,
        "created_by": 5,
        "updated_by": 5,
        "created_at": "2019-12-19 13:31:02",
        "updated_at": "2019-12-19 13:31:02",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/tenants\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/tenants/{tenant}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_04a459cbb5178d411590c926ba7f5298 -->

<!-- START_cbd3cfc557fdbdf7461dfd1dcc8567c7 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/tenants/{tenant}`

`PATCH api/1.0/tenants/{tenant}`


<!-- END_cbd3cfc557fdbdf7461dfd1dcc8567c7 -->

<!-- START_2ec3fb89589317a9549d90d93491657e -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/tenants/{tenant}`


<!-- END_2ec3fb89589317a9549d90d93491657e -->

#Uploads

APIs for managing uploads
<!-- START_ced7dfc2137036ac6f93ecadca37ef4f -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/uploads?page=1",
        "from": 1,
        "last_page": 2,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/uploads?page=2",
        "next_page_url": "http:\/\/localhost\/api\/1.0\/uploads?page=2",
        "path": "http:\/\/localhost\/api\/1.0\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": 20,
        "total": 38,
        "items": [
            {
                "id": 1,
                "uuid": "821b341e-1eb7-412c-a9ae-0dcfda244275",
                "project_id": null,
                "tenant_id": null,
                "name": "2019-10-31 15_41_04-Start.jpg",
                "type": null,
                "path": "\/files\/7km7BL7t_2019-10-31 15_41_04-Start.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": null,
                "uploadable_id": null,
                "module_id": 21,
                "element_id": null,
                "element_uuid": null,
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-10-31 13:03:35",
                "updated_at": "2019-10-31 13:03:35",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/7km7BL7t_2019-10-31 15_41_04-Start.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/7km7BL7t_2019-10-31 15_41_04-Start.jpg"
            },
            {
                "id": 2,
                "uuid": "90020e48-a92d-42b5-947d-b1da2ba60204",
                "project_id": null,
                "tenant_id": null,
                "name": "2019-10-31 15_41_04-Start.jpg",
                "type": null,
                "path": "\/files\/9ZpEl7dT_2019-10-31 15_41_04-Start.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": null,
                "uploadable_id": null,
                "module_id": 21,
                "element_id": 39,
                "element_uuid": "931f290b-8cd3-4ca1-a0f1-087bb1355b8a",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-10-31 13:10:17",
                "updated_at": "2019-11-20 11:03:13",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/9ZpEl7dT_2019-10-31 15_41_04-Start.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/9ZpEl7dT_2019-10-31 15_41_04-Start.jpg"
            },
            {
                "id": 3,
                "uuid": "c0c7f836-b76c-4ef1-9481-c82529f2bd1a",
                "project_id": null,
                "tenant_id": null,
                "name": "2019-10-31 15_41_04-Start.jpg",
                "type": null,
                "path": "\/files\/vYaQdT0Z_2019-10-31 15_41_04-Start.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": null,
                "uploadable_id": null,
                "module_id": 21,
                "element_id": 35,
                "element_uuid": "e85d9a3d-b77e-46db-9422-078eeac8923a",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-10-31 15:10:02",
                "updated_at": "2019-11-22 09:28:42",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/vYaQdT0Z_2019-10-31 15_41_04-Start.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/vYaQdT0Z_2019-10-31 15_41_04-Start.jpg"
            },
            {
                "id": 5,
                "uuid": "5809f712-1527-4620-9ef8-bcd904d3b21b",
                "project_id": null,
                "tenant_id": null,
                "name": "2019-11-27 10_10_58-Cortana.jpg",
                "type": null,
                "path": "\/files\/UohSKFJT_2019-11-27 10_10_58-Cortana.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": null,
                "uploadable_id": null,
                "module_id": 21,
                "element_id": 42,
                "element_uuid": "d879c7df-d4ce-48c7-8abc-dc82af05a37d",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-12-02 16:58:02",
                "updated_at": "2019-12-19 07:54:40",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/UohSKFJT_2019-11-27 10_10_58-Cortana.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/UohSKFJT_2019-11-27 10_10_58-Cortana.jpg"
            },
            {
                "id": 7,
                "uuid": "e5d35b1f-4625-4214-8dda-9f1ad4608383",
                "project_id": null,
                "tenant_id": null,
                "name": "raihan-round.png",
                "type": null,
                "path": "\/files\/hsQtWhy1_raihan-round.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": null,
                "uploadable_id": null,
                "module_id": 4,
                "element_id": null,
                "element_uuid": null,
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-05 17:40:40",
                "updated_at": "2020-01-05 17:40:40",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/hsQtWhy1_raihan-round.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/hsQtWhy1_raihan-round.png"
            },
            {
                "id": 8,
                "uuid": "52047e4d-262f-435d-8959-9a7f43157293",
                "project_id": null,
                "tenant_id": null,
                "name": "raihan-round.png",
                "type": null,
                "path": "\/files\/ocJxKCvK_raihan-round.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": null,
                "uploadable_id": null,
                "module_id": 4,
                "element_id": null,
                "element_uuid": "338b5180-c35a-494e-b684-02288035361f",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-05 17:41:57",
                "updated_at": "2020-01-05 17:41:57",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/ocJxKCvK_raihan-round.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/ocJxKCvK_raihan-round.png"
            },
            {
                "id": 9,
                "uuid": "ced54918-9691-4212-8a8c-5cbfca4c127a",
                "project_id": null,
                "tenant_id": null,
                "name": "raihan-round.png",
                "type": null,
                "path": "\/files\/RdniZdHy_raihan-round.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": null,
                "uploadable_id": null,
                "module_id": 21,
                "element_id": 43,
                "element_uuid": "a285cd17-969a-4dac-9898-d94168b13057",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-05 18:51:19",
                "updated_at": "2020-01-05 18:51:19",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/RdniZdHy_raihan-round.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/RdniZdHy_raihan-round.png"
            },
            {
                "id": 10,
                "uuid": "4f4d5297-170c-4313-b15c-cf4bbace9056",
                "project_id": null,
                "tenant_id": null,
                "name": "raihan-round.png",
                "type": null,
                "path": "\/files\/GShmXTCO_raihan-round.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 0,
                "module_id": 21,
                "element_id": 43,
                "element_uuid": "a285cd17-969a-4dac-9898-d94168b13057",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-05 18:52:15",
                "updated_at": "2020-01-05 18:52:15",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/GShmXTCO_raihan-round.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/GShmXTCO_raihan-round.png"
            },
            {
                "id": 11,
                "uuid": "ff387f29-c792-4b8e-a985-85c665f6be8e",
                "project_id": null,
                "tenant_id": null,
                "name": "raihan-round.png",
                "type": null,
                "path": "\/files\/sSCXBzSS_raihan-round.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 45,
                "module_id": 21,
                "element_id": 45,
                "element_uuid": "29900234-2353-4098-9390-4a7ef688f639",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-05 18:55:51",
                "updated_at": "2020-01-06 04:44:42",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/sSCXBzSS_raihan-round.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/sSCXBzSS_raihan-round.png"
            },
            {
                "id": 12,
                "uuid": "919d6d5a-fec4-4fde-9fb2-872a84752b84",
                "project_id": null,
                "tenant_id": null,
                "name": "raihan-round.png",
                "type": null,
                "path": "\/files\/ITeOd51R_raihan-round.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 45,
                "module_id": 21,
                "element_id": 45,
                "element_uuid": "29900234-2353-4098-9390-4a7ef688f639",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-06 04:39:17",
                "updated_at": "2020-01-06 04:44:42",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/ITeOd51R_raihan-round.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/ITeOd51R_raihan-round.png"
            },
            {
                "id": 13,
                "uuid": "71f5f437-2b83-408f-90ba-34afd4851e76",
                "project_id": null,
                "tenant_id": null,
                "name": "retro-wallpaper-49.jpg",
                "type": null,
                "path": "\/files\/WLcA82gK_retro-wallpaper-49.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 45,
                "module_id": 21,
                "element_id": 45,
                "element_uuid": "29900234-2353-4098-9390-4a7ef688f639",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-06 04:39:21",
                "updated_at": "2020-01-06 04:44:42",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/WLcA82gK_retro-wallpaper-49.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/WLcA82gK_retro-wallpaper-49.jpg"
            },
            {
                "id": 14,
                "uuid": "a960dbeb-6901-4810-bf61-d7ac9d8c08c9",
                "project_id": null,
                "tenant_id": null,
                "name": "temp.txt",
                "type": null,
                "path": "\/files\/MLJ54xuL_temp.txt",
                "order": null,
                "ext": "txt",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 45,
                "module_id": 21,
                "element_id": 45,
                "element_uuid": "29900234-2353-4098-9390-4a7ef688f639",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-06 04:39:30",
                "updated_at": "2020-01-06 04:44:42",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/MLJ54xuL_temp.txt",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/MLJ54xuL_temp.txt"
            },
            {
                "id": 15,
                "uuid": "247be1a0-0b3d-4280-8ee0-b83b4bcf99ae",
                "project_id": null,
                "tenant_id": null,
                "name": "2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "type": null,
                "path": "\/files\/I04HKZaT_2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 3,
                "module_id": 21,
                "element_id": 3,
                "element_uuid": "e446d927-902b-4633-83d8-5f9fa0ef43cb",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-29 03:24:49",
                "updated_at": "2020-01-29 03:24:49",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/I04HKZaT_2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/I04HKZaT_2020-01-28 22_41_26-Windows Default Lock Screen.jpg"
            },
            {
                "id": 16,
                "uuid": "f1ec6684-bdbf-47e5-9780-ab4eb640ca8e",
                "project_id": null,
                "tenant_id": null,
                "name": "2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "type": null,
                "path": "\/\/files\/\/\/Vpk8vBIx_2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 3,
                "module_id": 21,
                "element_id": 3,
                "element_uuid": "e446d927-902b-4633-83d8-5f9fa0ef43cb",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-29 03:27:48",
                "updated_at": "2020-01-29 03:27:48",
                "deleted_at": null,
                "deleted_by": null,
                "url": "\/\/files\/\/\/Vpk8vBIx_2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/\/files\/\/\/Vpk8vBIx_2020-01-28 22_41_26-Windows Default Lock Screen.jpg"
            },
            {
                "id": 17,
                "uuid": "46208386-92dc-40ae-b24a-20d3caabf7ce",
                "project_id": null,
                "tenant_id": null,
                "name": "2020-01-28 22_41_52-Windows Default Lock Screen.jpg",
                "type": null,
                "path": "\/\/files\/\/\/\/GJ6XPKBh_2020-01-28 22_41_52-Windows Default Lock Screen.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 3,
                "module_id": 21,
                "element_id": 3,
                "element_uuid": "e446d927-902b-4633-83d8-5f9fa0ef43cb",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-29 03:32:56",
                "updated_at": "2020-01-29 03:32:56",
                "deleted_at": null,
                "deleted_by": null,
                "url": "\/\/files\/\/\/\/GJ6XPKBh_2020-01-28 22_41_52-Windows Default Lock Screen.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/\/files\/\/\/\/GJ6XPKBh_2020-01-28 22_41_52-Windows Default Lock Screen.jpg"
            },
            {
                "id": 18,
                "uuid": "d0a4a78a-b676-4cab-8468-2bb9a9316cd3",
                "project_id": null,
                "tenant_id": null,
                "name": "2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "type": null,
                "path": "\/files\/mlBgovYB_2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "order": null,
                "ext": "jpg",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Settings\\Setting",
                "uploadable_id": 3,
                "module_id": 21,
                "element_id": 3,
                "element_uuid": "e446d927-902b-4633-83d8-5f9fa0ef43cb",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-29 03:33:31",
                "updated_at": "2020-01-29 03:33:31",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/mlBgovYB_2020-01-28 22_41_26-Windows Default Lock Screen.jpg",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/mlBgovYB_2020-01-28 22_41_26-Windows Default Lock Screen.jpg"
            },
            {
                "id": 25,
                "uuid": "0380d47e-3ae2-41b8-b114-d4ee956a9e28",
                "project_id": null,
                "tenant_id": null,
                "name": "step1.png",
                "type": null,
                "path": "\/files\/RITGPq3I_step1.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "uploadable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 10:48:00",
                "updated_at": "2020-07-13 07:40:37",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/RITGPq3I_step1.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/RITGPq3I_step1.png"
            },
            {
                "id": 27,
                "uuid": "b146bd8d-ff7e-49f8-9399-ade8149aefcf",
                "project_id": null,
                "tenant_id": null,
                "name": "step1.png",
                "type": null,
                "path": "\/files\/DDdJ2BFI_step1.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "uploadable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 11:13:27",
                "updated_at": "2020-07-13 07:40:37",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/DDdJ2BFI_step1.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/DDdJ2BFI_step1.png"
            },
            {
                "id": 28,
                "uuid": "ad98dda0-ceb0-4c83-8eef-9eb7c540db5f",
                "project_id": null,
                "tenant_id": null,
                "name": "step3.png",
                "type": null,
                "path": "\/files\/ypfo2WWq_step3.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "uploadable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 11:14:04",
                "updated_at": "2020-07-13 07:40:37",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/ypfo2WWq_step3.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/ypfo2WWq_step3.png"
            },
            {
                "id": 29,
                "uuid": "e846f237-d483-4dca-8220-071564112367",
                "project_id": null,
                "tenant_id": null,
                "name": "step1.png",
                "type": null,
                "path": "\/files\/y22h5RN2_step1.png",
                "order": null,
                "ext": "png",
                "bytes": null,
                "description": null,
                "uploadable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
                "uploadable_id": 2,
                "module_id": 50,
                "element_id": 2,
                "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-25 11:31:10",
                "updated_at": "2020-07-13 07:40:37",
                "deleted_at": null,
                "deleted_by": null,
                "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/y22h5RN2_step1.png",
                "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/y22h5RN2_step1.png"
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/uploads"
}
```

### HTTP Request
`GET api/1.0/uploads`


<!-- END_ced7dfc2137036ac6f93ecadca37ef4f -->

<!-- START_5915e04350ceb2c42d3d7dab5dd33ed6 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/uploads/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/uploads\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/uploads\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/uploads\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/uploads\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/uploads/{id}/uploads`


<!-- END_5915e04350ceb2c42d3d7dab5dd33ed6 -->

<!-- START_f2d1edd13dd37d2c8a6c313349574ffe -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/uploads/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/uploads/{id}/uploads`


<!-- END_f2d1edd13dd37d2c8a6c313349574ffe -->

<!-- START_c953001b0b13a3633df2017c390056e2 -->
## api/1.0/uploads
> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/uploads`


<!-- END_c953001b0b13a3633df2017c390056e2 -->

<!-- START_9d8338a4193df29acd34e021fcfeabf7 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/uploads/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "821b341e-1eb7-412c-a9ae-0dcfda244275",
        "project_id": null,
        "tenant_id": null,
        "name": "2019-10-31 15_41_04-Start.jpg",
        "type": null,
        "path": "\/files\/7km7BL7t_2019-10-31 15_41_04-Start.jpg",
        "order": null,
        "ext": "jpg",
        "bytes": null,
        "description": null,
        "uploadable_type": null,
        "uploadable_id": null,
        "module_id": 21,
        "element_id": null,
        "element_uuid": null,
        "is_active": 1,
        "created_by": 5,
        "updated_by": 5,
        "created_at": "2019-10-31 13:03:35",
        "updated_at": "2019-10-31 13:03:35",
        "deleted_at": null,
        "deleted_by": null,
        "url": "http:\/\/localhost:8081\/mainframe\/public\/files\/7km7BL7t_2019-10-31 15_41_04-Start.jpg",
        "dir": "E:\\MAMP\\htdocs\\mainframe\\public\/files\/7km7BL7t_2019-10-31 15_41_04-Start.jpg"
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/uploads\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/uploads/{upload}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_9d8338a4193df29acd34e021fcfeabf7 -->

<!-- START_e5147d85c11233aa9d9f1cf4d02bb2a9 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/uploads/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/uploads/{upload}`

`PATCH api/1.0/uploads/{upload}`


<!-- END_e5147d85c11233aa9d9f1cf4d02bb2a9 -->

<!-- START_2ea44ecde437796e3bed2c4d1634ad7b -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/uploads/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/uploads/{upload}`


<!-- END_2ea44ecde437796e3bed2c4d1634ad7b -->

#Users

APIs for managing users
<!-- START_4dccb69b7dcbfaf1004416c926cbbd47 -->
## Index/List

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/users?page=1",
        "from": 1,
        "last_page": 3,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/users?page=3",
        "next_page_url": "http:\/\/localhost\/api\/1.0\/users?page=2",
        "path": "http:\/\/localhost\/api\/1.0\/users",
        "per_page": 20,
        "prev_page_url": null,
        "to": 20,
        "total": 44,
        "items": [
            {
                "id": 1,
                "uuid": "3ef9b174-6c7c-41fd-b68e-18d003fb9481",
                "project_id": null,
                "tenant_id": null,
                "name": "Super admin",
                "email": "su@mainframe",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-09-10 15:30:06",
                "updated_at": "2021-02-18 13:06:52",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Prime",
                "last_name": "Superuser",
                "full_name": "Prime Superuser",
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": 187,
                "country_name": "UK (United Kingdom)",
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": "2020-02-08 10:55:44",
                "last_login_at": "2021-02-15 07:37:13",
                "auth_token": "UMZ9oxfJ7gL0OtbBUIe\/odaOr1jEFDq1",
                "email_verified_at": "2019-01-22 19:27:07",
                "email_verification_code": null,
                "currency": "GBP",
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "1"
                ],
                "is_test": 0,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 2,
                "uuid": "856a81bf-ab1b-4289-9d65-9751009d00ad",
                "project_id": null,
                "tenant_id": null,
                "name": "API",
                "email": "api@mainframe",
                "api_token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
                "api_token_generated_at": null,
                "is_tenant_editable": 0,
                "permissions": [],
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2018-12-24 05:48:25",
                "updated_at": "2021-02-18 13:06:52",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "LB",
                "last_name": "API",
                "full_name": "LB API",
                "gender": null,
                "device_token": "eFGlVn8yFn8:APA91bHgq2zk-9JrBNNtVMn4iFMB6eicQOUVyFZGRft8jv-GwGJej9sFppTG5w9E_3IeOyR_3NN1i3cWFHaiVl_k1Zlt2jDMVoh7D90CsJG1qxVnuruH-Eidi1CgO9QVlpmFByK2azr3",
                "address1": "62142 Haley Lake",
                "address2": null,
                "city": null,
                "county": null,
                "country_id": 187,
                "country_name": "UK (United Kingdom)",
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": "2019-01-31 08:31:54",
                "last_login_at": "2019-04-09 15:17:25",
                "auth_token": "Q29anuSIvoR9N8OmB2ueGGRI8tlHPZau",
                "email_verified_at": "2019-01-22 19:27:07",
                "email_verification_code": null,
                "currency": "GBP",
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "2"
                ],
                "is_test": 0,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 999,
                "uuid": "0b11bb84-a6f9-4612-b823-6eb0feda3342",
                "project_id": null,
                "tenant_id": null,
                "name": " ",
                "email": "dote@mailinator.net",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-01-06 16:55:14",
                "updated_at": "2020-06-30 15:50:15",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Dote",
                "last_name": "Test",
                "full_name": "Dote Test",
                "gender": null,
                "device_token": null,
                "address1": "018 Alva Mountain",
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": "2020-06-30 15:49:31",
                "last_login_at": "2020-06-30 15:50:15",
                "auth_token": "LoremIpsumSIvoR9N8OmB2ueLoremIpsu",
                "email_verified_at": "2019-01-22 19:27:07",
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "25"
                ],
                "is_test": 0,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5055,
                "uuid": "30e89e31-ec4b-4f79-a6e4-4e5b003c3aaf",
                "project_id": null,
                "tenant_id": null,
                "name": "Daisha Runolfsson",
                "email": "hansen.quentin@rau.biz",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 06:30:36",
                "updated_at": "2021-02-09 06:30:36",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Daisha",
                "last_name": "Runolfsson",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5058,
                "uuid": "01234f77-a679-4263-8e92-950d83b91c82",
                "project_id": null,
                "tenant_id": null,
                "name": "Skye Abshire",
                "email": "jarret.streich@volkman.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 06:30:51",
                "updated_at": "2021-02-09 06:30:51",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Skye",
                "last_name": "Abshire",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5061,
                "uuid": "bb9c5036-52db-49d7-adce-ccbf8d323241",
                "project_id": null,
                "tenant_id": null,
                "name": "Noemy Wehner",
                "email": "koss.michel@yahoo.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 06:31:08",
                "updated_at": "2021-02-09 06:31:08",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Noemy",
                "last_name": "Wehner",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5064,
                "uuid": "22e6758d-1427-4f8b-a16d-0fc3d5c3beb7",
                "project_id": null,
                "tenant_id": null,
                "name": "Darius Reichert",
                "email": "mozell23@blick.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 06:31:54",
                "updated_at": "2021-02-09 06:31:54",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Darius",
                "last_name": "Reichert",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5068,
                "uuid": "5e5e4726-b44a-4c5e-b854-1d77ae546b4f",
                "project_id": null,
                "tenant_id": null,
                "name": "Chandler Herzog",
                "email": "hill.enoch@stokes.info",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 06:32:22",
                "updated_at": "2021-02-09 06:32:22",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Chandler",
                "last_name": "Herzog",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5072,
                "uuid": "cbe20307-1d19-494b-974f-c8eb0f9f0fce",
                "project_id": null,
                "tenant_id": null,
                "name": "Aaron Franecki",
                "email": "shanna.konopelski@schmeler.org",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 08:40:08",
                "updated_at": "2021-02-09 08:40:08",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Aaron",
                "last_name": "Franecki",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5076,
                "uuid": "a757a7d5-9ae4-48a1-a5d0-ea7485561a9d",
                "project_id": null,
                "tenant_id": null,
                "name": "Americo Ondricka",
                "email": "ewhite@gmail.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 10:10:23",
                "updated_at": "2021-02-09 10:10:23",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Americo",
                "last_name": "Ondricka",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5080,
                "uuid": "479c2fd7-f876-48ad-bae8-eaa690503d82",
                "project_id": null,
                "tenant_id": null,
                "name": "Andreane Kuphal",
                "email": "horacio79@reichel.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 10:29:47",
                "updated_at": "2021-02-09 10:29:47",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Andreane",
                "last_name": "Kuphal",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5084,
                "uuid": "eee212a5-6eb4-4bbd-8871-c73b76fe3722",
                "project_id": null,
                "tenant_id": null,
                "name": "Trycia Funk",
                "email": "maurice.auer@gmail.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 10:30:19",
                "updated_at": "2021-02-09 10:30:19",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Trycia",
                "last_name": "Funk",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5088,
                "uuid": "662cb7b2-2ea3-48ab-bb4b-abe836a8989a",
                "project_id": null,
                "tenant_id": null,
                "name": "Conor Daniel",
                "email": "zmuller@auer.org",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 11:13:08",
                "updated_at": "2021-02-09 11:13:08",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Conor",
                "last_name": "Daniel",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5092,
                "uuid": "04a688d6-eb86-4628-93d0-8ca06684e58a",
                "project_id": null,
                "tenant_id": null,
                "name": "Davon Swaniawski",
                "email": "larkin.dexter@jaskolski.org",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 11:34:31",
                "updated_at": "2021-02-09 11:34:31",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Davon",
                "last_name": "Swaniawski",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5096,
                "uuid": "ccdb8dd0-fdfc-4747-a0c2-aabff81865d2",
                "project_id": null,
                "tenant_id": null,
                "name": "Ardith Murazik",
                "email": "aimee11@yahoo.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-09 13:59:02",
                "updated_at": "2021-02-09 13:59:02",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Ardith",
                "last_name": "Murazik",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5100,
                "uuid": "db9bf107-5345-4c8f-b968-1585d0180689",
                "project_id": null,
                "tenant_id": null,
                "name": "Ulices McGlynn",
                "email": "donnell.kemmer@ziemann.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-12 06:45:58",
                "updated_at": "2021-02-12 06:45:58",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Ulices",
                "last_name": "McGlynn",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5104,
                "uuid": "63b9cc00-6efa-41ef-99d7-e8d17930d5f3",
                "project_id": null,
                "tenant_id": null,
                "name": "Alayna Johns",
                "email": "elbert45@adams.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-12 07:13:12",
                "updated_at": "2021-02-12 07:13:12",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Alayna",
                "last_name": "Johns",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5108,
                "uuid": "11bb2d30-4edc-4525-a5c7-4dd6177d991a",
                "project_id": null,
                "tenant_id": null,
                "name": "Noelia Spencer",
                "email": "filiberto75@gmail.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-12 09:38:07",
                "updated_at": "2021-02-12 09:38:07",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Noelia",
                "last_name": "Spencer",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5112,
                "uuid": "68eb09fd-7164-4100-99e1-753a0a45e66a",
                "project_id": null,
                "tenant_id": null,
                "name": "Alexanne Lebsack",
                "email": "cleta57@stehr.info",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-13 11:13:21",
                "updated_at": "2021-02-13 11:13:21",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Alexanne",
                "last_name": "Lebsack",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            },
            {
                "id": 5116,
                "uuid": "062aae3d-d361-43b7-8363-acaee97495d9",
                "project_id": null,
                "tenant_id": null,
                "name": "Daniela Kuhic",
                "email": "hyatt.kolby@hotmail.com",
                "api_token": null,
                "api_token_generated_at": null,
                "is_tenant_editable": 1,
                "permissions": [],
                "is_active": 1,
                "created_by": null,
                "updated_by": null,
                "created_at": "2021-02-13 11:14:59",
                "updated_at": "2021-02-13 11:14:59",
                "deleted_at": null,
                "deleted_by": null,
                "name_initial": null,
                "first_name": "Daniela",
                "last_name": "Kuhic",
                "full_name": null,
                "gender": null,
                "device_token": null,
                "address1": null,
                "address2": null,
                "city": null,
                "county": null,
                "country_id": null,
                "country_name": null,
                "zip_code": null,
                "phone": null,
                "mobile": null,
                "first_login_at": null,
                "last_login_at": null,
                "auth_token": null,
                "email_verified_at": null,
                "email_verification_code": null,
                "currency": null,
                "social_account_id": null,
                "social_account_type": null,
                "dob": null,
                "group_ids": [
                    "26"
                ],
                "is_test": null,
                "profile_pic": null,
                "uploads": []
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/users"
}
```

### HTTP Request
`GET api/1.0/users`


<!-- END_4dccb69b7dcbfaf1004416c926cbbd47 -->

<!-- START_dcfad73ea7807a3b9c1f9905d6d46386 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/users/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "current_page": 1,
        "first_page_url": "http:\/\/localhost\/api\/1.0\/users\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/users\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/users\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/users\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/users/{id}/uploads`


<!-- END_dcfad73ea7807a3b9c1f9905d6d46386 -->

<!-- START_6143cb4e54228db669bb8c4a38f12292 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/users/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users/1/uploads"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/users/{id}/uploads`


<!-- END_6143cb4e54228db669bb8c4a38f12292 -->

<!-- START_46370b538a7c75304203310f6fd136a4 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/users`


<!-- END_46370b538a7c75304203310f6fd136a4 -->

<!-- START_aeba981d6d242818bb8428fab2a644f5 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 200,
    "status": "success",
    "message": "Request Processed",
    "data": {
        "id": 1,
        "uuid": "3ef9b174-6c7c-41fd-b68e-18d003fb9481",
        "project_id": null,
        "tenant_id": null,
        "name": "Super admin",
        "email": "su@mainframe",
        "api_token": null,
        "api_token_generated_at": null,
        "is_tenant_editable": 1,
        "permissions": [],
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2018-09-10 15:30:06",
        "updated_at": "2021-02-18 13:06:52",
        "deleted_at": null,
        "deleted_by": null,
        "name_initial": null,
        "first_name": "Prime",
        "last_name": "Superuser",
        "full_name": "Prime Superuser",
        "gender": null,
        "device_token": null,
        "address1": null,
        "address2": null,
        "city": null,
        "county": null,
        "country_id": 187,
        "country_name": "UK (United Kingdom)",
        "zip_code": null,
        "phone": null,
        "mobile": null,
        "first_login_at": "2020-02-08 10:55:44",
        "last_login_at": "2021-02-15 07:37:13",
        "auth_token": "UMZ9oxfJ7gL0OtbBUIe\/odaOr1jEFDq1",
        "email_verified_at": "2019-01-22 19:27:07",
        "email_verification_code": null,
        "currency": "GBP",
        "social_account_id": null,
        "social_account_type": null,
        "dob": null,
        "group_ids": [
            "1"
        ],
        "is_test": 0,
        "profile_pic": null,
        "uploads": []
    },
    "redirect": "http:\/\/localhost:8081\/mainframe\/public\/users\/1\/edit"
}
```

### HTTP Request
`GET api/1.0/users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_aeba981d6d242818bb8428fab2a644f5 -->

<!-- START_464b1821c8e3e00bdd71b3229c3bf938 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/1.0/users/{user}`

`PATCH api/1.0/users/{user}`


<!-- END_464b1821c8e3e00bdd71b3229c3bf938 -->

<!-- START_6494a7c388d9e30504e5de8fb30516fb -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/users/{user}`


<!-- END_6494a7c388d9e30504e5de8fb30516fb -->

#general


<!-- START_c64d6b993f3d8633d566da423913ee94 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/register/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/register/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/register/{groupName?}`


<!-- END_c64d6b993f3d8633d566da423913ee94 -->

<!-- START_150cd6db1645ea9e24e2bb8444f338e0 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/login`


<!-- END_150cd6db1645ea9e24e2bb8444f338e0 -->

<!-- START_022da5741b8d31bb39fa527794aeb6eb -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/password/email`


<!-- END_022da5741b8d31bb39fa527794aeb6eb -->

<!-- START_af60d5b394c9587e648dfca2ecce1cc8 -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/logout`


<!-- END_af60d5b394c9587e648dfca2ecce1cc8 -->

<!-- START_64b21e03e9ba5a802048cae62c23f59e -->
## Get user profile

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 401,
    "status": "fail",
    "message": "Authentication failed (Bearer)",
    "data": {
        "id": 1,
        "uuid": "118b4820-557b-4b6d-b645-b2827251831f",
        "project_id": null,
        "tenant_id": null,
        "name": null,
        "type": null,
        "body": "lore ipsum dolor sit amet",
        "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
        "commentable_id": 2,
        "module_id": 50,
        "element_id": 2,
        "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2020-02-25 09:20:10",
        "updated_at": "2020-02-25 09:20:10",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/user"
}
```

### HTTP Request
`GET api/1.0/user`


<!-- END_64b21e03e9ba5a802048cae62c23f59e -->

<!-- START_3dc037299c426390a31781c20f4b5328 -->
## Update user information

> Example request:

```bash
curl -X PATCH \
    "http://localhost:8081/mainframe/public/api/1.0/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "PATCH",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PATCH api/1.0/user`


<!-- END_3dc037299c426390a31781c20f4b5328 -->

<!-- START_a96c1e80d580bd2b32d035d28bb4464d -->
## Get user profile

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/user/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/user/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "code": 401,
    "status": "fail",
    "message": "Authentication failed (Bearer)",
    "data": {
        "id": 1,
        "uuid": "118b4820-557b-4b6d-b645-b2827251831f",
        "project_id": null,
        "tenant_id": null,
        "name": null,
        "type": null,
        "body": "lore ipsum dolor sit amet",
        "commentable_type": "App\\Mainframe\\Modules\\Samples\\LoremIpsums\\LoremIpsum",
        "commentable_id": 2,
        "module_id": 50,
        "element_id": 2,
        "element_uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
        "is_active": 1,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2020-02-25 09:20:10",
        "updated_at": "2020-02-25 09:20:10",
        "deleted_at": null,
        "deleted_by": null
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/user\/profile"
}
```

### HTTP Request
`GET api/1.0/user/profile`


<!-- END_a96c1e80d580bd2b32d035d28bb4464d -->

<!-- START_2ec9c1b4153759255c1201829c4d1170 -->
## Store user profile pic

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/user/profile-pic/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/user/profile-pic/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/1.0/user/profile-pic/store`


<!-- END_2ec9c1b4153759255c1201829c4d1170 -->

<!-- START_d4a7573daa0ddda2573693a6d5e6adbf -->
## Delete user profile pic

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/user/profile-pic/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/user/profile-pic/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "X-Auth-Token": "7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0",
    "client-id": "2",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/1.0/user/profile-pic/delete`


<!-- END_d4a7573daa0ddda2573693a6d5e6adbf -->


