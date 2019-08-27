## Notes

- pemanggilan endpoint membutuhakan `api_token` yang dikirim via header `Authorization: Bearer {{api_token}}` (kecuali untuk login)
- `api_token` didapat dari response body login
- pemanggilan endpoint harus menggunakan header `Accept: application/json`
- pemanggilan endpoint yang membutuhkan payload harus menggunakan header `Content-Type: application/json`
- response status code dari validasi error adalah `422`
- detail validasi error bisa dilihat dari response body

## API Routes

```
+-----------+------------------------------+
| Method    | URI                          |
+-----------+------------------------------+
| GET|HEAD  | api/categories               |
| POST      | api/categories               |
| GET|HEAD  | api/categories/{category_id} |
| PUT|PATCH | api/categories/{category_id} |
| DELETE    | api/categories/{category_id} |
| GET|HEAD  | api/customers                |
| POST      | api/customers                |
| DELETE    | api/customers/{customer_id}  |
| PUT|PATCH | api/customers/{customer_id}  |
| GET|HEAD  | api/customers/{customer_id}  |
| POST      | api/login                    |
| GET|HEAD  | api/products                 |
| POST      | api/products                 |
| GET|HEAD  | api/products/{product_id}    |
| PUT|PATCH | api/products/{product_id}    |
| DELETE    | api/products/{product_id}    |
| GET|HEAD  | api/sales                    |
| POST      | api/sales                    |
| GET|HEAD  | api/sales/{sale_id}          |
| GET|HEAD  | api/user                     |
+-----------+------------------------------+
```

## Login

**Url**

`/api/login`

**Request Payload**

```
{
  "email": "admin@mail.com",
  "password": "password"
}
```

**Response Status**

```
Success `200`

Validation Error `422`
```

**Response Body (Success)**

```
{
    "api_token": "MhWpcH27twMuhhcJId4ayBQWVs4NjX8GF2GAEE84habDo1jR33qLd90dQKSb",
    "created_at": "2019-08-27 02:07:28",
    "email": "admin@mail.com",
    "email_verified_at": "2019-08-27 02:07:28",
    "id": 1,
    "name": "Nicholas Mertz MD",
    "updated_at": "2019-08-27 03:42:17"
}
```

**Response Body (Validation Error)**

```
{
    "message": "Invalid username or password"
}
```

## Categories

### GET categories

**Url**

`/api/categories`

**Response Body**

```
{
    "current_page": 1,
    "data": [
        {
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 1,
            "name": "aliquam",
            "updated_at": "2019-08-27 02:07:28"
        }
    ],
    "first_page_url": "http://localhost:8000/api/categories?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/categories?page=1",
    "next_page_url": null,
    "path": "http://localhost:8000/api/categories",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### GET one category

**Url**

`/api/categories/{category_id}`

**Response Body**

```
{
    "created_at": "2019-08-27 02:07:28",
    "deleted_at": null,
    "id": 1,
    "name": "aliquam",
    "updated_at": "2019-08-27 02:07:28"
}
```

### POST create category

**Url**

`/api/categories`

**Request Body**

```
{
  "name": "Elektronik"
}
```

**Response Body**

```
{
    "created_at": "2019-08-27 04:04:27",
    "id": 2,
    "name": "Elektronik",
    "updated_at": "2019-08-27 04:04:27"
}
```

### PUT update category

**Url**

`/api/categories/{category_id}`

**Request Body**

```
{
  "name": "Electronics"
}
```

**Response Body**

```
{
    "created_at": "2019-08-27 04:04:27",
    "deleted_at": null,
    "id": 2,
    "name": "Electronics",
    "updated_at": "2019-08-27 04:05:46"
}
```

### DELETE category

**Url**

`/api/categories/{category_id}`

## Products

### GET products

**Url**

`/api/products`

**Response Body**

```
{
    "current_page": 1,
    "data": [
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 1,
            "name": "ad",
            "price": "2801847.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 2,
            "name": "molestiae",
            "price": "529.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 3,
            "name": "magni",
            "price": "66116.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 4,
            "name": "minima",
            "price": "190.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 5,
            "name": "et",
            "price": "456.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 6,
            "name": "qui",
            "price": "498.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 7,
            "name": "consequuntur",
            "price": "97927.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 8,
            "name": "et",
            "price": "225838039.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 9,
            "name": "similique",
            "price": "60.00",
            "updated_at": "2019-08-27 02:07:28"
        },
        {
            "category": {
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "aliquam",
                "updated_at": "2019-08-27 02:07:28"
            },
            "category_id": 1,
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 10,
            "name": "magni",
            "price": "15243.00",
            "updated_at": "2019-08-27 02:07:28"
        }
    ],
    "first_page_url": "http://localhost:8000/api/products?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/products?page=1",
    "next_page_url": null,
    "path": "http://localhost:8000/api/products",
    "per_page": 15,
    "prev_page_url": null,
    "to": 10,
    "total": 10
}
```

### GET one product

**Url**

`/api/products/{product_id}`

**Response Body**

```
{
    "category": {
        "created_at": "2019-08-27 02:07:28",
        "deleted_at": null,
        "id": 1,
        "name": "aliquam",
        "updated_at": "2019-08-27 02:07:28"
    },
    "category_id": 1,
    "created_at": "2019-08-27 02:07:28",
    "deleted_at": null,
    "id": 1,
    "name": "ad",
    "price": "2801847.00",
    "updated_at": "2019-08-27 02:07:28"
}
```

### POST create product

**Url**

`/api/products`

**Request Body**

```
{
  "category_id": 1,
  "name": "Camera Nikkon 3000",
  "price": 9000
}
```

**Response Body**

```
{
    "category_id": 1,
    "created_at": "2019-08-27 04:16:16",
    "id": 11,
    "name": "Camera Nikkon 3000",
    "price": 9000,
    "updated_at": "2019-08-27 04:16:16"
}
```

### PUT update product

**Url**

`/api/products/{product_id}`

**Request Body**

```
{
  "category_id": 1,
  "name": "Camera Sonay 3000",
  "price": 9000
}
```

**Response Body**

```
{
    "category_id": 1,
    "created_at": "2019-08-27 04:16:16",
    "deleted_at": null,
    "id": 11,
    "name": "Camera Sonay 3000",
    "price": 9000,
    "updated_at": "2019-08-27 04:17:59"
}
```

### DELETE product

**Url**

`/api/products/{product_id}`


## Customers

### GET customers

**Url**

`/api/customers`

**Response Body**

```
{
    "current_page": 1,
    "data": [
        {
            "address": "167 DuBuque Ranch Suite 076\nEbertfurt, TX 37895",
            "created_at": "2019-08-27 02:07:28",
            "deleted_at": null,
            "id": 1,
            "name": "Ryder Stanton MD",
            "updated_at": "2019-08-27 02:07:28"
        }
    ],
    "first_page_url": "http://localhost:8000/api/customers?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/customers?page=1",
    "next_page_url": null,
    "path": "http://localhost:8000/api/customers",
    "per_page": 15,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

### GET one customer

**Url**

`/api/customers/{customer_id}`

**Response Body**

```
{
    "address": "167 DuBuque Ranch Suite 076\nEbertfurt, TX 37895",
    "created_at": "2019-08-27 02:07:28",
    "deleted_at": null,
    "id": 1,
    "name": "Ryder Stanton MD",
    "updated_at": "2019-08-27 02:07:28"
}
```

### POST create customer

**Url**

`/api/customers`

**Request Body**

```
{
  "name": "Bob",
  "address": "California"
}
```

**Response Body**

```
{
    "address": "California",
    "created_at": "2019-08-27 04:20:18",
    "id": 5,
    "name": "Bob",
    "updated_at": "2019-08-27 04:20:18"
}
```

### PUT update customer

**Url**

`/api/customers/{customer_id}`

**Request Body**

```
{
  "name": "Bob Marlo",
  "address": "Manhattan"
}
```

**Response Body**

```
{
    "address": "Manhattan",
    "created_at": "2019-08-27 04:20:18",
    "deleted_at": null,
    "id": 5,
    "name": "Bob Marlo",
    "updated_at": "2019-08-27 04:20:52"
}
```

### DELETE customer

**Url**

`/api/customers/{customer_id}`


## Sales

### GET sales

**Url**

`/api/sales`

**Response Body**

```
{
    "current_page": 1,
    "data": [
        {
            "created_at": "2019-08-27 02:13:57",
            "customer": {
                "address": "167 DuBuque Ranch Suite 076\nEbertfurt, TX 37895",
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "Ryder Stanton MD",
                "updated_at": "2019-08-27 02:07:28"
            },
            "customer_id": 1,
            "id": 2,
            "total": "8405541.00",
            "updated_at": "2019-08-27 02:13:57"
        },
        {
            "created_at": "2019-08-27 02:14:35",
            "customer": {
                "address": "167 DuBuque Ranch Suite 076\nEbertfurt, TX 37895",
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 1,
                "name": "Ryder Stanton MD",
                "updated_at": "2019-08-27 02:07:28"
            },
            "customer_id": 1,
            "id": 3,
            "total": "8405541.00",
            "updated_at": "2019-08-27 02:14:35"
        },
        {
            "created_at": "2019-08-27 04:25:30",
            "customer": {
                "address": "Manhattan",
                "created_at": "2019-08-27 04:20:18",
                "deleted_at": null,
                "id": 5,
                "name": "Bob Marlo",
                "updated_at": "2019-08-27 04:20:52"
            },
            "customer_id": 5,
            "id": 4,
            "total": "87972.00",
            "updated_at": "2019-08-27 04:25:30"
        }
    ],
    "first_page_url": "http://localhost:8000/api/sales?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/sales?page=1",
    "next_page_url": null,
    "path": "http://localhost:8000/api/sales",
    "per_page": 15,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```

### GET one sale

**Url**

`/api/sales/{sale_id}`

**Response Body**

```
{
    "created_at": "2019-08-27 04:25:30",
    "customer": {
        "address": "Manhattan",
        "created_at": "2019-08-27 04:20:18",
        "deleted_at": null,
        "id": 5,
        "name": "Bob Marlo",
        "updated_at": "2019-08-27 04:20:52"
    },
    "customer_id": 5,
    "id": 4,
    "items": [
        {
            "created_at": null,
            "id": 3,
            "price": "9000.00",
            "product": {
                "category_id": 1,
                "created_at": "2019-08-27 04:16:16",
                "deleted_at": null,
                "id": 11,
                "name": "Camera Sonay 3000",
                "price": "9000.00",
                "updated_at": "2019-08-27 04:17:59"
            },
            "product_id": 11,
            "qty": 3,
            "sale_id": 4,
            "subtotal": "27000.00",
            "updated_at": null
        },
        {
            "created_at": null,
            "id": 4,
            "price": "15243.00",
            "product": {
                "category_id": 1,
                "created_at": "2019-08-27 02:07:28",
                "deleted_at": null,
                "id": 10,
                "name": "magni",
                "price": "15243.00",
                "updated_at": "2019-08-27 02:07:28"
            },
            "product_id": 10,
            "qty": 4,
            "sale_id": 4,
            "subtotal": "60972.00",
            "updated_at": null
        }
    ],
    "total": "87972.00",
    "updated_at": "2019-08-27 04:25:30"
}
```


### POST record new sales

**Url**

`/api/sales`

**Request Body**

```
{
  "customer_id": 5,
  "items": [
    {
      "product_id": 11,
      "qty": 3
    },
    {
      "product_id": 10,
      "qty": 4
    }
  ]
}
```

**Response Body**

```
{
	"customer_id": 5,
	"total": 87972,
	"updated_at": "2019-08-27 04:25:30",
	"created_at": "2019-08-27 04:25:30",
	"id": 4,
	"customer": {
		"id": 5,
		"name": "Bob Marlo",
		"address": "Manhattan",
		"created_at": "2019-08-27 04:20:18",
		"updated_at": "2019-08-27 04:20:52",
		"deleted_at": null
	},
	"items": [{
		"id": 3,
		"qty": 3,
		"price": "9000.00",
		"subtotal": "27000.00",
		"product_id": 11,
		"sale_id": 4,
		"created_at": null,
		"updated_at": null
	}, {
		"id": 4,
		"qty": 4,
		"price": "15243.00",
		"subtotal": "60972.00",
		"product_id": 10,
		"sale_id": 4,
		"created_at": null,
		"updated_at": null
	}]
}
```

