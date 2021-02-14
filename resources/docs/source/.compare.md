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
[Get Postman Collection](http://localhost:8081/mainframe/public/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_c6c5c00d6ac7f771f157dff4a2889b1a -->
## _debugbar/open
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/_debugbar/open" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/_debugbar/open"
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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/open`


<!-- END_c6c5c00d6ac7f771f157dff4a2889b1a -->

<!-- START_7b167949c615f4a7e7b673f8d5fdaf59 -->
## Return Clockwork output

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/_debugbar/clockwork/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/_debugbar/clockwork/1"
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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/clockwork/{id}`


<!-- END_7b167949c615f4a7e7b673f8d5fdaf59 -->

<!-- START_01a252c50bd17b20340dbc5a91cea4b7 -->
## _debugbar/telescope/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/_debugbar/telescope/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/_debugbar/telescope/1"
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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/telescope/{id}`


<!-- END_01a252c50bd17b20340dbc5a91cea4b7 -->

<!-- START_5f8a640000f5db43332951f0d77378c4 -->
## Return the stylesheets for the Debugbar

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/_debugbar/assets/stylesheets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/_debugbar/assets/stylesheets"
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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/stylesheets`


<!-- END_5f8a640000f5db43332951f0d77378c4 -->

<!-- START_db7a887cf930ce3c638a8708fd1a75ee -->
## Return the javascript for the Debugbar

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/_debugbar/assets/javascript" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/_debugbar/assets/javascript"
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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/javascript`


<!-- END_db7a887cf930ce3c638a8708fd1a75ee -->

<!-- START_0973671c4f56e7409202dc85c868d442 -->
## Forget a cache key

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/_debugbar/cache/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/_debugbar/cache/1/"
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
`DELETE _debugbar/cache/{key}/{tags?}`


<!-- END_0973671c4f56e7409202dc85c868d442 -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_c1aa27515bf03f12d5698af59e31585a -->
## Show the application dashboard based on different user type/group.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/test"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET test`


<!-- END_c1aa27515bf03f12d5698af59e31585a -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/login"
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
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/login"
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
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/logout"
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
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_0637461bc62842b298de565355436f38 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/register/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/register/"
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
null
```

### HTTP Request
`GET register/{groupName?}`


<!-- END_0637461bc62842b298de565355436f38 -->

<!-- START_d7b430fd8057cf94d072d4e161541183 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/register/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/register/"
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
`POST register/{groupName?}`


<!-- END_d7b430fd8057cf94d072d4e161541183 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/password/reset"
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
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/password/email"
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
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/password/reset/1"
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
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/password/reset"
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
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/password/confirm"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/password/confirm"
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
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_c88fc6aa6eb1bee7a494d3c0a02038b1 -->
## Show the email verification notice.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/email/verify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/email/verify"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET email/verify`


<!-- END_c88fc6aa6eb1bee7a494d3c0a02038b1 -->

<!-- START_6792598c74b34a271a2e3ab9365adf9e -->
## Mark the authenticated user&#039;s email address as verified.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/email/verify/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/email/verify/1/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET email/verify/{id}/{hash}`


<!-- END_6792598c74b34a271a2e3ab9365adf9e -->

<!-- START_38334d357e7e155bf70b9ab94619ca3d -->
## Resend the email verification notification.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/email/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/email/resend"
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
`POST email/resend`


<!-- END_38334d357e7e155bf70b9ab94619ca3d -->

<!-- START_ef7a29a16329b8fd5631c99bdcdb2086 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/register-tenant" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/register-tenant"
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
null
```

### HTTP Request
`GET register-tenant`


<!-- END_ef7a29a16329b8fd5631c99bdcdb2086 -->

<!-- START_349a2d70b7e8629fc2ad7d001321db07 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/register-tenant" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/register-tenant"
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
`POST register-tenant`


<!-- END_349a2d70b7e8629fc2ad7d001321db07 -->

<!-- START_568bd749946744d2753eaad6cfad5db6 -->
## Log the user out of the application.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/logout"
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
    "message": "Logged out",
    "data": null,
    "redirect": "\/"
}
```

### HTTP Request
`GET logout`


<!-- END_568bd749946744d2753eaad6cfad5db6 -->

<!-- START_9383ac609467dd163b7a8e9498e9ece2 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/{id}/restore`


<!-- END_9383ac609467dd163b7a8e9498e9ece2 -->

<!-- START_ca631a38cb87e71a599b6a97cd4a4dda -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/datatable/json`


<!-- END_ca631a38cb87e71a599b6a97cd4a4dda -->

<!-- START_be4bbb3282b8b87e4dff4e46cde0758e -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/list/json`


<!-- END_be4bbb3282b8b87e4dff4e46cde0758e -->

<!-- START_5838cd9faa09971fdb91ac7d2b7abc25 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/report`


<!-- END_5838cd9faa09971fdb91ac7d2b7abc25 -->

<!-- START_b7a38c0df08ab20a5ee7914456904745 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/{id}/changes`


<!-- END_b7a38c0df08ab20a5ee7914456904745 -->

<!-- START_38580fb3b295d6c637d7279e457887e0 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/{id}/uploads`


<!-- END_38580fb3b295d6c637d7279e457887e0 -->

<!-- START_b886d2c8092ee34a6eab814d334fd614 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/modules/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1/uploads"
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
`POST modules/{id}/uploads`


<!-- END_b886d2c8092ee34a6eab814d334fd614 -->

<!-- START_2883f19a8459951a0ae7b8cb5f0d262f -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/{id}/comments`


<!-- END_2883f19a8459951a0ae7b8cb5f0d262f -->

<!-- START_5235232bc43cd9232ed21b36e695dcb5 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules`


<!-- END_5235232bc43cd9232ed21b36e695dcb5 -->

<!-- START_2d5f41c2608ce3f4bbb1df67011ec602 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/create`


<!-- END_2d5f41c2608ce3f4bbb1df67011ec602 -->

<!-- START_2c969ff17e6e906d09de7e786b5895ae -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/modules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules"
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
`POST modules`


<!-- END_2c969ff17e6e906d09de7e786b5895ae -->

<!-- START_f9a3d1b2dd59af226c7906a5580e367a -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/{module}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_f9a3d1b2dd59af226c7906a5580e367a -->

<!-- START_c794ed1f8b07485d3cc445ab936337d7 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/modules/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET modules/{module}/edit`


<!-- END_c794ed1f8b07485d3cc445ab936337d7 -->

<!-- START_41a924f7971cb37ed67d0c5366339258 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/modules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1"
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
`PUT modules/{module}`

`PATCH modules/{module}`


<!-- END_41a924f7971cb37ed67d0c5366339258 -->

<!-- START_d7e7271f79d07f39f30d7b1ac7b3c33f -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/modules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/modules/1"
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
`DELETE modules/{module}`


<!-- END_d7e7271f79d07f39f30d7b1ac7b3c33f -->

<!-- START_acbad4dfaf8cf74208e29b1d5bcbd6dc -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/{id}/restore`


<!-- END_acbad4dfaf8cf74208e29b1d5bcbd6dc -->

<!-- START_d38e7c3fb9c443f9cf23a640e3742a03 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/datatable/json`


<!-- END_d38e7c3fb9c443f9cf23a640e3742a03 -->

<!-- START_0947a97427c12bafbe26c7aa8cf9cfc9 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/list/json`


<!-- END_0947a97427c12bafbe26c7aa8cf9cfc9 -->

<!-- START_725d751d810e93b8dbb12fb70abb4aff -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/report`


<!-- END_725d751d810e93b8dbb12fb70abb4aff -->

<!-- START_597c38b01f0f70089ac4d7f6ff0f6af6 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/{id}/changes`


<!-- END_597c38b01f0f70089ac4d7f6ff0f6af6 -->

<!-- START_065fdf752125ea56db43917604f8baee -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/{id}/uploads`


<!-- END_065fdf752125ea56db43917604f8baee -->

<!-- START_b1daf8a0baeb43a0e9be8109e9bf5709 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/module-groups/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1/uploads"
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
`POST module-groups/{id}/uploads`


<!-- END_b1daf8a0baeb43a0e9be8109e9bf5709 -->

<!-- START_988db0e94c97a3ae8b72a47b69ebafd1 -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/{id}/comments`


<!-- END_988db0e94c97a3ae8b72a47b69ebafd1 -->

<!-- START_4c2a0ed6205e43a597dd20f0701db6c5 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups`


<!-- END_4c2a0ed6205e43a597dd20f0701db6c5 -->

<!-- START_d75b49d8cd2839fd4ad839fb32814ca9 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/create`


<!-- END_d75b49d8cd2839fd4ad839fb32814ca9 -->

<!-- START_cc699d77b088dcdfa9ab1c4d11a4b717 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/module-groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups"
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
`POST module-groups`


<!-- END_cc699d77b088dcdfa9ab1c4d11a4b717 -->

<!-- START_375853d0b0847ac274352a96bd18788d -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/{module_group}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_375853d0b0847ac274352a96bd18788d -->

<!-- START_757aad1db968c83b90afde122f10f5fb -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/{module_group}/edit`


<!-- END_757aad1db968c83b90afde122f10f5fb -->

<!-- START_2bfb39c1e29a64bdcb6cb8d3774c9e2e -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/module-groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1"
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
`PUT module-groups/{module_group}`

`PATCH module-groups/{module_group}`


<!-- END_2bfb39c1e29a64bdcb6cb8d3774c9e2e -->

<!-- START_53aa94d7067e08a40d8553301a58cfb6 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/module-groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/1"
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
`DELETE module-groups/{module_group}`


<!-- END_53aa94d7067e08a40d8553301a58cfb6 -->

<!-- START_2e4f1200cbaf1c937359430b5755090a -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/{id}/restore`


<!-- END_2e4f1200cbaf1c937359430b5755090a -->

<!-- START_17eace35dda0a04fb3bf181a75519d73 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/datatable/json`


<!-- END_17eace35dda0a04fb3bf181a75519d73 -->

<!-- START_d7441d27ab595a5f062e1643d718e14d -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/list/json`


<!-- END_d7441d27ab595a5f062e1643d718e14d -->

<!-- START_0a0741489b37d5eb6cf42994ad714e74 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/report`


<!-- END_0a0741489b37d5eb6cf42994ad714e74 -->

<!-- START_8d90e87c02db15a6c0b27932c52329a3 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/{id}/changes`


<!-- END_8d90e87c02db15a6c0b27932c52329a3 -->

<!-- START_1b1b447777691c2e9a25edaaa37920a5 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/{id}/uploads`


<!-- END_1b1b447777691c2e9a25edaaa37920a5 -->

<!-- START_9a905e477cd6c9e170a3926c18dcbf05 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/tenants/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1/uploads"
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
`POST tenants/{id}/uploads`


<!-- END_9a905e477cd6c9e170a3926c18dcbf05 -->

<!-- START_4e4a0e83d45c9c821b8907eb51b173dc -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/{id}/comments`


<!-- END_4e4a0e83d45c9c821b8907eb51b173dc -->

<!-- START_73afcfff1d0ce70ea0bb10d596d80946 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants`


<!-- END_73afcfff1d0ce70ea0bb10d596d80946 -->

<!-- START_5fe38e58093a2f56dff28aebf11f6981 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/create`


<!-- END_5fe38e58093a2f56dff28aebf11f6981 -->

<!-- START_2c23783119bec37d09e9d990f64e4c33 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/tenants" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants"
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
`POST tenants`


<!-- END_2c23783119bec37d09e9d990f64e4c33 -->

<!-- START_b5613d384eda1eeb0503b5e979b78bb3 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/{tenant}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_b5613d384eda1eeb0503b5e979b78bb3 -->

<!-- START_b25cfc83bf8eaed3ccbcd418bcd8fa7b -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/tenants/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET tenants/{tenant}/edit`


<!-- END_b25cfc83bf8eaed3ccbcd418bcd8fa7b -->

<!-- START_92cf271ce13b955e578b25d8cda4eed4 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1"
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
`PUT tenants/{tenant}`

`PATCH tenants/{tenant}`


<!-- END_92cf271ce13b955e578b25d8cda4eed4 -->

<!-- START_7852eac0cbc95c4848c41bfeda453f12 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/tenants/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/tenants/1"
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
`DELETE tenants/{tenant}`


<!-- END_7852eac0cbc95c4848c41bfeda453f12 -->

<!-- START_dab7c80a59f03884a77948c69fc9c343 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/{id}/restore`


<!-- END_dab7c80a59f03884a77948c69fc9c343 -->

<!-- START_01e29e527237fe980862a21e0ad08803 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/datatable/json`


<!-- END_01e29e527237fe980862a21e0ad08803 -->

<!-- START_dfa51445ac451803b5bd82e3d58211c7 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/list/json`


<!-- END_dfa51445ac451803b5bd82e3d58211c7 -->

<!-- START_1afe369051fbd1de99d9229b8c3ab1f3 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/report`


<!-- END_1afe369051fbd1de99d9229b8c3ab1f3 -->

<!-- START_224336fb848a153944c994907764c21d -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/{id}/changes`


<!-- END_224336fb848a153944c994907764c21d -->

<!-- START_c7bd5e46af2bdd10d9d76052315182fd -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/{id}/uploads`


<!-- END_c7bd5e46af2bdd10d9d76052315182fd -->

<!-- START_3d112fccaa50f01c1514b86369fa3e4c -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/users/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1/uploads"
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
`POST users/{id}/uploads`


<!-- END_3d112fccaa50f01c1514b86369fa3e4c -->

<!-- START_dad49561818e03e406cdc65074e0e697 -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/{id}/comments`


<!-- END_dad49561818e03e406cdc65074e0e697 -->

<!-- START_89966bfb9ab533cc3249b91a9090d3dc -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users`


<!-- END_89966bfb9ab533cc3249b91a9090d3dc -->

<!-- START_04094f136cb91c117bde084191e6859d -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/create`


<!-- END_04094f136cb91c117bde084191e6859d -->

<!-- START_57a8a4ba671355511e22780b1b63690e -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users"
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
`POST users`


<!-- END_57a8a4ba671355511e22780b1b63690e -->

<!-- START_5693ac2f2e21af3ebc471cd5a6244460 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_5693ac2f2e21af3ebc471cd5a6244460 -->

<!-- START_9c6e6c2d3215b1ba7d13468e7cd95e62 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/users/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET users/{user}/edit`


<!-- END_9c6e6c2d3215b1ba7d13468e7cd95e62 -->

<!-- START_7fe085c671e1b3d51e86136538b1d63f -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1"
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
`PUT users/{user}`

`PATCH users/{user}`


<!-- END_7fe085c671e1b3d51e86136538b1d63f -->

<!-- START_a948aef61c80bf96137d023464fde21f -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/users/1"
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
`DELETE users/{user}`


<!-- END_a948aef61c80bf96137d023464fde21f -->

<!-- START_1fe321fc5fb2c6549af506e171af7876 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/{id}/restore`


<!-- END_1fe321fc5fb2c6549af506e171af7876 -->

<!-- START_ef7dccaf404bf40c08fc75f616f445f3 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/datatable/json`


<!-- END_ef7dccaf404bf40c08fc75f616f445f3 -->

<!-- START_e632258db596c54c673d34188ed553ce -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/list/json`


<!-- END_e632258db596c54c673d34188ed553ce -->

<!-- START_197b4056465c291e4da543fa0e8ec0f6 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/report`


<!-- END_197b4056465c291e4da543fa0e8ec0f6 -->

<!-- START_8546846468df67e8c180aa272a19c701 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/{id}/changes`


<!-- END_8546846468df67e8c180aa272a19c701 -->

<!-- START_b574b35320d4d678c1dd25392314b2d1 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/{id}/uploads`


<!-- END_b574b35320d4d678c1dd25392314b2d1 -->

<!-- START_09e164a88cdd49cf845e975982f291d8 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/groups/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1/uploads"
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
`POST groups/{id}/uploads`


<!-- END_09e164a88cdd49cf845e975982f291d8 -->

<!-- START_ddaef1924018469839c37495045c99d1 -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/{id}/comments`


<!-- END_ddaef1924018469839c37495045c99d1 -->

<!-- START_894dc227a1aa6e82ed701d71376e6119 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups`


<!-- END_894dc227a1aa6e82ed701d71376e6119 -->

<!-- START_ba2881c4d6a4e6f99de5937c8ed6da3e -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/create`


<!-- END_ba2881c4d6a4e6f99de5937c8ed6da3e -->

<!-- START_96fba94c1d4aba1e5b36355f578b7ab8 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups"
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
`POST groups`


<!-- END_96fba94c1d4aba1e5b36355f578b7ab8 -->

<!-- START_6dc27373a42b5b5caa7925c3959aaccc -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/{group}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_6dc27373a42b5b5caa7925c3959aaccc -->

<!-- START_e01343a86180bf12de5a9be3512c61b3 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/groups/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/{group}/edit`


<!-- END_e01343a86180bf12de5a9be3512c61b3 -->

<!-- START_2419a8363fd3e7924c8c5b10a232584f -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1"
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
`PUT groups/{group}`

`PATCH groups/{group}`


<!-- END_2419a8363fd3e7924c8c5b10a232584f -->

<!-- START_04b303eeab6dbc1b21f6a2f9e098b89a -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/groups/1"
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
`DELETE groups/{group}`


<!-- END_04b303eeab6dbc1b21f6a2f9e098b89a -->

<!-- START_49070ef0b90eef06251cb0c337ac047c -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/{id}/restore`


<!-- END_49070ef0b90eef06251cb0c337ac047c -->

<!-- START_a61bf2e3d2fc0207a836b2fa091bd1f4 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/datatable/json`


<!-- END_a61bf2e3d2fc0207a836b2fa091bd1f4 -->

<!-- START_8d29e14757620c4d8fbd9e45bcf72f8b -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/list/json`


<!-- END_8d29e14757620c4d8fbd9e45bcf72f8b -->

<!-- START_07a5d80dfeba4de43ff8b935cc7100a9 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/report`


<!-- END_07a5d80dfeba4de43ff8b935cc7100a9 -->

<!-- START_bdda734fde79a579b9e81c63d4cc486a -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/{id}/changes`


<!-- END_bdda734fde79a579b9e81c63d4cc486a -->

<!-- START_ffe6065550fcc7018ad9f77a5b36e1b1 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/{id}/uploads`


<!-- END_ffe6065550fcc7018ad9f77a5b36e1b1 -->

<!-- START_7e3aafc7b93fa686dd6f130dd211ff1b -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/uploads/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1/uploads"
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
`POST uploads/{id}/uploads`


<!-- END_7e3aafc7b93fa686dd6f130dd211ff1b -->

<!-- START_4629a4f9d04487c5104983adaa73d950 -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/{id}/comments`


<!-- END_4629a4f9d04487c5104983adaa73d950 -->

<!-- START_b357e20afd62cce274086f283e267769 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads`


<!-- END_b357e20afd62cce274086f283e267769 -->

<!-- START_5d3641c2d9a559cd43e0cec76e706d90 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/create`


<!-- END_5d3641c2d9a559cd43e0cec76e706d90 -->

<!-- START_bf7dbbf7017bd89115d59d99e7077222 -->
## uploads
> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads"
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
`POST uploads`


<!-- END_bf7dbbf7017bd89115d59d99e7077222 -->

<!-- START_a1fa93813d74d769c3a27506a2b36939 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/{upload}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_a1fa93813d74d769c3a27506a2b36939 -->

<!-- START_f6707894cd99657c0c696e48a40eeed7 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/uploads/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET uploads/{upload}/edit`


<!-- END_f6707894cd99657c0c696e48a40eeed7 -->

<!-- START_d7b266a9b81d6e2be0223f3f2a8becc6 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/uploads/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1"
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
`PUT uploads/{upload}`

`PATCH uploads/{upload}`


<!-- END_d7b266a9b81d6e2be0223f3f2a8becc6 -->

<!-- START_fd41ddf5b659a775dd9f3af31af037c3 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/uploads/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/uploads/1"
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
`DELETE uploads/{upload}`


<!-- END_fd41ddf5b659a775dd9f3af31af037c3 -->

<!-- START_813b40d6fdc71d692647375eeee86ccd -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/{id}/restore`


<!-- END_813b40d6fdc71d692647375eeee86ccd -->

<!-- START_289ff058bcc11d6cf6c38d5bd14c358c -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/datatable/json`


<!-- END_289ff058bcc11d6cf6c38d5bd14c358c -->

<!-- START_037bfe7bbed4302299c18b87ea331a71 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/list/json`


<!-- END_037bfe7bbed4302299c18b87ea331a71 -->

<!-- START_c6f481d380738b396cd2c3f09b59df47 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/report`


<!-- END_c6f481d380738b396cd2c3f09b59df47 -->

<!-- START_334ae3698cb72b75d032e7fbade1b2c3 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/{id}/changes`


<!-- END_334ae3698cb72b75d032e7fbade1b2c3 -->

<!-- START_6b65afe97272168db4c7e6acdb4c5570 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/{id}/uploads`


<!-- END_6b65afe97272168db4c7e6acdb4c5570 -->

<!-- START_1611decef92be9542f4d3f720b765b3e -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/settings/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1/uploads"
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
`POST settings/{id}/uploads`


<!-- END_1611decef92be9542f4d3f720b765b3e -->

<!-- START_cfcaa054db651841cfdacb115aef90fd -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/{id}/comments`


<!-- END_cfcaa054db651841cfdacb115aef90fd -->

<!-- START_62c09084921155416dc5e292b293a549 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings`


<!-- END_62c09084921155416dc5e292b293a549 -->

<!-- START_b49a7a5c0d23d475034442f51c488141 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/create`


<!-- END_b49a7a5c0d23d475034442f51c488141 -->

<!-- START_36ad081f9741972c7a63fb2599a20fa5 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings"
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
`POST settings`


<!-- END_36ad081f9741972c7a63fb2599a20fa5 -->

<!-- START_0330397366fb8cfa003b5ee06f592f61 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/{setting}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_0330397366fb8cfa003b5ee06f592f61 -->

<!-- START_672184a6796051ed6de640993a162785 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/settings/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET settings/{setting}/edit`


<!-- END_672184a6796051ed6de640993a162785 -->

<!-- START_c56c43ee795f9bfd90a7baf25391349d -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1"
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
`PUT settings/{setting}`

`PATCH settings/{setting}`


<!-- END_c56c43ee795f9bfd90a7baf25391349d -->

<!-- START_5e78767d7f870d21ca87b2b0121aeef6 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/settings/1"
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
`DELETE settings/{setting}`


<!-- END_5e78767d7f870d21ca87b2b0121aeef6 -->

<!-- START_c2ced45ca18a2c065b40ebc8cf11d8da -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/{id}/restore`


<!-- END_c2ced45ca18a2c065b40ebc8cf11d8da -->

<!-- START_0c5cab9713ddd9005ff539819760b52a -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/datatable/json`


<!-- END_0c5cab9713ddd9005ff539819760b52a -->

<!-- START_6bd45b5a3fac91211aa1a6d274ace298 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/list/json`


<!-- END_6bd45b5a3fac91211aa1a6d274ace298 -->

<!-- START_ce167da41d48df3f5b6a4875b61f6452 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/report`


<!-- END_ce167da41d48df3f5b6a4875b61f6452 -->

<!-- START_77d3ca054cda026ab052f87c23fb3498 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/{id}/changes`


<!-- END_77d3ca054cda026ab052f87c23fb3498 -->

<!-- START_aced2a7dcd136120c23f49eca9c68965 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/{id}/uploads`


<!-- END_aced2a7dcd136120c23f49eca9c68965 -->

<!-- START_de7df505eaf71b459a6b78aa196639cd -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/reports/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1/uploads"
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
`POST reports/{id}/uploads`


<!-- END_de7df505eaf71b459a6b78aa196639cd -->

<!-- START_52c800e621c0eb81c88cc22ffe07870e -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/{id}/comments`


<!-- END_52c800e621c0eb81c88cc22ffe07870e -->

<!-- START_1c0ac68b1aa6d477749493a3b9de46f9 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports`


<!-- END_1c0ac68b1aa6d477749493a3b9de46f9 -->

<!-- START_abc136da98a15d10fc73a0667720020d -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/create`


<!-- END_abc136da98a15d10fc73a0667720020d -->

<!-- START_fb3d715bfa4d5e947b5204ac082af496 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports"
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
`POST reports`


<!-- END_fb3d715bfa4d5e947b5204ac082af496 -->

<!-- START_cc4cc5cbae4dba323fed219b9649c473 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/{report}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_cc4cc5cbae4dba323fed219b9649c473 -->

<!-- START_f434a45e15dae2a6cae778566a16b278 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reports/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET reports/{report}/edit`


<!-- END_f434a45e15dae2a6cae778566a16b278 -->

<!-- START_04479a2c2310f885180ede9a5f512b19 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/reports/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1"
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
`PUT reports/{report}`

`PATCH reports/{report}`


<!-- END_04479a2c2310f885180ede9a5f512b19 -->

<!-- START_e8290e60db2f2d2eaa49ceef17244e11 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/reports/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reports/1"
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
`DELETE reports/{report}`


<!-- END_e8290e60db2f2d2eaa49ceef17244e11 -->

<!-- START_54c9c0e51ac7a550cc66e5f6583bd90f -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/{id}/restore`


<!-- END_54c9c0e51ac7a550cc66e5f6583bd90f -->

<!-- START_484b0af0d79726b4380850ac3e2663c4 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/datatable/json`


<!-- END_484b0af0d79726b4380850ac3e2663c4 -->

<!-- START_6660346fc28a75b279e7ae12379e1b14 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/list/json`


<!-- END_6660346fc28a75b279e7ae12379e1b14 -->

<!-- START_1a80ef6d8a7f7580792907e17aa1c4df -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/report`


<!-- END_1a80ef6d8a7f7580792907e17aa1c4df -->

<!-- START_1840e0fd6b1d921bf1d1d0bd59695a93 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/{id}/changes`


<!-- END_1840e0fd6b1d921bf1d1d0bd59695a93 -->

<!-- START_32937999058a26d2f9861b3ad85dadcf -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/{id}/uploads`


<!-- END_32937999058a26d2f9861b3ad85dadcf -->

<!-- START_18e9790547d9be3a678045c8e725028d -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/lorem-ipsums/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1/uploads"
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
`POST lorem-ipsums/{id}/uploads`


<!-- END_18e9790547d9be3a678045c8e725028d -->

<!-- START_f507c6e57cbdc5ddb2a7040b2bbd51bf -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/{id}/comments`


<!-- END_f507c6e57cbdc5ddb2a7040b2bbd51bf -->

<!-- START_c6d8fe986c7757185b0930d32c637bdd -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums`


<!-- END_c6d8fe986c7757185b0930d32c637bdd -->

<!-- START_f005c986bc22827ac7dde9998e11458e -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/create`


<!-- END_f005c986bc22827ac7dde9998e11458e -->

<!-- START_d1fe54732ceb2e2125a7f7970ddd99b5 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/lorem-ipsums" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums"
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
`POST lorem-ipsums`


<!-- END_d1fe54732ceb2e2125a7f7970ddd99b5 -->

<!-- START_3793b5e44a2b7cf98ecc1bcb851b5b5e -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/{lorem_ipsum}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_3793b5e44a2b7cf98ecc1bcb851b5b5e -->

<!-- START_049cf0b278c293901d44bcb3b9dc0f7a -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/lorem-ipsums/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET lorem-ipsums/{lorem_ipsum}/edit`


<!-- END_049cf0b278c293901d44bcb3b9dc0f7a -->

<!-- START_e1900634f639f5814cf787fc876ea47a -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/lorem-ipsums/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1"
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
`PUT lorem-ipsums/{lorem_ipsum}`

`PATCH lorem-ipsums/{lorem_ipsum}`


<!-- END_e1900634f639f5814cf787fc876ea47a -->

<!-- START_eb32242322c3842155e448700d17fdd9 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/lorem-ipsums/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/lorem-ipsums/1"
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
`DELETE lorem-ipsums/{lorem_ipsum}`


<!-- END_eb32242322c3842155e448700d17fdd9 -->

<!-- START_ba21809332854e178abbc596b144b5f3 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/{id}/restore`


<!-- END_ba21809332854e178abbc596b144b5f3 -->

<!-- START_b0ae62e8dcbdb837e41c23f2867c1cf3 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/datatable/json`


<!-- END_b0ae62e8dcbdb837e41c23f2867c1cf3 -->

<!-- START_44765bd5569ce2416eb81655918a788d -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/list/json`


<!-- END_44765bd5569ce2416eb81655918a788d -->

<!-- START_917838388ee6ef35d343c4adb0c0e688 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/report`


<!-- END_917838388ee6ef35d343c4adb0c0e688 -->

<!-- START_55e9be005dd8697ebdf6f74741a5a3e4 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/{id}/changes`


<!-- END_55e9be005dd8697ebdf6f74741a5a3e4 -->

<!-- START_60d3ddba27a5305ff938ee9ae12a5662 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/{id}/uploads`


<!-- END_60d3ddba27a5305ff938ee9ae12a5662 -->

<!-- START_f698c673bec867c4e963f0062f751b00 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/dolor-sits/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1/uploads"
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
`POST dolor-sits/{id}/uploads`


<!-- END_f698c673bec867c4e963f0062f751b00 -->

<!-- START_87e875dda3d262c56a7205c24d5da1ea -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/{id}/comments`


<!-- END_87e875dda3d262c56a7205c24d5da1ea -->

<!-- START_9a7f90100f15106415452f036e6ac24a -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits`


<!-- END_9a7f90100f15106415452f036e6ac24a -->

<!-- START_a6cbfb0b540e54b6083bf4151d9ebaba -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/create`


<!-- END_a6cbfb0b540e54b6083bf4151d9ebaba -->

<!-- START_a0607c2dbfb3d89f2bc2986b3411c7a2 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/dolor-sits" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits"
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
`POST dolor-sits`


<!-- END_a0607c2dbfb3d89f2bc2986b3411c7a2 -->

<!-- START_1b43f7be8116c89a8560d8594db98c51 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/{dolor_sit}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_1b43f7be8116c89a8560d8594db98c51 -->

<!-- START_93b3a3cf44365e91a04d4316c28aa664 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/dolor-sits/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET dolor-sits/{dolor_sit}/edit`


<!-- END_93b3a3cf44365e91a04d4316c28aa664 -->

<!-- START_66f5aaa6c1e1123b58b471e3f14b5898 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/dolor-sits/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1"
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
`PUT dolor-sits/{dolor_sit}`

`PATCH dolor-sits/{dolor_sit}`


<!-- END_66f5aaa6c1e1123b58b471e3f14b5898 -->

<!-- START_798513bf2a93e7ab012d7fc2249f86f3 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/dolor-sits/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/dolor-sits/1"
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
`DELETE dolor-sits/{dolor_sit}`


<!-- END_798513bf2a93e7ab012d7fc2249f86f3 -->

<!-- START_127577bfa5543e73592255d2041bd658 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/{id}/restore`


<!-- END_127577bfa5543e73592255d2041bd658 -->

<!-- START_1e27c89f38bcb9c6cffacce676d273a1 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/datatable/json`


<!-- END_1e27c89f38bcb9c6cffacce676d273a1 -->

<!-- START_29743900326218e185737a9d8e8c286d -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/list/json`


<!-- END_29743900326218e185737a9d8e8c286d -->

<!-- START_daa6d019839f0f5d8d42e25a9ac81699 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/report`


<!-- END_daa6d019839f0f5d8d42e25a9ac81699 -->

<!-- START_f048602143e1d1cf9ccb6a4e3e466a51 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/{id}/changes`


<!-- END_f048602143e1d1cf9ccb6a4e3e466a51 -->

<!-- START_dc47f721dfc40fb729fb477626ff6108 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/{id}/uploads`


<!-- END_dc47f721dfc40fb729fb477626ff6108 -->

<!-- START_57fdc3556d48c87ef9984290a07590e1 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/subscriptions/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1/uploads"
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
`POST subscriptions/{id}/uploads`


<!-- END_57fdc3556d48c87ef9984290a07590e1 -->

<!-- START_b3a408be3eabe98aa9c671d62a437ec1 -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/{id}/comments`


<!-- END_b3a408be3eabe98aa9c671d62a437ec1 -->

<!-- START_8b8864ad726e37ddaa26506fc291b697 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions`


<!-- END_8b8864ad726e37ddaa26506fc291b697 -->

<!-- START_9fd7c4664c5bb5f5c08fd764096c4ef7 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/create`


<!-- END_9fd7c4664c5bb5f5c08fd764096c4ef7 -->

<!-- START_0bdc96bc3447705219ed3e46bc273514 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/subscriptions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions"
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
`POST subscriptions`


<!-- END_0bdc96bc3447705219ed3e46bc273514 -->

<!-- START_9daf5a97297af46cf492c4e339b9053a -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/{subscription}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_9daf5a97297af46cf492c4e339b9053a -->

<!-- START_201dc2c9d0897ee21b0c25b3a66c702f -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/subscriptions/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET subscriptions/{subscription}/edit`


<!-- END_201dc2c9d0897ee21b0c25b3a66c702f -->

<!-- START_4cc7dc8c69b82016369892b1c3375464 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/subscriptions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1"
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
`PUT subscriptions/{subscription}`

`PATCH subscriptions/{subscription}`


<!-- END_4cc7dc8c69b82016369892b1c3375464 -->

<!-- START_0b41ce5e3f672f7f5ed6abdb44e406e4 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/subscriptions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/subscriptions/1"
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
`DELETE subscriptions/{subscription}`


<!-- END_0b41ce5e3f672f7f5ed6abdb44e406e4 -->

<!-- START_5aa1e4d585948504b77b4668acab64b2 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/{id}/restore`


<!-- END_5aa1e4d585948504b77b4668acab64b2 -->

<!-- START_409a1a2e25cfad3d56148ce1580b3a00 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/datatable/json`


<!-- END_409a1a2e25cfad3d56148ce1580b3a00 -->

<!-- START_83409346cacbc512f4922e2ed301984e -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/list/json`


<!-- END_83409346cacbc512f4922e2ed301984e -->

<!-- START_428bc27e3d7a8c46d1a89ce7b7eb207f -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/report`


<!-- END_428bc27e3d7a8c46d1a89ce7b7eb207f -->

<!-- START_f06de7a1508f6cd53f8487576426a7db -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/{id}/changes`


<!-- END_f06de7a1508f6cd53f8487576426a7db -->

<!-- START_1a2dd068773aa7af10a5a8360d701ff1 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/{id}/uploads`


<!-- END_1a2dd068773aa7af10a5a8360d701ff1 -->

<!-- START_001a04995c37f97d4ac31ffa860ec751 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/packages/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1/uploads"
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
`POST packages/{id}/uploads`


<!-- END_001a04995c37f97d4ac31ffa860ec751 -->

<!-- START_ab7dd32571e0fb9b60dd4aba23254ee8 -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/{id}/comments`


<!-- END_ab7dd32571e0fb9b60dd4aba23254ee8 -->

<!-- START_176e1c27e4fe66e502d2faebb8aa5a69 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages`


<!-- END_176e1c27e4fe66e502d2faebb8aa5a69 -->

<!-- START_41b3c48e8e57788c3b845cce767be2bd -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/create`


<!-- END_41b3c48e8e57788c3b845cce767be2bd -->

<!-- START_dc5641320fa1a99c8556e8f81b7498f9 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/packages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages"
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
`POST packages`


<!-- END_dc5641320fa1a99c8556e8f81b7498f9 -->

<!-- START_d12353b59ba8073355ef678d37190ea7 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/{package}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_d12353b59ba8073355ef678d37190ea7 -->

<!-- START_7a8918f079883048882f9139f4fc1001 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/packages/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET packages/{package}/edit`


<!-- END_7a8918f079883048882f9139f4fc1001 -->

<!-- START_151383086a9e7edddd9093c9a0f55871 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/packages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1"
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
`PUT packages/{package}`

`PATCH packages/{package}`


<!-- END_151383086a9e7edddd9093c9a0f55871 -->

<!-- START_e4a69165ac781ac690ba435fa4e9cb84 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/packages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/packages/1"
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
`DELETE packages/{package}`


<!-- END_e4a69165ac781ac690ba435fa4e9cb84 -->

<!-- START_f089f3e8681e28c145afa19fa25df2a0 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/{id}/restore`


<!-- END_f089f3e8681e28c145afa19fa25df2a0 -->

<!-- START_84faa1b4417598a9b2d8b303d5e1b92c -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/datatable/json`


<!-- END_84faa1b4417598a9b2d8b303d5e1b92c -->

<!-- START_790bae5f23fd8103fa6b3c7c390f8131 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/list/json`


<!-- END_790bae5f23fd8103fa6b3c7c390f8131 -->

<!-- START_c85e43571c9443da67325c1fd562acab -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/report`


<!-- END_c85e43571c9443da67325c1fd562acab -->

<!-- START_757cfc3b42268ba9b8a366cb0dd35e92 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/{id}/changes`


<!-- END_757cfc3b42268ba9b8a366cb0dd35e92 -->

<!-- START_bfd3aa8a73a58131f62a5b4636cf627c -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/{id}/uploads`


<!-- END_bfd3aa8a73a58131f62a5b4636cf627c -->

<!-- START_2ee96b88319028b1ccf6a33a76c9e465 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/countries/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1/uploads"
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
`POST countries/{id}/uploads`


<!-- END_2ee96b88319028b1ccf6a33a76c9e465 -->

<!-- START_0603549e442725e57a37952a4758c57f -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/{id}/comments`


<!-- END_0603549e442725e57a37952a4758c57f -->

<!-- START_c1c192be6869849e72ede138e91bd809 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries`


<!-- END_c1c192be6869849e72ede138e91bd809 -->

<!-- START_dc94f3e734ea0ad7e87024e2e2959446 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/create`


<!-- END_dc94f3e734ea0ad7e87024e2e2959446 -->

<!-- START_89d26aca0ffa04b0a8108927d2939425 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries"
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
`POST countries`


<!-- END_89d26aca0ffa04b0a8108927d2939425 -->

<!-- START_c3b90898682f9137ce663113446483fa -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/{country}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_c3b90898682f9137ce663113446483fa -->

<!-- START_f545d9322aa9ddf50dc304849d7e16f9 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/countries/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET countries/{country}/edit`


<!-- END_f545d9322aa9ddf50dc304849d7e16f9 -->

<!-- START_e4b53ea776d4d68a2336c90f2f694896 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/countries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1"
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
`PUT countries/{country}`

`PATCH countries/{country}`


<!-- END_e4b53ea776d4d68a2336c90f2f694896 -->

<!-- START_63eaf71364a12e4c26e47b9fe4be4bc6 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/countries/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/countries/1"
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
`DELETE countries/{country}`


<!-- END_63eaf71364a12e4c26e47b9fe4be4bc6 -->

<!-- START_3058faead2231f69284695654f884761 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/{id}/restore`


<!-- END_3058faead2231f69284695654f884761 -->

<!-- START_928fbb705dacf748f722d72ae40326a6 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/datatable/json`


<!-- END_928fbb705dacf748f722d72ae40326a6 -->

<!-- START_c5b1d094deebdeb77dbdc828a64c263c -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/list/json`


<!-- END_c5b1d094deebdeb77dbdc828a64c263c -->

<!-- START_5f50a2ee469aaba7d190304fd2a0d294 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/report`


<!-- END_5f50a2ee469aaba7d190304fd2a0d294 -->

<!-- START_ac129ba2dc528e62ebf7be9da49fbef2 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/{id}/changes`


<!-- END_ac129ba2dc528e62ebf7be9da49fbef2 -->

<!-- START_e2523825eff54763c1702af0001e930e -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/{id}/uploads`


<!-- END_e2523825eff54763c1702af0001e930e -->

<!-- START_f3e8aef041dc601f32b1318fa5bb4acc -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/notifications/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1/uploads"
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
`POST notifications/{id}/uploads`


<!-- END_f3e8aef041dc601f32b1318fa5bb4acc -->

<!-- START_c2a295e9e8b890fa74d97245e1e6f784 -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/{id}/comments`


<!-- END_c2a295e9e8b890fa74d97245e1e6f784 -->

<!-- START_e4f3f8570b9b48dd1329d9b3eaed5bfc -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications`


<!-- END_e4f3f8570b9b48dd1329d9b3eaed5bfc -->

<!-- START_7faf469a6a479db5913802ed5412c682 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/create`


<!-- END_7faf469a6a479db5913802ed5412c682 -->

<!-- START_531a58e86411335f1a837d33aaf70ec8 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications"
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
`POST notifications`


<!-- END_531a58e86411335f1a837d33aaf70ec8 -->

<!-- START_bd6868e2be3dab7f27d35ec4c42e37d1 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/{notification}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_bd6868e2be3dab7f27d35ec4c42e37d1 -->

<!-- START_8530f6723d3d156dd1b63a270c34b3d1 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/notifications/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications/{notification}/edit`


<!-- END_8530f6723d3d156dd1b63a270c34b3d1 -->

<!-- START_b26107037cfd982b5c9cf1c121aa67ad -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/notifications/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1"
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
`PUT notifications/{notification}`

`PATCH notifications/{notification}`


<!-- END_b26107037cfd982b5c9cf1c121aa67ad -->

<!-- START_56bfe5fda966da4a3f9bf6feee557552 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/notifications/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/notifications/1"
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
`DELETE notifications/{notification}`


<!-- END_56bfe5fda966da4a3f9bf6feee557552 -->

<!-- START_982a5c9fde0f2a75e2cb72efde202b47 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{id}/restore`


<!-- END_982a5c9fde0f2a75e2cb72efde202b47 -->

<!-- START_3f94d24471dfe366c3334ba98095ecb2 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/datatable/json`


<!-- END_3f94d24471dfe366c3334ba98095ecb2 -->

<!-- START_53bbd4e002f5eeebae7309d990c88bc8 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/list/json`


<!-- END_53bbd4e002f5eeebae7309d990c88bc8 -->

<!-- START_47b0bafb6b5e26709f637d2aba579cfd -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/report`


<!-- END_47b0bafb6b5e26709f637d2aba579cfd -->

<!-- START_1d9aff8346d06834d646391056560573 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{id}/changes`


<!-- END_1d9aff8346d06834d646391056560573 -->

<!-- START_6c019009a2609b7ae1bb3e67da84ffd0 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{id}/uploads`


<!-- END_6c019009a2609b7ae1bb3e67da84ffd0 -->

<!-- START_3b63ee28f37c3a0ea5cc39d6c22d6930 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/projects/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1/uploads"
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
`POST projects/{id}/uploads`


<!-- END_3b63ee28f37c3a0ea5cc39d6c22d6930 -->

<!-- START_c05be45ce105d0ea56cab48ef4155a8b -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{id}/comments`


<!-- END_c05be45ce105d0ea56cab48ef4155a8b -->

<!-- START_ba05cb3a11667fbd2926fcfc72905d8a -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects`


<!-- END_ba05cb3a11667fbd2926fcfc72905d8a -->

<!-- START_8f546be87408a19565ba4bfccdb9bc46 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/create`


<!-- END_8f546be87408a19565ba4bfccdb9bc46 -->

<!-- START_6457c064807333898638aaa8f41ba1ab -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects"
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
`POST projects`


<!-- END_6457c064807333898638aaa8f41ba1ab -->

<!-- START_559ca32d29b9eee92470ea6238f2e491 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{project}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_559ca32d29b9eee92470ea6238f2e491 -->

<!-- START_c67226e65a6121c577cf821d15168dc8 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/projects/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET projects/{project}/edit`


<!-- END_c67226e65a6121c577cf821d15168dc8 -->

<!-- START_d0e574164f37de9866bf98e489a3b5d0 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1"
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
`PUT projects/{project}`

`PATCH projects/{project}`


<!-- END_d0e574164f37de9866bf98e489a3b5d0 -->

<!-- START_7cb1e494fdd6b6708f75dbf4b815c552 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/projects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/projects/1"
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
`DELETE projects/{project}`


<!-- END_7cb1e494fdd6b6708f75dbf4b815c552 -->

<!-- START_ead82609642d12d4869060fa31e1d43a -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/{id}/restore`


<!-- END_ead82609642d12d4869060fa31e1d43a -->

<!-- START_93bf8c27cfaadcc22f5127423f62b08c -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/datatable/json`


<!-- END_93bf8c27cfaadcc22f5127423f62b08c -->

<!-- START_40c73b226d4149b918baf42d5480d888 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/list/json`


<!-- END_40c73b226d4149b918baf42d5480d888 -->

<!-- START_c98693b6abc5d73aff41a345ab4ad004 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/report`


<!-- END_c98693b6abc5d73aff41a345ab4ad004 -->

<!-- START_ee5fb0bb478bf5657bfdfe33f8240c99 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/{id}/changes`


<!-- END_ee5fb0bb478bf5657bfdfe33f8240c99 -->

<!-- START_c1ede8ae9bb0173548693ee0b6fb47ea -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/{id}/uploads`


<!-- END_c1ede8ae9bb0173548693ee0b6fb47ea -->

<!-- START_9e2315d0cc0e2a37586c61c9053358dd -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/comments/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1/uploads"
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
`POST comments/{id}/uploads`


<!-- END_9e2315d0cc0e2a37586c61c9053358dd -->

<!-- START_839b74b02bdc8ab44785dda71022130a -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/{id}/comments`


<!-- END_839b74b02bdc8ab44785dda71022130a -->

<!-- START_d728f2176d9cdd509e70b4addfa59568 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments`


<!-- END_d728f2176d9cdd509e70b4addfa59568 -->

<!-- START_1b00d25d48d0ffecbd7666826bca1161 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/create`


<!-- END_1b00d25d48d0ffecbd7666826bca1161 -->

<!-- START_dbbdec5432271c7207f66a514c3d40f3 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments"
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
`POST comments`


<!-- END_dbbdec5432271c7207f66a514c3d40f3 -->

<!-- START_4b70241db734b6750c3cf375d7fb7f3d -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/{comment}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_4b70241db734b6750c3cf375d7fb7f3d -->

<!-- START_2214a0a6ed2bbd597061f5bac09eba14 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/comments/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET comments/{comment}/edit`


<!-- END_2214a0a6ed2bbd597061f5bac09eba14 -->

<!-- START_d77a52a1ec0772eb16f009b222565815 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1"
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
`PUT comments/{comment}`

`PATCH comments/{comment}`


<!-- END_d77a52a1ec0772eb16f009b222565815 -->

<!-- START_4be6c9e6ba186c0d21ea11a3179908f0 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/comments/1"
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
`DELETE comments/{comment}`


<!-- END_4be6c9e6ba186c0d21ea11a3179908f0 -->

<!-- START_d36bda13513284da9014ce3abe0eed04 -->
## Restore a soft-deleted.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1/restore"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/{id}/restore`


<!-- END_d36bda13513284da9014ce3abe0eed04 -->

<!-- START_45f7b78688bec6478b8b71d9b40228b1 -->
## Returns datatable json for the module index page
A route is automatically created for all modules to access this controller function

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/datatable/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/datatable/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/datatable/json`


<!-- END_45f7b78688bec6478b8b71d9b40228b1 -->

<!-- START_e107e4ec54840afb4087e0c535e98394 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/list/json"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/list/json`


<!-- END_e107e4ec54840afb4087e0c535e98394 -->

<!-- START_c7ff6d6dd4844c598daf79a9c94100f6 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/report"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/report`


<!-- END_c7ff6d6dd4844c598daf79a9c94100f6 -->

<!-- START_b2865c1652509b3be3cb69ea2867da90 -->
## Show all the changes/change logs of an item

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/1/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/{id}/changes`


<!-- END_b2865c1652509b3be3cb69ea2867da90 -->

<!-- START_c64244da663233b05b4d93509fc6db52 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1/uploads"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/{id}/uploads`


<!-- END_c64244da663233b05b4d93509fc6db52 -->

<!-- START_09939f0248a3f781f26b4fb2f39c7c56 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/changes/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1/uploads"
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
`POST changes/{id}/uploads`


<!-- END_09939f0248a3f781f26b4fb2f39c7c56 -->

<!-- START_02b82495523ac0ffabfa146095681745 -->
## Get all the comments of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/1/comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1/comments"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/{id}/comments`


<!-- END_02b82495523ac0ffabfa146095681745 -->

<!-- START_081a03da41a056772f7839da5f92f41d -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes`


<!-- END_081a03da41a056772f7839da5f92f41d -->

<!-- START_a441ca98ea389db51fe9eeff60bec8a7 -->
## Shows an element create form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/create"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/create`


<!-- END_a441ca98ea389db51fe9eeff60bec8a7 -->

<!-- START_3fbcee97c6ec3d52b11c0f030b68fc4f -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes"
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
`POST changes`


<!-- END_3fbcee97c6ec3d52b11c0f030b68fc4f -->

<!-- START_f310ca90d2888dffdb32cad09f4c0b0b -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/{change}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_f310ca90d2888dffdb32cad09f4c0b0b -->

<!-- START_34950bfbf3659bbe51ecbea51d792436 -->
## Edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/changes/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1/edit"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET changes/{change}/edit`


<!-- END_34950bfbf3659bbe51ecbea51d792436 -->

<!-- START_174fc5177ccd59cccf9a72571e5e283f -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/changes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1"
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
`PUT changes/{change}`

`PATCH changes/{change}`


<!-- END_174fc5177ccd59cccf9a72571e5e283f -->

<!-- START_cf5f070098c3338970dd7e829b8739af -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/changes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/changes/1"
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
`DELETE changes/{change}`


<!-- END_cf5f070098c3338970dd7e829b8739af -->

<!-- START_3c2caf92c917fa6fdfc571182970d446 -->
## module-groups/index/app-settings
> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/module-groups/index/app-settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/module-groups/index/app-settings"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET module-groups/index/app-settings`


<!-- END_3c2caf92c917fa6fdfc571182970d446 -->

<!-- START_d5f8d1b62f9196c05df4d5e5c49dda62 -->
## Downloads the file with HTTP response to hide the file url

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/download/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/download/1"
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


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET download/{uuid}`


<!-- END_d5f8d1b62f9196c05df4d5e5c49dda62 -->

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

<!-- START_e1e1b1eb69c528b73bb009d0b054c3ff -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/modules/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/modules\/list\/json?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/modules\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/modules\/list\/json",
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
    "redirect": "http:\/\/localhost\/api\/1.0\/modules\/list\/json"
}
```

### HTTP Request
`GET api/1.0/modules/list/json`


<!-- END_e1e1b1eb69c528b73bb009d0b054c3ff -->

<!-- START_9dc67195fe1e8d8f62b9dfe8cd1b6025 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/modules/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/modules/report"
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
null
```

### HTTP Request
`GET api/1.0/modules/report`


<!-- END_9dc67195fe1e8d8f62b9dfe8cd1b6025 -->

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

<!-- START_44aa204054d79546b60055acfe1374a4 -->
## Index/List page to show grid

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


> Example response (500):

```json
{
    "message": "Server Error"
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

<!-- START_732a1e4afe0625643ff6ed3a9824bdfd -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/module-groups/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/module-groups\/list\/json?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/module-groups\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/module-groups\/list\/json",
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
    "redirect": "http:\/\/localhost\/api\/1.0\/module-groups\/list\/json"
}
```

### HTTP Request
`GET api/1.0/module-groups/list/json`


<!-- END_732a1e4afe0625643ff6ed3a9824bdfd -->

<!-- START_b87dec7da30a718aebf4e562ccba8e19 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/module-groups/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/module-groups/report"
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
null
```

### HTTP Request
`GET api/1.0/module-groups/report`


<!-- END_b87dec7da30a718aebf4e562ccba8e19 -->

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

<!-- START_7b87d505a4b2516cad0814007d2f4d92 -->
## Index/List page to show grid

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


> Example response (500):

```json
{
    "message": "Server Error"
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

<!-- START_a5763cebedb61a35c5f065e1245d232e -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/tenants/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/tenants\/list\/json?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/tenants\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/tenants\/list\/json",
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
    "redirect": "http:\/\/localhost\/api\/1.0\/tenants\/list\/json"
}
```

### HTTP Request
`GET api/1.0/tenants/list/json`


<!-- END_a5763cebedb61a35c5f065e1245d232e -->

<!-- START_4113271caa9e6f1ca9d322455d903de0 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/tenants/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/tenants/report"
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
null
```

### HTTP Request
`GET api/1.0/tenants/report`


<!-- END_4113271caa9e6f1ca9d322455d903de0 -->

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

<!-- START_6e2d71376453ad9e14dfd23c1cc01cbc -->
## Index/List page to show grid

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


> Example response (500):

```json
{
    "message": "Server Error"
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

<!-- START_731d8034c653f52be4c314f29cef9cac -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/users/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/users\/list\/json?page=1",
        "from": 1,
        "last_page": 2,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/users\/list\/json?page=2",
        "next_page_url": "http:\/\/localhost\/api\/1.0\/users\/list\/json?page=2",
        "path": "http:\/\/localhost\/api\/1.0\/users\/list\/json",
        "per_page": 20,
        "prev_page_url": null,
        "to": 20,
        "total": 31,
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
                "updated_at": "2021-02-13 13:51:36",
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
                "last_login_at": "2021-02-13 13:39:29",
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
                "updated_at": "2021-02-13 13:51:36",
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
    "redirect": "http:\/\/localhost\/api\/1.0\/users\/list\/json"
}
```

### HTTP Request
`GET api/1.0/users/list/json`


<!-- END_731d8034c653f52be4c314f29cef9cac -->

<!-- START_0718ccaf85df2aae977f3011fed80486 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/users/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/users/report"
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
null
```

### HTTP Request
`GET api/1.0/users/report`


<!-- END_0718ccaf85df2aae977f3011fed80486 -->

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

<!-- START_4dccb69b7dcbfaf1004416c926cbbd47 -->
## Index/List page to show grid

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
        "last_page": 2,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/users?page=2",
        "next_page_url": "http:\/\/localhost\/api\/1.0\/users?page=2",
        "path": "http:\/\/localhost\/api\/1.0\/users",
        "per_page": 20,
        "prev_page_url": null,
        "to": 20,
        "total": 31,
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
                "updated_at": "2021-02-13 13:51:36",
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
                "last_login_at": "2021-02-13 13:39:29",
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
                "updated_at": "2021-02-13 13:51:36",
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


> Example response (500):

```json
{
    "message": "Server Error"
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

<!-- START_2ae580f07601c73e4422950781245394 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/groups/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/groups\/list\/json?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/groups\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/groups\/list\/json",
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
    "redirect": "http:\/\/localhost\/api\/1.0\/groups\/list\/json"
}
```

### HTTP Request
`GET api/1.0/groups/list/json`


<!-- END_2ae580f07601c73e4422950781245394 -->

<!-- START_bff7f78e9c6841f2a7a12538aedd5d7a -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/groups/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/groups/report"
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
null
```

### HTTP Request
`GET api/1.0/groups/report`


<!-- END_bff7f78e9c6841f2a7a12538aedd5d7a -->

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

<!-- START_56f82dc0f79f0bac4e81fbec8015aa70 -->
## Index/List page to show grid

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


> Example response (500):

```json
{
    "message": "Server Error"
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

<!-- START_bad0ec17bf9151579688ecae5a2618e7 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/uploads/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/uploads\/list\/json?page=1",
        "from": 1,
        "last_page": 2,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/uploads\/list\/json?page=2",
        "next_page_url": "http:\/\/localhost\/api\/1.0\/uploads\/list\/json?page=2",
        "path": "http:\/\/localhost\/api\/1.0\/uploads\/list\/json",
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
    "redirect": "http:\/\/localhost\/api\/1.0\/uploads\/list\/json"
}
```

### HTTP Request
`GET api/1.0/uploads/list/json`


<!-- END_bad0ec17bf9151579688ecae5a2618e7 -->

<!-- START_eddeffeb63b33228fca6adfc4e534d1d -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/uploads/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/uploads/report"
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
null
```

### HTTP Request
`GET api/1.0/uploads/report`


<!-- END_eddeffeb63b33228fca6adfc4e534d1d -->

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

<!-- START_ced7dfc2137036ac6f93ecadca37ef4f -->
## Index/List page to show grid

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


> Example response (500):

```json
{
    "message": "Server Error"
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

<!-- START_509e50ac298535166bacf67b5c566a82 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/settings/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/settings\/list\/json?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/settings\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/settings\/list\/json",
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
    "redirect": "http:\/\/localhost\/api\/1.0\/settings\/list\/json"
}
```

### HTTP Request
`GET api/1.0/settings/list/json`


<!-- END_509e50ac298535166bacf67b5c566a82 -->

<!-- START_9e86002dd30d51dbb43e0f2a17f4035c -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/settings/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/settings/report"
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
null
```

### HTTP Request
`GET api/1.0/settings/report`


<!-- END_9e86002dd30d51dbb43e0f2a17f4035c -->

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

<!-- START_ff8a7a253c42a88dca5cd859b16fcd38 -->
## Index/List page to show grid

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


> Example response (500):

```json
{
    "message": "Server Error"
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

<!-- START_a58a131f297eb3269a5ee7a2038c8f33 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/reports/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/reports\/list\/json?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/reports\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/reports\/list\/json",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/reports\/list\/json"
}
```

### HTTP Request
`GET api/1.0/reports/list/json`


<!-- END_a58a131f297eb3269a5ee7a2038c8f33 -->

<!-- START_c452b95be6b2954a19a64968e70d6bd6 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/reports/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/reports/report"
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
null
```

### HTTP Request
`GET api/1.0/reports/report`


<!-- END_c452b95be6b2954a19a64968e70d6bd6 -->

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

<!-- START_5a0b5b630089e753ac99b0b129cdb0a6 -->
## Index/List page to show grid

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

<!-- START_8213bcde74ba7b56b02928c3037c1fd2 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/lorem-ipsums\/list\/json?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/lorem-ipsums\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/lorem-ipsums\/list\/json",
        "per_page": 20,
        "prev_page_url": null,
        "to": 3,
        "total": 3,
        "items": [
            {
                "id": 1,
                "uuid": "2c9e9057-6095-4a48-aa9e-181e96172cb1",
                "project_id": null,
                "tenant_id": null,
                "name": "Test Input",
                "hidden": null,
                "textarea": "Prior to proceeding with the enforcement of new rules and regulations , it was good if authorities concerned would have been taken of such possible unruly anarchies of the transport workers . asdfasdf sdfgsdfg sdfg asdfdf",
                "textarea_ckeditor": "sdfgssdfgsdfgdfsg",
                "tags": "Roads",
                "text": null,
                "select_array": null,
                "select_array_multiple": [
                    "0",
                    "2"
                ],
                "dolor_sit_id": 1,
                "dolor_sit_ids": [
                    "3",
                    "1"
                ],
                "parent_id": 1,
                "checkbox": 0,
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 16:01:06",
                "updated_at": "2020-01-21 12:15:07",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "project_id": 1,
                "tenant_id": 1,
                "name": "ainw bNW",
                "hidden": null,
                "textarea": "asdfasdf adfsdf",
                "textarea_ckeditor": "asdfasdfsdf asdfasdf",
                "tags": "Country,takes,lorem",
                "text": null,
                "select_array": "1",
                "select_array_multiple": [
                    "0",
                    "1"
                ],
                "dolor_sit_id": 1,
                "dolor_sit_ids": [
                    "1"
                ],
                "parent_id": 2,
                "checkbox": 0,
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 16:01:06",
                "updated_at": "2020-07-13 07:40:37",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 1610,
                "uuid": "6558b780-0911-4fc9-872c-e4977e175cc7",
                "project_id": null,
                "tenant_id": null,
                "name": "test",
                "hidden": null,
                "textarea": null,
                "textarea_ckeditor": null,
                "tags": null,
                "text": null,
                "select_array": "2",
                "select_array_multiple": null,
                "dolor_sit_id": null,
                "dolor_sit_ids": [
                    "3",
                    "2",
                    "1"
                ],
                "parent_id": null,
                "checkbox": 0,
                "is_active": 0,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-07-13 09:01:21",
                "updated_at": "2020-10-05 09:01:42",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/lorem-ipsums\/list\/json"
}
```

### HTTP Request
`GET api/1.0/lorem-ipsums/list/json`


<!-- END_8213bcde74ba7b56b02928c3037c1fd2 -->

<!-- START_2f3bc5cfe342f5ddeeb850c08f2c774c -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/report"
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
null
```

### HTTP Request
`GET api/1.0/lorem-ipsums/report`


<!-- END_2f3bc5cfe342f5ddeeb850c08f2c774c -->

<!-- START_d2b3132213e4199cd7ffd17f560da1e2 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1/uploads"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/lorem-ipsums\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/lorem-ipsums\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/lorem-ipsums\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/lorem-ipsums\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/lorem-ipsums/{id}/uploads`


<!-- END_d2b3132213e4199cd7ffd17f560da1e2 -->

<!-- START_9750e8fb6278cf50836c35b5701e373c -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1/uploads"
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
`POST api/1.0/lorem-ipsums/{id}/uploads`


<!-- END_9750e8fb6278cf50836c35b5701e373c -->

<!-- START_828789c1167f478e15504d914913a313 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/lorem-ipsums?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/lorem-ipsums?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/lorem-ipsums",
        "per_page": 20,
        "prev_page_url": null,
        "to": 3,
        "total": 3,
        "items": [
            {
                "id": 1,
                "uuid": "2c9e9057-6095-4a48-aa9e-181e96172cb1",
                "project_id": null,
                "tenant_id": null,
                "name": "Test Input",
                "hidden": null,
                "textarea": "Prior to proceeding with the enforcement of new rules and regulations , it was good if authorities concerned would have been taken of such possible unruly anarchies of the transport workers . asdfasdf sdfgsdfg sdfg asdfdf",
                "textarea_ckeditor": "sdfgssdfgsdfgdfsg",
                "tags": "Roads",
                "text": null,
                "select_array": null,
                "select_array_multiple": [
                    "0",
                    "2"
                ],
                "dolor_sit_id": 1,
                "dolor_sit_ids": [
                    "3",
                    "1"
                ],
                "parent_id": 1,
                "checkbox": 0,
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 16:01:06",
                "updated_at": "2020-01-21 12:15:07",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "175da4d1-e448-4e27-a642-4da5179ec5c6",
                "project_id": 1,
                "tenant_id": 1,
                "name": "ainw bNW",
                "hidden": null,
                "textarea": "asdfasdf adfsdf",
                "textarea_ckeditor": "asdfasdfsdf asdfasdf",
                "tags": "Country,takes,lorem",
                "text": null,
                "select_array": "1",
                "select_array_multiple": [
                    "0",
                    "1"
                ],
                "dolor_sit_id": 1,
                "dolor_sit_ids": [
                    "1"
                ],
                "parent_id": 2,
                "checkbox": 0,
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 16:01:06",
                "updated_at": "2020-07-13 07:40:37",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 1610,
                "uuid": "6558b780-0911-4fc9-872c-e4977e175cc7",
                "project_id": null,
                "tenant_id": null,
                "name": "test",
                "hidden": null,
                "textarea": null,
                "textarea_ckeditor": null,
                "tags": null,
                "text": null,
                "select_array": "2",
                "select_array_multiple": null,
                "dolor_sit_id": null,
                "dolor_sit_ids": [
                    "3",
                    "2",
                    "1"
                ],
                "parent_id": null,
                "checkbox": 0,
                "is_active": 0,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-07-13 09:01:21",
                "updated_at": "2020-10-05 09:01:42",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/lorem-ipsums"
}
```

### HTTP Request
`GET api/1.0/lorem-ipsums`


<!-- END_828789c1167f478e15504d914913a313 -->

<!-- START_ebff08b9738008d5458ca81c4f854e78 -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums"
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
`POST api/1.0/lorem-ipsums`


<!-- END_ebff08b9738008d5458ca81c4f854e78 -->

<!-- START_5214248d7cd05cb81be5e5e5c1a20421 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/1.0/lorem-ipsums/{lorem_ipsum}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_5214248d7cd05cb81be5e5e5c1a20421 -->

<!-- START_d7f6bcc3b0692412687e43c311493047 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1"
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
`PUT api/1.0/lorem-ipsums/{lorem_ipsum}`

`PATCH api/1.0/lorem-ipsums/{lorem_ipsum}`


<!-- END_d7f6bcc3b0692412687e43c311493047 -->

<!-- START_a05c4adb61ed2a6336b51875150c4156 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/lorem-ipsums/1"
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
`DELETE api/1.0/lorem-ipsums/{lorem_ipsum}`


<!-- END_a05c4adb61ed2a6336b51875150c4156 -->

<!-- START_f13e06a1ebd61f18e19cd515e53130f2 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/dolor-sits\/list\/json?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/dolor-sits\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/dolor-sits\/list\/json",
        "per_page": 20,
        "prev_page_url": null,
        "to": 3,
        "total": 3,
        "items": [
            {
                "id": 1,
                "uuid": "7be17d1c-1bd9-4620-876a-f3ca5a05717e",
                "project_id": null,
                "tenant_id": null,
                "name": "Super wings",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 14:56:35",
                "updated_at": "2019-11-20 14:56:35",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "7be17d1c-1bd9-4620-876a-f3ca5a05717f",
                "project_id": null,
                "tenant_id": null,
                "name": "Paw Petrol",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 14:56:35",
                "updated_at": "2019-11-20 14:56:35",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 3,
                "uuid": "7be17d1c-1bd9-4620-876a-f3ca5a05717g",
                "project_id": null,
                "tenant_id": null,
                "name": "Captain Planet",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 14:56:35",
                "updated_at": "2020-01-06 09:25:49",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/dolor-sits\/list\/json"
}
```

### HTTP Request
`GET api/1.0/dolor-sits/list/json`


<!-- END_f13e06a1ebd61f18e19cd515e53130f2 -->

<!-- START_85b403497d8b266d954349e3cc3a76d2 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/report"
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
null
```

### HTTP Request
`GET api/1.0/dolor-sits/report`


<!-- END_85b403497d8b266d954349e3cc3a76d2 -->

<!-- START_e02ccc0b7e48406722621668b97b3338 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1/uploads"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/dolor-sits\/1\/uploads?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/dolor-sits\/1\/uploads?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/dolor-sits\/1\/uploads",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/dolor-sits\/1\/uploads"
}
```

### HTTP Request
`GET api/1.0/dolor-sits/{id}/uploads`


<!-- END_e02ccc0b7e48406722621668b97b3338 -->

<!-- START_337fbd77c6ffac081cee3ab1b8680565 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1/uploads"
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
`POST api/1.0/dolor-sits/{id}/uploads`


<!-- END_337fbd77c6ffac081cee3ab1b8680565 -->

<!-- START_dade498a96fc580819797ea30bd5f114 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/dolor-sits" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/dolor-sits?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/dolor-sits?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/dolor-sits",
        "per_page": 20,
        "prev_page_url": null,
        "to": 3,
        "total": 3,
        "items": [
            {
                "id": 1,
                "uuid": "7be17d1c-1bd9-4620-876a-f3ca5a05717e",
                "project_id": null,
                "tenant_id": null,
                "name": "Super wings",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 14:56:35",
                "updated_at": "2019-11-20 14:56:35",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "uuid": "7be17d1c-1bd9-4620-876a-f3ca5a05717f",
                "project_id": null,
                "tenant_id": null,
                "name": "Paw Petrol",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 14:56:35",
                "updated_at": "2019-11-20 14:56:35",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 3,
                "uuid": "7be17d1c-1bd9-4620-876a-f3ca5a05717g",
                "project_id": null,
                "tenant_id": null,
                "name": "Captain Planet",
                "is_active": 1,
                "created_by": 5,
                "updated_by": 5,
                "created_at": "2019-11-20 14:56:35",
                "updated_at": "2020-01-06 09:25:49",
                "deleted_at": null,
                "deleted_by": null
            }
        ]
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/dolor-sits"
}
```

### HTTP Request
`GET api/1.0/dolor-sits`


<!-- END_dade498a96fc580819797ea30bd5f114 -->

<!-- START_a48416eef60245ff371a9a0f0c28118c -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits"
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
`POST api/1.0/dolor-sits`


<!-- END_a48416eef60245ff371a9a0f0c28118c -->

<!-- START_9a7c36f659287d9ac774181ade96884a -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1"
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


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/1.0/dolor-sits/{dolor_sit}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_9a7c36f659287d9ac774181ade96884a -->

<!-- START_70b25c93874d718eb41595f9eadeb4e6 -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1"
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
`PUT api/1.0/dolor-sits/{dolor_sit}`

`PATCH api/1.0/dolor-sits/{dolor_sit}`


<!-- END_70b25c93874d718eb41595f9eadeb4e6 -->

<!-- START_5161cabec6140aab8bdfe7ab06f07177 -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/dolor-sits/1"
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
`DELETE api/1.0/dolor-sits/{dolor_sit}`


<!-- END_5161cabec6140aab8bdfe7ab06f07177 -->

<!-- START_91fb613842fee7679206f5852d14ecfd -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/subscriptions/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/subscriptions\/list\/json?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/subscriptions\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/subscriptions\/list\/json",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/subscriptions\/list\/json"
}
```

### HTTP Request
`GET api/1.0/subscriptions/list/json`


<!-- END_91fb613842fee7679206f5852d14ecfd -->

<!-- START_65b2fcfe29824cd0360039c3019177e2 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/subscriptions/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/subscriptions/report"
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
null
```

### HTTP Request
`GET api/1.0/subscriptions/report`


<!-- END_65b2fcfe29824cd0360039c3019177e2 -->

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

<!-- START_f01d1c290dd9bc43d0283a4483484d39 -->
## Index/List page to show grid

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

<!-- START_95861f5502229b800e4440dff248e4f9 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/packages/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages/list/json"
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
        "first_page_url": "http:\/\/localhost\/api\/1.0\/packages\/list\/json?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/1.0\/packages\/list\/json?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/1.0\/packages\/list\/json",
        "per_page": 20,
        "prev_page_url": null,
        "to": null,
        "total": 0,
        "items": []
    },
    "redirect": "http:\/\/localhost\/api\/1.0\/packages\/list\/json"
}
```

### HTTP Request
`GET api/1.0/packages/list/json`


<!-- END_95861f5502229b800e4440dff248e4f9 -->

<!-- START_5c1ff5df33ef99206e443f9df1d6439e -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/packages/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/packages/report"
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
null
```

### HTTP Request
`GET api/1.0/packages/report`


<!-- END_5c1ff5df33ef99206e443f9df1d6439e -->

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

<!-- START_416fce805fde3049712d2cec2a95a5cf -->
## Index/List page to show grid

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

<!-- START_90b39125ddf1a47e9dcf801b6b41f069 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/countries/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries/list/json"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/countries/list/json`


<!-- END_90b39125ddf1a47e9dcf801b6b41f069 -->

<!-- START_b28b0ee5f96169dbe01230d953110d72 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/countries/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/countries/report"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/countries/report`


<!-- END_b28b0ee5f96169dbe01230d953110d72 -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_8d1da7c9c664bb449e9598f5c005ff35 -->
## Index/List page to show grid

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/countries`


<!-- END_8d1da7c9c664bb449e9598f5c005ff35 -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_57d6e8c491f86eca7a5ed3cb5e5ae2c8 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/notifications/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications/list/json"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/notifications/list/json`


<!-- END_57d6e8c491f86eca7a5ed3cb5e5ae2c8 -->

<!-- START_c57cdc1a00fa616b48d1a2a734de4aaa -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/notifications/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/notifications/report"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/notifications/report`


<!-- END_c57cdc1a00fa616b48d1a2a734de4aaa -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_64be862e056d566ff15091dfed8d52a9 -->
## Index/List page to show grid

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/notifications`


<!-- END_64be862e056d566ff15091dfed8d52a9 -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_9aceb44ed6a2928aae116d47a364f301 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/projects/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects/list/json"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/projects/list/json`


<!-- END_9aceb44ed6a2928aae116d47a364f301 -->

<!-- START_66fa507723f03e7334e493d66bf7e3ce -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/projects/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/projects/report"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/projects/report`


<!-- END_66fa507723f03e7334e493d66bf7e3ce -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_f6989b34d3f1a54e31c298794eff8f02 -->
## Index/List page to show grid

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/projects`


<!-- END_f6989b34d3f1a54e31c298794eff8f02 -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_48740ee076056a7db04c07f19cc049eb -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/comments/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments/list/json"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/comments/list/json`


<!-- END_48740ee076056a7db04c07f19cc049eb -->

<!-- START_ae12bd996e2901461e1e147696b4ca12 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/comments/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/comments/report"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/comments/report`


<!-- END_ae12bd996e2901461e1e147696b4ca12 -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_41edaace5e42c41885474c6cd130d70b -->
## Index/List page to show grid

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/comments`


<!-- END_41edaace5e42c41885474c6cd130d70b -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_8977649c0f22dc9dea67efbe4430cc75 -->
## Returns a collection of objects as Json for an API call

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/changes/list/json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes/list/json"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/changes/list/json`


<!-- END_8977649c0f22dc9dea67efbe4430cc75 -->

<!-- START_16a2a23b8a1822cb7ce4c9adb2814d24 -->
## Show and render report

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/changes/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes/report"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/changes/report`


<!-- END_16a2a23b8a1822cb7ce4c9adb2814d24 -->

<!-- START_49b99646e37c0628c9a331006d295d51 -->
## Get all the uploads of an element

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/changes/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes/1/uploads"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/changes/{id}/uploads`


<!-- END_49b99646e37c0628c9a331006d295d51 -->

<!-- START_9aa5f5674313697071559fa4ccc78a07 -->
## Uploads files under an element

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/changes/1/uploads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes/1/uploads"
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
`POST api/1.0/changes/{id}/uploads`


<!-- END_9aa5f5674313697071559fa4ccc78a07 -->

<!-- START_6d85c3255c75a2fe2fb556fbb3e059d2 -->
## Index/List page to show grid

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/changes`


<!-- END_6d85c3255c75a2fe2fb556fbb3e059d2 -->

<!-- START_a57f1a062db5bcd8c43bf1f324b9a12e -->
## Store

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/api/1.0/changes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes"
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
`POST api/1.0/changes`


<!-- END_a57f1a062db5bcd8c43bf1f324b9a12e -->

<!-- START_47e3be40b963ec7743910322ee63cde1 -->
## Show

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/api/1.0/changes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes/1"
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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/changes/{change}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the item.

<!-- END_47e3be40b963ec7743910322ee63cde1 -->

<!-- START_70d367b76bb21b2bc37091db0b88338f -->
## Update

> Example request:

```bash
curl -X PUT \
    "http://localhost:8081/mainframe/public/api/1.0/changes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes/1"
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
`PUT api/1.0/changes/{change}`

`PATCH api/1.0/changes/{change}`


<!-- END_70d367b76bb21b2bc37091db0b88338f -->

<!-- START_d9dbe7e85b930aee09b12ee87ba87cdc -->
## Delete

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8081/mainframe/public/api/1.0/changes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/api/1.0/changes/1"
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
`DELETE api/1.0/changes/{change}`


<!-- END_d9dbe7e85b930aee09b12ee87ba87cdc -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
}
```

### HTTP Request
`GET api/1.0/setting/{name}`


<!-- END_21f5cfe7136ec865d701a276e042e269 -->

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


> Example response (429):

```json
{
    "message": "Too Many Attempts."
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

<!-- START_0ad1e9c73abd49a1fb3c4963e8c52673 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8081/mainframe/public/reseller/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reseller/register"
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
null
```

### HTTP Request
`GET reseller/register`


<!-- END_0ad1e9c73abd49a1fb3c4963e8c52673 -->

<!-- START_75a7f6ac7b803578146ac3235daa713d -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost:8081/mainframe/public/reseller/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "X-Auth-Token: 7c0f2f2802ffab09ec139275d595caaa91c6b2d2dc1340e40bdde1afb83b3ec0" \
    -H "client-id: 2"
```

```javascript
const url = new URL(
    "http://localhost:8081/mainframe/public/reseller/register"
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
`POST reseller/register`


<!-- END_75a7f6ac7b803578146ac3235daa713d -->


