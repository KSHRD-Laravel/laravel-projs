<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
    </head>
    <body>
        <div>
            <h1>{{__('welcome.welcome')}}</h1>
            <a href="/locale/en">
                EN
              </a>
            <a href="/locale/km">
                KM
            </a>
        </div>
    </body>
</html>
