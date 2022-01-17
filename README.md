# Laravel-RESTmail



# Installation

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file.
Update MAIL settings with yours values.

    cp .env.example .env

# Usage

You can start the local development server

    php artisan serve

JSON body of HTTP request to send email
    
    POST http://localhost:8000/api/send

```json
{
     "from_email": "optional@gmail.com",
     "from_name": "optional name",
     "to_email": ["required@gmail.com"],
     "to_name": "optional name",
     "subject": "required subject",
     "body": "required body",
     "bcc": ["optional@gmail.com", "optional@gmail.com"],
     "cc": ["optional@gmail.com","optional@gmail.com"]
}
```

Then you will receive JSON with a result


```json
{
    "result": "good"
}
```
