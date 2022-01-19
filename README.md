# Laravel-RESTmail

This is a simple REST API for sending email by Laravel. You can also add any count of receivers, BCC and CC. 
Mailing makes only from one email saved in Laravel config. Authorization is based on middleware Api key.

# Installation

Install all the dependencies using composer

    composer install

Copy the example env file

    cp .env.example .env

Open new .env and update MAIL settings with yours values. You can use your gmail and google SMTP for example

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=465
    MAIL_USERNAME=yourmail@gmail.com
    MAIL_PASSWORD=your_password
    MAIL_ENCRYPTION=SSL
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"

Also set up new Api key

    APP_API_KEY=new_api_key

# Usage

You can start the local development server

    php artisan serve

Request example for sending new mail:
    
    POST http://localhost:8000/api/send?apiKey={configApiKey}

```json
{
     "from_name": "optional name",
     "to_email": ["required@gmail.com"],
     "to_name": "optional name",
     "subject": "required subject",
     "body": "required body",
     "bcc": ["optional@gmail.com", "optional@gmail.com"],
     "cc": ["optional@gmail.com","optional@gmail.com"]
}
```

Example of response:


```json
{
    "result": "good"
}
```
