# Andrew Wade Tech Test

## Instructions

Clone this Repository.
In the root folder run composer install.
Copy the env.example file to .env.
Enter your getaddress.io api key in to the bottom of the .env file you just created.

## Laravel Lumen

This Test Tech is running on Laravel Lumen.

You should only need to look at the routes/web.php file to see how routing is handled.
\App\Http\Controller\PostCodeController which has a single method, usually single method controllers should use the magic __Invoke method, but a controller like this would often have more than one method for different endpoints to proxy to.
the config folder has a single file containing the config values for getaddress.io keys. caching the config can often improve perfoamcne so is best practice to keep env values kere so they can be cached for production environments.

Other than that. serve the application however you prefer to, and hit the find/{postcode} endpoints}
It will return the json response from the getaddress.io api to the user, or return the relevant error messages should the request fail.
